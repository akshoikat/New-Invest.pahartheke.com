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
            <h4 style="color: gray; font-weight: 600">Banner</h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#bannerCreateModal">Add New</button>
        </div>
    </div>
    <div class="table-responsive mb-4 mt-4">
        <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th width="10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="sortable">

                @foreach ($banners as $key => $banner)
                 <tr data-id="{{$banner->id}}" class="list-item">
                    <td>{{$key+1}}</td>
                    <td>
                        @if(!$banner->image)
                        <div class="rounded-md bg-light border d-flex justify-content-center align-items-center" style="width: 60px; height: 50px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0"/><path d="M9 12.5a3.5 3.5 0 1 0 7 0a3.5 3.5 0 1 0-7 0m0-.5V4"/></g></svg>
                        </div>
                        @else
                        <div class="rounded-md bg-light border d-flex justify-content-center align-items-center" style="width: 60px; height: 50px;">
                            <img class="img-fluid" style="width:100%; height: 100%; object-fit: cover; padding: 2px"  src="{{$banner->image_url}}" alt="{{$banner->title}}">
                        </div>
                        @endif
                    </td>
                    <td>{{$banner->title}}</td>
                    <td class="text-capitalize">{{$banner->status}}</td>
                    <td class="text-center">
                        <div class="dropdown custom-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <button type="button" class="dropdown-item" onclick="editbanner('{{ $banner->id }}')">Edit</button>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="deletebanner('{{ $banner->id }}')">Delete</a>
                                <form id="delete-form-{{ $banner->id }}" action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" style="display: none;">
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

<!-- Modal -->
<div class="modal fade" id="bannerCreateModal" tabindex="-1" role="dialog" aria-labelledby="bannerCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerCreateModalLabel">Add New Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"/></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name" style="color: rgb(79, 79, 79)">Titlte <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="title" placeholder="Enter Title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="image" style="color: rgb(79, 79, 79)">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="dropify @error('image') is-invalid @enderror" data-height="220" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="bannerEditModal" tabindex="-1" role="dialog" aria-labelledby="bannerEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerEditModalLabel">Edit banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"/></svg>
                </button>
            </div>
            <div class="modal-body" id="edit_modal_body">
                
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
$(document).ready(function(){
    $("#sortable" ).sortable({
        placeholder: "highlight",
        update: function() {
            sendOrderToServer();
        }
    });

    $('.dropify').dropify();

    function sendOrderToServer(){
        var order = [];
        var path = "{{route('admin.banner.update-order')}}";

        $('.list-item').each(function(index,element) {
            order.push({
            id: $(this).attr('data-id'),
            position: index+1
            });
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: path,
            data: {
                order:order,
                _token: '{{csrf_token()}}'
            },
        });
    }
});

function editbanner(id){
    var path = "{{route('admin.banner.edit',':id')}}";
    path = path.replace(':id',id);

    $.ajax({
        type: "GET",
        dataType: "json",
        url: path,
        success: (response) => {
            if(response){
                console.log(response);
                $("#edit_modal_body").html(`
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name" style="color: rgb(79, 79, 79)">Titlte <span class="text-danger">*</span> </label>
                                            <input type="text" value="${response.title}" class="form-control @error('title') is-invalid @enderror" id="name" name="title" placeholder="Enter Title">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="${response.id}">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image" style="color: rgb(79, 79, 79)">Image <span class="text-danger">*</span></label>
                                            <input type="file" data-default-file="${response.image_url}" name="image" class="dropify @error('image') is-invalid @enderror" data-height="150" />
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="status" style="color: rgb(79, 79, 79)">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="active" ${response.status == 'active' ? 'selected' : ''}>Active</option>
                                                <option value="inactive" ${response.status == 'inactive' ? 'selected' : ''}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                `);

                // Reinitialize Dropify
                $('.dropify').dropify();
                $('#bannerEditModal').modal('show');
            }
        }
    });
}



function deletebanner(id){
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