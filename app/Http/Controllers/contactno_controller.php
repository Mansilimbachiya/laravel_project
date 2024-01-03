<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactno;
use DB;

class contactno_controller extends Controller
{
   public function insert(Request $req)
   {

    $adminid = session()->get('usersession');

    if(isset($adminid))
    {
      $contact = new contactno;

        $contact->coname = $req['name'];
        $contact->coemail = $req['email'];
        $contact->cocontactno = $req['contactno'];
        $contact->comessage = $req['message'];
    
        $contact->save();

        return redirect('/web/contact');
      }
      else
      {
      return redirect('/login');
  
      }
   } 

   public function index()
   {

    $adminid = session()->get('usersession');

    if(isset($adminid))
    {

      $contactdetail = DB::table('contactno')
        ->get();

      return view('/contact',compact('contactdetail'));
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
            $contactno = contactno::find($id);
            $contactno->costatus = '0';
            $contactno->update();
    
            return redirect('/contact');
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
            $contactno= contactno::find($id);
            $contactno->costatus = '1';
            $contactno->update();
    
            return redirect('/contact');

          }
          else
          {
          return redirect('/login');
      
          }
        }

}
