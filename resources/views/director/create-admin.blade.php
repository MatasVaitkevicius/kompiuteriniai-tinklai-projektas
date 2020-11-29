@extends('layouts.director')

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
</div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                <div class="card-header">{{ __('Sukurti darbuotojo paskyrą') }}</div>
                    <div class="card-body">
                    <form method="post" action="{{ route('createAdmin') }}">
                      @csrf
                      <div class="form-group">
                        <label for="name">Slapyvardis</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Įveskite slapyvardį">
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="email">Elektroninis Paštas</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Įveskite elektroninį paštą">
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="password">Slaptažodis</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Slaptažodis">
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-success">Sukurti paskyrą</button>
                    </form>
                  </div>
            </div>
         </div>
    </div>
</div>
@endsection
