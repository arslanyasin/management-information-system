@foreach($users as $user)
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->created_at }}</td>
    <td>{{ $user->updated_at }}</td>
    <td width="5%">
        <a href="{{ route('users.edit' , $user->id) }}" id="edit-user">
            <i class="fa fa-pencil-square-o text-primary" aria-hidden="true"></i>
        </a>
        <a data-id="{{ $user->id }}" data-href="{{ route('users-delete') }}" class="deletebtn" href="javascript:void(0)" data-toggle="modal" data-target="#modal">
            <i class="fa fa-trash-o m-r-5 text-danger"></i>
        </a>
    </td>
</tr>
@endforeach
