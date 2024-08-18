
<div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="border-bottom border-block-end-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                    <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab" data-bs-target="#switcher-home"
                        type="button" role="tab" aria-controls="switcher-home" aria-selected="true">Theme Styles</button>
                    <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab" data-bs-target="#switcher-profile"
                        type="button" role="tab" aria-controls="switcher-profile" aria-selected="false">Theme Colors</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel" aria-labelledby="switcher-home-tab"
                    tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-light-theme">
                                        Light
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style" id="switcher-light-theme"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-dark-theme">
                                        Dark
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style" id="switcher-dark-theme">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-ltr">
                                        LTR
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-ltr" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-rtl">
                                        RTL
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-vertical">
                                        Vertical
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style" id="switcher-vertical"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-horizontal">
                                        Horizontal
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-horizontal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-click">
                                        Menu Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-hover">
                                        Menu Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-hover">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-click">
                                        Icon Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-hover">
                                        Icon Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-hover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-menu">
                                        Default Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-closed-menu">
                                        Closed Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icontext-menu">
                                        Icon Text
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-overlay">
                                        Icon Overlay
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-detached">
                                        Detached
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-detached">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-double-menu">
                                        Double Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-regular">
                                        Regular
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles" id="switcher-regular"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-classic">
                                        Classic
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles" id="switcher-classic">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-modern">
                                        Modern
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles" id="switcher-modern">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-full-width">
                                        Full Width
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width" id="switcher-full-width"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-boxed">
                                        Boxed
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width" id="switcher-boxed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions" id="switcher-menu-fixed"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions" id="switcher-menu-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Loader:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-enable">
                                        Enable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-enable">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-disable">
                                        Disable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-disable" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel" aria-labelledby="switcher-profile-tab" tabindex="0">
                    <div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Menu Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Header" type="radio" name="header-colors"
                                        id="switcher-header-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio" name="header-colors"
                                        id="switcher-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio" name="header-colors"
                                        id="switcher-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Header" type="radio" name="header-colors"
                                        id="switcher-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Transparent Header" type="radio" name="header-colors"
                                        id="switcher-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-3" type="radio" name="theme-primary"
                                        id="switcher-primary2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-4" type="radio" name="theme-primary"
                                        id="switcher-primary3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-5" type="radio" name="theme-primary"
                                        id="switcher-primary4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-3" type="radio" name="theme-background"
                                        id="switcher-background2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                    <div class="theme-container-background"></div>
                                    <div class="pickr-container-background"></div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-image mb-3">
                            <p class="switcher-style-head">Menu With Background Image:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="theme-background" id="switcher-bg-img">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="theme-background" id="switcher-bg-img1">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img3" type="radio" name="theme-background"
                                        id="switcher-bg-img2">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="theme-background" id="switcher-bg-img3">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="theme-background" id="switcher-bg-img4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid canvas-footer">
                    <a href="javascript:void(0);" id="reset-all" class="btn btn-secondary btn-block m-1">Reset</a> 
                </div>
            </div>
        </div>
    </div>

    <div id="loader" >
        <img src="../assets/images/media/media-79.svg" alt="">
    </div>

    <header class="app-header">

