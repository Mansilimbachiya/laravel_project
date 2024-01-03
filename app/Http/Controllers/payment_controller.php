<?php   

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderhistory;
use DB;

class payment_controller extends Controller
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

        return view('/payment',compact('completeorder'));
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
      $completeorder = orderhistory::find($id);
      $completeorder -> orderstatus = 3;
      $completeorder -> update();

      return redirect('/payment');
    }
    else
    {
    return redirect('/login');

    }
    }

    public function datefilter(Request $r)
    {
      $adminid = session()->get('usersession');

      if(isset($adminid))
      {
     $date1 = $r['date1']." 00:00:00";
     $date2 = $r['date2']." 00:00:00";

      $completeorder = DB::table('orderhistory')

       ->where('updated_at', '>=', $date1)
       ->where('updated_at', '<=', $date2)
          
       ->get();

                     
       return view('/paymentfilterdata',compact('completeorder'));
      }
      else
      {
      return redirect('/login');
  
      }
    }

    public function paymentorderview(Request $r)
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
     

       return view('paymentview',compact('orderhistory','userdetail','cart'));
      }
      else
      {
      return redirect('/login');
  
      }
    }
}
