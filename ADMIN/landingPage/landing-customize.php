<?php
require_once '../authetincation.php';
include_once '../../Database/database.php';
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

</head>

<body>

    <div class="page">

            <!-- app-header -->
            <?php include_once( '../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once('../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                    <!-- content here -->
                    <?php
                        require '../../Database/database.php'; 
                        $sql = "SELECT * FROM landing_page_info WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $id = 1;
                        $stmt->bind_param("i", $id); // Replace $productId with the actual ID or dynamic ID
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $stmt->close();
                        $conn->close();
                                    
                        $titles = json_decode($row["title"], true);
                        $descs = json_decode($row["description"], true);
                        $goals = json_decode($row["goals"], true);
                        $faqs = json_decode($row["faq"], true);
                        $projects = json_decode($row["projects"], true);
                        $user_experience = json_decode($row["user_experience"], true);
                    ?>

                    <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                        <div>
                            <h2 class="main-content-title fs-24 mb-1">Products</h2>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">overview</li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                            <a class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#editmodal">Edit Information</a>
                        </div>
                    </div>

                    <div class="row row-sm">
                    <div class="col-md-8 col-lg-9">
                        <div id="ProductList" class="row row-sm">
                        <!-- Show Available products -->

                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div>
                                                <h5><?php echo $titles["title1_f"]." ".$titles["title1_d"]." ".$titles["title1_l"] ?></h5>
                                                <p><?php echo $descs["desc1"] ?> (editable)</p>
                                            </div>
                                            <div>
                                                <h5><?php echo $titles["title2"]?></h5>
                                                <p><?php echo $descs["desc1"] ?> (editable)</p>
                                            </div>
                                            <div>
                                                <h5>The Goal of Solar Energy</h5>
                                                <p><?php echo $goals["goal1"] ?> (editable)</p>
                                                <p><?php echo $goals["goal2"] ?> (editable)</p>
                                                <p><?php echo $goals["goal3"] ?> (editable)</p>
                                                <p><?php echo $goals["goal4"] ?> (editable)</p>
                                            </div>
                                            <div>
                                                <h5>Services that we offer</h5>
                                                <p><?php echo $descs["desc3"] ?> (editable)</p>
                                            </div>
                                            <div>
                                                <h5>Unlock Your Independence with SunSparkPower!</h5>
                                                <p><?php echo $descs["desc4"] ?> (editable)</p>
                                            </div>
                                            <div>
                                                <h5><span>FAQ'S ?
                                                We are here to help you</span></h5>
                                                <p><?php echo $faqs["faqdesc"] ?> (editable)</p>
                                                <p>1. <?php echo $faqs["faq_q1"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a1"] ?> (editable)</p>

                                                <p>2. <?php echo $faqs["faq_q2"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a2"] ?> (editable)</p>

                                                <p>3. <?php echo $faqs["faq_q3"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a3"] ?> (editable)</p>

                                                <p>4. <?php echo $faqs["faq_q4"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a4"] ?> (editable)</p>

                                                <p>5. <?php echo $faqs["faq_q5"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a5"] ?> (editable)</p>

                                                <p>6. <?php echo $faqs["faq_q6"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a6"] ?> (editable)</p>

                                                <p>7. <?php echo $faqs["faq_q7"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a7"] ?> (editable)</p>

                                                <p>8. <?php echo $faqs["faq_q8"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a8"] ?> (editable)</p>

                                                <p>9. <?php echo $faqs["faq_q9"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a9"] ?> (editable)</p>

                                                <p>10. <?php echo $faqs["faq_q10"] ?> (editable)</p>
                                                <p><?php echo $faqs["faq_a10"] ?> (editable)</p>
                                            </div>

                                            <div>
                                                <h5>Some of our Projects</h5>
                                                <p><?php echo $projects["pj1_title"] ?> (editable)</p>
                                                <p><?php echo $projects["pj1_desc"] ?> (editable)</p>

                                                <p><?php echo $projects["pj2_title"] ?> (editable)</p>
                                                <p><?php echo $projects["pj2_desc"] ?> (editable)</p>

                                                <p><?php echo $projects["pj3_title"] ?> (editable)</p>
                                                <p><?php echo $projects["pj3_desc"] ?> (editable)</p>

                                                <p><?php echo $projects["pj4_title"] ?> (editable)</p>
                                                <p><?php echo $projects["pj4_desc"] ?> (editable)</p>

                                                <p><?php echo $projects["pj5_title"] ?> (editable)</p>
                                                <p><?php echo $projects["pj5_desc"] ?> (editable)</p>

                                                <p><?php echo $projects["pj6_title"] ?> (editable)</p>
                                                <p><?php echo $projects["pj6_desc"] ?> (editable)</p>
                                            </div>

                                            <div>
                                                <h5>User Experience</h5>
                                                <p><?php echo $user_experience["xp1_name"] ?> (editable)</p>
                                                <p><?php echo $user_experience["xp1_comment"] ?> (editable)</p>

                                                <p><?php echo $user_experience["xp2_name"] ?> (editable)</p>
                                                <p><?php echo $user_experience["xp2_comment"] ?> (editable)</p>

                                                <p><?php echo $user_experience["xp3_name"] ?> (editable)</p>
                                                <p><?php echo $user_experience["xp3_comment"] ?> (editable)</p>
                                            </div>
                                            <div>
                                                <h5>About</h5>
                                                <p><?php echo $descs["about"] ?> (editable)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End::row-1 -->

                <!--modal for editing -->
                <div class="modal fade" id="editmodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editmodalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="editmodalLabel">Edit Information</h3>
                                <a type="button" class="btn-close" onclick="closemodal()" data-bs-dismiss="modal" aria-label="Close"></a>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6 col-6 mb-3">
                                    <input type="text" id="title1" value="<?php echo $titles["title1_f"].$titles["title1_d"].$titles["title1_l"] ?>"></input>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="desc1"><?php echo $descs["desc1"] ?></textarea>
                                </div>

                                <div class="col-md-6 col-6 mb-3">
                                    <input type="text" value="<?php echo $titles["title2"]?>" id="title2"></input>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="desc2"><?php echo $descs["desc2"] ?></textarea>
                                </div>

                                <div class="col-md-6 col-6 mb-3">
                                    <h5>The Goal of Solar Energy</h5>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="goal1"><?php echo $goals["goal1"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="goal2"><?php echo $goals["goal2"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="goal3"><?php echo $goals["goal3"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="goal4"><?php echo $goals["goal4"] ?></textarea>
                                </div>

                                <div class="col-md-6 col-6 mb-3">
                                    <h5>Services that we offer</h5>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="desc3"><?php echo $descs["desc3"] ?></textarea>
                                </div>

                                <div class="col-md-6 col-6 mb-3">
                                    <h5>Unlock Your Independence with SunSparkPower!</h5>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="desc4"><?php echo $descs["desc4"] ?></textarea>
                                </div>

                                <div class="col-md-6 col-6 mb-3">
                                    <h5><span>FAQ'S ?
                                    We are here to help you</span></h5>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faqdesc"><?php echo $faqs["faqdesc"] ?></textarea>
                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q1"><?php echo $faqs["faq_q1"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a1"><?php echo $faqs["faq_a1"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q2"><?php echo $faqs["faq_q2"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a2"><?php echo $faqs["faq_a2"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q3"><?php echo $faqs["faq_q3"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a3"><?php echo $faqs["faq_a3"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q4"><?php echo $faqs["faq_q4"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a4"><?php echo $faqs["faq_a4"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q5"><?php echo $faqs["faq_q5"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a5"><?php echo $faqs["faq_a5"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q6"><?php echo $faqs["faq_q6"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a6"><?php echo $faqs["faq_a6"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q7"><?php echo $faqs["faq_q7"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a7"><?php echo $faqs["faq_a7"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q8"><?php echo $faqs["faq_q8"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a8"><?php echo $faqs["faq_a8"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q9"><?php echo $faqs["faq_q9"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a9"><?php echo $faqs["faq_a9"] ?></textarea>

                                    <textarea rows="3" class="col-xl-12 col-md-12 col-12" id="faq_q10"><?php echo $faqs["faq_q10"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="faq_a10"><?php echo $faqs["faq_a10"] ?></textarea>
                                </div>

                                <div class="col-md-6 col-6 mb-3">
                                    <h5>Some of our Projects</h5>
                                    <textarea rows="2" class="col-xl-12 col-md-12 col-12" id="pj1_title"><?php echo $projects["pj1_title"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="pj1_desc"><?php echo $projects["pj1_desc"] ?></textarea>

                                    <textarea rows="2" class="col-xl-12 col-md-12 col-12" id="pj2_title"><?php echo $projects["pj2_title"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="pj2_desc"><?php echo $projects["pj2_desc"] ?></textarea>

                                    <textarea rows="2" class="col-xl-12 col-md-12 col-12" id="pj3_title"><?php echo $projects["pj3_title"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="pj3_desc"><?php echo $projects["pj3_desc"] ?></textarea>

                                    <textarea rows="2" class="col-xl-12 col-md-12 col-12" id="pj4_title"><?php echo $projects["pj4_title"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="pj4_desc"><?php echo $projects["pj4_desc"] ?></textarea>

                                    <textarea rows="2" class="col-xl-12 col-md-12 col-12" id="pj5_title"><?php echo $projects["pj5_title"] ?>)</textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="pj5_desc"><?php echo $projects["pj5_desc"] ?></textarea>

                                    <textarea rows="2" class="col-xl-12 col-md-12 col-12" id="pj6_title"><?php echo $projects["pj6_title"] ?></textarea>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="pj6_desc"><?php echo $projects["pj6_desc"] ?></textarea>
                                </div>

                                <div class="col-md-6 col-6 mb-3">
                                    <h5>User Experience</h5>
                                    <input type="text" value="<?php echo $user_experience["xp1_name"] ?>" id="xp1_name"></input>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="xp1_comment"><?php echo $user_experience["xp1_comment"] ?></textarea>

                                    <input type="text" value="<?php echo $user_experience["xp2_name"] ?>" id="xp2_name"></input>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="xp2_comment"><?php echo $user_experience["xp2_comment"] ?></textarea>

                                    <input type="text" value="<?php echo $user_experience["xp3_name"] ?>" id="xp3_name"></input>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="xp3_comment"><?php echo $user_experience["xp3_comment"] ?></textarea>
                                </div>

                                <div class="col-md-6 col-6 mb-3">
                                    <h5>About</h5>
                                    <textarea rows="6" class="col-xl-12 col-md-12 col-12" id="about"><?php echo $descs["about"] ?></textarea>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                <a type="button" class="btn btn-primary" id="save">Save</a>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
            <!--APP-CONTENT CLOSE-->

                
                
            </div>
        </div>
        <!-- End::app-content -->

        
        <!-- Footer Start -->
        <?php include_once('../../partials/footer.php') ?>
        <!-- Footer End -->  
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop d-none">
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

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#save', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                const title1 = document.getElementById('title1').value;
                const title2 = document.getElementById('title2').value;

                const desc1 = document.getElementById('desc1').value;
                const desc2 = document.getElementById('desc2').value;
                const desc3 = document.getElementById('desc3').value;
                const desc4 = document.getElementById('desc4').value;

                const goal1 = document.getElementById('goal1').value;
                const goal2 = document.getElementById('goal2').value;
                const goal3 = document.getElementById('goal3').value;
                const goal4 = document.getElementById('goal4').value;

                const faqdesc = document.getElementById('faqdesc').value;

                const faq_q1 = document.getElementById('faq_q1').value;
                const faq_q2 = document.getElementById('faq_q2').value;
                const faq_q3 = document.getElementById('faq_q3').value;
                const faq_q4 = document.getElementById('faq_q4').value;
                const faq_q5 = document.getElementById('faq_q5').value;
                const faq_q6 = document.getElementById('faq_q6').value;
                const faq_q7 = document.getElementById('faq_q7').value;
                const faq_q8 = document.getElementById('faq_q8').value;
                const faq_q9 = document.getElementById('faq_q9').value;
                const faq_q10 = document.getElementById('faq_q10').value;

                const faq_a1 = document.getElementById('faq_a1').value;
                const faq_a2 = document.getElementById('faq_a2').value;
                const faq_a3 = document.getElementById('faq_a3').value;
                const faq_a4 = document.getElementById('faq_a4').value;
                const faq_a5 = document.getElementById('faq_a5').value;
                const faq_a6 = document.getElementById('faq_a6').value;
                const faq_a7 = document.getElementById('faq_a7').value;
                const faq_a8 = document.getElementById('faq_a8').value;
                const faq_a9 = document.getElementById('faq_a9').value;
                const faq_a10 = document.getElementById('faq_a10').value;

                const pj1_title = document.getElementById('pj1_title').value;
                const pj2_title = document.getElementById('pj2_title').value;
                const pj3_title = document.getElementById('pj3_title').value;
                const pj4_title = document.getElementById('pj4_title').value;
                const pj5_title = document.getElementById('pj5_title').value;
                const pj6_title = document.getElementById('pj6_title').value;

                const pj1_desc = document.getElementById('pj1_desc').value;
                const pj2_desc = document.getElementById('pj2_desc').value;
                const pj3_desc = document.getElementById('pj3_desc').value;
                const pj4_desc = document.getElementById('pj4_desc').value;
                const pj5_desc = document.getElementById('pj5_desc').value;
                const pj6_desc = document.getElementById('pj6_desc').value;

                const xp1_name = document.getElementById('xp1_name').value;
                const xp2_name = document.getElementById('xp2_name').value;
                const xp3_name = document.getElementById('xp3_name').value;

                const xp1_comment = document.getElementById('xp1_comment').value;
                const xp2_comment = document.getElementById('xp2_comment').value;
                const xp3_comment = document.getElementById('xp3_comment').value;

                const about = document.getElementById('about').value;

                const array_checker = [
                    title1, title2, desc1, desc2, desc3, desc4, goal1, goal2, goal3, goal4,
                    faqdesc, faq_q1,  faq_q2,  faq_q3,  faq_q4,  faq_q5,  faq_q6,  faq_q7,  faq_q8,  faq_q9,  faq_q10,
                    faq_a1,  faq_a2,  faq_a3,  faq_a4,  faq_a5,  faq_a6,  faq_a7,  faq_a8,  faq_a9,  faq_a10,
                    pj1_title,  pj2_title, pj3_title, pj4_title, pj5_title, pj6_title, pj1_desc,  pj2_desc, pj3_desc, pj4_desc, pj5_desc, pj6_desc,
                    xp1_name, xp2_name, xp3_name, xp1_comment, xp2_comment, xp3_comment, about
                ];
                
                if(array_checker.some(check => check === "")){
                    Swal.fire({
                        title: 'ERROR',
                        html: "There seems to be missing information. form should not have empty values",
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
                        html: "Are you sure to save the information?",
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, send AJAX request for Add product
                            var formData = new FormData();
                            formData.append('save', true);
                            formData.append('title1', title1); formData.append('title2', title2);
                            formData.append('desc1', desc1); formData.append('desc2', desc2);
                            formData.append('desc3', desc3); formData.append('desc4', desc4);

                            formData.append('goal1', goal1); formData.append('goal2', goal2);
                            formData.append('goal3', goal3); formData.append('goal4', goal4);

                            formData.append('faqdesc', faqdesc); formData.append('faq_q1', faq_q1); formData.append('faq_q2', faq_q2);
                            formData.append('faq_q3', faq_q3); formData.append('faq_q4', faq_q4);
                            formData.append('faq_q5', faq_q5); formData.append('faq_q6', faq_q6);
                            formData.append('faq_q7', faq_q7); formData.append('faq_q8', faq_q8);
                            formData.append('faq_q9', faq_q9); formData.append('faq_q10', faq_q10);

                            formData.append('faq_a1', faq_a1); formData.append('faq_a2', faq_a2);
                            formData.append('faq_a3', faq_a3); formData.append('faq_a4', faq_a4);
                            formData.append('faq_a5', faq_a5); formData.append('faq_a6', faq_a6);
                            formData.append('faq_a7', faq_a7); formData.append('faq_a8', faq_a8);
                            formData.append('faq_a9', faq_a9); formData.append('faq_a10', faq_a10);

                            formData.append('pj1_title', pj1_title); formData.append('pj2_title', pj2_title);
                            formData.append('pj3_title', pj3_title); formData.append('pj4_title', pj4_title);
                            formData.append('pj5_title', pj5_title); formData.append('pj6_title', pj6_title);

                            formData.append('pj1_desc', pj1_desc); formData.append('pj2_desc', pj2_desc);
                            formData.append('pj3_desc', pj3_desc); formData.append('pj4_desc', pj4_desc);
                            formData.append('pj5_desc', pj5_desc); formData.append('pj6_desc', pj6_desc);

                            formData.append('xp1_name', xp1_name); formData.append('xp2_name', xp2_name); formData.append('xp3_name', xp3_name);
                            formData.append('xp1_comment', xp1_comment); formData.append('xp2_comment', xp2_comment); formData.append('xp3_comment', xp3_comment);
                            formData.append('about', about);
                            
                            $.ajax({
                                url: 'function.php',
                                type: 'POST',
                                dataType: 'json',
                                data:formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    // Handle successful add
                                    if(response.success){
                                        Swal.fire({
                                            title: 'Task Added!',
                                            text: 'Task has been added successfully.',
                                            icon: 'success',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'landing-customize.php';
                                        });
                                    }
                                    else{
                                        Swal.fire({
                                            title: 'Task not Added!',
                                            text: response.message || 'An error occurred while adding the task.',
                                            icon: 'error',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        });
                                    }
                                },
                                error: function(response) {
                                    // Handle erro
                                    Swal.fire(
                                        'Error!',
                                        'There was an error Adding the task. Please try again.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                }
            })
        });
    </script>
    
</body>

</html>