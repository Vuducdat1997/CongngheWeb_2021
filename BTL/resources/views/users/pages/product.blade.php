@extends('users.layout.index')
@section('title','Product')
@section('content')

<div class="banner-product">
    <img src="{{asset('user_asset/img/banner.jpg')}}" alt="">
</div>

<div class="main-product">
    <div class="container">
        <div class="title">
            <h2>SẢN PHẨM</h2>
        </div>
        <div class="product-content">
            @foreach($product as $product)
            <div class="pd-intro">
                <img class="pd-intro-banner" src="{{asset('user_asset/img/caocap-bg.png')}}" alt="">
                <div class="row pd-intro-item">
                    <div class="col-5 col-md-7 col-lg-9 col-xl-12">
                        <img class="logo" src="{{asset('upload/product/'.$product->logo)}}" alt="">
                        <a href="{{url('product-detail/'.$product->id)}}"><img
                                src="{{asset('upload/product/'.$product->image)}}" alt=""></a>
                        <p>{{$product->title}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection