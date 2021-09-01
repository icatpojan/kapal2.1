@extends('layouts.app')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Type</h1>
@endsection
@section('css')
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Type Configuration</h6>
                <!-- Button trigger modal -->
                <button data-toggle="modal" data-target="#tambahModal" class="btn btn-outline-primary btn-sm">Add
                    Type</button>
                @include('pages.product.modals.type')
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($Type as $type)
                            <tr>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->category->name }}</td>
                                <td>{{ $type->price }}</td>
                                <td>{{ $type->stock }}</td>
                                <td class="row">
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                            data-target="#updateModal-{{ $type->id }}">
                                        Edit
                                        </button>
                                    </div>
                                    <div class="col-md-1 ml-4">
                                        <form action="{{ route('type.destroy', $type->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm" type="submit"
                                                onclick="return confirm ('Yakin hapus Type ?')">Remove</button>
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
