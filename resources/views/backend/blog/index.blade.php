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
                        <div class="box-header">
                            <div class="pull-left">
                                <a id="add-button" title="Add New" class="btn btn-success" href="form.html"><i class="fa fa-plus-circle"></i> Add New</a>
                            </div>
                            <div class="pull-right">
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
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-condesed">
                                <thead>
                                <tr>
                                    <th width="50">Action</th>
                                    <th>Title</th>
                                    <th width="110">Author</th>
                                    <th width="140">Category</th>
                                    <th width="180">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td width="70">
                                        <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ route('blog.edit', $post->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a title="Delete" class="btn btn-xs btn-danger delete-row" href="{{ route('blog.destroy', $post->id) }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->author->name}}</td>
                                    <td>{{$post->category->title}}</td>
                                    <td><abbr title="{{$post -> dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr> |
                                        {!! $post -> publicationLabel() !!}</td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-left">
                                {{ $posts -> render() }}
                            </ul>
                            <ul class="pull-right">
                                <small>{{ $posts -> count() }} Items</small>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->


    </div>
@endsection
