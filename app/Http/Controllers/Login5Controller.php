<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use App\Services\Utility\MyLogger2;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
/**
 * This controller is used for the Logging ICA
 * @author Anthony Natividad
 *
 */
class Login5Controller extends Controller
{

    public function index(Request $request)
    {
        MyLogger2::info("Entering Login5Controller@index()");
        
        try {
            $this->validateForm($request);

            // STEP 1 PROCESS DATA
            // Get the posted form data
            $username = $request->input('username');
            $password = $request->input('password');
            MyLogger2::info(" Parameters:", array("Username"=>$username,"password"=>$password));

            // STEP 2 CREATE OBJECT MODEL
            // create new User model with form data
            $user = new UserModel(- 1, $username, $password);

            // EXECUTE BUSINESS SERVICE
            // Cakk Security Business service
            $service = new SecurityService();
            $status = $service->login($user);

            // STEP 4 NAVIGATION
            // Render a failed or success response view and
            // pass thr user model to it
            if ($status) {
                MyLogger2::info("Exit Login5Controller.index() with login passed");
                $data = [
                    'model' => $user
                ];
                return view('gameView')->with($data);
            } else {

                MyLogger2::info("Exit Login5Controller.index() with login passed");
                return view('loginFailed3');
            }
        } catch (ValidationException $e1) {
            throw $e1;
        } catch (Exception $e) {
            MyLogger2::error('Exeption: ', array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
        /*
         * //Render a failed or success response to a view and pass the user model to it
         * $data = ['model' => $user];
         *
         * return view('loginPassed')->with($data);
         */
    }

    private function validateForm(Request $request)
    {
        $rules = [
            'username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'
        ];

        $this->validate($request, $rules);
    }
}