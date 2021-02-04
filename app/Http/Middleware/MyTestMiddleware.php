<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Utility\MyLogger2;
use Illuminate\Support\Facades\Cache;

class MyTestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Creating middlewere in Laravel
        //Step1: Run the artisan command to make middleweere
        //Step2: Register middlewere in kernel
        //Step3: Implement your Middlewere logigic 
        MyLogger2::info("Enteringy MyTestMiddleWere in handle()");
        
        //Using a Data Cache is easy in Laravel
        //  Step1: Get an instance of one of the Caches
        //  Step2: Get a valuefor the Cache and if not in the Cache put a value in the Chache
        //          for a specified number of minutes.
        if($request->username != null){
            $value = Cache::store("file")->get("mydata");
            if($value == null){
                MyLogger2::info("Enteringy MyTestMiddleWere in handle()");
                Cache::store("file")->get("mydata",$request->username,1);
                
            }
        }else{
            $value = Cache::store("file")->get("mydata");
            if($value == null){
                MyLogger2::info("Getting Username for Cache ". $value);
            }else{
                MyLogger2::info("Could not get username from cache (data is older than 1 minute)");
            }
        }
        return $next($request);
    }
}
