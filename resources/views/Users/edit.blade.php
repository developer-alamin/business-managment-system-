@extends('layouts.app')
@section('title','User Edit Page')
@section('content')
    <div class="row">
        <div class="col-12 m-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>{{ $user->name  }} Update</h4>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-primary ms-auto">All Users</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update',$user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="col-6">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="col-6">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="col-12">
                                <label>Role Select:</label>
                                <div class="roles_items d-flex">
                                    @foreach ($roles as $role)
                                        <div class="role_item">
                                            <input {{ $hasRoles->contains($role->id) ?'checked':'' }} type="checkbox" id="role{{ $role->id }}" name="role[]" value="{{ $role->id }}" >
                                            <label for="role{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <button class="btn btn-outline-success form-control ">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
