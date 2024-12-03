<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::query()->paginate(10);
        return view("products.index",compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //
        $imagePath = null;
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $request->name.'product.'.$extension;
            $imagePath = $request->file('image')->storeAs('product', $fileName, 'public');
        }
        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'image'=>$imagePath,
        ]);
        return to_route('products.index')->with('success','Product Add Successfuly');
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
        return view("products.edit",compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
        $imagePath = $product->image;
            if($request->hasFile('image')){
                if($product->image && Storage::exists($product->image)){
                    Storage::delete($product->image);
                }
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $request->name.'-Product.'.$extension;
            $imagePath = $request->file('image')->storeAs('product',$fileName,'public');
            }
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'image'=>$imagePath,
        ]);
        return to_route('products.index')->with('success','Product Updated Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        if($product->image && Storage::exists($product->image)){
            Storage::delete($product->image);
        }
        $product->delete();
        return to_route('products.index')->with('success','Delete avec Success');

    }
}
