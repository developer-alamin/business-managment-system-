@extends("layouts.app")
@section('title',"Investment Update Page")
@section('content')

@php
    function select($old,$new) : String {
        $result = ($old == $new) ? 'selected':'';
        return $result;
    }
@endphp

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Loan Data Update</h6>
                <a href="{{ route('loan.index') }}" class="ms-auto btn btn-primary">All Loan</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('loan.update',$loan) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="{{ $loan->date }}">
                        </div>
                        <div class="col-6">
                            <label for="investor">Investor:</label>
                            <select data-live-search="true" name="investor" class="form-select searchSelect" id="investor" required>
                                <option value="">Select Investor</option>
                                @if ($investors->count() > 0)
                                @foreach ($investors as $investor)
                                <option value="{{ $investor->id }}" {{ select($investor->id,$loan->investor->id) }}>{{ $investor->name }}</option>  
                                @endforeach
                                @else
                                <option value="">Investor Not Found</option>
                                @endif
                            </select>
                        </div>
                        
                        <div class="col-6">
                            <label for="payment_method">Payment Method</label>
                            <select data-live-search="true" name="payment_method" class="form-select searchSelect" id="payment_method">
                               <option value="">Select Payment Method</option>
                                @if ($payments->count() > 0)
                                @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}" {{ select($payment->id,$loan->method->id) }}>{{ $payment->account_type }}</option>
                                @endforeach
                                @else
                                <option value="">This Method Not Found</option>     
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="loan_type">Loan Type</label>
                            <select data-live-search="true" name="loan_type" class="form-select searchSelect" id="loan_type">
                               <option value="">Select Seles Type</option>
                                @if ($loan_types->values)
                                @foreach ($loan_types->values as $loan_type)
                                <option value="{{ $loan_type->value }}" {{ select($loan_type->value,$loan->type ) }}>{{ $loan_type->value }}</option>
                                @endforeach
                                @else
                                <option value="">This Type Not Found</option>     
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="{{ $loan->amount }}" required>
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

