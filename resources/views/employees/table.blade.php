@foreach($employees as $employee)
<tr>
    <td>{{ $employee->employee_id }}</td>
    <td><a href="{{ route('employee-profile' , $employee->employee_id) }}">{{ $employee->name }}</a></td>
    <td>{{ $employee->email }}</td>
    <td>{{ $employee->phone }}</td>
    <td>{{ $employee->department->department_name }}</td>
    <td>{{ $employee->position->position_name }}</td>
    <td>{{ $employee->hire_date }}</td>
    <td>{{ $employee->created_at }}</td>
    <td>{{ $employee->updated_at }}</td>
    <td class="text-right">
        <div class="dropdown dropdown-action">
            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('employees.edit' , $employee->employee_id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#modal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>
@endforeach
