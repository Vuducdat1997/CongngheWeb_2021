<div id="slide">
    <div id="carouselExampleDark" class="carousel carousel-dark slide multi-item-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php $i=0; ?>
            @foreach($slide as $sl)
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$i}}" aria-current="true"
                aria-label="Slide 1" @if($i==0) class="active" @endif></button>
            <?php $i++; ?>
            @endforeach

        </div>
        <div class="carousel-inner">
            <?php $i=0; ?>
            @foreach($slide as $sl)
            <div @if($i==0) class="carousel-item active" @else class="carousel-item" @endif data-bs-interval="10000">
                <?php $i++; ?>
                <img src="{{asset('/upload/slide/'.$sl -> image)}}" class="d-block w-100" alt="">
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>