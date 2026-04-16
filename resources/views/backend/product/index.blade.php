@extends('layouts.backend.app')

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('title', 'Product')

@section('content')
<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Products</h4>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="table-responsive mb-4 mt-4">
        <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Thumbnail</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Meta Tag</th>
                    <th>Regular Price</th>
                    <th>Shipping Cost</th>
                    <th>Status</th>
                    <th width="10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="sortable">
                @foreach ($products as $key => $product)
                 <tr class="list-item">
                    <td>{{$key+1}}</td>
                    <td>
                        @if(!$product->image)
                        <div class="rounded-md bg-light border d-flex justify-content-center align-items-center" style="width: 60px; height: 50px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0"/><path d="M9 12.5a3.5 3.5 0 1 0 7 0a3.5 3.5 0 1 0-7 0m0-.5V4"/></g></svg>
                        </div>
                        @else
                        <div class="rounded-md bg-light border d-flex justify-content-center align-items-center" style="width: 60px; height: 50px;">
                            <img class="img-fluid" style="width:100%; height: 100%; object-fit: cover;"  src="{{$product->thumb_url}}" alt="{{$product->title}}">
                        </div>
                        @endif
                    </td>
                    <td>
                        @if(!$product->image)
                        <div class="rounded-md bg-light border d-flex justify-content-center align-items-center" style="width: 60px; height: 50px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0"/><path d="M9 12.5a3.5 3.5 0 1 0 7 0a3.5 3.5 0 1 0-7 0m0-.5V4"/></g></svg>
                        </div>
                        @else
                        <div class="rounded-md bg-light border d-flex justify-content-center align-items-center" style="width: 60px; height: 50px;">
                            <img class="img-fluid" style="width:100%; height: 100%; object-fit: cover;"  src="{{$product->image_url}}" alt="{{$product->title}}">
                        </div>
                        @endif
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->brand->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->meta_tag}}</td>
                    <td>{{$product->regular_price}}</td>
                    <td>{{$product->shipping_cost}}</td>
                    <td class="text-capitalize">{{$product->status}}</td>
                    <td class="text-center">
                        <div class="dropdown custom-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <a href="{{ route('admin.product.edit', $product->id) }}" type="button" class="dropdown-item">Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="deleteproduct('{{ $product->id }}')">Delete</a>
                                <form id="delete-form-{{ $product->id }}" action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function(){
    $('.dropify').dropify();
});

function deleteproduct(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });

            let form = $(`#delete-form-${id}`);
            form.submit();
        }
    });
}

</script>
@endpush