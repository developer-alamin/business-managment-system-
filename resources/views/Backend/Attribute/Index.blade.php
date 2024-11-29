@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Attributes</h6>
                <a href="{{ route('attribute.create') }}" class="ms-auto btn btn-primary">New Attribute</a>
            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($attributes->count() > 0)
                    <tbody>
                        @foreach ($attributes as $key => $attribute)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $attribute->category }}</td>
                            <td>{{ $attribute->type }}</td>
                            <td><p class="{{ $attribute->status }}">{{ ucwords($attribute->status) }}</p></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('attributes.values',$attribute->slug) }}" class="btn btn-outline-primary me-1"><i class="fas fa-cog"></i></a>
                                    <a href="{{ route('attribute.edit',$attribute) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('attribute.destroy',$attribute) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="5">Notes Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
                {{ $attributes->appends(request()->input())->links("pagination::bootstrap-5") }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
    @include('Modal.confirm-delete');
@endsection

@if (Session::has('success'))
@push('scripts')
    <script >
        $(document).ready(function(){
            var success = '{{ Session::get('success');}}';
            Swal.fire({
                title: "Deleted !",
                text: success,
                icon: "success"
            });

        })
    </script>
@endpush
@endif
