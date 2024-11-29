@extends("layouts.app")
@section('title',"Notice Create Page")
@section('content')
<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{ $attribute->type }} | Attribute Details</h6>
                <a href="{{ route('attribute.index') }}" class="ms-auto btn btn-primary">All Attributes</a>
            </div>
            <div class="card-body pt-2">
               <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($attribute->values->count() > 0)
                            @foreach ($attribute->values as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->value }}</td>
                                    <td><p class="{{ $value->status }}">{{ ucwords($value->status) }}</p></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('attributes.value.edit',['slug' => $attribute->slug,'value' => $value]) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                            <button data-href="{{ route('attributes.value.delete',['slug' => $attribute->slug,'value' => $value]) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tfoot>
                            <tr class="text-center">
                                <td colspan="4">{{ $attribute->type }} Value Not Found</td>
                            </tr>
                        </tfoot>
                        @endif
                    </tbody>
               </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h6>Add New Attribute Value</h6>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('attributes.value.store',$attribute->slug) }}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" value="{{ $attribute->id }}" name="attribute_id" id="attribute_id">
                        <div class="col-12">
                            <label for="type">Attribute Type:</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ $attribute->type }}" readonly>
                        </div>
                        <div class="col-12">
                            <label for="value">Attribute Value:</label>
                            <input type="text" name="value" id="value" class="form-control" placeholder="Attribute Value" required>
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
                        <div class="col-4 ms-auto">
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
