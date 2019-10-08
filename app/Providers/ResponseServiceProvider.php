<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('custom', function ($message = 'list', $response = null, $status = 200) {
            $data = [];

            if ($response instanceof \Exception) {
                $data['message'] = __('messages.' . $message);
                $data['data'] = $response->getMessage();
                $data['status'] = 404;

                return response()->json($data, $data['status']);
            }
            if (!$response instanceof LengthAwarePaginator) {
                $data['message'] = __('messages.' . $message);
                $data['data'] = $response;
                $data['status'] = $status;

                return response()->json($data, $data['status']);
            }

            $fields = collect([
                'message' => __('messages.' . $message),
                'status' => $status,
            ]);
            $data = $fields->merge($response);

            return response()->json($data, $data['status']);
        });
    }
}
