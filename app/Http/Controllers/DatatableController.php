<?php

namespace App\Http\Controllers;
use App\Models\Backend\Setting\CompanyInfo;
use App\Models\Backend\Inventory\Invoice;
use App\Models\Backend\Setting\InvoiceSetting;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\ContactInfo\ContactCategory;
use App\Models\Backend\ProductInfo\Brand;
use App\Models\Backend\Setting\Vat;
use App\Models\User as UserMm;
use App\Models\Inventory\Category;
use App\Models\Backend\ProductInfo\SubCategory;
use App\Models\Backend\ProductInfo\SubSubCategory;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\ProductInfo\ProductImage;
use App\Models\Backend\ProductInfo\ProductProperties;
use App\Models\Backend\Setting\PaymentMethod;
use App\Models\Backend\Setting\CouponCode;
use App\Models\Backend\Setting\Branch;
use App\Models\Inventory\Currency;
use App\Models\Inventory\DeliveryMethod;
use App\Models\Backend\Setting\Warehouse;
use App\Models\Backend\ProductInfo\Unit;
use App\Models\Setting\Slider;
use Yajra\Datatables\Datatables;

class DatatableController extends Controller
{
    public function SliderTable(){
        $Query = Slider::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('image', function ($data) {
            $url = asset('storage/photo/'.$data->image);
            return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['category_id', 'image', 'action'])
        ->toJSON();
    }
    public function UnitTable(){
        $Query = Unit::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['action'])
        ->toJSON();
    }

    public function InvoiceTable(){
        $Query = Invoice::query()->orderBy('id', 'desc');

            $this->i = 1;

            return Datatables::of($Query)
              ->addColumn('id', function ($data) {
               return $this->i++;
            })
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }


    public function CompanyInfoTable(){
        $Query = CompanyInfo::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }

    public function InvoiceSettingTable(){
        $Query = InvoiceSetting::query()->orderBy('id', 'desc');
        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
            ->addColumn('image', function ($data) {
                $url = asset('storage/photo/'.$data->image);

                return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
            })
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['image','action'])
            ->toJSON();
    }


    public function WarehouseTable(){
        $Query = Warehouse::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['action'])
        ->toJSON();
    }


    public function DeliveryMethodTable(){
        $Query = DeliveryMethod::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('is_active', function ($data) {
            return $data->is_active==1 ? 'Active' : 'Inactive';
        })
        ->addColumn('branch_id', function ($data) {
            return $data->Branch ? $data->Branch->name : '';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['branch_id', 'is_active','action'])
        ->toJSON();
    }
    public function CurrencyTable(){
        $Query = Currency::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('is_active', function ($data) {
            return $data->is_active==1 ? 'Active' : 'Inactive';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['is_active', 'action'])
        ->toJSON();
    }
    public function BranchTable(){
        $Query = Branch::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('is_active', function ($data) {
            return $data->is_active==1 ? 'Active' : 'Inactive';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['is_active', 'action'])
        ->toJSON();
    }

    public function paymentMethodTable(){
        $Query = PaymentMethod::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }

    public function BrandTable(){
        $Query = Brand::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
            ->addColumn('image', function ($data) {
                $url = asset('storage/photo/'.$data->image);

                return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
            })
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['image', 'action'])
            ->toJSON();
    }

    public function VatTable(){
        $Query = Vat::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['image', 'action'])
            ->toJSON();
    }

    public function CouponTable(){
        $Query = CouponCode::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['image', 'action'])
            ->toJSON();
    }

    public function ContactCategoryTable(){
        $Query = ContactCategory::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['image', 'action'])
            ->toJSON();
    }

    public function CustomerTable(){
        $Query = Contact::query()->whereType('Customer')->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }

    public function SupplierTable(){
        $Query = Contact::query()->whereType('Supplier')->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }

    public function StaffTable(){
        $Query = Contact::query()->whereType('Staff')->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }

    public function ProductPropertiesTable(){
        $Query = ProductProperties::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('product_id', function ($data) {
            return $data->Product ? $data->Product->name : '';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['product_id', 'action'])
        ->toJSON();
    }
    public function ProductImageTable(){
        $Query = ProductImage::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('product_id', function ($data) {
            return $data->Product ? $data->Product->name : '';
        })
        ->addColumn('image', function ($data) {
            $url = asset('storage/photo/'.$data->image);

            return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['sub_category_id', 'image', 'action'])
        ->toJSON();
    }
    public function ProductTable(){
        $Query = Product::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('sub_sub_category_id', function ($data) {
            return $data->SubSubCategory ? $data->SubSubCategory->name : '';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['sub_sub_category_id', 'action'])
        ->toJSON();
    }
    public function SubSubCategoryTable(){
        $Query = SubSubCategory::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('is_active', function ($data) {
            return $data->is_active==1 ? 'Active' : 'Inactive';
        })
        ->addColumn('sub_category_id', function ($data) {
            return $data->SubCategory ? $data->SubCategory->name : '';
        })
        ->addColumn('image', function ($data) {
            $url = asset('storage/photo/'.$data->image);

            return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['sub_category_id', 'image', 'is_active', 'action'])
        ->toJSON();
    }

    public function SubCategoryTable(){
        $Query = SubCategory::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('is_active', function ($data) {
            return $data->is_active==1 ? 'Active' : 'Inactive';
        })
        ->addColumn('category_id', function ($data) {
            return $data->Category ? $data->Category->name : '';
        })
        ->addColumn('image', function ($data) {
            $url = asset('storage/photo/'.$data->image);

            return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['category_id', 'image', 'is_active', 'action'])
        ->toJSON();
    }
    public function CategoryTable(){
        $Query = Category::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('is_active', function ($data) {
            return $data->is_active==1 ? 'Active' : 'Inactive';
        })
        ->addColumn('image1', function ($data) {
            $url = asset('storage/photo/'.$data->image1);

            return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image1" class="img-fluid mx-auto d-block"/>';
        })
        ->addColumn('image2', function ($data) {
            $url = asset('storage/photo/'.$data->image2);

            return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image2" class="img-fluid mx-auto d-block"/>';
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->rawColumns(['image1', 'image2', 'is_active', 'action'])
        ->toJSON();
    }
    public function index()
    {
        return Datatables::of([])->make(true);
    }



    public function UserTable()
    {
        $Query = UserMm::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
        ->addColumn('id', function ($data) {
            return $this->i++;
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-dark btn-sm" onclick="callPermission('.$data->id.')"><i class="bx bx-lock-alt font-size-18"></i></button>
                    <button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->toJSON();
    }
}
