@extends('layouts.app')
@section('title','Permission List Page')
@section('content')
    <div class="row">
        <div class="col-12 m-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Create Permission</h4>
                    <a href="{{ route('permission.create') }}" class="btn btn-outline-primary ms-auto">Create Permission</a>
                </div>
                <div class="card-body pt-2">
                    <table id="table" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Create</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $key => $permission)
                            <tr>
                                <td class="text-center">{{ $key +1 }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('permission.edit',$permission) }}" class="btn btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('permission.destroy',$permission) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>                                    </div>
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

        if('{{ Session::has('success'); }}'){
            var deleteData = '{{ Session::get('success');}}';
            toastr.success(deleteData);
        }
    })
</script>
@endpush
