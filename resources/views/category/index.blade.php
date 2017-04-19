@extends('layout.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header">Chuyên mục</h3> 

        <div class="col-lg-12">
            <h4 class="col-md-9">
                <a href="" data-toggle="modal" 
                    data-target=".bs-example-modal-lg.create"
                    class="add">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    Thêm
                </a>
            </h4>
        </div>
     
        @if (count($categories))
            <table class="table table-striped table-bordered table-hover" 
                id="dataTables-example">
                <thead>
                    <tr>
                        <th class="colum" width="10%">STT</th>
                        <th class="colum">Chuyên mục</th>
                        <th class="colum" width="12%">Sửa</th>
                        <th class="colum" width="12%">Xóa</th>
                    </tr>
                </thead>

                <tbody id="category-list" name="category-list">
                    @foreach ($categories as $key => $category)
                        <tr class="odd gradeX" align="center">
                            <td>{!! $key + 1 !!}</td>
                            <td id="category-name-{{ $category->id }}">
                                {!! $category->name !!}
                            </td>
                            <td class="center" width="12%">
                                <a href="javascript:void(0)" 
                                    data-toggle="modal"
                                    data-target=".bs-example-modal-lg.edit"
                                    data-id="{!! $category->id !!}" 
                                    class="update">
                                    <span class="glyphicon glyphicon-edit">
                                    </span>
                                </a>
                            </td>
                            <td class="colum" width="12%">
                                <a href="javascript:void(0)" 
                                    data-id="{!! $category->id !!}" 
                                    value="{!! $category->id !!}" 
                                    class="delete">
                                    <span class="glyphicon
                                        glyphicon-remove-sign">
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div align="center">
                {!! $categories->render() !!}
            </div>
        @else
            <h4 align="center">Không có dữ liệu</h4>
        @endif
    </div>
</div>
@stop
