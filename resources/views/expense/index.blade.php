@extends('layout.app')

@section('content')
<link rel="stylesheet" href="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header">Chi Tiêu</h3> 

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

        <div id="expense-filter">
            @include('expense.filter')
        </div>
        
        <div id="expense-list">
            @include('expense.list')
        </div>
    </div>
</div>

@include('expense.create')
@include('expense.edit')

<script src="{{ asset('js/expense.js') }}"></script>
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}">
</script>
<script src="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('bower_components/moment/locale/vi.js') }}"></script>
<script src="{{ asset('js/datepicker.js') }}"></script>
<script type="text/javascript">
    var url = {
        'add': '{{ route('expense.addAjax') }}',
        'update': '{{ route('expense.updateAjax') }}',
        'delete': '{{ route('expense.deleteAjax') }}',
        'filterCategory': '{{ route('expense.filterCategory') }}',
        'filterCategoryDate': '{{ route('expense.filterCategoryDate') }}'
    };
    var expense = new expense;
    expense.init(url);
    var picker = new datepicker;
    picker.init();
</script>
@stop
