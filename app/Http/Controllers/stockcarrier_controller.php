<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\stockcarrier;

class stockcarrier_controller extends Controller
{
    public function index()
    {
        return view('stockcarrierlist');
    }

    public function add()
    {
        return view('stockcarrierform');
    }

    public function insert(Request $req)
    {
        $stockcarrier = new stockcarrier;
        $stockcarrier->	scname = $req['scname'];
        $stockcarrier-> scmobileno = $req['scmobileno'];
        $stockcarrier-> scpersonname= $req['scpersonname'];

        $stockcarrier->save();

        return view('stockcarrierlist');
    }
}
