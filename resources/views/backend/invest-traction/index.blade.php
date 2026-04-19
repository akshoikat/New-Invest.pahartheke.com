@extends('layouts.backend.app')

@push('title', 'Invest Traction')

@section('content')
<style>
#iconPickerModal {
    z-index: 2050 !important;
}

.modal-backdrop.show:nth-child(2) {
    z-index: 2040 !important;
}
</style>
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
                            <i class="{{ $item->icon }}"></i>
                            {{ $item->icon }}
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

                        <div class="input-group">
                            <input type="text"
                                name="icon"
                                id="iconInput"
                                class="form-control"
                                placeholder="fas fa-user">

                            <div class="input-group-append">
                                <button class="btn btn-secondary"
                                        type="button"
                                        data-toggle="modal"
                                        data-target="#iconPickerModal">
                                    Browse
                                </button>
                            </div>
                        </div>

                        <small id="iconPreview" style="font-size:18px;display:block;margin-top:5px;"></small>
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
<!-- ICON PICKER MODAL (OUTSIDE FORM) -->
                <div class="modal fade" id="iconPickerModal" >
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5>Select Icon</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">

                                <input type="text"
                                    id="iconSearch"
                                    class="form-control mb-3"
                                    placeholder="Search icon...">

                                <div id="iconList"
                                    style="display:grid;grid-template-columns:repeat(6,1fr);gap:10px;max-height:400px;overflow:auto;">
                                </div>

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

@endsection
@push('js')
<script>

    // icons
    const icons = [
        "fas fa-user",
        "fas fa-user-tie",
        "fas fa-users",
        "fas fa-home",
        "fas fa-building",
        "fas fa-chart-line",
        "fas fa-coins",
        "fas fa-dollar-sign",
        "fas fa-wallet",
        "fas fa-rocket",
        "fas fa-bolt",
        "fas fa-globe",
        "fas fa-shield-alt",
        "fas fa-lock",
        "fas fa-unlock",
        "fas fa-bell",
        "fas fa-envelope",
        "fas fa-cog"
    ];
    // icon peaker
function renderIcons(filter = ''){

    let html = '';

    icons
    .filter(icon => icon.includes(filter.toLowerCase()))
    .forEach(icon => {

        html += `
        <div class="icon-item text-center p-2 border rounded"
            style="cursor:pointer;"
            data-icon="${icon}">

            <i class="${icon}" style="font-size:20px;"></i>
            <div style="font-size:10px;">${icon}</div>

        </div>`;
    });

    $('#iconList').html(html);
}

renderIcons();

// search
$(document).on('keyup','#iconSearch',function(){
    renderIcons($(this).val());
});

// select icon
$(document).on('click','.icon-item',function(){

    let icon = $(this).data('icon');

    $('#iconInput').val(icon);
    $('#iconPreview').html(`<i class="${icon}"></i>`);

    $('#iconPickerModal').modal('hide');
});

// live preview
$(document).on('keyup','#iconInput',function(){
    $('#iconPreview').html(`<i class="${$(this).val()}"></i>`);
});



function editTraction(id){

    let path = "{{ route('admin.invest-traction.edit',':id') }}";
    path = path.replace(':id',id);

    $.ajax({
        url: path,
        type: "GET",
        success: function(data){

            let updateUrl = "{{ route('admin.invest-traction.update',':id') }}";
            updateUrl = updateUrl.replace(':id',data.id);

            let html = `
            <form action="${updateUrl}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Highlight</label>
                    <input type="text"
                        name="highlight"
                        value="${data.highlight}"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"
                        class="form-control"
                        required>${data.description}</textarea>
                </div>

                <div class="form-group">
                    <label>Icon</label>

                    <input type="text"
                        name="icon"
                        id="editIconInput"
                        class="form-control"
                        value="${data.icon}">

                    <small id="editIconPreview" style="font-size:18px;display:block;margin-top:5px;">
                        <i class="${data.icon}"></i>
                    </small>

                    <button type="button"
                        class="btn btn-secondary mt-2"
                        data-toggle="modal"
                        data-target="#iconPickerModal"
                        onclick="setActiveIconInput('edit')">
                        Browse Icon
                    </button>
                </div>

                <button class="btn btn-primary mt-2">Update</button>
            </form>
            `;

            $('#traction_edit_body').html(html);
            $('#tractionEditModal').modal('show');
        }
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