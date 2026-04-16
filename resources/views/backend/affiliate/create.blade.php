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
            <h4 style="color: gray; font-weight: 600">@if(isset($product)) Edit @else Create @endif Affiliate</h4>
            <a href="{{ route('admin.affiliate.index') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
    
    <form action="{{ route('admin.affiliate.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Image URL</label>
                <input type="text" name="image" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Order Link</label>
                <input type="text" name="link" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Repeat Customer</label>
                <input type="text" name="repeat_customer" class="form-control" required>
            </div> 
            
            <button type="submit" style="margin-left: 20px" class="btn btn-primary w-30">Save Product</button>
        </div>
    </form>
</div>










@endsection