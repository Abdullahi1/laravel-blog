@extends('layouts.backend.main')

@section('title','My Blog | Categories')

@section('content')

    <!-- Start Content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Display All Blog Categories</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> DashBoard</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li class="active">All Categories</li>
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
                                <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('categories.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
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

                            @include('backend.categories.message')

                            @if(! $categories -> count())
                            <div class="alert alert-danger text-align">
                                <strong>No Category Available</strong>
                            </div>
                            @else
                                        @include('backend.categories.table')
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix ">
                            <div class="pull-left">
                            <ul class="pagination pagination-sm no-margin ">
                                {{ $categories ->appends( Request::query())-> render() }}
                            </ul>
                            </div>


                            <div class="pull-right">
                                <small>{{ $categories -> count() }} {{str_plural('Category',$categories -> count())}}</small>
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
