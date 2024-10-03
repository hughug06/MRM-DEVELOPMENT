
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
                    <h2 class="my-auto">
                        <span class="text-primary">MRM</span
                        ><span class="text-info">-EG</span>
                    </h2>
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

    </div>
    <!-- End::header-content-left -->

    <!-- Start::header-content-right -->
    <div class="header-content-right">
        <?php 
        if($_SESSION['auth'] == "user")
        {
        ?>
<div class="header-element d-xl-flex align-items-center">
            <!-- Start::header-link -->
            <a href="#" id="view-projects" class="header-link" name="projects">
                <i class="fa-regular fa-rectangle-list header-link-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Projects"></i>
            </a>
            <!-- End::header-link -->
        </div>
<!-- 
        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
            <i class="fe fe-bell header-link-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications"></i>
            <span class="badge bg-secondary header-icon-badge pulse pulse-secondary" id="notification-icon-badge">5</span>
        </a> -->

        <!-- Appointment Button  -->
        <div class="header-element">
            <!-- Start::header-link -->
            <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="modal" data-bs-target="#appointmentmodal">
                <i class="si icon-book-open header-link-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Appointments"></i>
                <?php 
                 $count_appointment = 0;
                 $userid = $_SESSION['account_id'];
                 $sql_select = "select COUNT(*) AS total_appointments from appointments 
                 inner join service_pricing on appointments.appointment_id = service_pricing.appointment_id 
                 where appointments.account_id = '$userid' and appointments.status = 'Waiting' OR appointments.status = 'Approved' OR appointments.status = 'Checking' ";
                 $sql_result = mysqli_query($conn, $sql_select);
                 $row_count_appointments = mysqli_fetch_assoc($sql_result);
                 $count_appointment = $row_count_appointments['total_appointments'];    
                ?>
                <span class="badge bg-secondary header-icon-badge pulse pulse-secondary" id="appointCount"><?= $count_appointment ?></span>
            </a>
            <!-- End::header-link -->
        </div>
        <?php 
        }
        ?>
        <!--  -->
        <!-- Start::header-element -->
        <div class="header-element header-theme-mode">
            <!-- Start::header-link|layout-setting -->
            <a href="javascript:void(0);" class="header-link layout-setting">
                <span class="light-layout">
                    <!-- Start::header-link-icon -->
                <i class="fe fe-moon header-link-icon lh-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dark Mode"></i>
                    <!-- End::header-link-icon -->
                </span>
                <span class="dark-layout">
                    <!-- Start::header-link-icon -->
                <i class="fe fe-sun header-link-icon lh-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Light Mode"></i>
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
            <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link" id="typehead">
                <i class="fe fe-maximize full-screen-open header-link-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter Full Screen"></i>
                <i class="fe fe-minimize full-screen-close header-link-icon d-none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Exit Full Screen"></i>
            </a>
            <!-- End::header-link -->
        </div>

        <!-- Start::header-element -->
        <div class="header-element cart-dropdown d-xl-flex d-none">
                <ul class="list-unstyled mb-0" id="header-cart-items-scroll">
                </ul>
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element notifications-dropdown">
            <!-- Start::header-link|dropdown-toggle -->
            <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                <i class="fe fe-bell header-link-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications"></i>
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
        <div class="header-element d-xl-flex d-none">
            <div class="main-header-shortcuts" id="header-shortcut-scroll"></div>
        </div>
        <!-- End::header-element -->
        <div class="header-element d-xl-flex align-items-center">
            <!-- Start::header-link -->
            <a href="#" id="logout-link" class="header-link" name="logout">
                <i class="si si-logout header-link-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout"></i>
            </a>
            <!-- End::header-link -->
        </div>
    </div>
    <!-- End::header-content-right -->
</div>
<!-- End::main-header-container -->

</header>


<div class="container">

