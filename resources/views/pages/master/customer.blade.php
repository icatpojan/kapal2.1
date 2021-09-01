@extends('layouts.app')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Customer</h1>
@endsection
@section('css')
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Customer Configuration</h6>
                <!-- Button trigger modal -->
                <button data-toggle="modal" data-target="#tambahModal" class="btn btn-outline-primary btn-sm">Add
                    Customer</button>
                @include('pages.master.modals.customer')
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Fax</th>
                            <th>Contact</th>
                            <th>Phone</th>
                            <th>NPWP</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($Customer as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->fax }}</td>
                                <td>{{ $customer->contact }}</td>
                                <td>{{ $customer->kode_pos }}</td>
                                <td>{{ $customer->email }}</td>
                                <td class="row">
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                            data-target="#updateModal-{{ $customer->id }}">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="col-md-1 ml-4">
                                        <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm" type="submit"
                                                onclick="return confirm ('Yakin hapus User ?')">Remove</button>
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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        $(function() {
            $('#province').on('change', function() {
                axios.post('{{ route('province.store') }}', {
                        id: $(this).val()
                    })
                    .then(function(response) {
                        $('#city').empty();

                        $.each(response.data, function(city_id, city_name) {
                            $('#city').append(new Option(city_name, city_id))
                        })
                    });
            });
            $('#city').on('change', function() {
                axios.post('{{ route('region.store') }}', {
                        id: $(this).val()
                    })
                    .then(function(response) {
                        $('#region').empty();

                        $.each(response.data, function(region_id, region_name) {
                            $('#region').append(new Option(region_name, region_id))
                        })
                    });
            });
            
        });
    </script>
@endsection
