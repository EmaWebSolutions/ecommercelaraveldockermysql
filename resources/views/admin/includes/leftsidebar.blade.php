<!-- Sidebar area start -->
<div class="sidebar__area">
    <div class="sidebar__close">
        <button class="close-btn">
            <i class="fas fa-times"></i> <!-- Replace with Font Awesome "times" icon -->
        </button>
    </div>
    <div class="sidebar__brand">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset(IMG_LOGO_PATH . $allsettings['footer_logo']) }}" alt="icon">
        </a>
    </div>
    <ul id="sidebar-menu" class="sidebar__menu">
        <li class="{{ isset($menu) && $menu == 'dashboard' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> <!-- Replace with Font Awesome "tachometer-alt" icon -->
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
         @canany(['user-list'])
            <li class="{{ isset($menu) && $menu == 'users' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#">
                    <i class="fas fa-users"></i> <!-- Replace with Font Awesome "users" icon -->
                    <span>{{ __('Users') }}</span>
                </a>
                <ul>
                    <li class="{{ isset($submenu) && $submenu == 'admin_list' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.admin_list') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Admin List') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'add_admin' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.create_admin') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Add Admin') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'roles' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.role_list') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Roles') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'customer_list' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.customer_list') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Customer List') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany

        @canany(['category-list', 'product-create', 'product-edit'])
            <li class="{{ isset($menu) && $menu == 'catbad' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#">
                    <i class="fas fa-th-list"></i> <!-- Replace with Font Awesome "th-list" icon -->
                    <span>{{ __('Category and Tag') }}</span>
                </a>
                <ul>
                    @can('category-list')
                        <li class="{{ isset($submenu) && $submenu == 'category' ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.category') }}">
                                <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                                <span>{{ __('Category') }}</span>
                            </a>
                        </li>
                        <li class="{{ isset($submenu) && $submenu == 'product_tag' ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.product.tag') }}">
                                <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                                <span>{{ __('Product Tag') }}</span>
                            </a>
                        </li>
                        <li class="{{ isset($submenu) && $submenu == 'item_tag' ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.item.tag') }}">
                                <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                                <span>{{ __('Item Tag') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @canany(['product-list'])
            <li class="{{ isset($menu) && $menu == 'products' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#">
                    <i class="fas fa-cubes"></i> <!-- Replace with Font Awesome "cubes" icon -->
                    <span>{{ __('Products') }}</span>
                </a>
                <ul>
                    <li class="{{ isset($submenu) && $submenu == 'product' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.product.create') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Add Product') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'product_list' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.product') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Product List') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'color' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.product.color') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Product Color') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'size' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.product.size') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Product Size') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany

        @canany(['order-list'])
            <li class="{{ isset($menu) && $menu == 'shipment' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#">
                    <i class="fas fa-shopping-cart"></i> <!-- Replace with Font Awesome "shopping-cart" icon -->
                    <span>{{ __('Order Management') }}</span>
                </a>
                <ul>
                    <li class="{{ isset($submenu) && $submenu == 'orders_all' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.orders', 'all') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('All Orders') }}</span>
                            <span class="badge bg-info text-white">{{ orderCount() }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'orders_pending' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.orders', 'pending') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Pending Orders') }}</span>
                            <span class="badge bg-info text-white">{{ orderCount(ORDER_PENDING) }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'orders_processing' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.orders', 'processing') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Processing Orders') }}</span>
                            <span class="badge bg-info text-white">{{ orderCount(ORDER_PROCESSING) }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'orders_shipped' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.orders', 'shipped') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Shipped Orders') }}</span>
                            <span class="badge bg-info text-white">{{ orderCount(ORDER_SHIPPED) }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'orders_delivered' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.orders', 'delivered') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Delivered Orders') }}</span>
                            <span class="badge bg-info text-white">{{ orderCount(ORDER_DELIVERED) }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'orders_returned' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.orders', 'returned') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Returned Orders') }}</span>
                            <span class="badge bg-info text-white">{{ orderCount(ORDER_RETURN) }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany

        @canany(['transaction-list'])
            <li class="{{ isset($menu) && $menu == 'transactions' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.transactions') }}">
                    <i class="fas fa-random"></i> <!-- Replace with Font Awesome "random" icon -->
                    <span>{{ __('Transactions') }}</span>
                </a>
            </li>
        @endcanany

        @canany(['crm-list'])
            <li class="{{ isset($menu) && $menu == 'cms' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#">
                    <i class="fas fa-blog"></i> <!-- Replace with Font Awesome "blog" icon -->
                    <span>{{ __('Contact') }}</span>
                </a>
                <ul>
                    <li class="{{ isset($submenu) && $submenu == 'contact_us' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.contact.us.index') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Contact Us') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'subscribers' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.subscribe.index') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Subscribers') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany

        @canany(['cms-list'])
            <li class="{{ isset($menu) && $menu == 'site_content' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#">
                    <i class="fas fa-cube"></i> <!-- Replace with Font Awesome "cube" icon -->
                    <span>{{ __('Pages and Design') }}</span>
                </a>
                <ul>
                   
                    @canany(['slider-list'])
                    <li class="{{ isset($submenu) && $submenu == 'slider' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.slider') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Slider') }}</span>
                        </a>
                    </li>
                    @endcanany
                    @canany(['blog-list'])
                    <li class="{{ isset($submenu) && $submenu == 'blog' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.blog') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Blog') }}</span>
                        </a>
                    </li>
                    @endcanany
                    <li class="{{ isset($submenu) && $submenu == 'content_home' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.home.page.site.content') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Home Page') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'content_about' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.about.page.site.content') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('About Page') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'content_social_link' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.social.link') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Social Link') }}</span>
                        </a>
                    </li>
               
                    <li class="{{ isset($submenu) && $submenu == 'testimonial' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.testimonial') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Testimonial') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'languages' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.language_list') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Languages') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany

        @canany(['menu-list'])
            <li class="{{ isset($menu) && $menu == 'menus' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#">
                    <i class="fas fa-bars"></i> <!-- Replace with Font Awesome "bars" icon -->
                    <span>{{ __('Manage Menus') }}</span>
                </a>
                <ul>
                    <li class="{{ isset($submenu) && $submenu == 'static_menus' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.static_menus') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Static Menus') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany

        @canany(['payment-gateway-list'])
            <li class="{{ isset($menu) && $menu == 'payment' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.payment_gateway_list') }}">
                    <i class="fas fa-money-bill"></i> <!-- Replace with Font Awesome "money-bill" icon -->
                    <span>{{ __('Payment Gateway') }}</span>
                </a>
            </li>
        @endcanany

        @canany(['cms-list'])
            <li class="{{ isset($menu) && $menu == 'company' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#">
                    <i class="fas fa-address-book"></i> <!-- Replace with Font Awesome "address-book" icon -->
                    <span>{{ __('Settings') }}</span>
                </a>
                <ul>
                     <li class="{{ isset($submenu) && $submenu == 'general_settings' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.general.settings') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('General Settings') }}</span>
                        </a>
                    </li>
                    @canany(['tax-list'])
                        <li class="{{ isset($menu) && $menu == 'tax' ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.country_taxation_list') }}">
                                <i class="fas fa-percent"></i> <!-- Replace with Font Awesome "percent" icon -->
                                <span>{{ __('Tax Settings') }}</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['delivery-charge-list'])
                        <li class="{{ isset($menu) && $menu == 'delivery_charge' ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.country_dc_list') }}">
                                <i class="fas fa-shipping-fast"></i> <!-- Replace with Font Awesome "shipping-fast" icon -->
                                <span>{{ __('Delivery Charge') }}</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['currency-list'])
                        <li class="{{ isset($menu) && $menu == 'currency' ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.currency_list') }}">
                                <i class="fas fa-dollar-sign"></i> <!-- Replace with Font Awesome "dollar-sign" icon -->
                                <span>{{ __('Currency') }}</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['currency-list'])
                        <li class="{{ isset($menu) && $menu == 'coupon' ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.coupon') }}">
                                <i class="fas fa-code"></i> <!-- Replace with Font Awesome "code" icon -->
                                <span>{{ __('Coupon Code') }}</span>
                            </a>
                        </li>
                    @endcanany
                    <li class="{{ isset($submenu) && $submenu == 'faq' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.faq_list') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('FAQ') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'privacy_policy' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.privacy_policy') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Privacy Policy') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'return_policy' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.refund_policy') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Refund Policy') }}</span>
                        </a>
                    </li>
                    <li class="{{ isset($submenu) && $submenu == 'term_condition' ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.terms_conditions') }}">
                            <i class="fas fa-circle"></i> <!-- Replace with Font Awesome "circle" icon -->
                            <span>{{ __('Terms & Conditions') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany
    </ul>
</div>
<!-- Sidebar area end -->
