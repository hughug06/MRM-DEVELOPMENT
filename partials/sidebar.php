<?php 

?>

<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header border-0">
        <a href="#" class="header-logo d-flex" style="pointer-events: none">
            <img src="/assets/landing_assets/images/logo-mrm.png" alt="logo" class="desktop-logo py-2" width="55px">
            <img src="/assets/landing_assets/images/logo-mrm.png" alt="logo" class="toggle-logo py-2" width="55px">
            <img src="/assets/landing_assets/images/logo-mrm.png" alt="logo" class="desktop-dark py-2" width="55px">
            <img src="/assets/landing_assets/images/logo-mrm.png" alt="logo" class="toggle-dark py-2" width="55px">
            <img src="/assets/landing_assets/images/logo-mrm.png" alt="logo" class="desktop-white py-2" width="55px">
            <img src="/assets/landing_assets/images/logo-mrm.png" alt="logo" class="toggle-white py-2" width="55px">
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
            <ul class="main-menu pt-4">   
                <?php 
                
                if($_SESSION['auth'] == "user")
                {
            
                ?>
                <li class="slide <?= $page == "user-home.php" ? 'active':''?>">
                    <a href="/USER/dashboard/user-home.php" class="side-menu__item <?= $page == "user-home.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="fa fa-address-book side-menu__icon"></i> -->
                        <!-- <i class="fa-solid fa-screwdriver-wrench side-menu__icon"></i> -->
                        <i class="fa-solid fa-house side-menu__icon"></i>
                        <span class="side-menu__label">Home</span>
                    </a>
                </li>

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Products</span></li>
                <!-- End::slide__category -->
            
                <!-- Start::slide -->
                <li class="slide <?= $page == "solar.php" || $page == "solar-filter.php" ? 'active':''?>">
                    <a href="/USER/solar/solar.php" class="side-menu__item <?= $page == "solar.php" || $page == "solar-filter.php" ? 'active':''?>">
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
                    <a href="/USER/generator/generator.php" class="side-menu__item <?= $page == "generator.php" || $page == "generator-filter.php" ? 'active':''?>">
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

                <li class="slide has-sub <?= $page == 'service.php' || $page == 'myappointments.php' ? 'active open':''?>">
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == 'service.php' || $page == 'myappointments.php' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-screwdriver-wrench side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == "service.php" ? 'active':''?>">
                            <a href="/USER/services/bookappointments/service.php" class="side-menu__item <?= $page == 'service.php' ? 'active':''?>">Services</a>
                        </li> 
                        <li class="slide <?= $page == 'myappointments.php' ? 'active':''?>">
                            <a href="/USER/services/myappointments/myappointments.php" class="side-menu__item <?= $page == 'myappointments.php' ? 'active':''?>">Appointments</a>
                        </li>                                
                    </ul>
                </li>

        
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Account</span></li>
                <!-- End::slide__category -->


                <!-- Start::slide -->
                <li class="slide <?= $page == "profile.php" ? 'active':''?>">
                    <a href="/USER/profile/profile.php" class="side-menu__item <?= $page == "profile.php" ? 'active':''?>">
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

                <!-- Start::slide -->
                <li class="slide <?= $page == "admin-dashboard.php" ? 'active':''?>">
                    <a href="/ADMIN/dashboard/admin-dashboard.php" class="side-menu__item <?= $page == "admin-dashboard.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-house side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <!-- End::slide -->


                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Products</span></li>
                <!-- End::slide__category -->
            
                <!-- Start::slide -->
                <li class="slide <?= $page == "solar.php" || $page == "solar-filter.php" ? 'active':''?>">
                    <a href="/USER/solar/solar.php" class="side-menu__item <?= $page == "solar.php" || $page == "solar-filter.php" ? 'active':''?>">
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
                    <a href="/USER/generator/generator.php" class="side-menu__item <?= $page == "generator.php" || $page == "generator-filter.php" ? 'active':''?>">
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
                <li class="slide has-sub <?= $page == 'services.php' || $page == 'appointment.php' ||  $page == 'manageitems.php' ?'active open':''?>">
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == 'services.php' || $page == 'appointment.php' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-screwdriver-wrench side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == "services.php" ? 'active':''?>">
                            <a href="/ADMIN/services/services.php" class="side-menu__item <?= $page == 'services.php' ? 'active':''?>">Time Management</a>
                        </li> 
                        <li class="slide <?= $page == 'appointment.php' ? 'active':''?>">
                            <a href="/ADMIN/services/appointment.php" class="side-menu__item <?= $page == 'appointment.php' ? 'active':''?>">Appointment</a>
                        </li>          
                        <li class="slide <?= $page == 'manageitems.php' ? 'active':''?>">
                            <a href="/ADMIN/services/myitems/manageitems.php" class="side-menu__item <?= $page == 'manageitems.php' ? 'active':''?>">Items Management</a>
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
                            <a href="/ADMIN/accountManagement/accountcontrol/user-management.php" class="side-menu__item <?= $page == 'user-management.php' ? 'active':''?>">Client</a>
                        </li> 
                        <li class="slide <?= $page == "admin_management.php" ? 'active':''?>">
                            <a href="/ADMIN/accountManagement/admin/admin_management.php" class="side-menu__item <?= $page == "admin_management.php" ? 'active':''?>">Admin</a>
                        </li>                                
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub <?= $page == 'inventory-control.php' || $page == 'inventory-logs.php' ? 'active open':''?>">
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == 'inventory-control.php' || $page == 'inventory-logs.php' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="ion-md-filing side-menu__icon"></i> -->
                        <i class="fa-solid fa-warehouse side-menu__icon"></i>
                        <span class="side-menu__label">Inventory</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == 'inventory-control.php' ? 'active':''?>">
                            <a href="/ADMIN/Inventory/inventory-control.php" class="side-menu__item <?= $page == 'inventory-control.php' ? 'active':''?>">Inventory Control</a>
                        </li> 
                        <li class="slide <?= $page == 'inventory-logs.php' ? 'active':''?>">
                            <a href="/ADMIN/Inventory/inventory-logs.php" class="side-menu__item <?= $page == 'inventory-logs.php' ? 'active':''?>">Inventory Logs</a>
                        </li>                                
                    </ul>
                </li>
                <!-- End::slide -->       

                <li class="slide has-sub <?= $page == 'sales-reports.php' || $page == 'damage-reports.php' || $page == 'inventory-reports.php' || $page == 'agent-reports.php' || $page == 'worker-reports.php' ? 'active open':''?>">
                    <a href="javascript:void(0);" class="side-menu__item <?= $page == 'sales-reports.php' || $page == 'damage-reports.php' || $page == 'inventory-reports.php' || $page == 'agent-reports.php' || $page == 'worker-reports.php' ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-clipboard side-menu__icon"></i>
                        <span class="side-menu__label">Reports</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide <?= $page == 'sales-reports.php' ? 'active':''?>">
                            <a href="/ADMIN/reports/sales-reports.php" class="side-menu__item <?= $page == 'sales-reports.php' ? 'active':''?>">Sales Reports</a>
                        </li> 
                        <li class="slide <?= $page == 'damage-reports.php' ? 'active':''?>">
                            <a href="/ADMIN/reports/damage-reports.php" class="side-menu__item <?= $page == 'damage-reports.php' ? 'active':''?>">Damage Reports</a>
                        </li>           
                        <li class="slide <?= $page == 'inventory-reports.php' ? 'active':''?>">
                            <a href="/ADMIN/reports/inventory-reports.php" class="side-menu__item <?= $page == 'inventory-reports.php' ? 'active':''?>">Inventory Reports</a>
                        </li>     
                        <li class="slide <?= $page == 'agent-reports.php' ? 'active':''?>">
                            <a href="/ADMIN/reports/agent-reports.php" class="side-menu__item <?= $page == 'agent-reports.php' ? 'active':''?>">Agent Reports</a>
                        </li>      
                        <li class="slide <?= $page == 'worker-reports.php' ? 'active':''?>">
                            <a href="/ADMIN/reports/worker-reports.php" class="side-menu__item <?= $page == 'worker-reports.php' ? 'active':''?>">Worker Reports</a>
                        </li>                           
                    </ul>
                </li>
                <!-- End::slide -->       

                <!-- Start::slide -->
                
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide <?= $page == "landing-customize.php" ? 'active':''?>">
                    <a href="/ADMIN/landingPage/landing-customize.php" class="side-menu__item <?= $page == "landing-customize.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-house side-menu__icon"></i>
                        <span class="side-menu__label">Landing Page</span>
                    </a>
                </li>
                <!-- End::slide -->

                <?php 
                }
               else if($_SESSION['auth'] == "worker")
                {
                ?>
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">ADMIN - WORKER</span></li>
                <!-- End::slide__category -->

                <li class="slide <?= $page == "dashboard.php" ? 'active':''?>">
                    <a href="/ADMIN/worker/dashboard.php" class="side-menu__item <?= $page == "dashboard.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-chart-line side-menu__icon"></i>
                        <span class="side-menu__label">On going</span>
                    </a>
                </li>

                <li class="slide <?= $page == "completed.php" ? 'active':''?>">
                    <a href="/ADMIN/worker/completed.php" class="side-menu__item <?= $page == "completed.php" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa-solid fa-screwdriver-wrench side-menu__icon"></i>
                        <span class="side-menu__label">Completed</span>
                    </a>
                </li>

                
                <?php 
                     }
                     else if($_SESSION['auth'] == "agent")
                     {                  
                    ?>

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Agent</span></li>
                <!-- End::slide__category -->

                <li class="slide <?= $page == "kanban.php" || $page == "" ? 'active':''?>">
                    <a href="/ADMIN/agent/kanban.php" class="side-menu__item <?= $page == "kanban.php" || $page == "" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="bi-bag side-menu__icon"></i> -->
                        <i class="fa-solid fa-clipboard-list side-menu__icon"></i>
                        <span class="side-menu__label">Kanban</span>
                    </a>
                </li>
                <li class="slide <?= $page == "completed.php" || $page == "" ? 'active':''?>">
                    <a href="/ADMIN/agent/completed.php" class="side-menu__item <?= $page == "completed.php" || $page == "" ? 'active':''?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <!-- <i class="bi-bag side-menu__icon"></i> -->
                        <i class="fa-solid fa-clipboard-list side-menu__icon"></i>
                        <span class="side-menu__label">Completed</span>
                    </a>
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