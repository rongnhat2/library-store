<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown statistic-group">
                <a class="dropdown-toggle statistic statistic-href-control" href="{{ route('admin.statistic.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Thống kê</span>
                </a>
            </li> 
            <li class="nav-item dropdown order-group">
                <a class="dropdown-toggle order" href="{{ route('admin.order.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-shopping-cart"></i>
                    </span>
                    <span class="title">Đơn hàng</span>
                </a>
            </li>
            <li class="nav-item dropdown author-group">
                <a class="dropdown-toggle author" href="{{ route('admin.author.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-user-add"></i>
                    </span>
                    <span class="title">Quản lí tác giả</span>
                </a>
            </li>
            <li class="nav-item dropdown category-group">
                <a class="dropdown-toggle category" href="{{ route('admin.category.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Quản lí danh mục</span>
                </a>
            </li>
            <li class="nav-item dropdown product-group">
                <a class="dropdown-toggle product" href="{{ route('admin.product.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-read"></i>
                    </span>
                    <span class="title">Quản lí sách</span>
                </a>
            </li>
        </ul>
    </div>
</div>