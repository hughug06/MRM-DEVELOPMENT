<?php 

include_once '../../../Database/database.php';
global $conn;
  $id="";
  $name="";
  $email="";
  $username = "";
  $password = "";
  $role = "";
  $is_ban = "";
  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: user-management.php");
      exit;
    }
    $id = $_GET['id'];
    $select = "Select * from user_info INNER JOIN accounts on user_info.user_id = accounts.user_id where accounts.user_id = '$id'";
    $result = mysqli_query($conn , $select);
    $row = mysqli_fetch_assoc($result);
    
    $firstname=$row["first_name"];
    $lastname=$row["last_name"];
    $email=$row["email"];
    $role = $row["role"];
    $is_ban = $row["is_ban"];
    
  }
  else{

   
        $id = $_POST["id"];
        $firstname= $_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $is_ban = $_POST['is_ban'] == true ? 1:0;
        $sql = "update user_info INNER JOIN accounts on user_info.user_id = accounts.user_id set user_info.first_name='$firstname' , user_info.last_name= '$lastname' ,
         user_info.email= '$email' , accounts.is_ban= '$is_ban', role='$role' where accounts.user_id='$id'";
        $result = mysqli_query($conn , $sql);
        header("location: user-management.php");
        exit();
        

    
    
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('../../../USER/partials/head.php') ?>
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
         <?php include_once('../../../USER/partials/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('../../../USER/partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

               
                <form  method="POST" action="user-edit-form.php">
                    <div class="row row-sm">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Edit User
                                    </div>
                                    <div class="prism-toggle">
                                       <a href="user-management.php"> <button class="btn btn-sm btn-primary-light">BACK<i class="ri-eye-line ms-2 d-inline-block align-middle fs-14"></i></button></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" placeholder="firstname"
                                                aria-label="Full Name" name="firstname" required value="<?= $firstname?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" placeholder="lastname"
                                                aria-label="Username" name="lastname" required value="<?= $lastname?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">email</label>
                                            <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <input type="text" class="form-control" placeholder="email"
                                                    aria-label="email" name="email" required value="<?= $email?>">
                                                </div>
                                                                                               
                                                <div class="col-xxl-6 col-xl-12 mb-3">
                                                <label class="form-label">Role</label>
                                                    <select id="inputState1" class="form-select" name="role" required>
                                                        <option selected>Select Role</option>
                                                        <option value="user" <?= $role == 'user' ? 'selected' : ''?>>user</option>
                                                        <option value="admin" <?= $role == 'admin'? 'selected' : ''?>>admin</option>
                                                        <option value="agent" <?= $role == 'agent' ? 'selected' : ''?>>agent</option>
                                                    </select>
                                                </div>                                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">                                            
                                            <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label">Is ban</label>
                                                    <input type="checkbox"  name="is_ban"  <?= $is_ban == 1 ? 'checked' : ''?>>
                                                </div>                                                                      
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                       </div>                   
                    </div>
                </form>

            </div>
        </div>
        <!-- End::app-content -->

        
        <!-- Footer Start -->
        <?php include_once('../../../USER/partials/footer.php') ?>
        <!-- Footer End -->
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
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