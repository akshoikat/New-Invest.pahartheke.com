@extends('layouts.backend.app')

@push('title', 'Contact')

@section('content')
<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Contact's</h4>
            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#categoryCreateModal">Add New</button> --}}
        </div>
    </div>
    <div class="table-responsive mb-4 mt-4">
        <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th width="10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="sortable">
                @foreach ($contacts as $key => $contact)
                 <tr class="list-item">
                    <td>{{$key+1}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->message}}</td>
                    <td>{{$contact->created_at->diffForHumans()}}</td>
                    <td class="text-center">
                        <div class="dropdown custom-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                {{-- <button type="button" class="dropdown-item" onclick="editcontact('{{ $contact->id }}')">Edit</button> --}}
                                <a class="dropdown-item" href="javascript:void(0);" onclick="deleteContact('{{ $contact->id }}')">Delete</a>
                                <form id="delete-form-{{ $contact->id }}" action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" style="display: none;">
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
{{-- <div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-labelledby="categoryCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryCreateModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"/></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="color: rgb(79, 79, 79)">Name <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                            </div>
    
                            <div class="form-group">
                                <label for="meta_tag" style="color: rgb(79, 79, 79)">Meta Tag <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="meta_tag" name="meta_tag" placeholder="Enter Meta Tag">
                            </div>
    
                            <div class="form-group">
                                <label for="meta_description" style="color: rgb(79, 79, 79)">Meta Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="7" id="meta_description" name="meta_description" placeholder="Enter Meta Description"></textarea>
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


<div class="modal fade" id="categoryeditModal" tabindex="-1" role="dialog" aria-labelledby="categoryeditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryeditModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"/></svg>
                </button>
            </div>
            <div class="modal-body" id="edit_modal_body">
                
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('js')
<script>

// function editcontact(id){
//     var path = "{{route('admin.category.edit',':id')}}";
//     path = path.replace(':id',id);

//     $.ajax({
//         type: "GET",
//         dataType: "json",
//         url: path,
//         success: (response) => {
//             if(response){
//                 console.log(response);
//                 $("#edit_modal_body").html(`
//                     <div class="row">
//                         <div class="col-12">
//                             <form action="{{ route('admin.category.update') }}" method="POST">
//                                 @method('PUT')
//                                 @csrf
//                                 <div class="form-group">
//                                     <label for="name" style="color: rgb(79, 79, 79)">Name <span class="text-danger">*</span> </label>
//                                     <input type="text" value="${response.name}" class="form-control" id="name" name="name" placeholder="Enter Category Name">
//                                 </div>
        
//                                 <div class="form-group">
//                                     <label for="meta_tag" style="color: rgb(79, 79, 79)">Meta Tag <span class="text-danger">*</span></label>
//                                     <input type="text" value="${response.meta_tag}" class="form-control" id="meta_tag" name="meta_tag" placeholder="Enter Meta Tag">
//                                 </div>
        
//                                 <div class="form-group">
//                                     <label for="meta_description" style="color: rgb(79, 79, 79)">Meta Description <span class="text-danger">*</span></label>
//                                     <textarea class="form-control" rows="7" id="meta_description" name="meta_description" placeholder="Enter Meta Description">${response.meta_description}</textarea>
//                                 </div>

//                                 <div class="form-group">
//                                     <label for="status" style="color: rgb(79, 79, 79)">Status <span class="text-danger">*</span></label>
//                                     <select class="form-control" id="status" name="status">
//                                         <option value="active" ${response.status == 'active' ? 'selected' : ''}>Active</option>
//                                         <option value="inactive" ${response.status == 'inactive' ? 'selected' : ''}>Inactive</option>
//                                     </select>
//                                 </div>

//                                 <input type="hidden" name="id" value="${response.id}">

//                                 <div class="form-group">
//                                     <button type="submit" class="btn btn-primary">Update</button>
//                                 </div>
//                             </form>
//                         </div>
//                     </div>
//                 `);
//                 $('#categoryeditModal').modal('show');
//             }
//         }
//     });
// }



function deleteContact(id){
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