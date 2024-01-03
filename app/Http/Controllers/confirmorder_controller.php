<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderhistory;
use DB;

class confirmorder_controller extends Controller
{
    public function index()
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {

        $completeorder = DB::table('orderhistory')
        ->join('userlist','userlist.uid','=','orderhistory.orderuserid')
        ->where('orderstatus',3)
        ->get(); 

        return view('completeorder',compact('completeorder'));

    }
    else
    {
    return redirect('/login');

    }
    }

    public function completeorderview(Request $r)
    {
         $adminid = session()->get('usersession');

        if(isset($adminid))
        {
            
          $id = $r['id'];
          $uid = $r['uid'];
    
          $orderhistory = DB::table('orderhistory')
          ->where('orderhistoryid',$id)
          ->get();
    
         
          $userdetail = DB::table('userlist')
          ->where('uid',$uid)
          ->get();
    
          $cart = DB::table('orderlist')
          ->join('product','product.pid','=','orderlist.opid')
          ->where('ouid',$uid)
          ->get();
         
    
           return view('completeorderview',compact('orderhistory','userdetail','cart'));

        }
        else
        {
        return redirect('/login');
    
        }
        }

}
