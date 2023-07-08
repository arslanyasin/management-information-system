@foreach($departments as $department)
<tr>
    <td>{{ $department->department_id }}</td>
    <td>{{ $department->department_name }}</td>
    <td>{{ $department->created_at }}</td>
    <td>{{ $department->updated_at }}</td>
    <td width="5%">
        <a href="{{ route('departments.edit' , $department->department_id) }}" id="edit-user">
            <i class="fa fa-pencil-square-o text-primary" aria-hidden="true"></i>
        </a>
        <a data-id="{{ $department->department_id }}" data-href="{{ route('departments-delete') }}" class="deletebtn" href="javascript:void(0)" data-toggle="modal" data-target="#modal">
            <i class="fa fa-trash-o m-r-5 text-danger"></i>
        </a>
    </td>
</tr>
@endforeach
