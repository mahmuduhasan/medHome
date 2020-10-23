<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Report extends Model
{
    protected $table = 'report';
    protected $casts =[
        'update' => 'array'
    ];

    public static function getReport(){
        $reports = DB::table('report')->select("id","shopname","explain","amount","update","created_at")->orderBy('id','asc')->get()->toArray();
        return $reports;
    }
}
