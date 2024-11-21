@extends("layouts.app")
@section('title',"Note Edit Page")
@php
    function checkId($new,$old) : bool {
        $result = ($new->id == $old->investor_id) ? true:false;
        return $result;
    }
@endphp
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{$investCollect->investor->name}} Update</h6>
                <img id="investor_collect_img" class="ms-auto table_img" src="{{$investCollect->investor->photo}}" alt="" style="display:  {{ ($investCollect->investor->photo) ? '':none }};">
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('collecttion.destroy',$investCollect) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <label>Name:</label> <span class="investorName">{{$investCollect->investor->name}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <input type="hidden" name="inv_id" id="inv_id" class="inv_id" value="{{$investCollect->investor_id}}">
                        <div class="col-12">
                            <label for="month">Month:</label>
                            <input type="hidden" id="a" name="oldmonth" value="{{ $investCollect->month }}">
                            <input type="text" id="month" name="month" class="form-control month" placeholder="{{ $investCollect->month }}" >
                        </div>
                        <div class="col-12">
                            <label for="year">Year:</label>
                            <input type="text" id="year" name="year" class="yearpicker form-control" value="{{ $investCollect->year }}" />                        </div>
                        </div>
                        <div class="col-12">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" value="{{ $investCollect->amount }}" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4 ms-auto">
                            <button type="submit" class="btn btn-outline-primary form-control">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@if (Session::has('update'))
@push('scripts')
    <script >
       var update = '{{ Session::get('update');}}';
            Swal.fire({
            title: "Updated !",
            text: update,
            icon: "success"
        });
    </script>
@endpush
@endif
@push('scripts')
    <script>
        $(document).ready(function(){
            $(".yearpicker").yearpicker({});

            $(".month").datepicker();
            $(".month").datepicker( "option", "dateFormat", 'MM');
            $(".month").datepicker( "option", "showAnim",'slideDown');
        })
    </script>
@endpush
