@extends('layouts.template')
@section('title', 'Riwayat')
@section('content')
<h2 class="h2 text-secondary-emphasis mt-3 fst-italic">
    Riwayat Liquid Dispensing Kapsul Radiofarmaka I-131
</h2>

<div class="card shadow border-0 mb-4 mt-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered border" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>User</th>
                        <th>Volume Kapsul</th>
                        <th>Jumlah Kapsul</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index=>$item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->volume }}</td>
                        <td>{{ $item->capsule_qty }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection