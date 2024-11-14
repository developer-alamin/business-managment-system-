@extends("layouts.app")
@section('title',"Member Create Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>New Member Add</h4>
                <a href="{{ route('member.index') }}">All Member</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('member.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name..">
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Your Phone..">
                        </div>
                        <div class="col-6">
                            <label for="another_phone">Another Phone:</label>
                            <input type="text" name="another_phone" id="another_phone" class="form-control" placeholder="Enter Another Phone..">
                        </div>
                        <div class="col-6">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Another Phone..">
                        </div>
                        <div class="col-6">
                            <label for="ref_by">Refer By:</label>
                            <input type="text" name="ref_by" id="ref_by" class="form-control" placeholder="Enter Refer By..">
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
