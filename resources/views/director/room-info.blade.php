@extends('layouts.director')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kambarių Statistika') }}</div>
                  <div class="card-body">
                      {{ __('Čia galite matyti kambarių statistiką.') }}
                  </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
<div class="container">
    <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Kambarių Kiekis</th>
        <th scope="col">Rezervuotų Kambarių</th>
        <th scope="col">Bendra Kambarių Kaina</th>
        <th scope="col">Brangiausias Kambarys</th>
        <th scope="col">Pigiausias Kambarys</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{ $roomCount }}</td>
        <td>{{ $notVacantRoomCount }}</td>
        <td>{{ $totalRoomPrice }}&euro;</td>
        <td>{{ $mostExpensiveRoom }}&euro;</td>
        <td>{{ $cheapestRoom }}&euro;</td>
        </tr>
    </tbody>
    </table>
</div>
@endsection
