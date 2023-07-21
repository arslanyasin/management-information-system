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
                <h3 class="page-title">Departments</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Departments</li>
                </ul>
            </div>
        </div>
        <div class="row text-end">
            <div class="col-12 mb-3 mt-3">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table custom-table dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Hire Date</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('employees.table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('employees.add-model')
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
                <form id="confirm-delete-form" action="{{ route('employee-delete') }}" class="d-inline btn-ok" method="post">
                    @csrf
                    <input type="hidden" id="employee_id" name="employee_id">
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
    // Get JobTitle
    $(document).on('change' , '#department_id' , function (){
        var id = $(this).val();
        $.ajax({
            url: '{{ url("/getPositionsByDepartment") }}' + '/' +  id,
            type: 'get',
            success: function (response){
                var option = '';
                $.each(response , function (index , value){
                    option += `<option value="${value.id}">${value.position_name}</option>`
                });
                $('#position_id').html(option);
                $('#position_id').removeAttr('disabled');
            }
        });
    });
    const togglePassword = document.querySelector("#togglePassword");
    const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
    const password = document.querySelector("#password");
    const password_confirmation = document.querySelector("#password_confirmation");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        if(password.getAttribute("type") === "password") {
            this.classList.remove("la-eye-slash");
            this.classList.add("la-eye");
        }else {
            this.classList.add("la-eye-slash");
            this.classList.remove("la-eye");
        }
        password.setAttribute("type", type);

        // toggle the icon

    });
    toggleConfirmPassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password_confirmation.getAttribute("type") === "password" ? "text" : "password";
        if(password_confirmation.getAttribute("type") === "password") {
            this.classList.remove("la-eye-slash");
            this.classList.add("la-eye");
        }else {
            this.classList.add("la-eye-slash");
            this.classList.remove("la-eye");
        }
        password_confirmation.setAttribute("type", type);

        // toggle the icon

    });

    $(document).on('click', '.deletebtn', function () {
        $('#employee_id').val($(this).attr('data-id'));
    });
</script>
@endsection
