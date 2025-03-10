<?php
    require_once '../../ADMIN/authetincation.php';
    require_once '../../Database/database.php';
    $wattsID="";
    $selectedWatts = "";
        if(isset($_GET['watts'])){
            $wattsID = $_GET['watts'];
            if($wattsID == "All"){
                header("location: generator.php");
                exit; 
            }
            else{
                $selectedWatts = $wattsID;
                $sql = "SELECT * FROM products Where Availability=1 and Watts_KVA = $selectedWatts and ProductType = 'Generator'";
                $all_products_available = $conn->query($sql);

            }
        }
        else{
            $sql = "SELECT * FROM products Where Availability=1 and ProductType = 'Generator'";
            $all_products_available = $conn->query($sql);
        }
      
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once(__DIR__. '/../../partials/head.php')?>
    <title> Products Overview </title>
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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6744c1904304e3196ae86e53/1idi987he';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    

    <div class="page">
         <!-- app-header -->
         <?php include_once(__DIR__. '/../../partials/header.php')?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once(__DIR__. '/../../partials/sidebar.php')?>

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- Page Header -->

                

                <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                  <div>
                      <h2 class="main-content-title fs-24 mb-1">Products</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">overview</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Products</li>
                      </ol>
                  </div>

                </div>

                <!-- Page Header Close -->

                <!-- Start::row-1 -->
                <div class="row row-sm">
                    <div class="col-md-8 col-lg-9">
                        <div class="row row-sm">
                        <!-- Show Available products -->
                        <?php
                        while($row = mysqli_fetch_assoc($all_products_available)){
                            $id=$row['ProductID']
                        ?>

                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="user-generator-details.php?id=<?= $row['ProductID'];  ?>" class="image">
                                                    <img class="pic-1" alt="" src="<?php echo $row['Image']== true? '../../assets/images/'.$row['Image']:"../../assets/images/Product-Images/No-Image-Avail.png" ?>">
                                                </a>
                                                <div class="product-link">
                                                    <a href="user-generator-details.php?id=<?= $row['ProductID'];  ?>">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="user-generator-details.php?id=<?= $row['ProductID'];  ?>"><?php echo $row["ProductName"] ?></a></h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
                        }
                        ?>

                        </div>



                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="user-solar-panel.php">1</a></li>
                                <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="row row-sm">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <span class="">
                                                <button class="btn ripple btn-primary" type="button">Search</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-md-12 col-lg-12">
                                <div class="card custom-card">
                                    <div class="card-header custom-card-header">
                                        <h6 class="main-content-label mb-3">Categories</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">KVA</label>
                                            <select name="beast" id="Category" class="form-control" data-trigger>
                                            <option selected value="All">All</option>
                                            <?php 
                                                require '../../Database/database.php';
                                                $select = "SELECT Watts_KVA FROM products WHERE ProductType='Generator'";
                                                $result = mysqli_query($conn, $select);

                                                if (mysqli_num_rows($result) > 0) {
                                                    $KVAList = []; // Array to keep track of already displayed Watts_KVA values
                                                    
                                                    foreach ($result as $resultItem) {
                                                        // Check if the Watts_KVA value is already in the array
                                                        if (!in_array($resultItem['Watts_KVA'], $KVAList)) {
                                                            // Add the current Watts_KVA value to the array to avoid duplicates
                                                            $KVAList[] = $resultItem['Watts_KVA'];
                                                            
                                                            ?>
                                                            <option <?= $resultItem['Watts_KVA'] == $selectedWatts ? "selected value=".$resultItem['Watts_KVA']  : "value=".$resultItem['Watts_KVA']  ?>>
                                                                <?= $resultItem['Watts_KVA'] == $selectedWatts ? $resultItem['Watts_KVA']."KVA - Selected" : $resultItem['Watts_KVA']."KVA" ?>
                                                            </option>
                                                            <?php 
                                                        }
                                                    }
                                                } else {
                                                    // Handle case when there are no results
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        
                                        <div class="d-grid">
                                            <a class="btn ripple btn-primary btn-block" href="javascript:void(0);">Apply Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->
                
            </div>
        </div>
        <!-- End::app-content -->

        
        <!-- Footer Start -->
        <?php  include_once(__DIR__. '/../../partials/footer.php')?>
        <!-- Footer End -->
       
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <script>
        document.getElementById('Category').addEventListener('change', function() {
            var selectedValue = this.value;
            if (selectedValue) {
                // Redirect to the same page with the selected value as a query parameter
                window.location.href = "generator.php?watts=" + selectedValue;
            }
        });
    </script>

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