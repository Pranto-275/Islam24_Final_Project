<?php

namespace App\Http\Livewire\Backend\Inventory;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Setting\PaymentMethod;
use App\Models\Backend\ProductInfo\Category;
use App\Models\Backend\ProductInfo\Unit;
use App\Models\Backend\Setting\Branch;
use App\Models\Backend\Setting\Vat;
use App\Models\Backend\ProductInfo\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Purchase extends Component
{
    public $code;
    public $Invoice ;
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
    public $paymentMethodList = [];
    public $orderProductList = [];
    protected $listeners = [
        'product_search' => 'AddProduct',
        'payment_method_search' => 'AddPaymentMethod',
    ];
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
