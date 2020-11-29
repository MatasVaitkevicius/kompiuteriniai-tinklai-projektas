@extends('layouts.director')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                <div class="card-header">{{ __('Darbuotojų sąrašas') }}</div>
                    <div class="card-body">
                        {{ __('Čia galite matyti darbuotojų paskyras.') }}
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
        <th scope="col">Darbuotojo slapyvardis</th>
        <th scope="col">Darbuotojo elektroninis paštas</th>
        <th scope="col">Darbuotojo tipas</th>
        <th scope="col">Paskyra sukurta</th>
        <th scope="col">Ištrinti Paskyrą</th>
        </tr>
    </thead>
    <tbody>
    @foreach($admins as $admin)
        <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td>{{$admin->name }}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->user_type}}</td>
        <td>{{$admin->created_at }}</td>
        <td>
          <form style="display: inline;" method="post" action="{{ route('deleteAdmin', $admin) }}" onclick="return confirm('Ar tikrai norite pašalinti?')">
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
