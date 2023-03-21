<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryController extends Controller
{
    public function index(): ResourceCollection
    {
        $categories = Category::query();

        return CategoryResource::collection(
            $categories->paginate(10)
        );
    }

    public function store(CategoryStoreRequest $request): JsonResponse
    {
        $category = Category::create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => str()->slug($request->name),
        ]);

        return ResponseFormatter::success(
            new CategoryResource($category),
            'Category added successfully'
        );
    }

    public function update(CategoryUpdateRequest $request, Category $category): JsonResponse
    {
        $category->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => str()->slug($request->name),
        ]);

        return ResponseFormatter::success(
            new CategoryResource($category),
            'Category updated successfully'
        );
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return ResponseFormatter::success(
            new CategoryResource($category),
            'Category deleted successfully'
        );
    }
}