<!-- MODAL FOR RECEIPT -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="receiptModalLabel">Receipt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="receiptContent" style="padding: 20px; font-family: Arial, sans-serif;">
            <div style="border: 2px solid #000; padding: 20px;">
                <div class="text-center mb-4">
                    <h2 style="margin-bottom: 5px;">MRM Electric Power Generation Services</h2>
                    <p style="margin: 0;">Official Service Receipt</p>
                    <p style="margin: 0;">1234 Business Ave, City, Country</p>
                    <p style="margin: 0;">Phone: (123) 456-7890</p>
                    <hr style="border-top: 1px solid #000; margin-top: 10px;">
                </div>

                <?php 
                    $receipt = "
                    SELECT * 
                    FROM service_or
                    INNER JOIN accounts AS client_account ON client_account.account_id = service_or.client_id
                    INNER JOIN appointments ON appointments.appointment_id = service_or.appointment_id
                    INNER JOIN service_payment ON service_payment.payment_id = service_or.payment_id
                    INNER JOIN accounts AS worker_account ON worker_account.account_id = service_or.worker_id
                    
                    ";
                    $receipt_result = mysqli_query($conn , $receipt);
                    $row = mysqli_fetch_assoc($receipt_result);
                    $workername = $row['worker_id'];
                    $username = $row['client_id'];
                    $appointment_id = $row['appointment_id'];

                    $worker = "select * from accounts inner join user_info on user_info.user_id = accounts.user_id where account_id = '$workername'";
                    $user = "select * from accounts inner join user_info on user_info.user_id = accounts.user_id where account_id = '$username'";

                    $worker_result = mysqli_query($conn , $worker);
                    $user_result = mysqli_query($conn , $user);

                    $row_worker = mysqli_fetch_assoc($worker_result);
                    $row_user = mysqli_fetch_assoc($user_result);
                ?>

                <table class="table table-borderless" style="width: 100%;">
                    <tr>
                        <td><strong>Receipt No:</strong></td>
                        <td><?= $row['receiptid'] ?></td>
                        <td><strong>Date:</strong></td>
                        <td><?= $row['date'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Customer Name:</strong></td>
                        <td><?= $row_user['first_name'] . " " . $row_user['last_name'] ?></td>
                        <td><strong>Worker Name:</strong></td>
                        <td><?= $row_worker['first_name'] . " " . $row_worker['last_name'] ?></td>
                    </tr>
                </table>
                <hr>

                <h5 class="mt-3">Service Details</h5>
                <table class="table table-bordered" style="width: 100%;">
                    <tr>
                        <td><strong>Brand</strong></td>
                        <td><?= $row['brand'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Product</strong></td>
                        <td><?= $row['product'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Power</strong></td>
                        <td><?= $row['power'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Running Hours</strong></td>
                        <td><?= $row['running_hours'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Service Type</strong></td>
                        <td><?= $row['service_type'] ?></td>
                    </tr>
                </table>

                <div class="text-right mt-4">
                    <!-- Content where account_id and appointment_id will be displayed -->
                   
                    <?php 
                    // $account_id = $['']
                    $price_id = $row['pricing_id'];
                    $price = "select * from service_pricing where pricingid = '$price_id' and account_id = '$username' AND appointment_id = '$appointment_id'";
                    $price_result = mysqli_query($conn , $price);
                    $row_price = mysqli_fetch_assoc($price_result);
                    ?>
                     <p><strong>Total Amount Paid: </strong> $<?= number_format($row_price['amount'], 2) ?></p>
                </div>
                <div class="text-center mt-5">
                    <p>Thank you for your business!</p>
                    <p><em>Please retain this receipt for your records.</em></p>
                </div>
            </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="downloadReceipt">Download Receipt</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Viewing Appointments -->
<div class="modal fade" id="appointmentmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="staticBackdropLabel">View Appointments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-3">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">My Address</th>
                                <th scope="col">Set Date</th>
                                <th scope="col">Set Time</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Appointment Status</th>
                                <th scope="col">Check Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        
                            $userid = $_SESSION['account_id'];
                            $sql = "select * from appointments 
                            inner join service_pricing on appointments.appointment_id = service_pricing.appointment_id 
                            where appointments.account_id = '$userid'";
                            $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['status'] === "Canceled") { // Ensure to use === for strict comparison
                                    continue; // Skip this iteration
                                }
                                ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['location']) ?></td>
                                    <td><?= htmlspecialchars($row['date']) ?></td>
                                    <td><?= htmlspecialchars($row['start_time']) . " - " . htmlspecialchars($row['end_time']) ?></td>
                                    <td><?= htmlspecialchars($row['amount']) ?></td>
                                    
                                        <?php 
                                        $appoint_id = $row['appointment_id'];                                   
                                        $payment_check = "select * from service_payment where account_id = '$userid' and appointment_id = '$appoint_id'";
                                        $payment_check_result = mysqli_query($conn , $payment_check);
                                        $payment_status = mysqli_fetch_assoc($payment_check_result);
                                        if(mysqli_num_rows($payment_check_result) > 0){
                                            
                                          
                                            if($payment_status['payment_status'] === "pending"){
                                                echo "<td class='text-primary " . $payment_status['payment_status'] . "'>" . $payment_status['payment_status'] . "</td>";

                                            }
                                            else if($payment_status['payment_status'] === "confirmed"){
                                                echo "<td class='text-primary " . "'>Under review " ."</td>";

                                            }
                                            else if($payment_status['payment_status'] === "approved"){
                                                echo "<td class='text-success " . $payment_status['payment_status'] . "'> " . $payment_status['payment_status'] . "</td>";

                                            }
                                            else if($payment_status['payment_status'] === "rejected"){
                                                echo "<td class='text-success " . $payment_status['payment_status'] . "'> " . $payment_status['payment_status'] . "</td>";
                                            }
                                                                                    
                                        }
                                        else{
                                            echo "<td class='text-danger " . "'>Unpaid " ."</td>";
                                        }
                                        ?>
                                    
                                    <td><?= htmlspecialchars($row['status']) ?></td>
                                    <td>
                                        <?php 
                                        if ($row['status'] === "Pending")
                                        { 

                                        ?>
                                        <a href="/MRM-DEVELOPMENT/USER/services/service_cancel.php?id=<?= htmlspecialchars($row['appointment_id']) ?>" style="color: white; text-decoration: none;" class="btn btn-sm btn-danger">Cancel appointment</a>
                                        <?php 
                                        }
                                        else if($row['status'] === "Completed"){

                                            ?> 
                                             <!-- Link modal for receipt -->
                                             <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#receiptModal"
                                                data-account-id="<?= $row['account_id'] ?>" 
                                                data-appointment-id="<?= $row['appointment_id'] ?>">
                                                    Show Receipt
                                                </a>

                                          
                                            
                                            <?php
                                        }
                                       else{
                                            $checker = "select * from service_payment where account_id = '$userid' and appointment_id = '$appoint_id'";
                                            $check_result = mysqli_query($conn , $checker);
                                            if(mysqli_num_rows($check_result) > 0)
                                            {

                                                
                                                ?>
                                                <a href="/MRM-DEVELOPMENT/USER/services/service_update.php?id=<?= htmlspecialchars($row['appointment_id']) ?>" style="color: white; text-decoration: none;" class="btn btn-sm btn-info">Check update</a>

                                            <?php
                                            }
                                            else if($row['status'] == "Waiting"){
                                                
                                            
                                            ?>
                                        <a href="/MRM-DEVELOPMENT/USER/services/service_payment.php?account_id=<?= htmlspecialchars($row['account_id']) ?>&appointment_id=<?= htmlspecialchars($row['appointment_id']) ?>" style="color: white; text-decoration: none;" class="btn btn-sm btn-info">Pay</a>  
                                        <a href="/MRM-DEVELOPMENT/USER/services/service_cancel.php?id=<?= htmlspecialchars($row['appointment_id']) ?>" style="color: white; text-decoration: none;" class="btn btn-sm btn-danger">Cancel appointment</a>                                 
                                            <?php 
                                            }
                                            }
                                            
                                            ?>
                                    </td>
                                </tr>
                                <?php 
                            }
                        } else {
                            // Display a message if no appointments are found
                            echo "<tr><td colspan='8' class='text-center'>Waiting for approval</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

 <!-- Include jsPDF for PDF generation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <script>
    var receiptModal = document.getElementById('receiptModal');
    receiptModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;  // Button that triggered the modal
        var accountId = button.getAttribute('data-account-id');  // Extract account_id
        var appointmentId = button.getAttribute('data-appointment-id');  // Extract appointment_id

        // Now you can use accountId and appointmentId to modify the modal content
        var modalBody = receiptModal.querySelector('.modal-body');

        // For example, you could display them inside the modal dynamically
        modalBody.innerHTML += '<p><strong>Account ID:</strong> ' + accountId + '</p>';
        modalBody.innerHTML += '<p><strong>Appointment ID:</strong> ' + appointmentId + '</p>';
    });
