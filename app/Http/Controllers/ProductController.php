<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'quantity'=>'required|numeric',
            'description'=>'required',
            'selling_price'=>'required|numeric',
            'buying_price'=>'required|numeric',
            'discount_percentage'=>'required|numeric'
        ]);
        $product =new Product();

        $product->name=$request->name;
        $product->quantity=$request->quantity;
        $product->description=$request->description;
        $product->selling_price=$request->selling_price;
        $product->buying_price=$request->buying_price;
        $product->discount_percent=$request->discount_percentage;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
    // dd($request);

    $request->validate([
        'name'=>'required',
        'quantity'=>'required|numeric',
        'description'=>'required',
        'selling_price'=>'required|numeric',
        'buying_price'=>'required|numeric',
        'discount_percentage'=>'required|numeric'
    ]);

        $product->name=$request->name;
        $product->quantity=$request->quantity;
        $product->description=$request->description;
        $product->selling_price=$request->selling_price;
        $product->buying_price=$request->buying_price;
        $product->discount_percent=$request->discount_percentage;
        $product->save();

        return redirect()->back();
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
        return redirect()->route('product.index');
    }
}
