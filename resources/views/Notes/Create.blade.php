@extends("layouts.app")
@section('title',"Notice Create Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Add New Note</h4>
                <a href="{{ route('note.index') }}" class="ms-auto btn btn-primary">All Notes</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('note.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Notice Name.." required>
                        </div>
                        <div class="col-6">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">In-active</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description.."></textarea>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-2 ms-auto">
                            <button type="submit" class="btn btn-outline-primary form-control">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@if (Session::has('success'))
@push('scripts')
    <script >
        $(document).ready(function(){
            var success = '{{ Session::get('success');}}';
            Swal.fire({
                title: "Success !",
                text: success,
                icon: "success"
            });

        })
    </script>
@endpush
@endif
