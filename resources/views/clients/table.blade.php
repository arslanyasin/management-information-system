@foreach($clients as $client)
<tr>
    <td>
        <h2 class="table-avatar">
            <a href="{{ route('clients-profile' , $client->id) }}" class="avatar"><img
                    src="{{asset('assets/img/profiles/avatar-02.jpg')}}" alt=""></a>
            <a href="{{ route('clients-profile' , $client->id) }}">{{ $client->first_name . ' ' . $client->last_name }}</a>
        </h2>
    </td>
    <td>{{ $client->client_id }}</td>
    <td>{{ $client->contact_person }}</td>
    <td>{{ $client->user->email }}</td>
    <td>{{ $client->phone }}</td>
    <td>
        <div class="dropdown action-label">
            <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle"
               data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-dot-circle-o {{$client->status == 1 ? 'text-success':'text-danger' }}"></i>
                {{$client->status == 1 ? 'Active':'Inactive' }} </a>
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
                <a class="dropdown-item" href="{{ route('clients.edit' , $client->id) }}"
                   data-toggle="modal"
                   data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a data-id="{{ $client->id }}" data-href="{{ route('clients-delete') }}"
                   class="deletebtn dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#modal"><i
                        class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>
@endforeach
