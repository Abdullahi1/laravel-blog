@extends('layouts.backend.main')

@section('title','My Blog | Users')

@section('content')

    <!-- Start Content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Display All Users</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> DashBoard</a></li>
                <li><a href="{{ route('blog.index') }}">Users</a></li>
                <li class="active">All Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="clearfix">
                                <div class="pull-left">
                                <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('users.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                            </div>
                                <div class="pull-right">
                                    {{--<a href="?status=all">All</a> |--}}
                                    {{--<a href="?status=published">Published</a> |--}}
                                    {{--<a href="?status=scheduled">Scheduled</a> |--}}
                                    {{--<a href="?status=draft">Draft</a> |--}}
                                    {{--<a href="?status=trash">Trash</a>--}}
                                    <form accept-charset="utf-8" method="post" class="form-inline" id="form-filter" action="#">
                                    <div class="input-group">
                                        <input type="hidden" name="search">
                                        <input type="text" name="keywords" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search..." value="">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default search-btn" type="button"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            {{--@if(session('message'))--}}
                                {{--<div class="alert alert-info text-align">--}}
                                    {{--<strong>{{ session('message') }}</strong>--}}
                                {{--</div>--}}
                            {{--@endif--}}

                            @include('backend.users.message')

                            @if(! $users -> count())
                            <div class="alert alert-danger text-align">
                                <strong>No User Available</strong>
                            </div>
                            @else
                                        @include('backend.users.table')
                                @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix ">
                            <div class="pull-left">
                            <ul class="pagination pagination-sm no-margin ">
                                {{ $users ->appends( Request::query())-> render() }}
                            </ul>
                            </div>


                            <div class="pull-right">
                                <small>{{ $users -> count() }} {{str_plural('User',$users -> count())}}</small>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

    {{--<script type="text/javascript">--}}
        {{--document.addEventListener('DOMContentLoaded',function (e) {--}}
            {{--if (e.target.classList.contains('alert-info')){--}}
                {{--console.log('Hello Nigeria')--}}
                {{--setTimeout(function () {--}}
                    {{--document.querySelector('.alert-info').remove()--}}
                {{--},3000);--}}

        {{--}--}}
        {{--});--}}
    {{--</script>--}}
@endsection
