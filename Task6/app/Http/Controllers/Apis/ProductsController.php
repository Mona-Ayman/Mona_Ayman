<?php

namespace App\Http\Controllers\Apis;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        // $path = $products['image']->storeAs('images/product',$products['image']);
        
        return response()->json(compact('products'));
    }
    public function create(){
        $brands = Brand::select('id','name_en')->orderBy('name_en','ASC')->get();
        $subcategories = Subcategory::select('id','name_en')->orderBy('name_en','ASC')->get();
        return response()->json(compact('brands','subcategories'));
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
        $path = $request->file('image')->storeAs('images/product',$newImageName);
        $data['image'] = $path;
        return response()->json(['message'=>'Product Created Successfully','status'=>true]);
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $brands = Brand::select('id','name_en')->orderBy('name_en','ASC')->get();
        $subcategories = Subcategory::select('id','name_en')->orderBy('name_en','ASC')->get();
        return response()->json(compact('product','brands','subcategories'));
    }
}
