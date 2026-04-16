@extends('layouts.backend.app')

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('title', 'Product')

@section('content')
<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">@if(isset($product)) Edit @else Create @endif Products</h4>
            <a href="{{ route('admin.product.index') }}" class="btn btn-dark">Back</a>
        </div>

        <div class="col-12 mt-4">
            <form action="{{ isset($product) ? route('admin.product.update', $product->id) : route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="brand" style="color: rgb(79, 79, 79)">Brand <span class="text-danger">*</span></label>
                            <select name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror">
                                <option value="" selected disabled hidden>Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option {{isset($product) && $product->brand_id == $brand->id ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="category" style="color: rgb(79, 79, 79)">Category <span class="text-danger">*</span></label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="" selected disabled hidden>Select Category</option>
                                @foreach ($categories as $category)
                                    <option {{isset($product) && $product->category_id == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="unit" style="color: rgb(79, 79, 79)">Unit <span class="text-danger">*</span></label>
                            <select name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror">
                                <option value="" selected disabled hidden>Select Unit</option>
                                @foreach ($units as $unit)
                                    <option {{isset($product) && $product->unit_id == $unit->id ? 'selected' : ''}} value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                            @error('unit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="name" style="color: rgb(79, 79, 79)">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ @$product->name ?? old('name') }}" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="regular_price" style="color: rgb(79, 79, 79)">Regular Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" value="{{ @$product->regular_price ?? old('regular_price') }}" placeholder="Enter Meta Tag">
                            @error('regular_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
        
                    
        
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="meta_tag" style="color: rgb(79, 79, 79)">Meta Tag</label>
                            <input type="text" class="form-control @error('meta_tag') is-invalid @enderror" id="meta_tag" name="meta_tag" value="{{ @$product->meta_tag ?? old('meta_tag') }}" placeholder="Enter Meta Tag">
                            @error('meta_tag')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="meta_tag" style="color: rgb(79, 79, 79)">Keywords</label>
                            <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords" value="{{ @$product->keywords ?? old('keywords') }}" placeholder="Enter Keywords">
                            @error('keywords')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- quantity --}}
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="meta_tag" style="color: rgb(79, 79, 79)">Minimum Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ @$product->quantity ?? old('quantity') }}" placeholder="Enter QTY">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- shipping_cost--}}
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="meta_tag" style="color: rgb(79, 79, 79)">Shipping Cost</label>
                            <input type="number" class="form-control @error('shipping_cost') is-invalid @enderror" id="shipping_cost" name="shipping_cost" value="{{ @$product->shipping_cost ?? old('shipping_cost') }}" placeholder="Shipping Cost">
                            @error('shipping_cost')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
        
        
                    <div class="col-12">
                        <div class="form-group">
                            <label for="meta_description" style="color: rgb(79, 79, 79)">Meta Description</label>
                            <textarea name="meta_description" class="form-control summernote @error('meta_description') is-invalid @enderror" id="meta_description" cols="30" rows="20">{{@$product->meta_description ?? old('meta_description')}}</textarea>
                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="thumbnail" style="color: rgb(79, 79, 79)">Thumbnail <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror dropify" data-default-file="{{@$product->thumb_url ?? ''}}" id="thumbnail" name="thumbnail" placeholder="Enter Meta Tag">
                            @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="image" style="color: rgb(79, 79, 79)">Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror dropify" data-default-file="{{@$product->image_url ?? ''}}" id="image" name="image" placeholder="Enter Meta Tag">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @if(isset($product))
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="status" style="color: rgb(79, 79, 79)">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option {{isset($product) && $product->status == 'active' ? 'selected' : ''}} value="active"> Active</option>
                                <option {{isset($product) && $product->status == 'inactive' ? 'selected' : ''}} value="inactive"> Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endif
        
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">
                            @if(isset($product))
                                Update
                            @else
                                Create
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
$(document).ready(function(){
    $('.dropify').dropify();
    $('.summernote').summernote({
        height: 150,
    });
});
</script>
@endpush