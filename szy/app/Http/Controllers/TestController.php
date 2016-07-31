<?php

namespace App\Http\Controllers;

use App\Tests;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function index(){
//        for($i = 0 ; $i < 50 ;$i++){
//            $test = new Tests();
//            $test->name = 'name'.($i+1);
//            $test->save();
//        }
        $tests = Tests::paginate(1);
        $links = $tests->links();
        return view('welcome',['tests' => $tests]);
    }

    public function fy(){
        $tests = Tests::paginate(1);
        $links = $tests->links()->toHtml();
        return response()->json(['tests' => $tests, 'links' => $links]);
    }
}
