@extends("layouts.app")
@section('title',"Investment Update Page")
@section('content')
@php
    function select($value,$selectValue) : String {
        $result = ($value == $selectValue) ? 'selected':'';
        return $result;
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{ $income->income_type }} Update</h6>
                <a href="{{ route('income.index') }}" class="ms-auto btn btn-primary">All Incomes</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('income.update',$income) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mt-2">
                        <div class="col-4">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="{{ $income->date }}">
                        </div>
                        <div class="col-4">
                            <label for="income_type">Income Type</label>
                            <select data-live-search="true" name="income_type" class="form-select searchSelect" id="income_type">
                               <option value="">Select Income Type</option>
                                @if ($income_types->values->count() > 0)
                                @foreach ($income_types->values as $income_type)
                                <option value="{{ $income_type->value }}" {{ select($income_type->value,$income->income_type)  }}>{{ $income_type->value }}</option>
                                @endforeach
                                @else
                                <option value="">This Type Not Found</option>     
                                @endif
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="seles_type">Seles Type</label>
                            <select data-live-search="true" name="seles_type" class="form-select searchSelect" id="seles_type">
                               <option value="">Select Seles Type</option>
                                @if ($seles_types->values)
                                @foreach ($seles_types->values as $seles_type)
                                <option value="{{ $seles_type->value }}" {{ select($seles_type->value,$income->seles_type)  }}>{{ $seles_type->value }}</option>
                                @endforeach
                                @else
                                <option value="">This Type Not Found</option>     
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="product">Product Id</label>
                            <select data-live-search="true" name="product" class="form-select searchSelect" id="product">
                               <option value="">Select Product Id</option>
                                @if ($products->count() > 0)
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ select($product->id,$income->product_id)  }}>{{ $product->product_id }}</option>
                                @endforeach
                                @else
                                <option value="">Product Id Not Found</option>     
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="payment_method">Payment Method</label>
                            <select data-live-search="true" name="payment_method" class="form-select searchSelect" id="payment_method">
                               <option value="">Select Payment Method</option>
                                @if ($payments->count() > 0)
                                @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}" {{ select($payment->id,$income->payment_method_id )  }}>{{ $payment->account_type }}</option>
                                @endforeach
                                @else
                                <option value="">This Method Not Found</option>     
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="info">Payment Info:</label>
                            <input type="text" name="info" id="info" class="form-control" value="{{ $income->payment_info }}" required>
                        </div>
                        <div class="col-6">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="{{ $income->amount }}" required>
                        </div>
                        <div class="col-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description..">{{ $income->description }}</textarea>
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

