<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\Business\GameBusinessService;

class GameController extends Controller
{
   
    public function play(Request $request){
        try{
            //Validation
            $this->validateForm($request);
            
            //get form values
            $move = $request->input('move');
            
            
            //make new calculator object
            $game = new Game($move,"undecided", 0, 0);
            
            //call business service to get result
            $service = new GameBusinessService();
            
            $result = $service->playGame($game);
            $game =$result;
            //pass data and navigate to view
            $data = ['game'=>$game];
            
            return view('GameResultView')->with($data);
        }catch(ValidationException $e){
            throw $e;
        }
        
    }
    
    public function validateForm($request){
        //Data validation rules both fields required.
        //Because radio button has one checked by default no validation needed for 'operation'
        $rules = [
           
        ];
        
        $this->validate($request, $rules);
    }
    
}