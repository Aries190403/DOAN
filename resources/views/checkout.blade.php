@extends('main')

@section('content')
    @include('admin.alert')
        <div class="container mt-5 bg0 p-t-130 p-b-85">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <form id="address" action="{{ route('order') }}" method="get">
                        <div class="card-body">
                            <h4 class="card-title">Personal information</h4>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" disabled value="{{ $userData[0]->fullName }}"placeholder="Nhập họ và tên">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" disabled value="{{ $userData[0]->email }}"placeholder="Nhập địa chỉ email">
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phome Number</label>
                                <input type="text" class="form-control" disabled value="{{ $userData[0]->phoneNumber }}"placeholder="Nhập số điện thoại">
                            </div>
                            <div class="mb-3">
                                <label for="apartment_number" class="form-label">Address</label>
                                <input type="text" class="form-control" name="diachi" value="{{ $userData[0]->address }}"placeholder="Nhập địa chỉ nhà">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                
                @php 
                    $sumPriceCart = 0;
                    $pricediscount = 0;
                @endphp
                @foreach ($cartProducts as $product)
                    @php
                        $sumPriceCart = $sumPriceCart + $product->price * $product->quantity;
                    @endphp
                @endforeach
                @if (session('discount') != 0)
                    @php
                        $pricediscount = $sumPriceCart * session('discount') / 100;
                    @endphp
                @else
                    @php
                        session()->forget('voucher');
                    @endphp
                @endif
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">order information</h4>
                            <div class="mb-3">
                                <div class="info__order-box">
                                    <span>total product cost: </span>
                                    <span>{{ $sumPriceCart}}</span>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <div class="info__order-box">
                                    <span>transport fee: </span>
                                    <span>30000</span>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <div class="info__order-box">
                                    <span>Discount applies: </span>
                                    <span>{{session('discount')}} %</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div style="color: red; font-weight: bold" class="info__order-box">
                                    <span>Total: </span>
                                    <span >{{ $sumPriceCart - $pricediscount}}</span>
                                </div>
                                <br>
                                <form id="voucher" action="{{ route('applycoupon') }}" method="POST">
                                    @csrf
                                    <div class="flex-w flex-m m-r-20 m-tb-5">
                                        <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                            name="coupon" placeholder="Coupon Code">
                                        {{-- <button type="submit"
                                                class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                            Apply coupon
                                        </button> --}}
                                    </div>
                                </form>
                                <a href="{{ route('applycoupon') }}" onclick="event.preventDefault(); document.getElementById('voucher').submit();"
                                class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5"
                                >Apply Coupon</a>
                            <div class="text-center">
                                @if ($sumPriceCart !== null && $sumPriceCart > 0)
                                <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                    <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                                    </div>
                                </div>
                                <br>
                                    <a href="{{ route('order') }}" onclick="event.preventDefault(); document.getElementById('address').submit();"
                                    class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                                    >Order</a>
                                @else
                                <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                    <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                                    </div>
                                </div>
                                    <p style="color: red; font-weight: bold;">Please add products to Order</p>
                                    <a href="{{ route('home') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                        Back to home
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
