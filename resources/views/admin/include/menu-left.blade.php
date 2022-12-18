<div id="menu-left" class="text-white md:fixed md:top-0 md:bottom-0">
    <ul class="main-menu">
        <li class="item {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="btn-menu">
                <i class="bi bi-display"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="item" id="nhanvien" sub-menu="true">
            <a href="#" class="btn-menu">
                <i class="bi bi-people-fill"></i>
                <span>Nhân viên</span>
                <i class="bi bi-caret-down icon-arrow"></i>
            </a>

            <div class="sub-menu">
                <a href="#">Danh sách nhân viên</a>                
                <a href="#">Chức vụ</a>
            </div>
        </li>

        <li class="item {{ request()->routeIs('loaimon*') || request()->routeIs('monan*') ? 'active' : '' }}" sub-menu="true">
            <a href="#" class="btn-menu">
                <i class="bi bi-cup-straw"></i>
                <span>Món ăn</span>
                <i class="bi bi-caret-down icon-arrow"></i>
            </a>

            <div class="sub-menu">
                <a href="{{ route('monan.create') }}" class="{{ request()->routeIs('monan.create') ? 'active' : '' }}">Thêm món ăn</a>
                <a href="{{ route('monan.index') }}" class="{{ request()->routeIs('monan.index') ? 'active' : '' }}">Danh sách món ăn</a>
                <a href="{{ route('loaimon.create') }}" class="{{ request()->routeIs('loaimon.create') ? 'active' : '' }}">Thêm mã loại</a>
            </div>
        </li>

        <li class="item" id="donhang" sub-menu="true">
            <a href="#" class="btn-menu">
                <i class="bi bi-journals"></i>
                <span>Đơn hàng</span>
                <i class="bi bi-caret-down icon-arrow"></i>
            </a>

            <div class="sub-menu">
                <a href="#">Tạo đơn hàng</a>
                <a href="#">Danh sách đơn hàng Offline</a>
                <a href="#">Danh sách đơn hàng Online</a>
            </div>
        </li>

        <li class="item">
            <a href="#" class="btn-menu">
                <i class="bi bi-shield"></i>
                <span>Góp ý</span>
            </a>
        </li>

        <li class="item">
            <a href="#" class="btn-menu">
                <i class="bi bi-graph-up"></i>
                <span>Báo cáo</span>
            </a>
        </li>

        <li class="item">
            <a href="#" class="btn-menu">
                <i class="bi bi-box-arrow-left"></i>
                <span>Đăng xuất</span>
            </a>
        </li>
    </ul>
</div>