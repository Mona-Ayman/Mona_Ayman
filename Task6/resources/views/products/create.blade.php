@extends('layouts.parent')

@section('title', 'Create Product')


@section('content')
<div class="col-12">
    <form action="{{asset('dashboard/products/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row my-2">
            <div class="col-6">
                <label for="name_en">Name (EN)</label>
                <input type="text" name="name_en" id="name_en" class="form-control" value="{{old('name_en')}}">
                @error('name_en')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="name_ar">Name (AR)</label>
                <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{old('name_ar')}}">
                @error('name_ar')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col-6">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}">
                @error('price')
                   <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="col-6">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" value="{{old('quantity')}}">
                @error('quantity')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option @selected(old('status') === '1') value="1">Active</option>
                    <option @selected(old('status') === '0') value="0">Not Active</option>
                </select>
                @error('status')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    @foreach($subcategories AS $subcategory)
                    <option @selected(old('subcategory_id') == $subcategory->id) value="{{$subcategory->id}}">{{$subcategory->name_en}}</option>
                    @endforeach
                </select>
                @error('subcategory_id')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" class="form-control">
                    <option value="">No Brand</option>
                    @foreach($brands AS $brand)
                    <option @selected(old('brand_id') == $brand->id) value="{{$brand->id}}">{{$brand->name_en}}</option>
                    @endforeach
                </select>
                @error('brand_id')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col-6">
                <label for="details_en">Details (EN)</label>
                <textarea name="details_en" id="details_en" cols="30" rows="10" class="form-control">{{old('details_en')}}</textarea>
                @error('details_en')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="col-6">
                <label for="details_ar">Details (EN)</label>
                <textarea name="details_ar" id="details_ar" cols="30" rows="10" class="form-control">{{old('details_ar')}}</textarea>
                @error('details_ar')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row my-2">
            <div class="col-6">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                        <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col-2">
               <button class="btn btn-outline-primary">Create</button>
            </div>
           
            
            </div>

    </form>
</div>
@endsection