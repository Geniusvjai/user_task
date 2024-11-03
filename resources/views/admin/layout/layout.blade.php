<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/admin/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!--Swiper slider css-->
    <link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Layout config Js -->
    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datatables Css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- <style>
        .invalid-feedback {
            display: block !important;
        }
    </style> -->
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}}}" alt=""
                                        height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt=""
                                        height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}}}" alt=""
                                        height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt=""
                                        height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                    id="search-options" value="">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                    id="search-close-options"></span>
                            </div>
                            {{-- <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
	<div data-simplebar style="max-height: 320px;">
		<!-- item-->
		<div class="dropdown-header">
			<h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
		</div>

		<div class="dropdown-item bg-transparent text-wrap">
			<a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to
				setup <i class="mdi mdi-magnify ms-1"></i></a>
			<a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons
				<i class="mdi mdi-magnify ms-1"></i></a>
		</div>
		<!-- item-->
		<div class="dropdown-header mt-2">
			<h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
		</div>

		<!-- item-->
		<a href="javascript:void(0);" class="dropdown-item notify-item">
			<i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
			<span>Analytics Dashboard</span>
		</a>

		<!-- item-->
		<a href="javascript:void(0);" class="dropdown-item notify-item">
			<i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
			<span>Help Center</span>
		</a>

		<!-- item-->
		<a href="javascript:void(0);" class="dropdown-item notify-item">
			<i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
			<span>My account settings</span>
		</a>

		<!-- item-->
		<div class="dropdown-header mt-2">
			<h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
		</div>

		<div class="notification-list">
			<!-- item -->
			<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
				<div class="d-flex">
					<img src="assets/images/users/avatar-2.jpg"
						class="me-3 rounded-circle avatar-xs" alt="user-pic">
					<div class="flex-1">
						<h6 class="m-0">Angela Bernier</h6>
						<span class="fs-11 mb-0 text-muted">Manager</span>
					</div>
				</div>
			</a>
			<!-- item -->
			<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
				<div class="d-flex">
					<img src="assets/images/users/avatar-3.jpg"
						class="me-3 rounded-circle avatar-xs" alt="user-pic">
					<div class="flex-1">
						<h6 class="m-0">David Grasso</h6>
						<span class="fs-11 mb-0 text-muted">Web Designer</span>
					</div>
				</div>
			</a>
			<!-- item -->
			<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
				<div class="d-flex">
					<img src="assets/images/users/avatar-5.jpg"
						class="me-3 rounded-circle avatar-xs" alt="user-pic">
					<div class="flex-1">
						<h6 class="m-0">Mike Bunch</h6>
						<span class="fs-11 mb-0 text-muted">React Developer</span>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="text-center pt-3 pb-1">
		<a href="pages-search-results.html" class="btn btn-primary btn-sm">View All
			Results <i class="ri-arrow-right-line ms-1"></i></a>
	</div>
	</div> --}}
                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}"
                                        alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::guard('admin')->user()->name }}</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Admin</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::guard('admin')->user()->name }}!</h6>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Route::currentRouteName() === 'admin.category' || Route::currentRouteName() === 'admin.roles' || Route::currentRouteName() === 'admin.cities' ? 'active' : '' }}"
                                href="#sidebarMasters" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarMasters">
                                <i class="mdi mdi-view-grid-plus-outline"></i>
                                <span data-key="t-masters">Masters</span>
                            </a>
                            <div class="collapse menu-dropdown {{ Route::currentRouteName() === 'admin.category' || Route::currentRouteName() === 'admin.roles' || Route::currentRouteName() === 'admin.cities' ? 'show' : '' }}"
                                id="sidebarMasters">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.roles') }}"
                                            class="nav-link {{ Route::currentRouteName() === 'admin.roles' ? 'active' : '' }}"
                                            data-key="t-roles"> Role
                                        </a>
                                    </li>
                        </li>
                    </ul>
                </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::currentRouteName() === 'admin.users' ? 'active' : '' }}"
                        href="{{ route('admin.users') }}">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-users">Users</span>
                    </a>
                </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        @yield('mian-content')

        <!--Toaster Start-->
        <div style="z-index:9999" class="toast-container position-fixed top-0 end-0 p-3">
            <div id="dynamicToast" class="toast overflow-hidden mt-3" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-2" id="toastIcon">
                            <i class="align-middle"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0" id="toastMessage">Your message here</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Toaster End-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © User Task.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Developed by Velzon
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/admin/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/admin/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <!-- App js -->

    <script src="{{ asset('assets/admin/js/pages/form-validation.init.js') }}"></script>

    <!-- Datatables Js-->

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/notifications.init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>

    @stack('scripts')

</body>

</html>