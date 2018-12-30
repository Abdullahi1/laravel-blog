<table class="table table-bordered table-condesed">
    <thead>
    <tr>
        <th width="50">Action</th>
        <th>Title</th>
        <th>Post Count</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            @if($category->id == config('cms.default_category_id'))
            <td width="70">
                {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id]]) !!}
                <a onclick="return false" title="Edit" class="btn btn-xs btn-default edit-row disabled" href="{{ route('categories.edit', $category->id) }}">
                    <i class="fa fa-edit"></i>
                </a>
                <button onclick="return false" type="submit" title="Delete to Trash" class="btn btn-xs btn-danger delete-row disabled">
                    <i class="fa fa-times"></i>
                </button>
                {!! Form::close() !!}
            </td>
            @else
                <td width="70">
                    {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id]]) !!}
                    <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ route('categories.edit', $category->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="submit" title="Delete to Trash" class="btn btn-xs btn-danger delete-row">
                        <i class="fa fa-times"></i>
                    </button>
                    {!! Form::close() !!}
                </td>



            @endif
            <td>{{$category->title}}</td>
            <td>{{$category->post->count()}}</td>
            {{--<td>{{$category->author->name}}</td>--}}
            {{--<td>{{$category->category->title}}</td>--}}
            {{--<td><abbr title="{{$category -> dateFormatted(true)}}">{{$category->dateFormatted()}}</abbr> |--}}
                {{--{!! $category -> publicationLabel() !!}</td>--}}
        {{--</tr>--}}
    @endforeach
    </tbody>
</table>
