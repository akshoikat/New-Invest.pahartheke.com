@extends('layouts.backend.app')

@push('style')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
     #sortable{
            cursor: pointer;
        }
</style>
@endpush

@push('title', 'Invest Facts')

@section('content')
<div class="widget-content widget-content-area br-6">
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Invest Facts</h4>
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#factCreateModal">
                Add Fact
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
             <thead>
        <tr>
            <th>#</th>
            <th>Icon</th>
            <th>Highlight</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
<tbody>
        @foreach($facts as $key => $fact)
        <tr>
            <td>{{ $key+1 }}</td>
            <td><i class="{{ $fact->icon }}"></i> {{ $fact->icon }}</td>
            <td>{{ $fact->highlight_text }}</td>
            <td>{{ $fact->description }}</td>
            <td>
                <button onclick="editFact({{ $fact->id }})" class="btn btn-sm btn-info">
                    Edit
                </button>

                <button onclick="deleteFact({{ $fact->id }})" class="btn btn-sm btn-danger">
                    Delete
                </button>

                <form id="delete-form-{{ $fact->id }}"
                    action="{{ route('admin.invest-fact.destroy', $fact->id) }}"
                    method="POST" style="display:none;">
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
<div class="modal fade" id="factCreateModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Add New Fact</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.invest-fact.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Icon (ex: fas fa-store)</label>
                        <input type="text" name="icon" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Highlight Text</label>
                        <input type="text" name="highlight_text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>

                    <button class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="factEditModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Edit Fact</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
factCreateModal
            <div class="modal-body" id="fact_edit_modal_body"></div>

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
function editFact(id){

    let path = "{{ route('admin.invest-fact.edit',':id') }}";
    path = path.replace(':id',id);

    $.ajax({
        url: path,
        type: "GET",
        success: function(data){

            let updateUrl = "{{ route('admin.invest-fact.update',':id') }}";
            updateUrl = updateUrl.replace(':id',data.id);

            var html = `
            <form action="${updateUrl}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Icon</label>
                    <input type="text"
                        name="icon"
                        value="${data.icon}"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label>Highlight Text</label>
                    <input type="text"
                        name="highlight_text"
                        value="${data.highlight_text}"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text"
                        name="description"
                        value="${data.description}"
                        class="form-control"
                        required>
                </div>

                <button class="btn btn-primary mt-2">Update</button>
            </form>
            `;

            $('#fact_edit_modal_body').html(html);
            $('#factEditModal').modal('show');
        }
    });
}

// DELETE
function deleteFact(id){

    Swal.fire({
        title: "Are you sure?",
        text: "This fact will be deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!"
    }).then((result)=>{
        if(result.isConfirmed){
            document.getElementById('delete-form-'+id).submit();
        }
    });
}
</script>
@endpush