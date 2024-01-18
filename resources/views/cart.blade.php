<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            @php
                $sumPriceCart = 0;
                $productData ="";
            @endphp
            <ul class="header-cart-wrapitem w-full">
                @php
                    $cartData = session('cart');
                @endphp

                @if ($cartData !== null && count($cartData) > 0)
                    @foreach ($cartData as $product)
                    @php
                        $sumPriceCart = $sumPriceCart + $product->price * $product->quantity
                    @endphp
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{$product->image}}" alt="Image 1" width="50" height="50">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{ $product->name }}
                            </a>

                            <span class="header-cart-item-info">
                                   {{$product->price}}
                                   x {{$product->quantity}}
                            </span>
                        </div>
                    </li>
                    @endforeach
                @else
                    <li>Your cart is empty</li>
                @endif
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: {{ number_format($sumPriceCart, '0', '', '.') }}
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{ route('cart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="{{route('checkout')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
