@extends('main')

@section('content')
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>


<div id="showproduct" class="row">
    <div class="col-md-4 image-carousel mr-2">
        @foreach($p->image as $image)
        <img id="img" src="{{$image}}" alt="image" />
        @endforeach
    </div>

    <div class="col-md-4 desc">
        <div class="h2 col-xs-b25" style="-webkit-text-stroke: thin;">{{$p->name}}</div>
        <div class="row col-xs-b25">
            <div class="col-sm-6">
                <div class="simple-article size-5 grey">PRICE: <span class="color">{{number_format($p->price, 0, ',', ',')}} đ</span></div>
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
                <div class="simple-article size-3 col-xs-b5">ITEM NO.: <span class="grey">{{$p->SKU}}</span></div>
            </div>
            <div class="col-sm-6 col-sm-text-right">
                <div class="simple-article size-3 col-xs-b20"><span class="grey"></span></div>
            </div>
        </div>
        <div class="simple-article size-3 col-xs-b30">{{$p->description}}</div>
        <div class="row col-xs-b40">
            <div class="col-sm-3">
                <div class="h6 detail-data-title size-1">Quantity: {{$p->stock}}</div>
            </div>
        </div>
        <div class="row m5 col-xs-b40">
            <div class="col-sm-6 col-xs-b10 col-sm-b0">
                <a class="button size-2 style-2 block" href="#">
                    <span class="button-wrapper">
                        <span class="icon"><img src="img/icon-2.png" alt=""></span>
                        <span class="text"><i class="zmdi zmdi-shopping-cart"></i> Add to cart</span>
                    </span>
                </a>
            </div>

        </div>
        <button class="btn btn-danger" type="button" id="buyNow">Buy</button>
    </div>

    <div class="col-md-4 cmt" style="margin-top: auto;">
        <div>
            <span>Comment </span>
            <form action="#" method="post">

                <input type="text" placeholder="your comment">
                <button type="button" value="">Send</button>
            </form>
        </div>
    </div>
</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection