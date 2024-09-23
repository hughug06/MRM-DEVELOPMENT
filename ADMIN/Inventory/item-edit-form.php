<?php 

require_once '../authetincation.php';
include_once '../../Database/database.php';
global $conn;
  $id="";
  $item_name="";
  $item_type="";
  $stocks = "";
  $error="";
  $success="";
  $min_price="";
  $max_price="";
  $power_output="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: inventory-control.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from products where ProductID=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: inventory-control.php");
      exit;
    }

    $item_name=$row["ProductName"];
    $Availability = $row["Availability"];
    $Image = $row["Image"];
    $Description = $row["Description"];
    $Specification = $row["Specification"];
    $stocks = $row["stock"];
    $max_price = $row["max_price"];
    $min_price = $row["min_price"];
    $power_output = $row["ProductType"] == 'Solar Panel'? $row["Watts_KVA"].'W':$row["Watts_KVA"].'KVA';
    $item_type = $row["ProductType"];

  }
  else{
    header("location: inventory-control.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('../../partials/head.php') ?>
    <title> Account Control </title>
    <!-- Favicon -->
    <link rel="icon" href="../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">

</head>

<body>

    <div class="page">
         <!-- app-header -->
         <?php include_once('../../partials/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('../../partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row row-sm">
                    <div class="col-xl-12 p-3">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">Edit Item</div>
                                <a href="inventory-control.php" class="btn btn-close p-0"></a>
                            </div>
                            <div class="card-body">
                                <form  method="POST" action="item-edit-form.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 mb-3">
                                            <input type="hidden" id="id" value="<?php echo $id; ?>" class="form-control">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" class="form-control" placeholder="Full Name"
                                                aria-label="Full Name" required value="<?= $item_name?>" disabled>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Type</label>
                                            <select class="form-select py-2" disabled>
                                                <option <?= $item_type == "Generator"? 'selected value="Generator"':'value="Generator"'?>>Generator</option>
                                                <option <?= $item_type == "Solar Panel"? 'selected value="Solar Panel"':'value="Solar Panel"'?>>Solar Panel</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Power Output (Watts/KVA)</label>
                                            <select class="form-select py-2" disabled> 
                                                <option><?= $power_output ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Stocks</label>
                                            <input type="number" value="<?= $stocks ?>" class="form-control py-2" id="stocks">
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Minimum Price</label>
                                            <input type="number" value="<?= $min_price ?>" id="min_price" class="form-control py-2">
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Maximum Price</label>
                                            <input type="number" value="<?= $max_price ?>" class="form-control py-2" id="max_price">
                                        </div>
                                        <div class="col-xl-12  mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea id="Description" class="col-xl-12 col-md-12 col-12" rows="6"><?= $Description?></textarea>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Specification</label>
                                            <textarea id="Specification" class="col-xl-12 col-md-12 col-12" rows="6"><?= $Specification?></textarea>                            
                                        </div>
                                        <div class="col-xl-12 mb-3 d-flex gap-2 justify-content-end">
                                            <input id="availability" type="checkbox" <?= $Availability == true ? 'checked' : ''?>>
                                            <label for="availability">Availability</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="file" id="image">
                                        </div>
                                        <div class="col-xl-12 d-flex justify-content-end">
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
        <?php include_once('../../partials/footer.php') ?>
        <!-- Footer End -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#save').on('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var item_id = document.getElementById("id");
                var specification_ID = document.getElementById("Specification");
                var description_ID = document.getElementById("Description");
                var availability_ID = document.getElementById("availability");
                var stocks = document.getElementById("stocks");
                var min_price = document.getElementById("min_price");
                var max_price = document.getElementById("max_price");

                var item_id_value = item_id.value;
                var stocks_value = stocks.value;
                var min_price_value = min_price.value;
                var max_price_value = max_price.value;
                var specification_ID_value = specification_ID.value;
                var description_ID_value = description_ID.value;
                var availability_ID_value = availability_ID.value;
                var image = document.getElementById("image").files[0];

                if(stocks_value == "" || min_price_value == "" || max_price_value == ""){
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
                else if(min_price_value <= 0){
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
                        html: "Please Confirm the details of the Product!<br>Stocks: "+stocks_value+"<br>Minimum Price: "+min_price_value+"<br>Maximum Price: "+max_price_value,
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, send AJAX request for Add product
                            var formData = new FormData();
                            formData.append('save', true);
                            formData.append('id', item_id_value);
                            formData.append('stocks', stocks_value);
                            formData.append('min_price', min_price_value);
                            formData.append('max_price', max_price_value);
                            formData.append('Specification', specification_ID_value);
                            formData.append('Description', description_ID_value);
                            formData.append('Availability', availability_ID_value);
                            if (image) {
                                formData.append('image', image);
                            } // Add the file to FormData
                            
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
                                        window.location.href = 'inventory-control.php';
                                    });
                                },
                                error: function(response) {
                                    // Handle error
                                    Swal.fire(
                                        'Error!',
                                        'There was an error Editing product. Please try again.',
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
    <script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../../assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../../assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    
    <!-- Custom-Switcher JS -->
    <script src="../../assets/js/custom-switcher.min.js"></script>

    <!-- Prism JS -->
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>
    

</body>

</html>