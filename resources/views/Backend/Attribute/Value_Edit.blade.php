@extends("layouts.app")
@section('title',"Note Edit Page")
@section('content')
@php
    function status($value,$select) : String {
        $result = ($value->status == $select) ? 'selected':'';
        return $result;
    }
@endphp
<div class="row">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{ $value->value }} Update</h6>
                <a href="{{ route('attributes.values',$value->attribute->slug) }}" class="ms-auto btn btn-primary">Back</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('attributes.value.update',['slug' => $value->attribute->slug,'value' => $value]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <label for="value">Value:</label>
                            <input type="text" name="value" id="value" class="form-control" value="{{ $value->value }}" required>
                            @if ($errors->has("value"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("value") }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active" {{ status($value,'active') }}>Active</option>
                                <option value="in-active" {{ status($value,'in-active') }}>In-active</option>
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
