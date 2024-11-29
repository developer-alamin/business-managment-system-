@extends("layouts.app")
@section('title',"Notice Create Page")
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>All Investor</h6>
            </div>
            <div class="card-body pt-2">
               <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($investors as $key => $investor)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $investor->name }}</td>
                        <td>
                            @if ($investor->photo)
                            <img class="table_img" src="{{ $investor->photo }}" alt="">
                            @endif
                        </td>
                        <td>
                            <button id="pick" data-img="{{ $investor->photo }}" data-name="{{ $investor->name }}" data-id="{{ $investor->id }}" class="btn btn-outline-primary pick">Add Collection</button>
                            <button id="close" class="d-none btn btn-warning close_btn"><i class="fas fa-close"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>Investor Not Found</td>
                    </tr>
                    @endforelse
                </tbody>
               </table>
               {{ $investors->appends(request()->input())->links("pagination::bootstrap-5") }}
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>New Investment Collection</h6>
                <img id="investor_collect_img" class="ms-auto table_img" src="" alt="" style="display: none;">
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('collecttion.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 investorName d-none">
                            <label>Name:</label> <span class=""></span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <input type="hidden" name="inv_id" id="inv_id" class="inv_id">
                        <div class="col-12">
                            <label for="month">Month:</label>
                            <input type="text" name="month" id="month" class="form-control" placeholder="Enter Month" required>
                        </div>
                        <div class="col-12">
                            <label for="year">Year:</label>
                            <input type="text" id="year" name="year" class="yearpicker form-control" placeholder="Year" required >
                        </div>
                        <div class="col-12">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4 ms-auto">
                            <button disabled type="submit" class="btn btn-outline-primary form-control inv_Create_btn">Save</button>
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
</script>

@endpush
@push('scripts')
    <script>
        $(document).ready(function(){
            $(".yearpicker").yearpicker({});
            $("#month").datepicker();
            $("#month" ).datepicker( "option", "dateFormat", 'MM');
            $("#month" ).datepicker( "option", "showAnim",'slideDown');

            const invCreateBtn = $(".inv_Create_btn");
            const investorName = $(".investorName");
            const invColImg = $("#investor_collect_img");
            const invColId = $("#inv_id");

            const pick = $("button.pick");

            $("button.pick").click(function (e) {
                e.preventDefault();
                $("button.pick")
                .removeClass("btn-primary")
                .addClass("btn-outline-primary")
                .text('Add Collection');
                $("button.close_btn").addClass('d-none');

                $(this).removeClass('btn-outline-primary')
                .addClass("btn-primary")
                .text('Collected');
                $(this).next().removeClass("d-none");

                invCreateBtn.removeAttr("disabled");
                invColImg.attr("src", $(this).attr('data-img'));
                invColImg.show();
                investorName.removeClass("d-none").find("span").text($(this).attr('data-name'));
                invColId.val($(this).attr('data-id'));
            });

            $(".close_btn").click(function(e){
                e.preventDefault();
                $(this).addClass('d-none').prev()
                .addClass("btn-outline-primary")
                .removeClass("btn-primary")
                .text("Add Collection");
                invColImg.hide();
                invColId.val('');
                investorName.addClass('d-none').find('span').text('');
                invCreateBtn.attr("disabled",true);

            })

        })
    </script>
@endpush
