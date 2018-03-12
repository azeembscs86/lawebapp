<?php

namespace App\Http\Controllers\Admin\Categories;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    //----------------check whether user is login or not------------------------
    public function __construct() {
        $this->middleware('auth');
    }
    
    //-------------------------get all categories-------------------------------
    public function index()
    {
        $categories = Categories::OrderBy('category_id','desc')->get();
        return view('admin.categories.index',array('page_title'=>'Admin Categories','categories'=>$categories)); 
    }
    
    //------------------------add new category----------------------------------
    public function addCategory(Request $request)
    {
        $category = new Categories();
        $category->cat_name = $request->input('category_name');
        $category->created_at      = date("Y-m-d H:i:s");
        $category->updated_at     = date("Y-m-d H:i:s");
        $category->save();
        return Redirect::back()->withMessage('Category successfuly created.');  
    }
    //------------------------update category----------------------------------
    public function updateCategory(Request $request)
    {
        $category = Categories::find($request->input('category_id'));
        if($category)
        {
            $category->cat_name = $request->input('category_name');            
            $category->updated_at     = date("Y-m-d H:i:s");
            $category->save();
            return Redirect::back()->withMessage('Category successfuly update.');  
        }else
        {
            return Redirect::back()->withErrors('Category does not Exits.');  
        }
        
    }
    //------------------------delete category--------------------------------
    public function destroy($category_id)
    {
        $category = Categories::find($category_id);
        if($category)
        {
            $category->delete();
            return Redirect::back()->withMessage('Category successfuly deleted.');  
            
        } else {
            return Redirect::back()->withErrors('Category does not Exits.');  
        }
    }
}
