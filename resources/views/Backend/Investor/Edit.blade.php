@extends("layouts.app")
@section('title',"Investor Edit Page")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>{{ $investor->name }} Update</h4>
                @if ($investor->photo)
                    <img class="table_img ms-auto before_img" src="{{ $investor->photo }}" alt="">
                @endif
                <img class="table_img ms-auto" id="imagePreview" src="" alt="Image Preview" style="display:none;width:50px;height:50px;"/>
            </div>
            <div class="card-body pt-2">
                <form action="{{ route('investor.update',$investor) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $investor->name }}">
                            @if ($errors->has("name"))
                            <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("name") }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $investor->email }}">
                            @if ($errors->has("email"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("email") }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $investor->phone }}">
                            @if ($errors->has("phone"))
                                <span class="error_msg"><i class="fa fa-exclamation-circle"></i>{{ $errors->first("phone") }}</span>
                             @endif
                        </div>
                        <div class="col-6">
                            <label for="alt_phone">Alt Phone:</label>
                            <input type="text" name="alt_phone" id="alt_phone" class="form-control" value="{{ $investor->alt_phone }}">
                        </div>
                        <div class="col-6">
                            <label for="photo">Photo:</label>
                            <input type="file" accept="image/*" name="photo" id="photo" class="form-control photo">
                        </div>
                        <div class="col-6">
                            <label for="attachment">Attachments: <span>(Only Pdf)</span></label>
                            <input type="file" accept="application/pdf" name="attachment" id="attachment" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" class="form-control">
                                {{ $investor->address }}
                            </textarea>
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
@if (Session::has('update'))
@push('scripts')
    <script >
        $(document).ready(function(){
            var update = '{{ Session::get('update');}}';
            Swal.fire({
                title: "Updated!",
                text: update,
                icon: "success"
            });
        })
    </script>
@endpush
@endif
@push('scripts')
    <script>
        $(document).ready(function(){

             // Event listener for the file input change event
            $('.photo').on('change', function(event) {
                var file = event.target.files[0];  // Get the first selected file
                if (file) {
                var reader = new FileReader();  // Create a FileReader object

                reader.onload = function(e) {
                    // Set the src of the image preview to the file content
                    $('#imagePreview').attr('src', e.target.result);
                    $('#imagePreview').show();  // Show the image preview
                    $(".before_img").hide();
                };

                reader.readAsDataURL(file);  // Read the file as a data URL
                }
            });
        })
    </script>
@endpush