@extends('layouts.backend.app')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('title', 'Setting')

@section('content')
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 style="color: gray; font-weight: 600">General Setting</h4>
            </div>
            <div style="margin: auto; margin-top:20px;">
                    <div class="container">
                        <div class="row ">
                            <!-- Card 1: Website Content (Title, Description, etc.) -->
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center">
                                        <h5>Website Content</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('admin.setting.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="website_title" value="1">
                                                <!-- Website Title -->
                                                <div class="form-group">
                                                    <label for="website_title" style="color: rgb(79, 79, 79)">Website
                                                        Title</label>
                                                    <input type="text"
                                                        class="form-control @error('website_title') is-invalid @enderror"
                                                        id="website_title" name="website_title"
                                                        value="{{ $setting->website_title ?? old('website_title') }}"
                                                        placeholder="Enter Website Title">
                                                    @error('website_title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- Website address -->
                                                <div class="form-group">
                                                    <label for="address" style="color: rgb(79, 79, 79)">Website
                                                        Title</label>
                                                    <input type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        id="address" name="address"
                                                        value="{{ $setting->address ?? old('address') }}"
                                                        placeholder="Enter Website Title">
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Website Description -->
                                                <div class="form-group">
                                                    <label for="website_description" style="color: rgb(79, 79, 79)">Footer
                                                        About</label>
                                                    <textarea class="form-control @error('website_description') is-invalid @enderror" id="website_description"
                                                        name="website_description" placeholder="Enter Website Description">{{ $setting->website_description ?? old('website_description') }}</textarea>
                                                    @error('website_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                
                                                
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 2: Social Links -->
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center">
                                        <h5>Social Links</h5>
                                    </div>
                                    <div class="card-body">

                                        <form action="{{ route('admin.setting.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="social_links" value="1">
                                            <!-- Facebook Url One -->
                                            <div class="form-group">
                                                <label for="facebook_url" style="color: rgb(79, 79, 79)">Facebook
                                                    Url</label>
                                                <input type="url"
                                                    class="form-control @error('facebook_url') is-invalid @enderror"
                                                    id="facebook_url" name="facebook_url"
                                                    value="{{ $setting->facebook_url ?? old('facebook_url') }}"
                                                    placeholder="Enter Facebook Url">
                                                @error('facebook_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Instagram Url -->
                                            <div class="form-group">
                                                <label for="instagram_url" style="color: rgb(79, 79, 79)">Instagram
                                                    Url</label>
                                                <input type="url"
                                                    class="form-control @error('instagram_url') is-invalid @enderror"
                                                    id="instagram_url" name="instagram_url"
                                                    value="{{ $setting->instagram_url ?? old('instagram_url') }}"
                                                    placeholder="Enter Instagram Url">
                                                @error('instagram_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- YouTube Url -->
                                            <div class="form-group">
                                                <label for="youtube_url" style="color: rgb(79, 79, 79)">YouTube Url</label>
                                                <input type="url"
                                                    class="form-control @error('youtube_url') is-invalid @enderror"
                                                    id="youtube_url" name="youtube_url"
                                                    value="{{ $setting->youtube_url ?? old('youtube_url') }}"
                                                    placeholder="Enter YouTube Url">
                                                @error('youtube_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- WhatsApp Url -->
                                            <div class="form-group">
                                                <label for="whatsapp_url" style="color: rgb(79, 79, 79)">Whatsapp
                                                    Url</label>
                                                <input type="url"
                                                    class="form-control @error('whatsapp_url') is-invalid @enderror"
                                                    id="whatsapp_url" name="whatsapp_url"
                                                    value="{{ $setting->whatsapp_url ?? old('whatsapp_url') }}"
                                                    placeholder="Enter Whatsapp Url">
                                                @error('whatsapp_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 3: Contact Information -->
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center">
                                        <h5>Contact Information</h5>
                                    </div>
                                    <div class="card-body">


                                        <form action="{{ route('admin.setting.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="contact" value="1">

                                            <!-- Email One -->
                                            <div class="form-group">
                                                <label for="email" style="color: rgb(79, 79, 79)">Email <span
                                                        class="text-danger">*</span></label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" value="{{ $setting->email ?? old('email') }}"
                                                    placeholder="Enter Email One">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Phone Number One -->
                                            <div class="form-group">
                                                <label for="phone" style="color: rgb(79, 79, 79)">Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    name="phone" value="{{ $setting->phone ?? old('phone') }}"
                                                    placeholder="Enter Phone Number One">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save</button>

                                        </form>
                                    </div>
                                </div>
                            </div>                           
                            <!-- Card 4: Logo & Favicon -->
                            <div class="col-12 col-md-6 col-lg-8 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center">
                                        <h5>Logo & Favicon</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('admin.setting.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="image_uplaod" value="1">
                                            <div class="row">
                                                <!-- Logo -->
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="logo" style="color: rgb(79, 79, 79)">Logo</label>
                                                        <input type="file"
                                                            class="form-control @error('logo') is-invalid @enderror dropify"
                                                            data-default-file="{{ @$setting->logo ?? '' }}"
                                                            id="logo" name="logo">
                                                        @error('logo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Favicon -->
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="favicon"
                                                            style="color: rgb(79, 79, 79)">Favicon</label>
                                                        <input type="file"
                                                            class="form-control @error('favicon') is-invalid @enderror dropify"
                                                            data-default-file="{{ @$setting->favicon ?? '' }}"
                                                            id="favicon" name="favicon">
                                                        @error('favicon')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>   
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.dropify').dropify();
                $('.summernote').summernote({
                    height: 150,
                });
            });
        </script>
    @endpush
