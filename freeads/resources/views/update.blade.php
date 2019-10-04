@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('edit') }}"> {{csrf_field()}}
                        @csrf

                        <div class="form-group row">
                            <div><label>Modifies ton nom : </label><input name="name" value="{{ Auth::user()->name}}" for="name" class="col-md-4 col-form-label text-md-right"></div>

                            <div><label>Modifies ton email : </label><input name="email" value="{{ Auth::user()->email}}" for="email" class="col-md-4 col-form-label text-md-right"></div>
                            <div><label>Modifies ton password : </label><input name="password"  for="password" class="col-md-4 col-form-label text-md-right"></div>
                            <input type="submit" value="Modifier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- value="{{ Auth::user()->password}}" -->