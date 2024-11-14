@extends('layouts.app')
@section('title',"Role Create Page")
@section('content')
    <div class="row">
        <div class="col-12 m-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>New Create Roles</h4>
                    <a href="{{ route('roles.index') }}" class="btn btn-outline-primary ms-auto">All Roles</a>
                </div>
                <div class="card-body ">
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="col-6">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Role Name..">
                            </div>
                            <div class="col-12 mt-2 d-flex">
                                @foreach ($permissions as $item)
                                <div class="permission_item">
                                    <input type="checkbox" name="permissions[]" id="permissions{{ $item->id }}" value="{{ $item->id }}">
                                    <label for="permissions{{ $item->id }}">{{ $item->name }} </label>
                                 </div>
                                @endforeach

                            </div>
                            <div class="col-3 mt-2">
                                <button class="btn btn-outline-primary form-control">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
