<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // In Class Activity 1
    public function test() {
        return "Hello World From my Controller";
    }
    
    public function test2(){
        return view('helloWorld');
    }
    
    
}