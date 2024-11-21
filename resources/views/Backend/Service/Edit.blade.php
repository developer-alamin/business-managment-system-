@extends("layouts.app")
@section('title',"Investment Update Page")
@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6>{{ $service->serviceType->name }} Update</h6>
                <a href="{{ route('service.index') }}" class="ms-auto btn btn-primary">All Services</a>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('service.update',$service) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="doctor">Doctors:</label>
                            <select data-live-search="true" name="doctor" class="form-select searchSelect" id="doctor" required>
                                <option value="">Select Doctor</option>
                                @if ($doctors->count() > 0)
                                    @foreach($doctors as $doctor)
                                     <option value="{{ $doctor->id }}" {{ ($doctor->id == $service->doctor->id) ? 'selected':'' }}>{{ $doctor->name }}</option>
                                    @endforeach
                                @else
                                <option value="">Doctor Not Found</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="serviceType">Service Type:</label>
                            <select data-live-search="true" name="serviceType" class="form-select searchSelect" id="serviceType" required>
                                <option value="">Select Doctor</option>
                                @if ($serviceTypes->count() > 0)
                                    @foreach ($serviceTypes as $serviceType)
                                     <option value="{{ $serviceType->id }}" {{ ($serviceType->id == $service->serviceType->id) ? 'selected':'' }}>{{ $serviceType->name }}</option>
                                    @endforeach
                                @else
                                <option value="">Service Type Not Found</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="member">Members:</label>
                            <select data-live-search="true" name="member" class="form-select searchSelect" id="member" required>
                                <option value="">Select Member</option>
                                @if ($members->count() > 0)
                                    @foreach ($members as $member)
                                     <option value="{{ $member->id }}" {{ ($member->id == $service->member->id) ? 'selected':'' }}>{{ $member->name }}</option>
                                    @endforeach
                                @else
                                <option value="">Member Not Found</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="product">Products:</label>
                            <select data-live-search="true" name="product" class="form-select searchSelect" id="product" required>
                                @includeIf('Backend.Service.MemberByProduct',['memberbyproduct' => $service->member,'selectProduct' => $service->product])
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="note">Note:</label>
                            <textarea name="note" id="note" class="form-control" placeholder="Enter Note..">{{ $service->note }}</textarea>
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
            
            $("#member").change(function (e) {
                e.preventDefault();

                const id = $(this).val();
                const product = $("#product");
                product.html('')
                product.append('<option><span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status">Loading...</span></option>')
              
                $.ajax({
                    type: "GET",
                    url: "{{ route('servicesmemberbyproduct') }}",
                    data: {id:id},
                    success: function (res) {
                        product.html(res);
                    }
                });
            });
        })
    </script>
@endpush

