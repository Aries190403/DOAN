@extends('main')

@section('content')

<form class="bg0 p-t-130 p-b-85">
    @include('admin.alert')
    @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
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
                                <input type="text" class="form-control" value="{{ $userData[0]->address }}"placeholder="Nhập địa chỉ nhà">
                            </div>
                        </div>
                    </div>
                </div>
                @php $sumPriceCart = 0; @endphp
                @foreach ($cartProducts as $product)
                    @php 
                        $sumPriceCart = $sumPriceCart + $product->price * $product->quantity
                    @endphp
                @endforeach
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">order information</h4>
                            <div class="mb-3">
                                <div class="info__order-box">
                                    <span>total product cost: </span>
                                    <span>{{ $sumPriceCart }}</span>
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
                                    <span>0</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div style="color: red; font-weight: bold" class="info__order-box">
                                    <span>Total: </span>
                                    <span >{{ $sumPriceCart }}</span>
                                </div>
                            <div class="text-center">
                                @if ($sumPriceCart !== null && $sumPriceCart > 0)
                                <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                    <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                                    </div>
                                </div>
                                <br>
                                    <a href="{{ route('order') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                        Order
                                    </a>
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
</form>
@endsection
