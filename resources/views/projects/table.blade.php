@foreach($projects as $project)
<tr>
    <td>
        <a href="{{ route('projects-detail' , $project->project_id) }}">{{$project->project_name}}</a>
    </td>
    <td>PRO-{{$project->project_id}}</td>
    <td>
        <ul class="team-members">
            @foreach($project->resources as $resource)
            @if($resource->resource_type == 1)
            <li>
                <a href="#" data-toggle="tooltip" title="{{$resource->employee->name}}"><img alt=""
                                                                             src="assets/img/profiles/avatar-16.jpg"></a>
            </li>
            @endif
            @endforeach
        </ul>
    </td>
    <td>
        <ul class="team-members text-nowrap">
            @foreach($project->resources as $resource)
            @if($resource->resource_type == 2)
            <li>
                <a href="#" title="{{$resource->employee->name}}" data-toggle="tooltip"><img alt=""
                                                                        src="assets/img/profiles/avatar-02.jpg"></a>
            </li>
            @endif
            @endforeach
            <li class="dropdown avatar-dropdown">
                <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown"
                   aria-expanded="false">+15</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="avatar-group">
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-02.jpg">
                        </a>
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-09.jpg">
                        </a>
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-10.jpg">
                        </a>
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-05.jpg">
                        </a>
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-11.jpg">
                        </a>
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-12.jpg">
                        </a>
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-13.jpg">
                        </a>
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-01.jpg">
                        </a>
                        <a class="avatar avatar-xs" href="#">
                            <img alt="" src="assets/img/profiles/avatar-16.jpg">
                        </a>
                    </div>
                    <div class="avatar-pagination">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </td>
    <td>{{date('d M Y',strtotime($project->end_date))}}</td>
    <td>
        <div class="dropdown action-label">
            <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle"
               data-toggle="dropdown" aria-expanded="false">

                <i
                    class="fa fa-dot-circle-o @if($project->priority === 1){{'text-danger'}} @elseif($project->priority === 2) {{'text-warning'}} @else {{'text-success'}} @endif"></i> @if($project->priority === 1) High @elseif($project->priority === 2) Medium @else Low @endif </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>
                    High</a>
                <a class="dropdown-item" href="#"><i
                        class="fa fa-dot-circle-o text-warning"></i> Medium</a>
                <a class="dropdown-item" href="#"><i
                        class="fa fa-dot-circle-o text-success"></i> Low</a>
            </div>
        </div>
    </td>
    <td>
        <div class="dropdown action-label">
            <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle"
               data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-dot-circle-o text-success"></i> Active </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i
                        class="fa fa-dot-circle-o text-success"></i> Active</a>
                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>
                    Inactive</a>
            </div>
        </div>
    </td>
    <td class="text-right">
        <div class="dropdown dropdown-action">
            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
               aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#" data-toggle="modal"
                   data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-toggle="modal"
                   data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>
@endforeach
