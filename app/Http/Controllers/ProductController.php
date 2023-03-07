<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Products::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $referer = isset($_SERVER["HTTP_REFERER"]);
        if(!$referer) return redirect()->back();
        // $product->delete();
        // return to_route('products.index');
        // return redirect()->route('products.index')->with($product->delete());
        return to_route('products.index')->with($product->delete());
    }
}
