<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\userlist;
use App\Models\Cart;


class usersite_controller extends Controller
{
    public function index()
    {
        $category = DB::table('category') // main category
        ->where('subid',0)
        ->get();


        $subcategory = DB::table('category') // sub category
        ->where('subid','!=',0)
        ->get();

        $all = DB::table('category') // sub category (All)
        ->where('subid','!=',0)              
        ->get();

        $cat1 = DB::table('category') // cat 1 icecream
        ->where('subid',1)
        ->get();

        $cat2 = DB::table('category') // cat 2 cake
        ->where('subid',2)
        ->get();

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

         $totalcartdata = count($cartdata);

            $user = DB::table('userlist')
            ->where('ustatus',1)
            ->get();

            $totaluser = count($user);

            $product = DB::table('product')
            ->where('pstatus',1)
             ->get();
   
             $totalproduct = count($product);

             $category = DB::table('category')
             ->where('subid',0)
             ->get();

             $totalcategory = count($category);
   
           $completeorder = DB::table('orderhistory')
           ->where('orderstatus',3)
           ->get();
   
           $totalcompleteorder = count($completeorder);

            $review = DB::table('orderreview')
             ->where('reviewstatus',0)
             ->get();

             //print_r($review);

             $threeproduct = DB::table('product')
             ->inRandomOrder()
             ->limit(3)
             ->get();

             $mygallery = DB::table('my_gallery')
             ->inRandomOrder()
             ->limit(5)
             ->get();

          //print_r($threeproduct);

         return view('homepage',compact('category','mygallery','subcategory','all','cat1','cat2','totalcartdata','totaluser',
        'totalproduct','totalcategory','totalcompleteorder','review','threeproduct'));
    }

    public function insertuser(Request $r)
    {

    
     $uusername = $r['uusername'];
     $umobileno = $r['umobileno'];

        $check = DB::table('userlist') // cat 2 cake
        ->where('uusername', $uusername)
        ->orwhere('umobileno', $umobileno)
        ->get();

        $count = count($check); // count data
if($count >= 1)
{

    return redirect('/createaccount');
  
}
else
{
    $user = new userlist;

        $user->uname = $r['uname'];
        $user->umobileno = $umobileno;
        $user->upassword = $r['upassword'];
        $user->uusername =  $uusername;
        $user->uaddress = $r['uaddress'];


        if($r->file('uimage')){ 
            $file= $r->file('uimage'); 
            $filename= date('YmdHi').$file->getClientOriginalName(); 
            $file-> move(public_path('profile'), $filename); 
            $user->uimage = $filename;
            
            }  
        $user->save();


        return redirect('/web/login');
        }
    }

    public function category($id)
    {
        $category = DB::table('category')
        ->where('subid',0)
        ->get();
        
        $all = DB::table('category') // sub category (All)
        ->where('subid',$id)              
        ->get();

        $getcategory = DB::table('category')
        ->where('cid',$id)
        ->get();

        // print_r($getcategory);

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

        $totalcartdata = count($cartdata);
        
         return view('web_category',compact('category','all','getcategory','totalcartdata'));
    }

    public function product(Request $r)
    {


        $category = DB::table('category')
        ->where('subid',0)
        ->get();

        $product = DB::table('product')
        ->where('pstatus',1)
        ->get();

        // print_r($category);

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

    $totalcartdata = count($cartdata);

//    print_r($category);
        return view('web_product',compact('category','product','totalcartdata'));
    }


    public function product1(Request $r)
    {

        $subcatid = $r['catid'];      

        $category = DB::table('category')
        ->where('subid',0)
        ->get();

        $product = DB::table('product')
        ->where('pstatus',1)
        ->where('subid',$subcatid)
        ->get();

        // print_r($category);

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

    $totalcartdata = count($cartdata);

//    print_r($category);
        return view('web_product',compact('category','product','totalcartdata'));
    }

    public function product_detail(Request $r)
    {
        $p = $r['pid'];

        $category = DB::table('category')
        ->where('subid',0)
        ->get();

        $product = DB::table('product')
        ->where('pid',$p)
        ->get();

        $related = DB::table('product')
        ->where('pid','!=',$p)
        ->inRandomOrder()
        ->limit('3')
        ->get();

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

    $totalcartdata = count($cartdata);


        return view('web_product_detail',compact('category','product','related','totalcartdata'));

        } 

        public function login(Request $r)
        {

           $category = DB::table('category')
           ->where('subid',0)
           ->get();

        // print_r($category);

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

        $totalcartdata = count($cartdata);

        return view('web_login',compact('category','totalcartdata'));
        }

        public function logincheck(Request $r)
        {
           echo $username = $r['username']; 
            echo $password = $r['password']; 

            $loginchk = DB::table('userlist')
           ->where('uusername',$username)
           ->where('upassword',$password)
            ->get();

            $count = count($loginchk);
            if($count == 1)
            {


                foreach($loginchk as $r)
                {
                    $userid = $r->uid;

                    $userstatus = $r->ustatus;

if($userstatus == 0)
{

    return redirect('/web/login');

}
else
{

    session()->put('usersitesession', $userid);

                
    return redirect('/usersite');


}

                }
               
            }
            else
            {

               return redirect('/web/login');
            }
        }

