@extends('layout.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="page-header">
            <h3 class="edit-profile">Thay đổi thông tin</h3>
        </div>
        
        <div class="col-md-7 col-md-offset-2">
            <div class="form-error-profile"></div>

            <div class="form-group">
                {!! Form::label('name', 'Họ tên') !!}
                {!! Form::text('name', $user->name, [
                    'class' => 'form-control'
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Địa chỉ email') !!}
                {!! Form::text('email', $user->email, [
                    'class' => 'form-control',
                    'disabled' => 'true'
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Mật khẩu') !!}
                <input type="password" name="password" class="form-control" 
                    id="password" value="">
            </div>

             <div class="form-group">
                {!! Form::label('avatar', 'Ảnh đại diện') !!}
                {!! Form::file('avatar', [
                    'id' => 'avatar', 
                    'accept' => 'image/*'
                ]) !!}
                <a href="javascript:void(0)" id="upload-avatar"
                    class="btn btn-default">Upload</a> 
                <div id="process-avatar" style="display: none">
                    Process...</div>

                <p id="display-avatar">
                    <img src="{!! $user->avatar !!}" alt=""
                        width="100" height="100">
                </p>
                <p id="link-avatar"></p>
            </div>

            <div class="form-group submit-update-profile">
                {!! Form::submit('Cập nhật', [
                    'class' => 'btn btn-primary',
                    'data-id' => $user->id
                ]) !!}
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/user.js') }}"></script>
<script type="text/javascript">
    var url = {
        'uploadAvatar': '{{ route('user.uploadAvatar') }}',
        'updateProfile': '{{ route('user.updateProfile') }}' 
    }
    var user = new user;
    user.init(url);
</script>
@stop
