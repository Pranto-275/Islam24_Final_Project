<?php

declare(strict_types=1);

namespace App\Http\Controllers\FrontEnt;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductInfo\Product;
use App\Models\FrontEnd\AddToCard;
use App\Services\AddToCardService;
use App\Models\Backend\ProductInfo\Brand;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\FrontEnd\Order;
use Carbon\Carbon;
use App\Models\FrontEnd\OrderDetail;
use Illuminate\Support\Facades\DB;
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
    public function orderComplete(){
        return view('frontend.order-completed');
    }
    public function confirmOrder(Request $request){
        DB::transaction(function () use ($request){

    //    Add Customer
       $Query  = new Contact();
       $Query->type = "Customer";
       $Query->first_name = $request->fName;
       $Query->last_name = $request->lName;
       $Query->shipping_address = $request->shipping_address;
       $Query->mobile = $request->mobile;
       $Query->is_active = 1;
       $Query->branch_id = 1;
       $Query->created_by = 1;
       $Query->save();

    //    Add Order
       $Order=new Order();
       $Order->contact_id=$Query->id;
       $Order->order_date=Carbon::now();
            //    Cart Detail
             $AddToCart=AddToCard::get();
            //    Cart Detail
       $Order->total_amount=$AddToCart->sum('total_price');
       $Order->status='pending';
       $Order->is_active=1;
       $Order->save();

        // Add To Order Details
        foreach($AddToCart as $OrderProductDetail){
        $OrderProductDetails=json_decode($OrderProductDetail->data);
        $OrderDetails=new OrderDetail();
        $OrderDetails->order_id=$Order->id;
        $OrderDetails->product_id=$OrderProductDetails->product_id;
        $OrderDetails->unit_price=$OrderProductDetail->unit_price;
        $OrderDetails->quantity=$OrderProductDetail->quantity;
        $OrderDetails->is_active=1;
        $OrderDetails->save();
        }

    //   Delete Add To Cart
         AddToCard::whereId(28)->delete();

       });

       return redirect()->route('/order-completed');

    }
    public function searchByBrand($brandId=NULL){
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereBrandId($brandId)->get()->toArray();
        return view('frontend.all_product',[
            'data'=>$data,
            // 'productDetails'=>Product::whereCategoryId($catId)->get(),
        ]);
    }
    public function searchBySubSubCategory($subSubCatId=NULL){
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereSubSubCategoryId($subSubCatId)->get()->toArray();
        return view('frontend.all_product',[
            'data'=>$data,
            // 'productDetails'=>Product::whereCategoryId($catId)->get(),
        ]);
    }
    public function searchBySubCategory($subCatId=NULL){
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereSubCategoryId($subCatId)->get()->toArray();
        return view('frontend.all_product',[
            'data'=>$data,
            // 'productDetails'=>Product::whereCategoryId($catId)->get(),
        ]);
    }
    public function searchByCategory($catId=NULL){
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereCategoryId($catId)->get()->toArray();
        return view('frontend.all_product',[
            'data'=>$data,
            // 'productDetails'=>Product::whereCategoryId($catId)->get(),
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
