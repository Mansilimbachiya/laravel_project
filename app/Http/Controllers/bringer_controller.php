<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bringer;

class bringer_controller extends Controller
{
    public function index()
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        return view('bringerlist');
    }
    else
    {
    return redirect('/login');

    }
    }

    public function add()
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        return view('bringerform');
    }
    else
    {
    return redirect('/login');

    }
    }   
    
    public function insert(Request $req)
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {

        $bringer = new bringer;
        $bringer->bname = $req['bname'];
        $bringer->bmobileno = $req['bmobileno'];
        $bringer->bpersonname = $req['bpersonname'];

        $bringer->save();

        return view('bringerlist');
       }
        else
        {
        return redirect('/login');

        }
    }

}
