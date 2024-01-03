<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Models\userlist;

class userlist_controller extends Controller
{
    public function index()
    { 

        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        $listdata = userlist::all(); 
        return view('userslist',compact('listdata'));
    }
    else
    {
    return redirect('/login');

    }
    }
   public function view($id)
   {
    $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        $viewuser = DB::table('userlist')
        ->where('uid', $id)
        ->get();

     return view('userview',compact('viewuser'));
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
       $user = userlist::find($id);
       $user->ustatus = '0';
       $user->update();

       return redirect('/userlist');
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
       $user = userlist::find($id);
       $user->ustatus = '1';
       $user->update();

       return redirect('/userlist');}
       else
       {
       return redirect('/login');
   
       }
   }
}
