<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\product;

class product_controller extends Controller
{
    public  function index()
    {
        $adminid = session()->get('usersession');

      if(isset($adminid))
      {

        $list = DB::table('product')
        ->where('pstatus', 0)
        ->orwhere('pstatus', 1)
        ->get();    
     
        return view('productlist',compact('list'));
    }
    else
    {
    return redirect('/login');

    }
    }

public function getsubcategory(Request $req)
{

    $adminid = session()->get('usersession');

      if(isset($adminid))
      {
    $val = $req['val']; // id
   
    $listdata = DB::table('category')
    ->where('subid', $val)
    ->get();    

    $output = '';
    $output .="<option> Select Sub Category </option>";


      foreach($listdata as $row)
        { 
            $output .= "
            <option value='$row->cid'> $row->cname </option> 
            ";     
        }
            
        echo $output;
    }
    else
    {
    return redirect('/login');

    }
}

    public function add()
    {
        $adminid = session()->get('usersession');

      if(isset($adminid))
      {
        $category = DB::table('category')
        ->where('status', 1)
        ->where('subid', 0)
        ->get();
   
        return view('productform',compact('category'));
    }
    else
    {
    return redirect('/login');

    }
    }

    public function insert(Request $req)
    {
        $adminid = session()->get('usersession');

      if(isset($adminid))
      {
        $product = new product;

        if($req->file('pimage')){ 
            $file= $req->file('pimage'); 
            $filename= date('YmdHi').$file->getClientOriginalName(); 
            $file-> move(public_path('profile'), $filename); 
            $product->pimage = $filename;
            
            }  
        $product->pname = $req['pname'];
        $product->subid = $req['subid'];
        $product->pcid = $req['cid'];
        $product->pprice = $req['pprice'];
        $product->pdate = $req['pdate'];
        $product->description = $req['detail'];


        $product->save();

        return redirect('/product/add');
    }
    else
    {
    return redirect('/login');

    }
    }

    public function delete($id)
    {
        $adminid = session()->get('usersession');

      if(isset($adminid))
      {
        $product = product::find($id);
        $product->pstatus = '2';
        $product->update();

        return redirect('/product');
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
        $product = product::find($id);
        $product->pstatus = '0';
        $product->update();

        return redirect('/product');
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
        $product = product::find($id);
        $product->pstatus = '1';
        $product->update();

        return redirect('/product');
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
        $viewproduct  = DB::table('product')
        ->where('pid', $id)
        ->get();

 return view('productview',compact('viewproduct'));
}
else
{
return redirect('/login');

}
    }

    public function edit($id)
    {
        $adminid = session()->get('usersession');

      if(isset($adminid))
      {
        $editdata = product::find($id);
        return view('editview', compact('editdata')); 
    }
    else
    {
    return redirect('/login');

    }
    }

    public function update(Request $req,$id)
    {
        $adminid = session()->get('usersession');

      if(isset($adminid))
      {
        $product = new product;
        $product = product::find($id);
        
        if($req->file('pimage')){ 
            $file= $req->file('pimage'); 
            $filename= date('YmdHi').$file->getClientOriginalName(); 
            $file-> move(public_path('profile'), $filename); 
            $product->pimage = $filename;
            
            }  
        $product->pname = $req['pname'];
        $product->subid = $req['subid'];
        $product->pcid = $req['cid'];
        $product->pprice = $req['pprice'];
        $product->pdate = $req['pdate'];
        $product->description = $req['detail'];


        $product->update();

        return redirect('/product/list');
    }
    else
    {
    return redirect('/login');

    }
    }

}                                          
