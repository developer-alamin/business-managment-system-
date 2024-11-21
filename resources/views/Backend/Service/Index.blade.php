@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Services</h6>
                <a href="{{ route('service.create') }}" class="btn btn-outline-primary ms-auto">New Service</a>
            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Doctor</th>
                            <th>Service</th>
                            <th>Member</th>
                            <th>Product</th>
                            <th>Note</th>
                            <th>Create</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($services->count() > 0)
                    <tbody>
                        @foreach ($services as $key => $service)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $service->doctor->name }}</td>
                            <td>{{ $service->serviceType->name }}</td>
                            <td>{{ $service->member->name }}</td>
                            <td>{{ $service->product->product_id }}</td>
                            <td>{{ $service->note }}</td>
                            <td>{{ $service->created_at }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('service.edit',$service) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('service.destroy',$service) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="7">Service Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
                {{ $services->appends(request()->input())->links("pagination::bootstrap-5") }}
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
