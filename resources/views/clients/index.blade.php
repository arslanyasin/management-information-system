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
                <h3 class="page-title">Clients</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Clients</li>
                </ul>
            </div>
        </div>
        <div class="row text-end">
            <div class="col-12 mb-3 mt-3">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i>
                    Add Client</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Client ID</th>
                            <th>Contact Person</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('clients.table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Client Modal -->
<div id="add_client" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form data-href="{{ route('clients.store') }}" data-redirect="{{ route('clients.index') }}"
                      class="form_submit">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="first_name" id="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control floating" type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Client ID <span class="text-danger">*</span></label>
                                <input class="form-control floating" type="text" name="client_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone </label>
                                <input class="form-control" type="text" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Company Name</label>
                                <input class="form-control" type="text" name="company_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Contact Person</label>
                                <input class="form-control" type="text" name="contact_person">
                            </div>
                        </div>
                    </div>
                    <!--                    <div class="table-responsive m-t-15">-->
                    <!--                        <table class="table table-striped custom-table">-->
                    <!--                            <thead>-->
                    <!--                            <tr>-->
                    <!--                                <th>Module Permission</th>-->
                    <!--                                <th class="text-center">Read</th>-->
                    <!--                                <th class="text-center">Write</th>-->
                    <!--                                <th class="text-center">Create</th>-->
                    <!--                                <th class="text-center">Delete</th>-->
                    <!--                                <th class="text-center">Import</th>-->
                    <!--                                <th class="text-center">Export</th>-->
                    <!--                            </tr>-->
                    <!--                            </thead>-->
                    <!--                            <tbody>-->
                    <!--                            <tr>-->
                    <!--                                <td>Projects</td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                            </tr>-->
                    <!--                            <tr>-->
                    <!--                                <td>Tasks</td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                            </tr>-->
                    <!--                            <tr>-->
                    <!--                                <td>Chat</td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                            </tr>-->
                    <!--                            <tr>-->
                    <!--                                <td>Estimates</td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                            </tr>-->
                    <!--                            <tr>-->
                    <!--                                <td>Invoices</td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                            </tr>-->
                    <!--                            <tr>-->
                    <!--                                <td>Timing Sheets</td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                                <td class="text-center">-->
                    <!--                                    <input checked="" type="checkbox">-->
                    <!--                                </td>-->
                    <!--                            </tr>-->
                    <!--                            </tbody>-->
                    <!--                        </table>-->
                    <!--                    </div>-->
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" id="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Client Modal -->

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
                <form id="confirm-delete-form" action="{{ route('clients-delete') }}" class="d-inline btn-ok"
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
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
<script>
    $(document).on('click', '.deletebtn', function () {
        $('#id').val($(this).attr('data-id'));
    });
</script>
@endsection
