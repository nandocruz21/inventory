<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        return response()->json(Category::all(), 200);
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:categories']);
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    // Menampilkan detail satu kategori beserta item-nya
    public function show(Category $category)
    {
        return response()->json($category->load('items'), 200);
    }

    // Mengubah nama kategori
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category, 200);
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
}