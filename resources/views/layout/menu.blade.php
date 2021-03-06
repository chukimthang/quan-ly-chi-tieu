<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            @if(Auth::user()->is_admin == 1)
                <li>
                    <a href="{{ route('category.index') }}">Chuyên mục</a>
                </li>
            @endif
            <li>
                <a href="{{ route('expense.index') }}">Chi tiêu</a>
            </li>
            <li>
                <a href="{{ route('collect.index') }}">Thu quỹ</a>
            </li>
            <li>
                <a href="{{ route('activity.index') }}">Hoạt động</a>
            </li>
            <li>
                <a href="{{ route('chart.index') }}">Biểu đồ</a>
            </li>
        </ul>
    </div>
</div>
