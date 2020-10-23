<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:employee');
    }

    public function index()
    {
        $agent = DB::table('request')->get();
        return view('employee.index',compact('agent'));
    }

    public function viewAgent($id){
        $view = DB::table('request')->where('id',$id)->first();
        return view('employee.viewagent',compact('view'));
    }

    public function addAgentView(){
        return view('employee.addagent');
    }

    public function addAgent(Request $request){
        DB::table('request')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'employee' => $request->employee,
            'password' => $request->password
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->attachRole('agent');
        return back()->with('agent_added','Agent added successfully. Wait for the confirmation!');
    }

    public function shownotice(){
        $showInEmployee = DB::table('notice')->get();
        return view('employee.viewnotice',compact('showInEmployee'));
    }

    public function viewNotice($id){
        $notice = DB::table('notice')->where('id',$id)->first();
        return view('employee.notice',compact('notice'));
    }
    
}
