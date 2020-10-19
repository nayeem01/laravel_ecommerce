<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use File;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoris = Category::orderBy('id','desc')->get();
        return view('backend.pages.categories.manage', compact('categoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_id = Category::orderBy('id','asc')->where('parent_id', 0 )->get();
        return view('backend.pages.categories.create', compact('parent_id'));
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

        $category = new Category();
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->parent_id = $request->parent_id;
        if ($request->image) {
            $image = $request->file('image');
            $img   = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/categories/' . $img);
            Image::make($image)->resize(100, 80)->save($location);
            $category->image = $img;
        }
        $category -> save();
        return redirect()->route('cat.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent_id = Category::orderBy('name','asc')->where('parent_id', 0 )->get();
        $category = Category::find($id);
        if (!is_null($category)){
            return view('backend.pages.categories.edit', compact('category','parent_id'));
        }else{
            return redirect()->route('cat.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            ['name' => 'required|max:255'],
            ['name.required'=>'please provide brand name']
        );

        $category = Category::find($id);
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->parent_id = $request->parent_id;
        if ($request->image) {

            if (File::exists('backend/img/category/' . $category->image)) {
                File::delete('backend/img/category/'. $category->image);
            }
            $image = $request->file('image');
            $img   = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/category/' . $img);
            Image::make($image)->resize(100, 80)->save($location);
            $category->image = $img;
        }
        $category -> save();
        return redirect()->route('cat.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {

            if (File::exists('backend/img/category/' . $category->image)) {
                File::delete('backend/img/category/'. $category->image);
            }
            $brand->delete();
            return redirect()->route('cat.manage');
        
        }else{
            return redirect()->route('cat.manage');
        }
    }
}
