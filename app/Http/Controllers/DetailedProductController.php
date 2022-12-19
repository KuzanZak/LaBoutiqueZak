<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::find($id);
        $mainurl = "";
        $mainalt = "";
        $url1 = "";
        $alt1 = "";
        $url2 = "";
        $alt2 = "";
        foreach ($product->images as $image) {

            if (str_contains($image->url, "main")) $mainurl = $image->url;
            if (str_contains($image->alt, "main")) $mainalt = $image->alt;
            if (str_contains($image->url, "1")) $url1 = $image->url;
            if (str_contains($image->alt, "1")) $alt1 = $image->alt;
            if (str_contains($image->url, "2")) $url2 = $image->url;
            if (str_contains($image->alt, "2")) $alt2 = $image->alt;
        };
        return view(
            'detailed-product',
            [
                'pageJs' => "",
                'name' => $product->product_name,
                'stock' => $product->stock,
                'price' => $product->price,
                'mainurl' => $mainurl,
                'mainalt' => $mainalt,
                'url1' => $url1,
                'alt1' => $alt1,
                'url2' => $url2,
                'alt2' => $alt2,
                'description' => $product->description,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
