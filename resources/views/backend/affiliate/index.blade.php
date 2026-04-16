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
            <h4 style="color: gray; font-weight: 600">Affiliate</h4>
            <a href="{{ route('admin.affiliate.create') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="table-responsive mb-4 mt-4">
                <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        @foreach ($affiliates as $key => $affiliate)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $affiliate->name }}</td>
                                <td>{{ $affiliate->price }} BDT</td>
                                <td><img src="{{ $affiliate->image }}" alt="Image" width="50"></td>
                                <td><a href="{{ $affiliate->link }}" target="_blank">View</a></td>
                                <td>{{ $affiliate->status ? 'Active' : 'Inactive' }}</td>
                                <td class="text-left">
                                    <div class="dropdown custom-dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <a href="{{ route('admin.affiliate.edit', $affiliate->id) }}" type="button" class="dropdown-item">Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="deleteproduct('{{ $affiliate->id }}')">Delete</a>
                                            <form id="delete-form-{{ $affiliate->id }}" action="{{ route('admin.affiliate.destroy', $affiliate->id) }}" method="POST" style="display: none;">
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

    {{ $affiliates->links() }}
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