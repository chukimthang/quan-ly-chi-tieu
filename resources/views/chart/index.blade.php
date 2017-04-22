@extends('layout.app')

@section('content')
{!! Charts::assets() !!}

<div id="page-wrapper">
    <div class="col-lg-11" style="margin-top: 50px;">
        <center>
            {!! $chart1->render() !!}
        </center>

        <center>
            {!! $chart2->render() !!}
        </center>
    </div>
</div>
@stop
