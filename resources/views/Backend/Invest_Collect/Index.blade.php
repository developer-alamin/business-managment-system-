@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Investor Collection</h6>
            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Create</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($investCollects->count() > 0)
                    <tbody>
                        @foreach ($investCollects as $key => $investCollect)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $investCollect->investor->name }}</td>
                            <td>{{ $investCollect->amount }}</td>
                            <td>{{ $investCollect->month }}</td>
                            <td>{{ $investCollect->year }}</td>
                            <td>{{ $investCollect->created_at->diffForHumans() }}</td>
                            <td>
                                @if ($investCollect->investor->photo)
                                <img class="table_img" src="{{ $investCollect->investor->photo }}" alt="">
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('collecttion.edit',$investCollect) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('collecttion.destroy',$investCollect) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="8">Investor Collection Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
                {{ $investCollects->appends(request()->input())->links("pagination::bootstrap-5") }}
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
