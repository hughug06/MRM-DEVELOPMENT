<?php 
  require_once '../../authetincation.php';
  include_once '../../../Database/database.php';
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

               

                <!-- Start::row-1 -->
                 
                <div class="row row-sm mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 d-block">                            
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="main-content-label mb-0">USER TABLE</label>
                                    <a href="user-add-form.php">
                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" >
                                        <i class="fe fe-download-cloud pe-2"></i>ADD USER
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive userlist-table">
                                    <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                        <thead>
                                            <tr>
                                                <th class="wd-lg-8p"><span>AccountID</span></th>
                                                <th class="wd-lg-20p"><span>Name</span></th>
                                                <th class="wd-lg-20p"><span>email</span></th>
                                                <th class="wd-lg-20p"><span>Role</span></th>
                                                <th class="wd-lg-20p"><span>Ban</span></th>                                               
                                                <th class="wd-lg-20p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           require '../../../Database/database.php';
                                           require 'function.php';
                                           $select = "Select * from user_info INNER JOIN accounts on user_info.email = accounts.email where role = 'user'";
                                           $result = mysqli_query($conn , $select);
                                           if(mysqli_num_rows($result) > 0){
                                            foreach($result as $resultItem){
                                                ?> 
                                                 <tr>
                                                <td><?= $resultItem['account_id']?></td>
                                                <td><?= $resultItem['first_name']. " " . $resultItem['last_name']?></td>
                                                <td><?= $resultItem['email']?></td>                        
                                                <td><?= $resultItem['role']?></td>
                                                <td <?= $resultItem['is_ban'] == 1 ? 'class="text-danger"':'class="text-success"'?>><?= $resultItem['is_ban'] == 1 ? "Banned":"Active"?></td>
                                                <td>                                                                                                   
                                                    <a href="user-edit-form.php?id=<?= $resultItem['user_id']?>"  class="btn btn-sm btn-info">  <i class="fe fe-edit-2"></i> </a>
                                                    <button data-id="<?= $resultItem['user_id'] ?>" class="btn btn-sm btn-danger delete-user">
                                                    <i class="fe fe-trash"></i>
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
                    </div><!-- COL END -->
                </div>
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->

        
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).on('click', '.delete-user', function (e) {
    e.preventDefault();
    
    // Get user ID from the data-id attribute
    var userId = $(this).data('id');
    
        
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
           
            $.ajax({
        url: 'user-delete-form.php', // Your delete form PHP script
        type: 'POST',
        data: { id: userId },
        success: function(response) {
          var result = JSON.parse(response);
          if (result.success) {          
            // Optionally, remove the deleted user row from the page (assuming you're displaying them in a table)
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
            });
            setTimeout(function() {
              location.reload();
            }, 2000);
          } else {
            alert('Error: ' + result.message);
          }
          
        },
        error: function() {
          alert('Error deleting user');
        }
      });
        }
        });
      
    
  });
</script>