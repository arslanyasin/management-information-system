@foreach($positions as $position)
<tr>
    <td>{{ $position->id }}</td>
    <td>{{ $position->position_name }}</td>
    <td>{{ $position->department->department_name }}</td>
    <td>{{ $position->created_at }}</td>
    <td>{{ $position->updated_at }}</td>
    <td width="5%">
        <a href="{{ route('positions.edit' , $position->id) }}" id="edit-user">
            <i class="fa fa-pencil-square-o text-primary" aria-hidden="true"></i>
        </a>
        <a data-id="{{ $position->id }}" data-href="{{ route('positions-delete') }}" class="deletebtn" href="javascript:void(0)" data-toggle="modal" data-target="#modal">
            <i class="fa fa-trash-o m-r-5 text-danger"></i>
        </a>
    </td>
</tr>
@endforeach
