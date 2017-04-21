@extends('layout.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header title">Chi Tiêu</h3> 

        <div class="col-lg-12">
            <h4 class="col-md-9">
                <a href="#" data-toggle="modal" 
                    data-target=".bs-example-modal-lg.create"
                    class="add">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    Thêm
                </a>
            </h4>
        </div>
        
        <div id="expense-list">
            @include('expense.list')
        </div>
    </div>
</div>

@include('expense.create')
@include('expense.edit')

<script type="text/javascript" src="{{ asset('js/expense.js') }}"></script>
<script type="text/javascript">
    var url = {
        'add': '{{ route('expense.addAjax') }}',
        'update': '{{ route('expense.updateAjax') }}',
        'delete': '{{ route('expense.deleteAjax') }}'
    };
    var expense = new expense;
    expense.init(url);
</script>
@stop
