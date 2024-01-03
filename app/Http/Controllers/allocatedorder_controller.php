<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderhistory;
use DB;

class allocatedorder_controller extends Controller
{
    public function index()
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {

        $allocatedorder = DB::table('orderhistory')
        ->join('userlist','userlist.uid','=','orderhistory.orderuserid')
        ->where('orderstatus',2)
        ->get(); 

        return view('allocatedorder',compact('allocatedorder'));
    }
    else
    {
        return redirect('/login');

    }
    }

    public function allocatedorderview(Request $r)
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
         
    
           return view('allocatedorderview',compact('orderhistory','userdetail','cart'));
        }
        else
        {
            return redirect('/login');
    
        }
        }

       public function completeorder(Request $r)
       {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {

        $id = $r['id']; // 2

        $completeorder = orderhistory::find($id);
        $completeorder -> orderstatus = 3;
        $completeorder -> update();
  
        return redirect('/allocateorder');
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
   
         return redirect('/allocateorder');
   
       }
       else
    {
        return redirect('/login');

    }
    }
    
        
    }

