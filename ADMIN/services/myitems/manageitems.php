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

                    <!-- Running_hours Section -->
                        <div class="row row-sm mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                                <div class="card custom-card">
                                    <div class="card-header border-bottom-0 d-block">                            
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="main-content-label mb-0">Running Hours</label>
                                            <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addRunningHoursModal">
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
                                                        <th class="wd-lg-20p"><span>created_at</span></th>
                                                        <th class="wd-lg-20p"><span>Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $select = "Select * from running_hours";
                                                    $result = mysqli_query($conn , $select);
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                    ?> 
                                                    <tr>
                                                        <td><?= $resultItem['running_id']?></td>  
                                                        <td><?= $resultItem['name']?></td>     
                                                        <td><?= $resultItem['amount']?></td>                                       
                                                        <td><?= $resultItem['created_at']?></td>                       
                                                        <td>
                                                            <button
                                                             type="button" 
                                                             lass="btn btn-sm btn-info" 
                                                             data-bs-toggle="modal" 
                                                             data-bs-target="#editRunningHoursModal" 
                                                             data-running-id="<?= $resultItem['running_id'] ?>"
                                                             data-name="<?= $resultItem['name'] ?>"          
                                                             data-amount="<?= $resultItem['amount'] ?>">
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

                        <!-- Brands Section -->
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

                        <!-- Location Section -->
                        <div class="row row-sm mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                                <div class="card custom-card">
                                    <div class="card-header border-bottom-0 d-block">                            
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="main-content-label mb-0">LOCATION</label>
                                            <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addLocationModal">
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
                                                        <th class="wd-lg-20p"><span>created_at</span></th>
                                                        <th class="wd-lg-20p"><span>Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $select = "Select * from location";
                                                    $result = mysqli_query($conn , $select);
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                    ?> 
                                                    <tr>
                                                        <td><?= $resultItem['location_id']?></td>  
                                                        <td><?= $resultItem['name']?></td>     
                                                        <td class="<?= $resultItem['type'] === 'solar' ? 'text-warning' : ($resultItem['type'] === 'generator' ? 'text-info' : '') ?>">
                                                            <?= $resultItem['type'] ?>
                                                        </td>
                                                        <td><?= $resultItem['amount']?></td>                                       
                                                        <td><?= $resultItem['created_at']?></td>                       
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editLocationModal" data-account-id="<?= $resultItem['location_id'] ?>" data-name="<?= $resultItem['name'] ?>" data-type="<?= $resultItem['type'] ?>" data-amount="<?= $resultItem['amount'] ?>">
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

                   <!-- Edit SOLAR Modal -->
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




                             <!-- Modal FOR ADD ITEM SOLAR -->
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

                                <!-- Modal FOR ADD GENERATOR -->
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

            

            <!-- Add running_hours Modal -->
                <div class="modal fade" id="addRunningHoursModal" tabindex="-1" aria-labelledby="addRunningHoursModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="function.php" method="post">
                                 
                                    <!-- Name field -->
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Product Name</label>
                                        <input type="text" class="form-control"  name="name" required>
                                    </div>

                                    <!-- Amount field -->
                                    <div class="mb-3">
                                        <label for="productAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control"  name="amount" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="running_save">Add Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit running_hours Modal -->
                <div class="modal fade" id="editRunningHoursModal" tabindex="-1" aria-labelledby="editRunningHoursModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductModalLabel">Edit running hours</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="function.php" method="post">
                                    <!-- Hidden ID field -->
                                    <input type="hidden" id="running_id" name="id">

                                    <!-- Name field -->
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Hours(ex. 0 - 100 hrs )</label>
                                        <input type="text" class="form-control" id="Name" name="name" required>
                                    </div>

                                    <!-- Amount field -->
                                    <div class="mb-3">  
                                        <label for="productAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="Amount" name="amount" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="running_edit">Update</button>
                                    </div>
                                </form>
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
    // Select the modal element
    var editProductModal = document.getElementById('editRunningHoursModal');

    // Add event listener for when the modal is about to be shown
    editProductModal.addEventListener('show.bs.modal', function (event) {
        // Get the button that triggered the modal
        var button = event.relatedTarget;

        // Extract data attributes from the button
        var running_id = button.getAttribute('data-running-id');
        var Name = button.getAttribute('data-name');
        var Amount = button.getAttribute('data-amount');

        // Populate the modal's form fields with the extracted data
        var modalIdInput = editProductModal.querySelector('#running_id');
        var modalNameInput = editProductModal.querySelector('#Name');
        var modalAmountInput = editProductModal.querySelector('#Amount');

        modalIdInput.value = running_id;
        modalNameInput.value = Name;
        modalAmountInput.value = Amount;
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

