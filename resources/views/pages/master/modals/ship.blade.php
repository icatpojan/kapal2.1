  <!-- Modal -->
  <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="tambahModalLabel">Add Customer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('ship.store') }}" method="POST">
                  <div class="modal-body">
                      @csrf
                      <div class="form-group">
                          <label for="1">Name</label>
                          <input required type="text" class="form-control" id="1" name="name">
                      </div>
                      <div class="form-group">
                          <label for="2">SN</label>
                          <input required type="number" class="form-control" id="2" name="sn">
                      </div>
                      <div class="form-group">
                          <label for="3">Imei</label>
                          <input required type="number" class="form-control" id="3" name="imei">
                      </div>
                      <div class="form-group">
                          <label for="4">category</label>
                          <input required type="text" class="form-control" id="4" name="category">
                      </div>
                      <div class="form-group">
                          <label for="5">Type</label>
                          <select name="type" id="5 " class="form-control">
                              <option value="Chopper">Chopper</option>
                              <option value="Personal">Personal</option>
                              <option value="Vehicle">Vehicle</option>
                              <option value="Vessel">Vessel</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="6">Customer</label>
                          <select name="customer_id" id="6" class="form-control">
                              @foreach ($Customer as $customer)
                                  <option value="{{ $customer->id }}">
                                      {{ $customer->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="7">Deskripsi</label>
                          <input required type="text" class="form-control" id="7" name="deskripsi">
                      </div>
                      <div class="form-group">
                          <label for="8">Status</label>
                          <input required type="text" class="form-control" id="8" name="status">
                      </div>
                      <div class="form-group">
                          <label for="9">Airtime Start</label>
                          <input required type="date" class="form-control" id="9" name="airtime_start">
                      </div>
                      <div class="form-group">
                          <label for="10">Airtime End</label>
                          <input required type="date" class="form-control" id="10" name="airtime_end">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <!-- Modal -->
  @foreach ($Ship as $ship)
      <div class="modal fade" id="updateModal-{{ $ship->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Ship</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="{{ route('ship.update', $ship->id) }}" method="POST">
                      <div class="modal-body">
                          @csrf
                          <div class="form-group">
                              <label for="13">Name</label>
                              <input value="{{ $ship->name }}" required type="text" class="form-control" id="13"
                                  name="name">
                          </div>
                          <div class="form-group">
                              <label for="14">SN</label>
                              <input value="{{ $ship->sn }}" required type="text" class="form-control" id="14"
                                  name="sn">
                          </div>
                          <div class="form-group">
                              <label for="15">Type</label>
                              <select name="type" id="5 " class="form-control">
                                  <option value="Chopper">Chopper</option>
                                  <option value="Personal">Personal</option>
                                  <option value="Vehicle">Vehicle</option>
                                  <option value="Vessel">Vessel</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="16">Imei</label>
                              <input value="{{ $ship->imei }}" required type="text" class="form-control" id="16"
                                  name="imei">
                          </div>
                          <div class="form-group">
                              <label for="17">Category</label>
                              <input value="{{ $ship->category }}" required type="text" class="form-control" id="17"
                                  name="category">
                          </div>
                          <div class="form-group">
                              <label for="18">Customer</label>
                              <select name="customer_id" id="6" class="form-control">
                                  @foreach ($Customer as $customer)
                                      {{ $selected = '' }}
                                      @if ($ship->customer_id == $customer->id)
                                          {{ $selected = 'selected="selected"' }}
                                      @endif
                                      <option value="{{ $customer->id }}" {{ $selected }}>
                                          {{ $customer->name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="19">Deskripsi</label>
                              <input value="{{ $ship->deskripsi }}" required type="text" class="form-control" id="19"
                                  name="deskripsi">
                          </div>
                          <div class="form-group">
                              <label for="20">Status</label>
                              <input value="{{ $ship->status }}" required type="text" class="form-control" id="20"
                                  name="status">
                          </div>
                          <div class="form-group">
                              <label for="21">Airtime Start</label>
                              <input value="{{ $ship->airtime_start }}" required type="text" class="form-control"
                                  id="21" name="airtime_start">
                          </div>
                          <div class="form-group">
                              <label for="22">Airtime_end</label>
                              <input value="{{ $ship->airtime_end }}" required type="text" class="form-control"
                                  id="22" name="airtime_end">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>


  @endforeach
