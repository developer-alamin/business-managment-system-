@extends("layouts.app")
@section('title',"Notice Create Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{ $product->product_id }} Update</h6>
                <a href="{{ route('product.index') }}" class="ms-auto btn btn-primary">All Products</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('product.update',$product) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <label for="product_id">Product Id:</label>
                            <input type="text" name="product_id" id="product_id" class="form-control"  value="{{ $product->product_id }}" placeholder="P-000001" required>
                            @if ($errors->has("product_id"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("product_id") }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="type">Product Type:</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="goat" {{ ($product->product_type == 'goat') ? 'selected':'' }}>Goat</option>
                                <option value="crow" {{ ($product->product_type == 'crow') ? 'selected':'' }}>Crow</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ ($product->gender == 'male') ? 'selected':'' }}>Male</option>
                                <option value="female" {{ ($product->gender == 'female') ? 'selected':'' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="parent">Parent Id:</label>
                            <select name="parent" id="parent" class="form-select">
                                <option value="">Select Parent</option>
                                @foreach ($parents as $parent)
                                 <option value="{{ $parent->id }}" {{ ($parent->id == $product->id) ? 'selected':'' }}>{{ $parent->product_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select" required>
                               <option value="">Select Status</option>
                                <option value="healthly" {{ ($product->status == 'healthly') ? 'selected':'' }}>Healthy</option>
                                <option value="dead" {{ ($product->status == 'dead') ? 'selected':'' }}>Dead</option>
                                <option value="sick" {{ ($product->status == 'sick') ? 'selected':'' }}>Sick</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="note">Note:</label>
                            <input type="text" name="note" id="note" class="form-control" value="{{ $product->note }}" placeholder="Note">
                        </div>
                        <div class="col-6">
                            <label for="date">Date: </label> <span>({{ $product->date }})</span>
                            <input type="text" name="date" id="date" class="form-control" placeholder="{{ $product->date }}">
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
            //$( "#date" ).datepicker( "setDate", "{{date('d-mm-y', strtotime($product->date)) }}" );
            $( "#date" ).datepicker( "option", "showAnim",'slideDown');
            $( "#date" ).datepicker( "option", "dateFormat", "d-M-yy" );
        })
    </script>
@endpush

