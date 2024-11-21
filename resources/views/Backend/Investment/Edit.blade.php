@extends("layouts.app")
@section('title',"Investment Update Page")
@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>Investment Update</h6>
                <a href="{{ route('investment.index') }}" class="ms-auto btn btn-primary">All Investments</a>
            </div>
            <div class="card-body pt-2">
                <div class="row investmentAppend">
                    <div class="col-6 ProductAppendCol ">
                        <div class="row productRow">
                            <div><b>Date :</b><span>{{ $investment->product->date }}</span></div>
                            <div><b>Product Id :</b><span>{{ $investment->product->product_id }}</span></div>
                            <div> <b>Product Type :</b><span>{{ $investment->product->product_type }}</span></div>
                            <div><b>Gender :</b><span>{{ $investment->product->gender }}</span></div>
                            <div><b>Status :</b><span>{{ $investment->product->status }}</span></div>
                        </div>
                    </div>
                    <div class="col-6 MemberAppendCol ">
                        <div class='row MemberRow'>
                            <div ><b>Member Id :</b> <span>{{ $investment->member->member_id }}</span></div>
                            <div ><b>Name :</b> <span>{{ $investment->member->name }}</span></div>
                            <div><b>Father :</b> <span>{{ $investment->member->name }}</span></div>
                            <div><b>Phone :</b> <span>{{ $investment->member->phone }}</span></div>
                            <div><b>Address :</b> <span>{{ $investment->member->address }}</span></div>
                        </div>
                    </div>
                </div>
                <hr>
                <form action="{{ route('investment.update',$investment) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <label for="date">Date:</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="{{ $investment->date }}">
                        </div>
                        <div class="col-6">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $investment->investment_qty }}" required>
                        </div>
                        <div class="col-12">
                            <label for="note">Note:</label>
                            <textarea name="note" id="note" class="form-control" >{{ $investment->note }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
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
            $( "#date" ).datepicker( "option", "showAnim",'slideDown');
            $( "#date" ).datepicker( "option", "dateFormat", "d-M-yy" );
        })
    </script>
@endpush

