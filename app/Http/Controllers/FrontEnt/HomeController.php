<?php

declare(strict_types=1);

namespace App\Http\Controllers\FrontEnt;

use App\Http\Controllers\Controller;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\ContactUs\Message;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\Setting\ShippingCharge;
use App\Models\FrontEnd\AddToCard;
use App\Models\FrontEnd\Order;
use App\Models\FrontEnd\OrderDetail;
use App\Models\FrontEnd\Vendor;
use App\Models\User;
use App\Models\ProductInfo\Category;
use App\Services\AddToCardService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{  
    public function UserIndex(){
        return view('frontend.cart');
    }
    public function ImamIndex(){
        return view('frontend.about');
    }
    public function index(Request $request)
    {
        return view('frontend.home');
    }
    public function SignInPage(){
        return view('frontend.sign_in');
    }
}
