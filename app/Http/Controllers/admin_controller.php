<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\admin;
use App\Models\orderhistory;
use App\Models\orderreview;
use DB;

class admin_controller extends Controller
{
    public function index()
    {

        $adminid = session()->get('usersession');

        if(isset($adminid))
        {


       $user = DB::table('userlist')
           ->where('ustatus',1)
            ->get();

            // print_r($loginchk);

            $totaluser = count($user);

         $product = DB::table('product')
         ->where('pstatus',1)
          ->get();

          $totalproduct = count($product);

       $completeorder = DB::table('orderhistory')
       ->where('orderstatus',3)
        ->get();

     $totalcompleteorder = count($completeorder);

     $payment = DB::table('orderhistory')
    ->where('orderstatus',3)
    ->sum('ordertotalamount');
   
    return view('admin',compact('totalproduct','totaluser','totalcompleteorder','payment'));
        }
        else
        {
            return redirect('/login');
    
        }
    }

    public function orderreview(Request $r)
    {
        

        $adminid = session()->get('usersession');

        if(isset($adminid))
        {

        $id = $r['id'];
       
        $orderreview = DB::table('orderreview')
        ->get();

        return view('/orderreview',compact('orderreview'));

    }
    else
    {
        return redirect('/login');

    }

    }
    

        public function status($id)
        {
            $adminid = session()->get('usersession');

        if(isset($adminid))
        {
            $review = orderreview::find($id);
            $review->reviewstatus = '0';
            $review->update();
            return redirect('/review');
    
        }
        else
        {
            return redirect('/login');
    
        }
        }
    
        public function dstatus($id)
        {
            $adminid = session()->get('usersession');

            if(isset($adminid))
            {

            $review = orderreview::find($id);
            $review->reviewstatus = '1';
            $review->update();
    
            return redirect('/review');
            }
        else
        {
            return redirect('/login');
    
        }
        }
    }


