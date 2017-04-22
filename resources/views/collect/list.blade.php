<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-dt/css/jquery.dataTables.min.css') }}">

@if (count($collects))
    <table class="table table-striped table-bordered table-hover"
        id="dataTables-example">
        <thead>
            <tr>
                <th class="colum" width="10%">STT</th>
                <th class="colum">Tiền thu (VNĐ)</th>
                <th class="colum">Ngày thu</th>
                <th class="colum">Xóa</th>
            </tr>
        </thead>

        <tbody id="collect-list" name="collect-list">
            @foreach ($collects as $key => $collect)
                <tr class="odd gradeX" align="center">
                    <td>{!! $key + 1 !!}</td>
                    <td>{!! number_format($collect->price) !!}</td>
                    <td>{!! $collect->created_at !!}</td>
                    <td><a href="javascript:void(0)" 
                        data-id="{!! $collect->id !!}" 
                        class="delete">
                        <span class="glyphicon
                            glyphicon-remove-sign">
                        </span>
                    </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h4 align="center">Không có dữ liệu</h4>
@endif

<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable.js') }}"></script>
<script type="text/javascript">
    var db = new datatable;
    db.init('#dataTables-example');
</script>
