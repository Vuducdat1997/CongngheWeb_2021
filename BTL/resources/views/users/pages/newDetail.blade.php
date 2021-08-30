@extends('users.layout.index')
@section('title','New')
@section('content')
<main>
    <div class="page-news">
        <div class="banner-product">
            <img src="{{asset('user_asset/img/habeco-nangtamvithe.jpg')}}" alt="">
        </div>

        <div class="container">
            <h1>{!! $news->title !!}</h1>
            <div class="article-info">
                <ul>
                    <li><i class="fas fa-user-friends"></i> Admin </li>
                    <li><i class="fas fa-folder-open"></i> {{$category->name}} </li>
                    <li><i class="fas fa-calendar-alt"></i> {{$news->created_at}} </li>
                </ul>
            </div>
            <div class="content">
                <img width="100%" src="{{url('upload/news')}}/{{$news->image}}" alt="">
                {!! $news->desc !!}
                {!! $news->details !!}
                @if(isset($previous))
                <a href="{{url('new/'.$previous->id)}}/{{$previous->slug}}.html">
                    <button class="btn btn-success">
                        <- Previous</button></a>
                @endif
                @if(isset($next))
                <a href="{{url('new/'.$next->id)}}/{{$next->slug}}.html">
                    <button class="btn btn-success">
                        Next -> </button></a>
                @endif
            </div>
            @include('users.layout.newsDifferent')
        </div>
    </div>
</main>
@endsection