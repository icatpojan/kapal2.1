@extends('layouts.app')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Report</h1>
@endsection
@section('css')
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Report Configuration</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <tr>
                            <th>nomer inv</th>
                            <th>Jenis</th>
                            <th>Deskripsi</th>
                            <th>Address</th>
                            <th>Tahun</th>
                            <th>NPWP</th>
                            <th>Customer</th>
                            <th>Ship</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($Invoice as $invoice)
                            <tr>
                                <td>{{ $invoice->invoice_no }}</td>
                                <td>{{ $invoice->jenis }}</td>
                                <td>{{ $invoice->deskripsi }}</td>
                                <td>{{ $invoice->address }}</td>
                                <td>{{ $invoice->tahun }}</td>
                                <td>{{ $invoice->npwp }}</td>
                                <td>{{ $invoice->customer_id }}</td>
                                <td>{{ $invoice->ship_id }}</td>
                                <td>{{ $invoice->tanggal }}</td>
                                <td class="row">
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                            data-target="#updateModal-{{ $invoice->id }}">
                                        Lihat
                                        </button>
                                    </div>
                                    <div class="col-md-1 ml-5">
                                        <form action="{{ route('report.cetak', $invoice->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm" type="submit">Print</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
