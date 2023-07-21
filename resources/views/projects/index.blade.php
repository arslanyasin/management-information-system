@extends('layouts.master')
@section('title' , 'Users')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Projects</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_project"><i
                            class="fa fa-plus"></i> Create Project</a>
                    <div class="view-icons">
                        <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                        <a href="project-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Project Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <select class="select floating">
                        <option>Select Roll</option>
                        <option>Web Developer</option>
                        <option>Web Designer</option>
                        <option>Android Developer</option>
                        <option>Ios Developer</option>
                    </select>
                    <label class="focus-label">Role</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div>
        </div>
        <!-- /Search Filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Project Id</th>
                            <th>Leader</th>
                            <th>Team</th>
                            <th>Deadline</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('projects.table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('projects.create_model')
{{--  Delete Modal  --}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirm Delete?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('You are going to delete this item. All contents related with this product will be lost.') }}
                {{ __('Do you want to delete it?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <form id="confirm-delete-form" action="{{ route('positions-delete') }}" class="d-inline btn-ok"
                      method="post">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/custom-form.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).on('click', '.deletebtn', function () {
        $('#id').val($(this).attr('data-id'));
    });

    // Get JobTitle
    $(document).on('change', '#team_lead', function () {
        var name = $('#team_lead').find('option:selected').attr("data-name");
        console.log(name);
        $('#project-lead').html(`<a href="#" data-toggle="tooltip" title="` + name + `" class="avatar">
                                        <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                    </a>`);
    });

    // Get JobTitle
    $(document).on('change', '#members', function () {
        var name = $('#members').select2('data');
        var html = '';
        $.each(name, function (index, value) {
            if (index < 4) {
                html += `<a href="#" data-toggle="tooltip" title="` + value.text + `" class="avatar">
                                        <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                    </a>`
            }
        });
        if(name.length > 4){
            html += `<span class="all-team">+`+(name.length-4)+`</span>`
        }
        $('#project-members').html(html);
    });
</script>
@endsection
