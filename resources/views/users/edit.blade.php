@extends('layouts.master')
@section('title' , 'Edit User')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/dropify.min.css') }}">
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit User</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ul>
                </div>
            </div>
            <div class="card py-5">
                <div class="card-body">
                    <form method="post" action="{{route('users.update',$user->id)}}" data-href="{{ route('users.update' , $user->id) }}" data-redirect="{{ route('users.index') }}" class="form_submit">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label for="description">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" id="btn-submit">Update</button>
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
