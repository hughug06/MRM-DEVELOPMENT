<?php 

require_once '../../authetincation.php';
include_once '../../../Database/database.php';
global $conn;
  $id="";
  $unit="";
  $quantity = "";
  $description = "";
  $error="";
  $success="";
  $amount="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: manageitems.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from service_pricing where pricingid=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: manageitems.php");
      exit;
    }

    $unit=$row["unit"];
    $description = $row["description"];
    $quantity = $row["quantity"];
    $amount = $row["amount"];

  }
  else{
    header("location: manageitems.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('../../../partials/head.php') ?>
    <title> Account Control </title>
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

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../../assets/libs/prismjs/themes/prism-coy.min.css">

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
                <div class="row row-sm">
                    <div class="col-xl-12 p-3">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">Edit Item</div>
                                <a href="manageitems.php" class="btn btn-close p-0"></a>
                            </div>
                            <div class="card-body">
                            <form action="function.php" method="POST">
                                    <div class="row">
                                    <div class="col-xl-12 mb-3">
                                            <label class="form-label">Unit</label>
                                            <input type="hidden" id="id" value="<?php echo $id; ?>" class="form-control">
                                            <select id="unit" class="form-select py-2" required>
                                                <option value="">Select Unit</option>
                                                <option <?= $unit == "items"? 'selected value="items"':'value="items"'?>>items</option>
                                                <option <?= $unit == "set"? 'selected value="set"':'value="set"'?>>Set</option>
                                                <option <?= $unit == "job"? 'selected value="job"':'value="job"'?>>Job</option>
                                                <option <?= $unit == "lot"? 'selected value="lot"':'value="lot"'?>>Lot</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea id="Description" rows="6" class="col-xl-12 col-md-12 col-12"><?= $description ?></textarea>                              
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Quantity</label>
                                            <input type="number" class="form-control py-2"  value="<?= $quantity ?>" id="quantity">
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Amount</label>
                                            <input type="number" id="amount" class="form-control py-2"  value="<?= $amount ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <button id="save" type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                   
                </div> 
            </div>
        </div>
        <!-- End::app-content -->
        
        <!-- Footer Start -->
        <?php include_once('../../../partials/footer.php') ?>
        <!-- Footer End -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#save').on('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var pricingid = document.getElementById("id");
                var unit = document.getElementById("unit")
                var description = document.getElementById("Description");
                var quantity = document.getElementById("quantity");
                var amount = document.getElementById("amount");

                var pricingid_value = pricingid.value;
                var quantity_value = parseInt(quantity.value);
                var amount_value = parseInt(amount.value);
                var description_value = description.value;
                var unit_value = unit.value;

                if(unit_value == "" || description_value == ""  || quantity_value == "" || amount_value == ""){
                    Swal.fire({
                        title: 'ERROR',
                        html: "There seems to be missing information. Please complete the form",
                        icon: 'warning',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                }
                else if(amount_value <= 0){
                    Swal.fire({
                        title: 'ERROR',
                        html: "Minimum Price cannot be less than 0.",
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
                        html: "Please Confirm the details of the Product!<br>Unit: "+unit_value+"<br>Amount: "+amount_value+"<br>Quantity: "+quantity_value,
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, send AJAX request for Add product
                            var formData = new FormData();
                            formData.append('save', true);
                            formData.append('id', pricingid_value);
                            formData.append('unit', unit_value);
                            formData.append('quantity', quantity_value);
                            formData.append('amount', amount_value);
                            formData.append('description', description_value);
                            
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
                                        title: 'Product Edited!',
                                        text: 'You have successfully edited the product.',
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
                                        'There was an error editing product. Please try again.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>

    
    <!-- Scroll To Top -->
    <!-- Scroll To Top -->

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