<?php 


include_once '../../Database/database.php';
global $conn;
  $ProductTypeID="";
  $ProductType="";
  $WattsKVA = "";
  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: marketing-product-control.php");
      exit;
    }
    $ProductTypeID = $_GET['id'];
    $sql = "select * from product_type where ProductTypeID=$ProductTypeID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: marketing-product-control.php");
      exit;
    }

    $ProductType=$row["ProductType"];
    $WattsKVA=$row["Watts_KVA"];

  }
  elseif(isset($_POST['save'])){

        $ProductTypeID = $_POST["ProductTypeID"];
        $ProductType=$_POST['ProductType'];
        $WattsKVA = $_POST['WattsKVA'];
        
        $sql = "update product_type set ProductType='$ProductType' , Watts_KVA= '$WattsKVA' where ProductTypeID='$ProductTypeID'";
        $result = mysqli_query($conn , $sql);
        header("location: marketing-product-control.php");
        exit();
    
  }
  else{
    header("location: marketing-product-control.php");
        exit();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('../../USER/partials/head.php') ?>
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
         <?php include_once('../../USER/partials/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('../../USER/partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row row-sm d-flex justify-content-center mt-5">
                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">Edit Watts/KVA</div>
                                <a href="marketing-product-control.php" class="btn btn-close p-0"></a>
                            </div>
                            <div class="card-body">
                                <form  method="POST" action="watts_KVA-edit-form.php">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="hidden" name="ProductTypeID" value="<?php echo $ProductTypeID; ?>" class="form-control">
                                            <label class="form-label">Watts/KVA</label>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <input type="number" class="form-control" placeholder="Username"
                                            aria-label="Username" name="WattsKVA" required value="<?= $WattsKVA?>">
                                        </div>
                                        <div class="col-xl-12 mb-5">
                                        <label class="form-label">Product Type</label>
                                            <select id="inputState1" class="form-select" name="ProductType" required>
                                                <option value="Solar Panel" <?= $ProductType == 'Solar Panel'? 'selected' : ''?>>Solar Panel</option>
                                                <option value="Generator" <?= $ProductType == 'Generator' ? 'selected' : ''?>>Generator</option>
                                            </select>
                                        </div>                                                                
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button name="save" type="submit" class="btn btn-primary">Save</button>
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
        <?php include_once('../../USER/partials/footer.php') ?>
        <!-- Footer End -->
    </div>

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