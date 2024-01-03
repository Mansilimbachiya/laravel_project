<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\my_gallery;

class gallery_controller extends Controller
{
    public function index()
    {
        $adminid = session()->get('usersession');

        if(isset($adminid))
        {
        $gallerydata = DB::table('my_gallery')
        ->where('gstatus',0)
        ->orwhere('gstatus',1)
        ->get();
 
        //print_r($gallerydata);
       return view('/my_gallery',compact('gallerydata'));

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
       return view('gallery_form');

    }
    else
    {
    return redirect('/login');

    }
    }

    public function list()
    {
        $adminid = session()->get('usersession');

          if(isset($adminid))
          {
        return redirect('/gallery');
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
        $galleryimage = new my_gallery;

        if($req->file('gimage')){ 
            $file= $req->file('gimage'); 
            $filename= date('YmdHi').$file->getClientOriginalName(); 
            $file->move(public_path('profile'), $filename); 
            $galleryimage->gimage = $filename;
            
            }  

        $galleryimage->gimgname = $req['gimgname'];
        
        $galleryimage->save();

        return redirect('/image/add');
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
            $gimage = my_gallery::find($id);
            $gimage->gstatus = '0';
            $gimage->update();
    
            return redirect('/gallery');
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
            $gimage= my_gallery::find($id);
            $gimage->gstatus = '1';
            $gimage->update();
    
            return redirect('/gallery');
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
        $deleterow = my_gallery::find($id);
        $deleterow->gstatus = '2';
        $deleterow->update();

        return redirect('/gallery');
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
        $editdata = my_gallery::find($id);
        return view('mygallery_editview', compact('editdata')); 
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
        $id = $req['imageid'];
        
        $nimage = $req->file('gimage');
        $imgname = $req['gimgname'];
        $oldimg = $req['oldimg'];
        $imgid = $req['imageid'];
       
if($req->file('gimage') == Null)
{
    $updategallery = my_gallery::find($id);
        $updategallery->gimage = $oldimg;
        $updategallery->gimgname = $imgname;
        $updategallery->update();

}

else
{

    $updategallery = my_gallery::find($id);

if($req->file('gimage')){ 
            $file= $req->file('gimage'); 
            $filename= date('YmdHi').$file->getClientOriginalName(); 
            $file->move(public_path('profile'), $filename); 
            $updategallery->gimage = $filename;
            
            }  

            $updategallery->gimgname = $req['gimgname'];
            $updategallery->update();

}
    //    $req->file('gimage');
    //    $req['gimgname'];
    //    $req['oldimg'];
    //    $req['imageid'];

        // if($req->file('gimage')){ 
        //     $file= $req->file('gimage'); 
        //     $filename= date('YmdHi').$file->getClientOriginalName(); 
        //     $file->move(public_path('profile'), $filename); 
        //     $galleryimage->gimage = $filename;
            
        //     }  

        // $galleryimage->gimgname = $req['gimgname'];
       
        // $galleryimage->update();

        //print_r($galleryimage);

       return redirect('/image/list');
    }
    else
    {
    return redirect('/login');

    }
    }
}