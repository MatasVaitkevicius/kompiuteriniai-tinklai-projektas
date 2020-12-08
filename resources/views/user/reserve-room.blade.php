@extends('layouts.user')

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
                <div class="card-header">{{ __('Užklausos duomenys') }}</div>
                <div class="card-body">
                    <form method="get" action="{{ route('filterRooms') }}">
                        <div class="form-group">
                            <label for="example-date-input" class="col-6 col-form-label">Atvykimo Data</label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="{{ $arrivalDate ?? date('Y-m-d', strtotime("+1 day")) }}" id="arrival_date" name="arrival_date">
                            </div>

                            <div class="form-group">
                                <label for="example-date-input" class="col-6 col-form-label">Išvykimo data</label>
                                <div class="col-10">
                                    <input class="form-control" type="date" value="{{ $departureDate ?? date('Y-m-d', strtotime("+2 day")) }}" id="departure_date" name="departure_date">
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
                                <div class="col-10">
                                    <button type="submit" class="btn btn-info">Filtruoti</button>
                                </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin:20px">
    @if($rooms)
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
                <th scope="col">Rezervuoti</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <th scope="row"><img src={{ $room->img_url }} alt="Nera paveiksliuko" style="width:150px;height:150px;" class="img-thumbnail"></th>
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
                <td>{{ $arrivalDate ?? 'mm-dd-yyyy' }}</td>
                <td>{{ $departureDate ?? 'mm-dd-yyyy' }}</td>
                <form style="display: inline;" method="post" action="{{ route('makeReservation', $room) }}" onclick="return confirm('Ar tikrai norite užsirezervuoti kambarį?')">
                    <div style="display:none">
                        <input type="text" value={{$arrivalDate ?? '' }} id="arrival_date" name="arrival_date">
                        <input type="text" value={{$departureDate ?? ''}} id="departure_date" name="departure_date">
                    </div>
                    <td>
                        @csrf
                        @method('POST')
                        @if($arrivalDate ?? '')
                        <button type="submit" class="btn btn-danger">Rezervuoti</button>
                        @endif
                </form>
                </td>
            </tr>
            @empty
            <td>NERASTA KAMBARIŲ ATITINKANČIŲ FILTRĄ</td>
            @endforelse
        </tbody>
    </table>
    @endif
    <div>
        @endsection