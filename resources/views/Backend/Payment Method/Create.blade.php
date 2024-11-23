@extends("layouts.app")
@section('title',"Payment Method Create Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Add New Payment Method</h6>
                <a href="{{ route('method.index') }}" class="ms-auto btn btn-primary">All Payment Methods</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('method.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="Enter Date" required>
                        </div>
                        <div class="col-4">
                            <label for="type">Account Type:</label>
                            <select name="type" id="type" class="form-select searchSelect" required>
                                <option value="">Select Payment Method</option>
                                <option value="cash">Cash</option>
                                <option value="mobile_bank">Mobile Bank</option>
                                <option value="bank">Bank</option>
                            </select>
                            @if ($errors->has("type"))
                            <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("type") }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="col-6 numberCol">
                            <label for="number">Account Number:</label>
                            <input type="text" name="number" id="number" class="form-control" placeholder="Enter Account Number">
                        </div>
                        <div class="col-6 branchCol">
                            <label for="branch">Account Branch:</label>
                            <input type="text" name="branch" id="branch" class="form-control" placeholder="Enter Account Branch">
                        </div>
                        <div class="col-6">
                            <label for="amount">Opening Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Opening Amount">
                        </div>
                        <div class="col-6">
                            <label for="status">Status:</label>
                            <select data-live-search="true" name="status" id="status" class="form-select searchSelect">
                                <option value="active">Active</option>
                                <option value="inactive">In-Active</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="note">Note:</label>
                            <textarea name="note" id="note" class="form-control" placeholder="Enter Notes.."></textarea>
                        </div>
                    </div>
                    <div class="row mt-1">
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
    <script>
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


            $("#type").change(function (e) { 
                e.preventDefault();
                const numberCol = $(".numberCol");
                const branchCol = $(".branchCol");
                const me = ['mobile_bank','bank'];

            
            });
        })
    </script>
@endpush

