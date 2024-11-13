@extends('layouts.app')
@section('title','Users List Page')
@section('content')
    <div class="row">
        <div class="col-12 m-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>All Users List</h4>
                    @can('users create')
                        <a href="{{ route('users.create') }}" class="btn btn-outline-primary ms-auto">Create users</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td class="">{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ count($user->roles) ? $user->roles->pluck('name')->implode(','):'Default' }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex">
                                        {{-- @can('users edit') --}}
                                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-primary me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- @endcan --}}
                                        {{-- @can('users delete') --}}
                                        <form action="" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        {{-- @endcan --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#table").DataTable({
            pageLength : 10,
            lengthMenu : [5,10,20,50,100]
        });

    })
</script>
@endpush
