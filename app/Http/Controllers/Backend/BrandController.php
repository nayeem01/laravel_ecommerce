<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use Illuminate\Http\Request;
use File;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brands.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|max:255'],
            ['name.required'=>'please provide brand name']
        );

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->des = $request->desc;
        if ($request->image) {
            $image = $request->file('image');
            $img   = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/brands/' . $img);
            Image::make($image)->resize(100, 80)->save($location);
            $brand->image = $img;
        }
        $brand -> save();
        return redirect()->route('brands.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)){
            return view('backend.pages.brands.edit', compact('brand'));
        }else{
            return redirect()->route('brands.manage');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            ['name' => 'required|max:255'],
            ['name.required'=>'please provide brand name']
        );

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->des = $request->desc;
        if ($request->image) {

            if (File::exists('backend/img/brands/' . $brand->image)) {
                File::delete('backend/img/brands/'. $brand->image);
            }
            $image = $request->file('image');
            $img   = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/brands/' . $img);
            Image::make($image)->resize(100, 80)->save($location);
            $brand->image = $img;
        }
        $brand -> save();
        return redirect()->route('brands.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {

            if (File::exists('backend/img/brands/' . $brand->image)) {
                File::delete('backend/img/brands/'. $brand->image);
            }
            $brand->delete();
            return redirect()->route('brands.manage');
        
        }else{
            return redirect()->route('brands.manage');
        }

    }
}
