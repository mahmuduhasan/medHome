<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user|superadministrator');
    }

    public function index()
    {
        $product = DB::table('product')->get();
        return view('user.index',compact('product'));
    }

    public function singleProduct($id){
        $single = DB::table('product')->where('id',$id)->first();
        return view('user.product',compact('single'));
    }

    public function offer(){
        $offer=DB::table('offer')->get();
        return view('user.offer',compact('offer'));
    }
}
