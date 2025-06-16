<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class excontroller extends Controller
{
    //
    public function index(){
          
            
        // DB::table('student')->insert([
        //     'name'=>'saleh',
        //     'Age' => 10,
        //     'created_at' => '2025/03/15'
        //     // 'created_at'=>'Date(y/m/d)'
        // ]);
        

     $n1=  DB::table('student')->get();
        if($n1!=null){

            return view('student.page_student',[

                's' => $n1
            ]);
        }
    }
}
