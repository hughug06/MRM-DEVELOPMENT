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
                    <div class="row row-sm mt-3">
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
                                                    <th class="wd-lg-20p"><span>Amount</span></th>
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
                    <!-- PACKAGE FOR INSTALLATION SOLAR -->
                    <div class="row row-sm mt-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                            <div class="card custom-card">
                                <div class="card-header border-bottom-0 d-block">                            
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="main-content-label mb-0">PACKAGE FOR INSTALLATION(SOLAR) </label>
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
                    </div>
                    <!-- PACKAGE INSTALLATION FOR GENERATOR -->
                    <div class="row row-sm mt-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
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
                    </div>

                   <!-- PACKAGE FOR TUNE-UP (GENERATOR) -->
                            <div class="row row-sm mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
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

                            <!-- PACKAGE FOR MAINTENANCE (SOLAR) -->
                                    <div class="row row-sm mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
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
                                    </div>


                                    <!-- PACKAGE FOR MAINTENANCE (GENERATOR) -->
                                    <div class="row row-sm mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
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
                                    </div>

                     <!-- PACKAGE FOR REPAIR (SOLAR) -->
                        <div class="row row-sm mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
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


                       <!-- PACKAGE FOR REPAIR (GENERATOR) -->
                        <div class="row row-sm mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
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
                        </div>

                        <!-- BRANDS -->
                        <div class="row row-sm mt-3">
                            <div class="row row-sm mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
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
                                <form action="function.php" method="post">
                                    <!-- Name field -->
                                    <div class="mb-3">
                                        <label for="brandName" class="form-label">Brand Name</label>
                                        <input type="text" class="form-control" id="brandName" name="name" required>
                                    </div>
                                   <!-- Type field -->
                                    <div class="mb-3">
                                        <label for="typeSelect" class="form-label">Type</label>
                                        <select class="form-select" id="typeSelect" name="type" required>
                                            <option value="">-- Select Type --</option>
                                            <option value="Solar">Solar</option>
                                            <option value="Generator">Generator</option>
                                        </select>
                                    </div>


                                    <!-- Amount field -->
                                    <div class="mb-3">
                                        <label for="brandAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="brandAmount" name="amount" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="brand_save">Add Brand</button>
                                    </div>
                                </form>
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
                                <form id="editBrandForm" method="post" action="edit_brand.php">
                                    <input type="hidden" id="brandId" name="brand_id">
                                    
                                    <div class="mb-3">
                                        <label for="brandName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="brandName" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="brandType" class="form-label">Type</label>
                                        <select class="form-select" id="brandType" name="type" required>
                                            <option value="Solar">Solar</option>
                                            <option value="Generator">Generator</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="brandAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="brandAmount" name="amount" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
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
                                <form action="function.php" method="post">
                                    <!-- Unit selection dropdown -->
                                    <div class="mb-3">
                                        <label for="serviceUnit" class="form-label">Unit</label>
                                        <select class="form-control" id="serviceUnit" name="service_unit" required>
                                            <option value="">Select unit</option>
                                            <option value="items">Items</option>
                                            <option value="set">Set</option>
                                            <option value="job">Job</option>
                                            <option value="lot">Lot</option>
                                        </select>
                                    </div>

                                    <!-- Description field -->
                                    <div class="mb-3">
                                        <label for="serviceDescription" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="serviceDescription" name="service_description" required>
                                    </div>

                                    <!-- Quantity field -->
                                    <div class="mb-3">
                                        <label for="serviceQuantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="serviceQuantity" name="service_quantity" required>
                                    </div>

                                    <!-- Amount field -->
                                    <div class="mb-3">
                                        <label for="serviceAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="serviceAmount" name="service_amount" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="serviceItem_save">Add Service Item</button>
                                    </div>
                                </form>
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
                                        <form action="function.php" method="post">
                                            <!-- Hidden input for item ID -->
                                            <input type="hidden" id="editItemId" name="item_id">

                                             <!-- Unit field as a select input -->
                                                <div class="mb-3">
                                                    <label for="editItemUnit" class="form-label">Unit</label>
                                                    <select class="form-select" id="editItemUnit" name="item_unit" required>
                                                        <option value="items">Items</option>
                                                        <option value="set">Set</option>
                                                        <option value="job">Job</option>
                                                        <option value="lot">Lot</option>
                                                    </select>
                                                </div>

                                            <!-- Description field -->
                                            <div class="mb-3">
                                                <label for="editItemDescription" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="editItemDescription" name="item_description" required>
                                            </div>

                                            <!-- Quantity field -->
                                            <div class="mb-3">
                                                <label for="editItemQuantity" class="form-label">Quantity</label>
                                                <input type="number" class="form-control" id="editItemQuantity" name="item_quantity" required>
                                            </div>

                                            <!-- Amount field -->
                                            <div class="mb-3">
                                                <label for="editItemAmount" class="form-label">Amount</label>
                                                <input type="number" class="form-control" id="editItemAmount" name="item_amount" required>
                                            </div>

                                            <div class="modal-footer">  
                                                <button type="submit" class="btn btn-primary" name="serviceItem_edit">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>




                             <!-- Modal FOR ADD ITEM FOR SET PACKAGE FOR SOLAR  -->
                             <div class="container-fluid">
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
                                                        <form action="function.php" method="POST">        
                                                             
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
                                                            <button type="add" class="btn btn-success mt-3" name="installation_save">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal FOR ADD SET PACKAGE FOR GENERATOR -->
                             <div class="container-fluid">
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
                                                        <form action="function.php" method="POST">        
                                                             
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
                                                            <button type="add" class="btn btn-success mt-3" name="generator_save">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            

            


                <!-- Modal for Installation (Solar) -->
<div class="modal fade" id="installationPackageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="installationPackageModalLabel" aria-hidden="true">
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
                                    <!-- Rows will be added here dynamically -->
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
</div>

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
                                <tbody id="itemTableBodyTuneup">
                                    <!-- Rows will be added here dynamically -->
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
                                <tbody id="itemMaintenanceSolarTableBody">
                                    <!-- Rows will be added here dynamically -->
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

        <!-- Prism JS -->
        <script src="../../../assets/libs/prismjs/prism.js"></script>
        <script src="../../../assets/js/prism-custom.js"></script>

        <!-- Custom JS -->
        <script src="../../../assets/js/custom.js"></script>
        
    </body>

</html>
                                                        
<script>

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
                var modalItemUnitInput = editItemModal.querySelector('#editItemUnit');
                var modalItemDescriptionInput = editItemModal.querySelector('#editItemDescription');
                var modalItemNQuantityInput = editItemModal.querySelector('#editItemQuantity');
                var modalItemAmountInput = editItemModal.querySelector('#editItemAmount');

                modalItemIdInput.value = itemId;
                modalItemUnitInput.value = itemUnit;
                modalItemDescriptionInput.value = itemDescription;
                modalItemNQuantityInput.value = itemQuantity;
                modalItemAmountInput.value = itemAmount;
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
            var modalNameInput = editBrandModal.querySelector('#brandName');
            var modalTypeInput = editBrandModal.querySelector('#brandType');
            var modalAmountInput = editBrandModal.querySelector('#brandAmount');

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

