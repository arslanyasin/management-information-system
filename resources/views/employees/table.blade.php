@foreach($employees as $employee)
<tr>
    <td>{{ $employee->employee_id }}</td>
    <td>{{ $employee->name }}</td>
    <td>{{ $employee->email }}</td>
    <td>{{ $employee->phone }}</td>
    <td>{{ $employee->department->department_name }}</td>
    <td>{{ $employee->position->position_name }}</td>
    <td>{{ $employee->hire_date }}</td>
    <td>{{ $employee->created_at }}</td>
    <td>{{ $employee->updated_at }}</td>
    <td width="5%">
        <a href="{{ route('employees.edit' , $employee->employee_id) }}" id="edit-user">
            <i class="fa fa-pencil-square-o text-primary" aria-hidden="true"></i>
        </a>
        <a data-id="{{ $employee->employee_id }}" data-href="{{ route('employee-delete') }}" class="deletebtn"
           href="javascript:void(0)" data-toggle="modal" data-target="#modal">
            <i class="fa fa-trash-o m-r-5 text-danger"></i>
        </a>
    </td>
</tr>
@endforeach
