@extends('layouts.app')
@section('title','Permission Create Page')
@section('content')
    <div class="row">
        <div class="col-7 m-auto">
            <div class="card">
                @if (Session::has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{ Session::get('success') }}
                  </div>
                @endif
                <div class="card-header d-flex align-items-center">
                    <h4>All Permissions</h4>
                    <a href="{{ route('permission.index') }}" class="btn btn-outline-primary ms-auto">All Permissions</a>
                </div>
                <div class="card-body pt-2">
                    <form action="{{ route('permission.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Permission Name.." required>
                                @if ($errors->has('name'))
                                <span class="error">
                                    <i class="fas fa-circle-exclamation"></i>
                                    {{  $errors->first('name') }}
                                </span>
                                @endif
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-outline-primary form-control">Save</button>
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
    $(document).ready(function(){
        setTimeout(() => {
            $('.alert').hide(500);
        }, 3000);
    })
</script>
@endpush
