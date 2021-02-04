<?php

namespace App\Http\Controllers;

use App\Models\CalculatorModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\Business\CalculatorService;

class CalculatorController extends Controller
{
    /**
     * Take request object and makes a new calculatorModel object
     * calls business service and pass the object
     * navigates to view with result from service
     * @param Request $request
     * @throws ValidationException
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function calculate(Request $request){
        try{
            //Validation
            $this->validateForm($request);
            
            //get form values
            $operand1 = $request->input('operand1');
            $operand2 = $request->input('operand2');
            $operation =$request->input('operation');
            
            //make new calculator object
            $calculator = new CalculatorModel($operand1, $operand2, $operation);
            
            //call business service to get result
            $service = new CalculatorService();
            $result = $service->calculate($calculator);
            
            //pass data and navigate to view
            $data = ['result'=>$result];
            
            return view('CalculatorResultView')->with($data);
        }catch(ValidationException $e){
            throw $e;
        }
        
    }
    
    public function validateForm($request){
        //Data validation rules both fields required.
        //Because radio button has one checked by default no validation needed for 'operation'
        $rules = [
            'operand1' => 'Required ',
            'operand2' => 'Required ' 
        ];
        
        $this->validate($request, $rules);
    }
    
}