<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:agent');
    }

    public function index()
    {
        $products = DB::table('product')->paginate(10);
        return view('agent.index',compact('products'));
    }

    public function showProductForm(){
        return view('agent.addproduct');
    }
    public function addProductByAgent(Request $request){
        DB::table('product')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'shop' => $request->shop
        ]);
        return back()->with('sendby_agent','Product Added Successfully!');
    }

    public function reportView(){
        return view('agent.report');
    }

    public function storeReport(Request $request){
        $report = new Report();

        $report->shopname = $request->name;
        $report->explain = $request->description;
        $report->amount = $request->price;
        $report->update = $request->update;

        $report->save();
        
        return back()->with('report_submitted','Report Submission Successful!');
    }
}
