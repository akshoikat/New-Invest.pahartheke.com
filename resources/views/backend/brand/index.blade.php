@extends('layouts.backend.app')

@push('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
     #sortable{
            cursor: pointer;
        }
</style>
@endpush

@push('title', 'Brand')

@section('content')
<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Brands</h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#brandCreateModal">Add New</button>
        </div>
    </div>
    <div class="table-responsive mb-4 mt-4">
        <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Meta Tag</th>
                    <th>keywords</th>
                    <th>Status</th>
                    <th width="10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="sortable">
                @foreach ($brands as $key => $brand)
                 <tr data-id="{{$brand->id}}" class="list-item">
                    <td>{{$key+1}}</td>
                    <td>
                        @if(!$brand->logo)
                        <div class="rounded-circle bg-light border d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0"/><path d="M9 12.5a3.5 3.5 0 1 0 7 0a3.5 3.5 0 1 0-7 0m0-.5V4"/></g></svg>
                        </div>
                        @else
                        <div class="rounded-circle bg-light border d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <img class="img-fluid rounded-circle" style="width:100%; height: 100%; object-fit: cover; padding: 2px"  src="{{$brand->logo_url}}" alt="{{$brand->name}}">
                        </div>
                        @endif
                    </td>
                    <td>{{$brand->name}}</td>
                    <td>{{$brand->meta_tag ?? 'N/A'}}</td>
                    <td>{{$brand->keywords ?? 'N/A'}}</td>
                    <td class="text-capitalize">{{$brand->status}}</td>
                    <td class="text-center">
                        <div class="dropdown custom-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <button type="button" class="dropdown-item" onclick="editBrand('{{ $brand->id }}')">Edit</button>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="deleteBrand('{{ $brand->id }}')">Delete</a>
                                <form id="delete-form-{{ $brand->id }}" action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST" style="display: none;">
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
<div class="modal fade" id="brandCreateModal" tabindex="-1" role="dialog" aria-labelledby="brandCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandCreateModalLabel">Add New Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"/></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="color: rgb(79, 79, 79)">Name <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Category Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="meta_tag" style="color: rgb(79, 79, 79)">Meta Tag</label>
                                <input type="text" class="form-control @error('meta_tag') is-invalid @enderror" value="{{ old('meta_tag') }}" id="meta_tag" name="meta_tag" placeholder="Enter Meta Tag">
                                @error('meta_tag')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="meta_description" style="color: rgb(79, 79, 79)">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror" rows="5" id="meta_description" name="meta_description" placeholder="Enter Meta Description">{{old('meta_description')}}</textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="keywords" style="color: rgb(79, 79, 79)">Keywords</label>
                                <input type="text" class="form-control @error('keywords') is-invalid @enderror" value="{{ old('keywords') }}" id="keywords" name="keywords" placeholder="Enter Meta Tag">
                                @error('keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="logo" style="color: rgb(79, 79, 79)">Logo <span class="text-danger">*</span></label>
                                <input type="file" name="logo" class="dropify @error('logo') is-invalid @enderror" data-height="150" />
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="brandEditModal" tabindex="-1" role="dialog" aria-labelledby="brandEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandEditModalLabel">Edit Brand</h5>
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
        var path = "{{route('admin.brand.update-order')}}";

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
            // success : (response) => {
            //     console.log(response);
            //     if(response){
                    
            //     }
            // }
        });
    }
});

function editBrand(id){
    var path = "{{route('admin.brand.edit',':id')}}";
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
                            <form action="{{ route('admin.brand.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" style="color: rgb(79, 79, 79)">Name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="${response.name}" placeholder="Enter Brand Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="meta_tag" style="color: rgb(79, 79, 79)">Meta Tag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('meta_tag') is-invalid @enderror" value="${response.meta_tag}" id="meta_tag" name="meta_tag" placeholder="Enter Meta Tag">
                                    @error('meta_tag')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="meta_description" style="color: rgb(79, 79, 79)">Meta Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('meta_description') is-invalid @enderror" rows="5" id="meta_description" name="meta_description" placeholder="Enter Meta Description">${response.meta_description}</textarea>
                                    @error('meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keywords" style="color: rgb(79, 79, 79)">Keywords</label>
                                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" value="${response.keywords}" id="keywords" name="keywords" placeholder="Enter Meta Tag">
                                    @error('keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="logo" style="color: rgb(79, 79, 79)">Logo <span class="text-danger">*</span></label>
                                    <input type="file" name="logo" data-default-file="${response.logo_url}" class="dropify @error('logo') is-invalid @enderror" data-height="150" />
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" style="color: rgb(79, 79, 79)">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" ${response.status == 'active' ? 'selected' : ''}>Active</option>
                                        <option value="inactive" ${response.status == 'inactive' ? 'selected' : ''}>Inactive</option>
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="${response.id}">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                `);

                // Reinitialize Dropify
                $('.dropify').dropify();

                $('#brandEditModal').modal('show');
            }
        }
    });
}



function deleteBrand(id){
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