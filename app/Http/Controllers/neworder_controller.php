<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderhistory;
use DB;

class neworder_controller extends Controller
{
    public function index()
    {
      $adminid = session()->get('usersession');

      if(isset($adminid))
      {
        $neworder = DB::table('orderhistory')
        ->join('userlist','userlist.uid','=','orderhistory.orderuserid')
        ->where('orderstatus',1)
        ->get();

        return view('neworder',compact('neworder'));
      }
      else
      {
      return redirect('/login');
  
      }
    }

    public function neworderview(Request $r)
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
     

       return view('neworderview',compact('orderhistory','userdetail','cart'));
      }
      else
      {
      return redirect('/login');
  
      }
    }

    public function cancelorder(Request $r)
    {
      $adminid = session()->get('usersession');

      if(isset($adminid))
      {
       $id = $r['id']; // 2

      $cancelorder = orderhistory::find($id);
      $cancelorder -> orderstatus = 4;
      $cancelorder -> update();

      return redirect('/neworder');
    }
    else
    {
    return redirect('/login');

    }
    }

    public function allocateorder(Request $r)
    {
      $adminid = session()->get('usersession');

          if(isset($adminid))
          {
    
       $id = $r['id']; // 2

      $allocateorder = orderhistory::find($id);
      $allocateorder -> orderstatus = 2;
      $allocateorder -> update();

      return redirect('/neworder');
    }
    else
    {
    return redirect('/login');

    }
    }                   

}
