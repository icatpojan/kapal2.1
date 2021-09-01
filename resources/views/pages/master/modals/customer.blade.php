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
              <form action="{{ route('customer.store') }}" method="POST">
                  <div class="modal-body">
                      @csrf
                      <div class="form-group">
                          <label for="1">Name</label>
                          <input required type="text" class="form-control" id="1" name="name">
                      </div>
                      <div class="form-group">
                          <label for="2">Address</label>
                          <input required type="text" class="form-control" id="2" name="address">
                      </div>
                      <div class="form-group">
                          <label for="3">Type</label>
                          <select name="type" class="form-control" id="3">
                              <option value="fishing">fishing</option>
                              <option value="oil and gas">oil and gas</option>
                              <option value="mining">mining</option>
                              <option value="cemercial tranportation">cemercial taranportation</option>
                              <option value="cargo">cargo</option>
                              <option value="goverment">goverment</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="4">Contact</label>
                          <input required type="number" class="form-control" id="4" name="contact">
                      </div>
                      <div class="form-group">
                          <label for="5">Fax</label>
                          <input required type="number" class="form-control" id="5" name="fax">
                      </div>
                      <div class="form-group">
                          <label for="6">Phone</label>
                          <input required type="number" class="form-control" id="6" name="phone">
                      </div>
                      <div class="form-group">
                          <label for="7">NPWP</label>
                          <input required type="number" class="form-control" id="7" name="npwp">
                      </div>
                      <div class="form-group">
                          <label for="8">Email</label>
                          <input required type="email" class="form-control" id="8" name="email">
                      </div>
                      <div class="form-group">
                          <label for="province">province</label>
                          <select name="province_id" id="province" class="form-control">
                              <option value="">== Select Province ==</option>
                              @foreach ($Province as $province)
                                  <option value="{{ $province->province_id }}">{{ $province->province_name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="city">City</label>
                          <select name="city_id" id="city" class="form-control">
                              <option value="">== Select City ==</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="region_id">Region</label>
                          <select name="region" id="region" class="form-control">
                              <option value="">== Select Region ==</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="12">Kode pos</label>
                          <input required type="number" class="form-control" id="12" name="kode_pos">
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
  @foreach ($Customer as $customer)
      <div class="modal fade" id="updateModal-{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">

          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                      <div class="modal-body">
                          @csrf
                          <div class="form-group">
                              <label for="13">Name</label>
                              <input value="{{ $customer->name }}" required type="text" class="form-control" id="13"
                                  name="name">
                          </div>
                          <div class="form-group">
                              <label for="14">Address</label>
                              <input value="{{ $customer->address }}" required type="text" class="form-control"
                                  id="14" name="address">
                          </div>
                          <div class="form-group">
                              <label for="15">Type</label>
                              <select name="type" class="form-control" id="3">
                                  <option value="fishing">fishing</option>
                                  <option value="oil and gas">oil and gas</option>
                                  <option value="mining">mining</option>
                                  <option value="cemercial tranportation">cemercial taranportation</option>
                                  <option value="cargo">cargo</option>
                                  <option value="goverment">goverment</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="16">Contact</label>
                              <input value="{{ $customer->contact }}" required type="number" class="form-control"
                                  id="16" name="contact">
                          </div>
                          <div class="form-group">
                              <label for="17">Fax</label>
                              <input value="{{ $customer->fax }}" required type="number" class="form-control" id="17"
                                  name="fax">
                          </div>
                          <div class="form-group">
                              <label for="18">Phone</label>
                              <input value="{{ $customer->phone }}" required type="number" class="form-control"
                                  id="18" name="phone">
                          </div>
                          <div class="form-group">
                              <label for="19">NPWP</label>
                              <input value="{{ $customer->npwp }}" required type="number" class="form-control"
                                  id="19" name="npwp">
                          </div>
                          <div class="form-group">
                              <label for="20">Email</label>
                              <input value="{{ $customer->email }}" required type="text" class="form-control" id="20"
                                  name="email">
                          </div>
                          <div class="form-group">
                              <label for="province">province</label>
                              <select name="province_id" id="province" class="form-control">
                                  <option value="">== Select Province ==</option>
                                  @foreach ($Province as $province)
                                      <option value="{{ $province->province_id }}">{{ $province->province_name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="city">City</label>
                              <select name="city_id" id="city" class="form-control">
                                  <option value="">== Select City ==</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="region_id">Region</label>
                              <select name="region" id="region" class="form-control">
                                  <option value="">== Select Region ==</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="24">Kode pos</label>
                              <input value="{{ $customer->kode_pos }}" required type="text" class="form-control"
                                  id="24" name="kode_pos">
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
