<?php 

require_once '../authetincation.php';
include_once '../../Database/database.php';
global $conn;
  $id="";
  $ProductName="";
  $ProductTypeID="";
  $Availability = "";
  $Image = "";
  $error="";
  $success="";
  $Description="";
  $Specification="";
  $ProductType="";
  $Watts_KVA="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: marketing-product-control.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from products INNER JOIN product_type on products.ProductTypeID = product_type.ProductTypeID where ProductID=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: marketing-product-control.php");
      exit;
    }

    $ProductName=$row["ProductName"];
    $ProductTypeID=$row["ProductTypeID"];
    $Availability = $row["Availability"];
    $Image = $row["Image"];
    $Description = $row["Description"];
    $Specification = $row["Specification"];
    $wattskvaidentifier = $row["Watts_KVA"];
    $Watts_KVA = $row["ProductType"] == 'Solar Panel'? $row["Watts_KVA"].'W':$row["Watts_KVA"].'KVA';
    $ProductType = $row["ProductType"];

  }
  elseif(isset($_POST['save'])){

        $id = $_POST["id"];
        $ProductName= $_POST['ProductName'];
        $ProductTypeID=$_POST['ProductTypeID'];
        $WattsKVA = $_POST['WattsKVA'];
        $Availability = $_POST['Availability'] == true ? 1:0;
        $Description=$_POST['Description'];
        $Specification=$_POST['Specification'];
        
        //WITH IMAGE SUBMISSION
        if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
            $Image = $_FILES['image'];
            $ImageFileName = $Image['name'];
            $ImageTempName = $Image['tmp_name'];
            $FilenameSeperate = explode('.',$ImageFileName);
            $FileExtension = strtolower(end($FilenameSeperate));

            $extension = array('jpeg','jpg','png');
            if(in_array($FileExtension,$extension)){
                $uploadedImage = 'Product-Images/'.$ImageFileName;
                $upload = '../../assets/images/Product-Images/'.$ImageFileName;
                move_uploaded_file($ImageTempName,$upload);

                $sql = "update products set ProductName='$ProductName' , ProductTypeID= '$ProductTypeID' , WattsKVA= '$WattsKVA' , Availability= '$Availability', Image= '$uploadedImage', Description='$Description', Specification='$Specification' where ProductID='$id'";
                $result = mysqli_query($conn , $sql);
                header("location: marketing-product-control.php");
                exit();
            }
        }
        //WITHOUT IMAGE SUBMISSION
        else{
            $sql = "update products set ProductName='$ProductName' , ProductTypeID= '$ProductTypeID' , Availability= '$Availability', Description='$Description', Specification='$Specification' where ProductID='$id'";
                $result = mysqli_query($conn , $sql);
                header("location: marketing-product-control.php");
                exit();
        }
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
                <div class="row row-sm">
                    <div class="col-xl-12 p-3">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">Edit Product</div>
                                <a href="marketing-product-control.php" class="btn btn-close p-0"></a>
                            </div>
                            <div class="card-body">
                                <form  method="POST" action="product-edit-form.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 mb-3">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" class="form-control" placeholder="Full Name"
                                                aria-label="Full Name" name="ProductName" required value="<?= $ProductName?>">
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Type</label>
                                            <select id="ProdType" class="form-select py-2" name="" required>
                                                <option <?= $ProductType == "Generator"? 'selected value="Generator"':'value="Generator"'?>>Generator</option>
                                                <option <?= $ProductType == "Solar Panel"? 'selected value="Solar Panel"':'value="Solar Panel"'?>>Solar Panel</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Watts/KVA</label>
                                            <select id="WattsKVAList" class="form-select py-2" name="ProductTypeID">
                                                <?php 
                                                    require '../../Database/database.php';
                                                    $select = "Select Watts_KVA, ProductTypeID from product_type where ProductType ='".$ProductType."'";
                                                    $result = mysqli_query($conn , $select);
                                                    if(mysqli_num_rows($result) > 0) {
                                                        foreach($result as $resultItem){
                                                            $wattskva = $resultItem['Watts_KVA'];
                                                            $PTypeID = $resultItem['ProductTypeID']; ?> 
                                                            <option <?= $wattskva == $wattskvaidentifier? 'selected value="'.$PTypeID.'"' : 'value="'.$PTypeID.'"' ;?>><?= $wattskva ?></option>
                                                            <?php 
                                                        }
                                                    }
                                                    else {

                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-12  mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="Description" class="col-xl-12 col-md-12 col-sm-12" rows="6"><?= $Description?></textarea>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Specification</label>
                                            <textarea name="Specification" class="col-xl-12 col-md-12 col-sm-12" rows="6"><?= $Specification?></textarea>                            
                                        </div>
                                        <div class="col-xl-12 mb-3 d-flex gap-2 justify-content-end">
                                            <input id="availability" type="checkbox"  name="Availability"  <?= $Availability == true ? 'checked' : ''?>>
                                            <label for="availability">Availability</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="file" name="image">
                                        </div>  
                                        <div class="col-xl-12 d-flex justify-content-end">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#ProdType').change(function() {
                $('#WattsKVAList').append('<option value="">Select Product Type</option>');
                var ProdType = $(this).val();
                if (ProdType) {
                    $.ajax({
                        url: 'function.php',
                        type: 'POST',
                        data: { PrType: ProdType },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#WattsKVAList').empty();
                                $.each(response.data.WattsKVA, function(index, item) {
                                    $('#WattsKVAList').append('<option value="' + item.value + '">' + item.text + '</option>');
                                });
                            } else {
                                alert('No Watts/KVA');
                            }
                        }
                    });
                } else {
                    $('#WattsKVAList').empty();
                    $('#WattsKVAList').append('<option value="">Select Product Type</option>');
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