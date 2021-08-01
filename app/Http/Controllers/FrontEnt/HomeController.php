<?php

declare(strict_types=1);

namespace App\Http\Controllers\FrontEnt;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductInfo\Product;
use App\Models\FrontEnd\AddToCard;
use App\Services\AddToCardService;
use Illuminate\Http\Request;

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
     * @var AddToCardService
     */
    private $addToCardService;

    /**
     * HomeController constructor.
     */
    public function __construct(Product $product, AddToCard $addToCard, AddToCardService $addToCardService)
    {
        $this->product = $product;
        $this->addToCard = $addToCard;
        $this->addToCardService = $addToCardService;
    }

    public function index(Request $request)
    {
        $data['html'] = view('frontend.header-card-popup')->render();
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereFeatured('Best Selling Product')->get()->toArray();
        $data['products_desc'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereFeatured('New Product')->orderBy('id', 'desc')->get()->toArray();
// dd($data['products'][1]['product_image_first']['image']);
        return view('frontend.home', [
            'data' => $data,
        ]);
    }

    public function addToCardStore(Request $request): array
    {
        return $this->addToCardService::addCardStore($request->get('product_id'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function cartProductQuantityUpdate(Request $request): array
    {
        $quantity = $request->get('quantity');
        if ($request->get('state') == 'decrease') {
            $quantity = ($quantity * (-1));
        }

        return $this->addToCardService::addCardStore($request->get('product_id'), $quantity);
    }

    public function cartProductDelete(Request $request)
    {
        return $this->addToCardService::productDelete($request->get('product_id'));
    }

    public function checkOut()
    {
        $data['products'] = $this->addToCardService::cardTotalProductAndAmount();

        return view('frontend.check-out', ['data' => $data]);
    }

    public function productDetails($id = null)
    {

        return view('frontend.product-details',[
            'productDetails'=>Product::whereId($id)->first(),
        ]);
    }
}
