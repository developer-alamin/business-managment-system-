@extends('layouts.app')
@section('title','Permission Edit Page')
@section('content')
    <div class="row">
        <div class="col-7 m-auto">
            <div class="card">
                @if (Session::has('update'))
                    @push('scripts')
                        <script >
                            $(document).ready(function(){
                                var update = '{{ Session::get('update');}}';
                                toastr.success(update);
                            })
                        </script>
                    @endpush
                @endif
                <div class="card-header d-flex align-items-center">
                    <h4>{{ $permission->name }} Update</h4>
                    <a href="{{ route('roles.index') }}" class="btn btn-outline-primary ms-auto">All Permissions</a>
                </div>
                <div class="card-body pt-2">
                    <form action="{{ route('permission.update',$permission) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
                                @if ($errors->has('name'))

                                <span class="error">
                                    <i class="fas fa-circle-exclamation"></i>
                                    {{  $errors->first('name') }}
                                </span>
                                @endif
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-outline-primary form-control">Update</button>
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
    $(document).ready(function(){
        setTimeout(() => {
            $('.alert').hide(500);
        }, 3000);
    })
</script>
@endpush
