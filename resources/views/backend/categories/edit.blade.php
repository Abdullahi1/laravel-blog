@extends('layouts.backend.main')

@section('title','My Blog | Edit Category')

@section('content')

    <!-- Start Content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Edit Category</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> DashBoard</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li class="active">Edit Category</li>
            </ol>
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($category, [
                    'method' => 'PUT',
                    'route'  => ['categories.update', $category->id],
                    'files'  => TRUE,
                    'id' => 'post-form'
                ]) !!}

                @include('backend.categories.form')

                {!! Form::close() !!}
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->

        <!-- /.content -->


    </div>
@endsection

@include('backend.blog.script')