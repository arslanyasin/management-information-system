<!-- Create Project Modal -->
<div id="create_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form data-href="{{ route('projects.store') }}" data-redirect="{{ route('projects.index') }}"
                       class="form_submit">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input class="form-control" type="text" name="project_name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Client</label>
                                <select class="select" name="client_id">
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->company_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" name="start_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" name="end_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Rate</label>
                                <input placeholder="$50" class="form-control" type="text" name="price">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <select class="select" name="price_type">
                                    <option value="1">Hourly</option>
                                    <option value="2">Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="select" name="priority">
                                    <option value="1">High</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Project Leader</label>
                                <select class="select" name="team_lead" id="team_lead">
                                    @foreach($employees as $employee)
                                    <option value="{{$employee->employee_id}}" data-name="{{$employee->name}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Leader</label>
                                <div class="project-members" id="project-lead">
                                    <a href="#" data-toggle="tooltip" title="{{$employees[0]->name}}" class="avatar">
                                        <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Add Team</label>
                                <select class="select2" multiple name="members[]" id="members">
                                    @foreach($employees as $employee)
                                    <option value="{{$employee->employee_id}}" data-name="{{$employee->name}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Team Members</label>
                                <div class="project-members" id="project-members">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" class="form-control summernote" placeholder="Enter your message here" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload Files</label>
                        <input class="form-control" type="file">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Create Project Modal -->
