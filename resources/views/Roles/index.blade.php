@extends('layouts.app')
{{-- @php
    use Carbon\Carbon;
    $now = Carbon::now(); // Assume $now is 2023-01-01 00:00:00
    $yesterday = Carbon::yesterday();
@endphp --}}
@section('title','Role List Page')
@section('content')
    <div class="row">
        <div class="col-12 m-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>All Roles List</h4>
                    @can('role create')
                        <a href="{{ route('roles.create') }}" class="btn btn-outline-primary ms-auto">Create Role</a>
                    @endcan

                </div>
                <div class="card-body ">
                    <table id="table" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Parmission</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $role->name }}</td>
                                <td >
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i data-id="{{ $role->id }}" class="fas fa-eye toggle_eye text-success"></i>
                                        <div class="perWrapper" data-id="{{ $role->id }}">
                                            <ul class="ul_permission_wrap">
                                                @foreach ($role->permissions as $item)
                                                    <li class="permission_name">{{ $item->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $role->created_at }}</td>
                                <td class="">
                                    <div class="d-flex justify-content-center">
                                        @can('role edit')
                                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-outline-primary me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @endcan
                                        @can('role delete')
                                        <form action="{{ route('roles.destroy',$role) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @endcan
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
    <script>
       $(document).ready(function(){
            $("#table").DataTable({
                pageLength : 10,
                lengthMenu : [5,10,20,50,100]
            });

           $(".toggle_eye").click(function (e) {
                e.preventDefault();
                $(".perWrapper").fadeOut(500);
                $(this).next().toggle(500);
                console.log();

            });

       })

    </script>
@endpush
