<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notice;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index(){
        return view('notice.index');
    }

    public function upload(Request $request){
        if($request->file('file')){
            $file=$request->file('file');
            $filename= time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/',$filename);
        }
        DB::table('notice')->insert([
            'name' => $request->name,
            'file' => $filename
        ]);
        return back()->with('notice_uploaded','Notice Uploaded Successfully!');
    }

    public function shownotice(){
        $uploadedFile = DB::table('notice')->get();
        return view('notice.adminnoticeboard',compact('uploadedFile'));
    }

    public function deletenotice($id){
        DB::table('notice')->where('id',$id)->delete();
        return back()->with('notice_deleted','Notice Removed!');
    }

    public function viewNotice($id){
        $noticeFile = DB::table('notice')->where('id',$id)->first();
        return view('notice.details',compact('noticeFile'));
    }

    public function downloadNotice($file){
        return response()->download('storage/'.$file);
    }
}
