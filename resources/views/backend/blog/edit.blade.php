@extends('layouts.backend.main')

@section('title','My Blog | Edit Post')

@section('content')

    <!-- Start Content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Edit Post</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> DashBoard</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="active">Edit Post</li>
            </ol>
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($post, [
                    'method' => 'PUT',
                    'route'  => ['blog.update', $post->id],
                    'files'  => TRUE,
                    'id' => 'post-form'
                ]) !!}

                @include('backend.blog.form')

                {!! Form::close() !!}
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->

        <!-- /.content -->


    </div>
@endsection

@include('backend.blog.script')