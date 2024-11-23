@extends("layouts.app")
@section('title',"Payment Method Create Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{ $method->account_type }} Update</h6>
                <a href="{{ route('method.index') }}" class="ms-auto btn btn-primary">All Payment Methods</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('method.update',$method) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-4">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="{{ $method->date }}">
                        </div>
                        <div class="col-4">
                            <label for="type">Account Type:</label>
                            <select name="type" id="type" class="form-select searchSelect" required>
                                <option value="">Select Payment Method</option>
                                <option value="cash" {{ ($method->account_type == 'cash') ?'selected':'' }}>Cash</option>
                                <option value="mobile_bank" {{ ($method->account_type == 'mobile_bank') ?'selected':'' }}>Mobile Bank</option>
                                <option value="bank" {{ ($method->account_type == 'bank') ?'selected':'' }}>Bank</option>
                            </select>
                            @if ($errors->has("type"))
                             <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("type") }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $method->account_name }}">
                        </div>
                        <div class="col-6 numberCol">
                            <label for="number">Account Number:</label>
                            <input type="text" name="number" id="number" class="form-control" value="{{ $method->account_number }}">
                        </div>
                        <div class="col-6 branchCol">
                            <label for="branch">Account Branch:</label>
                            <input type="text" name="branch" id="branch" class="form-control" value="{{ $method->account_branch }}">
                        </div>
                        <div class="col-6">
                            <label for="amount">Opening Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="{{ $method->opening_amount }}">
                        </div>
                        <div class="col-6">
                            <label for="status">Status:</label>
                            <select data-live-search="true" name="status" id="status" class="form-select searchSelect">
                                <option value="active" {{ ($method->status == 'active') ?'selected':'' }}>Active</option>
                                <option value="inactive" {{ ($method->status == 'inactive') ?'selected':'' }}>In-Active</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="note">Note:</label>
                            <textarea name="note" id="note" class="form-control" placeholder="Enter Notes..">{{ $method->note }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-1">
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
    <script>
        @if (Session::has('update'))
            var update = '{{ Session::get('update');}}';
            Swal.fire({
                title: "Success !",
                text: update,
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

