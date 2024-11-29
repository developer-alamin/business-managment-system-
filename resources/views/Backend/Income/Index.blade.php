@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Services</h6>
                <a href="{{ route('income.create') }}" class="btn btn-outline-primary ms-auto">New Income</a>
            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Income Type</th>
                            <th>Seles Type</th>
                            <th>Product</th>
                            <th>Method</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($incomes->count() > 0)
                    <tbody>
                        @foreach ($incomes as $key => $income)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $income->income_type }}</td>
                            <td>{{ $income->seles_type }}</td>
                            <td>
                            @if ($income->product)
                            {{ $income->product->product_id  }}
                            @endif
                            </td>
                            <td>
                                @if ($income->method)
                                {{ $income->method->account_type  }}
                                @endif
                            </td>
                            <td>{{ $income->amount }}</td>
                            <td>{{ $income->date }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('income.edit',$income) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('income.destroy',$income) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
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
                {{ $incomes->appends(request()->input())->links("pagination::bootstrap-5") }}
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
