@extends('layouts.backend.main')

@section('title','My Blog | Profile')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <div style="padding-left: 10px" class="row">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <?php $posts = $user->post->count(); ?>
                                <h3>{{$posts}}</h3>

                                <p>Personal {{str_plural('Post',$posts)}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/backend/blog?status=own" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    @role(['admin','editor'])
                    <div style="padding-left: 10px" class="row">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <?php $posts = \App\Post::count(); ?>
                                <h3>{{$posts}}</h3>

                                <p>General {{str_plural('Post',$posts)}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('blog.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    @endrole
                    <!-- ./col -->

                </div>

                <div class="col-md-6">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{asset('backend-files/dist/img/user2-160x160.jpg')}}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">{{$user->roles->first()->display_name}}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Slug</b> <a class="pull-right">{{$user->slug}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right">{{$user->email}}</a>
                                </li>
                                {{--<li class="list-group-item">--}}
                                    {{--<b>Friends</b> <a class="pull-right">13,287</a>--}}
                                {{--</li>--}}
                            </ul>

                            {{--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> BIO</strong>

                            <p>{!! Markdown::convertToHtml(e($user->bio)) !!}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-3"></div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
