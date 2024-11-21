@extends("layouts.app")
@section('title',"Member Create Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>New Member Add</h4>
                <a href="{{ route('member.index') }}" class="ms-auto btn btn-primary">All Member</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('member.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label for="member_id">Member Id:</label>
                            <input type="text" name="member_id" id="member_id" class="form-control" placeholder="M-000001" required>
                        </div>
                        <div class="col-4">
                            <label for="father">Father Name:</label>
                            <input type="text" name="father" id="father" class="form-control" placeholder="Enter Father Name" required>
                        </div>
                        <div class="col-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name.." required>
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Your Phone.." required>
                        </div>
                        <div class="col-6">
                            <label for="alt_phone">Another Phone:</label>
                            <input type="text" name="alt_phone" id="alt_phone" class="form-control" placeholder="Enter Another Phone.." required>
                        </div>
                        <div class="col-6">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Another Phone.." required>
                        </div>
                        <div class="col-12">
                            <label for="ref_by">Refer By:</label>
                            <textarea name="ref_by" id="ref_by" class="form-control" placeholder="Enter Refer By.." required></textarea>
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
@if (Session::has('success'))
@push('scripts')
    <script >
        $(document).ready(function(){
            var success = '{{ Session::get('success');}}';
            Swal.fire({
                title: "Success !",
                text: success,
                icon: "success"
            });

        })
    </script>
@endpush
@endif
