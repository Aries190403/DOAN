@extends('main')
@section('content')

    <form class="bg0 p-t-130 p-b-85">
    @if ($cartProducts !== null)
    @php $sumPriceCart = 0; @endphp
    @include('admin.alert')
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            @php $total = 0; @endphp
                            <table class="table-shopping-cart">
                                <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                    <th class="column-6">&nbsp;</th>
                                </tr>

                                @foreach ($cartProducts as $product)
                                @php
                                    $sumPriceCart = $sumPriceCart + $product->price * $product->quantity
                                @endphp
                                    <tr class="table_row">
                                        <td class="column-1" >
                                            <img src="{{$product->image}}" alt="Image 1" width="100" height="100">
                                        </td>
                                        <td class="column-2">{{ $product->name }}</td>
                                        <td class="column-3">{{ number_format($product->price, 0, '', '.') }}</td>
                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <a href="cart/delete/{{$product->id}}/{{$product->quantity}}" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" style="text-decoration: none;">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </a>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number" value="{{ $product->quantity }}" readonly>

                                                <a href="cart/add/{{$product->id}}" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" style="text-decoration: none;">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="column-5">{{ number_format($product->price * $product->quantity, 2)  }}</td>
                                        <td class="p-r-15">
                                            {{-- <a href="cart/delete/{{$product->id}}/{{$product->quantity}}">Xóa</a> --}}
                                        </td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                       name="coupon" placeholder="Coupon Code">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>
                            @csrf
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    {{ number_format($sumPriceCart, '0', '', '.') }} vnd
                                </span>
                            </div>
                        </div>
                        {{-- <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                            </div>
                        </div> --}}
                        <a href="{{route('checkout')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Check Out
                        </a>
                    </div>
                </div>
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
