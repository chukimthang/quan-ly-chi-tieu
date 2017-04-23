<table class="col-lg-12 collect-filter">
    <tr>
        <td class="col-md-3">
            <label>Từ ngày</label>
            <div class='input-group date datetimepicker'>
                <input type="text" name="start"
                    id="start" class="form-control">
                <span class='input-group-addon'>
                    <span class='glyphicon glyphicon-calendar'></span>
                </span>
            </div>
        </td>
        <td class="col-md-3">
            <label>Đến ngày</label>
            <div class='input-group date datetimepicker'>
                <input type="text" name="finish"
                    id="finish" class="form-control">
                <span class='input-group-addon'>
                    <span class='glyphicon glyphicon-calendar'></span>
                </span>
            </div>
        </td>
        <td class="col-md-2">
            <br>
            <input type="submit" name="filter_date" 
                class="btn btn-primary filter"
                value="Lọc">
        </td>
    </tr>
</table>
