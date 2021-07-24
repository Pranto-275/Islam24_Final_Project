<?php

use App\Http\Controllers\DatatableController;
use App\Http\Livewire\Backend\ContactInfo\ContactCategory;
use App\Http\Livewire\Backend\ContactInfo\Customer as CustomerInfo;
use App\Http\Livewire\Backend\ContactInfo\Staff;
use App\Http\Livewire\Backend\ContactInfo\Supplier;
use App\Http\Livewire\Backend\Inventory\Invoice;
use App\Http\Livewire\Backend\Inventory\Purchase;
use App\Http\Livewire\Backend\Inventory\PurchaseList;
use App\Http\Livewire\Backend\Inventory\StockAdjustment;
use App\Http\Livewire\Backend\Inventory\StockManager;
use App\Http\Livewire\Backend\Order\Order;
use App\Http\Livewire\Backend\Order\OrderList;
use App\Http\Livewire\Backend\Order\PrintOrder;
use App\Http\Livewire\Backend\ProductInfo\Brand;
use App\Http\Livewire\Backend\ProductInfo\Category;
use App\Http\Livewire\Backend\ProductInfo\Color;
use App\Http\Livewire\Backend\ProductInfo\Product;
use App\Http\Livewire\Backend\ProductInfo\ProductList;
use App\Http\Livewire\Backend\ProductInfo\Size;
use App\Http\Livewire\Backend\ProductInfo\SubCategory;
use App\Http\Livewire\Backend\ProductInfo\SubSubCategory;
use App\Http\Livewire\Backend\ProductInfo\Unit;
use App\Http\Livewire\Backend\Report\CouponsReport;
use App\Http\Livewire\Backend\Report\CustomerLedger;
use App\Http\Livewire\Backend\Report\OrderReport;
use App\Http\Livewire\Backend\Report\ProfitLoss;
use App\Http\Livewire\Backend\Report\PurchaseDetailsReport;
use App\Http\Livewire\Backend\Report\PurchaseReport;
use App\Http\Livewire\Backend\Report\PurchaseReturnReport;
use App\Http\Livewire\Backend\Report\SaleDetailsReport;
use App\Http\Livewire\Backend\Report\SaleReport;
use App\Http\Livewire\Backend\Report\SalesReturnReport;
use App\Http\Livewire\Backend\Report\StockAdjustmentReport;
use App\Http\Livewire\Backend\Report\StockReport;
use App\Http\Livewire\Backend\Report\SupplierLedger;
use App\Http\Livewire\Backend\setting\Branch;
use App\Http\Livewire\Backend\setting\CompanyInfo;
use App\Http\Livewire\Backend\Setting\CouponCode;
use App\Http\Livewire\Backend\setting\Currency;
use App\Http\Livewire\Backend\Setting\DeliveryMethod;
use App\Http\Livewire\Backend\Setting\InvoiceSetting;
use App\Http\Livewire\Backend\Setting\PaymentMethod;
use App\Http\Livewire\Backend\Setting\PointPolicy;
use App\Http\Livewire\Backend\Setting\Slider;
use App\Http\Livewire\Backend\Setting\Vat;
use App\Http\Livewire\Backend\Setting\Warehouse;
use App\Http\Livewire\Backend\Transaction\CustomerPayment;
use App\Http\Livewire\Backend\Transaction\CustomerPaymentReport;
use App\Http\Livewire\Backend\Transaction\Payment;
use App\Http\Livewire\Frontend\About as AboutUs;
use App\Http\Livewire\Frontend\Cart;
use App\Http\Livewire\Frontend\Category as FrontEndCategory;
use App\Http\Livewire\Frontend\CategoryWiseProduct;
use App\Http\Livewire\FrontEnd\CheckOut;
use App\Http\Livewire\Frontend\Contact as ContactUs;
use App\Http\Livewire\Frontend\Customer;
use App\Http\Livewire\Frontend\Error;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\OrderCompleted;
use App\Http\Livewire\Frontend\ProductView;
use App\Http\Livewire\Frontend\SignIn;
use App\Http\Livewire\Frontend\SignUp;
use App\Http\Livewire\Frontend\TermsConditios;
use App\Http\Livewire\Frontend\Wishlist;
use App\Http\Livewire\Inventory\DelieveryMethod;
use App\Http\Livewire\Inventory\Language;
use App\Http\Livewire\UserManagement\UserList;
use App\Http\Livewire\UserProfile\AuthLockScreen;
use App\Http\Livewire\UserProfile\ChangePassword;
use App\Http\Livewire\UserProfile\ProfileSettings;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
     return view('auth.login');
 });
