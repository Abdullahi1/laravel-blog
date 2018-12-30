@extends('layouts.backend.main')

@section('title','My Blog | Add New Category')

@section('content')

    <!-- Start Content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Add Category</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> DashBoard</a></li>
                <li><a href="{{ route('blog.index') }}">Categories</a></li>
                <li class="active">Add New</li>
            </ol>
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($category, [
                    'method' => 'POST',
                    'route'  => 'categories.store',
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

@include('backend.categories.script')