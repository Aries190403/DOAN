@extends('main')

@section('content')
    <form class="bg0 p-t-130 p-b-85" method="post">

        @include('admin.alert')

        <table class="table">
            <thead>
                <tr>
                    <th>Information</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th style="width: 100px">View</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $invoiceid=null;
                 @endphp
                @foreach($invoices as $key=> $invoice)
                    <tr>
                        @php
                        $invoiceid = $invoice->id;
                        @endphp
                        {{-- @dd($invoiceid) --}}
                        <td>Your Order In: {{ $invoice->invoice_date }}</td>
                        <td>{{ number_format($invoice->total, 0, '', '.') }} Đ</td>
                        <td>
                            @if ($invoice->status == 1)
                            <span class="btn btn-warning btn-xs">PROCESSING</span>
                            @elseif ($invoice->status == 2)
                            <span class="btn btn-success btn-xs">TRANSPORT</span>
                            @elseif ($invoice->status == 3)
                            <span class="btn btn-primary btn-xs">DELIVERED</span>
                            @elseif ($invoice->status == 0)
                            <span class="btn btn-danger btn-xs">CANCELLED</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/userorderlist/{{ $invoiceid }}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </form>
@endsection
