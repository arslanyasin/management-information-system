@extends('layouts.master')
@section('title' , 'Users')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Department Positions</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Department Positions</li>
                </ul>
            </div>
        </div>
        <div class="row text-end">
            <div class="col-12 mb-3 mt-3">
                <a href="{{ route('positions.create') }}" class="btn add-btn">+ Add Positions</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table custom-table dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Position Name</th>
                            <th>Department Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('department_positions.table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
                <form id="confirm-delete-form" action="{{ route('positions-delete') }}" class="d-inline btn-ok" method="post">
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
    $(document).ready(function () {
        $('.dataTable').DataTable({
            "ordering": false
        });
    });


    $(document).on('click', '.deletebtn', function () {
        $('#id').val($(this).attr('data-id'));
    });
</script>
@endsection
