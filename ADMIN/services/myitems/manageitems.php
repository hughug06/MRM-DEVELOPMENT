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
                                   
                                    <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addItemModal">
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
                                                    <a href="item-edit-form.php?id=<?= $resultItem['pricingid']?>" class="btn btn-sm btn-info"><i class="fe fe-edit-2"></i></a>
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
                    <div class="row row-sm mt-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                            <div class="card custom-card">
                                <div class="card-header border-bottom-0 d-block">                            
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="main-content-label mb-0">WATTS </label>
                                   <!-- Add Item Button -->
                                   <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addItemModal">
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
                                                    <th class="wd-lg-20p"><span>name</span></th>
                                                    <th class="wd-lg-20p"><span>type</span></th>
                                                    <th class="wd-lg-20p"><span>amount</span></th>
                                                    <th class="wd-lg-20p"><span>created_at</span></th>
                                                    <th class="wd-lg-20p"><span>Action</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                require '../../../Database/database.php';                                          
                                                $select = "Select * from watts";
                                                $result = mysqli_query($conn , $select);
                                                if(mysqli_num_rows($result) > 0){
                                                    foreach($result as $resultItem){
                                                ?> 
                                                 <tr>
                                                    <td><?= $resultItem['watts_id']?></td>  
                                                    <td><?= $resultItem['name']?></td>     
                                                    <td class="<?= $resultItem['type'] === 'solar' ? 'text-warning' : ($resultItem['type'] === 'generator' ? 'text-info' : '') ?>">
                                                        <?= $resultItem['type'] ?>
                                                    </td>

                                                    <td><?= $resultItem['amount']?></td>                                       
                                                    <td><?= $resultItem['created_at']?></td>                       
                                                    <td>                                                 
                                                   <!-- Edit Item Button for watts -->
                                                   <button 
                                                   type="button" 
                                                   class="btn btn-sm btn-info" 
                                                   data-bs-toggle="modal" 
                                                   data-bs-target="#editWattsModal"
                                                   data-account-id="<?= $resultItem['watts_id'] ?>" 
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
                                                        <td class="<?= $resultItem['type'] === 'solar' ? 'text-warning' : ($resultItem['type'] === 'generator' ? 'text-info' : '') ?>">
                                                            <?= $resultItem['type'] ?>
                                                        </td>
                                                        <td><?= $resultItem['amount']?></td>                                       
                                                        <td><?= $resultItem['created_at']?></td>                       
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editBrandModal" data-account-id="<?= $resultItem['brand_id'] ?>" data-name="<?= $resultItem['name'] ?>" data-type="<?= $resultItem['type'] ?>" data-amount="<?= $resultItem['amount'] ?>">
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

                             <!-- Modal FOR ADD ITEM WATTS -->
            <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addItemModalLabel">Add Watts</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addItemForm" method="POST" action="function.php">
                                <div class="mb-3">
                                    <label for="wattsName" class="form-label">Watts Name</label>
                                    <input type="text" class="form-control" id="wattsName" name="watts_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="brand" class="form-label">Type</label>
                                    <input type="text" class="form-control" id="brand" name="type" required>
                                </div>
                                <div class="mb-3">
                                    <label for="wattsAmount" class="form-label">Amount</label>
                                    <input type="number" class="form-control" id="wattsAmount" name="watts_amount" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="watts_save">Save Item</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal FOR EDIT WATTS -->
            <div class="modal fade" id="editWattsModal" tabindex="-1" aria-labelledby="editWattsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editWattsModalLabel">Edit Watts</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="function.php" method="POST">
                                <input type="hiddent" id="wattsIdInput" name="watts_id">
                                <div class="mb-3">
                                    <label for="wattsInput" class="form-label">Enter Name</label>
                                    <input type="text" class="form-control" id="nameInput" placeholder="Enter new watt value" name="name">
                                    <label for="wattsInput" class="form-label">Amount</label>
                                    <input type="text" class="form-control" id="amountInput" placeholder="Enter amount value" name="amount">
                                    <label for="wattsInput" class="form-label">Type</label>
                                    <input type="text" class="form-control" id="typeInput" placeholder="Enter type value" name="type">
                                    <button type="submit" class="btn btn-primary" name="watts_edit">Save Changes</button>
                                </div>
                            </form>
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
    document.addEventListener('DOMContentLoaded', function() {
        var editWattsModal = document.getElementById('editWattsModal');

        editWattsModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract info from data-account-id attribute
            var wattsId = button.getAttribute('data-account-id');
            var name = button.getAttribute('data-name');
            var type = button.getAttribute('data-type');
            var amount = button.getAttribute('data-amount');


            // Update the modal's hidden input with the wattsId
            var wattsIdInput = document.getElementById('wattsIdInput');
            var nameInput = document.getElementById('nameInput');
            var typeInput = document.getElementById('typeInput');
            var amountInput = document.getElementById('amountInput');
            wattsIdInput.value = wattsId;
            nameInput.value = name;
            typeInput.value = type;
            amountInput.value = amount;
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

</script>
