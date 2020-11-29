@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Užklausos duomenys') }}</div>
                <div class="card-body">
                <form>
                <div class="form-group">
                <label for="example-date-input" class="col-4 col-form-label">Atvykimo Data</label>
                <div class="col-5">
                <input class="form-control" type="date" value="2020-11-11" id="example-date-input">
                </div>
                <div class="form-group">
                <label for="example-date-input" class="col-4 col-form-label">Išvykimo data</label>
                <div class="col-5">
                <input class="form-control" type="date" value="2011-11-18" id="example-date-input">
                </div>
                <div class="form-group">
                    <div class="col-10">
                        <label for="exampleFormControlSelect1">Kambario Tipas</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Vienvietis</option>
                            <option>Dvivietis</option>
                            <option>Trivietis</option>
                        </select>
                    </div>
                </div>
                <div class="col-10">
                    <button type="submit" class="btn btn-secondary">Filtruoti</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin:20px">
    <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Nr.</th>
        <th scope="col">Kambario Tipas</th>
        <th scope="col">Kambario Kaina</th>
        <th scope="col">Wifi</th>
        <th scope="col">TV</th>
        <th scope="col">Atvykimo Data</th>
        <th scope="col">Išvykimo Data</th>
        <th scope="col">Rezervuoti</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr>
        <th scope="row">{{$loop->index+1}}</th>
        @switch($room->room_type)
        @case('single')
            <td>Vienvietis</td>
            @break
        @case('double')
            <td>Dvivietis</td>
            @break
        @default
           <td>Trivietis</td>
        @endswitch
        <td>{{$room->room_price }}&euro;</td>
        <td>{{$room->wifi ? 'Yra' : 'Nera' }}</td>
        <td>{{$room->tv ? 'Yra' : 'Nera' }}</td>
        <td>{{$room->arrival_time }}</td>
        <td>{{$room->departure_time }}</td>
        <td><button type="button" class="btn btn-success">Užsisakyti</button></td>
        </tr>
    @endforeach
    </tbody>
    </table>
<div>
@endsection
