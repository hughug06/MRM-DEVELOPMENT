<?php 

?>

<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="/MRM-DEVELOPMENT/assets/images/mrm-images/logo_login.png" alt="logo" class="desktop-logo py-2" width="120px">
            <img src="/MRM-DEVELOPMENT/assets/images/mrm-images/logo_login.png" alt="logo" class="toggle-logo py-2" width="120px">
            <img src="/MRM-DEVELOPMENT/assets/images/mrm-images/logo_login.png" alt="logo" class="desktop-dark py-2" width="120px">
            <img src="/MRM-DEVELOPMENT/assets/images/mrm-images/logo_login.png" alt="logo" class="toggle-dark py-2" width="120px">
            <img src="/MRM-DEVELOPMENT/assets/images/mrm-images/logo_login.png" alt="logo" class="desktop-white py-2" width="120px">
            <img src="/MRM-DEVELOPMENT/assets/images/mrm-images/logo_login.png" alt="logo" class="toggle-white py-2" width="120px">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">
        <?php  $page = substr($_SERVER['SCRIPT_NAME'] , strrpos($_SERVER['SCRIPT_NAME'],"/")+1)?>
        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu pt-4 mt-3">   
            <?php 
                
                if($_SESSION['auth'] == "user")
                {
            
                ?>
                <li class="slide <?= $page == "user-dashboard.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/USER/dashboard/user-dashboard.php" class="side-menu__item <?= $page == "user-dashboard.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="fa fa-address-book side-menu__icon"></i> -->
                        <!-- <i class="fa-solid fa-screwdriver-wrench side-menu__icon"></i> -->
                        <i class="fa-solid fa-house side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Products</span></li>
                <!-- End::slide__category -->
            
                <!-- Start::slide -->
                <li class="slide <?= $page == "solar.php" || $page == "solar-filter.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/USER/solar/solar.php" class="side-menu__item <?= $page == "solar.php" || $page == "solar-filter.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-solar-panel side-menu__icon"></i>
                        <!-- <i class="las la-car-battery "></i> -->
                        <span class="side-menu__label">Solar Panel</span>
                    </a>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide <?= $page == "generator.php" || $page == "generator-filter.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/USER/generator/generator.php" class="side-menu__item <?= $page == "generator.php" || $page == "generator-filter.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="bi-bag side-menu__icon"></i> -->
                        <i class="fa-solid fa-car-battery side-menu__icon"></i>
                        <span class="side-menu__label">Generator</span>
                    </a>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Services</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide <?= $page == "service.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/USER/services/service.php" class="side-menu__item <?= $page == "service.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="fa fa-address-book side-menu__icon"></i> -->
                        <i class="fa-solid fa-screwdriver-wrench side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                    </a>
                </li>
                <!-- End::slide -->

            
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Inquire/Schedule</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide <?= $page == "chaintercom_landing.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/USER/chaintercom/chaintercom_landing.php" class="side-menu__item <?= $page == "chaintercom_landing.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-chalkboard-user side-menu__icon"></i>
                        <span class="side-menu__label">Chaintercom</span>
                    </a>
                </li>
                <!-- End::slide -->
            
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Account</span></li>
                <!-- End::slide__category -->


                <!-- Start::slide -->
                <li class="slide <?= $page == "profile.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/USER/profile/profile.php" class="side-menu__item <?= $page == "profile.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-gears side-menu__icon"></i>
                        <!-- <i class="ion-ios-settings side-menu__icon"></i> -->
                        <span class="side-menu__label">Settings</span>
                    </a>
                </li>
                <?php 
                }
               else if($_SESSION['auth'] == "admin")
                {
            
                ?>
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Products</span></li>
                <!-- End::slide__category -->
            
                <!-- Start::slide -->
                <li class="slide <?= $page == "solar.php" || $page == "solar-filter.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/USER/solar/solar.php" class="side-menu__item <?= $page == "solar.php" || $page == "solar-filter.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-solar-panel side-menu__icon"></i>
                        <!-- <i class="las la-car-battery "></i> -->
                        <span class="side-menu__label">Solar Panel</span>
                    </a>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide <?= $page == "generator.php" || $page == "generator-filter.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/USER/generator/generator.php" class="side-menu__item <?= $page == "generator.php" || $page == "generator-filter.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="bi-bag side-menu__icon"></i> -->
                        <i class="fa-solid fa-car-battery side-menu__icon"></i>
                        <span class="side-menu__label">Generator</span>
                    </a>
                </li>
                <!-- End::slide -->
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">ADMIN</span></li>
                <!-- End::slide__category -->
                     <!-- Start::slide -->  
                <li class="slide has-sub 
                <?= $page == 'project-appointment.php' || $page == 'time-management.php' ? 'active open':''?>"              >
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == 'project-appointment.php' || $page == 'time-management.php' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-box side-menu__icon"></i>
                        <span class="side-menu__label">Chaintercom</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == 'project-appointment.php' ? 'active':''?>">
                            <a href="/MRM-DEVELOPMENT/ADMIN/chaintercom/project-appointment.php" class="side-menu__item <?= $page == 'project-appointment.php'  ? 'active':''?>">Appointment</a>
                        </li> 
                        <li class="slide <?= $page == 'time-management.php' ? 'active':''?>">
                            <a href="/MRM-DEVELOPMENT/ADMIN/chaintercom/time-management.php" class="side-menu__item <?= $page == 'time-management.php' ? 'active':''?>">Time management</a>
                        </li>                                
                    </ul>
                </li>
                <!-- End::slide -->                                       
                
                <!-- Start::slide -->  
                <li class="slide has-sub 
                <?= $page == 'marketing-product-control.php' || $page == 'Category-Control.php' 
                || $page == 'product-add-form.php' || $page == 'product-edit-form.php' ? 'active open':''?>"              >
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == 'marketing-product-control.php' || $page == 'Category-Control.php' || $page == 'product-add-form.php' || $page == 'product-edit-form.php' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-box side-menu__icon"></i>
                        <span class="side-menu__label">Products</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == 'marketing-product-control.php' ? 'active':''?>">
                            <a href="/MRM-DEVELOPMENT/ADMIN/marketing/marketing-product-control.php" class="side-menu__item <?= $page == 'marketing-product-control.php' || $page == 'product-add-form.php' || $page == 'product-edit-form.php' ? 'active':''?>">Product Control</a>
                        </li> 
                        <li class="slide <?= $page == 'Category-Control.php' ? 'active':''?>">
                            <a href="/MRM-DEVELOPMENT/ADMIN/marketing/Category-Control.php" class="side-menu__item <?= $page == 'Category-Control.php' ? 'active':''?>">Category Control</a>
                        </li>                                
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->  
                <li class="slide has-sub <?= $page == 'services.php' || $page == 'appointment.php' ? 'active open':''?>">
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == 'services.php' || $page == 'appointment.php' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-screwdriver-wrench side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == "services.php" ? 'active':''?>">
                            <a href="/MRM-DEVELOPMENT/ADMIN/services/services.php" class="side-menu__item <?= $page == 'services.php' ? 'active':''?>">Time Management</a>
                        </li> 
                        <li class="slide <?= $page == 'appointment.php' ? 'active':''?>">
                            <a href="/MRM-DEVELOPMENT/ADMIN/services/appointment.php" class="side-menu__item <?= $page == 'appointment.php' ? 'active':''?>">Appointment</a>
                        </li>                                
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->  
                <li class="slide has-sub <?= $page == 'user-management.php' || $page == 'admin_management.php' ? 'active open':''?>">
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == "user-management.php" || $page == 'admin_management.php' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-user-pen side-menu__icon"></i>
                        <span class="side-menu__label">Accounts</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == 'user-management.php' ? 'active':''?>">
                            <a href="/MRM-DEVELOPMENT/ADMIN/accountManagement/accountcontrol/user-management.php" class="side-menu__item <?= $page == 'user-management.php' ? 'active':''?>">Client</a>
                        </li> 
                        <li class="slide <?= $page == "admin_management.php" ? 'active':''?>">
                            <a href="/MRM-DEVELOPMENT/ADMIN/accountManagement/admin/admin_management.php" class="side-menu__item <?= $page == "admin_management.php" ? 'active':''?>">Admin</a>
                        </li>                                
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <!-- <li class="slide ">
                    <a href="/MRM-DEVELOPMENT/ADMIN/accountManagement/accountcontrol/user-management.php" class="side-menu__item">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-user-pen side-menu__icon"></i>
                        <span class="side-menu__label">Accounts</span>
                    </a>
                </li> -->
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="ion-md-filing side-menu__icon"></i> -->
                            <i class="fa-solid fa-warehouse side-menu__icon"></i>
                        <span class="side-menu__label">Inventory</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                    <li class="slide">
                            <a href="/MRM-DEVELOPMENT/ADMIN/Inventory/inventory-control.php" class="side-menu__item">Inventory Control</a>
                        </li> 
                        <li class="slide">
                            <a href="inventory-logs.php" class="side-menu__item">Inventory Logs</a>
                        </li>                                
                    </ul>
                </li>
                <!-- End::slide -->       

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">ADMIN - WORKER</span></li>
                <!-- End::slide__category -->

                <li class="slide <?= $page == "dashboard.php" ? 'active':''?>">
                    <a href="/MRM-DEVELOPMENT/ADMIN/worker/dashboard.php" class="side-menu__item <?= $page == "dashboard.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-chart-line side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                
                <li class="slide has-sub <?= $page == '' || $page == '' ? 'active open':''?>">
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == "" || $page == '' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-screwdriver-wrench side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == '' ? 'active':''?>">
                            <a href="" class="side-menu__item <?= $page == '' ? 'active':''?>">Pending</a>
                        </li> 
                        <li class="slide <?= $page == "" ? 'active':''?>">
                            <a href="" class="side-menu__item <?= $page == '' ? 'active':''?>">Completed</a>
                        </li>                                
                    </ul>
                </li>

                
                <?php 
                     }
                    ?>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>