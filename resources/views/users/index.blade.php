@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($users as $user)
                            <li class="list-group-item">
                                {{ $user->name }}

                                <div class="float-right">
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        Edit
                                    </a>
                                    |
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