</script> -->


<script>

  

    document.getElementById('downloadReceipt').addEventListener('click', function() {
        var { jsPDF } = window.jspdf;
        var doc = new jsPDF();

        // Grab the content of the modal (text only, no HTML tags)
        var content = document.getElementById('receiptContent').innerText;

        // Split the content by new lines and add each line to the PDF
        var lines = content.split('\n');
        for (var i = 0; i < lines.length; i++) {
            doc.text(10, 10 + (10 * i), lines[i]);
        }

        // Save the PDF
        doc.save('receipt.pdf');
    });
    $(document).ready(function() {
        $('#logout-link').on('click', function(e) {
            e.preventDefault(); // Prevent the default link behavior

            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, send AJAX request for logout
                    $.ajax({
                        url: '/MRM-DEVELOPMENT/ADMIN/logout/function.php',
                        success: function(response) {
                            // Handle successful logout
                            Swal.fire({
                                title: 'Logged Out!',
                                text: 'You have been successfully logged out.',
                                icon: 'success',
                                allowOutsideClick: false,
                                timer: 2000, // 2 seconds timer
                                showConfirmButton: false // Hide the confirm button
                            }).then(() => {
                                // Redirect after the timer ends
                                window.location.href = '/MRM-DEVELOPMENT/index.php';
                            });
                        },
                        error: function() {
                            // Handle error
                            Swal.fire(
                                'Error!',
                                'There was an error logging out. Please try again.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
<!-- Script to download modal content as PDF -->
