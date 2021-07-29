<?php declare(strict_types = 1);

namespace App\Http\Controllers\FrontEnt;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductInfo\Product;
use App\Models\FrontEnd\AddToCard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * @var Product
     */
    private $product;
    /**
     * @var AddToCard
     */
    private $addToCard;

    /**
     * HomeController constructor.
     * @param Product $product
     * @param AddToCard $addToCard
     */
    public function __construct(Product $product, AddToCard $addToCard)
    {
        $this->product = $product;
        $this->addToCard = $addToCard;
    }

    public function index(Request $request)
    {
        $data['products'] = $this->product->with('ProductImageFirst')->get()->toArray();

        return view('frontend.home', [
            'data' => $data
        ]);
    }

    public function addToCard(Request $request): array
    {
        $productId = $request->get('product_id');
        $sessionId = Session::getId();
        $result = $this->product->with('ProductImageFirst')->find($productId);
        if($result) {
            $product = $result->toArray();
            $productImage = isset($product['product_image_first']['image']) ? $product['product_image_first']['image'] : '';
            $productInfo = [
              'product_id' => $product['id'],
              'product_name' => $product['name'],
              'regular_price' => $product['regular_price'],
              'special_price' => $product['special_price'],
              'image' => $productImage,
            ];

            $productCard = $this->addToCard->where(['session_id' => $sessionId,'product_id' => $productId])->first();
            if ($productCard) {
                $productCard->quantity = ($productCard->quantity + 1);
                $productCard->data = json_encode($productInfo);
                $productCard->unit_price = $product['special_price'];
                $productCard->total_price = ( $productCard->quantity * $product['special_price'] );
            } else {
                $productCard = $this->addToCard;
                $productCard->session_id = $sessionId;
                $productCard->product_id = $productId;
                $productCard->data = json_encode($productInfo);
                $productCard->quantity = 1;
                $productCard->unit_price = $product['special_price'];
                $productCard->total_price = ( $productCard->quantity * $product['special_price'] );
            }

            $productCard->save();

            $cardInfo = DB::table('add_to_cards')
                ->select(DB::raw('SUM(total_price) as total_price'), DB::raw('count(session_id) number_of_product'))
                ->where('session_id', $sessionId)->groupBy('session_id')->first();

            $data['product_card'] = $productCard->toArray();
            $data['total_price'] = 0;
            $data['number_of_product'] = 0;

            if ($result) {
                $data['total_price'] = $cardInfo->total_price;
                $data['number_of_product'] = $cardInfo->number_of_product;
            }

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
}
