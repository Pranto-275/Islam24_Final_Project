<?php

namespace App\Http\Controllers;
use App\Models\User as UserMm;
use App\Models\Inventory\Category;
use App\Models\Backend\ProductInfo\SubCategory;
use App\Models\Backend\ProductInfo\SubSubCategory;
use Yajra\Datatables\Datatables;

class DatatableController extends Controller
{
    public function SubSubCategoryTable(){
        $Query = SubSubCategory::query()->orderBy('id', 'desc');

        return Datatables::of($Query)
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
        ->rawColumns(['sub_category_id', 'image', 'action'])
        ->toJSON();
    }

    public function SubCategoryTable(){
        $Query = SubCategory::query()->orderBy('id', 'desc');

        return Datatables::of($Query)
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
        ->rawColumns(['category_id', 'image', 'action'])
        ->toJSON();
    }
    public function CategoryTable(){
        $Query = Category::query()->orderBy('id', 'desc');

        return Datatables::of($Query)
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
    public function index()
    {
        return Datatables::of([])->make(true);
    }



    public function UserTable()
    {
        $Query = UserMm::query()->orderBy('id', 'desc');

        return Datatables::of($Query)
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-dark btn-sm" onclick="callPermission('.$data->id.')"><i class="bx bx-lock-alt font-size-18"></i></button>
                    <button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
        })
        ->toJSON();
    }
}
