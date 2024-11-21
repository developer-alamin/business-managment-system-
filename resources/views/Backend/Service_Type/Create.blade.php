@extends("layouts.app")
@section('title',"Notice Create Page")
@section('content')
<div class="row">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Add New Service Type</h6>
                <a href="{{ route('servicetype.index') }}" class="ms-auto btn btn-primary">All Service Types</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('servicetype.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Type Name.." required>
                        </div>
                        <div class="col-12">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="in-active">In-active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4 ms-auto">
                            <button type="submit" class="btn btn-outline-primary form-control">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script >
        @if (Session::has('success'))
            var success = '{{ Session::get('success');}}';
            Swal.fire({
                title: "Success !",
                text: success,
                icon: "success"
            });
        @endif
        $(document).ready(function(){
        })
    </script>
@endpush

