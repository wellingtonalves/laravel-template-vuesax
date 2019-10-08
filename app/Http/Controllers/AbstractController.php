<?php


namespace App\Http\Controllers;

use Illuminate\Http\Response;

abstract class AbstractController extends Controller
{
    /**
     * @var $service
     */
    protected $service;
    protected $model;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', $this->model);
        return Response::custom('list', $this->service->all(), \Illuminate\Http\Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param $uuid
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function show($uuid)
    {
        $this->authorize('show', $this->model);
        $data = $this->service->find($uuid);
        return Response::custom('detail', $data, \Illuminate\Http\Response::HTTP_OK);
    }

    /**
     * Store.
     *
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function save($request)
    {
        $this->authorize('store', $this->model);
        $data = $this->service->create($request);
        return Response::custom('created', $data, \Illuminate\Http\Response::HTTP_CREATED);
    }

    /**
     * Store.
     *
     * @param $request
     * @param $uuid
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateAs($request, $uuid)
    {
        $this->authorize('update', $this->model);
        $data = $this->service->update($request, $uuid);
        return Response::custom('updated', $data, \Illuminate\Http\Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $uuid
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($uuid)
    {
        $this->authorize('destroy', $this->model);
        $data = $this->service->destroy($uuid);
        return Response::custom('deleted', $data, \Illuminate\Http\Response::HTTP_OK);
    }
}
