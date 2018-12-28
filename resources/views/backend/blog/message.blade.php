@if(session('message'))
    <div class="alert alert-info text-align">
        <strong>{{ session('message') }}</strong>
    </div>

    @elseif(session('trash-message'))
    <?php list($message,$postID) = session('trash-message') ?>
    {!! Form::open(['method' => 'PUT', 'route' => ['blog.restore',$postID]]) !!}
    <div class="alert alert-info text-align">
        <strong>{{ $message }}</strong>
        <button type="submit">UNDO</button>
    </div>
    {!! Form::close() !!}
@endif