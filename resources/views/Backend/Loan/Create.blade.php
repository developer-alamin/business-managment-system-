@extends("layouts.app")
@section('title',"Invesment Create Page")

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Add New Loan</h6>
                <a href="{{ route('loan.index') }}" class="ms-auto btn btn-primary">All Loan</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('loan.store') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="{{ date('m/d/Y') }}" required>
                        </div>
                        <div class="col-6">
                            <label for="investor">Investor:</label>
                            <select data-live-search="true" name="investor" class="form-select searchSelect" id="investor" required>
                                <option value="">Select Investor</option>
                                @if ($investors->count() > 0)
                                @foreach ($investors as $investor)
                                <option value="{{ $investor->id }}">{{ $investor->name }}</option>  
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
                                <option value="{{ $payment->id }}">{{ $payment->account_type }}</option>
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
                                <option value="{{ $loan_type->value }}">{{ $loan_type->value }}</option>
                                @endforeach
                                @else
                                <option value="">This Type Not Found</option>     
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 ms-auto mt-2">
                            <button type="submit" class="btn btn-primary form-control">Save</button>
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
        });
    </script>
@endpush

