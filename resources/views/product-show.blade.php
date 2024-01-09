@extends('main')

@section('content')
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
                        <img src="{{$image}}" alt="image" width="450" height="450" />
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
            <div class="">
                <a class="button size-2 style-2 block" href="#">
                    <span class="button-wrapper">
                        <span class="btn btn-success addcart"><i class="zmdi zmdi-shopping-cart"></i>Add to cart</span>
                    </span>
                </a>
                <a class="button size-2 style-2 block" href="#">
                    <span class="button-wrapper">
                        <button class="btn btn-danger" type="button" id="buyNow">Buy</button>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md4 cmt">
        <div>
            <h5>Comment </h5>
            <form action="#" method="post">

                <input type="text" name="comment" placeholder="Your comment">
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection