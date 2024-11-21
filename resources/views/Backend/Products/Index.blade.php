@extends("layouts.app")
@section('title',"Member Index Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Products</h6>
                <a href="{{ route('product.create') }}" class="btn btn-outline-primary ms-auto">New Product</a>
            </div>
            <div class="card-body pt-2">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Product Id</th>
                            <th>Type</th>
                            <th>Gender</th>
                            <th>Parent Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if ($products->count() > 0)
                    <tbody>
                        @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->product_id }}</td>
                            <td>{{ $product->product_type }}</td>
                            <td>{{ $product->gender }}</td>
                            <td>
                              @if ($product->parent)
                                {{ $product->parent->product_id }}
                              @endif
                            </td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->date }}</td>
                            <td>{{ $product->note }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('product.edit',$product) }}" class="btn btn-outline-success me-1"><i class="fas fa-edit"></i></a>
                                    <button data-href="{{ route('product.destroy',$product) }}" class="btn btn-outline-danger confirm-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="7">Product Data Not Found</td>
                        </tr>
                    </tfoot>
                    @endif

                </table>
                {{ $products->appends(request()->input())->links("pagination::bootstrap-5") }}
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
