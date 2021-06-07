<?php

namespace App\Http\Controllers;
use App\Models\User as UserMm;
// use App\Models\Inventory\Invoice;
// use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DatatableController extends Controller
{
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