        public function myprofile()
        {
            $usersiteid = session()->get('usersitesession');

            if(isset($usersiteid))
            {


            $category = DB::table('category')
           ->where('subid',0)
           ->get();
           
          $userid = session()->get('usersitesession');


          $userdetail = DB::table('userlist')
           ->where('uid',$userid)
           ->get();

           $userid = session()->get('usersitesession');
           $cartdata = DB::table('cart') 
           ->where('uid',$userid)
           ->get();
   
           $totalcartdata = count($cartdata);
           

           return view('myprofile',compact('category','userdetail','totalcartdata'));
        }
        else
        {
            return redirect('/web/login');
    
        }
        }

        public function logout(Request $r)
        {
            
            $usersiteid = session()->get('usersitesession');

            if(isset($usersiteid))
            {
            Session::forget('usersitesession');

            return redirect('/web/login');
            }
        else
        {
            return redirect('/web/login');
    
        }
            }

       public function about()
       {
        $category = DB::table('category')
        ->where('subid',0)
        ->get();

        // print_r($category);

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

       $totalcartdata = count($cartdata);
        return view('web_about',compact('category','totalcartdata')); 
       }

       public function contact()
       {
        $category = DB::table('category')
        ->where('subid',0)
        ->get();

        // print_r($category);

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

         $totalcartdata = count($cartdata);

        return view('web_contact',compact('category','totalcartdata'));
       }

       public function createaccount(Request $r)
       {

            // $username->username = $r['username'];
            // $password->password = $r['password'];

        $category = DB::table('category')
        ->where('subid',0)
        ->get();

        // print_r($category);

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

        $totalcartdata = count($cartdata);
        return view('web_signup',compact('category','totalcartdata'));

       }

       public function addtocart(Request $r)
       {

            $usersiteid = session()->get('usersitesession');

             if(isset($usersiteid))
             {
             $category = DB::table('category')
            ->where('subid',0)
            ->get();

            if(session()->get('usersitesession'))
            {
                $uid = session()->get('usersitesession');       
                $pid = $r['pid'];
            
                $price = $r['pprice'];
                $date = date('Y-m-d');

                
                $chckdata = DB::table('cart')
                ->where('uid',$uid)
                ->where('pid',$pid)
                ->get();  
             
                $count = count($chckdata);
                if($count == 1)
                {

                    foreach($chckdata as $c)
                    {
                        $cid = $c->cid;

                        $qty = $c->qty;
                        $price = $c->cpprice;

                        $prod = Cart::find($cid);
                        $nqty = $qty+1;
                    
                        $prod->qty = $nqty;                   
                        $prod->update();
                    }

                }
                else{

                $user = new cart;
                
                $user->uid = $uid;
                $user->pid = $pid;
                $user->cpprice = $price;
                $user->date = $date;
                $user->qty = 1;

                 $user->save();

                }

                return redirect('/web/cart');
                // $cart = DB::table('cart')
                // ->join('product','product.pid','=','cart.pid')
                // ->where('uid',$uid)
                // ->get();

                // return view('web_addtocart',compact('category','cart'));
                
            }
            else
            {
                return redirect('/web/login');
            }
        }
        else
        {
            return redirect('/web/login');
    
        }
            
       }

       public function cart()
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

       
        $pobtn = DB::table('cart')
        ->where('uid',$uid)
        ->get();


        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

       $totalcartdata = count($cartdata);

      return view('web_addtocart',compact('category','cart','pobtn','totalcartdata'));
    }
    else
    {
        return redirect('/web/login');

    }
       }

       public function delete($id)
       {
            $usersiteid = session()->get('usersitesession');

            if(isset($usersiteid))
            {
        DB::delete('DELETE FROM cart WHERE cid = ?', [$id]); 
     
        return redirect('/web/cart');
            }
    else
    {
        return redirect('/web/login');

    }

       }

       public function addqty(Request $req)
       {
            $usersiteid = session()->get('usersitesession');

            if(isset($usersiteid))
            {
           $id = $req['cid']; //id
           $quantity = $req['quantity'];//quantity
           $price = $req['price'];


           $category = DB::table('cart')
           ->where('cid',$id)
           ->get();

           $product = Cart::find($id);
           $qty = $quantity+1;
           $product->qty = $qty;
      
           $product->update(); 

           return redirect('/web/cart');
        }
        else
        {
            return redirect('/web/login');
    
        }
       }

       public function minusqty(Request $req)
       {
            $usersiteid = session()->get('usersitesession');

            if(isset($usersiteid))
            {
             $id = $req['cid']; //id
             $quantity = $req['quantity'];//quantity

             $product = Cart::find($id);
             $qty = $quantity-1;
                if($qty == 0)
                {
                 $newqty = $quantity;
                }
                else
                {
                    $newqty = $qty;
                }
                

             $product->qty = $newqty;
             $product->update();

            return redirect('/web/cart');
        }
        else
        {
            return redirect('/web/login');
    
        }

       }

       public function placeorder()
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

            $userid = session()->get('usersitesession');
            $cartdata = DB::table('cart') 
            ->where('uid',$userid)
            ->get();

         $totalcartdata = count($cartdata);

        return view('placeorder',compact('category','cart','totalcartdata'));
    }
    else
    {
        return redirect('/web/login');

    }
       }

       public function search(Request $req)
       {

        $category = DB::table('category')
        ->where('subid',0)
        ->get();

        $userid = session()->get('usersitesession');
        $cartdata = DB::table('cart') 
        ->where('uid',$userid)
        ->get();

       $totalcartdata = count($cartdata);

       $search = $req['search']; 

       $product = DB::table('product')
       ->where('pname', $search)
       ->orWhere('pname', 'like', '%' . $search . '%')
       ->get();

       //print_r($listdata);

       return view('web_product',compact('category','product','totalcartdata'));

       }

      
                              
}    