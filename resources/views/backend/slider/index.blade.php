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

@push('title', 'Slider')

@section('content')
<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Sliders</h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#sliderCreateModal">Add New</button>
        </div>
    </div>
    <div class="table-responsive mb-4 mt-4">
        <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Starting Price</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Status</th>
                    <th width="10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="sortable">
                @foreach ($sliders as $key => $slider)
                 <tr data-id="{{$slider->id}}" class="list-item">
                    <td>{{$key+1}}</td>
                    <td>
                        @if(!$slider->image)
                        <div class="rounded-md bg-light border d-flex justify-content-center align-items-center" style="width: 60px; height: 50px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0"/><path d="M9 12.5a3.5 3.5 0 1 0 7 0a3.5 3.5 0 1 0-7 0m0-.5V4"/></g></svg>
                        </div>
                        @else
                        <div class="rounded-md bg-light border d-flex justify-content-center align-items-center" style="width: 60px; height: 50px;">
                            <img class="img-fluid" style="width:100%; height: 100%; object-fit: cover; padding: 2px"  src="{{$slider->image_url}}" alt="{{$slider->title}}">
                        </div>
                        @endif
                    </td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->sub_title}}</td>
                    <td>{{$slider->starting_price}}</td>
                    <td>{{$slider->regular_price}}</td>
                    <td>{{$slider->discount_price}}</td>
                    <td class="text-capitalize">{{$slider->status}}</td>
                    <td class="text-center">
                        <div class="dropdown custom-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <button type="button" class="dropdown-item" onclick="editSlider('{{ $slider->id }}')">Edit</button>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="deleteSlider('{{ $slider->id }}')">Delete</a>
                                <form id="delete-form-{{ $slider->id }}" action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" style="display: none;">
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
<div class="modal fade" id="sliderCreateModal" tabindex="-1" role="dialog" aria-labelledby="sliderCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sliderCreateModalLabel">Add New Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"/></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
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

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="sub_title" style="color: rgb(79, 79, 79)">Sub Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" placeholder="Enter Sub Title">
                                        @error('sub_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="starting_price" style="color: rgb(79, 79, 79)">Starting Price</label>
                                        <input type="number" step="0.01" class="form-control @error('starting_price') is-invalid @enderror" id="starting_price" name="starting_price" placeholder="Enter Starting Price">
                                        @error('starting_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="regular_price" style="color: rgb(79, 79, 79)">Regular Price</label>
                                        <input type="number" step="0.01" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" placeholder="Enter Regular Price">
                                        @error('regular_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="discount_price" style="color: rgb(79, 79, 79)">Discount Price</label>
                                                <input type="number" step="0.01" class="form-control @error('discount_price') is-invalid @enderror" id="discount_price" name="discount_price" placeholder="Enter Regular Price">
                                                @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="shop-now-name" style="color: rgb(79, 79, 79)">Shop Now Button Name</label>
                                                <input type="text" class="form-control @error('shop_now_name') is-invalid @enderror" id="shop-now-name" name="shop_now_name" placeholder="Shop Now Button Name">
                                                @error('shop_now_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="shop-now-link" style="color: rgb(79, 79, 79)">Shop Now Button Link</label>
                                                <input type="text" class="form-control @error('shop-now-link') is-invalid @enderror" id="shop-now-link" name="shop_now_link" placeholder="Shop Now Button Link">
                                                @error('shop_now_link')
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
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="image" style="color: rgb(79, 79, 79)">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="dropify @error('image') is-invalid @enderror" data-height="220" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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


<div class="modal fade" id="sliderEditModal" tabindex="-1" role="dialog" aria-labelledby="sliderEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sliderEditModalLabel">Edit Slider</h5>
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
        var path = "{{route('admin.slider.update-order')}}";

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

function editSlider(id){
    var path = "{{route('admin.slider.edit',':id')}}";
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
                            <form action="{{ route('admin.slider.update') }}" method="POST" enctype="multipart/form-data">
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

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="sub_title" style="color: rgb(79, 79, 79)">Sub Title <span class="text-danger">*</span></label>
                                            <input type="text" value="${response.sub_title}" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" placeholder="Enter Sub Title">
                                            @error('sub_title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="starting_price" style="color: rgb(79, 79, 79)">Starting Price</label>
                                            <input type="number" value="${response.starting_price}" step="0.01" class="form-control @error('starting_price') is-invalid @enderror" id="starting_price" name="starting_price" placeholder="Enter Starting Price">
                                            @error('starting_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="regular_price" style="color: rgb(79, 79, 79)">Regular Price</label>
                                            <input type="number" value="${response.regular_price}" step="0.01" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" placeholder="Enter Regular Price">
                                            @error('regular_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="discount_price" style="color: rgb(79, 79, 79)">Discount Price</label>
                                                    <input type="number" value="${response.discount_price}" step="0.01" class="form-control @error('discount_price') is-invalid @enderror" id="discount_price" name="discount_price" placeholder="Enter Regular Price">
                                                    @error('discount_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="shop-now-name" style="color: rgb(79, 79, 79)">Shop Now Button Name</label>
                                                    <input type="text" class="form-control @error('shop-now-name') is-invalid @enderror" value="${response.shop_now.name}" id="shop-now-name" name="shop-now-name" placeholder="Shop Now Button Name">
                                                    @error('shop-now-name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="shop-now-link" style="color: rgb(79, 79, 79)">Shop Now Button Link</label>
                                                    <input type="text" class="form-control @error('shop-now-link') is-invalid @enderror" value="${response.shop_now.link}" id="shop-now-link" name="shop-now-link" placeholder="Shop Now Button Link">
                                                    @error('shop-now-link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="${response.id}">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="image" style="color: rgb(79, 79, 79)">Image <span class="text-danger">*</span></label>
                                            <input type="file" data-default-file="${response.image_url}" name="image" class="dropify @error('image') is-invalid @enderror" data-height="150" />
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                `);

                // Reinitialize Dropify
                $('.dropify').dropify();
                $('#sliderEditModal').modal('show');
            }
        }
    });
}



function deleteSlider(id){
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