<nav class="woocommerce-MyAccount-navigation" aria-label="Account pages">
    <ul>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard {{ Request::url() == route('user.dashboard') ? 'is-active' : '' }}">
            <a href="{{ route('user.dashboard') }}" aria-current="page"> Dashboard </a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders {{ Request::url() == route('user.order.index') ? 'is-active' : '' }}">
            <a href="{{ route('user.order.index') }}"> Orders </a>
        </li>
        {{-- <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
            <a href="#"> Addresses </a>
        </li> --}}
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account {{ Request::url() == route('user.account.edit') ? 'is-active' : '' }}">
            <a href="{{ route('user.account.edit') }}"> Account details </a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account {{ Request::url() == route('user.account.password') ? 'is-active' : '' }}">
            <a href="{{ route('user.account.password') }}"> Change Password </a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wt-smart-coupon">
            <a href="#"> My Coupons </a>
        </li>
        {{-- <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist {{ Request::url() == route('user.wishlist.index') ? 'is-active' : '' }}">
            <a href="{{ route('user.wishlist.index') }}"> Wishlist </a>
        </li> --}}
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist {{ Request::url() == route('user.cart.index') ? 'is-active' : '' }}">
            <a href="{{ route('user.cart.index') }}"> Cart </a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
        </li>
    </ul>
</nav>
