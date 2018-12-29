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
                {!! Form::open(['method' => 'DELETE','route' => ['blog.destroy', $post->id]]) !!}
                <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ route('blog.edit', $post->id) }}">
                    <i class="fa fa-edit"></i>
                </a>
                <button type="submit" title="Delete" class="btn btn-xs btn-danger delete-row">
                    <i class="fa fa-times"></i>
                </button>
                {!! Form::close() !!}
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->author->name}}</td>
            <td>{{$post->category->title}}</td>
            <td><abbr title="{{$post -> dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr> |
                {!! $post -> publicationLabel() !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