<!-- Start::main-header-container -->
<div class="main-header-container container-fluid">

    <!-- Start::header-content-left -->
    <div class="header-content-left">

        <!-- Start::header-element -->
        <div class="header-element">
            <div class="horizontal-logo">
                <a href="index.html" class="header-logo">
                    <img src="../assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                    <img src="../assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                    <img src="../assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                    <img src="../assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                    <img src="../assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
                    <img src="../assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
                </a>
            </div>
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element">
            <!-- Start::header-link -->
            <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
            <!-- End::header-link -->
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="main-header-center d-none d-lg-block  header-link">
        <div class="input-group">
                <input type="text" class="form-control" id="typehead" placeholder="Search for results..."
                autocomplete="off">
            <button class="btn btn-primary"><i class="fe fe-search" aria-hidden="true"></i></button>
            </div>
            <div id="headersearch" class="header-search">
                <div class="p-3">
                    <div class="">
                        <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>
                        <div class="ps-2">
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>People<span></span></a>
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Pages<span></span></a>
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Articles<span></span></a>
                        </div>
                    </div>
                     <div class="mt-3">
                        <p class="fw-semibold text-muted mb-2 fs-13">Apps and pages</p>
                        <ul class="ps-2 list-unstyled">
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="full-calendar.html"><span><i class='bx bx-calendar me-2 fs-14 bg-primary-transparent p-2 rounded-circle '></i>Calendar</span></a>
                            </li>
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="mail-inbox.html"><span><i class='bx bx-envelope me-2 fs-14 bg-primary-transparent p-2 rounded-circle'></i>Mail</span></a>
                            </li>
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="buttons.html"><span><i class='bx bx-dice-1 me-2 fs-14 bg-primary-transparent p-2 rounded-circle '></i>Buttons</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-3">
                       <p class="fw-semibold text-muted mb-2 fs-13">Links</p>
                       <ul class="ps-2 list-unstyled">
                            <li class="p-1 align-items-center text-muted mb-1 search-app">
                                    <a href="javascript:void(0)" class="text-primary"><u>http://spruko/html/spruko.com</u></a>
                            </li>
                            <li class="p-1 align-items-center text-muted mb-1 search-app">
                                    <a href="javascript:void(0)" class="text-primary"><u>http://spruko/demo/spruko.com</u></a>
                            </li>
                        </ul>
                   </div>
                </div>
                <div class="py-3 border-top px-0">
                    <div class="text-center">
                        <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View all</a>
                    </div>
                </div>
            </div>
        </div>
         <!-- End::header-element -->

    </div>
    <!-- End::header-content-left -->

    <!-- Start::header-content-right -->
    <div class="header-content-right">

        <!-- Start::header-element -->
        <div class="header-element header-theme-mode">
            <!-- Start::header-link|layout-setting -->
            <a href="javascript:void(0);" class="header-link layout-setting">
                <span class="light-layout">
                    <!-- Start::header-link-icon -->
                <i class="fe fe-moon header-link-icon lh-2"></i>
                    <!-- End::header-link-icon -->
                </span>
                <span class="dark-layout">
                    <!-- Start::header-link-icon -->
                <i class="fe fe-sun header-link-icon lh-2"></i>
                    <!-- End::header-link-icon -->
                </span>
            </a>
            <!-- End::header-link|layout-setting -->
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element country-selector">
            <!-- Start::header-link|dropdown-toggle -->
            
            <!-- End::header-link|dropdown-toggle -->
            
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element header-fullscreen  d-xl-flex d-none">
            <!-- Start::header-link -->
            <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                <i class="fe fe-maximize full-screen-open header-link-icon"></i>
                <i class="fe fe-minimize full-screen-close header-link-icon d-none"></i>
            </a>
            <!-- End::header-link -->
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element cart-dropdown d-xl-flex d-none">
            <!-- Start::header-link|dropdown-toggle -->
            <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown">
                <i class="fe fe-shopping-cart header-link-icon"></i>
                <span class="badge bg-primary header-icon-badge" id="cart-icon-badge">5</span>
            </a>
            <!-- End::header-link|dropdown-toggle -->
            <!-- Start::main-header-dropdown -->
            <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                <div class="p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 fs-17 fw-semibold">Cart Items</p>
                        <span class="badge bg-primary rounded-pill" id="cart-data">5 Items</span>
                    </div>
                </div>
                <div><hr class="dropdown-divider"></div>
                <ul class="list-unstyled mb-0" id="header-cart-items-scroll">
                    <li class="dropdown-item">
                        <div class="d-flex align-items-center cart-dropdown-item">
                            <img src="../assets/images/ecommerce/jpg/1.jpg" alt="img" class="avatar avatar-sm br-5 me-3">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-start justify-content-between mb-0">
                                    <div class="mb-0 fs-13 text-dark fw-medium">
                                        <a href="ecommerce-cart.html" class="text-dark">Smart Watch</a>
                                    </div>
                                    <div>
                                        <span class="text-black mb-1 fw-medium">$1,299.00</span>
                                    </div>
                                </div>
                                <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                    <ul class="header-product-item d-flex">
                                        <li>Qty: 1</li>
                                        <li>Status: <span class="text-success">In Stock</span></li>
                                    </ul>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="ri-delete-bin-2-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-item">
                        <div class="d-flex align-items-center cart-dropdown-item">
                            <img src="../assets/images/ecommerce/jpg/3.jpg" alt="img" class="avatar avatar-sm br-5 me-3">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-start justify-content-between mb-0">
                                    <div class="mb-0 fs-13 text-dark fw-medium">
                                        <a href="ecommerce-cart.html" class="text-dark">Flowers</a>
                                    </div>
                                    <div>
                                        <span class="text-black mb-1 fw-medium">$179.29</span>
                                    </div>
                                </div>
                                <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                    <ul class="header-product-item">
                                        <li>Qty: 2</li>
                                        <li><span class="badge bg-pink-transparent fs-10">Free shipping</span></li>
                                    </ul>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="ri-delete-bin-2-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-item">
                        <div class="d-flex align-items-center cart-dropdown-item">
                            <img src="../assets/images/ecommerce/jpg/5.jpg" alt="img" class="avatar avatar-sm br-5 me-3">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-start justify-content-between mb-0">
                                    <div class="mb-0 fs-13 text-dark fw-medium">
                                        <a href="ecommerce-cart.html" class="text-dark">Running Shoes</a>
                                    </div>
                                    <div>
                                        <span class="text-black mb-1 fw-medium">$29.00</span>
                                    </div>
                                </div>
                                <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                    <ul class="header-product-item d-flex">
                                        <li>Qty: 4</li>
                                        <li>Status: <span class="text-danger">Out Stock</span></li>
                                    </ul>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="ri-delete-bin-2-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-item">
                        <div class="d-flex align-items-center cart-dropdown-item">
                            <img src="../assets/images/ecommerce/jpg/4.jpg" alt="img" class="avatar avatar-sm br-5 me-3">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-start justify-content-between mb-0">
                                    <div class="mb-0 fs-13 text-dark fw-medium">
                                        <a href="ecommerce-cart.html" class="text-dark">Furniture</a>
                                    </div>
                                    <div>
                                        <span class="text-black mb-1 fw-medium">$4,999.00</span>
                                    </div>
                                </div>
                                <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                    <ul class="header-product-item d-flex">
                                        <li>Gray</li>
                                        <li>50LB</li>
                                    </ul>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="ri-delete-bin-2-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-item">
                        <div class="d-flex align-items-center cart-dropdown-item">
                            <img src="../assets/images/ecommerce/jpg/6.jpg" alt="img" class="avatar avatar-sm br-5 me-3">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-start justify-content-between mb-0">
                                    <div class="mb-0 fs-13 text-dark fw-medium">
                                        <a href="ecommerce-cart.html" class="text-dark">Tourist Bag</a>
                                    </div>
                                    <div>
                                        <span class="text-black mb-1 fw-medium">$129.00</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start justify-content-between">
                                    <ul class="header-product-item d-flex">
                                        <li>Qty: 1</li>
                                        <li>Status: <span class="text-success">In Stock</span></li>
                                    </ul>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="ri-delete-bin-2-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="p-3 empty-header-item border-top">
                    <div class="d-grid">
                        <a href="ecommerce-checkout.html" class="btn btn-primary">Proceed to checkout</a>
                    </div>
                </div>
                <div class="p-5 empty-item d-none">
                    <div class="text-center">
                        <span class="avatar avatar-xl avatar-rounded bg-warning-transparent">
                            <i class="ri-shopping-cart-2-line fs-2"></i>
                        </span>
                        <h6 class="fw-bold mb-1 mt-3">Your Cart is Empty</h6>
                        <span class="mb-3 fw-normal fs-13 d-block">Add some items to make me happy :)</span>
                        <a href="ecommerce-products.html" class="btn btn-primary btn-wave btn-sm m-1" data-abc="true">continue shopping <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <!-- End::main-header-dropdown -->
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element notifications-dropdown">
            <!-- Start::header-link|dropdown-toggle -->
            <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                <i class="fe fe-bell header-link-icon"></i>
                <span class="badge bg-secondary header-icon-badge pulse pulse-secondary" id="notification-icon-badge">5</span>
            </a>
            <!-- End::header-link|dropdown-toggle -->
            <!-- Start::main-header-dropdown -->
            <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                <div class="p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">5 Unread</span>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <ul class="list-unstyled mb-0" id="header-notification-scroll">
                    <li class="dropdown-item">
                        <div class="d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md online bg-primary-transparent br-5"><img alt="avatar" src="../assets/images/faces/5.jpg"></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-0"><a href="notifications-list.html" class="text-dark">Congratulate <strong>Olivia James</strong> for New template start</a></p>
                                    <span class="text-muted fw-normal fs-12 header-notification-text">Oct 15 12:32pm</span>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                </div>
                             </div>
                        </div>
                    </li>
                    <li class="dropdown-item">
                        <div class="d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md offline bg-secondary-transparent br-5"><img alt="avatar" src="../assets/images/faces/2.jpg"></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-0"><a href="notifications-list.html" class="text-dark"><strong>Joshua Gray</strong> New Message Received</a></p>
                                    <span class="text-muted fw-normal fs-12 header-notification-text">Oct 13 02:56am</span>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                </div>
                             </div>
                        </div>
                    </li>
                    <li class="dropdown-item">
                        <div class="d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md online bg-pink-transparent br-5"><img alt="avatar" src="../assets/images/faces/3.jpg"></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-0"><a href="notifications-list.html" class="text-dark"><strong>Elizabeth Lewis</strong> added new schedule realease</a></p>
                                    <span class="text-muted fw-normal fs-12 header-notification-text">Oct 12 10:40pm</span>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                </div>
                             </div>
                        </div>
                    </li>
                    <li class="dropdown-item">
                        <div class="d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md online bg-warning-transparent br-5"><img alt="avatar" src="../assets/images/faces/5.jpg"></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-0 fw-normal"><a href="notifications-list.html" class="text-dark">Delivered Successful to <strong>Micky</strong> </a></p>
                                    <span class="text-muted fw-normal fs-12 header-notification-text">Order <span class="text-warning">ID: #005428</span> had been placed</span>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                </div>
                             </div>
                        </div>
                    </li>
                    <li class="dropdown-item">
                        <div class="d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md offline bg-success-transparent br-5"><img alt="avatar" src="../assets/images/faces/1.jpg"></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-0 fw-normal"><a href="notifications-list.html" class="text-dark">You got 22 requests form <strong>Facebook</strong></a></p>
                                    <span class="text-muted fw-normal fs-12 header-notification-text">Today at 08:08pm</span>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                </div>
                             </div>
                        </div>
                    </li>
                </ul>
                <div class="p-3 empty-header-item1 border-top">
                    <div class="d-grid">
                        <a href="notifications-list.html" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="p-5 empty-item1 d-none">
                    <div class="text-center">
                        <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                            <i class="ri-notification-off-line fs-2"></i>
                        </span>
                        <h6 class="fw-semibold mt-3">No New Notifications</h6>
                    </div>
                </div>
            </div>
            <!-- End::main-header-dropdown -->
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element header-shortcuts-dropdown d-xl-flex d-none">
            <!-- Start::header-link|dropdown-toggle -->
            
            <!-- End::header-link|dropdown-toggle -->
            <!-- Start::main-header-dropdown -->
            <div class="main-header-dropdown header-shortcuts-dropdown dropdown-menu pb-0 dropdown-menu-end" aria-labelledby="notificationDropdown">
                <div class="p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 fs-17 fw-semibold">Related Apps</p>
                    </div>
                </div>
                <div class="dropdown-divider mb-0"></div>
                <div class="main-header-shortcuts p-2" id="header-shortcut-scroll">
                   <div class="row g-2">
                       <div class="col-4">
                           <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/figma.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">Figma</span>
                                </div>
                            </a>
                       </div>
                       <div class="col-4">
                            <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/microsoft-powerpoint.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">Power Point</span>
                                </div>
                            </a>
                       </div>
                       <div class="col-4">
                            <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/microsoft-word.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">MS Word</span>
                                </div>
                            </a>
                       </div>
                       <div class="col-4">
                            <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/calender.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">Calendar</span>
                                </div>
                            </a>
                       </div>
                       <div class="col-4">
                            <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/sketch.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">Sketch</span>
                                </div>
                            </a>
                       </div>
                       <div class="col-4">
                            <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/google-docs.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">Docs</span>
                                </div>
                            </a>
                       </div>
                       <div class="col-4">
                            <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/google.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">Google</span>
                                </div>
                            </a>
                       </div>
                       <div class="col-4">
                            <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/translate.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">Translate</span>
                                </div>
                            </a>
                       </div>
                       <div class="col-4">
                            <a href="javascript:void(0);" class="text-dark">
                                <div class="text-center p-3 related-app">
                                    <span class="avatar avatar-sm rounded-2 p-1 bg-primary-transparent">
                                        <img src="../assets/images/apps/google-sheets.png" alt="">
                                    </span>
                                    <span class="d-block fs-12">Sheets</span>
                                </div>
                            </a>
                       </div>
                   </div>
                </div>
                <div class="p-3 border-top">
                    <div class="d-grid">
                        <a href="javascript:void(0);" class="btn btn-primary">View All</a>
                    </div>
                </div>
            </div>
            <!-- End::main-header-dropdown -->
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element">
            <!-- Start::header-link|dropdown-toggle -->
            <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="header-link-icon">
                        <img src="../assets/images/faces/1.jpg" alt="img" width="32" height="32" class="rounded-circle">
                    </div>
                    <div class="d-none">
                        <p class="fw-semibold mb-0">Angelica</p>
                        <span class="op-7 fw-normal d-block fs-11">Web Designer</span>
                    </div>
                </div>
            </a>
            <!-- End::header-link|dropdown-toggle -->
            <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                <Li>
                    <div class="header-navheading border-bottom">
                        <h6 class="main-notification-title">Sonia Taylor</h6>
                        <p class="main-notification-text mb-0">Web Designer</p>
                    </div>
                </Li>
                <li><a class="dropdown-item d-flex border-bottom" href="profile.html"><i class="fe fe-user fs-16 align-middle me-2"></i>Profile</a></li>
                <li><a class="dropdown-item d-flex border-bottom" href="mail-inbox.html"><i class="fe fe-inbox fs-16 align-middle me-2"></i>Inbox <span class="badge bg-success ms-auto">25</span></a></li>
                <li><a class="dropdown-item d-flex border-bottom border-block-end" href="notifications-list.html"><i class="fe fe-compass fs-16 align-middle me-2"></i>Activity</a></li>
                <li><a class="dropdown-item d-flex border-bottom" href="settings.html"><i class="fe fe-settings fs-16 align-middle me-2"></i>Settings</a></li>
                <li><a class="dropdown-item d-flex border-bottom" href="chat.html"><i class="fe fe-headphones fs-16 align-middle me-2"></i>Support</a></li>
                <li><a class="dropdown-item d-flex" href="signin.html"><i class="fe fe-power fs-16 align-middle me-2"></i>Log Out</a></li>
            </ul>
        </div>  
        <!-- End::header-element -->    

       

        <!-- Start::header-element -->
        <div class="header-element">
            
        </div>
        <!-- End::header-element -->

    </div>
    <!-- End::header-content-right -->

</div>
<!-- End::main-header-container -->

</header>