<table class="table table-bordered table-condesed">
    <thead>
    <tr>
        <th width="50">Action</th>
        <th>Title</th>
        <th width="110">Author</th>
        <th width="140">Category</th>
        <th width="180">Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td width="70">
                {!! Form::open(['style' =>'display:inline-block' ,'method' => 'PUT','route' => ['blog.restore', $post->id]]) !!}
                <button type="submit" title="Restore" class="btn btn-xs btn-default edit-row">
                    <i class="fa fa-refresh"></i>
                </button>
                {!! Form::close() !!}

                {!! Form::open(['style' =>'display:inline-block','method' => 'DELETE','route' => ['blog.force-destroy', $post->id]]) !!}
                <button type="submit" title="Delete Permanently" class="btn btn-xs btn-danger delete-row">
                    <i class="fa fa-times"></i>
                </button>
                {!! Form::close() !!}
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->author->name}}</td>
            <td>{{$post->category->title}}</td>
            <td><abbr title="{{$post -> dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr> |
                {{--{!! $post -> publicationLabel() !!}</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
