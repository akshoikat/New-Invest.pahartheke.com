@extends('layouts.backend.app')

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('title', 'Product')

@section('content')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<div class="widget-content widget-content-area br-6">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 style="color: gray; font-weight: 600">Source content</h4>
            <a href="{{ route('admin.source.index') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>
   
    <div class="">
        <div class="card shadow-sm">
            <div class="card-header text-center">
                <h5>Our Source</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.source.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="our_source" style="color: rgb(79, 79, 79)">Our Source
                                </label>
                                <textarea class="form-control @error('our_source') is-invalid @enderror" id="summernote"
                                name="our_source" placeholder="Enter Website Description">{{ $source->our_source ?? old('delivary_process') }}</textarea>
                            @error('our_source')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Website Description -->
                        <div class="form-group">
                            <label for="delivary_process" style="color: rgb(79, 79, 79)">
                                Delivary Process</label>
                            <textarea class="form-control @error('delivary_process') is-invalid @enderror" id="summernote2"
                                name="delivary_process" placeholder="Enter Website Description">{{ $source->delivary_process ?? old('delivary_process') }}</textarea>
                            @error('delivary_process')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- summarnote js --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
$(document).ready(function(){
    $('.dropify').dropify();
});

function deleteproduct(id){
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

$(document).ready(function() {
  $('#summernote').summernote({
    height:250
  });
  $('#summernote2').summernote({
    height:250
  });
  
});
</script>
@endpush