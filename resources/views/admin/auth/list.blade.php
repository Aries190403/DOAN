@extends('admin.main')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Avatar</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>IsAdmin</th>
            <th style="width: 100px">Tools</th>
        </tr>

    </thead>
    <tbody>
        @foreach($allAccount as $account)
        <tr style="background-color: {{ $account->isAdmin ? '#EEEEEE' : 'white'}};">
            <td>{{ $account->id }}</td>
            <td class="image-cell"><img src="{{ $account->avatar }}" alt="User Avatar" style="max-width: 50px; max-height: 50px;"></td>
            <td>{{ $account->fullName }}</td>
            <td>{{ $account->email }}</td>
            <td>{{ $account->phoneNumber }}</td>
            <td>
                @if($account->deleted_at == null)
                <span class="btn btn-success btn-xs">Active</span>
                @else
                <span class="btn btn-danger btn-xs">Inactive</span>
                @endif
            </td>
            <td>
                @if($account->isAdmin)
                <span class=" btn btn-success btn-xs">Yes</span>
                @else
                <span class="btn btn-danger btn-xs">No</span>
                @endif
            </td>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/accounts/edit/{{ $account->id }}">
                    <i class="fas fa-edit"></i>
                </a>
                <!-- <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{ $account->id }}, '/admin/accounts/destroy')"> -->
                <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isAdminFilter = document.getElementById('isAdminFilter');
        const userRows = document.querySelectorAll('.userRow');

        isAdminFilter.addEventListener('change', function() {
            const selectedValue = isAdminFilter.value;

            userRows.forEach(function(row) {
                row.style.display = 'none';
            });

            if (selectedValue === 'all') {
                userRows.forEach(function(row) {
                    row.style.display = '';
                });
            } else {
                const selectedRows = document.querySelectorAll(`.userRow.${selectedValue}`);
                selectedRows.forEach(function(row) {
                    row.style.display = '';
                });
            }
        });
    });
</script>
@endsection
@endsection