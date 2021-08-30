@extends('users.layout.index')
@section('title','About-us')
@section('content')
<main>
    @include('users.layout.slide')
    <div class="container">
        <div class="aboutus">
            <div class="aboutus-title ">
                <h2 class="text-center">Tổng quan</h2>
                <div class="row">
                    <div class="col ">
                        <img class="img-thumbnail" src="{{asset('user_asset/img/Tong-quan-jpg.JPG')}}" alt="" style="">
                        <p>Tiền thân của <Strong>Tổng công ty Cổ phần Bia - Rượu - Nước giải khát Hà Nội</Strong> là Nhà
                            máy bia Hommel được người Pháp xây dựng từ năm 1890, là khởi đầu cho một dòng chảy nhỏ bé
                            cùng song hành với những thăng trầm của Thăng Long - Hà Nội. Ngày 15/8/1958, trong không khí
                            cả nước sôi sục chào mừng kỷ niệm 13 năm Cách mạng Tháng Tám thành công, khai sinh ra nước
                            Việt Nam Dân chủ Cộng hòa, bốn năm Thủ đô hoàn toàn giải phóng; chai bia Việt Nam đầu tiên
                            mang nhãn hiệu Trúc Bạch ra đời trong niềm vui xúc động lớn lao của cán bộ công nhân viên
                            Nhà máy.</p>
                    </div>
                    <div class="col">
                        <p>Một sản phẩm khẳng định quyền làm chủ của người lao động, phục vụ nhu cầu thiết yếu của xã
                            hội trong giai đoạn khôi phục và phát triển. Từ cột mốc này, Nhà máy bước vào thời kỳ mới –
                            thời kỳ khẳng định thương hiệu của ngành Công nghiệp nước ta nói chung và ngành Đồ uống nói
                            riêng, là niềm tự hào của Hà Nội và cả nước. Từ đó trở đi, ngày 15/8 hàng năm được chọn là
                            Ngày truyền thống của Bia Hà Nội.</p>
                        <p>Ngày 6/5/2003, Bộ trường Bộ Công nghiệp (nay là Bộ Công Thương) có Quyết định số
                            75/2003/QĐ-BCN thành lập Tổng công ty Bia - Rượu - Nước giải khát Hà Nội (viết tắt là
                            HABECO). Từ ngày 16/6/2008, Tổng công ty chính thức chuyển đổi mô hình tổ chức từ một Tổng
                            Công ty Nhà nước sang Tổng Công ty Cổ phần. Đây là bước ngoặt quan trọng để Bia Hà Nội khẳng
                            định vị thế của mình trong giai đoạn hội nhập.</p>
                        <p>Trải qua gần 130 năm lịch sử với hơn nửa thế kỷ khôi phục và phát triển, đến nay, Habeco đã
                            trở thành một trong các doanh nghiệp hàng đầu của ngành Đồ uống Việt Nam.</p>
                    </div>
                    <div class="col">
                        <p>Những dòng sản phẩm nổi tiếng làm nên thương hiệu Habeco như Bia hơi Hà Nội, Bia lon Hà Nội,
                            Bia Trúc Bạch, Hanoi Beer Premium… đã nhận được sự tin yêu của người tiêu dùng về cả chất
                            lượng và phong cách, chinh phục những người sành bia trong và ngoài nước.</p>
                        <p>Với bí quyết công nghệ - truyền thống trăm năm, cùng hệ thống thiết bị hiện đại, đội ngũ cán
                            bộ công nhân viên lành nghề, có trình độ, tâm huyết, các sản phẩm của HABECO đã nhận được sự
                            mến mộ của hàng triệu người tiêu dùng trong nước cũng như quốc tế. Thương hiệu BIA HÀ NỘI
                            ngày hôm nay được xây dựng, kết tinh từ nhiều thế hệ, là niềm tin của người tiêu dùng, niềm
                            tự hào của thương hiệu Việt.</p>
                        <p>Với sức vươn lên mạnh mẽ của một cây đại thụ trong ngành nước giải khát Việt Nam, các sản
                            phẩm của HABECO được phân phối rộng rãi tới không chỉ ở thị trường trong nước mà cả tại các
                            thị trường nước ngoài như Đài Loan, Hàn Quốc, Anh, Đức, Mỹ, Australia, cùng nhiều quốc gia
                            khác trên thế giới.</p>
                    </div>
                </div>
            </div>

            <div class="aboutus-title">
                <h2 class="text-center">Lịch sử phát triển</h2>
                <div class="container my-4">
                    <!--Carousel Wrapper-->
                    <div id="multi-item-1" class="carousel slide carousel-multi-item" data-ride="carousel">

                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mb-2">
                                            <img class="card-img-top"
                                                src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                                                alt="Card image cap">
                                            <div class="card-body" style="height: 200px;">
                                                <h4 class="card-title text-center">Năm 2010</h4>
                                                <p class="card-text">Cổ phần hóa, chuyển đổi mô hình hoạt động thành
                                                    Công ty cổ phần. 50 năm xây dựng và phát triển</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 clearfix d-none d-md-block">
                                        <div class="card mb-2">
                                            <img class="card-img-top"
                                                src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                                alt="Card image cap">
                                            <div class="card-body" style="height: 200px;">
                                                <h4 class="card-title text-center">Năm 2009</h4>
                                                <p class="card-text">Ký kết hợp tác chiến lược với tập đoàn bia
                                                    Carlsberg</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 clearfix d-none d-md-block">
                                        <div class="card mb-2">
                                            <img class="card-img-top"
                                                src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
                                                alt="Card image cap">
                                            <div class="card-body" style="height: 200px;">
                                                <h4 class="card-title text-center">Năm 2003</h4>
                                                <p class="card-text">Thành lập Tổng Công ty Bia – Rượu – NGK Hà Nội theo
                                                    Quyết định số 75/2003/QĐ-BCN ngày 6/5/2003</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mb-2">
                                            <img class="card-img-top"
                                                src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                                                alt="Card image cap">
                                            <div class="card-body" style="height: 200px;">
                                                <h4 class="card-title text-center">Năm 2010</h4>
                                                <p class="card-text">Cổ phần hóa, chuyển đổi mô hình hoạt động thành
                                                    Công ty cổ phần. 50 năm xây dựng và phát triển</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 clearfix d-none d-md-block">
                                        <div class="card mb-2">
                                            <img class="card-img-top"
                                                src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                                alt="Card image cap">
                                            <div class="card-body" style="height: 200px;">
                                                <h4 class="card-title text-center">Năm 2009</h4>
                                                <p class="card-text">Ký kết hợp tác chiến lược với tập đoàn bia
                                                    Carlsberg</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 clearfix d-none d-md-block">
                                        <div class="card mb-2">
                                            <img class="card-img-top"
                                                src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
                                                alt="Card image cap">
                                            <div class="card-body" style="height: 200px;">
                                                <h4 class="card-title text-center">Năm 2003</h4>
                                                <p class="card-text">Thành lập Tổng Công ty Bia – Rượu – NGK Hà Nội
                                                    theo Quyết định số 75/2003/QĐ-BCN ngày 6/5/2003</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--/.Second slide-->

                        </div>
                        <!--/.Slides-->
                        <a class="carousel-control-prev" href="#multi-item-1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#multi-item-1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--/.Carousel Wrapper-->
                </div>
            </div>

            <div class="aboutus-title">
                <h2 class="text-center">Thành tưu chứng nhận</h2>
                <div id="" class="carousel slide carousel-multi-item" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <img class="card-img-top"
                                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                                            alt="Card image cap">
                                        <div class="card-body" style="height: 200px;">
                                            <h4 class="card-title text-center">Năm 2010</h4>
                                            <p class="card-text">Cổ phần hóa, chuyển đổi mô hình hoạt động thành
                                                Công ty cổ phần. 50 năm xây dựng và phát triển</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2">
                                        <img class="card-img-top"
                                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                            alt="Card image cap">
                                        <div class="card-body" style="height: 200px;">
                                            <h4 class="card-title text-center">Năm 2009</h4>
                                            <p class="card-text">Ký kết hợp tác chiến lược với tập đoàn bia
                                                Carlsberg</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2">
                                        <img class="card-img-top"
                                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
                                            alt="Card image cap">
                                        <div class="card-body" style="height: 200px;">
                                            <h4 class="card-title text-center">Năm 2003</h4>
                                            <p class="card-text">Thành lập Tổng Công ty Bia – Rượu – NGK Hà Nội
                                                theo Quyết định số 75/2003/QĐ-BCN ngày 6/5/2003</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.First slide-->
                    </div>
                    <a class="carousel-control-prev" href="" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="aboutus-title">
                <h2 class="text-center">Đơn vị thành viên</h2>
                <!--  ======================== SLIDE Ngang ==============================  -->

                <section class="about-area">
                    <div class="container text-center my-3">
                        <div class="row mx-auto my-auto">
                            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                                <div class="carousel-inner w-100" role="listbox">
                                    <div class="carousel-item active">
                                        <img width="900" height="1200" class="d-block col-3 img-fluid"
                                            src="{{asset('user_asset/img/habeco.png')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block col-3 img-fluid"
                                            src="{{asset('user_asset/img/habeco.png')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block col-3 img-fluid"
                                            src="{{asset('user_asset/img/habeco.png')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block col-3 img-fluid"
                                            src="{{asset('user_asset/img/habeco.png')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block col-3 img-fluid"
                                            src="{{asset('user_asset/img/habeco.png')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block col-3 img-fluid"
                                            src="{{asset('user_asset/img/habeco.png')}}">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block col-3 img-fluid"
                                            src="{{asset('user_asset/img/habeco.png')}}">
                                    </div>

                                </div>
                                <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!--  ======================== SLIDE Ngang ==============================  -->
            </div>

        </div>

    </div>
</main>


@endsection
<script>
    $('#recipeCarousel').carousel({
    interval :2000
  });
  
  $('main .aboutus .aboutus-title .about-area .carousel .carousel-item').each(function(){
      var next = $(this).next();
      if (!next.length) {
      next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      
      for (var i=0;i<2;i++) {
          next=next.next();
          if (!next.length) {
              next = $(this).siblings(':first');
            }
          
          next.children(':first-child').clone().appendTo($(this));
        }
  });
</script>