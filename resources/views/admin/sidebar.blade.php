<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable"> 
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
                    <span class="title">Quản lí khách hàng</span>
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
            <li class="nav-item dropdown discount-group">
                <a class="dropdown-toggle discount" href="{{ route('admin.discount.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-fall"></i>
                    </span>
                    <span class="title">Quản lí giảm giá</span>
                </a>
            </li>
        </ul>
    </div>
</div>