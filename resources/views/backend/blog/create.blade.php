@extends('layouts.backend.main')

@section('title','My Blog | Add New Post')

@section('content')

    <!-- Start Content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Add New Post</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> DashBoard</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="active">Add New</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            {!! Form::model($post,[
                        'method' =>'POST',
                        'route' => 'blog.store',
                        'files' => TRUE
                        ]) !!}

                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('title') !!}
                                {!! Form::text('title',null,['class' => 'form-control','placeholder'=>'Title']) !!}

                                @if ($errors->has('title'))
                                    <span class="help-block invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif


                            </div>

                            <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                {!! Form::label('slug') !!}
                                {!! Form::text('slug',null,['class' => 'form-control']) !!}

                                @if ($errors->has('slug'))
                                    <span class="help-block invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif


                            </div>

                            <div class="form-group {{ $errors->has('excerpt') ? ' has-error' : '' }}">
                                {!! Form::label('excerpt') !!}
                                {!! Form::text('excerpt',null,['class' => 'form-control']) !!}

                                @if ($errors->has('excerpt'))
                                    <span class="help-block invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('excerpt') }}</strong>
                                    </span>
                                @endif


                            </div>

                            <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                                {!! Form::label('body') !!}
                                {!! Form::textarea('body',null,['class' => 'form-control']) !!}

                                @if ($errors->has('body'))
                                    <span class="help-block invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif


                            </div>

                            <div class="form-group {{ $errors->has('published_at') ? ' has-error' : '' }}">
                                {!! Form::label('published_at','Publish Date') !!}
                                {!! Form::text('published_at',null,['class' => 'form-control']) !!}

                                @if ($errors->has('published_at'))
                                    <span class="help-block invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('published_at') }}</strong>
                                    </span>
                                @endif


                            </div>

                            <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                {!! Form::label('category_id','Category') !!}
                                {!! Form::select('category_id',App\Category::pluck('title','id'),null,['class' => 'form-control', 'placeholder' => 'Choose Category']) !!}

                                @if ($errors->has('category_id'))
                                    <span class="help-block invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                {!! Form::label('image','Featured Image') !!}
                                {!! Form::file('image',['class' => 'form-control']) !!}

                                @if ($errors->has('image'))
                                    <span class="help-block invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <hr>

                            {!! Form::submit('Create New Post',['class' =>'btn  btn-primary']); !!}

                            {!! Form::close() !!}
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->


    </div>
@endsection
