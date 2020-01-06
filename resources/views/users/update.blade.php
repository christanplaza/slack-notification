@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $user->name }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('users.update', $user->id) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">
            
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value={{ $user->name }} />
                        </div>
            
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value={{ $user->email }} />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
