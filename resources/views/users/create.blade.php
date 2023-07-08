@extends('layouts.master')
@section('title' , 'Create User')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/dropify.min.css') }}">
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Create User</li>
                    </ul>
                </div>
            </div>
            <div class="card py-5">
                <div class="card-body">
                    <form data-href="{{ route('users.store') }}" data-redirect="{{ route('users.index') }}" class="form_submit">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" placeholder="John Doe" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="john@abc.com" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label for="description">Password</label>
                                    <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <button class="btn btn-primary" id="btn-submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-form.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
@endsection
