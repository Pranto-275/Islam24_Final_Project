<?php

declare(strict_types=1);

namespace App\Http\Controllers\FrontEnt;

use App\Http\Controllers\Controller;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\ContactUs\Message;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\Setting\BreakingNews;
use App\Models\Backend\Setting\ShippingCharge;
use App\Models\District;
use App\Models\Division;
use App\Models\FrontEnd\AddToCard;
use App\Models\FrontEnd\Order;
use App\Models\FrontEnd\OrderDetail;
use App\Models\Upazila;
use App\Models\User;
use App\Services\AddToCardService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public $OrdetCode;
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

    public function SearchUpazila(Request $request)
    {
        $data['products'] = $this->addToCardService::cardTotalProductAndAmount();
        $upazillas = DB::table('upazilas')->where('district_id', '=', 1)->get();

        return view('frontend.check-out', ['data' => $data, 'shipping_charge' => ShippingCharge::whereIsActive(1)->get(), 'zillas' => DB::table('districts')->get(), 'upazillas' => $upazillas]);
    }

    public function EditShippingAddress(Request $request)
    {
        $QueryUpdate = Contact::whereUserId(Auth::user()->id)->first();
        $QueryUpdate->shipping_address = $request->shipping_address;
        $QueryUpdate->district_id = $request->district_id;
        $QueryUpdate->mobile = $request->mobile;
        $QueryUpdate->business_name = $request->business_name;
        $QueryUpdate->created_by = Auth::user()->id;
        $QueryUpdate->save();

        return back();
    }

    public function CustomerLogin()
    {
        return view('frontend.customer-login');
    }

    public function ChangeProfilePhoto(Request $request)
    {
        $this->validate($request, [
            'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->profile_photo_path->extension();

        $request->profile_photo_path->move(public_path('images'), $imageName);

        $User = User::find(Auth::user()->id);

        $User->profile_photo_path = $imageName;
        $User->save();

        return redirect()->back();
    }

    public function EditContactById(Request $request)
    {
        $Query = User::find(Auth::user()->id);
        $Query->name = $request->name;
        $Query->mobile = $request->mobile;
        $Query->email = $request->email;
        $Query->address = $request->address;
        $Query->save();

        return redirect()->back();
    }

    public function ChangePassword(Request $request)
    {
        // dd($request->oldpassword);

        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'password_confirmation' => 'required_with:oldpassword|same:newpassword|min:6',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            if (!Hash::check($request->newpassword, $hashedPassword)) {
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);
                User::where('id', Auth::user()->id)->update(['password' => $users->password]);

                //   session()->flash('message','password updated successfully');
                //   return redirect()->back();
                return redirect()->route('my-account');
            }
        }
    }

    public function MyAccount()
    {
        // dd(Contact::whereCreatedBy(Auth::user()->id)->get());
        if (Auth::user()) {
            return view('frontend.my-account', [
                'contacts' => Contact::whereUserId(Auth::user()->id)->get(),
                'contact' => Contact::whereUserId(Auth::user()->id)->first(),
                'Districts' => District::orderBy('name', 'asc')->get(),
            ]);
        } else {
            return view('frontend.sign-in');
        }
    }

    public function index(Request $request)
    {
        $data['html'] = view('frontend.header-card-popup')->render();
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereIsActive(1)->limit(50)->get()->toArray();
        $data['products_desc'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereFeatured('New Product')->whereIsActive(1)->limit(6)->orderBy('id', 'desc')->get()->toArray();
        // dd($data['products'][1]['product_image_first']['image']);
        return view('frontend.home', [
            'data' => $data,
            // 'BreakingNews'=>BreakingNews::get(),
        ]);
    }

    public function orderComplete($id = null)
    {
        // dd($id);
        $order = $id;
        //  dd($order);
        return view('frontend.order-completed', compact('order'));
    }

    public function confirmOrder(Request $request)
    {
        // dd($request->fName);
        $request->validate([
            'business_name' => 'required',
            'fName' => 'required',
            'mobile' => 'required',
        ]);
        DB::transaction(function () use ($request) {
            $sessionId = Session::getId();
            //    Add Customer
            $Query = Contact::whereMobile($request->mobile)->firstOrNew();
            $Query->type = 'Customer';
            // $Query->user_id = Auth::user()->id;
            $Query->first_name = $request->fName;
            $Query->last_name = $request->lName;
            $Query->shipping_address = $request->shipping_address;
            $Query->business_name = $request->business_name;
            $Query->division_id = $request->division_id;
            $Query->district_id = $request->district_id;
            $Query->upazila_id = $request->upazila_id;
            $Query->mobile = $request->mobile;
            $Query->is_active = 1;
            $Query->branch_id = 1;
            $Query->created_by = 1;
            $Query->save();

            //    Add Order
            $Order = new Order();
            $Order->code = 'OC'.floor(time() - 999999999);
            $Order->contact_id = $Query->id;
            $Order->order_date = Carbon::now();
            //    Cart Detail
            $AddToCart = AddToCard::wheresessionId($sessionId)->get();
            //    Cart Detail
            $Order->total_amount = $AddToCart->sum('total_price');
            // $Order->shipping_charge = $request->get('shipping_charge'); //$request->get('check_out_total_amount');
            $Order->payable_amount = ($AddToCart->sum('total_price')); //+ $request->get('shipping_charge')); //$request->get('check_out_total_amount');
            $Order->status = 'processing';
            $Order->is_active = 1;
            $Order->save();

            // Add To Order Details
            foreach ($AddToCart as $OrderProductDetail) {
                $OrderProductDetails = json_decode($OrderProductDetail->data);
                $OrderDetails = new OrderDetail();
                $OrderDetails->order_id = $Order->id;
                $OrderDetails->product_id = $OrderProductDetails->product_id;
                $OrderDetails->unit_price = $OrderProductDetail->unit_price;
                $OrderDetails->quantity = $OrderProductDetail->quantity;
                $OrderDetails->is_active = 1;
                $OrderDetails->save();
            }

            //   Delete Add To Cart
            AddToCard::wheresessionId($sessionId)->delete();
            // $this->orderComplete($Order->id);
            $this->OrdetCode = $Order->code;
        });
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Successfully',
        //     'redirect_url' => route('order-completed'),
        // ]);
        return View('frontend.order-completed', [
            'orderCode' => $this->OrdetCode,
        ]);
        // return redirect(route('order-completed'));
        //    return redirect()->route('/order-completed');
    }

    public function searchByBrand($brandId = null)
    {
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereBrandId($brandId)->whereIsActive(1)->get()->toArray();

        return view('frontend.all_product', [
            'data' => $data,
            // 'productDetails'=>Product::whereCategoryId($catId)->get(),
        ]);
    }

    public function searchBySubSubCategory($subSubCatId = null)
    {
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereSubSubCategoryId($subSubCatId)->whereIsActive(1)->get()->toArray();

        return view('frontend.all_product', [
            'data' => $data,
            // 'productDetails'=>Product::whereCategoryId($catId)->get(),
        ]);
    }

    public function searchBySubCategory($subCatId = null)
    {
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereSubCategoryId($subCatId)->whereIsActive(1)->get()->toArray();

        return view('frontend.all_product', [
            'data' => $data,
            // 'productDetails'=>Product::whereCategoryId($catId)->get(),
        ]);
    }

    public function searchByCategory($catId = null)
    {
        if ($catId) {
            $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereCategoryId($catId)->whereIsActive(1)->limit(100)->get()->toArray();
        } else {
            $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->whereIsActive(1)->limit(100)->get()->toArray();
        }

        return view('frontend.all_product', [
            'data' => $data,
            // 'productDetails'=>Product::whereCategoryId($catId)->get(),
        ]);
    }

    public function addToCardStore(Request $request): array
    {
        $quantity = $request->get('product_quantity') ? $request->get('product_quantity') : 1;

        return $this->addToCardService::addCardStore($request->get('product_id'), $quantity);
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function cartProductQuantityUpdate(Request $request): array
    {
        $quantity = $request->get('quantity');
        /*if ($request->get('state') == 'decrease') {
            $quantity = ($quantity * (-1));
        }

        dd($quantity);*/

        return $this->addToCardService::addCardStore($request->get('product_id'), $quantity);
    }

    public function cartProductDelete(Request $request)
    {
        return $this->addToCardService::productDelete($request->get('product_id'));
    }

    public function checkOut()
    {
        $data['products'] = $this->addToCardService::cardTotalProductAndAmount();

        return view('frontend.check-out', ['data' => $data, 'shipping_charge' => ShippingCharge::whereIsActive(1)->get(), 'Divisions' => Division::all(), 'Districts' => District::orderBy('name', 'asc')->get(), 'Upazilas' => Upazila::all()]);
    }

    public function messages(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $Query = new Message();
            $Query->first_name = $request->first_name;
            $Query->last_name = $request->last_name;
            $Query->email = $request->email;
            $Query->phone = $request->phone;
            $Query->subject = $request->subject;
            $Query->message = $request->message;
            $Query->user_id = 1;
            $Query->save();
        });

        return redirect()->back()->with('message', 'Complain has been sent Successfully');
    }

    public function productDetails($id = null)
    {
        $ProductDetail = Product::whereId($id)->first();
        $data['products'] = $this->product->with(['ProductImageFirst', 'ProductImageLast'])->where('id', '!=', $id)->whereCategoryId($ProductDetail->category_id)->get()->toArray();

        return view('frontend.product-details', [
            'productDetails' => $ProductDetail,
            'data' => $data,
        ]);
    }

    public function productSearch(Request $request)
    {
        $query = $this->product->with(['ProductImageFirst', 'ProductImageLast']);

        if ($request->get('search_product_name')) {
            $query->where('name', 'like', '%'.$request->get('search_product_name').'%');
        }
        if ($request->get('search_product_category')) {
            $query->where('sub_sub_category_id', $request->get('search_product_category'));
        }

        $data['products'] = $query->whereIsActive(1)->get()->toArray();

        return view('frontend.all_product', [
            'data' => $data,
        ]);
    }
}
