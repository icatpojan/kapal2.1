@extends('layouts.app')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
@endsection
@section('css')
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Product Configuration</h6>
                <!-- Button trigger modal -->
                <div>
                    <a href="{{ route('mutasi.index') }}" class="btn btn-outline-success btn-sm">Mutasi
                        Product</a>
                    <button data-toggle="modal" data-target="#tambahModal" class="btn btn-outline-primary btn-sm">Add
                        Product</button>
                </div>
                @include('pages.product.modals.product')
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>SN</th>
                            <th>Imei</th>
                            <th>Keterangan</th>
                            <th>Tanggal Masuk</th>
                            <th>Harga</th>
                            <th>Tipe</th>
                            <th>Gudang</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($Product as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->sn }}</td>
                                <td>{{ $product->imei }}</td>
                                <td>{{ $product->keterangan }}</td>
                                <td>{{ $product->tgl_masuk }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->type->name }}</td>
                                <td>{{ $product->warehouse->name }}</td>
                                <td>{{ $product->status->name }}</td>
                                <td class="row">
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                            data-target="#updateModal-{{ $product->id }}">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="col-md-1 ml-4">
                                        <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm" type="submit"
                                                onclick="return confirm ('Yakin hapus product ?')">Remove</button>
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
