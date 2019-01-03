@extends('layouts.backend.main')

@section('title','My Blog | Edit Post')

@section('content')

    <!-- Start Content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Edit User</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> DashBoard</a></li>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li class="active">Edit User</li>
            </ol>
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($user, [
                    'method' => 'PUT',
                    'route'  => ['users.update', $user->id],
                    'files'  => TRUE,
                    'id' => 'users-form'
                ]) !!}

                @include('backend.users.form')

                {!! Form::close() !!}
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->

        <!-- /.content -->


    </div>
@endsection

@include('backend.users.script')