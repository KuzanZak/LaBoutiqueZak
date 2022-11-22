<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ListProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sorting  = $request->sorting;
        // var_dump($_GET["sorting"]);

        if ($request->sorting == "price-ascending") {
            $products  = Product::orderBy('price', 'ASC')->get();
        } else if ($request->sorting == "price-descending") {
            $products  = Product::orderBy('price', 'DESC')->get();
        } else if ($request->sorting == "created-ascending") {
            $products  = Product::orderBy('created_at', 'ASC')->get();
        } else if ($request->sorting == "created-descending") {
            $products  = Product::orderBy('created_at', 'DESC')->get();
        } else {
            $products = Product::all()->sortBy('id');
        }
        return view(
            'list-products',
            [
                'products' => $products,
                'pageJs' => "test",
                'action' => "",
            ]
        );
    }

    public function sortProducts(Request $request)
    {
        var_dump($request->sorting);
        if ($request->sorting == "price-ascending") {
            $products  = Product::orderBy('price', 'ASC')->get();
        } else if ($request->sorting == "price-descending") {
            $products  = Product::orderBy('price', 'DESC')->get();
        } else if ($request->sorting == "created-ascending") {
            $products  = Product::orderBy('created_at', 'ASC')->get();
        } else if ($request->sorting == "created-descending") {
            $products  = Product::orderBy('created_at', 'DESC')->get();
        } else {
            $products = Product::all()->sortBy('id');
        }
        return view(
            'list-products',
            [
                'products' => $products,
                'pageJs' => "test",
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

    // public function sortByPriceDesc()
    // {
    //     return view(
    //         'list-products',
    //         [
    //             'products' => Product::all()->sortBy('id'),
    //         ]
    //     );
    // }
}
