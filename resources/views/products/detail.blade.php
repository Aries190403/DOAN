@extends('main')
@section('content')
<div class="container p-t-80">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/producttype/{{ $product->producttype->id }}-{{ Str::slug($product->producttype->name) }}.html" class="stext-109 cl8 hov-cl1 trans-04">
            {{ $product->producttype->name }}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $title }}
        </span>
    </div>
</div>

<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots">
                            <ul class="slick3-dots" style="" role="tablist">
                                @foreach($product->productimages as $index => $productimage)
                                <li data-index="{{ $index }}" class="thumbnail-dot slick-dot {{ $index === 0 ? 'slick-active' : '' }}">
                                    <img src="{{ $productimage->image_path }}" value="{{ $productimage->product_id }}">
                                    <div class="slick3-dot-overlay"></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="wrap-slick3-arrows flex-sb-m flex-w">
                            <button class="arrow-slick3 prev-slick3 slick-arrow" style=""><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                            <button class="arrow-slick3 next-slick3 slick-arrow" style=""><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </div>

                        <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 1539px;">
                                    @foreach($product->productimages as $index => $productimage)
                                    <div class="item-slick3 slick-slide {{ $index === 0 ? 'slick-current slick-active' : '' }}" data-file="{{ $productimage->image_path }}" data-slick-index="{{ $index }}" aria-hidden="{{ $index !== 0 ? 'true' : 'false' }}" style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ $productimage->image_path }}" alt="IMG-PRODUCT" class="slick-img">
                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ $productimage->image_path }}" tabindex="0">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="container p-t-80">
                                        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                                            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                                                Home
                                                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                                            </a>

                                            <a href="/producttype/{{ $product->producttype->id }}-{{ Str::slug($product->producttype->name) }}.html" class="stext-109 cl8 hov-cl1 trans-04">
                                                {{ $product->producttype->name }}
                                                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                                            </a>

                                            <span class="stext-109 cl4">
                                                {{ $title }}
                                            </span>
                                        </div>
                                    </div>

                                    <section class="sec-product-detail bg0 p-t-65 p-b-60">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-7 p-b-30">
                                                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                                                        <div class="wrap-slick3 flex-sb flex-w">
                                                            <div class="wrap-slick3-dots">
                                                                <ul class="slick3-dots" style="" role="tablist">
                                                                    @foreach($product->productimages as $index => $productimage)
                                                                    <li data-index="{{ $index }}" class="thumbnail-dot {{ $index === 0 ? 'slick-active' : '' }}">
                                                                        <img src="{{ $productimage->image_path }}" value="{{ $productimage->product_id }}">
                                                                        <div class="slick3-dot-overlay"></div>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>

                                                            <div class="wrap-slick3-arrows flex-sb-m flex-w">
                                                                <button class="arrow-slick3 prev-slick3 slick-arrow" style=""><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                                                <button class="arrow-slick3 next-slick3 slick-arrow" style=""><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                                            </div>

                                                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                                                <div class="slick-list draggable">
                                                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                                                        @foreach($product->productimages as $index => $productimage)
                                                                        <div class="item-slick3 slick-slide {{ $index === 0 ? 'slick-current slick-active' : '' }} thumbnail-item" data-file="{{ $productimage->image_path }}" data-slick-index="{{ $index }}" aria-hidden="false" style="width: 513px; position: relative; left: {{ $index * 513 }}px; top: 0px; z-index: 999; opacity: 1;" tabindex="{{ $index }}" role="tabpanel" id="slick-slide{{ $index + 10 }}" aria-describedby="slick-slide-control{{ $index + 10 }}">
                                                                            <div class="wrap-pic-w pos-relative">
                                                                                <img src="{{ $productimage->image_path }}" value="{{ $productimage->product_id }}" alt="IMG-PRODUCT">
                                                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ $productimage->image_path }}" tabindex="{{ $index }}">
                                                                                    <i class="fa fa-expand"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Thêm đoạn mã JavaScript sau thư viện Slick Slider và jQuery -->
                                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

                                            <script>
                                                $(document).ready(function() {
                                                    $('.slick-dot').on('click', function() {
                                                        var index = $(this).data('index');

                                                        // Loại bỏ class 'slick-current' và 'slick-active' từ tất cả các hình ảnh
                                                        $('.slick3 .slick-slide').removeClass('slick-current slick-active');

                                                        // Thêm class 'slick-current' và 'slick-active' cho hình ảnh được chọn
                                                        $('.slick3 .slick-slide[data-slick-index="' + index + '"]').addClass('slick-current slick-active');
                                                    });
                                                });
                                            </script>

                                            <div class="col-md-6 col-lg-5 p-b-30">
                                                <div class="p-r-50 p-t-5 p-lr-0-lg">

                                                    @include('admin.alert')

                                                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                                        {{ $title }}
                                                    </h4>

                                                    <span class="mtext-106 cl2">
                                                        {{ number_format($product->price, 0, '', '.')  }} Đ
                                                    </span>

                                                    <p class="stext-102 cl3 p-t-23">
                                                        {{ $product->description }}
                                                    </p>

                                                    <!-- Sửa action add to cart ở đây  -->
                                                    <div class="p-t-33">
                                                        <div class="flex-w flex-r-m p-b-10">
                                                            <div class="size-204 flex-w flex-m respon6-next">
                                                                <form action="/add-cart" method="post">
                                                                    @if ($product->price !== NULL)
                                                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                                        </div>

                                                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1">

                                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                                        </div>
                                                                    </div>

                                                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">
                                                                        Buy Now
                                                                    </button>
                                                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">
                                                                        Add to cart
                                                                    </button>
                                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                    @endif
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--  -->
                                                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                                        <div class="flex-m bor9 p-r-10 m-r-11">
                                                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                                                <i class="zmdi zmdi-favorite"></i>
                                                            </a>
                                                        </div>

                                                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>

                                                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>

                                                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                                            <i class="fa fa-google-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bor10 m-t-50 p-t-43 p-b-40">
                                            <!-- Tab01 -->
                                            <div class="tab01">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item p-b-10">
                                                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                                                    </li>

                                                    <li class="nav-item p-b-10">
                                                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                                                            information</a>
                                                    </li>

                                                    <li class="nav-item p-b-10">
                                                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content p-t-43">
                                                    <!-- - -->
                                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                                        <div class="how-pos2 p-lr-15-md">
                                                            <p class="stext-102 cl6">
                                                                {!! $product->description !!}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <!-- - -->
                                                    <div class="tab-pane fade" id="information" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                                                <ul class="p-lr-28 p-lr-15-sm">
                                                                    <li class="flex-w flex-t p-b-7">
                                                                        <span class="stext-102 cl3 size-205">
                                                                            SKU
                                                                        </span>

                                                                        <span class="stext-102 cl6 size-206">
                                                                            {{$product->SKU}}
                                                                        </span>
                                                                    </li>

                                                                    <li class="flex-w flex-t p-b-7">
                                                                        <span class="stext-102 cl3 size-205">
                                                                            Stock
                                                                        </span>

                                                                        <span class="stext-102 cl6 size-206">
                                                                            {{$product->stock}}
                                                                        </span>
                                                                    </li>

                                                                    <li class="flex-w flex-t p-b-7">
                                                                        <span class="stext-102 cl3 size-205">
                                                                            EBook Link
                                                                        </span>

                                                                        <span class="stext-102 cl6 size-206">
                                                                            {{$product->ebook_link}}
                                                                        </span>
                                                                    </li>

                                                                    <li class="flex-w flex-t p-b-7">
                                                                        <span class="stext-102 cl3 size-205">
                                                                            Type
                                                                        </span>

                                                                        <span class="stext-102 cl6 size-206">
                                                                            {{ $product->producttype->name }}
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- - -->
                                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                                                <div class="p-b-30 m-lr-15-sm">
                                                                    <!-- Review -->
                                                                    @foreach($cmts as $cmt)
                                                                    <div class="flex-w flex-t p-b-68">
                                                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                                            <img src="{{ $cmt->user->avatar }}" alt="AVATAR">
                                                                        </div>

                                                                        <div class="size-207">
                                                                            <div class="flex-w flex-sb-m p-b-17">
                                                                                <span class="mtext-107 cl2 p-r-20">
                                                                                    {{ $cmt->user->fullName }}
                                                                                    <p class="stext-102 cl6">
                                                                                        {{ $cmt->created_at->format('d/m/Y') }}
                                                                                    </p>
                                                                                </span>

                                                                                <span class="fs-18 cl11">
                                                                                    <i class="zmdi zmdi-star"></i>
                                                                                    <i class="zmdi zmdi-star"></i>
                                                                                    <i class="zmdi zmdi-star"></i>
                                                                                    <i class="zmdi zmdi-star"></i>
                                                                                    <i class="zmdi zmdi-star-half"></i>
                                                                                </span>
                                                                            </div>

                                                                            <p class="stext-102 cl6">
                                                                                {{ $cmt->content }}
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                    @endforeach

                                                                    {{--<div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="images/avatar-01.jpg" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    Ariana Grande
                                                </span>

                                                <span class="fs-18 cl11">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                Quod autem in homine praestantissimum atque optimum est, id
                                                deseruit. Apud ceteros autem philosophos
                                            </p>
                                        </div>
                                    </div>--}}

                                                                    <!-- Add review -->
                                                                    @if(auth()->check())
                                                                    <form action="/product/{{ $product->id }}" method="POST" class="w-full">
                                                                        @csrf
                                                                        <h5 class="mtext-108 cl2 p-b-7">
                                                                            Add a review
                                                                        </h5>

                                                                        {{--<p class="stext-102 cl6">

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        @include('admin.alert')

                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $title }}
                                                                        </h4>

                                                                        <span class="mtext-106 cl2">
                                                                            {{ number_format($product->price, 0, '', '.')  }} Đ
                                                                        </span>

                                                                        <p class="stext-102 cl3 p-t-23">
                                                                            {{ $product->description }}
                                                                        </p>

                                                                        <!-- Sửa action add to cart ở đây  -->
                                                                        <div class="p-t-33">
                                                                            <div class="flex-w flex-r-m p-b-10">
                                                                                <div class="size-204 flex-w flex-m respon6-next">
                                                                                    <form action="" method="post">
                                                                                        @if ($product->price !== NULL)
                                                                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                                                                            </div>

                                                                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1">

                                                                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <a href="{{ route('cart') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                                                                            buy now
                                                                                        </a>

                                                                                        <a href="{{ route('cart.add', ['product_id' => $product->id])  }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                                                                            Add to cart
                                                                                        </a>
                                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                                        @endif
                                                                                        @csrf
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--  -->
                                                                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                                                            <div class="flex-m bor9 p-r-10 m-r-11">
                                                                                <a href="{{ route('add.Favorite', ['productId' => $product->id])  }}" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                                                                    <i class="zmdi zmdi-favorite"></i>
                                                                                </a>
                                                                            </div>

                                                                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Facebook">
                                                                                <i class="fa fa-facebook"></i>
                                                                            </a>

                                                                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                                                                <i class="fa fa-twitter"></i>
                                                                            </a>

                                                                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                                                                <i class="fa fa-google-plus"></i>
                                                                            </a>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="bor10 m-t-50 p-t-43 p-b-40">
                                                            <!-- Tab01 -->
                                                            <div class="tab01">
                                                                <!-- Nav tabs -->
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    <li class="nav-item p-b-10">
                                                                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                                                                    </li>

                                                                    <li class="nav-item p-b-10">
                                                                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                                                                            information</a>
                                                                    </li>

                                                                    <li class="nav-item p-b-10">
                                                                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                                                                    </li>
                                                                </ul>

                                                                <!-- Tab panes -->
                                                                <div class="tab-content p-t-43">
                                                                    <!-- - -->
                                                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                                                        <div class="how-pos2 p-lr-15-md">
                                                                            <p class="stext-102 cl6">
                                                                                {!! $product->description !!}
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <!-- - -->
                                                                    <div class="tab-pane fade" id="information" role="tabpanel">
                                                                        <div class="row">
                                                                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                                                                <ul class="p-lr-28 p-lr-15-sm">
                                                                                    <li class="flex-w flex-t p-b-7">
                                                                                        <span class="stext-102 cl3 size-205">
                                                                                            SKU
                                                                                        </span>

                                                                                        <span class="stext-102 cl6 size-206">
                                                                                            {{$product->SKU}}
                                                                                        </span>
                                                                                    </li>

                                                                                    <li class="flex-w flex-t p-b-7">
                                                                                        <span class="stext-102 cl3 size-205">
                                                                                            Stock
                                                                                        </span>

                                                                                        <span class="stext-102 cl6 size-206">
                                                                                            {{$product->stock}}
                                                                                        </span>
                                                                                    </li>

                                                                                    <li class="flex-w flex-t p-b-7">
                                                                                        <span class="stext-102 cl3 size-205">
                                                                                            EBook Link
                                                                                        </span>

                                                                                        <span class="stext-102 cl6 size-206">
                                                                                            {{$product->ebook_link}}
                                                                                        </span>
                                                                                    </li>

                                                                                    <li class="flex-w flex-t p-b-7">
                                                                                        <span class="stext-102 cl3 size-205">
                                                                                            Type
                                                                                        </span>

                                                                                        <span class="stext-102 cl6 size-206">
                                                                                            {{ $product->producttype->name }}
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- - -->
                                                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                                        <div class="row">
                                                                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                                                                <div class="p-b-30 m-lr-15-sm">
                                                                                    <!-- Review -->
                                                                                    <div class="flex-w flex-t p-b-68">
                                                                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                                                            <img src="images/avatar-01.jpg" alt="AVATAR">
                                                                                        </div>

                                                                                        <div class="size-207">
                                                                                            <div class="flex-w flex-sb-m p-b-17">
                                                                                                <span class="mtext-107 cl2 p-r-20">
                                                                                                    Ariana Grande
                                                                                                </span>

                                                                                                <span class="fs-18 cl11">
                                                                                                    <i class="zmdi zmdi-star"></i>
                                                                                                    <i class="zmdi zmdi-star"></i>
                                                                                                    <i class="zmdi zmdi-star"></i>
                                                                                                    <i class="zmdi zmdi-star"></i>
                                                                                                    <i class="zmdi zmdi-star-half"></i>
                                                                                                </span>
                                                                                            </div>

                                                                                            <p class="stext-102 cl6">
                                                                                                Quod autem in homine praestantissimum atque optimum est, id
                                                                                                deseruit. Apud ceteros autem philosophos
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Add review -->
                                                                                    <form class="w-full">
                                                                                        <h5 class="mtext-108 cl2 p-b-7">
                                                                                            Add a review
                                                                                        </h5>

                                                                                        <p class="stext-102 cl6">
                                                                                            Your email address will not be published. Required fields are marked *
                                                                                        </p>

                                                                                        <div class="flex-w flex-m p-t-50 p-b-23">
                                                                                            <span class="stext-102 cl3 m-r-16">
                                                                                                Your Rating
                                                                                            </span>

                                                                                            <span class="wrap-rating fs-18 cl11 pointer">
                                                                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                                                                <input class="dis-none" type="number" name="rating">
                                                                                            </span>
                                                                                        </div>

                                                                                        <div class="row p-b-25">
                                                                                            <div class="col-12 p-b-5">
                                                                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                                                                            </div>

                                                                                            <div class="col-sm-6 p-b-5">
                                                                                                <label class="stext-102 cl3" for="name">Name</label>
                                                                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                                                                                            </div>--}}

                                                                                            <div class="col-sm-6 p-b-5">
                                                                                                <label class="stext-102 cl3" for="email">Comment</label>
                                                                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="comment" placeholder="Your comment" required>
                                                                                            </div>
                                                                                        </div>

                                                                                        <button class=" flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                                                            Submit
                                                                                        </button>
                                                                                    </form>
                                                                                    @else
                                                                                    <div class="alert alert-danger" style="text-align: center;">
                                                                                        <strong>Đăng nhập để bình luận.</strong> Click vào đây <a href="/login">đăng nhập</a>
                                                                                    </div>
                                                                                    @endif
                                                                                </div>

                                                                                <div class="col-sm-6 p-b-5">
                                                                                    <label class="stext-102 cl3" for="email">Email</label>
                                                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                                                                </div>
                                                                            </div>

                                                                            <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                                                Submit
                                                                            </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

                                    <span class="stext-107 cl6 p-lr-25">
                                        Type: {{ $product->producttype->name }}
                                    </span>
                                </div>
</section>

<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>

        @include('products.list')
    </div>
</section>

@endsection

<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

    <span class="stext-107 cl6 p-lr-25">
        Type: {{ $product->producttype->name }}
    </span>
</div>
</section>

<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>

        @include('products.list')
    </div>
</section>

@endsection