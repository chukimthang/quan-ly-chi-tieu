@extends('layout.app')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header title" style="margin-left: 2%;">Thu quỹ</h3>

        <div class="col-lg-12">
            <h4 class="col-md-9">
                <a href="#" data-toggle="modal" 
                    data-target="#collect-create"
                    class="add">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    Thêm
                </a>
            </h4>
        </div>

        <div class="col-lg-12" id="collect-all">
            @include('collect.list')
        </div>
    </div>
</div>

@include('collect.create')


<script src="{{ asset('js/collect.js') }}"></script>
<script>
   var url = {
        'add': '{{ route('collect.addAjax') }}',
        'delete': '{{ route('collect.deleteAjax') }}'
    }
    var collect = new collect;
    collect.init(url);
</script>
@stop
