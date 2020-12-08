@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mano užsakyti kambariai') }}</div>
                <div class="card-body">
                    {{ __('Čia galite matyti savo užsakytus kambarius.') }}
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="card-body">
            <div class="container" style="margin:20px">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nr.</th>
                            <th scope="col">Paveiksliukas</th>
                            <th scope="col">Kambario Tipas</th>
                            <th scope="col">Kambario Kaina</th>
                            <th scope="col">Wifi</th>
                            <th scope="col">TV</th>
                            <th scope="col">Atvykimo Data</th>
                            <th scope="col">Išvykimo Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <th scope="row"><img src={{ $reservation->reservationRoom->img_url }} alt="Nera paveiksliuko" style="height:150px;width:150px;" class="img-thumbnail"></th>
                            @switch($reservation->reservationRoom->room_type)
                            @case('single')
                            <td>Vienvietis</td>
                            @break
                            @case('double')
                            <td>Dvivietis</td>
                            @break
                            @default
                            <td>Trivietis</td>
                            @endswitch
                            <td>{{$reservation->reservationRoom->room_price }}&euro;</td>
                            <td>{{$reservation->reservationRoom->wifi ? 'Yra' : 'Nera' }}</td>
                            <td>{{$reservation->reservationRoom->tv ? 'Yra' : 'Nera' }}</td>
                            <td>{{$reservation->arrival_date }}</td>
                            <td>{{$reservation->departure_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endsection