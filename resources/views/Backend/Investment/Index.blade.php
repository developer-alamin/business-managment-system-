@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Investments</h6>
                <a href="{{ route('investment.create') }}" class="btn btn-outline-primary ms-auto">New Investment</a>
            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Product</th>
                            <th>Member</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($investments->count() > 0)
                    <tbody>
                        @foreach ($investments as $key => $investment)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{ ($investment->product) ? $investment->product->product_id:'' }}
                            </td>
                            <td>
                                {{ ($investment->member) ? $investment->member->name:'' }}
                            </td>
                            <td>{{ $investment->date }}</td>
                            <td>{{ $investment->investment_qty }}</td>
                            <td>{{ $investment->note }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('investment.edit',$investment) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('investment.destroy',$investment) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="7">Investment Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
                {{ $investments->appends(request()->input())->links("pagination::bootstrap-5") }}
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
