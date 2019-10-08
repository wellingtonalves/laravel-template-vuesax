<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Login
     * @param LoginRequest $request
     *
     * @return Response|\Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('username', $request->get('username'))->first();

            if (!$user) {
                return \Illuminate\Http\Response::custom('login_error', $request->get('username'), 404);
            }

            if ($user->status == 'inativo') {
                return \Illuminate\Http\Response::custom('login_error', $request->get('username'), 404);
            }

            $request = Request::create('/oauth/token', 'POST', [
                'grant_type' => 'password',
                'client_id' => config('services.passport_client.id'),
                'client_secret' => config('services.passport_client.secret'),
                'username' => $request->get('username'),
                'password' => $request->get('password'),
            ]);
            $attempt = app()->handle($request);


            if ($attempt->getStatusCode() == \Illuminate\Http\Response::HTTP_UNAUTHORIZED) {

                return \Illuminate\Http\Response::custom('login_error', $request->get('username'), 404);
            } else {
                $content = json_decode($attempt->getContent());
                return \Illuminate\Http\Response::custom('list', $content, 200);
            }

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return \Illuminate\Http\Response::custom('error','' , 404);
        }
    }

    /**
     * SignupActivate
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function signupActivate($token)
    {
        try {
            $user = User::where('remember_token', $token)->first();

            if (!$user) {
                return Response::getJsonResponse(
                    'sign_up_active_404',
                    $user,
                    \Illuminate\Http\Response::HTTP_NOT_FOUND
                );
            }

            $user->email_verified_at = Carbon::now();
            $user->remember_token = '';

            $user->status = 'trial';


            $user->save();

            return Response::getJsonResponse(
                'sign_up_active_200',
                $user,
                \Illuminate\Http\Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return Response::getJsonResponse(
                'sign_up_active_422',
                $e->getMessage(),
                \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function logout(Request $request)
    {
        try {
            $revoked = $request->user()->token()->revoke();

            return Response::getJsonResponse(
                'logout_success',
                $revoked,
                \Illuminate\Http\Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return Response::getJsonResponse(
                'logout_error',
                $e->getMessage(),
                \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
