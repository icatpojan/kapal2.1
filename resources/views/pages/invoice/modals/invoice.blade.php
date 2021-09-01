<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <select id="warehouse" name="warehouse" class="form-control" id="">
                                <option value="">Warehouse</option>
                                @foreach ($Warehouse as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group mb-3">
                            <b-button type="submit" class="btn btn-primary btn-sm btn-block btn-search" size="sm">CARI
                            </b-button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <select id="type" name="type" class="form-control" id="">
                                <option value="">Type</option>
                                @foreach ($Type as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-sm ">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Imei</th>
                                    <th>Id</th>
                                    <th>Type</th>
                                    <th>Warehouse</th>
                                    <th>Price</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tfoot id="data">
                            </tfoot>    
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
