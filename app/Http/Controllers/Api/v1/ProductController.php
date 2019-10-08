<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends AbstractController
{
    /**
     * ProductController constructor.
     * @param ProductService $service
     */
    public function __construct(ProductService $service)
    {
        $this->service = $service;
        $this->model = Product::class;
    }

     /**
         * @param Request $request
         * @return mixed
         * @throws \Illuminate\Auth\Access\AuthorizationException
         */
        public function store(Request $request)
        {
            return parent::save($request);
        }

        /**
         * @param Request $request
         * @param $id
         * @return mixed
         * @throws \Illuminate\Auth\Access\AuthorizationException
         */
        public function update(Request $request, $id)
        {
            return parent::updateAs($request, $id);
        }
}
