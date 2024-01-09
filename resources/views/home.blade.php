@extends('main')

@section('content')

<!-- Slider --> <!-- slide show ạ -->
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

<!-- Banner --> <!-- mấy cái producttype ở đây, nếu không thích có thể bỏ -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>

<!-- Product -->
{{-- <section class="bg0 p-t-23 p-b-140">
    {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../slider/141270.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../slider/kids_banner.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../slider/slider_1.webp" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            <div class="filter-group">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1 product-type-filter" data-filter="*">
                    All Products
                </button>

                 @foreach($productType as $type)
                <label class="filter-label">
                    <input type="checkbox" class="product-type-filter" value="{{ $type->id }}"> {{ $type->name }}
</label>
@endforeach
</div>
</div>
</div>
<div id="loadProduct">
    <div class="row product">
        @foreach($lst as $p)
        <div class="col-md-3 boder">
            <a href="{{route('product-show',['product'=>$p])}}">
                <img class="productImage" src="{{$p->image[0]}}" alt="Image 1">
                <h4>{{ strlen($p->name) > 25 ? substr($p->name, 0, 25).'..' : $p->name }}</h4>
                <p>{{ number_format($p->price, 0, ',', ',') }} đ</p><br>
            </a><br>
            <form action="{{ route('cart/add', ['product_id' => $p->id]) }}" method="GET" style="display: inline;">
                <button type="submit">
                    <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
<div style="justify-content: center;" class="pagination">
    {{ $lst->links() }}
</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</section> --}}

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>
            </div>
        </div>

        <div id="loadProduct">
            @include('products.list') <!--load hình ảnh lên tại đây ạ -->
        </div>


        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
            <input type="hidden" value="1" id="page">
            <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</section>
@endsection