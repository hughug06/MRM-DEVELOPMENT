<?php 
  require_once '../../authetincation.php';
  require_once '../../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once('../../../partials/head.php') ?>
        <title> Manage Items </title>
        <!-- Favicon -->
        <link rel="icon" href="../../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
        
        <!-- Choices JS -->
        <script src="../../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        
        <!-- Bootstrap Css -->
        <link id="style" href="../../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

        <!-- Main Theme Js -->
        <script src="../../../assets/js/main.js"></script>

        <!-- Style Css -->
        <link href="../../../assets/css/styles.min.css" rel="stylesheet" >

        <!-- Icons Css -->
        <link href="../../../assets/css/icons.css" rel="stylesheet" >

        <!-- Node Waves Css -->
        <link href="../../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

        <!-- Simplebar Css -->
        <link href="../../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
        
        <!-- Color Picker Css -->
        <link rel="stylesheet" href="../../../assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="../../../assets/libs/@simonwep/pickr/themes/nano.min.css">

        <!-- Choices Css -->
        <link rel="stylesheet" href="../../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    </head>

    <body>

        <div class="page">

            <!-- app-header -->
            <?php include_once('../../../partials/header.php') ?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once('../../../partials/sidebar.php') ?>
            <!-- End::app-sidebar -->

            <!-- Start::app-content -->
            <div class="main-content app-content">
                <div class="container-fluid">

                    <div class="row row-square">
                        <div class="pt-3 col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <nav class="nav main-nav-line p-3 tabs-menu">
                                    <a class="nav-link active" data-bs-toggle="tab" id="about-tab" href="#items">Items
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#solar">Solar
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#generator">Generator 
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#brand">Brand
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#markup-disc">Markup / Discount
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                    </a>
                                </nav>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12 col-md-12">
                                    <div class="border border-dark rounded-3 main-content-body-profile">
                                        <div class="tab-content">
                                            <div class="main-content-body tab-pane p-4 border-top-0 active" id="items">
                                                <div class="mb-4 main-content-label"></div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                                                    <div class="card custom-card">
                                                        <div class="card-header border-bottom-0 d-block">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <label class="main-content-label mb-0">Items</label>
                                                            
                                                                <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addServiceItemModal">
                                                                    <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive userlist-table">
                                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="wd-lg-8p"><span>ID</span></th>
                                                                            <th class="wd-lg-20p"><span>Unit</span></th>
                                                                            <th class="wd-lg-20p"><span>Description</span></th>
                                                                            <th class="wd-lg-20p"><span>Quantity</span></th>
                                                                            <th class="wd-lg-20p"><span>Service fee</span></th>
                                                                            <th class="wd-lg-20p"><span>Action</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
                                                                        require '../../../Database/database.php';                                          
                                                                        $select = "Select * from service_pricing";
                                                                        $result = mysqli_query($conn , $select);
                                                                        if(mysqli_num_rows($result) > 0){
                                                                            foreach($result as $resultItem){
                                                                        ?> 
                                                                        <tr>
                                                                            <td><?= $resultItem['pricingid']?></td>  
                                                                            <td><?= $resultItem['unit']?></td>     
                                                                            <td><?= $resultItem['description']?></td>                                       
                                                                            <td><?= $resultItem['quantity']?></td>                       
                                                                            <td><?= $resultItem['amount']?></td> 
                                                                            <td>                                                 
                                                                            <button 
                                                                                type="button" 
                                                                                class="btn btn-sm btn-info" 
                                                                                data-bs-toggle="modal" 
                                                                                data-bs-target="#editItemModal" 
                                                                                data-item-id="<?= $resultItem['pricingid'] ?>"
                                                                                data-item-unit="<?= $resultItem['unit'] ?>"
                                                                                data-item-description="<?= $resultItem['description'] ?>"
                                                                                data-item-quantity="<?= $resultItem['quantity'] ?>"
                                                                                data-item-amount="<?= $resultItem['amount'] ?>"              
                                                                                >
                                                                                <i class="fe fe-edit-2"></i>
                                                                            </button>
                                                                            <a href="item-delete.php?id=<?= $resultItem['pricingid']?>" data-id="<?= $resultItem['pricingid']?>" class="btn btn-sm btn-danger delete-btn-Product"><i class="fe fe-trash"></i></a>
                                                                            </td>
                                                                        </tr>

                                                                        <?php 
                                                                            }
                                                                    
                                                                        }
                                                                        else{

                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="solar">
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="card custom-card">
                                                        <nav class="nav main-nav-line p-3">
                                                            <a class="nav-link active" data-bs-toggle="tab" id="about-tab" href="#solarInstallation">Installation
                                                                <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                                            </a>
                                                            <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#solarMaintenance">Maintenance
                                                                <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                                            </a>
                                                            <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#solarRepair">Repair
                                                                <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                                            </a>
                                                        </nav>
                                                    </div>
                                                </div>
                                                <div class="row row-sm">
                                                    <div class="tab-content">
                                                        <div class="main-content-body tab-pane p-0 border-top-0 active" id="solarInstallation">
                                                            <div class="card custom-card">
                                                                <div class="card-header border-bottom-0 d-block">                            
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <label class="main-content-label mb-0">PACKAGE FOR INSTALLATION(SOLAR)</label>
                                                                        <!-- Add Item Button -->
                                                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#installationPackageModal">
                                                                            <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive userlist-table">
                                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="wd-lg-8p"><span>ID</span></th>
                                                                                    <th class="wd-lg-20p"><span>Description</span></th>
                                                                                    <th class="wd-lg-20p"><span>unit</span></th>
                                                                                    <th class="wd-lg-20p"><span>quantity</span></th>
                                                                                    <th class="wd-lg-20p"><span>amount</span></th>
                                                                                    <th class="wd-lg-20p"><span>total cost</span></th>
                                                                                    <th class="wd-lg-20p"><span>created</span></th>
                                                                                    <th class="wd-lg-20p"><span>action</span></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php        
                                                                                $totalCost = 0; // Variable to store the total cost sum                                  
                                                                                $select = "Select * from package_installation_solar";
                                                                                $result = mysqli_query($conn , $select);
                                                                                if(mysqli_num_rows($result) > 0){
                                                                                    foreach($result as $resultItem){
                                                                                        $totalCost += $resultItem['total_cost'];
                                                                                ?> 
                                                                                <tr>
                                                                                    <td><?= $resultItem['installation_id']?></td>  
                                                                                    <td><?= $resultItem['description']?></td>                                          
                                                                                    <td><?= $resultItem['unit']?></td>         
                                                                                    <td><?= $resultItem['quantity']?></td>            
                                                                                    <td><?= $resultItem['amount']?></td>       
                                                                                    <td><?= $resultItem['total_cost']?></td>                                            
                                                                                    <td><?= $resultItem['created_at']?></td>                       
                                                                                    <td>NO AVAILABLE ACTION ONLY ADD</td>     
                                                                                    
                                                                                    
                                                                                </tr>
                                                                                
                                                                                <?php 
                                                                                    }                                          
                                                                                }                                              
                                                                                ?>
                                                                            </tbody>
                                                                            <!-- Outside the loop: Display the total sum of all total costs -->
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="5" class="text-end"><strong>Total Cost:</strong></td>
                                                                                    <td class="text-success"><strong><?= number_format($totalCost, 2) ?></strong></td> <!-- Display the sum of all total costs -->
                                                                                    <td colspan="2"></td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="main-content-body tab-pane p-0 border-top-0" id="solarMaintenance">
                                                            <div class="card custom-card">
                                                                <div class="card-header border-bottom-0 d-block">                            
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <label class="main-content-label mb-0">PACKAGE FOR MAINTENANCE (SOLAR)</label>
                                                                        <!-- Add Item Button -->
                                                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#SolarMaintenanceModal">
                                                                            <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive userlist-table">
                                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="wd-lg-8p"><span>ID</span></th>
                                                                                    <th class="wd-lg-20p"><span>Description</span></th>
                                                                                    <th class="wd-lg-20p"><span>Unit</span></th>
                                                                                    <th class="wd-lg-20p"><span>Quantity</span></th>
                                                                                    <th class="wd-lg-20p"><span>Amount</span></th>
                                                                                    <th class="wd-lg-20p"><span>Total Cost</span></th>
                                                                                    <th class="wd-lg-20p"><span>Created</span></th>
                                                                                    <th class="wd-lg-20p"><span>Action</span></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php        
                                                                                $totalCost = 0; // Variable to store the total cost sum                                  
                                                                                $select = "SELECT * FROM package_maintenance_solar";
                                                                                $result = mysqli_query($conn, $select);
                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                    foreach ($result as $resultItem) {
                                                                                        $totalCost += $resultItem['total_cost'];
                                                                                ?> 
                                                                                <tr>
                                                                                    <td><?= $resultItem['id'] ?></td>  
                                                                                    <td><?= $resultItem['description'] ?></td>                                          
                                                                                    <td><?= $resultItem['unit'] ?></td>         
                                                                                    <td><?= $resultItem['quantity'] ?></td>            
                                                                                    <td><?= $resultItem['amount'] ?></td>       
                                                                                    <td><?= $resultItem['total_cost'] ?></td>                                            
                                                                                    <td><?= $resultItem['created_at'] ?></td>                       
                                                                                    <td>NO AVAILABLE ACTION ONLY ADD</td>     
                                                                                </tr>
                                                                                <?php 
                                                                                    }                                          
                                                                                }                                              
                                                                                ?>
                                                                            </tbody>
                                                                            <!-- Display the total sum of all total costs -->
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="5" class="text-end"><strong>Total Cost:</strong></td>
                                                                                    <td class="text-success"><strong><?= number_format($totalCost, 2) ?></strong></td>
                                                                                    <td colspan="2"></td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                        <div class="main-content-body tab-pane p-0 border-top-0" id="solarRepair">
                                                            <div class="card custom-card">
                                                                <div class="card-header border-bottom-0 d-block">                            
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <label class="main-content-label mb-0">PACKAGE FOR REPAIR (SOLAR)</label>
                                                                        <!-- Add Item Button -->
                                                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#SolarRepairModal">
                                                                            <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive userlist-table">
                                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="wd-lg-8p"><span>ID</span></th>
                                                                                    <th class="wd-lg-20p"><span>Description</span></th>
                                                                                    <th class="wd-lg-20p"><span>Unit</span></th>
                                                                                    <th class="wd-lg-20p"><span>Quantity</span></th>
                                                                                    <th class="wd-lg-20p"><span>Amount</span></th>
                                                                                    <th class="wd-lg-20p"><span>Total Cost</span></th>
                                                                                    <th class="wd-lg-20p"><span>Created</span></th>
                                                                                    <th class="wd-lg-20p"><span>Action</span></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php        
                                                                                $totalCost = 0; // Variable to store the total cost sum                                  
                                                                                $select = "SELECT * FROM package_repair_solar";
                                                                                $result = mysqli_query($conn, $select);
                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                    foreach ($result as $resultItem) {
                                                                                        $totalCost += $resultItem['total_cost'];
                                                                                ?> 
                                                                                <tr>
                                                                                    <td><?= $resultItem['id'] ?></td>  
                                                                                    <td><?= $resultItem['description'] ?></td>                                          
                                                                                    <td><?= $resultItem['unit'] ?></td>         
                                                                                    <td><?= $resultItem['quantity'] ?></td>            
                                                                                    <td><?= $resultItem['amount'] ?></td>       
                                                                                    <td><?= $resultItem['total_cost'] ?></td>                                            
                                                                                    <td><?= $resultItem['created_at'] ?></td>                       
                                                                                    <td>NO AVAILABLE ACTION ONLY ADD</td>     
                                                                                </tr>
                                                                                <?php 
                                                                                    }                                          
                                                                                }                                              
                                                                                ?>
                                                                            </tbody>
                                                                            <!-- Display the total sum of all total costs -->
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="5" class="text-end"><strong>Total Cost:</strong></td>
                                                                                    <td class="text-success"><strong><?= number_format($totalCost, 2) ?></strong></td>
                                                                                    <td colspan="2"></td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="generator">
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="card custom-card">
                                                        <nav class="nav main-nav-line p-3">
                                                            <a class="nav-link active" data-bs-toggle="tab" id="about-tab" href="#generatorInstallation">Installation
                                                                <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                                            </a>
                                                            <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#generatorMaintenance">Maintenance
                                                                <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                                            </a>
                                                            <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#generatorRepair">Repair
                                                                <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                                            </a>
                                                            <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#generatorTuneup">Tune-up
                                                                <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                                                            </a>
                                                        </nav>
                                                    </div>
                                                </div>
                                                <div class="row row-sm">
                                                    <div class="tab-content">
                                                        <div class="main-content-body tab-pane p-0 border-top-0 active" id="generatorInstallation">
                                                            <div class="card custom-card">
                                                                <div class="card-header border-bottom-0 d-block">                            
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <label class="main-content-label mb-0">PACKAGE FOR INSTALLATION (GENERATOR)</label>
                                                                        <!-- Add Item Button -->
                                                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#GeneratorPackageModal">
                                                                            <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive userlist-table">
                                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="wd-lg-8p"><span>ID</span></th>
                                                                                    <th class="wd-lg-20p"><span>Description</span></th>
                                                                                    <th class="wd-lg-20p"><span>unit</span></th>
                                                                                    <th class="wd-lg-20p"><span>quantity</span></th>
                                                                                    <th class="wd-lg-20p"><span>amount</span></th>
                                                                                    <th class="wd-lg-20p"><span>total cost</span></th>
                                                                                    <th class="wd-lg-20p"><span>created</span></th>
                                                                                    <th class="wd-lg-20p"><span>action</span></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php        
                                                                                $totalCost = 0; // Variable to store the total cost sum                                  
                                                                                $select = "Select * from package_installation_generator";
                                                                                $result = mysqli_query($conn , $select);
                                                                                if(mysqli_num_rows($result) > 0){
                                                                                    foreach($result as $resultItem){
                                                                                        $totalCost += $resultItem['total_cost'];
                                                                                ?> 
                                                                                <tr>
                                                                                    <td><?= $resultItem['installation_id']?></td>  
                                                                                    <td><?= $resultItem['description']?></td>                                          
                                                                                    <td><?= $resultItem['unit']?></td>         
                                                                                    <td><?= $resultItem['quantity']?></td>            
                                                                                    <td><?= $resultItem['amount']?></td>       
                                                                                    <td><?= $resultItem['total_cost']?></td>                                            
                                                                                    <td><?= $resultItem['created_at']?></td>                       
                                                                                    <td>NO AVAILABLE ACTION ONLY ADD</td>     
                                                                                    
                                                                                    
                                                                                </tr>
                                                                                
                                                                                <?php 
                                                                                    }                                          
                                                                                }                                              
                                                                                ?>
                                                                            </tbody>
                                                                            <!-- Outside the loop: Display the total sum of all total costs -->
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="5" class="text-end"><strong>Total Cost:</strong></td>
                                                                                    <td class="text-success"><strong><?= number_format($totalCost, 2) ?></strong></td> <!-- Display the sum of all total costs -->
                                                                                    <td colspan="2"></td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="main-content-body tab-pane p-0 border-top-0" id="generatorMaintenance">
                                                            <div class="card custom-card">
                                                                <div class="card-header border-bottom-0 d-block">                            
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <label class="main-content-label mb-0">PACKAGE FOR MAINTENANCE (GENERATOR)</label>
                                                                        <!-- Add Item Button -->
                                                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#GeneratorMaintenanceModal">
                                                                            <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive userlist-table">
                                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="wd-lg-8p"><span>ID</span></th>
                                                                                    <th class="wd-lg-20p"><span>Description</span></th>
                                                                                    <th class="wd-lg-20p"><span>Unit</span></th>
                                                                                    <th class="wd-lg-20p"><span>Quantity</span></th>
                                                                                    <th class="wd-lg-20p"><span>Amount</span></th>
                                                                                    <th class="wd-lg-20p"><span>Total Cost</span></th>
                                                                                    <th class="wd-lg-20p"><span>Created</span></th>
                                                                                    <th class="wd-lg-20p"><span>Action</span></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php        
                                                                                $totalCost = 0; // Variable to store the total cost sum                                  
                                                                                $select = "SELECT * FROM package_maintenance_generator";
                                                                                $result = mysqli_query($conn, $select);
                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                    foreach ($result as $resultItem) {
                                                                                        $totalCost += $resultItem['total_cost'];
                                                                                ?> 
                                                                                <tr>
                                                                                    <td><?= $resultItem['id'] ?></td>  
                                                                                    <td><?= $resultItem['description'] ?></td>                                          
                                                                                    <td><?= $resultItem['unit'] ?></td>         
                                                                                    <td><?= $resultItem['quantity'] ?></td>            
                                                                                    <td><?= $resultItem['amount'] ?></td>       
                                                                                    <td><?= $resultItem['total_cost'] ?></td>                                            
                                                                                    <td><?= $resultItem['created_at'] ?></td>                       
                                                                                    <td>NO AVAILABLE ACTION ONLY ADD</td>     
                                                                                </tr>
                                                                                <?php 
                                                                                    }                                          
                                                                                }                                              
                                                                                ?>
                                                                            </tbody>
                                                                            <!-- Display the total sum of all total costs -->
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="5" class="text-end"><strong>Total Cost:</strong></td>
                                                                                    <td class="text-success"><strong><?= number_format($totalCost, 2) ?></strong></td>
                                                                                    <td colspan="2"></td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="main-content-body tab-pane p-0 border-top-0" id="generatorRepair">
                                                            <div class="card custom-card">
                                                                <div class="card-header border-bottom-0 d-block">                            
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <label class="main-content-label mb-0">PACKAGE FOR REPAIR (GENERATOR)</label>
                                                                        <!-- Add Item Button -->
                                                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#GeneratorRepairModal">
                                                                            <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive userlist-table">
                                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="wd-lg-8p"><span>ID</span></th>
                                                                                    <th class="wd-lg-20p"><span>Description</span></th>
                                                                                    <th class="wd-lg-20p"><span>Unit</span></th>
                                                                                    <th class="wd-lg-20p"><span>Quantity</span></th>
                                                                                    <th class="wd-lg-20p"><span>Amount</span></th>
                                                                                    <th class="wd-lg-20p"><span>Total Cost</span></th>
                                                                                    <th class="wd-lg-20p"><span>Created</span></th>
                                                                                    <th class="wd-lg-20p"><span>Action</span></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php        
                                                                                $totalCost = 0; // Variable to store the total cost sum                                  
                                                                                $select = "SELECT * FROM package_repair_generator";
                                                                                $result = mysqli_query($conn, $select);
                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                    foreach ($result as $resultItem) {
                                                                                        $totalCost += $resultItem['total_cost'];
                                                                                ?> 
                                                                                <tr>
                                                                                    <td><?= $resultItem['id'] ?></td>  
                                                                                    <td><?= $resultItem['description'] ?></td>                                          
                                                                                    <td><?= $resultItem['unit'] ?></td>         
                                                                                    <td><?= $resultItem['quantity'] ?></td>            
                                                                                    <td><?= $resultItem['amount'] ?></td>       
                                                                                    <td><?= $resultItem['total_cost'] ?></td>                                            
                                                                                    <td><?= $resultItem['created_at'] ?></td>                       
                                                                                    <td>NO AVAILABLE ACTION ONLY ADD</td>     
                                                                                </tr>
                                                                                <?php 
                                                                                    }                                          
                                                                                }                                              
                                                                                ?>
                                                                            </tbody>
                                                                            <!-- Display the total sum of all total costs -->
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="5" class="text-end"><strong>Total Cost:</strong></td>
                                                                                    <td class="text-success"><strong><?= number_format($totalCost, 2) ?></strong></td>
                                                                                    <td colspan="2"></td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="main-content-body tab-pane p-0 border-top-0" id="generatorTuneup">
                                                            <div class="card custom-card">
                                                                <div class="card-header border-bottom-0 d-block">                            
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <label class="main-content-label mb-0">PACKAGE FOR TUNE-UP (GENERATOR)</label>
                                                                        <!-- Add Item Button -->
                                                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#GeneratorTuneUpModal">
                                                                            <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive userlist-table">
                                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="wd-lg-8p"><span>ID</span></th>
                                                                                    <th class="wd-lg-20p"><span>Description</span></th>
                                                                                    <th class="wd-lg-20p"><span>Unit</span></th>
                                                                                    <th class="wd-lg-20p"><span>Quantity</span></th>
                                                                                    <th class="wd-lg-20p"><span>Amount</span></th>
                                                                                    <th class="wd-lg-20p"><span>Total Cost</span></th>
                                                                                    <th class="wd-lg-20p"><span>Created</span></th>
                                                                                    <th class="wd-lg-20p"><span>Action</span></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php        
                                                                                $totalCost = 0; // Variable to store the total cost sum                                  
                                                                                $select = "SELECT * FROM package_tuneup_generator";
                                                                                $result = mysqli_query($conn, $select);
                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                    foreach ($result as $resultItem) {
                                                                                        $totalCost += $resultItem['total_cost'];
                                                                                ?> 
                                                                                <tr>
                                                                                    <td><?= $resultItem['id'] ?></td>  
                                                                                    <td><?= $resultItem['description'] ?></td>                                          
                                                                                    <td><?= $resultItem['unit'] ?></td>         
                                                                                    <td><?= $resultItem['quantity'] ?></td>            
                                                                                    <td><?= $resultItem['amount'] ?></td>       
                                                                                    <td><?= $resultItem['total_cost'] ?></td>                                            
                                                                                    <td><?= $resultItem['created_at'] ?></td>                       
                                                                                    <td>NO AVAILABLE ACTION ONLY ADD</td>     
                                                                                </tr>
                                                                                <?php 
                                                                                    }                                          
                                                                                }                                              
                                                                                ?>
                                                                            </tbody>
                                                                            <!-- Display the total sum of all total costs -->
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="5" class="text-end"><strong>Total Cost:</strong></td>
                                                                                    <td class="text-success"><strong><?= number_format($totalCost, 2) ?></strong></td>
                                                                                    <td colspan="2"></td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="brand">
                                                <div class="card custom-card">
                                                    <div class="card-header border-bottom-0 d-block">                            
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <label class="main-content-label mb-0">BRANDS</label>
                                                            <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                                                                <i class="fe fe-download-cloud pe-2"></i>ADD ITEM
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive userlist-table">
                                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="wd-lg-8p"><span>id</span></th>
                                                                        <th class="wd-lg-20p"><span>name</span></th>
                                                                        <th class="wd-lg-20p"><span>amount</span></th>
                                                                        <th class="wd-lg-20p"><span>Type</span></th>
                                                                        <th class="wd-lg-20p"><span>created_at</span></th>
                                                                        <th class="wd-lg-20p"><span>Action</span></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    $select = "Select * from brand";
                                                                    $result = mysqli_query($conn , $select);
                                                                    if(mysqli_num_rows($result) > 0){
                                                                        foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                        <td><?= $resultItem['brand_id']?></td>  
                                                                        <td><?= $resultItem['name']?></td>     
                                                                        <td><?= $resultItem['type']?></td>     
                                                                        <td><?= $resultItem['amount']?></td>                                       
                                                                        <td><?= $resultItem['created_at']?></td>                       
                                                                        <td>
                                                                            <button 
                                                                            type="button" 
                                                                            class="btn btn-sm btn-info" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#editBrandModal" 
                                                                            data-brand-id="<?= $resultItem['brand_id'] ?>"
                                                                            data-name="<?= $resultItem['name'] ?>"
                                                                            data-type="<?= $resultItem['type'] ?>"
                                                                            data-amount="<?= $resultItem['amount'] ?>"
                                                                            >
                                                                                <i class="fe fe-edit-2"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php 
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="markup-disc">
                                            <div class="card custom-card">
                                                    <div class="card-header border-bottom-0 d-block">                            
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <label class="main-content-label mb-0">MARK UP</label>                                   
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive userlist-table">
                                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="wd-lg-8p"><span>ID</span></th>
                                                                        <th class="wd-lg-20p"><span>Admin ID</span></th>
                                                                        <th class="wd-lg-20p"><span>Percentage</span></th>
                                                                        <th class="wd-lg-20p"><span>created_at</span></th>
                                                                        <th class="wd-lg-20p"><span>Action</span></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php 
                                                                $select = "SELECT * FROM service_markup";
                                                                $result = mysqli_query($conn, $select);
                                                                if (mysqli_num_rows($result) > 0) {
                                                                    foreach ($result as $resultItem) {
                                                                ?> 
                                                                <tr>
                                                                    <td><?= $resultItem['markup_id']?></td>
                                                                    <td><?= $resultItem['admin_id']?></td>
                                                                    <td><?= $resultItem['markup_percentage']?>%</td>
                                                                    <td><?= $resultItem['date_created']?></td>
                                                                    <td>
                                                                        <button 
                                                                            type="button" 
                                                                            class="btn btn-sm btn-info" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#editPercentModal"                                 
                                                                            data-markup-id="<?= $resultItem['markup_id'] ?>"
                                                                            data-percent="<?= $resultItem['markup_percentage'] ?>"
                                                                        >
                                                                            <i class="fe fe-edit-2"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <?php 
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- Modal for Editing Markup Percentage -->
                        <div class="modal fade" id="editPercentModal" tabindex="-1" aria-labelledby="editPercentModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editPercentModalLabel">Edit Markup Percentage</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editPercentForm" action="function.php" method="POST">
                                            <div class="mb-3">
                                                <label for="markup_id" class="form-label">Markup ID</label>
                                                <input type="text" class="form-control" id="markup_id" name="markup_id" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="markup_percentage" class="form-label">Markup Percentage</label>
                                                <input type="number" class="form-control" id="markup_percentage" name="markup_percentage" min="0" max="100" required>
                                            </div>
                                            <div class="text-center mt-3">
                                                <button type="submit" id="markupbtn" class="btn btn-primary" name="save_markup">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    <!-- Modal for Adding to tune up -->
                    <div class="modal fade" id="GeneratorTuneUpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="GeneratorTuneUpModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg"> <!-- Make the modal larger -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="GeneratorTuneUpModalLabel">SET PACKAGE FOR GENERATOR TUNE-UP</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" method="POST">        
                                                <input type="hidden" name="account_id" id="user_id">
                                                <input type="hidden" name="appointment_id" id="appointment_id">               
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th> <!-- Unit Column next to Item No. -->
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th> <!-- Action Column for the close button -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemTableBodyTuneup">
                                                        <!-- Rows will be added here dynamically -->
                                                    </tbody>
                                                </table>

                                                <button type="button" class="btn btn-primary" id="addItemButtonTuneup">Add Item</button>
                                                <!-- Submit Button -->
                                                <button type="submit" class="btn btn-success mt-3" name="tuneup_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Brand Modal -->
                    <div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addBrandModalLabel">Add New Brand</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Name field -->
                                    <div class="mb-3">
                                        <label for="addbrandName" class="form-label">Brand Name</label>
                                        <input type="text" class="form-control" id="addbrandName" name="name" required>
                                    </div>
                                    <!-- Type field -->
                                    <div class="mb-3">
                                        <label for="addbrandtype" class="form-label">Type</label>
                                        <select class="form-select" id="addbrandtype" name="type" required>
                                            <option value="">-- Select Type --</option>
                                            <option value="Solar">Solar</option>
                                            <option value="Generator">Generator</option>
                                        </select>
                                    </div>
                                    <!-- Amount field -->
                                    <div class="mb-3">
                                        <label for="addbrandAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="addbrandAmount" name="amount" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="addbrand">Add Brand</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Brand Modal -->
                    <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="brandId" name="brand_id">
                                    
                                    <div class="mb-3">
                                        <label for="brandName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="editbrandName" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editbrandType" class="form-label">Type</label>
                                        <select class="form-select" id="editbrandType" name="type" required>
                                            <option value="Solar">Solar</option>
                                            <option value="Generator">Generator</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editbrandAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="editbrandAmount" name="amount" required>
                                    </div>

                                    <button type="submit" name="brand_save" id="editbrand" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Service Item Modal -->
                    <div class="modal fade" id="addServiceItemModal" tabindex="-1" aria-labelledby="addServiceItemModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addServiceItemModalLabel">Add New Service Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Unit selection dropdown -->
                                    <div class="mb-3">
                                        <label for="item_unit" class="form-label">Unit</label>
                                        <select class="form-control" id="item_unit" name="service_unit" required>
                                            <option value="">Select unit</option>
                                            <option value="items">Items</option>
                                            <option value="set">Set</option>
                                            <option value="job">Job</option>
                                            <option value="lot">Lot</option>
                                        </select>
                                    </div>

                                    <!-- Description field -->
                                    <div class="mb-3">
                                        <label for="itemdescription" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="item_description" name="service_description" required>
                                    </div>

                                    <!-- Quantity field -->
                                    <div class="mb-3">
                                        <label for="itemquantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="item_quantity" name="service_quantity" required>
                                    </div>

                                    <!-- Amount field -->
                                    <div class="mb-3">
                                        <label for="itemamount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="item_amount" name="service_amount" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="item_add" name="serviceItem_save">Add Service Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit items Modal -->
                    <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <!-- Hidden input for item ID -->
                                        <input type="hidden" id="editItemId" name="item_id">

                                            <!-- Unit field as a select input -->
                                            <div class="mb-3">
                                                <label for="item_edit_unit" class="form-label">Unit</label>
                                                <select class="form-select" id="item_edit_unit" name="item_unit" required>
                                                    <option value="items">Items</option>
                                                    <option value="set">Set</option>
                                                    <option value="job">Job</option>
                                                    <option value="lot">Lot</option>
                                                </select>
                                            </div>

                                        <!-- Description field -->
                                        <div class="mb-3">
                                            <label for="item_edit_description" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="item_edit_description" name="item_description" required>
                                        </div>

                                        <!-- Quantity field -->
                                        <div class="mb-3">
                                            <label for="item_edit_quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="item_edit_quantity" name="item_quantity" required>
                                        </div>

                                        <!-- Amount field -->
                                        <div class="mb-3">
                                            <label for="item_edit_amount" class="form-label">Amount</label>
                                            <input type="number" class="form-control" id="item_edit_amount" name="item_amount" required>
                                        </div>

                                        <div class="modal-footer">  
                                            <button type="submit" class="btn btn-primary" id="item_edit" name="serviceItem_edit">Save Changes</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal FOR ADD ITEM FOR SET PACKAGE FOR SOLAR  -->
                    <div class="modal fade" id="installationPackageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="installationPackageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg"> <!-- Make the modal larger -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">SET PACKAGE FOR SOLAR</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" id="ins_solar" method="POST">        
                                                    
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th> <!-- Unit Column next to Item No. -->
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th> <!-- Action Column for the close button -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemTableBody">
                                                        <!-- Rows will be added here dynamically -->
                                                    </tbody>
                                                </table>

                                                <button type="button" class="btn btn-primary" id="addItemButton">Add Item</button>
                                                <!-- Submit Button -->
                                                <button type="submit" class="btn btn-success mt-3" value="installation_save" name="installation_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal FOR ADD SET PACKAGE FOR GENERATOR -->
                    <div class="modal fade" id="GeneratorPackageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="GeneratorPackageModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg"> <!-- Make the modal larger -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">SET PACKAGE FOR GENERATOR</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" id="ins_gen" method="POST">        
                                                    
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th> <!-- Unit Column next to Item No. -->
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th> <!-- Action Column for the close button -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemTableBodyGenerator">
                                                        <!-- Rows will be added here dynamically -->
                                                    </tbody>
                                                </table>

                                                <button type="button" class="btn btn-primary" id="addItemButtonGenerator">Add Item</button>
                                                <!-- Submit Button -->
                                                <button type="submit" class="btn btn-success mt-3" name="generator_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                    <!-- Modal for Installation (Solar) -->
                    <!-- <div class="modal fade" id="installationPackageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="installationPackageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="installationPackageModalLabel">SET PACKAGE FOR INSTALLATION (SOLAR)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" method="POST">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemTableBodyInstallation">
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary" id="addItemButtonInstallation">Add Item</button>
                                                <button type="submit" class="btn btn-success mt-3" name="installation_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Modal for Tune-Up (Generator) -->
                    <div class="modal fade" id="tuneupPackageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tuneupPackageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tuneupPackageModalLabel">SET PACKAGE FOR TUNE-UP (GENERATOR)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" id="tnup_gen" method="POST">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemTableBodyTuneup">
                                                        
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary" id="addItemButtonTuneup">Add Item</button>
                                                <button type="submit" class="btn btn-success mt-3" name="tuneup_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <!-- Modal for Maintenance (Solar) -->
                    <div class="modal fade" id="SolarMaintenanceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="SolarMaintenanceModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="SolarMaintenanceModalLabel">SET PACKAGE FOR MAINTENANCE (SOLAR)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" id="main_solar" method="POST">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemMaintenanceSolarTableBody">
                                                        
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary" id="addMaintenanceSolarItemButton">Add Item</button>
                                                <button type="submit" class="btn btn-success mt-3" name="solar_maintenance_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal for Maintenance (Generator) -->
                    <div class="modal fade" id="GeneratorMaintenanceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="GeneratorMaintenanceModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="GeneratorMaintenanceModalLabel">SET PACKAGE FOR MAINTENANCE (GENERATOR)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" id="main_gen" method="POST">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemMaintenanceGeneratorTableBody">
                                                        <!-- Rows will be added here dynamically -->
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary" id="addMaintenanceGeneratorItemButton">Add Item</button>
                                                <button type="submit" class="btn btn-success mt-3" name="generator_maintenance_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Modal for Repair (Solar) -->
                    <div class="modal fade" id="SolarRepairModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="SolarRepairModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="SolarRepairModalLabel">SET PACKAGE FOR REPAIR (SOLAR)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" id="rep_solar" method="POST">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemRepairSolarTableBody">
                                                        <!-- Rows will be added here dynamically -->
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary" id="addRepairSolarItemButton">Add Item</button>
                                                <button type="submit" class="btn btn-success mt-3" name="solar_repair_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Repair (Generator) -->
                    <div class="modal fade" id="GeneratorRepairModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="GeneratorRepairModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="GeneratorRepairModalLabel">SET PACKAGE FOR REPAIR (GENERATOR)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="function.php" id="rep_gen" method="POST">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemRepairGeneratorTableBody">
                                                        <!-- Rows will be added here dynamically -->
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary" id="addRepairGeneratorItemButton">Add Item</button>
                                                <button type="submit" class="btn btn-success mt-3" name="generator_repair_save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
            <!-- Footer Start -->
            <?php include_once('../../../partials/footer.php') ?>
            <!-- Footer End -->
        </div>
        
        <!-- Scroll To Top -->
        <div class="scrollToTop">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        <!-- Scroll To Top -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Defaultmenu JS -->
        <script src="../../../assets/js/defaultmenu.min.js"></script>

        <!-- Node Waves JS-->
        <script src="../../../assets/libs/node-waves/waves.min.js"></script>

        <!-- Sticky JS -->
        <script src="../../../assets/js/sticky.js"></script>

        <!-- Simplebar JS -->
        <script src="../../../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../../../assets/js/simplebar.js"></script>

        <!-- Color Picker JS -->
        <script src="../../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>
        
        <!-- Custom-Switcher JS -->
        <script src="../../../assets/js/custom-switcher.min.js"></script>

        <!-- Custom JS -->
        <script src="../../../assets/js/custom.js"></script>

        <script>
            $(document).ready(function() {
                $(".delete-btn-Product").click(function(event) {
                    event.preventDefault(); // Prevent the default action (navigating to the delete URL)
                    var itemId = $(this).data('id');
                    Swal.fire({
                        title: 'Confirmation',
                        html: "Are you sure to delete this item?",
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, send AJAX request for deletion of product
                            $.ajax({
                                url: 'item-delete.php',
                                type: 'POST', // Ensure you're using the correct method if the backend expects GET
                                data: { id: itemId},
                                success: function(response) {
                                    if(response.success){
                                        // Handle successful deletion of product
                                        Swal.fire({
                                            title: 'item Deleted!',
                                            text: 'You have successfully deleted the item.',
                                            icon: 'success',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'manageitems.php';
                                        });
                                    }
                                    else{
                                        Swal.fire({
                                        title: 'Item not deleted!',
                                        text: response.message || 'An error occurred while deleting the product.',
                                        icon: 'error',
                                        allowOutsideClick: false,
                                        timer: 2000, // 2 seconds timer
                                        showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'manageitems.php';
                                        });
                                    }
                                },
                                error: function(response) {
                                    Swal.fire({
                                        title: 'An error occured!',
                                        icon: 'error',
                                        allowOutsideClick: false,
                                        timer: 2000, // 2 seconds timer
                                        showConfirmButton: false // Hide the confirm button
                                    });
                                }
                            });
                        }
                    });
                });
            });
        </script>

        <script>

            document.addEventListener('DOMContentLoaded', function () {
                var editPercentModal = document.getElementById('editPercentModal');

                editPercentModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;  // The button that triggered the modal
                    var markupId = button.getAttribute('data-markup-id');
                    var markupPercentage = button.getAttribute('data-percent');

                    // Get the modal input fields
                    var modalMarkupIdInput = editPercentModal.querySelector('#markup_id');
                    var modalMarkupPercentageInput = editPercentModal.querySelector('#markup_percentage');

                    // Set the values in the modal inputs
                    modalMarkupIdInput.value = markupId;
                    modalMarkupPercentageInput.value = markupPercentage;
                });
            });

            document.addEventListener('DOMContentLoaded', function () {
                var editItemModal = document.getElementById('editItemModal');

                editItemModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var itemId = button.getAttribute('data-item-id');
                    var itemUnit = button.getAttribute('data-item-unit');
                    var itemDescription = button.getAttribute('data-item-description');
                    var itemQuantity = button.getAttribute('data-item-quantity');
                    var itemAmount = button.getAttribute('data-item-amount');
                

                var modalItemIdInput = editItemModal.querySelector('#editItemId');
                var modalItemUnitInput = editItemModal.querySelector('#item_edit_unit');
                var modalItemDescriptionInput = editItemModal.querySelector('#item_edit_description');
                var modalItemNQuantityInput = editItemModal.querySelector('#item_edit_quantity');
                var modalItemAmountInput = editItemModal.querySelector('#item_edit_amount');

                    modalItemIdInput.value = itemId;
                    modalItemUnitInput.value = itemUnit;
                    modalItemDescriptionInput.value = itemDescription;
                    modalItemNQuantityInput.value = itemQuantity;
                    modalItemAmountInput.value = itemAmount;
                });
            });

            document.addEventListener("DOMContentLoaded", function () {
            
            //INSTALLATION SOLAR SUBMISSION VALIDATION
            const form_ins_solar = document.querySelector("#ins_solar");
            const form_ins_gen = document.querySelector("#ins_gen");
            const form_tnup_gen = document.querySelector("#tnup_gen");
            const form_main_solar = document.querySelector("#main_solar");
            const form_main_gen = document.querySelector("#main_gen");
            const form_rep_solar = document.querySelector("#rep_solar");
            const form_rep_gen = document.querySelector("#rep_gen");
            


            form_ins_solar.addEventListener("submit", function (event) {
                event.preventDefault();

                const formData = new FormData(this);  // Use FormData directly from the form
                formData.append('installation_save', true);  // Append the installation_save field

                // Debugging alert to preview FormData (can be removed later)
                let formDataPreview = "";
                formData.forEach(function(value, key) {
                    formDataPreview += key + ": " + value + "\n";  // Prepare a string for alert
                });
                

                Swal.fire({
                    title: 'Confirmation',
                    html: "Are you sure to Set Package?",
                    icon: 'warning',
                    confirmButtonText: 'Confirm',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "function.php",  // URL to send the request to
                            type: "POST",         // HTTP method
                            data: formData,       // Data to send (FormData)
                            dataType: 'json',
                            processData: false,   // Don't process the data (form data is already in the correct format)
                            contentType: false,   // Don't set content type (FormData will handle it)
                            success: function(response) {
                                if (response.success == true) {
                                    // Success alert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Package saved successfully!',
                                        showConfirmButton: true,
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'manageitems.php';
                                        
                                    })
                                 } else if (response.failed == true) {
                                     // Error alert
                                     Swal.fire({
                                         icon: 'error',
                                         title: 'Error!',
                                         text: 'An error occurred: ' + response.message,
                                         showConfirmButton: true,
                                         confirmButtonText: 'OK'
                                     });
                                 }
                                // Reset the form after submission
                                $('#ins_solar')[0].reset();  // Replace 'ins_solar' with the actual form ID
                            },
                            error: function(xhr, status, error) {
                                // Handle AJAX errors
                                console.error("Error:", status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while processing the request.',
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            }),


            //INSTALLATION GENERATOR SUBMISSION VALIDATION
            form_ins_gen.addEventListener("submit", function (event) {
                event.preventDefault();

                const formData = new FormData(this);  // Use FormData directly from the form
                formData.append('generator_save', true);  // Append the installation_save field

                // Debugging alert to preview FormData (can be removed later)
                let formDataPreview = "";
                formData.forEach(function(value, key) {
                    formDataPreview += key + ": " + value + "\n";  // Prepare a string for alert
                });
                

                Swal.fire({
                    title: 'Confirmation',
                    html: "Are you sure to Set Package?",
                    icon: 'warning',
                    confirmButtonText: 'Confirm',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "function.php",  // URL to send the request to
                            type: "POST",         // HTTP method
                            data: formData,       // Data to send (FormData)
                            dataType: 'json',
                            processData: false,   // Don't process the data (form data is already in the correct format)
                            contentType: false,   // Don't set content type (FormData will handle it)
                            success: function(response) {
                                if (response.success == true) {
                                    // Success alert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Package saved successfully!',
                                        showConfirmButton: true,
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'manageitems.php';
                                        
                                    })
                                 } else if (response.failed == true) {
                                     // Error alert
                                     Swal.fire({
                                         icon: 'error',
                                         title: 'Error!',
                                         text: 'An error occurred: ' + response.message,
                                         showConfirmButton: true,
                                         confirmButtonText: 'OK'
                                     });
                                 }
                                // Reset the form after submission
                                $('#ins_solar')[0].reset();  // Replace 'ins_solar' with the actual form ID
                            },
                            error: function(xhr, status, error) {
                                // Handle AJAX errors
                                console.error("Error:", status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while processing the request.',
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            }),

            //TUNE UP GENERATOR SUBMISSION VALIDATION
            form_tnup_gen.addEventListener("submit", function (event) {
                event.preventDefault();

                const formData = new FormData(this);  // Use FormData directly from the form
                formData.append('tuneup_save', true);  // Append the installation_save field

                // Debugging alert to preview FormData (can be removed later)
                let formDataPreview = "";
                formData.forEach(function(value, key) {
                    formDataPreview += key + ": " + value + "\n";  // Prepare a string for alert
                });
                

                Swal.fire({
                    title: 'Confirmation',
                    html: "Are you sure to Set Package?",
                    icon: 'warning',
                    confirmButtonText: 'Confirm',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "function.php",  // URL to send the request to
                            type: "POST",         // HTTP method
                            data: formData,       // Data to send (FormData)
                            dataType: 'json',
                            processData: false,   // Don't process the data (form data is already in the correct format)
                            contentType: false,   // Don't set content type (FormData will handle it)
                            success: function(response) {
                                if (response.success == true) {
                                    // Success alert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Package saved successfully!',
                                        showConfirmButton: true,
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'manageitems.php';
                                        
                                    })
                                 } else if (response.failed == true) {
                                     // Error alert
                                     Swal.fire({
                                         icon: 'error',
                                         title: 'Error!',
                                         text: 'An error occurred: ' + response.message,
                                         showConfirmButton: true,
                                         confirmButtonText: 'OK'
                                     });
                                 }
                                // Reset the form after submission
                                $('#ins_solar')[0].reset();  // Replace 'ins_solar' with the actual form ID
                            },
                            error: function(xhr, status, error) {
                                // Handle AJAX errors
                                console.error("Error:", status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while processing the request.',
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            }),
            //MAINTENANCE SOLAR SUBMISSION VALIDATION
            form_main_solar.addEventListener("submit", function (event) {
                event.preventDefault(); 

                const formData = new FormData(this);  // Use FormData directly from the form
                formData.append('solar_maintenance_save', true);  // Append the installation_save field

                // Debugging alert to preview FormData (can be removed later)
                let formDataPreview = "";
                formData.forEach(function(value, key) {
                    formDataPreview += key + ": " + value + "\n";  // Prepare a string for alert
                });
                

                Swal.fire({
                    title: 'Confirmation',
                    html: "Are you sure to Set Package?",
                    icon: 'warning',
                    confirmButtonText: 'Confirm',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "function.php",  // URL to send the request to
                            type: "POST",         // HTTP method
                            data: formData,       // Data to send (FormData)
                            dataType: 'json',
                            processData: false,   // Don't process the data (form data is already in the correct format)
                            contentType: false,   // Don't set content type (FormData will handle it)
                            success: function(response) { 
                                 if (response.success == true) {
                                    // Success alert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Package saved successfully!',
                                        showConfirmButton: true,
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'manageitems.php';
                                        
                                    })
                                 } else if (response.failed == true) {
                                     // Error alert
                                     Swal.fire({
                                         icon: 'error',
                                         title: 'Error!',
                                         text: 'An error occurred: ' + response.message,
                                         showConfirmButton: true,
                                         confirmButtonText: 'OK'
                                     });
                                 }
                                // Reset the form after submission
                                $('#ins_solar')[0].reset();  // Replace 'ins_solar' with the actual form ID
                            },
                            error: function(xhr, status, error) {
                                // Handle AJAX errors
                                console.error("Error:", status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while processing the request.',
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        

            //MAINTENANCE GEN SUBMISSION VALIDATION
            form_main_gen.addEventListener("submit", function (event) {
                event.preventDefault();

                const formData = new FormData(this);  // Use FormData directly from the form
                formData.append('generator_maintenance_save', true);  // Append the installation_save field

                // Debugging alert to preview FormData (can be removed later)
                let formDataPreview = "";
                formData.forEach(function(value, key) {
                    formDataPreview += key + ": " + value + "\n";  // Prepare a string for alert
                });
                

                Swal.fire({
                    title: 'Confirmation',
                    html: "Are you sure to Set Package?",
                    icon: 'warning',
                    confirmButtonText: 'Confirm',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "function.php",  // URL to send the request to
                            type: "POST",         // HTTP method
                            data: formData,       // Data to send (FormData)
                            dataType: 'json',
                            processData: false,   // Don't process the data (form data is already in the correct format)
                            contentType: false,   // Don't set content type (FormData will handle it)
                            success: function(response) {
                                if (response.success == true) {
                                    // Success alert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Package saved successfully!',
                                        showConfirmButton: true,
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'manageitems.php';
                                        
                                    })
                                 } else if (response.failed == true) {
                                     // Error alert
                                     Swal.fire({
                                         icon: 'error',
                                         title: 'Error!',
                                         text: 'An error occurred: ' + response.message,
                                         showConfirmButton: true,
                                         confirmButtonText: 'OK'
                                     });
                                 }
                                // Reset the form after submission
                                $('#ins_solar')[0].reset();  // Replace 'ins_solar' with the actual form ID
                            },
                            error: function(xhr, status, error) {
                                // Handle AJAX errors
                                console.error("Error:", status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while processing the request.',
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            }),

            //REPAIR SOLAR SUBMISSION VALIDATION
            form_rep_solar.addEventListener("submit", function (event) {
                event.preventDefault();

                const formData = new FormData(this);  // Use FormData directly from the form
                formData.append('solar_repair_save', true);  // Append the installation_save field

                // Debugging alert to preview FormData (can be removed later)
                let formDataPreview = "";
                formData.forEach(function(value, key) {
                    formDataPreview += key + ": " + value + "\n";  // Prepare a string for alert
                });
                

                Swal.fire({
                    title: 'Confirmation',
                    html: "Are you sure to Set Package?",
                    icon: 'warning',
                    confirmButtonText: 'Confirm',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "function.php",  // URL to send the request to
                            type: "POST",         // HTTP method
                            data: formData,       // Data to send (FormData)
                            dataType: 'json',
                            processData: false,   // Don't process the data (form data is already in the correct format)
                            contentType: false,   // Don't set content type (FormData will handle it)
                            success: function(response) {
                                if (response.success == true) {
                                    // Success alert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Package saved successfully!',
                                        showConfirmButton: true,
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'manageitems.php';
                                        
                                    })
                                 } else if (response.failed == true) {
                                     // Error alert
                                     Swal.fire({
                                         icon: 'error',
                                         title: 'Error!',
                                         text: 'An error occurred: ' + response.message,
                                         showConfirmButton: true,
                                         confirmButtonText: 'OK'
                                     });
                                 }
                                // Reset the form after submission
                                $('#ins_solar')[0].reset();  // Replace 'ins_solar' with the actual form ID
                            },
                            error: function(xhr, status, error) {
                                // Handle AJAX errors
                                console.error("Error:", status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while processing the request.',
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            }),


            //REPAIR GEN SUBMISSION VALIDATION
            form_rep_gen.addEventListener("submit", function (event) {
                event.preventDefault();

                const formData = new FormData(this);  // Use FormData directly from the form
                formData.append('generator_repair_save', true);  // Append the installation_save field

                // Debugging alert to preview FormData (can be removed later)
                let formDataPreview = "";
                formData.forEach(function(value, key) {
                    formDataPreview += key + ": " + value + "\n";  // Prepare a string for alert
                });
                

                Swal.fire({
                    title: 'Confirmation',
                    html: "Are you sure to Set Package?",
                    icon: 'warning',
                    confirmButtonText: 'Confirm',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "function.php",  // URL to send the request to
                            type: "POST",         // HTTP method
                            data: formData,       // Data to send (FormData)
                            dataType: 'json',
                            processData: false,   // Don't process the data (form data is already in the correct format)
                            contentType: false,   // Don't set content type (FormData will handle it)
                            success: function(response) {
                                if (response.success == true) {
                                    // Success alert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Package saved successfully!',
                                        showConfirmButton: true,
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'manageitems.php';
                                        
                                    })
                                 } else if (response.failed == true) {
                                     // Error alert
                                     Swal.fire({
                                         icon: 'error',
                                         title: 'Error!',
                                         text: 'An error occurred: ' + response.message,
                                         showConfirmButton: true,
                                         confirmButtonText: 'OK'
                                     });
                                 }
                                // Reset the form after submission
                                $('#ins_solar')[0].reset();  // Replace 'ins_solar' with the actual form ID
                            },
                            error: function(xhr, status, error) {
                                // Handle AJAX errors
                                console.error("Error:", status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while processing the request.',
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
            });


        

            
        
        
        


            document.addEventListener('DOMContentLoaded', function () {
                // Get the modal element by ID
                var editBrandModal = document.getElementById('editBrandModal');

                // Select all buttons that open the modal
                var editButtons = document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#editBrandModal"]');

                editButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        // Extract data attributes from the button
                        var brand_id = button.getAttribute('data-brand-id');
                        var name = button.getAttribute('data-name');
                        var type = button.getAttribute('data-type');
                        var amount = button.getAttribute('data-amount');

            // Populate the modal's form fields with the extracted data
            var modalIdInput = editBrandModal.querySelector('#brandId');
            var modalNameInput = editBrandModal.querySelector('#editbrandName');
            var modalTypeInput = editBrandModal.querySelector('#editbrandType');
            var modalAmountInput = editBrandModal.querySelector('#editbrandAmount');

                        modalIdInput.value = brand_id;
                        modalNameInput.value = name;
                        modalTypeInput.value = type;
                        modalAmountInput.value = amount;
                    });
                });
            });

        </script>

        <!-- For Add Item Quotation -->
        <script>
            let itemCount = 0;

            // Function to update item numbers dynamically
            function updateItemNumbers() {
                const rows = document.querySelectorAll('#itemTableBody tr');
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').innerText = index + 1; // Update the item number
                });
                itemCount = rows.length; // Adjust itemCount to the current number of rows
            }

            document.getElementById('addItemButton').addEventListener('click', function() {
                itemCount++;

                // Create a new row
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td>${itemCount}</td>
                    <td><input type="text" name="unit[]" class="form-control" readonly></td> <!-- Unit Column -->
                    <td>
                        <select name="item_description[]" class="form-select" required>
                            <option value="">Select Item</option>
                            <!-- Dynamically load options from the database using PHP -->
                            <?php
                            $query = "SELECT * FROM service_pricing"; // Adjust the query according to your database structure
                            $result = mysqli_query($conn, $query);

                            // Check if there are results and populate the options
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['description'] . '" data-amount="' . $row['amount'] . '" data-unit="' . $row['unit'] . '">' . $row['description'] . ' - $' . $row['amount'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control" min="1" value="1" required></td>
                    <td><input type="text" name="amount[]" class="form-control" readonly></td>
                    <td><input type="text" name="total_cost[]" class="form-control" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td> <!-- Remove Button -->
                `;

                document.getElementById('itemTableBody').appendChild(newRow);

                // Add event listener to update amount and unit when an item is selected
                const descriptionSelect = newRow.querySelector('select[name="item_description[]"]');
                descriptionSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const amountField = newRow.querySelector('input[name="amount[]"]');
                    const unitField = newRow.querySelector('input[name="unit[]"]');
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    const amount = selectedOption.dataset.amount;
                    const unit = selectedOption.dataset.unit;

                    amountField.value = amount;
                    unitField.value = unit;
                    totalCostField.value = amount; // Set total cost initially to the amount
                });

                // Add event listener to update total cost when quantity changes
                const quantityInput = newRow.querySelector('input[name="quantity[]"]');
                quantityInput.addEventListener('input', function() {
                    const quantity = this.value;
                    const amount = newRow.querySelector('input[name="amount[]"]').value;
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    totalCostField.value = (quantity * amount) || 0; // Update total cost based on quantity
                });

                // Add event listener to the remove button to delete the row
                newRow.querySelector('.remove-row').addEventListener('click', function() {
                    newRow.remove(); // Removes the row from the table
                    updateItemNumbers(); // Update item numbers after removing a row
                });
            });
        </script>

        <script>
            let itemCountGenerator = 0;

            // Function to update item numbers dynamically for the Generator table
            function updateItemNumbersGenerator() {
                const rows = document.querySelectorAll('#itemTableBodyGenerator tr');
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').innerText = index + 1; // Update the item number
                });
                itemCountGenerator = rows.length; // Adjust itemCountGenerator to the current number of rows
            }

            document.getElementById('addItemButtonGenerator').addEventListener('click', function() {
                itemCountGenerator++;

                // Create a new row for the Generator table
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td>${itemCountGenerator}</td>
                    <td><input type="text" name="unit[]" class="form-control" readonly></td> <!-- Unit Column -->
                    <td>
                        <select name="item_description[]" class="form-select" required>
                            <option value="">Select Item</option>
                            <!-- Dynamically load options from the database using PHP -->
                            <?php
                            $query = "SELECT * FROM service_pricing"; // Adjust the query according to your database structure
                            $result = mysqli_query($conn, $query);

                            // Check if there are results and populate the options
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['description'] . '" data-amount="' . $row['amount'] . '" data-unit="' . $row['unit'] . '">' . $row['description'] . ' - $' . $row['amount'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control" min="1" value="1" required></td>
                    <td><input type="text" name="amount[]" class="form-control" readonly></td>
                    <td><input type="text" name="total_cost[]" class="form-control" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td> <!-- Remove Button -->
                `;

                document.getElementById('itemTableBodyGenerator').appendChild(newRow);

                // Add event listener to update amount and unit when an item is selected
                const descriptionSelect = newRow.querySelector('select[name="item_description[]"]');
                descriptionSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const amountField = newRow.querySelector('input[name="amount[]"]');
                    const unitField = newRow.querySelector('input[name="unit[]"]');
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    const amount = selectedOption.dataset.amount;
                    const unit = selectedOption.dataset.unit;

                    amountField.value = amount;
                    unitField.value = unit;
                    totalCostField.value = amount; // Set total cost initially to the amount
                });

                // Add event listener to update total cost when quantity changes
                const quantityInput = newRow.querySelector('input[name="quantity[]"]');
                quantityInput.addEventListener('input', function() {
                    const quantity = this.value;
                    const amount = newRow.querySelector('input[name="amount[]"]').value;
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    totalCostField.value = (quantity * amount) || 0; // Update total cost based on quantity
                });

                // Add event listener to the remove button to delete the row
                newRow.querySelector('.remove-row').addEventListener('click', function() {
                    newRow.remove(); // Removes the row from the table
                    updateItemNumbersGenerator(); // Update item numbers after removing a row
                });
            });
        </script>

        <script>
            let itemCounts = 0;

            // Function to update item numbers dynamically
            function updateItemNumbers() {
                const rows = document.querySelectorAll('#itemTableBodyTuneup tr');
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').innerText = index + 1; // Update the item number
                });
                itemCounts = rows.length; // Adjust itemCount to the current number of rows
            }

            document.getElementById('addItemButtonTuneup').addEventListener('click', function() {
                itemCounts++;

                // Create a new row
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td>${itemCounts}</td>
                    <td><input type="text" name="unit[]" class="form-control" readonly></td> <!-- Unit Column -->
                    <td>
                        <select name="item_description[]" class="form-select" required>
                            <option value="">Select Item</option>
                            <!-- Dynamically load options from the database using PHP -->
                            <?php
                            $query = "SELECT * FROM service_pricing"; // Adjust the query according to your database structure
                            $result = mysqli_query($conn, $query);

                            // Check if there are results and populate the options
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['description'] . '" data-amount="' . $row['amount'] . '" data-unit="' . $row['unit'] . '">' . $row['description'] . ' - $' . $row['amount'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control" min="1" value="1" required></td>
                    <td><input type="text" name="amount[]" class="form-control" readonly></td>
                    <td><input type="text" name="total_cost[]" class="form-control" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td> <!-- Remove Button -->
                `;

                document.getElementById('itemTableBodyTuneup').appendChild(newRow);

                // Add event listener to update amount and unit when an item is selected
                const descriptionSelect = newRow.querySelector('select[name="item_description[]"]');
                descriptionSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const amountField = newRow.querySelector('input[name="amount[]"]');
                    const unitField = newRow.querySelector('input[name="unit[]"]');
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    const amount = selectedOption.dataset.amount;
                    const unit = selectedOption.dataset.unit;

                    amountField.value = amount;
                    unitField.value = unit;
                    totalCostField.value = amount; // Set total cost initially to the amount
                });

                // Add event listener to update total cost when quantity changes
                const quantityInput = newRow.querySelector('input[name="quantity[]"]');
                quantityInput.addEventListener('input', function() {
                    const quantity = this.value;
                    const amount = newRow.querySelector('input[name="amount[]"]').value;
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    totalCostField.value = (quantity * amount) || 0; // Update total cost based on quantity
                });

                // Add event listener to the remove button to delete the row
                newRow.querySelector('.remove-row').addEventListener('click', function() {
                    newRow.remove(); // Removes the row from the table
                    updateItemNumbers(); // Update item numbers after removing a row
                });
            });
        </script>

        <script>
            let itemCountMaintenanceSolar = 0;
            let itemCountMaintenanceGenerator = 0;
            let itemCountRepairSolar = 0;
            let itemCountRepairGenerator = 0;

            // Function to update item numbers dynamically
            function updateItemNumbers(tableBodyId, itemCount) {
                const rows = document.querySelectorAll(`#${tableBodyId} tr`);
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').innerText = index + 1; // Update the item number
                });
                itemCount = rows.length; // Adjust itemCount to the current number of rows
            }

            // Function to add a new row dynamically
            function addNewRow(tableBodyId, itemCount, prefix) {
                itemCount++;

                // Create a new row
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${itemCount}</td>
                    <td><input type="text" name="unit[]" class="form-control" readonly></td> <!-- Unit Column -->
                    <td>
                        <select name="item_description[]" class="form-select" required>
                            <option value="">Select Item</option>
                            <!-- Dynamically load options from the database using PHP -->
                            <?php
                            $query = "SELECT * FROM service_pricing"; // Adjust the query according to your database structure
                            $result = mysqli_query($conn, $query);

                            // Check if there are results and populate the options
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['description'] . '" data-amount="' . $row['amount'] . '" data-unit="' . $row['unit'] . '">' . $row['description'] . ' - $' . $row['amount'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control" min="1" value="1" required></td>
                    <td><input type="text" name="amount[]" class="form-control" readonly></td>
                    <td><input type="text" name="total_cost[]" class="form-control" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td> <!-- Remove Button -->
                `;

                document.getElementById(tableBodyId).appendChild(newRow);

                // Add event listener to update amount and unit when an item is selected
                const descriptionSelect = newRow.querySelector('select[name="item_description[]"]');
                descriptionSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const amountField = newRow.querySelector('input[name="amount[]"]');
                    const unitField = newRow.querySelector('input[name="unit[]"]');
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    const amount = selectedOption.dataset.amount;
                    const unit = selectedOption.dataset.unit;

                    amountField.value = amount;
                    unitField.value = unit;
                    totalCostField.value = amount; // Set total cost initially to the amount
                });

                // Add event listener to update total cost when quantity changes
                const quantityInput = newRow.querySelector('input[name="quantity[]"]');
                quantityInput.addEventListener('input', function() {
                    const quantity = this.value;
                    const amount = newRow.querySelector('input[name="amount[]"]').value;
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    totalCostField.value = (quantity * amount) || 0; // Update total cost based on quantity
                });

                // Add event listener to the remove button to delete the row
                newRow.querySelector('.remove-row').addEventListener('click', function() {
                    newRow.remove(); // Removes the row from the table
                    updateItemNumbers(tableBodyId, itemCount); // Update item numbers after removing a row
                });
            }

            document.getElementById('addMaintenanceSolarItemButton').addEventListener('click', function() {
                addNewRow('itemMaintenanceSolarTableBody', itemCountMaintenanceSolar, 'maintenanceSolar');
            });

            document.getElementById('addMaintenanceGeneratorItemButton').addEventListener('click', function() {
                addNewRow('itemMaintenanceGeneratorTableBody', itemCountMaintenanceGenerator, 'maintenanceGenerator');
            });

            document.getElementById('addRepairSolarItemButton').addEventListener('click', function() {
                addNewRow('itemRepairSolarTableBody', itemCountRepairSolar, 'repairSolar');
            });

            document.getElementById('addRepairGeneratorItemButton').addEventListener('click', function() {
            addNewRow('itemRepairGeneratorTableBody', itemCountRepairGenerator, 'repairGenerator');
            });
        </script>
        <script>
            $(document).ready(function() {
                //FOR ADDING BRAND
                $('#addbrand').on('click', function(e) {
                    e.preventDefault();
                    const addbrandname = document.getElementById("addbrandName").value;
                    const addbrandtype = document.getElementById("addbrandtype").value;
                    const addbrandAmount = parseFloat(document.getElementById("addbrandAmount").value);

                    if(addbrandname == "" || addbrandtype == "" || addbrandAmount == ""){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Please Complete the Form",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else if(addbrandAmount < 0){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Amount cannot be less than 0",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else{
                        Swal.fire({
                            title: 'Confirmation',
                            html: "Are you sure to confirm?",
                            icon: 'warning',
                            confirmButtonText: 'Confirm',
                            showCancelButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user confirms, send AJAX request for Add product
                                var formData = new FormData();
                                formData.append('brand_save', true);
                                formData.append('name', addbrandname);
                                formData.append('amount', addbrandAmount);
                                formData.append('type', addbrandtype);
                                    
                                $.ajax({
                                    url: 'function.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data:formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        // Handle successful add
                                        Swal.fire({
                                            title: 'Brand Added!',
                                            text: 'You have successfully added the Brand.',
                                            icon: 'success',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'manageitems.php';
                                        });
                                    },
                                    error: function(response) {
                                        // Handle erro
                                        Swal.fire(
                                            'Error!',
                                            'There was an error Adding the brand. Please try again.',
                                            'error'
                                        );
                                    }
                                });
                            }
                        });
                    }
                });


                //FOR EDITING BRAND
                $('#editbrand').on('click', function(e) {
                    e.preventDefault();
                    const editbrandName = document.getElementById("editbrandName").value;
                    const brandId = document.getElementById("brandId").value;
                    const editbrandtype = document.getElementById("editbrandType").value;
                    const editbrandAmount = parseFloat(document.getElementById("editbrandAmount").value);
                    if(editbrandName == "" || editbrandtype == "" || editbrandAmount == ""){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Please Complete the Form",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else if(editbrandAmount < 0){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Amount cannot be less than 0",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else{
                        Swal.fire({
                            title: 'Confirmation',
                            html: "Are you sure to confirm?",
                            icon: 'warning',
                            confirmButtonText: 'Confirm',
                            showCancelButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user confirms, send AJAX request for Add product
                                var formData = new FormData();
                                formData.append('brand_edit', true);
                                formData.append('id', brandId);
                                formData.append('name', editbrandName);
                                formData.append('amount', editbrandAmount);
                                formData.append('type', editbrandtype);
                                    
                                $.ajax({
                                    url: 'function.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data:formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        // Handle successful add
                                        Swal.fire({
                                            title: 'Item Edited!',
                                            text: 'You have successfully edited the brand.',
                                            icon: 'success',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'manageitems.php';
                                        });
                                    },
                                    error: function(response) {
                                        // Handle erro
                                        Swal.fire(
                                            'Error!',
                                            'There was an error editing the brand. Please try again.',
                                            'error'
                                        );
                                    }
                                });
                            }
                        });
                    }
                });


                //FOR ADDING ITEMS
                $('#item_add').on('click', function(e) {
                    e.preventDefault();
                    const item_unit = document.getElementById("item_unit").value;
                    const item_description = document.getElementById("item_description").value;
                    const item_quantity = parseFloat(document.getElementById("item_quantity").value);
                    const item_amount = parseFloat(document.getElementById("item_amount").value);

                    if(item_unit == "" || item_description == "" || item_quantity == "" || item_amount == ""){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Please Complete the Form",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else if(item_amount < 0){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Amount cannot be less than 0",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else if(item_quantity < 0){
                        Swal.fire({
                            title: 'ERROR',
                            html: "quantity cannot be less than 0",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else{
                        Swal.fire({
                            title: 'Confirmation',
                            html: "Are you sure to confirm?",
                            icon: 'warning',
                            confirmButtonText: 'Confirm',
                            showCancelButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user confirms, send AJAX request for Add product
                                var formData = new FormData();
                                formData.append('serviceItem_save', true);
                                formData.append('service_unit', item_unit);
                                formData.append('service_quantity', item_quantity);
                                formData.append('service_description', item_description);
                                formData.append('service_amount', item_amount);
                                    
                                $.ajax({
                                    url: 'function.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data:formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        // Handle successful add
                                        Swal.fire({
                                            title: 'Item Added!',
                                            text: 'You have successfully added the item.',
                                            icon: 'success',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'manageitems.php';
                                        });
                                    },
                                    error: function(response) {
                                        // Handle erro
                                        Swal.fire(
                                            'Error!',
                                            'There was an error adding the item. Please try again.',
                                            'error'
                                        );
                                    }
                                });
                            }
                        });
                    }
                });

                //FOR EDITING ITEMS
                $('#item_edit').on('click', function(e) {
                    e.preventDefault();
                    const editItemId = document.getElementById("editItemId").value;
                    const item_edit_unit = document.getElementById("item_edit_unit").value;
                    const item_edit_description = document.getElementById("item_edit_description").value;
                    const item_edit_quantity = parseFloat(document.getElementById("item_edit_quantity").value);
                    const item_edit_amount = parseFloat(document.getElementById("item_edit_amount").value);
                    alert(editItemId);
                    alert(item_edit_unit);
                    alert(item_edit_description);
                    alert(item_edit_quantity);
                    alert(item_edit_amount);

                    if(item_edit_unit == "" || item_edit_description == "" || item_edit_quantity == "" || item_edit_amount == ""){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Please Complete the Form",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else if(item_edit_amount < 0){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Amount cannot be less than 0",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else if(item_edit_quantity < 0){
                        Swal.fire({
                            title: 'ERROR',
                            html: "quantity cannot be less than 0",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else{
                        Swal.fire({
                            title: 'Confirmation',
                            html: "Are you sure to confirm?",
                            icon: 'warning',
                            confirmButtonText: 'Confirm',
                            showCancelButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user confirms, send AJAX request for Add product
                                var formData = new FormData();
                                formData.append('serviceItem_edit', true);
                                formData.append('item_unit', item_edit_unit);
                                formData.append('item_id', editItemId);
                                formData.append('item_quantity', item_edit_quantity);
                                formData.append('item_description', item_edit_description);
                                formData.append('item_amount', item_edit_amount);
                                    
                                $.ajax({
                                    url: 'function.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data:formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        // Handle successful add
                                        Swal.fire({
                                            title: 'Item Edited!',
                                            text: 'You have successfully edited the item.',
                                            icon: 'success',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'manageitems.php';
                                        });
                                    },
                                    error: function(response) {
                                        // Handle erro
                                        Swal.fire(
                                            'Error!',
                                            'There was an error editing the item. Please try again.',
                                            'error'
                                        );
                                    }
                                });
                            }
                        });
                    }
                });
            });



            $('#markupbtn').on('click', function(e) {
                    e.preventDefault();
                    const markup_id  = document.getElementById("markup_id").value;
                    const markup_percentage = document.getElementById("markup_percentage").value;
                    if(markup_percentage == ""){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Please Complete the Form",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else if(markup_percentage < 0 || markup_percentage > 100){
                        Swal.fire({
                            title: 'ERROR',
                            html: "Amount cannot be less than 0 or greater than 100",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                    else{
                        Swal.fire({
                            title: 'Confirmation',
                            html: "Are you sure to confirm?",
                            icon: 'warning',
                            confirmButtonText: 'Confirm',
                            showCancelButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user confirms, send AJAX request for Add product
                                var formData = new FormData();
                                formData.append('save_markup', true);
                                formData.append('markup_id', markup_id);
                                formData.append('markup_percentage', markup_percentage);
                                    
                                $.ajax({
                                    url: 'function.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data:formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        // Handle successful add
                                        Swal.fire({
                                            title: 'Item Edited!',
                                            text: 'You have successfully edited the brand.',
                                            icon: 'success',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'manageitems.php';
                                        });
                                    },
                                    error: function(response) {
                                        // Handle erro
                                        Swal.fire(
                                            'Error!',
                                            'There was an error editing the brand. Please try again.',
                                            'error'
                                        );
                                    }
                                });
                            }
                        });
                    }
                });
        </script>
