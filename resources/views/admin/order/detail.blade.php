@extends('admin.main')

@section('content')
    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4">Quantity</th>
                <th class="column-5">Total</th>
            </tr>

            @foreach($invoicedetails as $key => $invoicedetail)
                @php
                    $price = $invoicedetail->unit_price * $invoicedetail->quantity;
                    $total += $price;

                    $detailid = null;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            @if($invoicedetail->product && $invoicedetail->product->image)
                                <img src="{{ $invoicedetail->product->image }}" alt="IMG" style="width: 100px">
                            @else
                                <img src="{{ asset('path_to_placeholder_image') }}" alt="Placeholder Image" style="width: 100px">
                            @endif
                        </div>
                    </td>
                    <td class="column-2">{{ $invoicedetail->product->name }}</td>
                    <td class="column-3">{{ number_format($invoicedetail->unit_price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $invoicedetail->quantity }}</td>
                    <td class="column-5">{{ number_format($price, 0, '', '.') }}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="4" class="text-right">Total price:</td>
                    <td>{{ number_format($total, 0, '', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <td colspan="4" class="text-right">
            @if ($invoicedetail->invoice->status == 1)
                <span class="btn btn-warning btn-xs">PROCESSING</span>
            @elseif ($invoicedetail->invoice->status == 2)
                <span class="btn btn-success btn-xs">TRANSPORT</span>
            @elseif ($invoicedetail->invoice->status == 3)
                <span class="btn btn-primary btn-xs">DELIVERED</span>
            @elseif ($invoicedetail->invoice->status == 0)
                <span class="btn btn-danger btn-xs">CANCELLED</span>
            @endif
        </td>
        <div class="card-footer">
            @if ($invoicedetail->invoice->status == 1)
                <form action="{{ route('update_status', ['invoices' => $invoicedetail->invoice->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Order confirmation</button>
                </form>
            @endif
        </div>
    </div>
@endsection


