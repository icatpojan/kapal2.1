@extends('layouts.app')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">history</h1>
@endsection
@section('css')
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">history Configuration</h6>
                <!-- Button trigger modal -->
                <button data-toggle="modal" data-target="#tambahModal" class="btn btn-outline-primary btn-sm">Add
                    History</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>User</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($History as $history)
                            <tr>
                                <td>{{ $history->keterangan }}</td>
                                <td>{{ $history->user_id }}</td>
                                <td>{{ $history->tanggal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
