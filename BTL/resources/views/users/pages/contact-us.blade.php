@extends('users.layout.index')
@section('title','contact')
@section('content')
<main>
    <div class="contact-us">
        <div class="banner-product">
            <img src="{{asset('user_asset/img/banner.jpg')}}" alt="">
        </div>

        <div class="container p-4">
            <h1 class="text-center">LIÊN HỆ</h1>
            <div class="row">
                <div class="col-xl-5 col-md-12 content-right">
                    <p>Với bí quyết công nghệ - truyền thống trăm năm, cùng hệ thống thiết bị hiện đại, đội ngũ cán bộ
                        công
                        nhân viên lành nghề, có trình độ, tâm huyết, các sản phẩm của HABECO đã nhận được sự mến mộ của
                        hàng
                        triệu người tiêu dùng trong nước cũng như quốc tế. Thương hiệu BIA HÀ NỘI ngày hôm nay được xây
                        dựng, kết tinh từ nhiều thế hệ, là niềm tin của người tiêu dùng, niềm tự hào của thương hiệu
                        Việt.
                    </p>
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <span>183 Hoàng Hoa Thám, Ba Đình, Hà Nội</span>
                    </div>
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <span>Hà Nội, Việt Nam</span>
                    </div>
                    <div>
                        <i class="fa fa-phone-square"></i>
                        <span>024.38453843</span>
                    </div>
                    <div>
                        <i class="fa fa-envelope"></i>
                        <span> tuyendung@habeco.com.vn</span>
                    </div>
                    <div id="map-container-google-11" class="" style="height: 400">
                        <iframe src="https://maps.google.com/maps?q=new%20delphi&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-xl-1"></div>
                <div class="col-xl-6 col-md-12 content-left">
                    <form action="{{url('contact-us')}}" onsubmit="return validateForm()" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" class="form-control" aria-describedby="emailHelp"
                                placeholder="Enter Name">
                            <div style="color:red; margin-top:10px">{{$errors->first('name')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                            <div style="color:red; margin-top:10px">{{$errors->first('email')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Enter Project">
                            <div style="color:red; margin-top:10px">{{$errors->first('subject')}}</div>
                        </div>
                        <div class="form-group">
                            <label>Your Message </label>
                            <textarea class="form-control" name="message" rows="8"
                                placeholder="Enter Message"></textarea>
                            <div style="color:red; margin-top:10px">{{$errors->first('message')}}</div>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Lc7xjsbAAAAAKzWOhE7cRuJ0BDIB-LYpVanNG4k"></div>
                            <div style="color:red; margin-top:10px">{{$errors->first('g-recaptcha-response')}}</div>
                        </div>
                        <input class="btn btn-submit" type="submit" value="Gửi">
                        <!-- <button class="btn btn-submit" type="submit">Gửi</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection