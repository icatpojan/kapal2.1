@extends('layouts.app')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Ship</h1>
@endsection
@section('css')
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ship Configuration</h6>
                <!-- Button trigger modal -->
                <button data-toggle="modal" data-target="#tambahModal" class="btn btn-outline-primary btn-sm">Add
                    Ship</button>
                @include('pages.master.modals.ship')
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>SN</th>
                            <th>Imei</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Customer</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Airtime start</th>
                            <th>Airtime End</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($Ship as $ship)
                            <tr>
                                <td>{{ $ship->name }}</td>
                                <td>{{ $ship->sn }}</td>
                                <td>{{ $ship->imei }}</td>
                                <td>{{ $ship->category }}</td>
                                <td>{{ $ship->type }}</td>
                                <td>{{ $ship->customer->name }}</td>
                                <td>{{ $ship->deskripsi }}</td>
                                <td>{{ $ship->status }}</td>
                                <td>{{ $ship->airtime_start }}</td>
                                <td>{{ $ship->airtime_end }}</td>
                                <td class="row">
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                            data-target="#updateModal-{{ $ship->id }}">
                                        Edit
                                        </button>
                                    </div>
                                    <div class="col-md-1 ml-4">
                                        <form action="{{ route('ship.destroy', $ship->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm" type="submit"
                                                onclick="return confirm ('Yakin hapus ship ?')">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
