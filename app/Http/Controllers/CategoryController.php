<?php

namespace App\Http\Controllers;

use App\Helpers\MessagesHelper;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\implementations\CategoriesRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, CategoriesRepository $categoryRes)
    {
        try {
            $categories = $categoryRes->all($request->only('paginate'));
            $categoryResource = new CategoryResource($categories);
            return response()->json(['success' => true, 'data' => $categoryResource], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getErrorMessage()];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, CategoriesRepository $categoryRes)
    {
        try {

            $data = $request->only('name','image');
            $categoryRes->create($data);
            return response()->json(['success' => true, 'message' => MessagesHelper::getCreatedMessage('Category')], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getErrorMessage()];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id, CategoriesRepository $categoryRes)
    {
        try {
            $category = $categoryRes->find($id);
            $categoryResource = new CategoryResource($category);
            return response()->json(['success' => true, 'data' => $categoryResource], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getNotFoundMessage($id)];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, CategoryRequest $request, CategoriesRepository $categoryRes)
    {
        try {
            $categoryRes->update($id, $request->only('name','image'));
            return response()->json(['success' => true, 'message' => MessagesHelper::getUpdatedMessage($id)], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getNotFoundMessage($id)];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, CategoriesRepository $categoryRes)
    {
        try {
            $categoryRes->delete($id);
            return response()->json(['success' => true, 'message' => MessagesHelper::getDeletedMessage($id)], Response::HTTP_OK);
        } catch (Exception $e) {
            $data = ['success' => false, 'message' => MessagesHelper::getNotFoundMessage($id)];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
