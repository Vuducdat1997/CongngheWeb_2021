@extends('users.layout.index')

@section('content')
<main>
    <div class="banner-product">
        <img src="{{asset('user_asset/img/habeco-nangtamvithe.jpg')}}" alt="">
    </div>

    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="share-holder">
                    <h1 class="text-center">Đại hội cổ đông</h1>
                    <table class="table table-hover">
                        <tbody>
                            @foreach($shareholder as $sh)
                            <tr>
                                <td scope="row" class="nowrap_tb">{{$sh->name}}</td>
                                <td>{{$sh->created_at}}</td>
                                <td><a href="{{url('upload/'.$sh->id)}}">Tải về</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection