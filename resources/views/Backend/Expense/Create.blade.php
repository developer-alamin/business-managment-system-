@extends("layouts.app")
@section('title',"Invesment Create Page")

@section('content')
@php
    $expenceTypes = ['purchase'=>'Purchase','others'=>'Others Expense'];
@endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Add New Expense</h6>
                <a href="{{ route('expense.index') }}" class="ms-auto btn btn-primary">All Expenses</a>
            </div>
            <div class="card-body pt-2">
                
                <form action="{{ route('expense.store') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-4">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="Enter Date" required>
                        </div>
                        <div class="col-4">
                            <label for="method">Payment Method:</label>
                            <select data-live-search="true" name="method" class="form-select searchSelect" id="method" required>
                                <option value="">Select Payment Method</option>
                                @if ($methods->count() > 0)
                                    @foreach ($methods as $method)
                                    <option value="{{ $method->id }}">{{ $method->account_type }}</option>
                                    @endforeach
                                @else
                                <option value="">Payment Method Not Found</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required>
                        </div>
                        <div class="col-6">
                            <label for="type">Expense Type:</label>
                            <select data-live-search="true" name="type" class="form-select searchSelect" id="type" required>
                                <option value="">Select Expense Type</option>
                                @foreach ($expenceTypes as $key => $expenceType)
                                 <option value="{{ $key }}">{{ $expenceType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="purchase_type">Purchase type:</label>
                            <select data-live-search="true" name="purchase_type" class="form-select searchSelect" id="purchase_type" required>
                                <option value="">Select Purchase type</option>
                                <option value="goat">Goat</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="product">Products:</label>
                            <select data-live-search="true" name="product" class="form-select searchSelect" id="product" required>
                                <option value="">Select Product</option>
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_id }}</option>
                                    @endforeach
                                @else
                                <option value="">Product Not Found</option>
                                @endif
                            </select>
                        </div>
                        
                        <div class="col-6">
                            <label for="info">Payment Info:</label>
                            <input type="text" name="info" id="info" class="form-control" placeholder="Enter Payment Info" required>
                        </div>
                        <div class="col-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description.."></textarea>
                        </div>
                        <div class="col-2 ms-auto mt-2">
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


            $("#member").change(function (e) {
                e.preventDefault();

                const id = $(this).val();
                const product = $("#product");
                product.html('')
                product.append('<option><span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status">Loading...</span></option>')
              
                $.ajax({
                    type: "GET",
                    url: "{{ route('servicesmemberbyproduct') }}",
                    data: {id:id},
                    success: function (res) {
                        product.html(res);
                    }
                });
            });
        });
    </script>
@endpush

