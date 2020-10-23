<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Report;
use PDF;
use App\Exports\ReportExport;
use EXCEL;

class AdminController extends Controller
{
    //Admin-Authentication
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    //Admin View
    public function index(){
        return view('admin.index');
    }
    //Product-Get
    public function allcontent()
    {
        $products = DB::table('product')->paginate(5);
        return view('admin.allproduct',compact('products'));
    }
    //Product-Show
    public function viewProduct(){
        return view('admin.addproduct');
    }
    //Product-Add
    public function addProduct(Request $request){
        DB::table('product')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return back()->with('data_send','Product Added Successfully!');
    }
    //Product-delete
    public function deleteProduct($id){
        DB::table('product')->where('id',$id)->delete();
        return back()->with('product_deleted','Product has been removed successfully!');
    }

    public function showUpdateProduct($id){
        $product = DB::table('product')->where('id',$id)->first();
        return view('admin.updateproduct',compact('product'));
    }
    //Product-Update
    public function updateProduct(Request $request){
        DB::table('product')->where('id',$request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return back()->with('product_updated','Product Updated Successfully!');
    }

    public function productSearch(){
        $search_text = $_GET['query'];
        $product = DB::table('product')->where('name','LIKE','%'.$search_text.'%')->get();
        return view('admin.searchproduct',compact('product'));
    }
    
    
    //-------------------------------------------//
    //Agent fetch
    public function allagent()
    {
        $agent = DB::table('agent')->get();
        return view('admin.agent',compact('agent'));
    }
    //Agent view
    public function viewAgent(){
        return view('admin.addagent');
    }
    //Agent Add
    public function addAgent(Request $request){
        DB::table('agent')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->attachRole('agent');
        return back()->with('agent_sent','Agent Added Successfully!');
    }
    //Agent Delete
    public function deleteAgent($id){
        DB::table('agent')->where('id',$id)->delete();
        return back()->with('agent_deleted','Agent has been removed successfully!');
    }
    //Agent Update Form show
    public function showUpdateAgent($id){
        $agent = DB::table('agent')->where('id',$id)->first();
        return view('admin.updateagent',compact('agent'));
    }
    //Agent update
    public function updateAgent(Request $request){
        DB::table('agent')->where('id',$request->id)->update([
            'name' => $request->name,
            'address' => $request->address
        ]);
        return back()->with('agent_updated','Agent Updated Successfully!');
    }

    public function agentSearch(){
        $search_text = $_GET['query'];
        $agent = DB::table('agent')->where('name','LIKE','%'.$search_text.'%')->get();
        return view('admin.searchagent',compact('agent'));
    }
    //------------------------------//
    //Employee View
    public function allemployee()
    {
        $employee = DB::table('employee')->get();
        return view('admin.employee',compact('employee'));
    }
    //Employee view
    public function viewEmployee(){
        return view('admin.addemployee');
    }
    //Employee Add
    public function addEmployee(Request $request){
        DB::table('employee')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->attachRole('employee');
        return back()->with('employee_sent','Employee Added Successfully!');
    }
    //Employee Delete
    public function deleteEmployee($id){
        DB::table('employee')->where('id',$id)->delete();
        return back()->with('employee_deleted','Employee has been removed successfully!');
    }
    //Employee Update Form show
    public function showUpdateEmployee($id){
        $employee = DB::table('employee')->where('id',$id)->first();
        return view('admin.updateemployee',compact('employee'));
    }
    //Employee update
    public function updateEmployee(Request $request){
        DB::table('employee')->where('id',$request->id)->update([
            'name' => $request->name,
            'address' => $request->address
        ]);
        return back()->with('employee_updated','Employee Updated Successfully!');
    }

    public function employeeSearch(){
        $search_text = $_GET['query'];
        $employee = DB::table('employee')->where('name','LIKE','%'.$search_text.'%')->get();
        return view('admin.searchemployee',compact('employee'));
    }
    //-----------------------------------//
    //Request
    public function showRequest(){
        $request = DB::table('request')->get();
        $user = DB::table('users')->get();
        return view('admin.request',compact('request','user'));
    }

    public function approve(Request $request){
        DB::table('request')->where('id',$request->id)->update(['permission' => true]);
        return redirect()->back()->with('message','Agent Approved!');
    }

    public function deleteAgentFromAdmin($email){
        /*DB::table('users')
            ->join('request','users.email','=','request.email')
            ->delete();*/
        DB::table('users')->where('email',$email)->delete();
        DB::table('request')->where('email',$email)->delete();
        return back()->with('agent_deleted','Agent Deleted Successfully');
    }

    public function offer(){
        $offer = DB::table('offer')->get();
        return view('admin.offer',compact('offer'));
    }
    
    public function uploadOffer(){
        return view('admin.uploadoffer');
    }

    public function upload(Request $request){
        DB::table('offer')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'coufon' => $request->coupon
        ]);
        return back()->with('offer_uploaded','Offer Added Successfully!');
    }

    public function deleteOffer($id){
        DB::table('offer')->where('id',$id)->delete();
        return back()->with('offer_deleted','Offer Deleted!');
    }

    public function getReport(){
        $reports = DB::table('report')->get();
        return view('admin.report',compact('reports'));
    }

    public function downloadReportPDF(){
        $reports = DB::table('report')->get();
        $pdf = PDF::loadView('admin.report',compact('reports'));
        return $pdf->download('report.pdf');
    }

    public function exportReportEXCEL(){
        return EXCEL::download(new ReportExport,'report.xlsx');
    }

    public function exportReportCSV(){
        return EXCEL::download(new ReportExport,'report.csv');
    }
}
