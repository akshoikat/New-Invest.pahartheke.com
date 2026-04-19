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
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Invest Banners</h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#bannerCreateModal">
                Add New
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th>Title</th>
                    <th>Points</th>
                    <th>Button Text</th>
                    <th width="15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $key => $banner)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>
                        <ul>
                            @foreach((array) $banner->points as $point)
                                <li>{{ $point }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $banner->button_text }}</td>
                    <td class="text-center">

                        <button onclick="editBanner({{ $banner->id }})"
                            class="btn btn-sm btn-info">
                            Edit
                        </button>

                        <button onclick="deleteBanner({{ $banner->id }})"
                            class="btn btn-sm btn-danger">
                            Delete
                        </button>

                        <form id="delete-form-{{ $banner->id }}"
                              action="{{ route('admin.invest-banner.destroy',$banner->id) }}"
                              method="POST"
                              style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="bannerCreateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add New Banner</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.invest-banner.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Points</label>
                        <div id="points-wrapper">
                            <input type="text" name="points[]" class="form-control mb-2">
                        </div>
                        <button type="button" onclick="addPoint()" class="btn btn-sm btn-secondary">
                            Add More
                        </button>
                    </div>

                    <div class="form-group">
                        <label>Button Text</label>
                        <input type="text" name="button_text" class="form-control">
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edite Modal -->
<div class="modal fade" id="bannerEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Edit Banner</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="edit_modal_body"></div>
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

function addPoint(){
    $('#points-wrapper').append(
        '<input type="text" name="points[]" class="form-control mb-2">'
    );
}
$(document).on('click','#add-edit-point',function(){

    $('#edit-points-wrapper').append(`
        <div class="point-item mb-2 d-flex">
            <input type="text" name="points[]" class="form-control">
            <button type="button" class="btn btn-danger btn-sm ml-2 remove-point">X</button>
        </div>
    `);

});

$(document).on('click','.remove-point',function(){
    $(this).closest('.point-item').remove();
});

function editBanner(id){

    let path = "{{ route('admin.invest-banner.edit',':id') }}";
    path = path.replace(':id',id);

    $.ajax({
        url: path,
        type: "GET",
        success: function(response){

            let points = response.points;

            // যদি JSON string হয়
            if(typeof points === "string"){
                points = JSON.parse(points);
            }

            let pointsHtml = '';

            points.forEach(function(point){
                pointsHtml += `
                <div class="point-item mb-2 d-flex">
                    <input type="text" name="points[]" value="${point}" class="form-control">
                    <button type="button" class="btn btn-danger btn-sm ml-2 remove-point">X</button>
                </div>`;
            });

            let updateUrl = "{{ route('admin.invest-banner.update',':id') }}";
            updateUrl = updateUrl.replace(':id',response.id);

            let form = `
            <form action="${updateUrl}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title"
                        value="${response.title}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Points</label>

                    <div id="edit-points-wrapper">
                        ${pointsHtml}
                    </div>

                    <button type="button"
                        class="btn btn-sm btn-secondary mt-2"
                        id="add-edit-point">
                        Add More
                    </button>
                </div>

                <div class="form-group">
                    <label>Button Text</label>
                    <input type="text"
                        name="button_text"
                        value="${response.button_text ?? ''}"
                        class="form-control">
                </div>

                <button class="btn btn-primary">Update</button>
            </form>
            `;

            $("#edit_modal_body").html(form);
            $('#bannerEditModal').modal('show');
        }
    });
}

function deleteBanner(id){
    Swal.fire({
        title: "Are you sure?",
        text: "This banner will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-'+id).submit();
        }
    });
}

</script>
@endpush