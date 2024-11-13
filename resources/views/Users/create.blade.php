@extends('layouts.app')
@section('title','User Create Page')
@section('content')
    <div class="row">
        <div class="col-12 m-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>New Create Users</h4>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-primary ms-auto">All Users</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="img">Photo:</label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name..">
                            </div>
                            <div class="col-6">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email..">
                            </div>
                            <div class="col-6">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="col-6">
                                <label for="conPass">Confirm Password:</label>
                                <input type="password" name="conPass" id="conPass" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="col-6">
                                <label for="password">Role Select</label>
                                <select name="roleSelect" class="selectpicker roleSelect form-select" id="roleSelect" data-show-subtext="true" data-live-search="true">
                                    <option value="0">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option  data-subtext="{{ $role->id }}" value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-2 d-none">
                                <label>Role Select:</label>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>

                                        @foreach ($roles as $role)
                                            <tr>
                                                <th>{{ $role->name }}</th>
                                                @if (count($role->permissions) > 0)
                                                    @foreach ($role->permissions as $permission)

                                                           <td>{{ $permission->name }}</td>


                                                    @endforeach

                                                @endif
                                            </tr>
                                        @endforeach
                                    </thead>
                                </table>
                                <div class="roles_items d-none d-flex mt-1">
                                    <div class="role_item me-2 form-check form-switch">
                                        <input class="form-check-input" name="role" type="radio" role="switch" id="none" value="0">
                                        <label class="form-check-label" for="none">None</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <input onchange="showHide()" type="checkbox" id="SwitchCheck">
                                <label  for="SwitchCheck">Show Password</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <button class="btn btn-outline-primary form-control ">Save</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-5">
                        <img class="loadingGift d-none" src="{{ asset('assets/img/loading.gif') }}" alt="">
                        <p class="d-none noResult text-center">Nothing Permissions</p>
                        <table id="permissionShowTb" class=" table table-bordered table-hover table-striped">
                            <thead>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){


      $(".roleSelect").change(function () {
        $(".loadingGift").removeClass("d-none");
        $(".noResult").addClass("d-none");
        const roleId = this.value;
        var thead = $("#permissionShowTb thead");
        thead.html('');
        $.ajax({
            type: "GET",
            url: "{{ route('role.bassed.permission') }}",
            data:{id:roleId},
            dataType: "json",
            success: function (res) {
                if(res.permissions.length > 0){
                    $(".loadingGift").addClass("d-none");
                    const tr = $("<tr></tr>");
                    const th = "<th>"+res.name+"</th>";
                    tr.append(th)
                    $.each(res.permissions,function (i,item) {
                        const td = "<td>"+item.name+"</td>";
                        tr.append(td).appendTo(thead);
                    });
                }else{
                    $(".loadingGift").addClass("d-none");
                    $(".noResult").removeClass("d-none");
                }
            },
            error:function (){
                $(".loadingGift").addClass("d-none");
                $(".noResult").removeClass("d-none");
            }
        });
      });
      const pass = $("input[type='password']");
            $.each(pass, function (i, item) {
                item.attr('type',item.attr('type') === 'password' ? 'text' : 'password')
            });
    })
</script>
@endpush
