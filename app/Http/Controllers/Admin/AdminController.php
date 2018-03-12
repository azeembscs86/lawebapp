<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //----------------check whether user is login or not------------------------
    public function __construct() {
        $this->middleware('auth');
    }
    
    //---------------------------admin dashboard--------------------------------
    public function index()
    {
        $user_role = Auth::user()->user_role;
        if($user_role=='admin')
        {
            $products       = \App\Products::latest('id', 'asc')->count();
            return view('admin.dashboard')->with('page_title', "Admin Dashboard")->with('products',$products);
        }else
        {
            return redirect('admin/login');
        }
    }
    
    
    
    //------------------admin logout--------------------------------------------
    public function adminLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
