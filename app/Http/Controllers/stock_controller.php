<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\stock;

class stock_controller extends Controller
{
    public function index()
    {
        return view('stocklist');
    }

    public function add()
    {

        return view('stockform');
    }

    public function insert(Request $req)
    {
        $stock = new stock;
        $stock->stockpid = $req['stockpid'];
        $stock->stockcid = $req['stockcid'];
        $stock->totalstock = $req['totalstock'];
        $stock->stockpcs = $req['stockpcs'];

        $stock->save();

        return view('stocklist');
    }
}
