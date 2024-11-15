@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Investors</h6>
                <a href="{{ route('investor.create') }}" class="btn btn-outline-primary ms-auto">New Investor</a>
            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($investors->count() > 0)
                    <tbody>
                        @foreach ($investors as $key => $investor)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $investor->name }}</td>
                            <td>{{ $investor->email }}</td>
                            <td>{{ $investor->phone }}</td>
                            <td>
                                @if ($investor->photo)
                                 <img class="table_img" src="{{ $investor->photo }}" alt="">

                                @endif
                            </td>
                            <td>{{ $investor->address }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('investor.edit',$investor) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('investor.destroy',$investor->id) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="7">Investor Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
                {{ $investors->appends(request()->input())->links("pagination::bootstrap-5") }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
    @include('Modal.confirm-delete');
@endsection

@if (Session::has('deleted'))
@push('scripts')
    <script >
        $(document).ready(function(){
            var deleted = '{{ Session::get('deleted');}}';
            Swal.fire({
                title: "Deleted !",
                text: deleted,
                icon: "success"
            });
        })
    </script>
@endpush
@endif
