@extends("layouts.app")
@section('title',"Note Edit Page")
@section('content')
@php
    function status($attribute,$value) : String {
        $result = ($attribute->status == $value) ? 'selected':'';
        return $result;
    }
@endphp
<div class="row">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{ $attribute->type }} Update</h6>
                <a href="{{ route('attribute.index') }}" class="ms-auto btn btn-primary">All Attributes</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('attribute.update',$attribute) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <label for="category">Category:</label>
                            <input type="text" name="category" id="category" class="form-control" value="{{ $attribute->category }}" required>
                        </div>
                        <div class="col-12">
                            <label for="type">Type:</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ $attribute->type }}" required>
                            @if ($errors->has("type"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("type") }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $attribute->slug }}">
                            @if ($errors->has("slug"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("slug") }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active" {{ status($attribute,'active') }}>Active</option>
                                <option value="in-active" {{ status($attribute,'in-active') }}>In-active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4 ms-auto">
                            <button type="submit" class="btn btn-primary form-control">Update</button>
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