Route::group(['prefix' => 'customer'], function () {
    Route::get('customer_login', Customer::class)->name('customer_login');
    Route::get('category_wise_product/{id?}', CategoryWiseProduct::class)->name('category_wise_product');
    Route::get('product_view/{id?}', ProductView::class)->name('product_view');
});

Route::get('/', Home::class)->name('home');
Route::get('product-view', ProductView::class)->name('product-view');
Route::get('category', FrontEndCategory::class)->name('category');
Route::get('sign-in', SignIn::class)->name('sign-in');
Route::get('sign-up', SignUp::class)->name('sign-up');
Route::get('cart', Cart::class)->name('cart');
Route::get('check-out', Checkout::class)->name('check-out');
Route::get('contact-us', ContactUs::class)->name('contact-us');
Route::get('terms-conditios', TermsConditios::class)->name('terms-conditios');

Route::get('about', AboutUs::class)->name('about');
Route::get('error', Error::class)->name('error');
Route::get('order-completed', OrderCompleted::class)->name('order-completed');

Route::get('wish-list', Wishlist::class)->name('wish-list');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('livewire.dashboard');
})->name('dashboard');

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'user-management', 'as' => 'user-management.'], function () {
        Route::get('user-list', UserList::class)->name('user-list');
    });
    Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
        Route::get('category', Category::class)->name('category');
        Route::get('currency', Currency::class)->name('currency');
        Route::get('language', Language::class)->name('language');
        // Route::get('pointPolicy', PointPolicy::class)->name('pointPolicy');
        Route::get('delivery-method', DelieveryMethod::class)->name('delivery-method');
        Route::get('ware-house', WareHouse::class)->name('ware-house');
        Route::get('purchase/{id?}', Purchase::class)->name('purchase');
        Route::get('purchase-list', PurchaseList::class)->name('purchase-list');
    });
    Route::group(['prefix' => 'user-profile', 'as' => 'user-profile.'], function () {
        Route::get('profile-settings', ProfileSettings::class)->name('profile-settings');
        Route::get('change-password', ChangePassword::class)->name('change-password');
        Route::get('auth-lock-screen', AuthLockScreen::class)->name('auth-lock-screen');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('category', Category::class)->name('category');
        Route::get('sub-category', SubCategory::class)->name('sub-category');
        Route::get('brand', Brand::class)->name('brand');
        Route::get('product/{id?}', Product::class)->name('product');
        Route::get('product-list', ProductList::class)->name('product-list');
        Route::get('sub-sub-category', SubSubCategory::class)->name('sub-sub-category');
        Route::get('unit', Unit::class)->name('unit');
        Route::get('color', Color::class)->name('color');
        Route::get('size', Size::class)->name('size');
    });

    Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
        Route::get('invoice', Invoice::class)->name('invoice');
        Route::get('stock-adjustment', StockAdjustment::class)->name('stock-adjustment');
        Route::get('stock-manager', StockManager::class)->name('stock-manager');
    });
    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('company', CompanyInfo::class)->name('company');
        Route::get('branch', Branch::class)->name('branch');
        Route::get('currency', Currency::class)->name('currency');
        Route::get('delivery-method', DeliveryMethod::class)->name('delivery-method');
        Route::get('invoice-setting', InvoiceSetting::class)->name('invoice-setting');
        Route::get('payment-method', PaymentMethod::class)->name('payment-method');
        Route::get('coupon-code', CouponCode::class)->name('coupon-code');
        Route::get('vat', Vat::class)->name('vat');
        Route::get('warehouse', Warehouse::class)->name('warehouse');
        Route::get('slider', Slider::class)->name('slider');
        Route::get('point-policy', PointPolicy::class)->name('point-policy');
    });

    Route::group(['prefix' => 'order',  'as' => 'order.'], function () {
        Route::get('order/{id?}', Order::class)->name('order');
        Route::get('order-list', OrderList::class)->name('order-list');
        Route::get('print-order', PrintOrder::class)->name('print-order');
    });

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
        Route::get('payment', Payment::class)->name('payment');
        Route::get('customer-payment', CustomerPayment::class)->name('customer-payment');
        Route::get('customer-payment-report', CustomerPaymentReport::class)->name('customer-payment-report');
    });

    Route::group(['prefix' => 'contact-info', 'as' => 'contact-info.'], function () {
        Route::get('contact-category', ContactCategory::class)->name('contact-category');
        Route::get('customer', CustomerInfo::class)->name('customer');
        Route::get('supplier', Supplier::class)->name('supplier');
        Route::get('staff', Staff::class)->name('staff');
    });

    Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('stock-report', StockReport::class)->name('stock-report');
        Route::get('order-report', OrderReport::class)->name('order-report');
    });

    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('index', [DatatableController::class, 'index'])->name('index');

        Route::get('user-table', [DatatableController::class, 'UserTable'])->name('user_table');
    });

    Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('stock-adjustment-report', StockAdjustmentReport::class)->name('stock-adjustment-report');

        Route::get('purchase-report', PurchaseReport::class)->name('purchase-report');
        Route::get('sale-report', SaleReport::class)->name('sale-report');
        Route::get('purchase-details-report', PurchaseDetailsReport::class)->name('purchase-details-report');
        Route::get('sale-details-report', SaleDetailsReport::class)->name('sale-details-report');
        Route::get('purchase-return-report', PurchaseReturnReport::class)->name('purchase-return-report');
        Route::get('sales-return-report', SalesReturnReport::class)->name('sales-return-report');
        Route::get('supplier-ledger', SupplierLedger::class)->name('supplier-ledger');
        Route::get('customer-ledger', CustomerLedger::class)->name('customer-ledger');
        Route::get('coupons-report', CouponsReport::class)->name('coupons-report');
        Route::get('profit-loss', ProfitLoss::class)->name('profit-loss');
    });

    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('category_table', [DatatableController::class, 'CategoryTable'])->name('category_table');
        Route::get('sub_category_table', [DatatableController::class, 'SubCategoryTable'])->name('sub_category_table');
        Route::get('sub_sub_category_table', [DatatableController::class, 'SubSubCategoryTable'])->name('sub_sub_category_table');
        Route::get('product_table', [DatatableController::class, 'ProductTable'])->name('product_table');
        Route::get('branch_table', [DatatableController::class, 'BranchTable'])->name('branch_table');
        Route::get('currency_table', [DatatableController::class, 'CurrencyTable'])->name('currency_table');
        Route::get('delivery_method_table', [DatatableController::class, 'DeliveryMethodTable'])->name('delivery_method_table');
        Route::get('warehouse_table', [DatatableController::class, 'WarehouseTable'])->name('warehouse_table');
        Route::get('unit_table', [DatatableController::class, 'UnitTable'])->name('unit_table');
        Route::get('slider_table', [DatatableController::class, 'SliderTable'])->name('slider_table');
        Route::get('brand_table', [DatatableController::class, 'BrandTable'])->name('brand_table');
        Route::get('invoiceSetting_table', [DatatableController::class, 'InvoiceSettingTable'])->name('invoiceSetting_table');
        Route::get('vat_table', [DatatableController::class, 'VatTable'])->name('vat_table');
        Route::get('coupon_table', [DatatableController::class, 'CouponTable'])->name('coupon_table');
        Route::get('paymentMethod_table', [DatatableController::class, 'paymentMethodTable'])->name('paymentMethod_table');
        Route::get('invoiceSave', [DatatableController::class, 'InvoiceTable'])->name('invoiceSave');
        Route::get('customer_table', [DatatableController::class, 'CustomerTable'])->name('customer_table');
        Route::get('supplier_table', [DatatableController::class, 'SupplierTable'])->name('supplier_table');
        Route::get('staff_table', [DatatableController::class, 'StaffTable'])->name('staff_table');
        Route::get('contact_category_table', [DatatableController::class, 'ContactCategoryTable'])->name('contact_category_table');
        Route::get('purchase_invoice', [DatatableController::class, 'PurchaseInvoiceTable'])->name('purchase_invoice');
    });
});
