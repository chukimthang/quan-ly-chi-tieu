@extends('layout.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header title" style="margin-left: 2%;">Chuyên Mục</h3> 

        <div class="col-lg-11">
            @if (count($categories))
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="colum" width="10%">STT</th>
                            <th class="colum">Chuyên mục</th>
                        </tr>
                    </thead>

                    <tbody id="category-list" name="category-list">
                        @foreach ($categories as $key => $category)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $key + 1 !!}</td>
                                <td id="category-name-{{ $category->id }}">
                                    {!! $category->name !!}
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
</div>
@stop
