<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\category;

class category_controller extends Controller
{

    public function index()
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        
        $listdata = DB::table('category')
        ->where('status', 1)
        ->get();

       
         return view('categorylist',compact('listdata'));
        }
        else
        {
        return redirect('/login');
    
        }
    }

    public function search(Request $req)
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
       
       $search = $req['search']; 

       $listdata = DB::table('category')
       ->where('cname', $search)
       ->where('status', 1)
       ->get();

       return view('categorylist',compact('listdata'));
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
        
        return view('categoryform',compact('category'));
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

        $subid = $req['subid']; 

        if($subid == '0')
        {
            return redirect('/category/add');
        }
        elseif($subid == 'm')
        {

            $category = new category;
            $category->cname = $req['cname']; 
            $category->subid = '0'; 
            $category->save();


            return redirect('/category/add');

        }
        else
        {
            $category = new category;
            $category->cname = $req['cname']; 
            $category->subid = $subid; 
            $category->save();
            return redirect('/category/add');
       
        }
    }
    else
    {
    return redirect('/login');

    }
    }

    public function edit(Request $r)
    {

        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        $id = $r->editid;

    $editdata = category::find($id);   
    // $comdata = compact('editdata');

    return view('editcategory',compact('editdata'));
}
else
{
return redirect('/login');

}
    }

    public function update(Request $req)
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        $id = $req['cid']; 
        $category = category::find($id); ;
        $category->cname = $req['cname']; 
        $category->update();
        return redirect('/category'); 
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
      
        $category = category::find($id); ;
        $category->status = '0'; 
        $category->update();

 return redirect('/category');
}
else
{
return redirect('/login');

}
    }


} 


?>
