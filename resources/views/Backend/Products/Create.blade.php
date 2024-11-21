@extends("layouts.app")
@section('title',"Notice Create Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Add New Product</h6>
                <a href="{{ route('product.index') }}" class="ms-auto btn btn-primary">All Products</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-6">
                            <label for="product_id">Product Id:</label>
                            <input type="text" name="product_id" id="product_id" class="form-control" placeholder="P-000001" required>

                        </div>
                        <div class="col-6">
                            <label for="type">Product Type:</label>
                            <select data-live-search="true" name="type" id="type" class="form-select searchSelect" required>
                                <option value="">Select Type</option>
                                <option value="goat">Goat</option>
                                <option value="crow">Crow</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="gender">Gender:</label>
                            <select data-live-search="true" name="gender" id="gender" class="form-select searchSelect" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="parent">Parent Id:</label>
                            <select data-live-search="true" name="parent" id="parent" class="form-select searchSelect">
                                <option value="">Select Parent</option>
                                @foreach ($parents as $parent)
                                 <option value="{{ $parent->id }}">{{ $parent->product_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="status">Status:</label>
                            <select data-live-search="true" name="status" id="status" class="form-select searchSelect" required>
                               <option value="">Select Status</option>
                                <option value="healthly">Healthy</option>
                                <option value="dead">Dead</option>
                                <option value="sick">Sick</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="note">Note:</label>
                            <input type="text" name="note" id="note" class="form-control" placeholder="Note">
                        </div>
                        <div class="col-6">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="Date" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2 ms-auto">
                            <button type="submit" class="btn btn-outline-primary form-control">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script >
        @if (Session::has('success'))
            var success = '{{ Session::get('success');}}';
            Swal.fire({
                title: "Success !",
                text: success,
                icon: "success"
            });
        @endif
        $(document).ready(function(){
            $('.searchSelect').select2();
            $("#date").datepicker();
            $( "#date" ).datepicker( "option", "showAnim",'slideDown');
        })
    </script>
@endpush

