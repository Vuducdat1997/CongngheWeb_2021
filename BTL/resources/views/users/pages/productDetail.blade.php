@extends('users.layout.index')
@section('title','Product')
@section('content')

<div class="banner-product">
    <img src="{{asset('upload/product/'.$product->banner)}}" alt="">
</div>

<div class="container">
    <div class="product-detail">
        <div class="logo">
            <img src="{{asset('upload/product/'.$product->logo)}}" alt="">
            <p>{{$product->describe}}</p>
        </div>
        <div class="content">
            <img class="content-banner" src="{{asset('user_asset/img/section-bg.png')}}" alt="">
            <div class="row content-detail">
                <div class="col-md-6 img">
                    <img src="{{asset('upload/product/'.$product->image)}}" alt="">
                </div>
                <div class="col-md-6 detail">
                    <h3>BIA LON TRÚC BẠCH</h3>
                    <div class="row info-beer">
                        <div class="col-md-4">
                            <img src="{{asset('user_asset/img/detail-icon.png')}}" alt="">
                            <p>Dung tích</p>
                            <span>{{$product->capacity}}</span>
                        </div>
                        <div class="col-md-4">
                            <img src="{{asset('user_asset/img/detail-icon.png')}}" alt="">
                            <p>Thùng giấy</p>
                            <span>{{$product->plastic_box}}</span>
                        </div>
                        <div class="col-md-4">
                            <img src="{{asset('user_asset/img/detail-icon.png')}}" alt="">
                            <p>Nồng độ cồn</p>
                            <span>{{$product->concentration}}</span>
                        </div>
                    </div>
                    <div class="content-detail-beer">
                        <p>{!! $product->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection