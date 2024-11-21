@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Service Tyoes</h6>
                <a href="{{ route('servicetype.create') }}" class="ms-auto btn btn-primary">New Service Type</a>

            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($serviceTypes->count() > 0)
                    <tbody>
                        @foreach ($serviceTypes as $key => $serviceType)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $serviceType->name }}</td>
                            <td><p class="{{ $serviceType->status }}">{{ $serviceType->status }}</p></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('servicetype.edit',$serviceType) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('servicetype.destroy',$serviceType) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="4">Service Type Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
                {{ $serviceTypes->appends(request()->input())->links("pagination::bootstrap-5") }}
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
