@extends("layouts.app")
@section('title',"Notice Create Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Add New Doctor</h4>
                <a href="{{ route('doctor.index') }}" class="ms-auto btn btn-primary">All Doctors</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name.." required>
                        </div>
                        <div class="col-6">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email.." required>
                            @if ($errors->has("email"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("email") }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone.." required>
                            @if ($errors->has("phone"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("phone") }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="photo">Photo:</label>
                            <input type="file" accept="image/*" name="photo" id="photo" class="form-control">
                            @if ($errors->has("photo"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("photo") }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Enter Address.."></textarea>
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
