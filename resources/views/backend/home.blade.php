@extends('layouts.backend.main')

@section('title','My Blog | Dashboard')

@section('content')

    <!-- Start Content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <h3>Welcome to MyBlog!</h3>
                            <p class="lead text-muted">Hallo {{ Auth::user()->name }}, Welcome to MyBlog</p>

                            <h4>Get started</h4>
                            <p><a href="{{ route('blog.create') }}" class="btn btn-primary">Write your first blog post</a> </p>
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
