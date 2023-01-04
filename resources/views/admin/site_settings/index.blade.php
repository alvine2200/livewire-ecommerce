@extends('layouts.admin')
@section('title', 'Global Admin Settings')
@section('content')
    @include('layouts.includes.status')
    <div class="container">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <form action="{{ url('admin/set') }}" method="POST">
                    @csrf
                    <div class="card mb-3">
                        <div class="card-header bg-primary">
                            <h3 class="text-white mb-0">Website</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Website Name</label>
                                    <input type="text" value="{{ $settings->website_name }}" name="website_name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Website Url</label>
                                    <input type="text" value="{{ $settings->website_url }}" name="website_url" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Page Title</label>
                                    <input type="text" value="{{ $settings->website_title }}" name="website_title" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Website Keywords</label>
                                    <input type="text" value="{{ $settings->website_keyword }}" name="website_keyword" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Website Description</label>
                                    <input type="text" value="{{ $settings->website_description }}" name="website_description" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-primary">
                            <h3 class="text-white mb-0">Website-Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Address</label>
                                    <textarea name="address" rows="3" class="form-control">{{ $settings->address }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone 1</label>
                                    <input type="text" value="{{ $settings->phone1 }}" name="phone1" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone 2</label>
                                    <input type="text" value="{{ $settings->phone2 }}" name="phone2" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email 1</label>
                                    <input type="text" value="{{ $settings->email1 }}" name="email1" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email 2</label>
                                    <input type="text" value="{{ $settings->email2 }}" name="email2" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-primary">
                            <h3 class="text-white mb-0">Website Social Media</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">FaceBook (Optional)</label>
                                    <input type="text" name="facebook" value="{{ $settings->facebook }}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Twitter (Optional)</label>
                                    <input type="text" name="twitter" value="{{ $settings->twitter }}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Instagram (Optional)</label>
                                    <input type="text" name="instagram" value="{{ $settings->instagram }}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Youtube (Optional)</label>
                                    <input type="text" name="youtube" value="{{ $settings->youtube }}" class="form-control">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
