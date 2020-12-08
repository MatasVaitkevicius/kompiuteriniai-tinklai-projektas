@extends('layouts.app')

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
                    <form method="get" action="{{ route('filter') }}">
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
<div>
    <h3>Jeigu Norite Rezervuoti Kambarį, Jums Prireiks Užsiregistruoti!</h3>
</div>

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
            @forelse($rooms as $room)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
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
                <td>{{ $arrivalDate ?? 'mm-dd-yyyy' }}</td>
                <td>{{ $departureDate ?? 'mm-dd-yyyy' }}</td>
            </tr>
            @empty
            <td>NERASTA KAMBARIŲ ATITINKANČIŲ FILTRĄ</td>
            @endforelse
        </tbody>
    </table>
    <div>
        @endsection