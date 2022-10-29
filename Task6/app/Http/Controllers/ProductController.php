<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Services\Media;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',compact('products'));
    }
    public function create(){
        $brands = Brand::select('id','name_en')->orderBy('name_en','ASC')->get();
        $subcategories = Subcategory::select('id','name_en')->orderBy('name_en','ASC')->get();
        return view('products.create',compact('brands','subcategories'));
    }
    public function store(Request $request){
        $request->validate([
            "name_en" => ['required','string','between:2,512'],
            "name_ar" => ['required','string','between:2,512'],
            "price"   => ['required','numeric','between:1,99999.99'],
            "quantity" => ["nullable",'integer','between:1,999'],
            "status" => ["nullable","in:0,1"],
            "brand_id" => ["nullable",'integer','exists:brands,id'],
            "subcategory_id" => ["required",'integer','exists:subcategories,id'],
            "details_en" => ['required','string'],
            "details_ar" => ['required','string'],
            "image" => ['required','mimes:png,jpeg,jpg','max:1024']
        ]);
        $newImageName = $request->file('image')->hashName();
        $request->file('image')->move(public_path('images/product'),$newImageName);
        $data = $request->except('_token','image');
        $data['image'] = $newImageName;
        Product::create($data);
        return redirect('dashboard/products')->with('success','Product Created Successfully');
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $brands = Brand::select('id','name_en')->orderBy('name_en','ASC')->get();
        $subcategories = Subcategory::select('id','name_en')->orderBy('name_en','ASC')->get();
        return view('products.edit',compact('brands','subcategories','product'));
    }

    public function update(Request $request , $id){
        $request->validate([
            "name_en" => ['required','string','between:2,512'],
            "name_ar" => ['required','string','between:2,512'],
            "price" => ["required",'numeric','between:1,99999.99'],
            "quantity" => ["required",'integer','between:1,999'],
            "status" => ["required","in:0,1"],
            "brand_id" => ["nullable",'integer','exists:brands,id'],
            "subcategory_id" => ["required",'integer','exists:subcategories,id'],
            "details_en" => ['required','string'],
            "details_ar" => ['required','string'],
            "image" => ['nullable','mimes:png,jpeg,jpg','max:1024']
        ]);
        $data = $request->except('_token','_method','image');
        $product = Product::findOrFail($id);
        if($request->hasFile('image')){
              // upload new image
              $newImageName = Media::upload($request->file('image'),'product');
              $data['image'] = $newImageName;
              // delete old image
              Media::delete(public_path('images\product\\'.$product->image));
          }
          $product->update($data);
          return redirect('dashboard/products')->with('success','Product Updated Successfully');
  
        }
        public function delete($id)
    {
        $product = Product::findOrFail($id);
        Media::delete(public_path('images\product\\'.$product->image));
        $product->delete();
        return redirect('dashboard/products')->with('success','Product Deleted Successfully');
    }
    }


