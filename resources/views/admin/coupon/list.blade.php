
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Discount</th>
                <th>Times Used</th>
                <th>Is Active</th>
                <th>Status</th>
                <th style="width: 100px">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
            <tr>
                <td>{{ $coupon->id }}</td>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->discount }}</td>
                <td>{{ $coupon->times_used }}</td>
                <td>{{ $coupon->is_active }}</td>
                <td>
                    @if ($coupon->is_active == 0)
                        <span class="btn btn-waring btn-xs">Het hang</span>
                    @elseif ($coupon->deleted_at != NULL)
                        <span class="btn btn-danger btn-xs">đã xóa</span>
                    @elseif ($coupon->deleted_at == NULL)
                    <span class="btn btn-success btn-xs">còn </span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/coupons/edit/{{ $coupon->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $coupon->id }}, '/admin/coupons/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
