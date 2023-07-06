@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Users') }}
                
                                    <a class="nav-link" href="{{ route('users.create') }}">{{ __('Add') }}</a>
                                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Birth date</th>
        <th>Phone Number</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
      <tr>
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->age}}</td>
        <td>{{$user->gender}}</td>
        <td>{{$user->birth_date}}</td>
        <td>{{$user->phone_number}}</td>
        <td>   
          <a href="{{route('users.edit',$user) }}"> Edit</a>
        
        <form action="{{ route('users.destroy',$user) }}" onclick="return confirm('Are you sure you want to delete this item?');" method="POST" >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-primary">
                                    {{ __('Delete') }}
                                </button>
                                    </form></td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



