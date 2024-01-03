<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderhistory;
use DB;

class cancelorder_controller extends Controller
{
    public function index()
    {
      $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        $cancelorder = DB::table('orderhistory')
        ->join('userlist','userlist.uid','=','orderhistory.orderuserid')
        ->where('orderstatus',4)
        ->get(); 

        return view('cancelorder',compact('cancelorder'));
      }
      else
      {
      return redirect('/login');
  
      }
    }

    public function cancelorderview(Request $r)
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
     

       return view('cancelorderview',compact('orderhistory','userdetail','cart'));
      }
      else
      {
      return redirect('/login');
  
      }
    }

    public function reneworder(Request $r)
       {

        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
       
        $id = $r['id']; // 2

        $reneworder = orderhistory::find($id);
        $reneworder -> orderstatus = 1;
        $reneworder -> update();
        
         return redirect('/cancelorder');
        }
        else
        {
        return redirect('/login');
    
        }

       }

}
