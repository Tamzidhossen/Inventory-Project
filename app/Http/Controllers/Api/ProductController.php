<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // $slug =  str()->slug($request->title) . '-' . uniqid();
        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findorFail($id);
        return response()->json([
            'message' => 'Product retrieved successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findorFail($id);
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ], 201);
    }
}
