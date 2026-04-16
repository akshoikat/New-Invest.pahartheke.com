@extends('layouts.backend.app')

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
     #sortable{
            cursor: pointer;
        }
</style>
@endpush

@push('title', 'banner')

@section('content')





<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">@if(isset($product))  @else Edit @endif Affiliate</h4>
            <a href="{{ route('admin.affiliate.index') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
    
    <form action="{{ route('admin.affiliate.update', $affiliate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $affiliate->name) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Price</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $affiliate->price) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Image URL</label>
                <input type="text" name="image" class="form-control" value="{{ old('image', $affiliate->image) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Affiliate Link</label>
                <input type="text" name="link" class="form-control" value="{{ old('link', $affiliate->link) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $affiliate->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$affiliate->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Repeat Customer</label>
                <input type="text" name="repeat_customer" class="form-control" required>
            </div> 
            <div class="col-md-6 d-flex align-items-end">
                
            </div>
            <button type="submit" style="margin-left: 20px" class="btn btn-primary w-30">Update Product</button>
        </div>
    </form>
</div>





















<!-- 
<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600;">
                @if(isset($product)) Edit @else Edit @endif Product
            </h4>
            <a href="{{ route('admin.affiliate.index') }}" class="btn btn-dark">Back</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-10 mx-auto">
            
                <div class="card-body">
                    <form action="{{ route('admin.affiliate.update', $affiliate->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $affiliate->name }}" required>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" name="price" class="form-control" value="{{ $affiliate->price }}" required>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="form-label fw-bold">Image URL</label>
                                <input type="text" name="image" class="form-control" value="{{ $affiliate->image }}" required>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="form-label fw-bold">Affiliate Link</label>
                                <input type="text" name="link" class="form-control" value="{{ $affiliate->link }}" required>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="form-label fw-bold">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $affiliate->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$affiliate->status ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>



        
    </div>
</div>  -->











<!-- 

<div class="container">
    <h2>Edit Affiliate Product</h2>
    <form action="{{ route('admin.affiliate.update', $affiliate->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $affiliate->name }}" required>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $affiliate->price }}" required>
        </div>
        <div class="mb-3">
            <label>Image URL</label>
            <input type="text" name="image" class="form-control" value="{{ $affiliate->image }}" required>
        </div>
        <div class="mb-3">
            <label>Affiliate Link</label>
            <input type="text" name="link" class="form-control" value="{{ $affiliate->link }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $affiliate->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$affiliate->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>  -->

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