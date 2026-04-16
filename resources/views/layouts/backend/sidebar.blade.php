<div class="overlay"></div>
<div class="search-overlay"></div>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle"
                    style="{{ Request::is('dashboard') ? 'background-color: #BFC9D4; border-radius: 6px' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <!-- <li class="menu">
                <a href="#product" data-toggle="collapse"
                    aria-expanded="{{ Request::is('product*') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 14 14">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                d="M12.88 12.39a1 1 0 0 1-.25.78a1 1 0 0 1-.75.33H2.12a1 1 0 0 1-.75-.33a1 1 0 0 1-.25-.78L2 4.5h10ZM4.5 4.5V3a2.5 2.5 0 0 1 5 0v1.5" />
                        </svg>
                        <span>Product</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('product*') ? 'show' : '' }}" id="product"
                    data-parent="#accordionExample">
                    <li>
                        <a class="{{ Request::is('product') ? 'text-primary' : '' }}"
                            href="{{ route('admin.product.index') }}"> List </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('product/create') ? 'text-primary' : '' }}"
                            href="{{ route('admin.product.create') }}"> Add New </a>
                    </li>
                </ul>
            </li> -->

            <!-- <li class="menu">
                <a href="#category" data-toggle="collapse"
                    aria-expanded="{{ Request::is('category*') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                        </svg>
                        <span>Category</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('category*') ? 'show' : '' }}" id="category"
                    data-parent="#accordionExample">
                    <li>
                        <a class="{{ Request::is('category') ? 'text-primary' : '' }}"
                            href="{{ route('admin.category.index') }}"> List </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#categoryCreateModal">Add New
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="menu">
                <a href="#brand" data-toggle="collapse" aria-expanded="{{ Request::is('brand*') ? 'true' : 'false' }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                        </svg>
                        <span>Brand</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('brand*') ? 'show' : '' }}" id="brand"
                    data-parent="#accordionExample">
                    <li>
                        <a class="{{ Request::is('brand') ? 'text-primary' : '' }}"
                            href="{{ route('admin.brand.index') }}"> List </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#brandCreateModal">Add New
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li class="menu">
                <a href="#banner" data-toggle="collapse"
                    aria-expanded="{{ Request::is('banner*') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                        </svg>
                        <span>Banner</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('banner*') ? 'show' : '' }}" id="banner"
                    data-parent="#accordionExample">
                    <li>
                        <a class="{{ Request::is('banner') ? 'text-primary' : '' }}"
                            href="{{ route('admin.banner.index') }}"> List </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#categoryCreateModal">Add New
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- add from dev-ak -->
            <!-- <li class="menu">
                <a href="#affiliateMenu" data-toggle="collapse"
                    aria-expanded="{{ Request::is('admin/affiliate*') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                        </svg>
                        <span>AF Product</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('admin/affiliate*') ? 'show' : '' }}"
                    id="affiliateMenu" data-parent="#accordionExample">
                    <li>
                        <a class="{{ Request::is('admin/affiliate') ? 'text-primary' : '' }}"
                            href="{{ route('admin.affiliate.index') }}">
                            List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.affiliate.create') }}">Add New</a>
                    </li>
                </ul>
            </li> -->
            {{-- dev-ak order list --}}
            <!-- <li class="menu">
                <a href="{{ route('admin.order.index') }}" class="dropdown-toggle"
                    style="{{ Request::is('admin.order') ? 'background-color: #BFC9D4; border-radius: 6px' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                        </svg>
                        <span>Order</span>
                    </div>
                </a>
            </li> -->
            <!-- 
            <li class="menu">
                <a href="{{ route('admin.source.index') }}" class="dropdown-toggle"
                    style="{{ Request::is('admin.source') ? 'background-color: #BFC9D4; border-radius: 6px' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M18 21v-6l5 3zm-5 0v-6l5 3zm-3.75 1l-.4-3.2q-.325-.125-.612-.3t-.563-.375L4.7 19.375l-2.75-4.75l2.575-1.95Q4.5 12.5 4.5 12.338v-.675q0-.163.025-.338L1.95 9.375l2.75-4.75l2.975 1.25q.275-.2.575-.375t.6-.3l.4-3.2h5.5l.4 3.2q.325.125.613.3t.562.375l2.975-1.25l2.75 4.75l-2.575 1.95q.025.175.025.338v.837q0 .25-.05.5H17.4q.05-.25.075-.5t.025-.5q-.025-.475-.075-.837t-.15-.688l2.15-1.625l-.975-1.7l-2.475 1.05q-.55-.575-1.213-.962t-1.437-.588L13 4h-1.975l-.35 2.65q-.775.2-1.437.588t-1.213.937L5.55 7.15l-.975 1.7l2.15 1.6q-.125.375-.175.75t-.05.8q0 .4.05.775t.175.75l-2.15 1.625l.975 1.7l2.475-1.05q.6.625 1.35 1.05T11 17.4V22zM11 15.35v-2.275q-.2-.2-.325-.475t-.125-.6q0-.625.438-1.062t1.062-.438t1.063.438T13.55 12q0 .275-.088.538t-.287.462H15.4q.075-.25.113-.488T15.55 12q0-1.45-1.025-2.475T12.05 8.5q-1.475 0-2.488 1.025T8.55 12q0 1.2.688 2.1T11 15.35" />
                        </svg>
                        <span>Source Content</span>
                    </div>
                </a>
            </li> -->
            <!-- <li class="menu">
                <a href="{{ route('admin.setting.index') }}" class="dropdown-toggle"
                    style="{{ Request::is('general-setting') ? 'background-color: #BFC9D4; border-radius: 6px' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M18 21v-6l5 3zm-5 0v-6l5 3zm-3.75 1l-.4-3.2q-.325-.125-.612-.3t-.563-.375L4.7 19.375l-2.75-4.75l2.575-1.95Q4.5 12.5 4.5 12.338v-.675q0-.163.025-.338L1.95 9.375l2.75-4.75l2.975 1.25q.275-.2.575-.375t.6-.3l.4-3.2h5.5l.4 3.2q.325.125.613.3t.562.375l2.975-1.25l2.75 4.75l-2.575 1.95q.025.175.025.338v.837q0 .25-.05.5H17.4q.05-.25.075-.5t.025-.5q-.025-.475-.075-.837t-.15-.688l2.15-1.625l-.975-1.7l-2.475 1.05q-.55-.575-1.213-.962t-1.437-.588L13 4h-1.975l-.35 2.65q-.775.2-1.437.588t-1.213.937L5.55 7.15l-.975 1.7l2.15 1.6q-.125.375-.175.75t-.05.8q0 .4.05.775t.175.75l-2.15 1.625l.975 1.7l2.475-1.05q.6.625 1.35 1.05T11 17.4V22zM11 15.35v-2.275q-.2-.2-.325-.475t-.125-.6q0-.625.438-1.062t1.062-.438t1.063.438T13.55 12q0 .275-.088.538t-.287.462H15.4q.075-.25.113-.488T15.55 12q0-1.45-1.025-2.475T12.05 8.5q-1.475 0-2.488 1.025T8.55 12q0 1.2.688 2.1T11 15.35" />
                        </svg>
                        <span>Setting</span>
                    </div>
                </a>
            </li> -->

            <li class="menu">
                <a href="#investMenu" data-toggle="collapse"
                    aria-expanded="{{ Request::is('admin/invest*') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                        </svg>
                        <span>Invest Setting</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('admin/invest*') ? 'show' : '' }}"
                    id="investMenu" data-parent="#accordionExample">
                    <li>
                        <a class="{{ Request::is('admin/invest/banner') ? 'text-primary' : '' }}"
                            href="{{ route('admin.invest-banner.index') }}">
                            Banner
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/invest/fact') ? 'text-primary' : '' }}"
                            href="{{ route('admin.invest-fact.index') }}">
                            Fact
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/invest/faq') ? 'text-primary' : '' }}"
                            href="{{ route('admin.invest-faq.index') }}">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/invest/plan') ? 'text-primary' : '' }}"
                            href="{{ route('admin.invest-plan.index') }}">
                            Plan
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/invest/traction') ? 'text-primary' : '' }}"
                            href="{{ route('admin.invest-traction.index') }}">
                            Traction
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/invest/setting') ? 'text-primary' : '' }}"
                            href="{{ route('admin.invest-setting.index') }}">
                            Setting
                        </a>
                    </li>

                 </ul>
            </li>
        </ul>
    </nav>
</div>
