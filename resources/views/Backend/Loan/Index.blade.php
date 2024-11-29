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
                            <th>Investor</th>
                            <th>Payment</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($loans->count() > 0)
                    <tbody>
                        @foreach ($loans as $key => $loan)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $loan->investor->name }}</td>
                            <td>{{ $loan->method->account_type }}</td>
                            <td>{{ $loan->type }}</td>
                            <td>{{ $loan->amount }}</td>
                            <td>{{ $loan->date }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('loan.edit',$loan) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('loan.destroy',$loan) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
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
                {{ $loans->appends(request()->input())->links("pagination::bootstrap-5") }}
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
