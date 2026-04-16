@extends('layouts.backend.app')

@push('title', 'Invest Traction')

@section('content')
<div class="widget-content widget-content-area br-6">

    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Invest Traction</h4>

            <button class="btn btn-primary"
                data-toggle="modal"
                data-target="#tractionCreateModal">
                Add Traction
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
                    <th width="160">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($tractions as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>

                        <td>
                            @if($item->icon)
                                <img src="{{ asset('storage/'.$item->icon) }}"
                                     style="width:40px;height:40px;">
                            @endif
                        </td>

                        <td>
                            <strong>{{ $item->highlight }}</strong>
                        </td>

                        <td>
                            {{ Str::limit($item->description, 80) }}
                        </td>

                        <td>
                            <button class="btn btn-sm btn-info"
                                onclick="editTraction({{ $item->id }})">
                                Edit
                            </button>

                            <button class="btn btn-sm btn-danger"
                                onclick="deleteTraction({{ $item->id }})">
                                Delete
                            </button>

                            <form id="delete-form-{{ $item->id }}"
                                action="{{ route('admin.invest-traction.destroy', $item->id) }}"
                                method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No Data Found
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>

{{-- CREATE MODAL --}}
<div class="modal fade" id="tractionCreateModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Add Invest Traction</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <form action="{{ route('admin.invest-traction.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="file" name="icon" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Highlight</label>
                        <input type="text" name="highlight" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>

                    <button class="btn btn-primary mt-2">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal fade" id="tractionEditModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Edit Invest Traction</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="traction_edit_body"></div>

        </div>
    </div>
</div>
@push('js')
<script>

function editTraction(id){

    $.get("{{ url('admin/invest-traction/edit') }}/" + id, function(data){

        let html = `
        <form action="{{ route('admin.invest-traction.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="${data.id}">

            <div class="form-group">
                <label>Highlight</label>
                <input type="text" name="highlight" value="${data.highlight}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required>${data.description}</textarea>
            </div>

            <div class="form-group">
                <label>Icon (optional)</label>
                <input type="file" name="icon" class="form-control">
            </div>

            <button class="btn btn-primary mt-2">Update</button>
        </form>
        `;

        $('#traction_edit_body').html(html);
        $('#tractionEditModal').modal('show');
    });
}

// DELETE
function deleteTraction(id){

    Swal.fire({
        title: "Are you sure?",
        text: "This traction will be deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes delete it!"
    }).then((result)=>{
        if(result.isConfirmed){
            document.getElementById('delete-form-'+id).submit();
        }
    });
}

</script>
@endpush
@endsection
@push('js')
<script>

function editTraction(id){

    $.get("{{ url('admin/invest-traction/edit') }}/" + id, function(data){

        let html = `
        <form action="{{ route('admin.invest-traction.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="${data.id}">

            <div class="form-group">
                <label>Highlight</label>
                <input type="text" name="highlight" value="${data.highlight}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required>${data.description}</textarea>
            </div>

            <div class="form-group">
                <label>Icon (optional)</label>
                <input type="file" name="icon" class="form-control">
            </div>

            <button class="btn btn-primary mt-2">Update</button>
        </form>
        `;

        $('#traction_edit_body').html(html);
        $('#tractionEditModal').modal('show');
    });
}

// DELETE
function deleteTraction(id){

    Swal.fire({
        title: "Are you sure?",
        text: "This traction will be deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes delete it!"
    }).then((result)=>{
        if(result.isConfirmed){
            document.getElementById('delete-form-'+id).submit();
        }
    });
}

</script>
@endpush