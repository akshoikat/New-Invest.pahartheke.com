@extends('layouts.backend.app')

@push('title', 'Invest FAQ')

@section('content')
<div class="widget-content widget-content-area br-6">

    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Invest FAQ</h4>

            <button class="btn btn-primary"
                data-toggle="modal"
                data-target="#faqCreateModal">
                Add FAQ
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($faqs as $key => $faq)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td>
                        <span class="badge bg-{{ $faq->status ? 'success' : 'danger' }}">
                            {{ $faq->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    <td>
                        <button class="btn btn-sm btn-info"
                            onclick="editFaq({{ $faq->id }})">
                            Edit
                        </button>

                        <button class="btn btn-sm btn-danger"
                            onclick="deleteFaq({{ $faq->id }})">
                            Delete
                        </button>

                        <form id="delete-form-{{ $faq->id }}"
                            action="{{ route('admin.invest-faq.destroy', $faq->id) }}"
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

<div class="modal fade" id="faqCreateModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Add FAQ</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
invest-faq.destroy
            <div class="modal-body">

                <form action="{{ route('admin.invest-faq.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Answer</label>
                        <textarea name="answer" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button class="btn btn-primary mt-2">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="faqEditModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Edit FAQ</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="faq_edit_body"></div>

        </div>
    </div>
</div>

@endsection

@push('js')

<script>
function editFaq(id){

    let path = "{{ route('admin.invest-faq.edit',':id') }}";
    path = path.replace(':id',id);

    $.ajax({
        url: path,
        type: "GET",
        success: function(data){

            let updateUrl = "{{ route('admin.invest-faq.update',':id') }}";
            updateUrl = updateUrl.replace(':id',data.id);

            let html = `
            <form action="${updateUrl}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Question</label>
                    <input type="text"
                        name="question"
                        value="${data.question}"
                        class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="answer"
                        class="form-control"
                        required>${data.answer}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" ${data.status == 1 ? 'selected' : ''}>Active</option>
                        <option value="0" ${data.status == 0 ? 'selected' : ''}>Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary mt-2">Update</button>
            </form>
            `;

            $('#faq_edit_body').html(html);
            $('#faqEditModal').modal('show');
        }
    });
}

// DELETE
function deleteFaq(id){

    Swal.fire({
        title: "Are you sure?",
        text: "This FAQ will be deleted!",
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