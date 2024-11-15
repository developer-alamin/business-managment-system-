@extends("layouts.app")
@section('title',"Note Edit Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>{{ $note->name }} Update</h4>
                <a href="{{ route('note.index') }}" class="ms-auto btn btn-primary">All Member</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('note.update',$note) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $note->name }}">
                        </div>
                        <div class="col-6">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active" {{ ($note->status == 'active') ? 'selected':''  }}>Active</option>
                                <option value="inactive" {{ ($note->status == 'inactive') ? 'selected':'' }}>In-active</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control">{{ $note->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2 ms-auto">
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
