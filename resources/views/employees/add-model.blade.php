<!-- Add Client Modal -->
<div id="add_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form data-href="{{ route('employees.store') }}" data-redirect="{{ route('employees.index') }}"
                      class="form_submit">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Employee Name</label>
                                <input type="text" name="name" placeholder="Employee Name"
                                       id="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Employee Email</label>
                                <input type="email" name="email" placeholder="Employee Email"
                                       id="department_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Employee Phone</label>
                                <input type="tel" name="phone" placeholder="Employee Phone"
                                       id="phone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Joining Date</label>
                                <input type="date" name="hire_date" placeholder="Joining Date"
                                       id="hire_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Department</label>
                                <select name="department_id"
                                        id="department_id" class="form-control">
                                    @foreach($departments as $department)
                                    <option value="{{$department->department_id}}">{{$department->department_name}}
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
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Password</label>
                                <input type="password" name="password"
                                        id="password" class="form-control"/>
                                <i class="la la-eye-slash password-eye" id="togglePassword" ></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="name">Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                        id="password_confirmation" class="form-control"/>
                                <i class="la la-eye-slash password-eye" id="toggleConfirmPassword"></i>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Profile Image</label>
                            <input class="form-control" type="file" id="image" name="image">
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
