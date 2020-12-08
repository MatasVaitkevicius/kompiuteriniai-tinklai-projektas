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
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sukurti Kambarį') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('createRoom') }}">
                        @csrf
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
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-10">
                            <label for="exampleFormControlSelect1">Įveskite kambario paveiksliuko URL adresą (150x150 geriausiai)</label>
                            <input type="url" name="img_url" id="img_url" placeholder="Įveskite kambario paveiksliuko URL adresą" /><br>
                            <input type="button" value="Parodyti Paveiksliuką" id="btn1" />
                            <div class="d-flex justify-content-center">
                                <div id="photo" style="height:150px;width:150px"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Sukurti</button>


                </form>
                <script>
                    document.getElementById('btn1').addEventListener('click', function() {
                        document.getElementById('photo').innerHTML = '<img src="' + document.getElementById('img_url').value + '" alt="Paveiksliukas" />';
                    });
                </script>
                @endsection