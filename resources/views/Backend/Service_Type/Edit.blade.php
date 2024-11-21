@extends("layouts.app")
@section('title',"Note Edit Page")
@section('content')
<div class="row">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>{{ $serviceType->name }} Update</h4>
                <a href="{{ route('servicetype.index') }}" class="ms-auto btn btn-primary">All Service Types</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('servicetype.update',$serviceType) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $serviceType->name }}" required>
                        </div>
                        <div class="col-12">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active" {{ ($serviceType->status == 'active') ? 'selected':''  }}>Active</option>
                                <option value="in-active" {{ ($serviceType->status == 'in-active') ? 'selected':'' }}>In-active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4 ms-auto">
                            <button type="submit" class="btn btn-outline-primary form-control">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@if (Session::has('update'))
@push('scripts')
    <script >
        $(document).ready(function(){
            var update = '{{ Session::get('update');}}';
           Swal.fire({
                title: "Updated !",
                text: update,
                icon: "success"
            });
        })
    </script>
@endpush
@endif
