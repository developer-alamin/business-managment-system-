@extends("layouts.app")
@section('title',"Investment Update Page")
@section('content')

@php
    $expenceTypes = ['purchase'=>'Purchase','others'=>'Others Expense'];
    function paymentMethod($method,$expense) : String {
        $result = ($method->id == $expense->payment_method_id) ?'selected':'';
        return $result;
    }
    function expenceTypeSelected($key,$expense) : String {
        $result = ($key == $expense->expense_type) ?'selected':'';
        return $result;
    }
    function products($product,$expense): String {
        $result = ($product->id == $expense->product_id) ?'selected':'';
        return $result;
    }
@endphp

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{ $expense }} Update</h6>
                <a href="{{ route('expense.index') }}" class="ms-auto btn btn-primary">All Services</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('expense.update',$expense) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mt-2">
                        <div class="col-4">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="{{ $expense->date }}">
                        </div>
                        <div class="col-4">
                            <label for="method">Payment Method:</label>
                            <select data-live-search="true" name="method" class="form-select searchSelect" id="method" required>
                                <option value="">Select Payment Method</option>
                                @if ($methods->count() > 0)
                                    @foreach ($methods as $method) 
                                    <option value="{{ $method->id }}" {{ paymentMethod($method,$expense) }}>{{ $method->account_type }}</option>
                                    @endforeach
                                @else
                                <option value="">Payment Method Not Found</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="{{ $expense->amount }}" required>
                        </div>
                        <div class="col-6">
                            <label for="type">Expense Type:</label>
                            <select data-live-search="true" name="type" class="form-select searchSelect" id="type" required>
                                <option value="">Select Expense Type</option>
                                @foreach ($expenceTypes as $key => $expenceType)
                                 <option value="{{ $key }}" {{ expenceTypeSelected($key,$expense) }}>{{ $expenceType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="purchase_type">Purchase type:</label>
                            <select data-live-search="true" name="purchase_type" class="form-select searchSelect" id="purchase_type" required>
                                <option value="">Select Purchase type</option>
                                <option value="goat" {{ ($expense->purchase_type == 'goat') ?'selected':'' }}>Goat</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="product">Products:</label>
                            <select data-live-search="true" name="product" class="form-select searchSelect" id="product" required>
                                <option value="">Select Product</option>
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ products($product,$expense) }}>{{ $product->product_id }}</option>
                                    @endforeach
                                @else
                                <option value="">Product Not Found</option>
                                @endif
                            </select>
                        </div>
                        
                        <div class="col-6">
                            <label for="info">Payment Info:</label>
                            <input type="text" name="info" id="info" class="form-control" value="{{ $expense->payment_info }}" required>
                        </div>
                        <div class="col-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description..">{{ $expense->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2 ms-auto">
                            <button type="submit" class="btn btn-outline-primary form-control">Update</button>
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
        @if (Session::has('update'))
            var update = '{{ Session::get('update');}}';
            Swal.fire({
                title: "Success !",
                text: update,
                icon: "success"
            });
        @endif
        $(document).ready(function(){
            $("#date").datepicker();
            $( "#date" ).datepicker( "option", "showAnim",'slideDown');
            $( "#date" ).datepicker( "option", "dateFormat", "d-M-yy" );
            
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
        })
    </script>
@endpush

