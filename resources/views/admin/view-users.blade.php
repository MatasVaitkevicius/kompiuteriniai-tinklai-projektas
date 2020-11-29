@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                <div class="card-header">{{ __('Vartotojų sąrašas') }}</div>
                    <div class="card-body">
                        {{ __('Čia galite matyti vartotojų paskyras.') }}
                    </div>
            </div>
         </div>
    </div>
<div class="card-body">
<div class="container" style="margin:20px">
    <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Nr.</th>
        <th scope="col">Vartotojo slapyvardis</th>
        <th scope="col">Vartotojo elektroninis paštas</th>
        <th scope="col">Paskyra sukurta</th>
        <th scope="col">Ištrinti paskyrą</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td>{{$user->name }}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at }}</td>
        <td>
          <form style="display: inline;" method="post" action="{{ route('deleteUser', $user) }}" onclick="return confirm('Ar tikrai norite pašalinti?')">
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
