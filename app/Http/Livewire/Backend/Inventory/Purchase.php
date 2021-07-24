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
use App\Models\Backend\Inventory\PurchaseInvoice;
use App\Models\Backend\Inventory\PurchaseInvoiceDetail;
use App\Models\Backend\Inventory\PurchasePayment;
use App\Models\Backend\ProductInfo\ProductProperties;
use App\Models\Backend\Setting\Warehouse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;


class Purchase extends Component
{
    use WithFileUploads;

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
    public $PurchaseInvoice;
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
        if($this->PurchaseInvoice){
            $Query = PurchaseInvoice::find($this->PurchaseInvoice->id);
        }else{
            $Query = new PurchaseInvoice();
            $Query->created_by = Auth::id();
        }
        $Query->purchase_date = $this->date;
        // $Query->code = $this->code;
        $Query->contact_id = $this->contact_id;
        $Query->total_amount = $this->subtotal;
        $Query->discount = $this->discount;
        $Query->payable_amount = $this->grand_total;
        $Query->branch_id = '1';
        $Query->save();
        foreach ($this->orderProductList as $key => $value) {
            // dd($this->orderProductList);
            $product = Product::find($key);
            $Stock = PurchaseInvoiceDetail::whereProductId($key)->wherePurchaseInvoiceId($Query->id)->first();
            if (!$Stock) {
                $Stock = new PurchaseInvoiceDetail();
                $Stock->created_by = Auth::id();
                $Stock->branch_id = 1;
            }

            $Stock->purchase_invoice_id = $Query->id;
            $Stock->product_id = $product->id;
            $Stock->unit_price=$this->product_rate[$key];
            $Stock->quantity = $this->product_quantity[$key];
            $Stock->save();
        }
        foreach ($this->paymentMethodList as $key => $value) {
            if (isset($value['id']) && $value['id']) {
                $Payment = PurchasePayment::find($value['id']);
            } else {
                $Payment = new PurchasePayment();
            }

            $Payment->date = Carbon::now();
            $Payment->contact_id = $Query->contact_id;
            $Payment->purchase_invoice_id = $Query->id;
            $Payment->payment_method_id = $value['payment_method_id'];
            $Payment->total_amount = $value['payment_amount'];
            $Payment->transaction_id = $value['transaction_id'];
            $Payment->code = $value['payment_code'];
            $Payment->created_by = Auth::id();
            $Payment->branch_id = 1;
            $Payment->save();
        }
    });
    $this->emit('success', [
        'text' => 'Purchase Added Successfully',
    ]);
        if(!$this->PurchaseInvoice){
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
        $discount=0;
        foreach ($this->orderProductList as $key => $value) {
            if (is_numeric($this->product_rate[$key]) && is_numeric($this->product_quantity[$key]) && is_numeric($this->product_discount[$key])) {
                $this->product_subtotal[$key] = $this->product_rate[$key] * $this->product_quantity[$key];
                $grandTotal += $this->product_subtotal[$key]-floatval($this->product_discount[$key]);
                $discount += $this->product_discount[$key];
            }
        }

        $this->grand_total = $grandTotal;
        $this->subtotal = $grandTotal;
        $this->grand_total=$this->grand_total-$this->discount+$this->shipping_charge;
        $this->due=$this->grand_total-$this->paid_amount;
        $this->discount=$discount;

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
            $this->product_sale_price[$product['id']] = $product['regular_price'];
            $this->product_discount[$product['id']] = $product['discount'];
            $this->product_subtotal[$product['id']] = 0;
        }
        $this->orderProductList = $cart->toArray();
        $this->updateProductCal();
    }

    public function mount($id=NULL){
        $this->code = 'PR'.floor(time() - 999999999);
        $this->payment_code = 'PM'.floor(time() - 999999999);

        if ($id) {
            $this->PurchaseInvoice = PurchaseInvoice::find($id);
            $this->contact_id = $this->PurchaseInvoice->contact_id;
            $this->waiter_id = $this->PurchaseInvoice->waiter_id;
            $this->table_id = $this->PurchaseInvoice->table_id;
            $this->vat_id = $this->PurchaseInvoice->vat_id;
            $this->date = $this->PurchaseInvoice->date;
            $this->shipping_charge = $this->PurchaseInvoice->shipping_charge;
            $this->discount = $this->PurchaseInvoice->discount;
            $this->grand_total = $this->PurchaseInvoice->grand_total;
            $this->subtotal = $this->PurchaseInvoice->subtotal;
            $this->expense_point = $this->PurchaseInvoice->expense_point;
            $this->expense_point_amount = $this->PurchaseInvoice->expense_point_amount;
            $this->paid_amount = $this->PurchaseInvoice->paid_amount;
            $this->due = $this->PurchaseInvoice->due;
            $this->note = $this->PurchaseInvoice->note;
            $this->paid_amount=PurchasePayment::wherePurchaseInvoiceId($id)->sum('total_amount');
            $StockManager = PurchaseInvoiceDetail::wherePurchaseInvoiceId($this->PurchaseInvoice->id)->get();
            // dd($StockManager);
            $cart = collect($this->orderProductList);
            foreach ($StockManager as $stockItem) {
                $item = Product::find($stockItem->product_id);
                $this->product_quantity[$item->id] = $stockItem->quantity;
                $this->product_discount[$item->id] = $item->discount;
                $this->product_rate[$item->id] = $stockItem->unit_price;
                // $this->item_subtotal[$item->id] = $stockItem->sale_price * $stockItem->quantity;
                $cart[$item->id] = $item;
            }
            $this->orderProductList = $cart;

            $PaymentList = PurchasePayment::wherePurchaseInvoiceId($this->PurchaseInvoice->id)->get();
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
    public function productSave()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'sub_sub_category_id' => 'required',
            'contact_id' => 'required',
        ]);

        DB::transaction(function(){
        $Query = new Product();
        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->regular_price = $this->regular_price;
        $Query->special_price = $this->special_price;
        $Query->wholesale_price = $this->wholesale_price;
        $Query->purchase_price = $this->purchase_price;
        $Query->sub_sub_category_id = $this->sub_sub_category_id;
        $Query->low_alert = $this->low_alert;
        $Query->contact_id = $this->contact_id;
        $Query->is_active = $this->is_active;
        $Query->created_by = Auth::user()->id;
        $Query->branch_id = 1;
        $Query->save();
        //Product Image
        if($this->images){
          foreach($this->images as $image){
            $ImageInsert=new ProductImage();
            $ImageInsert->product_id=$Query->id;
            $path = $image->store('/public/photo');
            $ImageInsert->image = basename($path);
            $ImageInsert->created_by = Auth::user()->id;
            $ImageInsert->branch_id = 1;
            $ImageInsert->save();
          }
        }
        //Product Properties
        $ProductProperties=new ProductProperties();
        $ProductProperties->product_id=$Query->id;
        // $ProductProperties->size="XL";
        // $ProductProperties->color="Yellow";
        $ProductProperties->created_by = Auth::user()->id;
        $ProductProperties->branch_id = 1;
        $ProductProperties->save();
     });
        $this->reset();
        $this->emit('success', [
            'text' => 'Product C/U Successfully',
        ]);

        $this->code = 'PR'.floor(time() - 999999999);
        $this->emit('modal','productModal');
    }
    public function render()
    {
        // dd($this->paymentMethodList);

        return view('livewire.backend.inventory.purchase',[
            'contacts'=>Contact::get(),
            'payments'=>PaymentMethod::get(),
            'categories'=> Category::get(),
            'Units' => Unit::all(),
            'vats'=> Vat::get(),
            'branches'=> Branch::get(),
            'warehouses'=>Warehouse::get(),
        ]);
    }
}
