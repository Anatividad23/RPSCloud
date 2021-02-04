<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

//In Class Activity 1
//This route is mapped to "/hello" uri will return text "Hello World" to be rendered in the browser
Route::get('/hello', function () {
    return "Hello World";
});

//This route is mapped to "/helloWorld" uri will return the view page helloWorld.php form resoruces/views folder
Route::get('/helloWorld', function () {
    return view("helloWorld");
});

//In Class Activity 1 Test Controller
Route::get('/test', 'TestController@test2');

//In Class Activity 1
//This route is mapped to "/hello" uri will return text "Hello World" to be rendered in the browser
Route::get('/askme', function () {
    return view('whoami');
});

//Hooking up controller to form
Route::post('/whoami','WhatsMyNameController@index');

Route::get('/login',function(){
    return view('login');
});

Route::post('/doLogin','loginController@index');

Route::get('/login2',function(){
    return view('login2');
});

Route::post('/doLogin2','Login2Controller@index');

Route::get('/login3',function(){
    return view('login3');
});
    
Route::post('/doLogin3','Login3Controller@index');

//MIDTERM CODING EXAM CALCULATOR ROUTES////////////////////////////////////
Route::get('/calculator',function(){
    return view('CalculatorView');
});

Route::post('/calculate','CalculatorController@calculate');
    
///Login 5 Routes for Logging Practice///////////////////////////////////////
Route::get('/login5',function(){
    return view('login5');
});
Route::post('/doLogin5','Login5Controller@index');

////REST API ROUTES //////////////////////////////////////////////////////////

Route::resource('/usersrest','UserRestController');

//Route::resource('/usersrest/{id}','UserRestController');

////TestLoggingController////////////////////////////////////////////////////
Route::get('/loggingService','TestingLoggingController@index');

Route::get('/game',function(){
    return view('GameView');
});
    
    Route::post('/play','GameController@play');