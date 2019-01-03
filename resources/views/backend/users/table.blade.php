<table class="table table-bordered table-condesed">
    <thead>
    <tr>
        <th width="50">Action</th>
        <th>Name</th>
        <th>Email</th>
        <th width="110">Role</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            @if($user->id == config('cms.default_user_id') || $user->id == auth()->user()->id )
                <td width="70">
                    {!! Form::open(['method' => 'GET','route' => ['users.confirm', $user->id]]) !!}
                    <a onclick="return false" title="Edit" class="btn btn-xs btn-default edit-row disabled" href="{{ route('users.edit', $user->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button onclick="return false" type="submit" title="Delete to Trash" class="btn btn-xs btn-danger delete-row disabled">
                        <i class="fa fa-times"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
            @else
                <td width="70">
                    {!! Form::open(['method' => 'GET','route' => ['users.confirm', $user->id]]) !!}
                    <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ route('users.edit', $user->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="submit" title="Delete to Trash" class="btn btn-xs btn-danger delete-row">
                        <i class="fa fa-times"></i>
                    </button>
                    {!! Form::close() !!}
                </td>



            @endif
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
