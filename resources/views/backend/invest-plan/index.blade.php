@extends('layouts.backend.app')

@push('title', 'Invest Plan')

@section('content')
<div class="widget-content widget-content-area br-6">

    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Invest Plan</h4>

            <button class="btn btn-primary"
                data-toggle="modal"
                data-target="#planCreateModal">
                Add Plan
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Short Description</th>
                <th>Images</th>
                <th width="160">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($plans as $key => $plan)
                <tr>
                    <td>{{ $key + 1 }}</td>

                    <td>
                        <strong>{{ $plan->title }}</strong>
                    </td>

                    <td>
                        {{ Str::limit($plan->short_description, 80) }}
                    </td>

                    <td>
                        <div class="d-flex gap-1" style="gap:5px;">
                            @if($plan->image_1)
                                <img src="{{ asset($plan->image_1) }}"
                                     style="width:50px;height:50px;object-fit:cover;border-radius:5px;">
                            @endif

                            @if($plan->image_2)
                                <img src="{{ asset($plan->image_2) }}"
                                     style="width:50px;height:50px;object-fit:cover;border-radius:5px;">
                            @endif

                            @if($plan->image_3)
                                <img src="{{ asset($plan->image_3) }}"
                                     style="width:50px;height:50px;object-fit:cover;border-radius:5px;">
                            @endif
                        </div>
                    </td>

                    <td>
                        <button class="btn btn-sm btn-info"
                            onclick="editPlan({{ $plan->id }})">
                            Edit
                        </button>

                        <button class="btn btn-sm btn-danger"
                            onclick="deletePlan({{ $plan->id }})">
                            Delete
                        </button>

                        <form id="delete-form-{{ $plan->id }}"
                            action="{{ route('admin.invest-plan.destroy', $plan->id) }}"
                            method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No Invest Plans Found
                    </td>
                </tr>
            @endforelse
        </tbody>

        </table>
    </div>
</div>

{{-- CREATE MODAL --}}
<div class="modal fade" id="planCreateModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Add Invest Plan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <form action="{{ route('admin.invest-plan.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Details</label>
                        <textarea name="details" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Button Text</label>
                        <input type="text" name="button_text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Button Apply Text</label>
                        <input type="text" name="button_apply" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Apply Link</label>
                        <input type="text" name="apply_link" class="form-control">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label>Image 1</label>
                        <input type="file" name="image_1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Image 2</label>
                        <input type="file" name="image_2" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Image 3</label>
                        <input type="file" name="image_3" class="form-control">
                    </div>

                    <button class="btn btn-primary mt-2">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal fade" id="planEditModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Edit Invest Plan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="plan_edit_body"></div>

        </div>
    </div>
</div>

@endsection

@push('js')
<script>

function editPlan(id){

    $.get("{{ url('admin/invest-plan/edit') }}/" + id, function(data){

        let html = `
        <form action="{{ route('admin.invest-plan.update') }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="${data.id}">

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="${data.title}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control" required>${data.short_description}</textarea>
            </div>

            <div class="form-group">
                <label>Details</label>
                <textarea name="details" class="form-control">${data.details ?? ''}</textarea>
            </div>

            <div class="form-group">
                <label>Button Text</label>
                <input type="text" name="button_text" value="${data.button_text ?? ''}" class="form-control">
            </div>

            <div class="form-group">
                <label>Button Apply</label>
                <input type="text" name="button_apply" value="${data.button_apply ?? ''}" class="form-control">
            </div>

            <div class="form-group">
                <label>Apply Link</label>
                <input type="text" name="apply_link" value="${data.apply_link ?? ''}" class="form-control">
            </div>

            <button class="btn btn-primary mt-2">Update</button>
        </form>
        `;

        $('#plan_edit_body').html(html);
        $('#planEditModal').modal('show');
    });
}

// DELETE
function deletePlan(id){

    Swal.fire({
        title: "Are you sure?",
        text: "This plan will be deleted!",
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