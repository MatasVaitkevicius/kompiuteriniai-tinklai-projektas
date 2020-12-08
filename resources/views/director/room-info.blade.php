@extends('layouts.director')

@section('content')
<div class="card-body">
    <div class="container">
        <table class="table table-bordered">
            <div class="card">
                <div class="card-header">{{ __('Kambarių Statistika') }}</div>
            </div>
    </div>
    <thead class="thead-dark">
        <tr>
            <th scope="col">Kambarių Kiekis</th>
            <th scope="col">Bendra Kambarių Kaina</th>
            <th scope="col">Brangiausias Kambarys</th>
            <th scope="col">Pigiausias Kambarys</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $roomCount }}</td>
            <td>{{ $totalRoomPrice }}&euro;</td>
            <td>{{ $mostExpensiveRoom }}&euro;</td>
            <td>{{ $cheapestRoom }}&euro;</td>
        </tr>
    </tbody>
    </table>
</div>

<div class="container">
    <div class="card-body">
        <div class="card">
            <div class="card-header">{{ __('Populiariausias Kambarys') }}</div>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Paveiksliukas</th>
                    <th scope="col">Kambario Tipas</th>
                    <th scope="col">Kambario Kaina</th>
                    <th scope="col">Wifi</th>
                    <th scope="col">TV</th>
                    <th scope="col">Rezervacijų Skaičius</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><img src={{ $room->img_url }} alt="Nera paveiksliuko" style="height:150px;width:150px" class="img-thumbnail"></th>
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
                    <td>{{$room->reservation_count }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endsection