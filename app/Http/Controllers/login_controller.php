<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class login_controller extends Controller
{
    public function login()
    {
        return view('loginpage');
    }

    public function loginchk(Request $r)
    {
        
      echo  $username = $r['username'];
      echo  $password = $r['password'];

      $loginchk = DB::table('admin')
           ->where('username',$username)
           ->where('password',$password)
            ->get();

            // print_r($loginchk);

            $count = count($loginchk);
            if($count == 1)
            {
                foreach($loginchk as $l)
                {
                    $id = $l->id;
                }
                session()->put('usersession', $id);
                return redirect('/admin');
            }
            else
            {
                return redirect('/login');
            }
        }

        public function logout()
        {
            Session::forget('usersession');

            return redirect('/login');
        }
    }

