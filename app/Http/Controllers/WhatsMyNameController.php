<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsMyNameController extends Controller
{
   //For Ask me form
    public function index(Request $request){
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        
        //Render a response View to pass the form data to it
        $data = ['firstname'=> $firstName, 'lastname' => $lastName];
        return view('thatsWhoIam')->with($data);
    }
}