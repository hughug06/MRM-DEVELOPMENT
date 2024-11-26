<?php
 
  date_default_timezone_set('Asia/Manila');
  $userid = $_SESSION['user_id'];
 ?>
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
                <a class="header-logo disabled">
                    <img src="/assets/landing_assets/images/logo-mrm.png" alt="logo">
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
                
                 $sql_select = "select COUNT(*) AS total_appointments from service_booking 
                 where user_id = '$userid' and booking_status != 'completed' and booking_status != 'canceled'";
                 $sql_result = mysqli_query($conn, $sql_select);
                 $row_count_appointments = mysqli_fetch_assoc($sql_result);
                 $count_appointment = $row_count_appointments['total_appointments'];    
                ?>
                
                    <?php if($count_appointment <= 0){
                            
                     } 
                     else{
                        echo "<span class=\"badge bg-secondary header-icon-badge pulse pulse-secondary\" id=\"appointCount\">";
                        echo $count_appointment;
                        echo "</span>";
                     }
                     ?></span>
            </a>
            <!-- End::header-link -->
        </div>
       
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

<!-- Modal for Viewing Appointments -->
<div class="modal fade" id="appointmentmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">View Appointments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">My Address</th>
                                <th scope="col">Set Date</th>
                                <th scope="col">Set Time</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Appointment Status</th>
                                <th scope="col">Check Update</th>
                            </tr>
                        </thead>
                        
                        <?php 
                                                   
                                                   $sql_select = "SELECT * 
                                                   FROM service_booking 
                                                   INNER JOIN user_info ON user_info.user_id = service_booking.user_id
                                                   INNER JOIN service_availability ON service_availability.availability_id = service_booking.availability_id
                                                   WHERE service_booking.user_id = '$userid' 
                                                   AND service_booking.booking_status != 'completed' 
                                                   AND service_booking.booking_status != 'canceled'";
                                                $sql_result = mysqli_query($conn, $sql_select);
                                                while($row= mysqli_fetch_assoc($sql_result)){
                                                echo "<tbody> ";
                                                    echo "<td> " . $row['first_name'] . ' ' . $row['last_name'] . " </td>";
                                                    echo "<td> " . $row['pin_location'] . " </td>";
                                                    echo "<td> " . $row['date'] . " </td>";
                                                    echo "<td> " . $row['start_time'] . '-' . $row['end_time'] . " </td>";
                                                    echo "<td> " . $row['payment_status'] . " </td>";
                                                    echo "<td> " . $row['booking_status'] . " </td>";
                                                   
                                                echo "</tbody>";
                                                }                 
                                ?>
                            
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

 <!-- Include jsPDF for PDF generation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
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




