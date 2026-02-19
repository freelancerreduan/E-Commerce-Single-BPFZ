<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.dashboard') ? '' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">

                <span>Dashboard</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.home.banner') ? '' : 'collapsed' }}" href="{{ route('admin.home.banner') }}">

                <span>Homepage Banner</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('page.index') ? '' : 'collapsed' }}" href="{{ route('page.index') }}">

                <span>Pages</span>
            </a>
        </li>





        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('category.create') || Request::url() == route('category.index') ? '' : 'collapsed' }}" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav" class="nav-content collapse {{ Request::url() == route('category.create') || Request::url() == route('category.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('category.create') }}" class="{{ Request::url() == route('category.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}" class="{{ Request::url() == route('category.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Category</span>
                    </a>
                </li>
            </ul>
        </li>





        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('subcategory.create') || Request::url() == route('subcategory.index') ? '' : 'collapsed' }}" data-bs-target="#subcategory-nav" data-bs-toggle="collapse" href="#">
                <span>Sub Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="subcategory-nav" class="nav-content collapse {{ Request::url() == route('subcategory.create') || Request::url() == route('subcategory.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('subcategory.create') }}" class="{{ Request::url() == route('subcategory.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Sub-Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subcategory.index') }}" class="{{ Request::url() == route('subcategory.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Sub-Category</span>
                    </a>
                </li>
            </ul>
        </li>




        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('product.create') || Request::url() == route('product.index') ? '' : 'collapsed' }}" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
                <span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="product-nav" class="nav-content collapse {{ Request::url() == route('product.create') || Request::url() == route('product.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('product.create') }}" class="{{ Request::url() == route('product.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}" class="{{ Request::url() == route('product.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Product</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.checkout.pending') || Request::url() == route('admin.checkout.confirmed') || Request::url() == route('admin.checkout.rejected') || Request::url() == route('admin.checkout.canceled')|| Request::url() == route('admin.checkout.return') || Request::url() == route('admin.checkout.completed') ? '' : 'collapsed' }}" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
                <span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="order-nav" class="nav-content collapse {{ Request::url() == route('admin.checkout.pending') || Request::url() == route('admin.checkout.rejected') || Request::url() == route('admin.checkout.confirmed') || Request::url() == route('admin.checkout.canceled') || Request::url() == route('admin.checkout.return') || Request::url() == route('admin.checkout.completed') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.checkout.pending') }}" class="{{ Request::url() == route('admin.checkout.pending') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Pending Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.checkout.confirmed') }}" class="{{ Request::url() == route('admin.checkout.confirmed') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Confirmed Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.checkout.rejected') }}" class="{{ Request::url() == route('admin.checkout.rejected') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Rejected Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.checkout.canceled') }}" class="{{ Request::url() == route('admin.checkout.canceled') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Canceled Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.checkout.return') }}" class="{{ Request::url() == route('admin.checkout.return') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Return Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.checkout.completed') }}" class="{{ Request::url() == route('admin.checkout.completed') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Completed Orders</span>
                    </a>
                </li>
            </ul>
        </li>







        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('post.create') || Request::url() == route('post.index') ? '' : 'collapsed' }}" data-bs-target="#post-nav" data-bs-toggle="collapse" href="#">
                <span>Posts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="post-nav" class="nav-content collapse {{ Request::url() == route('post.create') || Request::url() == route('post.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('post.create') }}" class="{{ Request::url() == route('post.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Post</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('post.index') }}" class="{{ Request::url() == route('post.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Post</span>
                    </a>
                </li>
            </ul>
        </li>




        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('payment-getway.create') || Request::url() == route('payment-getway.index') ? '' : 'collapsed' }}" data-bs-target="#payment-getway-nav" data-bs-toggle="collapse" href="#">
                <span>Payment Getway</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="payment-getway-nav" class="nav-content collapse {{ Request::url() == route('payment-getway.create') || Request::url() == route('payment-getway.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('payment-getway.create') }}" class="{{ Request::url() == route('payment-getway.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Getway</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payment-getway.index') }}" class="{{ Request::url() == route('payment-getway.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Getway</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('coupon.create') || Request::url() == route('coupon.index') ? '' : 'collapsed' }}" data-bs-target="#coupon-nav" data-bs-toggle="collapse" href="#">
                <span>Coupon</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="coupon-nav" class="nav-content collapse {{ Request::url() == route('coupon.create') || Request::url() == route('coupon.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('coupon.create') }}" class="{{ Request::url() == route('coupon.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add Coupon</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('coupon.index') }}" class="{{ Request::url() == route('coupon.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Coupon</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('feedback.create') || Request::url() == route('feedback.index') ? '' : 'collapsed' }}" data-bs-target="#feedback-nav" data-bs-toggle="collapse" href="#">
                <span>Feedback/Review</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="feedback-nav" class="nav-content collapse {{ Request::url() == route('feedback.create') || Request::url() == route('feedback.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('feedback.create') }}" class="{{ Request::url() == route('feedback.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Add feedback/Review</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('feedback.index') }}" class="{{ Request::url() == route('feedback.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List feedback/Review</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.setting.generalSetting') || Request::url() == route('admin.setting.metaSetting') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <span>Site Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ Request::url() == route('admin.setting.generalSetting') || Request::url() == route('admin.setting.metaSetting') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.setting.generalSetting') }}" class="{{ Request::url() == route('admin.setting.generalSetting') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>General Setting</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.metaSetting') }}" class="{{ Request::url() == route('admin.setting.metaSetting') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Meta Setting</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::url() == route('admin.announcement') ? '' : 'collapsed' }}" href="{{ route('admin.announcement') }}">

                <span>Announcement</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <span>Logout</span>
            </a>
        </li>
        <!-- End Blank Page Nav -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>

</aside>
