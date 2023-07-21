@extends('layouts.master')
@section('title' , 'Create User')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/plugins/dropify/dropify.min.css') }}">
@endsection
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{$project->project_name}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('projects.index')}}">Projects</a></li>
                        <li class="breadcrumb-item active">Project Detail</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#edit_project"><i class="fa fa-plus"></i> Edit Project</a>
                    <a href="task-board.html" class="btn btn-white float-right m-r-10" data-toggle="tooltip" title="Task Board"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="project-title">
                            <h5 class="card-title">{{$project->project_name}}</h5>
                            <small class="block text-ellipsis m-b-15"><span class="text-xs">2</span> <span class="text-muted">open tasks, </span><span class="text-xs">5</span> <span class="text-muted">tasks completed</span></small>
                        </div>
                        <p>{{$project->description}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-20">Uploaded image files</h5>
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
                                <div class="uploaded-box">
                                    <div class="uploaded-img">
                                        <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="uploaded-img-name">
                                        demo.png
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
                                <div class="uploaded-box">
                                    <div class="uploaded-img">
                                        <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="uploaded-img-name">
                                        demo.png
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
                                <div class="uploaded-box">
                                    <div class="uploaded-img">
                                        <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="uploaded-img-name">
                                        demo.png
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
                                <div class="uploaded-box">
                                    <div class="uploaded-img">
                                        <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="uploaded-img-name">
                                        demo.png
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-20">Uploaded files</h5>
                        <ul class="files-list">
                            <li>
                                <div class="files-cont">
                                    <div class="file-type">
                                        <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                    </div>
                                    <div class="files-info">
                                        <span class="file-name text-ellipsis"><a href="#">AHA Selfcare Mobile Application Test-Cases.xls</a></span>
                                        <span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                                        <div class="file-size">Size: 14.8Mb</div>
                                    </div>
                                    <ul class="files-action">
                                        <li class="dropdown dropdown-action">
                                            <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">Download</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="files-cont">
                                    <div class="file-type">
                                        <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                    </div>
                                    <div class="files-info">
                                        <span class="file-name text-ellipsis"><a href="#">AHA Selfcare Mobile Application Test-Cases.xls</a></span>
                                        <span class="file-author"><a href="#">Richard Miles</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                                        <div class="file-size">Size: 14.8Mb</div>
                                    </div>
                                    <ul class="files-action">
                                        <li class="dropdown dropdown-action">
                                            <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">Download</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="project-task">
                    <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                        <li class="nav-item"><a class="nav-link active" href="#all_tasks" data-toggle="tab" aria-expanded="true">All Tasks</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pending_tasks" data-toggle="tab" aria-expanded="false">Pending Tasks</a></li>
                        <li class="nav-item"><a class="nav-link" href="#completed_tasks" data-toggle="tab" aria-expanded="false">Completed Tasks</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="all_tasks">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">
                                        <ul id="task-list">
                                            <li class="task">
                                                <div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
                                                    <span class="task-label" contenteditable="true">Patient appointment booking</span>
                                                    <span class="task-action-btn task-btn-right">
																	<span class="action-circle large" title="Assign">
																		<i class="material-icons">person_add</i>
																	</span>
																	<span class="action-circle large delete-btn" title="Delete Task">
																		<i class="material-icons">delete</i>
																	</span>
																</span>
                                                </div>
                                            </li>
                                            <li class="task">
                                                <div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
                                                    <span class="task-label" contenteditable="true">Appointment booking with payment gateway</span>
                                                    <span class="task-action-btn task-btn-right">
																	<span class="action-circle large" title="Assign">
																		<i class="material-icons">person_add</i>
																	</span>
																	<span class="action-circle large delete-btn" title="Delete Task">
																		<i class="material-icons">delete</i>
																	</span>
																</span>
                                                </div>
                                            </li>
                                            <li class="completed task">
                                                <div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
                                                    <span class="task-label">Doctor available module</span>
                                                    <span class="task-action-btn task-btn-right">
																	<span class="action-circle large" title="Assign">
																		<i class="material-icons">person_add</i>
																	</span>
																	<span class="action-circle large delete-btn" title="Delete Task">
																		<i class="material-icons">delete</i>
																	</span>
																</span>
                                                </div>
                                            </li>
                                            <li class="task">
                                                <div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
                                                    <span class="task-label" contenteditable="true">Patient and Doctor video conferencing</span>
                                                    <span class="task-action-btn task-btn-right">
																	<span class="action-circle large" title="Assign">
																		<i class="material-icons">person_add</i>
																	</span>
																	<span class="action-circle large delete-btn" title="Delete Task">
																		<i class="material-icons">delete</i>
																	</span>
																</span>
                                                </div>
                                            </li>
                                            <li class="task">
                                                <div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
                                                    <span class="task-label" contenteditable="true">Private chat module</span>
                                                    <span class="task-action-btn task-btn-right">
																	<span class="action-circle large" title="Assign">
																		<i class="material-icons">person_add</i>
																	</span>
																	<span class="action-circle large delete-btn" title="Delete Task">
																		<i class="material-icons">delete</i>
																	</span>
																</span>
                                                </div>
                                            </li>
                                            <li class="task">
                                                <div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
                                                    <span class="task-label" contenteditable="true">Patient Profile add</span>
                                                    <span class="task-action-btn task-btn-right">
																	<span class="action-circle large" title="Assign">
																		<i class="material-icons">person_add</i>
																	</span>
																	<span class="action-circle large delete-btn" title="Delete Task">
																		<i class="material-icons">delete</i>
																	</span>
																</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="task-list-footer">
                                        <div class="new-task-wrapper">
                                            <textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
                                            <span class="error-message hidden">You need to enter a task first</span>
                                            <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                            <span class="btn" id="close-task-panel">Close</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="pending_tasks"></div>
                        <div class="tab-pane" id="completed_tasks"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title m-b-15">Project details</h6>
                        <table class="table table-striped table-border">
                            <tbody>
                            <tr>
                                <td>Cost:</td>
                                <td class="text-right">{{$project->price}}</td>
                            </tr>
                            <tr>
                                <td>Total Hours:</td>
                                <td class="text-right">100 Hours</td>
                            </tr>
                            <tr>
                                <td>Created:</td>
                                <td class="text-right">{{date('d M, Y',strtotime($project->created_at))}}</td>
                            </tr>
                            <tr>
                                <td>Deadline:</td>
                                <td class="text-right">{{date('d M, Y',strtotime($project->end_date))}}</td>
                            </tr>
                            <tr>
                                <td>Priority:</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="#" class="badge badge-danger dropdown-toggle" data-toggle="dropdown">Highest </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-primary"></i> Normal priority</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Created by:</td>
                                <td class="text-right"><a href="profile.html">Barry Cuda</a></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td class="text-right">Working</td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                        <div class="progress progress-xs mb-0">
                            <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
                        </div>
                    </div>
                </div>
                <div class="card project-user">
                    <div class="card-body">
                        <h6 class="card-title m-b-20">Assigned Leader <button type="button" class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i> Add</button></h6>
                        <ul class="list-box">
                            <li>
                                <a href="profile.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar"><img alt="" src="assets/img/profiles/avatar-11.jpg"></span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Wilmer Deluna</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card project-user">
                    <div class="card-body">
                        <h6 class="card-title m-b-20">
                            Assigned users
                            <button type="button" class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#assign_user"><i class="fa fa-plus"></i> Add</button>
                        </h6>
                        <ul class="list-box">
                            <li>
                                <a href="profile.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Web Designer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="profile.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Web Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
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
</script>
@endsection
