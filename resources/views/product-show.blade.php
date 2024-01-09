@extends('main')

@section('content')

<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">

            @foreach($slideshows as $slideshow)

            <div class="item-slick1" style="background-image: url({{ $slideshow->image_slide }});">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                HOT 2023
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                {{ $slideshow->name }}
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="{{ $slideshow->url }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>


<div id="showproduct" class="row">
    <div class="col-md-4 image-carousel">
        <div>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class=" carousel-indicators">
                    @foreach($p->image as $key => $image)
                    <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
                    @endforeach
                </ul>

                <!-- The slideshow -->
                <div>
                    @foreach($p->image as $key => $image)
                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                        <img src="{{$image}}" alt="image" width="450" height="450" style="border-radius: 10px;" />
                    </div>
                    @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 desc">
        <div class="h2 col-xs-b25" style="-webkit-text-stroke: thin;">{{$p->name}}</div>
        <br>
        <div class="row col-xs-b25">
            <div class="col-sm-6">
                <div class="h4 simple-article size-5 grey">PRICE: <span class="color">{{number_format($p->price, 0, ',', ',')}} đ</span></div>
            </div>
            <div class="col-sm-6 col-sm-text-right">
                <div class="rate-wrapper align-inline">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"> (0 đánh giá)</i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="simple-article size-3 col-xs-b5">ITEM NO. : <span class="grey">{{$p->SKU}}</span></div>
            </div>
            <div class="col-sm-6 col-sm-text-right">
                <div class="simple-article size-3 col-xs-b20"><span class="grey"></span></div>
            </div>
        </div>
        <br>
        <div class="row col-xs-b40">
            <div class="col-sm-3">
                <div class="h6 detail-data-title size-1">Quantity: {{$p->stock}}</div>
            </div>
        </div>
        <div class="simple-article size-3 col-xs-b30">{{$p->description}}</div>

        <div class="row m5 col-xs-b40">
            <div class="col-md5">
            </div>
            <div class="submitform">
                <div class="">
                    <form action="{{ route('cart/add', ['product_id' => $p->id]) }}" method="GET">
                        <button type="submit" class="addtocart">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                        </button>
                    </form>
                </div>
                <div class="">
                    <form action="#" method="GET">
                        <button type="submit" class="buynow">
                            Buy Now
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md4 cmt">
        <div>
            <h5>Comment </h5>
            <form action="#" method="post">

                <input type="text" name="comment" placeholder="Your comment" required="">
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection