<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Nazox - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- ===================== CSS — each file loaded ONCE ===================== -->

    <!-- Bootstrap 5.3.7 (single version, consistent with JS below) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- SimpleBar -->
    <link href="https://cdn.jsdelivr.net/npm/simplebar@6.3.2/dist/simplebar.min.css" rel="stylesheet">

    <!-- jQuery Vector Map -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jvectormap@2.0.5/jquery-jvectormap.css">

    <!-- DataTables Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.11/css/dataTables.bootstrap4.min.css">

    <!-- DataTables Responsive Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.1/css/responsive.bootstrap4.min.css">

    <!-- Custom App CSS — must come LAST so it can override vendor styles -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <!-- ===================================================================== -->
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.php" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="logo-sm-dark" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-dark" height="20">
                            </span>
                        </a>

                        <a href="index.php" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-sm-light.png') }}" alt="logo-sm-light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo-light" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="ri-search-line"></span>
                        </div>
                    </form>

                    <div class="dropdown dropdown-mega d-none d-lg-block ms-2">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            Mega Menu
                            <i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-megamenu">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="font-size-14">UI Components</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li><a href="javascript:void(0);">Lightbox</a></li>
                                                <li><a href="javascript:void(0);">Range Slider</a></li>
                                                <li><a href="javascript:void(0);">Sweet Alert</a></li>
                                                <li><a href="javascript:void(0);">Rating</a></li>
                                                <li><a href="javascript:void(0);">Forms</a></li>
                                                <li><a href="javascript:void(0);">Tables</a></li>
                                                <li><a href="javascript:void(0);">Charts</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="font-size-14">Applications</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li><a href="javascript:void(0);">Ecommerce</a></li>
                                                <li><a href="javascript:void(0);">Calendar</a></li>
                                                <li><a href="javascript:void(0);">Email</a></li>
                                                <li><a href="javascript:void(0);">Projects</a></li>
                                                <li><a href="javascript:void(0);">Tasks</a></li>
                                                <li><a href="javascript:void(0);">Contacts</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="font-size-14">Extra Pages</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li><a href="javascript:void(0);">Light Sidebar</a></li>
                                                <li><a href="javascript:void(0);">Compact Sidebar</a></li>
                                                <li><a href="javascript:void(0);">Horizontal layout</a></li>
                                                <li><a href="javascript:void(0);">Maintenance</a></li>
                                                <li><a href="javascript:void(0);">Coming Soon</a></li>
                                                <li><a href="javascript:void(0);">Timeline</a></li>
                                                <li><a href="javascript:void(0);">FAQs</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h5 class="font-size-14">UI Components</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li><a href="javascript:void(0);">Lightbox</a></li>
                                                <li><a href="javascript:void(0);">Range Slider</a></li>
                                                <li><a href="javascript:void(0);">Sweet Alert</a></li>
                                                <li><a href="javascript:void(0);">Rating</a></li>
                                                <li><a href="javascript:void(0);">Forms</a></li>
                                                <li><a href="javascript:void(0);">Tables</a></li>
                                                <li><a href="javascript:void(0);">Charts</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-sm-5">
                                            <div>
                                                <img src="{{ asset('assets/images/megamenu-img.png') }}" alt="megamenu-img" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-search-line"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="mb-3 m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="" src="{{ asset('assets/images/flags/us.jpg') }}" alt="Header Language" height="16">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/spain.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/germany.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="px-lg-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('assets/images/brands/github.png') }}" alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('assets/images/brands/bitbucket.png') }}" alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('assets/images/brands/dribbble.png') }}" alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('assets/images/brands/dropbox.png') }}" alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('assets/images/brands/mail_chimp.png') }}" alt="mail_chimp">
                                            <span>Mail Chimp</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('assets/images/brands/slack.png') }}" alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect">
                            <i class="ri-fullscreen-line"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-notification-3-line"></i>
                            <span class="noti-dot"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="ri-shopping-cart-line"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mb-1">James Lemire</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="ri-checkbox-circle-line"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/users/avatar-4.jpg') }}"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mb-1">Salena Layfield</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1">Kevin</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
                            <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="ri-settings-2-line"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="index.php" class="waves-effect">
                                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="calendar.php" class="waves-effect">
                                <i class="ri-calendar-2-line"></i>
                                <span>Calendar</span>
                            </a>
                        </li>

                        <li>
                            <a href="apps-chat.php" class="waves-effect">
                                <i class="ri-chat-1-line"></i>
                                <span>Chat</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-store-2-line"></i>
                                <span>Ecommerce</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ecommerce-products.php">Products</a></li>
                                <li><a href="ecommerce-product-detail.php">Product Detail</a></li>
                                <li><a href="ecommerce-orders.php">Orders</a></li>
                                <li><a href="ecommerce-customers.php">Customers</a></li>
                                <li><a href="ecommerce-cart.php">Cart</a></li>
                                <li><a href="ecommerce-checkout.php">Checkout</a></li>
                                <li><a href="ecommerce-shops.php">Shops</a></li>
                                <li><a href="ecommerce-add-product.php">Add Product</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-mail-send-line"></i>
                                <span>Email</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="email-inbox.php">Inbox</a></li>
                                <li><a href="email-read.php">Read Email</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="apps-kanban-board.php" class="waves-effect">
                                <i class="ri-artboard-2-line"></i>
                                <span>Kanban Board</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="layouts-light-sidebar.php">Light Sidebar</a></li>
                                        <li><a href="layouts-compact-sidebar.php">Compact Sidebar</a></li>
                                        <li><a href="layouts-icon-sidebar.php">Icon Sidebar</a></li>
                                        <li><a href="layouts-boxed.php">Boxed Layout</a></li>
                                        <li><a href="layouts-preloader.php">Preloader</a></li>
                                        <li><a href="layouts-colored-sidebar.php">Colored Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="layouts-horizontal.php">Horizontal</a></li>
                                        <li><a href="layouts-hori-topbar-light.php">Topbar light</a></li>
                                        <li><a href="layouts-hori-boxed-width.php">Boxed width</a></li>
                                        <li><a href="layouts-hori-preloader.php">Preloader</a></li>
                                        <li><a href="layouts-hori-colored-header.php">Colored Header</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-title">Pages</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-account-circle-line"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="auth-login.php">Login</a></li>
                                <li><a href="auth-register.php">Register</a></li>
                                <li><a href="auth-recoverpw.php">Recover Password</a></li>
                                <li><a href="auth-lock-screen.php">Lock Screen</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-profile-line"></i>
                                <span>Utility</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="pages-starter.php">Starter Page</a></li>
                                <li><a href="pages-maintenance.php">Maintenance</a></li>
                                <li><a href="pages-comingsoon.php">Coming Soon</a></li>
                                <li><a href="pages-timeline.php">Timeline</a></li>
                                <li><a href="pages-faqs.php">FAQs</a></li>
                                <li><a href="pages-pricing.php">Pricing</a></li>
                                <li><a href="pages-404.php">Error 404</a></li>
                                <li><a href="pages-500.php">Error 500</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Components</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-pencil-ruler-2-line"></i>
                                <span>UI Elements</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-alerts.php">Alerts</a></li>
                                <li><a href="ui-buttons.php">Buttons</a></li>
                                <li><a href="ui-cards.php">Cards</a></li>
                                <li><a href="ui-carousel.php">Carousel</a></li>
                                <li><a href="ui-dropdowns.php">Dropdowns</a></li>
                                <li><a href="ui-grid.php">Grid</a></li>
                                <li><a href="ui-images.php">Images</a></li>
                                <li><a href="ui-lightbox.php">Lightbox</a></li>
                                <li><a href="ui-modals.php">Modals</a></li>
                                <li><a href="ui-offcanvas.php">Offcavas</a></li>
                                <li><a href="ui-rangeslider.php">Range Slider</a></li>
                                <li><a href="ui-roundslider.php">Round Slider</a></li>
                                <li><a href="ui-session-timeout.php">Session Timeout</a></li>
                                <li><a href="ui-progressbars.php">Progress Bars</a></li>
                                <li><a href="ui-sweet-alert.php">Sweetalert 2</a></li>
                                <li><a href="ui-tabs-accordions.php">Tabs & Accordions</a></li>
                                <li><a href="ui-typography.php">Typography</a></li>
                                <li><a href="ui-video.php">Video</a></li>
                                <li><a href="ui-general.php">General</a></li>
                                <li><a href="ui-rating.php">Rating</a></li>
                                <li><a href="ui-notifications.php">Notifications</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ri-eraser-fill"></i>
                                <span class="badge rounded-pill bg-danger float-end">8</span>
                                <span>Forms</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="form-elements.php">Form Elements</a></li>
                                <li><a href="form-validation.php">Form Validation</a></li>
                                <li><a href="form-advanced.php">Form Advanced Plugins</a></li>
                                <li><a href="form-editors.php">Form Editors</a></li>
                                <li><a href="form-uploads.php">Form File Upload</a></li>
                                <li><a href="form-wizard.php">Form Wizard</a></li>
                                <li><a href="form-mask.php">Form Mask</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-table-2"></i>
                                <span>Tables</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="tables-basic.php">Basic Tables</a></li>
                                <li><a href="tables-datatable.php">Data Tables</a></li>
                                <li><a href="tables-responsive.php">Responsive Table</a></li>
                                <li><a href="tables-editable.php">Editable Table</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-bar-chart-line"></i>
                                <span>Charts</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="charts-apex.php">Apex Charts</a></li>
                                <li><a href="charts-chartjs.php">Chartjs Charts</a></li>
                                <li><a href="charts-flot.php">Flot Charts</a></li>
                                <li><a href="charts-knob.php">Jquery Knob Charts</a></li>
                                <li><a href="charts-sparkline.php">Sparkline Charts</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-brush-line"></i>
                                <span>Icons</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="icons-remix.php">Remix Icons</a></li>
                                <li><a href="icons-materialdesign.php">Material Design</a></li>
                                <li><a href="icons-dripicons.php">Dripicons</a></li>
                                <li><a href="icons-fontawesome.php">Font awesome 5</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-map-pin-line"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="maps-google.php">Google Maps</a></li>
                                <li><a href="maps-vector.php">Vector Maps</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-share-line"></i>
                                <span>Multi Level</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 1.1</a></li>
                                <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="javascript: void(0);">Level 2.1</a></li>
                                        <li><a href="javascript: void(0);">Level 2.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nazox</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Number of Sales</p>
                                                    <h4 class="mb-0">1452</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-stack-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body border-top py-3">
                                            <div class="text-truncate">
                                                <span class="badge bg-success-subtle text-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                <span class="text-muted ms-2">From previous period</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Sales Revenue</p>
                                                    <h4 class="mb-0">$ 38452</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-store-2-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body border-top py-3">
                                            <div class="text-truncate">
                                                <span class="badge bg-success-subtle text-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                <span class="text-muted ms-2">From previous period</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-1 overflow-hidden">
                                                    <p class="text-truncate font-size-14 mb-2">Average Price</p>
                                                    <h4 class="mb-0">$ 15.4</h4>
                                                </div>
                                                <div class="text-primary ms-auto">
                                                    <i class="ri-briefcase-4-line font-size-24"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body border-top py-3">
                                            <div class="text-truncate">
                                                <span class="badge bg-success-subtle text-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                                <span class="text-muted ms-2">From previous period</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end d-none d-md-inline-block">
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-sm btn-light">Today</button>
                                            <button type="button" class="btn btn-sm btn-light active">Weekly</button>
                                            <button type="button" class="btn btn-sm btn-light">Monthly</button>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4">Revenue Analytics</h4>
                                    <div>
                                        <div id="line-column-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>

                                <div class="card-body border-top text-center">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="d-inline-flex">
                                                <h5 class="me-2">$12,253</h5>
                                                <div class="text-success">
                                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                                </div>
                                            </div>
                                            <p class="text-muted text-truncate mb-0">This month</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-primary font-size-10 me-1"></i> This Year :</p>
                                                <div class="d-inline-flex">
                                                    <h5 class="mb-0 me-2">$ 34,254</h5>
                                                    <div class="text-success">
                                                        <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-success font-size-10 me-1"></i> Previous Year :</p>
                                                <div class="d-inline-flex">
                                                    <h5 class="mb-0">$ 32,695</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end">
                                        <select class="form-select form-select-sm">
                                            <option selected>Apr</option>
                                            <option value="1">Mar</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Jan</option>
                                        </select>
                                    </div>
                                    <h4 class="card-title mb-4">Sales Analytics</h4>
                                    <div id="donut-chart" class="apex-charts"></div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="text-center mt-4">
                                                <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary font-size-10 me-1"></i> Product A</p>
                                                <h5>42 %</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center mt-4">
                                                <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-success font-size-10 me-1"></i> Product B</p>
                                                <h5>26 %</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center mt-4">
                                                <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-warning font-size-10 me-1"></i> Product C</p>
                                                <h5>42 %</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Earning Reports</h4>
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <div id="radialchart-1" class="apex-charts"></div>
                                                    </div>
                                                    <p class="text-muted text-truncate mb-2">Weekly Earnings</p>
                                                    <h5 class="mb-0">$2,523</h5>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="mt-5 mt-sm-0">
                                                    <div class="mb-3">
                                                        <div id="radialchart-2" class="apex-charts"></div>
                                                    </div>
                                                    <p class="text-muted text-truncate mb-2">Monthly Earnings</p>
                                                    <h5 class="mb-0">$11,235</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-3">Sources</h4>

                                    <div>
                                        <div class="text-center">
                                            <p class="mb-2">Total sources</p>
                                            <h4>$ 7652</h4>
                                            <div class="text-success">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                            </div>
                                        </div>

                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover mb-0 table-centered table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 60px;">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light">
                                                                    <img src="{{ asset('assets/images/companies/img-1.png') }}" alt="img-1" height="20">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 mb-0">Source 1</h5></td>
                                                        <td><div id="spak-chart1"></div></td>
                                                        <td><p class="text-muted mb-0">$ 2478</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light">
                                                                    <img src="{{ asset('assets/images/companies/img-2.png') }}" alt="img-2" height="20">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 mb-0">Source 2</h5></td>
                                                        <td><div id="spak-chart2"></div></td>
                                                        <td><p class="text-muted mb-0">$ 2625</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light">
                                                                    <img src="{{ asset('assets/images/companies/img-3.png') }}" alt="img-3" height="20">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 mb-0">Source 3</h5></td>
                                                        <td class="overflow-hidden"><div id="spak-chart3"></div></td>
                                                        <td><p class="text-muted mb-0">$ 2856</p></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="text-center mt-4">
                                            <a href="#" class="btn btn-primary btn-sm">View more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Recent Activity Feed</h4>

                                    <div data-simplebar style="max-height: 330px;">
                                        <ul class="list-unstyled activity-wid">
                                            <li class="activity-list">
                                                <div class="activity-icon avatar-xs">
                                                    <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class="ri-edit-2-fill"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <div><h5 class="font-size-13">28 Apr, 2020 <small class="text-muted">12:07 am</small></h5></div>
                                                    <div><p class="text-muted mb-0">Responded to need "Volunteer Activities"</p></div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="activity-icon avatar-xs">
                                                    <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class="ri-user-2-fill"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <div><h5 class="font-size-13">21 Apr, 2020 <small class="text-muted">08:01 pm</small></h5></div>
                                                    <div><p class="text-muted mb-0">Added an interest "Volunteer Activities"</p></div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="activity-icon avatar-xs">
                                                    <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class="ri-bar-chart-fill"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <div><h5 class="font-size-13">17 Apr, 2020 <small class="text-muted">09:23 am</small></h5></div>
                                                    <div><p class="text-muted mb-0">Joined the group "Boardsmanship Forum"</p></div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="activity-icon avatar-xs">
                                                    <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class="ri-mail-fill"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <div><h5 class="font-size-13">11 Apr, 2020 <small class="text-muted">05:10 pm</small></h5></div>
                                                    <div><p class="text-muted mb-0">Responded to need "In-Kind Opportunity"</p></div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="activity-icon avatar-xs">
                                                    <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class="ri-calendar-2-fill"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <div><h5 class="font-size-13">07 Apr, 2020 <small class="text-muted">12:47 pm</small></h5></div>
                                                    <div><p class="text-muted mb-0">Created need "Volunteer Activities"</p></div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="activity-icon avatar-xs">
                                                    <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class="ri-edit-2-fill"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <div><h5 class="font-size-13">05 Apr, 2020 <small class="text-muted">03:09 pm</small></h5></div>
                                                    <div><p class="text-muted mb-0">Attending the event "Some New Event"</p></div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="activity-icon avatar-xs">
                                                    <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class="ri-user-2-fill"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <div><h5 class="font-size-13">02 Apr, 2020 <small class="text-muted">12:07 am</small></h5></div>
                                                    <div><p class="text-muted mb-0">Responded to need "In-Kind Opportunity"</p></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Revenue by Locations</h4>
                                    <div id="usa-vectormap" style="height: 196px"></div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-5 col-md-6">
                                            <div class="mt-2">
                                                <div class="clearfix py-2">
                                                    <h5 class="float-end font-size-16 m-0">$ 2542</h5>
                                                    <p class="text-muted mb-0 text-truncate">California :</p>
                                                </div>
                                                <div class="clearfix py-2">
                                                    <h5 class="float-end font-size-16 m-0">$ 2245</h5>
                                                    <p class="text-muted mb-0 text-truncate">Nevada :</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 offset-xl-1 col-md-6">
                                            <div class="mt-2">
                                                <div class="clearfix py-2">
                                                    <h5 class="float-end font-size-16 m-0">$ 2156</h5>
                                                    <p class="text-muted mb-0 text-truncate">Montana :</p>
                                                </div>
                                                <div class="clearfix py-2">
                                                    <h5 class="float-end font-size-16 m-0">$ 1845</h5>
                                                    <p class="text-muted mb-0 text-truncate">Texas :</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a href="#" class="btn btn-primary btn-sm">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <div class="user-chat-border">
                                        <div class="row">
                                            <div class="col-md-5 col-9">
                                                <h5 class="font-size-15 mb-1">Frank Vickery</h5>
                                                <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle me-1"></i> Active now</p>
                                            </div>
                                            <div class="col-md-7 col-3">
                                                <ul class="list-inline user-chat-nav text-end mb-0">
                                                    <li class="list-inline-item">
                                                        <div class="dropdown">
                                                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-magnify"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-0">
                                                                <form class="p-2">
                                                                    <div class="search-box">
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                                                            <i class="mdi mdi-magnify search-icon"></i>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item d-none d-sm-inline-block">
                                                        <div class="dropdown">
                                                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-cog"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">View Profile</a>
                                                                <a class="dropdown-item" href="#">Clear chat</a>
                                                                <a class="dropdown-item" href="#">Muted</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="dropdown">
                                                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chat-widget">
                                        <div class="chat-conversation" data-simplebar style="max-height: 295px;">
                                            <ul class="list-unstyled mb-0 pe-3">
                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="chat-avatar">
                                                            <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="avatar-2">
                                                        </div>
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">Frank Vickery</div>
                                                            <div class="ctext-wrap-content">
                                                                <p class="mb-0">Hey! I am available</p>
                                                            </div>
                                                            <p class="chat-time mb-0"><i class="mdi mdi-clock-outline align-middle me-1"></i> 12:09</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="right">
                                                    <div class="conversation-list">
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">Ricky Clark</div>
                                                            <div class="ctext-wrap-content">
                                                                <p class="mb-0">Hi, How are you? What about our next meeting?</p>
                                                            </div>
                                                            <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:02</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="chat-day-title">
                                                        <span class="title">Today</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="chat-avatar">
                                                            <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="avatar-2">
                                                        </div>
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">Frank Vickery</div>
                                                            <div class="ctext-wrap-content">
                                                                <p class="mb-0">Hello!</p>
                                                            </div>
                                                            <p class="chat-time mb-0"><i class="mdi mdi-clock-outline align-middle me-1"></i> 10:00</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="right">
                                                    <div class="conversation-list">
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">Ricky Clark</div>
                                                            <div class="ctext-wrap-content">
                                                                <p class="mb-0">Hi, How are you? What about our next meeting?</p>
                                                            </div>
                                                            <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:02</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="chat-avatar">
                                                            <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="avatar-2">
                                                        </div>
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">Frank Vickery</div>
                                                            <div class="ctext-wrap-content">
                                                                <p class="mb-0">Yeah everything is fine</p>
                                                            </div>
                                                            <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:06</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="chat-avatar">
                                                            <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="avatar-2">
                                                        </div>
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">Frank Vickery</div>
                                                            <div class="ctext-wrap-content">
                                                                <p class="mb-0">& Next meeting tomorrow 10.00AM</p>
                                                            </div>
                                                            <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:06</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="right">
                                                    <div class="conversation-list">
                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name">Ricky Clark</div>
                                                            <div class="ctext-wrap-content">
                                                                <p class="mb-0">Wow that's great</p>
                                                            </div>
                                                            <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:07</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 chat-input-section border-top">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control rounded chat-input ps-3" placeholder="Enter Message...">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light">
                                                <span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Latest Transactions</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered datatable dt-responsive nowrap" data-bs-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 20px;">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="ordercheck">
                                                            <label class="form-check-label mb-0" for="ordercheck">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                    <th>Billing Name</th>
                                                    <th>Total</th>
                                                    <th>Payment Status</th>
                                                    <th style="width: 120px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck1"><label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1572</a></td>
                                                    <td>04 Apr, 2020</td>
                                                    <td>Walter Brown</td>
                                                    <td>$172</td>
                                                    <td><div class="badge bg-success-subtle text-success font-size-12">Paid</div></td>
                                                    <td id="tooltip-container1">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck2"><label class="form-check-label mb-0" for="ordercheck2">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1571</a></td>
                                                    <td>03 Apr, 2020</td>
                                                    <td>Jimmy Barker</td>
                                                    <td>$165</td>
                                                    <td><div class="badge bg-warning-subtle text-warning font-size-12">unpaid</div></td>
                                                    <td id="tooltip-container2">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck3"><label class="form-check-label mb-0" for="ordercheck3">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1570</a></td>
                                                    <td>03 Apr, 2020</td>
                                                    <td>Donald Bailey</td>
                                                    <td>$146</td>
                                                    <td><div class="badge bg-success-subtle text-success font-size-12">Paid</div></td>
                                                    <td id="tooltip-container3">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container3" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container3" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck4"><label class="form-check-label mb-0" for="ordercheck4">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1569</a></td>
                                                    <td>02 Apr, 2020</td>
                                                    <td>Paul Jones</td>
                                                    <td>$183</td>
                                                    <td><div class="badge bg-success-subtle text-success font-size-12">Paid</div></td>
                                                    <td id="tooltip-container41">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container41" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container41" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck5"><label class="form-check-label mb-0" for="ordercheck5">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1568</a></td>
                                                    <td>01 Apr, 2020</td>
                                                    <td>Jefferson Allen</td>
                                                    <td>$160</td>
                                                    <td><div class="badge bg-danger-subtle text-danger font-size-12">Chargeback</div></td>
                                                    <td id="tooltip-container4">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck6"><label class="form-check-label mb-0" for="ordercheck6">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1567</a></td>
                                                    <td>31 Mar, 2020</td>
                                                    <td>Jeffrey Waltz</td>
                                                    <td>$105</td>
                                                    <td><div class="badge bg-warning-subtle text-warning font-size-12">unpaid</div></td>
                                                    <td id="tooltip-container5">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container5" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container5" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck7"><label class="form-check-label mb-0" for="ordercheck7">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1566</a></td>
                                                    <td>30 Mar, 2020</td>
                                                    <td>Jewel Buckley</td>
                                                    <td>$112</td>
                                                    <td><div class="badge bg-success-subtle text-success font-size-12">Paid</div></td>
                                                    <td id="tooltip-container6">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container6" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container6" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck8"><label class="form-check-label mb-0" for="ordercheck8">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1565</a></td>
                                                    <td>29 Mar, 2020</td>
                                                    <td>Jamison Clark</td>
                                                    <td>$123</td>
                                                    <td><div class="badge bg-success-subtle text-success font-size-12">Paid</div></td>
                                                    <td id="tooltip-container7">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container7" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container7" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck9"><label class="form-check-label mb-0" for="ordercheck9">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1564</a></td>
                                                    <td>28 Mar, 2020</td>
                                                    <td>Eddy Torres</td>
                                                    <td>$141</td>
                                                    <td><div class="badge bg-success-subtle text-success font-size-12">Paid</div></td>
                                                    <td id="tooltip-container8">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container8" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container8" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div class="form-check"><input type="checkbox" class="form-check-input" id="ordercheck10"><label class="form-check-label mb-0" for="ordercheck10">&nbsp;</label></div></td>
                                                    <td><a href="javascript: void(0);" class="text-reset fw-bold">#NZ1563</a></td>
                                                    <td>28 Mar, 2020</td>
                                                    <td>Frank Dean</td>
                                                    <td>$164</td>
                                                    <td><div class="badge bg-warning-subtle text-warning font-size-12">unpaid</div></td>
                                                    <td id="tooltip-container9">
                                                        <a href="javascript:void(0);" class="me-3 text-primary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="javascript:void(0);" class="text-danger" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Nazox.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">
                <h5 class="m-0 me-2">Settings</h5>
                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/layout-1.jpg') }}" class="img-fluid img-thumbnail" alt="layout-1">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/layout-2.jpg') }}" class="img-fluid img-thumbnail" alt="layout-2">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch"
                        data-bsStyle="{{ asset('assets/css/bootstrap-dark.min.css') }}"
                        data-appStyle="{{ asset('assets/css/app-dark.min.css') }}">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/layout-3.jpg') }}" class="img-fluid img-thumbnail" alt="layout-3">
                </div>
                <div class="form-check form-switch mb-5">
                    <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch"
                        data-appStyle="{{ asset('assets/css/app-rtl.min.css') }}">
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>
            </div>
        </div>
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- ===================== JS — each library loaded ONCE, in correct order ===================== -->

    <!-- 1. jQuery (must be first — all plugins depend on it) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- 2. Bootstrap 5.3.7 bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 3. MetisMenu (sidebar accordion) -->
    <script src="https://cdn.jsdelivr.net/npm/metismenu@3.0.7/dist/metisMenu.min.js"></script>

    <!-- 4. SimpleBar (custom scrollbars) -->
    <script src="https://cdn.jsdelivr.net/npm/simplebar@6.3.2/dist/simplebar.min.js"></script>

    <!-- 5. Node Waves (click-ripple effect) -->
    <script src="https://cdn.jsdelivr.net/npm/node-waves@0.7.6/dist/waves.min.js"></script>

    <!-- 6. Theme app.js (initialises sidebar, waves, layout — needs jQuery + plugins above) -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- 7. ApexCharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- 8. jQuery Vector Map -->
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

    <!-- 9. DataTables (depends on jQuery) -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- 10. Dashboard page init (must be last — uses all of the above) -->
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

    <!-- ========================================================================================= -->
</body>

</html>