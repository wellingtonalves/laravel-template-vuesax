<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            $user = User::where('email', $request->get('email'))->first();

            if (!$user) {
                return Response::getJsonResponse('email_not_found', $request->get('email'), \Illuminate\Http\Response::HTTP_NOT_FOUND);
            } else {
                $response = $this->broker()->sendResetLink(
                    $request->only('email')
                );

                return $response == Password::RESET_LINK_SENT
                    ? Response::getJsonResponse('passwords_reset_link_sent', ['status' => true], \Illuminate\Http\Response::HTTP_OK)
                    : Response::getJsonResponse('passwords_reset_link_sent_error', ['status' => false], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
        } catch (\Exception $e) {
            return Response::getJsonResponse('login_error', $e->getMessage(), \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    protected function sendResetLinkResponse($response)
    {
        return response()->json(['status' => 200, 'message' => trans($response)]);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['status' => 401, 'email' => trans($response)]);
    }
}
