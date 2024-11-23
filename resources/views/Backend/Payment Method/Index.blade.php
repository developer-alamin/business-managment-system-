@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Notes</h6>
                <a href="{{ route('method.create') }}" class="ms-auto btn btn-primary">New Method</a>

            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Account Type</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Branch</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($methods->count() > 0)
                    <tbody>
                        @foreach ($methods as $key => $method)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $method->account_type }}</td>
                            <td>{{ $method->account_name }}</td>
                            <td>{{ $method->account_number }}</td>
                            <td>{{ $method->account_branch }}</td>
                            <td>{{ $method->opening_amount }}</td>
                            <td>{{ $method->date }}</td>
                            <td><p class="{{ $method->status }}">{{ $method->status }}</p></td>
                            
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('method.edit',$method) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('method.destroy',$method->id) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="5">Method Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
                {{ $methods->appends(request()->input())->links("pagination::bootstrap-5") }}
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
