<?php 

require_once '../authetincation.php';
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

               
                <form  method="POST" action="watts_KVA-edit-form.php">
                    <div class="row row-sm">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Edit Watts/KVA
                                    </div>
                                    <div class="prism-toggle">
                                       <a href="marketing-product-control.php"> <button class="btn btn-sm btn-primary-light">BACK<i class="ri-eye-line ms-2 d-inline-block align-middle fs-14"></i></button></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="hidden" name="ProductTypeID" value="<?php echo $ProductTypeID; ?>" class="form-control"> <br>
                                            <label class="form-label">Watts/KVA</label>
                                            <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <input type="number" class="form-control" placeholder="Username"
                                                    aria-label="Username" name="WattsKVA" required value="<?= $WattsKVA?>">
                                                </div>
                                                
                                                
                                                <div class="col-xxl-6 col-xl-12 mb-3">
                                                <label class="form-label">Product Type</label>
                                                    <select id="inputState1" class="form-select" name="ProductType" required>
                                                        <option value="Solar Panel" <?= $ProductType == 'Solar Panel'? 'selected' : ''?>>Solar Panel</option>
                                                        <option value="Generator" <?= $ProductType == 'Generator' ? 'selected' : ''?>>Generator</option>
                                                    </select>
                                                </div>                                                                
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button name="save" type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="row"&gt;
    &lt;div class="col-md-6 mb-3"&gt;
        &lt;label class="form-label"&gt;First Name&lt;/label&gt;
        &lt;input type="text" class="form-control" placeholder="First name"
            aria-label="First name"&gt;
    &lt;/div&gt;
    &lt;div class="col-md-6 mb-3"&gt;
        &lt;label class="form-label"&gt;Last Name&lt;/label&gt;
        &lt;input type="text" class="form-control" placeholder="Last name"
            aria-label="Last name"&gt;
    &lt;/div&gt;
    &lt;div class="col-md-6 mb-3"&gt;
        &lt;label class="form-label"&gt;Address&lt;/label&gt;
        &lt;div class="row"&gt;
            &lt;div class="col-xl-12 mb-3"&gt;
                &lt;input type="text" class="form-control" placeholder="Street"
                aria-label="Street"&gt;
            &lt;/div&gt;
            &lt;div class="col-xl-12 mb-3"&gt;
                &lt;input type="text" class="form-control" placeholder="Landmark"
                aria-label="Landmark"&gt;
            &lt;/div&gt;
            &lt;div class="col-xl-6 mb-3"&gt;
                &lt;input type="text" class="form-control" placeholder="City"
                aria-label="City"&gt;
            &lt;/div&gt;
            &lt;div class="col-xl-6 mb-3"&gt;
                &lt;select id="inputState1" class="form-select"&gt;
                    &lt;option selected&gt;State/Province&lt;/option&gt;
                    &lt;option&gt;...&lt;/option&gt;
                &lt;/select&gt;
            &lt;/div&gt;
            &lt;div class="col-xl-6 mb-3"&gt;
                &lt;input type="text" class="form-control" placeholder="Postal/Zip code"
                aria-label="Postal/Zip code"&gt;
            &lt;/div&gt;
            &lt;div class="col-xl-6 mb-3"&gt;
                &lt;select id="inputCountry" class="form-select"&gt;
                    &lt;option selected&gt;Country&lt;/option&gt;
                    &lt;option&gt;...&lt;/option&gt;
                &lt;/select&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="col-md-6 mb-3"&gt;
        &lt;div class="row"&gt;
            &lt;div class="col-xl-12 mb-3"&gt;
                &lt;label class="form-label"&gt;Email&lt;/label&gt;
                &lt;input type="email" class="form-control" placeholder="Email"
                aria-label="email"&gt;
            &lt;/div&gt;
            &lt;div class="col-xl-12 mb-3"&gt;
                &lt;label class="form-label"&gt;D.O.B&lt;/label&gt;
                &lt;input type="date" class="form-control"
                aria-label="dateofbirth"&gt;
            &lt;/div&gt;
            &lt;div class="col-xl-12 mb-3"&gt;
                &lt;div class="row"&gt;
                    &lt;label class="form-label mb-1"&gt;Maritial Status&lt;/label&gt;
                    &lt;div class="col-xl-6"&gt;
                        &lt;div class="form-check"&gt;
                            &lt;input class="form-check-input" type="checkbox" value="" id="status-married" required=""&gt;
                            &lt;label class="form-check-label" for="status-married"&gt;
                                Married
                            &lt;/label&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class="col-xl-6"&gt;
                        &lt;div class="form-check"&gt;
                            &lt;input class="form-check-input" type="checkbox" value="" id="status-unmarried" required=""&gt;
                            &lt;label class="form-check-label" for="status-unmarried"&gt;
                                Single
                            &lt;/label&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class="col-xl-12"&gt;

            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="col-md-6 mb-3"&gt;
        &lt;label class="form-label"&gt;Contact Number&lt;/label&gt;
        &lt;input type="number" class="form-control" placeholder="Phone number"
            aria-label="Phone number"&gt;
    &lt;/div&gt;
    &lt;div class="col-md-6 mb-3"&gt;
        &lt;label class="form-label"&gt;Alternative Contact&lt;/label&gt;
        &lt;input type="number" class="form-control" placeholder="Phone number"
            aria-label="Phone number"&gt;
    &lt;/div&gt;
    &lt;div class="col-md-12"&gt;
        &lt;div class="form-check mb-3"&gt;
            &lt;input class="form-check-input" type="checkbox" id="gridCheck"&gt;
            &lt;label class="form-check-label" for="gridCheck"&gt;
                Check me out
            &lt;/label&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="col-md-12"&gt;
        &lt;button type="submit" class="btn btn-primary"&gt;Sign in&lt;/button&gt;
    &lt;/div&gt;
&lt;/div&gt; </code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                       </div>                   
                    </div>

                </form>

            </div>
        </div>
        <!-- End::app-content -->

        
        <!-- Footer Start -->
        <?php include_once('../../USER/partials/footer.php') ?>
        <!-- Footer End -->
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
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