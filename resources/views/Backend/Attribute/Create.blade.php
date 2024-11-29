@extends("layouts.app")
@section('title',"Notice Create Page")
@section('content')
<div class="row">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Add New Attribue</h6>
                <a href="{{ route('attribute.index') }}" class="ms-auto btn btn-primary">All Attributes</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('attribute.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="category">Category:</label>
                            <input type="text" name="category" id="category" class="form-control" placeholder="Enter Category.." required>
                        </div>
                        <div class="col-12">
                            <label for="type">Type:</label>
                            <input type="text" name="type" id="type" class="form-control" placeholder="Enter Type.." required>
                            @if ($errors->has("type"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("type") }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Slug..">
                            @if ($errors->has("slug"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("slug") }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="in-active">In-active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3 ms-auto">
                            <button type="submit" class="btn btn-primary form-control">Save</button>
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
