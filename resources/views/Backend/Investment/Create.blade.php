@extends("layouts.app")
@section('title',"Invesment Create Page")

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Add New Investment</h6>
                <a href="{{ route('investment.index') }}" class="ms-auto btn btn-primary">All Investment</a>
            </div>
            <div class="card-body pt-2">
                <div class="row investmentAppend">
                    <div class="col-6 ProductAppendCol ">
                        <div class="product_loading text-center d-none">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Loading...</span>
                        </div>
                    </div>
                    <div class="col-6 MemberAppendCol ">
                        <div class="member_loading text-center d-none">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Loading...</span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('investment.store') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="product">Products</label>
                            <select data-live-search="true" name="product" class="form-select searchSelect" id="product" required>
                                <option value="">Select Product</option>
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                     <option value="{{ $product->id }}">{{ $product->product_id }}</option>
                                    @endforeach
                                @else
                                <option value="">Product Not Found</option>
                                @endif

                            </select>
                        </div>
                        <div class="col-6">
                            <label for="member">Members:</label>
                            <select data-live-search="true" name="member" class="form-select searchSelect" id="member" required>
                                <option value="">Select Member</option>
                                @if ($members->count() > 0)
                                    @foreach ($members as $member)
                                     <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                @else
                                <option value="">Member Not Found</option>
                                @endif

                            </select>
                        </div>
                        <div class="col-6">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="Enter Date" required>
                        </div>
                        <div class="col-6">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter Investment Quantity" required>
                        </div>
                        <div class="col-12">
                            <label for="note">Note:</label>
                            <textarea name="note" id="note" class="form-control" placeholder="Enter Note.."></textarea>
                        </div>
                        <div class="col-2 ms-auto mt-2">
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

            $("#product").change(function (e) {
                e.preventDefault();

                const id = $(this).val();
                $(".product_loading").removeClass('d-none');
                $(".ProductAppendCol div.productRow").html('')
                $.ajax({
                    type: "GET",
                    url: "{{ route('investmentsproductSelect') }}",
                    data: {id:id},
                    dataType: "json",
                    success: function (response) {
                        $(".product_loading").addClass('d-none');
                       const ProductContent = "<div class='row productRow'><div class=''><b>Date :</b> <span>"+response.date+"</span></div><div class=''><b>Product Id :</b> <span>"+response.product_id+"</span></div><div class=''><b>Product Type :</b> <span>"+response.product_type+"</span></div><div><b>Gender :</b> <span>"+response.gender+"</span></div><div><b>Status :</b> <span>"+response.status+"</span></div></div>";
                        $(".ProductAppendCol").append(ProductContent);
                    }
                });
            });
            $("#member").change(function (e) {
                e.preventDefault();

                const memberId = $(this).val();
                $(".member_loading").removeClass('d-none');
                $(".MemberAppendCol div.MemberRow").html('')
                $.ajax({
                    type: "GET",
                    url: "{{ route('investmentsmemberselect') }}",
                    data: {id:memberId},
                    dataType: "json",
                    success: function (response) {
                        $(".member_loading").addClass('d-none');
                        const MemberContent = "<div class='row MemberRow'><div class=''><b>Member Id :</b> <span>"+response.member_id+"</span></div><div class=''><b>Name :</b> <span>"+response.name+"</span></div><div><b>Father :</b> <span>"+response.name+"</span></div><div class=''><b>Phone :</b> <span>"+response.phone+"</span></div><div><b>Address :</b> <span>"+response.address+"</span></div></div>";
                        $(".MemberAppendCol").append(MemberContent);
                    }
                });
            });
        });
    </script>
@endpush

