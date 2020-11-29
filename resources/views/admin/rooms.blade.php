@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                <div class="card-header">{{ __('Kambarių Informacija') }}</div>
                    <div class="card-body">
                        {{ __('Čia galite matyti kambarių informacija.') }}
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
        <th scope="col">Laisvas</th>
        <th scope="col">Kambario Tipas</th>
        <th scope="col">Kambario Kaina</th>
        <th scope="col">Wifi</th>
        <th scope="col">TV</th>
        <th scope="col">Atvykimo Data</th>
        <th scope="col">Išvykimo Data</th>
        <th scope="col">Ištrinti Kambarį</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr>
        <th scope="row">{{$loop->index+1}}</th>
        @if ($room->is_vacant === 0)
            <td style="background-color:#F08080">Rezervuotas</td>
        @else
            <td style="background-color:#3CB371">Nerezervuotas</td>
        @endif

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
        <td>{{$room->room_price }}</td>
        <td>{{$room->wifi ? 'Yra' : 'Nera' }}</td>
        <td>{{$room->tv ? 'Yra' : 'Nera' }}</td>
        <td>{{$room->arrival_time }}</td>
        <td>{{$room->departure_time }}</td>

        <td>
          <form style="display: inline;" method="post" action="{{ route('deleteRoom', $room) }}" onclick="return confirm('Ar tikrai norite pašalinti?')">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Trinti</button>
          </form>
         </td>

        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
