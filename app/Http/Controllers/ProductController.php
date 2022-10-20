<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard-product',
            [
                'products' => Product::all()->sortBy('id'),
                'admin' => intval(Auth::user()->role_id)
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
        return view(
            "dashboard-product-form",
            [
                'categories' => Category::all()->sortBy('id'),
                'images' => Image::whereNull('product_id')->get(),
                'action' => route('dashboard/product/add'),
                'pageJs' => "images",
                'edit' => "add",
                'value' => "Ajouter le produit",
                'product_name' => old('product'),
                'price' => old('price'),
                'description' => old('description'),
                'stock' => old("stock")
            ]
        );
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
            'product_name' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:20', 'max:255'],
            'price' => ['required', 'numeric', 'min:1'],
            'stock' => ['required', 'numeric', 'min:0'],
            'category' => ['required'],
            'main' => ['required'],
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->image_id = $request->main;
        $product->save();
        foreach ($request->checkbox as $id) {
            $image = Image::find($id);
            $image->product_id = $product->id;
            $image->save();
        }
        return Redirect::route('dashboard/product');
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
        $product = Product::find($id);
        // var_dump($product);
        // exit;
        return view(
            'dashboard-product-form',
            [
                'categories' => Category::all()->sortBy('id'),
                'images' => Image::where('product_id', '=', $product->id)->orWhere('product_id', '=', null,)->get(),
                'action' => route('dashboard/product/update', $product->id),
                'edit' => "update",
                'pageJs' => "",
                'value' => "Actualiser",
                'product_name' => $product->product_name,
                'description' => $product->description,
                'price' => $product->price,
                'stock' => $product->stock,
            ]
        );
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
