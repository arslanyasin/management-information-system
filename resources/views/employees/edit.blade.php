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
                <h3 class="page-title">Edit Employee</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('employees.index')}}">Employees</a></li>
                    <li class="breadcrumb-item active">Edit Employee</li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="row card-body my-auto">
                <div class="col-12">
                    <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#info-tab">Primary Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#contact-tab">Contact info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#account-tab">Account Info</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card py-5">
            <div class="card-body">
                <form method="post" action="{{route('employees.update',$employee->employee_id)}}"
                      data-href="{{ route('employees.update' , $employee->employee_id) }}"
                      data-redirect="{{ route('employees.index') }}" class="form_submit">
                    @method('patch')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-1">
                                <label for="name">Employee Name</label>
                                <input type="text" name="name" placeholder="Employee Name"
                                       id="name" value="{{$employee->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-1">
                                <label for="name">Employee Email</label>
                                <input type="email" name="email" placeholder="Employee Email"
                                       id="department_name"  value="{{$employee->email}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-1">
                                <label for="name">Employee Personal Email</label>
                                <input type="email" name="secondary_email" placeholder="Employee Personal Email"
                                       id="secondary_email"  value="{{$employee->secondary_email}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Employee Phone</label>
                                <input type="tel" name="phone" placeholder="Employee Phone"
                                       id="phone"  value="{{$employee->phone}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Joining Date</label>
                                <input type="date" name="hire_date" placeholder="Joining Date"
                                       id="hire_date"  value="{{$employee->hire_date}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Department</label>
                                <select name="department_id"
                                        id="department_id" class="form-control">
                                    @foreach($departments as $department)
                                    <option value="{{$department->department_id}}" {{$department->department_id ==
                                        $employee->department_id ? 'selected':''}}>{{$department->department_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Position</label>
                                <select name="position_id"
                                        id="position_id" class="form-control">
                                    @foreach($positions as $position)
                                    <option value="{{$position->id}}" {{$position->id ==
                                        $employee->position_id ? 'selected':''}}>{{$position->position_name}}
                                    </option>
                                    @endforeach
                                </select>
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
    $(document).ready(function () {
        $('.dropify').dropify();
    });
    $(document).on('change', '#department_id', function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ url("/getPositionsByDepartment") }}' + '/' + id,
            type: 'get',
            success: function (response) {
                var option = '';
                $.each(response, function (index, value) {
                    option += `<option value="${value.id}">${value.position_name}</option>`
                });
                $('#position_id').html(option);
                $('#position_id').removeAttr('disabled');
            }
        });
    });
</script>
@endsection
