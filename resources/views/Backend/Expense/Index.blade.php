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
                            <th>Expence Type</th>
                            <th>Purchase Type</th>
                            <th>Product</th>
                            <th>Payment Method</th>
                            <th>Payment Info</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($expenses->count() > 0)
                    <tbody>
                        @foreach ($expenses as $key => $expense)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $expense->expense_type }}</td>
                            <td>{{ $expense->purchase_type }}</td>
                            <td>{{ $expense->product->product_id }}</td>
                            <td>{{ $expense->method->account_type }}</td>
                            <td>{{ $expense->payment_info }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('expense.edit',$expense) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('expense.destroy',$expense) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="7">Expenses Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
                {{ $expenses->appends(request()->input())->links("pagination::bootstrap-5") }}
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
