<?php declare(strict_types = 1);


namespace App\Services;


use App\Http\Controllers\Controller;
use App\Models\Backend\ProductInfo\Product;
use App\Models\FrontEnd\AddToCard as AddToCardModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AddToCardService extends Controller
{
    /**
     * @var Product
     */
    private $product;
    /**
     * @var AddToCardModel
     */
    private $addToCardModel;

    /**
     * AddToCard constructor.
     * @param Product $product
     * @param AddToCardModel $addToCardModel
     */
    public function __construct(Product $product, AddToCardModel $addToCardModel)
    {

        $this->product = $product;
        $this->addToCardModel = $addToCardModel;
    }

    public static function addCardStore($productId, $quantity = 1): array
    {
        $sessionId = Session::getId();
        $result = Product::with('ProductImageFirst')->find($productId);
        if($result) {
            $product = $result->toArray();
            $productImage = isset($product['product_image_first']['image']) ? $product['product_image_first']['image'] : '';
            $productInfo = [
                'product_id' => $product['id'],
                'product_name' => $product['name'],
                'regular_price' => $product['regular_price'],
                'special_price' => $product['special_price'],
                'image' => $productImage ? $productImage : 'blank-product-image.png',
            ];

            $productCard = AddToCardModel::where(['session_id' => $sessionId,'product_id' => $productId])->first();
            if ($productCard) {
                $requestQuantity = ($productCard->quantity + $quantity);
                if(!($requestQuantity>0)){
                    return [
                        'errorStatus' => true,
                        'message' => "You can't zero quantity.",
                        'data' => [
                            'quantity' => 0
                        ],
                        'errors' => [
                            'error' => ''
                        ]
                    ];
                }
                if ($requestQuantity > 0) {
                    $productCard->quantity = $requestQuantity;
                    $productCard->data = json_encode($productInfo);
                    $productCard->unit_price = $product['special_price'];
                    $productCard->total_price = ( $productCard->quantity * $product['special_price'] );
                }
            } else {
                $productCard = new AddToCardModel();
                $productCard->session_id = $sessionId;
                $productCard->product_id = $productId;
                $productCard->data = json_encode($productInfo);
                $productCard->quantity = $quantity;
                $productCard->unit_price = $product['special_price'];
                $productCard->total_price = ( $productCard->quantity * $product['special_price'] );
            }

            $productCard->save();

            $card = self::cardTotalProductAndAmount();
            $data['product_card'] = $productCard->toArray();
            $data['total_price'] = $card['data']['total_price'];
            $data['number_of_product'] = $card['data']['number_of_product'];

            $response = [
                'errorStatus' => false,
                'message' => '',
                'data' => $data,
                'errors' => [
                    'error' => ''
                ]
            ];

        } else {
            $response = [
                'errorStatus' => true,
                'message' => 'Invalid product',
                'data' => [],
                'errors' => [
                    'error' => ''
                ]
            ];
        }

        return $response;
    }

    public static function cardTotalProductAndAmount()
    {
        $sessionId = Session::getId();

        $results = AddToCardModel::where('session_id', $sessionId)->select(['product_id', 'quantity', 'unit_price', 'data', 'total_price'])->get()->toArray();
        $data['total_price'] = 0;
        $data['number_of_product'] = 0;
        $data['products'] = [];
        //$data['miniCard'] = '';
        //$data['miniCard'] = self::miniCard();

        foreach ($results as $result) {
            $data['total_price'] += $result['total_price'];
            $data['number_of_product'] += 1;
            $data['products'][$result['product_id']] = [
                'Info' => json_decode($result['data'], true),
                'product_id' => $result['product_id'],
                'quantity' => $result['quantity'],
                'unit_price' => $result['unit_price'],
                'total_price' => $result['total_price'],
            ];
        }

        $response = [
            'errorStatus' => false,
            'message' => '',
            'data' => $data,
            'errors' => [
                'error' => ''
            ]
        ];

        return $response;
    }

    public static function miniCard()
    {
        return view('frontend.header-card-popup')->render();
    }

    public static function productDelete($productId)
    {
        $sessionId = Session::getId();

        $result = AddToCardModel::where(['session_id' => $sessionId,'product_id'=>$productId])->delete();

        if($result) {
            $data = self::cardTotalProductAndAmount();
            $response = [
                'errorStatus' => false,
                'message' => '',
                'data' => $data,
                'errors' => [
                    'error' => ''
                ]
            ];
        } else {
            $response = [
                'errorStatus' => true,
                'message' => "Product delete not successful",
                'data' => [],
                'errors' => [
                    'error' => ''
                ]
            ];
        }

        return $response;
    }


}
