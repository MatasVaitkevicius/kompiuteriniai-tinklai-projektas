@extends('layouts.admin')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                <div class="card-header">{{ __('Sukurti Kambarį') }}</div>
                    <div class="card-body">
                      <form method="post" action="{{ route('createRoom') }}">
                      @csrf
                        <div class="form-group">
                        <label for="example-date-input" class="col-6 col-form-label">Atvykimo Data</label>
                        <div class="col-10">
                        <input class="form-control" type="date" value="{{ date('Y-m-d', strtotime("+1 day")) }}" id="arrival_time" name="arrival_time">
                        @error('arrival_time')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="example-date-input" class="col-6 col-form-label">Išvykimo data</label>
                        <div class="col-10">
                        <input class="form-control" type="date" value="{{ date('Y-m-d', strtotime("+2 day")) }}" id="departure_time" name="departure_time">
                        @error('departure_time')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                        <div class="form-group">
                          <div class="col-10">
                            <label for="exampleFormControlSelect1">Kambario Tipas</label>
                            <select class="form-control" id="room_type" name="room_type">
                              <option value="single">Vienvietis</option>
                              <option value="double">Dvivietis</option>
                              <option value="triple">Trivietis</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-10">
                            <label for="exampleFormControlSelect1">Rezervuotas/Nerezervuotas</label>
                            <select class="form-control" id="is_vacant" name="is_vacant">
                              <option value="1">Nerezervuotas</option>
                              <option value="0">Rezervuotas</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-10">
                            <label for="exampleFormControlSelect1">WIFI</label>
                            <select class="form-control" id="wifi" name="wifi">
                              <option value="1">Yra</option>
                              <option value="0">Nėra</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-10">
                            <label for="exampleFormControlSelect1">TV</label>
                            <select class="form-control" id="tv" name="tv">
                              <option value="1">Yra</option>
                              <option value="0">Nėra</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-10">
                            <label for="exampleFormControlFile1">Kaina (1 parai)</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">&euro;</span>
                              </div>
                              <input type="number" step="any" class="form-control" id="room_price" name="room_price" aria-label="Amount (to the nearest dollar)">
                              @error('room_price')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-10">
                          <button type="submit" class="btn btn-success">Sukurti</button>
                        </div>
                        </form>
                  </div>
            </div>
         </div>
    </div>
</div>
@endsection
