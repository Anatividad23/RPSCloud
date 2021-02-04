<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class Login2Controller extends Controller
{
    
    public function index(Request $request){
        
    try{
        
        //STEP 1 PROCESS DATA
        //Get the posted form data
        $username = $request->input('username');
        $password = $request->input('password');
        
        //STEP 2 CREATE OBJECT MODEL
        //create new User model with form data
        $user = new UserModel(-1, $username, $password);
        
        //EXECUTE BUSINESS SERVICE
        //Cakk Security Business service
        $service = new SecurityService();
        $status = $service->login($user);
        
        //STEP 4 NAVIGATION
        //Render a failed or success response view and 
        //pass thr user model to it
        if($status)
        {
            $data = ['model' => $user];
            return view('loginPassed2')->with($data);
        }else{
            
                return view('loginFailed2');
               
            
            }
       
    }catch(Exception $e){
            Log::error('Exeption: ',array("message"=> $e->getMessage()));
            $data = ['errorMsg'=> $e->getMessage()];
            return view('exception')->with($data);
        }
     /*   
        //Render a failed or success response to a view and pass the user model to it
        $data = ['model' => $user];
        
        return view('loginPassed')->with($data);
     */
    }
    
    
}