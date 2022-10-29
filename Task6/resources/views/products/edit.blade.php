@extends('layouts.parent')

@section('title', 'Edit Product')


@section('content')
    <div class="col-12">
        <form action="{{asset('dashboard/products/update/'.$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row my-2">
                <div class="col-6">
                    <label for="name_en">Name (EN)</label>
                    <input type="text" name="name_en" id="name_en" class="form-control" value="{{ $product->name_en }}">
                    @error('name_en')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="name_ar">Name (AR)</label>
                    <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{ $product->name_ar }}">
                    @error('name_ar')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-6">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                    @error('price')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror               
                </div>
                <div class="col-6">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}">
                    @error('quantity')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-4">
                    <label for="code">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option @selected($product->status ==1) value="1">Active</option>
                        <option @selected($product->status == 0) value="0">Not Active</option>
                    </select>
                    @error('status')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        <option value="">No Brand</option>
                        @foreach ($brands as $brand)
                            <option @selected($product->brand_id == $brand->id) value="{{$brand->id}}">{{$brand->name_en}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="subcategory_id">Subcategory</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                        @foreach ($subcategories as $subcategory)
                            <option @selected($product->subcategory_id == $subcategory->id)  value="{{$subcategory->id}}">{{$subcategory->name_en}}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-6">
                    <label for="details_en">Details (EN)</label>
                    <textarea name="details_en" id="details_en" class="form-control" cols="30" rows="10">{{$product->details_en}}</textarea>
                    @error('details_en')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="details_ar">Details (AR)</label>
                    <textarea name="details_ar" id="details_ar" class="form-control" cols="30" rows="10">{{$product->details_ar}}</textarea>
                    @error('details_ar')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-4">
                    <img src="{{asset('images/product/'.$product->image)}}" alt="" class="w-100">
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-2">
                    <button class="btn btn-primary"> Update </button>
                </div>
            </div>
        </form>
    </div>
@endsection
