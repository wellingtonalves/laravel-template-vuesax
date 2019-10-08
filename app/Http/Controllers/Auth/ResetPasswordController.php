<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(ResetPasswordRequest $request)
    {
        try {
            // Here we will attempt to reset the user's password. If it is successful we
            // will update the password on an actual user model and persist it to the
            // database. Otherwise we will parse the error and return the response.

            $response = $this->broker()
                ->reset($this->credentials($request), function ($user, $password) {
                    $this->resetPassword($user, $password);
                });

            if ($response == Password::PASSWORD_RESET) {
                return Response::getJsonResponse($response, $response, \Illuminate\Http\Response::HTTP_OK);
            } else {
                return Response::getJsonResponse($response, $response, \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
            }

        } catch (\Exception $e) {
            return Response::getJsonResponse('login_error', $e->getMessage(), \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
