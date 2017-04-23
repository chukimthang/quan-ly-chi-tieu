@extends('layout.app')

@section('content')
{!! Charts::assets() !!}

<div id="page-wrapper">
    <div class="col-lg-11" style="margin-top: 50px;">
        <center>
            {!! $chart->render() !!}
        </center>
    </div>
</div>
@stop
