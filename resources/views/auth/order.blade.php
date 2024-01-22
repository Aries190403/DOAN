@extends('main')

@section('content')
    <div class="container p-t-80">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/userorderlist" class="stext-109 cl8 hov-cl1 trans-04">
                OrderList
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Your Order
            </span>
        </div>
    </div>
    @include('admin.alert')
    <form class="bg0 p-t-130 p-b-85" method="post">


            <div class="container">
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
                                        {{-- <th class="column-6">&nbsp;</th> --}}
                                    </tr>

                                    @foreach($invoicedetails as $key => $invoicedetail)
                                        @php
                                            $price = $invoicedetail->unit_price * $invoicedetail->quantity;
                                            $total += $price;

                                            $detailid = null;
                                        @endphp
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ $invoicedetail->product->image }}" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2">{{ $invoicedetail->product->name }}</td>
                                            <td class="column-3">{{ number_format($price, 0, '', '.') }}</td>
                                            <td class="column-4">{{ $invoicedetail->quantity }}</td>
                                            <td class="column-5">{{ number_format($price, 0, '', '.') }}</td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td colspan="4" class="text-right">Total price:</td>
                                        <td>{{ number_format($total, 0, '', '.') }}</td>
                                    </tr> --}}
                                    </tbody>
                                </table>
                            </div>

                            @csrf
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Information
                            </h4>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{ number_format($total, 0, '', '.') }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Status:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        @if ($invoicedetail->invoice->status == 1)
                                            <span class="mtext-101 cl2">PROCESSING</span>
                                        @elseif ($invoicedetail->invoice->status == 2)
                                            <span class="mtext-101 cl2">TRANSPORT</span>
                                        @elseif ($invoicedetail->invoice->status == 3)
                                            <span class="mtext-101 cl2">DELIVERED</span>
                                        @elseif ($invoicedetail->invoice->status == 0)
                                            <span class="mtext-101 cl2">CANCELLED</span>
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">

                                    <div class="p-t-15">
                                        <span class="stext-112 cl8">
                                            Customer information
                                        </span>

                                        <div class="bor8 bg0 m-b-12">
                                            <span class="stext-111 cl8 plh3 size-111 p-lr-15">Name: {{ Auth::user()->fullName }}</span>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <span class="stext-111 cl8 plh3 size-111 p-lr-15">Phone: {{ Auth::user()->phoneNumber }}</span>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <span class="stext-111 cl8 plh3 size-111 p-lr-15">Address: {{ Auth::user()->address }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('update.status', ['invoice' => $invoicedetail->invoice->id]) }}">
                                @csrf
                                @if ($invoicedetail->invoice->status == 1)
                                    <input type="hidden" name="status" value="cancel">
                                    <button type="submit" class="btn btn-danger">Hủy</button>
                                @endif
                            </form>

                            <form method="POST" action="{{ route('update.status', ['invoice' => $invoicedetail->invoice->id]) }}">
                                @csrf
                                @if ($invoicedetail->invoice->status == 2)
                                    <input type="hidden" name="status" value="received">
                                    <button type="submit" class="btn btn-success">Đã nhận</button>
                                @endif
                            </form>

                            {{-- @if ($invoicedetail->invoice->status == 1)
                                <a href="{{ route('update.status'}}" class="btn btn-danger" data-abc="true">Hủy đơn</a>
                            @endif

                            @if ($invoicedetail->invoice->status == 2)
                                <a href="{{ route('update.status'}}" class="btn btn-info" data-abc="true">Đã nhận</a>
                            @endif --}}

                            @csrf
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
