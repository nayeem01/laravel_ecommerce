<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();


        return view('backend.pages.products.manage', compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.products.create');
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
            'title'             => 'required|max:255',
            'description'       => 'required|max:1000',
            'price'             => 'required|numeric',
        ],
        [
            'title.required'        => 'Please Provide Product Title',
            'description.required'  => 'Please Provide Product Description between 0-1000 word',
            'price.required'        => 'Please Provide Valid Price in Number',
        ]);

        $products = new Product();
        $products->title             = $request->title;
        $products->desc              = $request->description;
        $products->slug              = Str::slug($request->title);
        $products->brand_id          = $request->brand_id;
        $products->cat_id            = $request->category_id;
        $products->quantity          = $request->quantity;
        $products->price             = $request->price;
        $products->offer_price       = $request->offer_price;
        $products->status            = $request->status;
        $products->save();

        if ( count( $request->p_image ) > 0 )
        {
            foreach( $request->p_image  as $image )
            {
                $img = rand(0,999999) . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/img/product/' . $img);
                Image::make($image)->save($location);

                $p_image = new ProductImage;
                $p_image->product_id = $products->id;
                $p_image->image = $img;
                $p_image->save();
            }
        }

        return redirect()->route('product.manage');
    
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