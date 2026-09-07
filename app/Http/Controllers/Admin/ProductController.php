<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Request\AddProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.products.index')->with([
            'products' => Product::with(['positives', 'negatives'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        if($request->validated()){
            $data = $request->validated();
            $data['image_path'] = $this->saveImage($request->file('image_path'));
            $product = Product::create($data);
            $product->qr_code_path =  $this->saveProductQRCode($product->id);
            $product->save();
            $this->mergeProductImageWithQRCode($product);
            return redirect()->route('admin.products.index')->with([
                'success' => 'Product added successfully.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
