@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('users.edit',Auth::user()->id) }}"> Edit Your Detail</a>

                    <ul class="list-group">
  <li class="list-group-item">First Name:   {{ Auth::user()->first_name }}</li>
  <li class="list-group-item">Last Name:   {{ Auth::user()->last_name }}</li>
  <li class="list-group-item">Email:   {{ Auth::user()->email }}</li>
  <li class="list-group-item">Age:   {{ Auth::user()->age }}</li>
  <li class="list-group-item">Gender:   {{ Auth::user()->gender }}</li>
  <li class="list-group-item">DOB:   {{ Auth::user()->birth_date }}</li>
  <li class="list-group-item">Phone number:   {{ Auth::user()->phone_number }}</li>
</ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
