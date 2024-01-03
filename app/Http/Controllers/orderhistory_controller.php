<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\orderhistory;
use App\Models\cart;
use App\Models\orderlist;
use App\Models\orderreview;

use DB;

class orderhistory_controller extends Controller
{
    public function confirm_order(Request $req)
    {
      $usersiteid = session()->get('usersitesession');

      if(isset($usersiteid))
      {


        $userid = session()->get('usersitesession');
      
        $date = date('Y-m-d');
         $order = new orderhistory;
         $order->orderaddress = $req['orderaddress'];
         $order->orderuserid = $userid;
         $order->orderdate = $date;
         $order->ordertotalamount = "0";
        
          $order->save();

          $getlastrowoh = DB::table('orderhistory')
          ->orderby('orderhistoryid', 'desc')
          ->limit(1)
          ->get(); 
   
          foreach($getlastrowoh as $gw)
            {
   
          $orhstryid = $gw->orderhistoryid;
   
            }

       $getdata = DB::table('cart')
       ->where('uid',$userid)
       ->get();

       foreach($getdata as $g)
       {

         $cart = new orderlist;
         $cart->orderhistoryid = $orhstryid;
         $cart->opid = $g->pid;
         $cart->ouid = $g->uid;
         $cart->ocpprice =$g->cpprice;
         $cart->oqty = $g->qty;    
         $cart->oamount = $g->cpprice * $g->qty;
         $cart->odate = $g->date;
        
        $cart->save();

       }

        DB::table('cart')
       ->where('uid', $userid)
       ->delete();
             
       $getttlamount = DB::table('orderlist')
       ->where('orderhistoryid',$orhstryid)
       ->sum('oamount');

       $amountupdate = orderhistory::find($orhstryid); ;
       $amountupdate->ordertotalamount = $getttlamount; 
       $amountupdate->update();

// print_r($getdata);
       return redirect('/placeorder');
      }
      else
      {

         return redirect('/web/login');
      }
    }

    public function orderhistory()
    {

      $usersiteid = session()->get('usersitesession');

      if(isset($usersiteid))
      {


      $category = DB::table('category')
            ->where('subid',0)
            ->get();

            $uid = session()->get('usersitesession');    
        
            $cart = DB::table('cart')
            ->join('product','product.pid','=','cart.pid')
            ->where('uid',$uid)
            ->get();


            $orderhistory = DB::table('orderhistory')
            ->where('orderuserid',$uid)
            ->get();

            $userid = session()->get('usersitesession');
            $cartdata = DB::table('cart') 
            ->where('uid',$userid)
            ->get();
    
            $totalcartdata = count($cartdata);

          return view('orderhistory',compact('category','cart','orderhistory','totalcartdata'));
        }
        else
        {

           return redirect('/web/login');
        }
      
    }

    public function ohview($id)
    {

      $usersiteid = session()->get('usersitesession');

      if(isset($usersiteid))
      {


      echo $id;

      $category = DB::table('category')
      ->where('subid',0)
      ->get();

      $uid = session()->get('usersitesession');    

      $userdetail = DB::table('userlist')
      ->where('uid',$uid)
      ->get();

      $orderhistory = DB::table('orderhistory')
      ->where('orderhistoryid',$id)
      ->get();
    
      $cart = DB::table('orderlist')
      ->join('product','product.pid','=','orderlist.opid')
      ->where('ouid',$uid)
      ->get();

      $userid = session()->get('usersitesession');
      $cartdata = DB::table('cart') 
      ->where('uid',$userid)
      ->get();

      $totalcartdata = count($cartdata);


      return view('ohview',compact('category','cart','userdetail','orderhistory','totalcartdata'));
    }
    else
    {

       return redirect('/web/login');
    }
    }

    public function orderreview(Request $req)
    {

      $usersiteid = session()->get('usersitesession');

      if(isset($usersiteid))
      {

      $order = new orderreview;
    
     $order->reviewmsg = $req['review'];
     $order->orderhistoryid = $req['orderhistoryid'];
     $order->orderuserid = $req['orderuserid'];
     $order->reviewstatus = 1;
     $order->save();



     return redirect('/web/orderhistory');
    }
    else
    {

       return redirect('/web/login');
    }
    }

   
}
