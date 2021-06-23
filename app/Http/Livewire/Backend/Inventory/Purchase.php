<?php

namespace App\Http\Livewire\Backend\Inventory;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Setting\PaymentMethod;
use App\Models\Backend\Transaction\Payment;
use App\Models\Backend\ProductInfo\Category;
use App\Models\Backend\ProductInfo\Unit;
use App\Models\Backend\Setting\Branch;
use App\Models\Backend\Setting\Vat;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\ProductInfo\ProductImage;
use App\Models\Backend\Inventory\Invoice;
use App\Models\Backend\ProductInfo\ProductProperties;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Purchase extends Component
{
    public $code;
    public $date;
    public $contact_id;
    public $image;
    public $product_quantity;
    public $product_sale_price;
    public $Product;
    public $product_discount;
    public $product_subtotal;
    public $subtotal;
    public $grand_total;
    public $discount;
    public $product_rate;
    public $shipping_charge;
    public $due;
    public $paid_amount;
    public $payment_method_id;
    public $payment_amount;
    public $payment_code;
    public $Invoice;
    public $paymentMethodList = [];
    public $orderProductList = [];
    protected $listeners = [
        'product_search' => 'AddProduct',
        'payment_method_search' => 'AddPaymentMethod',
    ];
    public function Submit(){
        $this->validate([
            'code' => 'required',
            'contact_id' => 'required',
            'date' => 'required',
            'subtotal' => 'required',
        ]);
        DB::transaction(function(){
        if($this->Invoice){
            $Query = Invoice::find($this->Invoice->id);
        }else{
            $Query = new Invoice();
            $Query->user_id = Auth::id();
            $Query->type = 'Purchase';
        }
        $Query->date = $this->date;
        $Query->code = $this->code;
        $Query->contact_id = $this->contact_id;
        $Query->subtotal = $this->subtotal;
        $Query->discount = $this->discount;
        $Query->grand_total = $this->grand_total;
        $Query->branch_id = '1';
        $Query->save();

        foreach ($this->orderProductList as $key => $value) {
            // dd($this->orderItemList);
            $item = Product::find($key);
            // $Stock = StockManager::whereProductId($key)->whereInvoiceId($Query->id)->first();
            // if (!$Stock) {
            //     $Stock = new StockManager();
            //     $Stock->user_id = Auth::id();
            //     $Stock->branch_id = 1;
            // }
            $Stock = new StockManager();
            $Stock->user_id = Auth::id();
            $Stock->branch_id = 1;

            $Stock->code = $this->code;
            $Stock->date = $this->date;
            $Stock->invoice_id = $Query->id;
            // $Stock->contact_id = $Query->contact_id;
            // $Stock->item_id = $key;
            // $Stock->unit_id = $item->unit_id;
            // $Stock->vat_id = $item->vat_id;
            $Stock->quantity = $this->product_quantity[$key];
            $Stock->price = $this->product_rate[$key];
            $Stock->purchase_price = $this->product_rate[$key];
            $Stock->discount = $this->product_discount[$key];
            $Stock->purchase_subtotal = $this->product_rate[$key] * $this->product_quantity[$key];
            $Stock->sale_subtotal = $this->product_rate[$key] * $this->product_quantity[$key];
            // $Stock->save();
        }
        foreach ($this->paymentMethodList as $key => $value) {
            if (isset($value['id']) && $value['id']) {
                $Payment = Payment::find($value['id']);
            } else {
                $Payment = new Payment();
            }
            $Payment->type = 'SupplierPayment';
            $Payment->date = $Query->date;
            $Payment->contact_id = $Query->contact_id;
            $Payment->invoice_id = $Query->id;
            $Payment->payment_method_id = $value['payment_method_id'];
            $Payment->amount = $value['payment_amount'];
            $Payment->code = $value['payment_code'];
            $Payment->user_id = Auth::id();
            $Payment->branch_id = 1;
            $Payment->save();
        }
    });
    $this->emit('success', [
        'text' => 'Purchase Added Successfully',
    ]);
        if(!$this->Invoice){
         $this->reset();
        }
    }

    public function removePaymentList($itemId)
    {
        $cart = collect($this->paymentMethodList);
        $cart->pull($itemId);
        $this->paymentMethodList = $cart;
        $this->updateProductCal();
    }
    public function AddPaymentMethod()
    {
        $PaymentMethod = PaymentMethod::find($this->payment_method_id);

        $paymentMethodList = collect($this->paymentMethodList);
        $cartItem = [
            'id' => null,
            'payment_method_id' => $PaymentMethod->id,
            'payment_method_name' => $PaymentMethod->name,
            'payment_amount' => $this->payment_amount,
            'payment_code' => $this->payment_code,
        ];
        $this->paymentMethodList = $paymentMethodList->push($cartItem);
        $key = $paymentMethodList->keys()->last();
        $payment_amount_total = 0;
        foreach ($this->paymentMethodList as $key => $amount) {
            $payment_amount_total += $amount['payment_amount'];
        }
        $this->paid_amount = $payment_amount_total;
        $this->reset(['payment_method_id', 'payment_amount']);
        $this->updateProductCal();

    }
    public function updateProductCal()
    {
        $grandTotal = 0;

        foreach ($this->orderProductList as $key => $value) {
            if (is_numeric($this->product_sale_price[$key]) && is_numeric($this->product_quantity[$key])&& is_numeric($this->product_discount[$key])) {
                $this->product_subtotal[$key] = $this->product_rate[$key] * $this->product_quantity[$key]- floatval($this->product_discount[$key]);
                $grandTotal += $this->product_subtotal[$key];
            }
        }

        $this->grand_total = $grandTotal;
        $this->subtotal = $grandTotal;
        $this->grand_total=$this->grand_total-$this->discount+$this->shipping_charge;
        $this->due=$this->grand_total-$this->paid_amount;
    }
    public function removeProduct($productId)
    {
        $cart = collect($this->orderProductList);
        $cart->pull($productId);
        $this->orderProductList = $cart;
    }
    public function AddProduct($product){
        $cart = collect($this->orderProductList);
        if (isset($cart[$product['id']])) {
            $cart[$product['id']] = $product;
            $this->product_quantity[$product['id']] = $this->product_quantity[$product['id']] + 1;
        } else {
            $cart[$product['id']] = $product;
            $this->Product=Product::find($product['id']);
            $this->product_quantity[$product['id']] = 1;
            $this->product_rate[$product['id']] = $product['purchase_price'];
            $this->product_sale_price[$product['id']] = $product['sale_price'];
            $this->product_discount[$product['id']] = $product['discount'];
            $this->product_subtotal[$product['id']] = 0;
        }
        $this->orderProductList = $cart->toArray();
        $this->updateProductCal();
    }

    public function mount(){
        $this->code = 'P'.floor(time() - 999999999);
        $this->payment_code = 'P'.floor(time() - 999999999);
    }
    public function productSave()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'sub_sub_category_id' => 'required',
            'contact_id' => 'required',
        ]);

        DB::transaction(function(){
        // Product
        if($this->ProductId){
            $Query = Product::find($this->ProductId);
        }else{
            $Query = new Product();
            $Query->user_id = Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->sale_price = $this->sale_price;
        $Query->wholesale_price = $this->wholesale_price;
        $Query->purchase_price = $this->purchase_price;
        $Query->sub_sub_category_id = $this->sub_sub_category_id;
        $Query->low_alert = $this->low_alert;
        $Query->contact_id = $this->contact_id;
        $Query->old_sale_price = 123;
        $Query->vat_id = 1;
        $Query->status = $this->status;
        $Query->branch_id = 1;
        $Query->save();
        //Product Image
        foreach($this->images as $image){
            $ImageInsert=new ProductImage();
            $ImageInsert->product_id=$Query->id;
            $path = $image->store('/public/photo');
            $ImageInsert->image = basename($path);
            $ImageInsert->user_id = Auth::user()->id;
            $ImageInsert->branch_id = 1;
            $ImageInsert->save();
        }
        //Product Properties
        $ProductProperties=new ProductProperties();
        $ProductProperties->product_id=$Query->id;
        $ProductProperties->size="XL";
        $ProductProperties->color="Yellow";
        $ProductProperties->user_id = Auth::user()->id;
        $ProductProperties->branch_id = 1;
        $ProductProperties->save();
     });
        $this->reset();
        $this->emit('success', [
            'text' => 'Product C/U Successfully',
        ]);
    }
    public function render()
    {
        return view('livewire.backend.inventory.purchase',[
            'contacts'=>Contact::get(),
            'payments'=>PaymentMethod::get(),
            'categories'=> Category::get(),
            'Units' => Unit::all(),
            'vats'=> Vat::get(),
            'branches'=> Branch::get(),
        ]);
    }
}
