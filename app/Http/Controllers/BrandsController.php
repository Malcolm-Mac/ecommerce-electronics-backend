<?php

namespace App\Http\Controllers;

use App\Helpers\MessagesHelper;
use App\Http\Requests\BrandsRequest;
use App\Http\Resources\BrandsResource;
use App\Repositories\implementations\BrandsRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, BrandsRepository $brandRes)
    {
        try {
            $brands = $brandRes->all($request->only('paginate'));
            $brandsResource = new BrandsResource($brands);
            return response()->json(['success' => true, 'data' => $brandsResource], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getErrorMessage()];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandsRequest $request, BrandsRepository $brandRes)
    {
        try {
            $data = $request->only('name');
            $brandRes->create($data);
            return response()->json(['success' => true, 'message' => MessagesHelper::getCreatedMessage('Brand')], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getErrorMessage()];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id, BrandsRepository $brandRes)
    {
        try {
            $brand = $brandRes->find($id);
            $brandsResource = new BrandsResource($brand);
            return response()->json(['success' => true, 'data' => $brandsResource], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getNotFoundMessage($id)];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, BrandsRequest $request, BrandsRepository $brandRes)
    {
        try {
            $brandRes->update($id, $request->only('name'));
            return response()->json(['success' => true, 'message' => MessagesHelper::getUpdatedMessage($id)], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getNotFoundMessage($id)];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, BrandsRepository $brandRes)
    {
        try {
            $brandRes->delete($id);
            return response()->json(['success' => true, 'message' => MessagesHelper::getDeletedMessage($id)], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getNotFoundMessage($id)];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
