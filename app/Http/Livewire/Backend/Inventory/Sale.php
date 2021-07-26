<?php

namespace App\Http\Livewire\Backend\Inventory;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Setting\PaymentMethod;
use App\Models\Backend\ProductInfo\Category;
use App\Models\Backend\ProductInfo\Unit;
use App\Models\Backend\Setting\Branch;
use App\Models\Backend\Setting\Vat;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\Inventory\SaleInvoice;
use App\Models\Backend\Inventory\SaleInvoiceDetail;
use App\Models\Backend\Inventory\SalePayment;
use App\Models\Backend\Setting\Warehouse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Sale extends Component
{
    public $code;
    public $date;
    public $contact_id;
    public $warehouse_id;
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
    public $SaleInvoice;
    public $sub_sub_category_id;
    public $name;
    public $images;
    public $regular_price;
    public $special_price;
    public $wholesale_price;
    public $purchase_price;
    public $transaction_id;
    public $low_alert;
    public $is_active;
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
        if($this->SaleInvoice){
            $Query = SaleInvoice::find($this->SaleInvoice->id);
        }else{
            $Query = new SaleInvoice();
            $Query->created_by = Auth::id();
        }
        $Query->sale_date = $this->date;
        // $Query->code = $this->code;
        $Query->contact_id = $this->contact_id;
        $Query->total_amount = $this->subtotal;
        $Query->discount = $this->discount;
        $Query->shipping_charge = $this->shipping_charge;
        $Query->payable_amount = $this->grand_total;
        $Query->branch_id = '1';
        $Query->save();
        foreach ($this->orderProductList as $key => $value) {
            // dd($this->orderProductList);
            $product = Product::find($key);
            $SaleInvoiceDetail = SaleInvoiceDetail::whereProductId($key)->whereSaleInvoiceId($Query->id)->first();
            if (!$SaleInvoiceDetail) {
                $SaleInvoiceDetail = new SaleInvoiceDetail();
                $SaleInvoiceDetail->created_by = Auth::id();
                $SaleInvoiceDetail->branch_id = 1;
            }

            $SaleInvoiceDetail->sale_invoice_id = $Query->id;
            $SaleInvoiceDetail->product_id = $product->id;
            $SaleInvoiceDetail->unit_price=$this->product_rate[$key];
            $SaleInvoiceDetail->quantity = $this->product_quantity[$key];
            $SaleInvoiceDetail->save();
        }
        foreach ($this->paymentMethodList as $key => $value) {
            if (isset($value['id']) && $value['id']) {
                $SalePayment = SalePayment::find($value['id']);
            } else {
                $SalePayment = new SalePayment();
            }

            $SalePayment->date = Carbon::now();
            $SalePayment->contact_id = $Query->contact_id;
            $SalePayment->sale_invoice_id = $Query->id;
            $SalePayment->payment_method_id = $value['payment_method_id'];
            $SalePayment->total_amount = $value['payment_amount'];
            $SalePayment->transaction_id = $value['transaction_id'];
            $SalePayment->code = $value['payment_code'];
            $SalePayment->created_by = Auth::id();
            $SalePayment->branch_id = 1;
            $SalePayment->save();
        }
    });
    $this->emit('success', [
        'text' => 'Purchase Added Successfully',
    ]);
        if(!$this->SaleInvoice){
         $this->reset();
        }
        $this->payment_code = 'PM'.floor(time() - 999999999);
        $this->code = 'PR'.floor(time() - 999999999);
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
        $this->validate([
            'payment_method_id' => 'required',
            'payment_amount' => 'required',
        ]);
        $PaymentMethod = PaymentMethod::find($this->payment_method_id);
        $paymentMethodList = collect($this->paymentMethodList);
        $cartItem = [
            'id' => null,
            'payment_method_id' => $PaymentMethod->id,
            'payment_method_name' => $PaymentMethod->name,
            'payment_amount' => $this->payment_amount,
            'payment_code' => $this->payment_code,
            'transaction_id' => $this->transaction_id,
        ];
        $this->paymentMethodList = $paymentMethodList->push($cartItem);
        $key = $paymentMethodList->keys()->last();
        $payment_amount_total = 0;
        foreach ($this->paymentMethodList as $key => $amount) {
            $payment_amount_total += $amount['payment_amount'];
        }
        $this->paid_amount = $payment_amount_total;
        $this->reset(['payment_method_id', 'payment_amount']);
        $this->payment_code = 'PM'.floor(time() - 999999999);
        $this->updateProductCal();

    }
    public function updateProductCal()
    {
        $grandTotal = 0;

        foreach ($this->orderProductList as $key => $value) {
            if (is_numeric($this->product_rate[$key]) && is_numeric($this->product_quantity[$key]) && is_numeric($this->product_discount[$key])) {
                $this->product_subtotal[$key] = $this->product_rate[$key] * $this->product_quantity[$key] - floatval($this->product_discount[$key]);
                $grandTotal += $this->product_subtotal[$key];
            }
        }

        $this->grand_total = $grandTotal;
        $this->subtotal = $grandTotal;
        if ((is_numeric($this->shipping_charge) && !empty($this->shipping_charge && isset($this->shipping_charge))) || is_numeric($this->discount) && !empty($this->discount) || is_numeric($this->paid_amount) && !empty($this->paid_amount)) {
            $this->grand_total = $this->grand_total - floatval($this->discount) + floatval($this->shipping_charge);
            $this->due = $this->grand_total -  floatval($this->paid_amount);
         }
    }
    public function removeProduct($productId)
    {
        $cart = collect($this->orderProductList);
        $cart->pull($productId);
        $this->orderProductList = $cart;
        $this->updateProductCal();
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
            $this->product_sale_price[$product['id']] = $product['regular_price'];
            // $this->product_discount[$product['id']] = $product['discount'];
            $this->product_discount[$product['id']] = 0;
            $this->product_subtotal[$product['id']] = 0;
        }
        $this->orderProductList = $cart->toArray();
        $this->updateProductCal();
    }

    public function mount($id=NULL){
        $this->code = 'PR'.floor(time() - 999999999);
        $this->transaction_id='TR'.floor(time() - 999999999);
        $this->payment_code = 'PM'.floor(time() - 999999999);

        if ($id) {
            $this->SaleInvoice = SaleInvoice::find($id);
            $this->contact_id = $this->SaleInvoice->contact_id;
            $this->waiter_id = $this->SaleInvoice->waiter_id;
            $this->table_id = $this->SaleInvoice->table_id;
            // $this->vat_id = $this->SaleInvoice->vat_id;
            $this->date = $this->SaleInvoice->date;
            $this->shipping_charge = $this->SaleInvoice->shipping_charge;
            $this->discount = $this->SaleInvoice->discount;
            $this->grand_total = $this->SaleInvoice->grand_total;
            $this->subtotal = $this->SaleInvoice->subtotal;
            $this->expense_point = $this->SaleInvoice->expense_point;
            $this->expense_point_amount = $this->SaleInvoice->expense_point_amount;
            // $this->paid_amount = $this->SaleInvoice->SalePayment->sum('total_amount');
            $this->due = $this->SaleInvoice->due;
            $this->note = $this->SaleInvoice->note;
            $this->paid_amount=SalePayment::whereSaleInvoiceId($id)->sum('total_amount');
            $SaleInvoiceDetail = SaleInvoiceDetail::whereSaleInvoiceId($this->SaleInvoice->id)->get();
            // dd($SaleInvoiceDetail);
            $cart = collect($this->orderProductList);
            foreach ($SaleInvoiceDetail as $stockProduct) {
                $product = Product::find($stockProduct->product_id);
                $this->product_quantity[$product->id] = $stockProduct->quantity;
                $this->product_discount[$product->id] = $product->discount;
                $this->product_rate[$product->id] = $stockProduct->unit_price;
                // $this->product_subtotal[$product->id] = $stockProduct->sale_price * $stockProduct->quantity;
                $cart[$product->id] = $product;
            }
            $this->orderProductList = $cart;

            $PaymentList = SalePayment::whereSaleInvoiceId($this->SaleInvoice->id)->get();
            // dd($PaymentList->count());
            $cartPayment = collect($this->paymentMethodList);
            foreach ($PaymentList as $paymentList) {
                $paymentMethod = PaymentMethod::find($paymentList->payment_method_id);
                // dd($paymentMethod->id);
                $cartItem = [
                    'id' => $paymentList->id,
                    'payment_method_id' => $paymentMethod->id,
                    'payment_method_name' => $paymentMethod->name,
                    'transaction_id' => $paymentList->transaction_id,
                    'payment_amount' => $paymentList->total_amount,
                    'payment_code' => $paymentList->code,
                ];

                $this->paymentMethodList = $cartPayment->push($cartItem);
                // $this->payment_amount[$paymentMethod->id] = $paymentList->amount;

                // $cartPayment[$paymentMethod->id] = $paymentMethod;
            }
            $this->paymentMethodList = $cartPayment;
            $this->updateProductCal();
        }
    }
    public function updated(){
        $this->updateProductCal();
    }
    public function render()
    {
        // dd($this->paymentMethodList);

        return view('livewire.backend.inventory.sale',[
            'contacts'=>Contact::whereType('Customer')->get(),
            'payments'=>PaymentMethod::get(),
            'categories'=> Category::get(),
            'Units' => Unit::all(),
            'vats'=> Vat::get(),
            'branches'=> Branch::get(),
            'warehouses'=>Warehouse::get(),
        ]);
    }
}
