<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug($request->name, '-')]);
        
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'unique:products,slug',
            'pricing' => 'required',
            'url_image' => 'required',
            'status' => 'required',
        ]);
        
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->pricing = $request->pricing;
        $product->url_image = $request->url_image;
        // $product->url_image = 'https://picsum.photos/200/100';
        $product->status = $request->status;
        $product->save();

        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->merge(['slug' => Str::slug($request->name, '-')]);
        
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'unique:categories,slug,' . $product->id,
            'pricing' => 'required',
            'url_image' => 'required',
            'status' => 'required',
        ]);
        
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->pricing = $request->pricing;
        $product->url_image = $request->url_image;
        // $product->url_image = 'https://picsum.photos/200/100';
        $product->status = $request->status;
        $product->save();

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json('', 204);
    }
}
