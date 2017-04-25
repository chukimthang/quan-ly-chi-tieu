@extends('layout.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header title-activity">Hoạt động người dùng</h3>

        <div class="activity col-lg-12">
            @foreach ($activities as $activity)
                <h5><img src="{!! App\User::getUser($activity->user_id)
                    ->avatar !!}" width="50px" height="50px">
                    <a>
                        @lang('activity.action', [
                            'fullname' => "<span class='user-name'>" .
                                App\User::getUser($activity->user_id)->name . 
                                "</span>",
                            'name' => "<span class='action'>$activity->action
                                </span>",
                            'time' => "<span class='time'>$activity->created_at
                                </span>"
                        ])
                    </a></h5>
                <br>
            @endforeach

            <div>
                {!! $activities->render() !!}
            </div>
        </div>  
    </div>
</div>
@stop
