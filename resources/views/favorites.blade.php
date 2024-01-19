@extends('main')
@section('content')
    <form class="bg0 p-t-130 p-b-85">
        @include('admin.alert')
        <div class="container mt-5">
            <h1>Danh sách yêu thích</h1>

            @if(count($favorites) > 0)
                <div class="product-grid">
                    @foreach($favorites as $product)
                        <div class="product-item">
                            <img src="{{$product['image']}}" alt="Image 1" width="120" height="120">
                            <h3>{{ strlen($product['fullName']) > 25 ? substr($product['fullName'], 0, 25).'..' : $product['fullName'] }}</h3>
                            <p style="font-size: 14px">{{ number_format($product['price'], 2, ',', '.') }}</p>
                            <br>
                            <div>
                                <a href="favorites/remove/{{$product['id']}}"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" style="font-size: 30px; float: right"
                                    data-tooltip="remove from Wishlist">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                                <a href="cart/add/{{$product['id']}}"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" style="font-size: 30px; float: left;"
                                    data-tooltip="add to cart">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
        @else
        <p style="text-align: center; font-size: 24px; font-weight: bold;">Your cart is empty.</p>
            <a href="{{ route('home') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="max-width: 200px; margin: 0 auto;">
                Back to home
            </a>
        @endif
    </form>
@endsection