<?php

namespace App\Http\Middleware;

use App\Services\Utility\MyLogger2;
use Closure;

class MySecurityMiddleware
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
        
        //Step1: You can  use the following to get the route URI $request->path()
        //          OR you cna also use $request->is();
        $path = $request->path();
        MyLogger2::info("Enteringy MySecurityMiddleWere in handle() at path" . $path);
        
        //Step2: Runt the business rules that check for all URI's that you do not neeed to secure
        
       $secureCheck = true;
       if($request->is('/')|| $request->is('login5')||$request->is('doLogin5')||
           $request->is('userrest')|| $request->is('userrest/*')||
           $request->is('loggingservice')||$request->is('restclient')){
           $secureCheck = false;
       }
       MyLogger2::info($secureCheck ? "Security Middleware is handle().....Needs Security":
           "Security Middleware in handle()....No Security Requirement");
       
       $enable = false;
       if($enable && $secureCheck){
           return redirect('login5');
       }
           
          
           
        return $next($request);
    }
}
