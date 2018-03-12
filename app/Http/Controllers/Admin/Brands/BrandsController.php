<?php

namespace App\Http\Controllers\Admin\Brands;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Brands;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    //----------------check whether user is login or not------------------------
    public function __construct() {
        $this->middleware('auth');
    }
    
    //----------------------------get all brand list----------------------------
    public function index()
    {
        $brand = Brands::OrderBy('brand_id','desc')->get();
        return view('admin.brands.index',array('page_title'=>'Admin Brands','brands'=>$brand));
    }
    
    //----------------------------add new brand---------------------------------
    public function addBrand(Request $request)
    {                
        if($request->file('img_path'))
            {
               $this->validate($request, [
               'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               ]);
                $image = $request->file('img_path');            
                $name = time().'.'.$image->getClientOriginalExtension();
                $image_path ="uploads/brands/".$name;                
                $brand = new Brands();
                $brand->brand_name  = $request->input('brand_name');
                $brand->brand_image      = $image_path;
                $brand->created_at         = date("Y-m-d H:i:s");
                $brand->updated_at         = date("Y-m-d H:i:s");
                $brand->save();
                $destinationPath = public_path('/uploads/brands');   
                $image->move($destinationPath, $name);
                return Redirect::back()->withMessage('Brand Successfuly Created.');   
            }else
            {
                $brand = new Brands();
                $brand->brand_name  = $request->input('brand_name');   
                $brand->created_at         = date("Y-m-d H:i:s");
                $brand->updated_at         = date("Y-m-d H:i:s");
                $brand->save();
                return Redirect::back()->withMessage('Brand Successfuly Created.');   
            }  
        
        
    }
    //---------------------------update brand-----------------------------------
    public function updateBrand(Request $request)
    {
        $brand = Brands::find($request->input('brand_id'));
        if($brand)
        {
            if($request->file('img_path'))
            {
               $this->validate($request, [
               'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               ]);
                $image = $request->file('img_path');            
                $name = time().'.'.$image->getClientOriginalExtension();
                $image_path ="uploads/brands/".$name; 
                $brand->brand_name  = $request->input('brand_name');
                $brand->brand_image      = $image_path;
                $brand->created_at         = date("Y-m-d H:i:s");
                $brand->updated_at         = date("Y-m-d H:i:s");
                $brand->save();
                $destinationPath = public_path('/uploads/brands');   
                $image->move($destinationPath, $name);
                return Redirect::back()->withMessage('Brand successfuly updated.');  
            }else
            {               
                $brand->brand_name         = $request->input('brand_name');   
                $brand->brand_image         = $request->input("logo_image");
                $brand->created_at         = date("Y-m-d H:i:s");
                $brand->updated_at         = date("Y-m-d H:i:s");
                $brand->save();
                return Redirect::back()->withMessage('Brand successfuly updated.'); 
            }               
        }else
        {
            return Redirect::back()->withMessage('Brand does not exists.');  
        }
    }
    //---------------------------delete brand-----------------------------------
    public function destroy($brand_id)
    {
        $brand = Brands::find($brand_id);
        if($brand)
        {
            $brand->delete();
            return Redirect::back()->withMessage('Brand successfuly deleted.');  
        }else
        {
            return Redirect::back()->withMessage('Brand does not exists.');  
        }
        
    }
}
