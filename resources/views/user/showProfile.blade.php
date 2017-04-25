@extends('layout.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header" align="center">Thông tin cá nhân</h3>

        <div class="col-lg-12">
            <table class="table-profile-show" width="70%">
                <tr>
                    <td width="30%" height="50px">
                        <label class="profile-show">Họ tên</label>
                    </td>
                    <td>{!! $user->name !!}</td>
                </tr>
                <tr>
                    <td height="50px">
                        <label class="profile-show">Địa chỉ email</label>
                    </td>
                    <td>{!! $user->email !!}</td>
                </tr>
                <tr>
                   <td height="50px">
                       <label class="profile-show">Quyền</label>
                   </td> 
                   <td>{!! config('myconfig.auth')[$user->is_admin] !!}</td>
                </tr>
                <tr>
                    <td height="50px">
                        <label class="profile-show">Avatar</label>
                    </td>
                    <td><img src="{!! $user->avatar !!}" 
                        width="200px" height="200px"></td>
                </tr>
            </table>

            <div class="change-infor" align="center">
                <a href="{{ route('user.editProfile') }}">Thay đổi thông tin</a>
            </div>
        </div>
    </div>
</div>
@stop
