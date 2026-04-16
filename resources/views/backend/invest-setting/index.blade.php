@extends('layouts.backend.app')

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">

<style>
    .card {
        border-radius: 10px;
    }
    .card-header h5 {
        margin: 0;
        font-weight: 600;
    }
    label {
        font-size: 13px;
        color: #555;
        font-weight: 500;
    }
</style>
@endpush

@push('title', 'General Setting')

@section('content')

<div class="widget-content widget-content-area br-6">

    <div class="row mb-3">
        <div class="col-12">
            <h4 style="color: gray; font-weight: 600">General Setting</h4>
        </div>
    </div>

    <form action="{{ route('admin.invest-setting.update') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="container">
            <div class="row">

                {{-- ================= LOGO ================= --}}
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            <h5>Logo</h5>
                        </div>
                        <div class="card-body">
                            <input type="file"
                                   name="logo"
                                   class="dropify"
                                   data-default-file="{{ $setting->logo ? asset('storage/'.$setting->logo) : '' }}">
                        </div>
                    </div>
                </div>

                {{-- ================= BASIC INFO ================= --}}
                <div class="col-md-8 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            <h5>Company Info</h5>
                        </div>

                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Company Name</label>
                                <input type="text"
                                       name="company_name"
                                       class="form-control"
                                       value="{{ $setting->company_name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Company Description</label>
                                <textarea name="company_description"
                                          class="form-control summernote">{{ $setting->company_description }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Office Address</label>
                                <textarea name="office_address"
                                          class="form-control">{{ $setting->office_address }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ================= CONTACT INFO ================= --}}
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            <h5>Customer Care</h5>
                        </div>

                        <div class="card-body">

                            <div class="form-group mb-2">
                                <label>Phone 1</label>
                                <input type="text" name="customer_care_phone_1"
                                       class="form-control"
                                       value="{{ $setting->customer_care_phone_1 }}">
                            </div>

                            <div class="form-group mb-2">
                                <label>Phone 2</label>
                                <input type="text" name="customer_care_phone_2"
                                       class="form-control"
                                       value="{{ $setting->customer_care_phone_2 }}">
                            </div>

                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="email" name="customer_care_email"
                                       class="form-control"
                                       value="{{ $setting->customer_care_email }}">
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ================= CORPORATE ================= --}}
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            <h5>Corporate Info</h5>
                        </div>

                        <div class="card-body">

                            <div class="form-group mb-2">
                                <label>Phone</label>
                                <input type="text" name="corporate_phone"
                                       class="form-control"
                                       value="{{ $setting->corporate_phone }}">
                            </div>

                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="email" name="corporate_email"
                                       class="form-control"
                                       value="{{ $setting->corporate_email }}">
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ================= INVESTMENT ================= --}}
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            <h5>Investment Contact</h5>
                        </div>

                        <div class="card-body">

                            <div class="form-group mb-2">
                                <label>Phone</label>
                                <input type="text" name="investment_phone"
                                       class="form-control"
                                       value="{{ $setting->investment_phone }}">
                            </div>

                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="email" name="investment_email"
                                       class="form-control"
                                       value="{{ $setting->investment_email }}">
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ================= GENERAL ================= --}}
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            <h5>General Info</h5>
                        </div>

                        <div class="card-body">

                            <div class="form-group mb-2">
                                <label>General Email</label>
                                <input type="email" name="general_email"
                                       class="form-control"
                                       value="{{ $setting->general_email }}">
                            </div>

                            <div class="form-group mb-2">
                                <label>Google Play Link</label>
                                <input type="text" name="google_play_link"
                                       class="form-control"
                                       value="{{ $setting->google_play_link }}">
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{-- SAVE BUTTON --}}
            <div class="text-right mt-3">
                <button class="btn btn-primary px-5">
                    Save Settings
                </button>
            </div>

        </div>
    </form>

</div>

@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
$(document).ready(function () {
    $('.dropify').dropify();

    $('.summernote').summernote({
        height: 150
    });
});
</script>

@endpush