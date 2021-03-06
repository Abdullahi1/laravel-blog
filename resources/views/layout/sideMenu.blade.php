<div class="col-md-4">
    <aside class="right-sidebar">
        <div class="search-widget">
            <form action="{{ route('blog') }}">
            <div class="input-group">
                <input type="text" class="form-control input-lg" name="q" value="{{request('q')}}" placeholder="Search for...">
                <span class="input-group-btn">
                            <button class="btn btn-lg btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                          </span>
            </div>
            </form>
                <!-- /input-group -->
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{route('category',$category->slug)}}"><i class="fa fa-angle-right"></i> {{$category -> title}}</a>
                        <span class="badge pull-right">{{$category -> post -> count()}}</span>
                    </li>
                    @endforeach
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-angle-right"></i> Web Design</a>--}}
                        {{--<span class="badge pull-right">10</span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-angle-right"></i> General</a>--}}
                        {{--<span class="badge pull-right">10</span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-angle-right"></i> DIY</a>--}}
                        {{--<span class="badge pull-right">10</span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-angle-right"></i> Facebook Development</a>--}}
                        {{--<span class="badge pull-right">10</span>--}}
                    {{--</li>--}}


                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach($popularPosts as $popularPost)
                    <li>
                        @if($popularPost->image_url)
                        <div class="post-image">
                            <a href="{{ route('blog.check',$popularPost->slug ) }}">
                                <img src="{{$popularPost->image_url}}" />
                            </a>
                        </div>
                        @endif
                        <div class="post-body">
                            <h6><a href="{{ route('blog.check',$popularPost->slug ) }}">{{$popularPost -> title}}</a></h6>
                            <div class="post-meta">
                                <span>{{$popularPost -> date}}</span>
                            </div>
                        </div>
                    </li>
                        @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    @foreach($tags as $tag)
                    <li><a href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>

    </aside>
</div>