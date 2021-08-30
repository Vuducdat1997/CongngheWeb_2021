@extends('users.layout.index')
@section('title','News')
@section('content')
@include('users.layout.slide')
<main>
    <div class="container">
        @foreach($categories as $category)
        <div class="news">
            <div class="row section-header">
                <div class="col-sm-6">
                    <h2>{{$category->name}}</h2>
                </div>
                <div class="col-sm-6 see-more">
                    <h4><a href="{{url('category')}}/{{$category->id}}/{{$category->slug}}.html">Xem thêm
                            <i>---></i></a></h4>
                </div>
            </div>
            <?php 
                $news = $category->new->where('featured', 0)->where('status', 0)->sortByDesc('created_at')->take(5);
                $new1 = $news->shift();
                $new2 = $news->shift();
                $new3 = $news->shift();
                $new4 = $news->shift();
                $new5 = $news->shift();
            ?>
            <div class="section-content">
                <div class="row">
                    <div class="col-xl-6 content-left">
                        <a href="{{url('new')}}/{{$new1['id']}}/{{$new1['slug']}}.html"><img
                                src="{{asset('upload/news')}}/{{$new1['image']}}" alt=""></a>
                    </div>
                    <div class="col-xl-6 col-md-12 content-right">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 content-right-image">
                                <a href="{{url('new')}}/{{$new2['id']}}/{{$new2['slug']}}.html"><img
                                        src="{{asset('upload/news')}}/{{$new2['image']}}" alt=""></a>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6 content-right-title">
                                <h5>{{$category->name}}</h5>
                                <a class="title"
                                    href="{{url('new')}}/{{$new2['id']}}/{{$new2['slug']}}.html">{{$new2['title']}}</a><br>
                                <button><a href="{{url('new')}}/{{$new2['id']}}/{{$new1['slug']}}.html">Chi
                                        tiết</a></button>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6 content-right-title">
                                <h5>{{$category->name}}</h5>
                                <a class="title"
                                    href="{{url('new')}}/{{$new3['id']}}/{{$new3['slug']}}.html">{{$new3['title']}}</a><br>
                                <button><a href="{{url('new')}}/{{$new3['id']}}/{{$new3['slug']}}.html">Chi
                                        tiết</a></button>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6 content-right-image">
                                <a href="{{url('new')}}/{{$new3['id']}}/{{$new3['slug']}}.html"><img
                                        src="{{asset('upload/news')}}/{{$new3['image']}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-sm-6 content-right-image">
                        <a href="{{url('new')}}/{{$new4['id']}}/{{$new4['slug']}}.html"><img
                                src="{{asset('upload/news')}}/{{$new4['image']}}" alt=""></a>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 content-right-title">
                        <h5>{{$category->name}}</h5>
                        <a class="title"
                            href="{{url('new')}}/{{$new4['id']}}/{{$new4['slug']}}.html">{{$new4['title']}}</a><br>
                        <button><a href="{{url('new')}}/{{$new4['id']}}/{{$new4['slug']}}.html">Chi tiết</a></button>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 content-right-image">
                        <a href="{{url('new')}}/{{$new5['id']}}/{{$new5['slug']}}.html"><img
                                src="{{asset('upload/news')}}/{{$new5['image']}}" alt=""></a>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 content-right-title">
                        <h5>{{$category->name}}</h5>
                        <a class="title"
                            href="{{url('new')}}/{{$new5['id']}}/{{$new5['slug']}}.html">{{$new3['title']}}</a><br>
                        <button><a href="{{url('new')}}/{{$new5['id']}}/{{$new5['slug']}}.html">Chi tiết</a></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>


@endsection