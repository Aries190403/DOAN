@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name Custommer</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Date</th>
            <th>Total</th>
            <th>Status</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <@php
            $invoiceid = null;

        @endphp
        @foreach($invoices as $key => $invoice)
            <tr>
                @php
                    $invoiceid = $invoice->id;
                @endphp
                {{-- @dd($invoiceid) --}}
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->user->username }}</td>
                <td>{{ $invoice->phone }}</td>
                <td>{{ $invoice->address }}</td>
                <td>{{ $invoice->created_at }}</td>
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
                    <a class="btn btn-primary btn-sm" href="/admin/orders/view/{{ $invoiceid }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $invoice->id }}, '/admin/orders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {{-- {!! $customers->links() !!} --}}
    </div>
@endsection


