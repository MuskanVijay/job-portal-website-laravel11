<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
{
    return response()->json(Category::all(), 200);
     
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category = Category::create($validatedData);

    return response()->json([
        'message' => 'Category created successfully!',
        'category' => $category,
    ], 201);
}

public function show($id)
{
    $category = Category::find($id);

    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    return response()->json($category, 200);
}
public function update(Request $request, $id)
{
    $category = Category::find($id);

    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    $validatedData = $request->validate([
        'name' => 'sometimes|string|max:255',
    ]);

    $category->update($validatedData);

    return response()->json([
        'message' => 'Category updated successfully!',
        'category' => $category,
    ], 200);
}
public function destroy($id)
{
    $category = Category::find($id);

    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    $category->delete();

    return response()->json(['message' => 'Category deleted successfully'], 200);
}


}
