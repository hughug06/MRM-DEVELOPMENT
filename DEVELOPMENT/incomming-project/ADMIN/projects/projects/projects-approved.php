<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> Pending projects </title>
    
    
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">


</head>

<body>



    

    <div class="page">
         <!-- app-header -->
         <?php include_once('partials/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                
                <!-- Page Header -->

                <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                  <div>
                      <h2 class="main-content-title fs-24 mb-1">Approved Projects</h2>
                      
                  </div>
                  <div class="d-flex">
                    <div class="justify-content-center">
                        <button type="button" class="btn btn-white btn-icon-text my-2 me-2 d-inline-flex align-items-center">
                          <i class="fe fe-download me-2 fs-14"></i> Import
                        </button>
                        <button type="button" class="btn btn-white btn-icon-text my-2 me-2 d-inline-flex align-items-center">
                          <i class="fe fe-filter me-2 fs-14"></i> Filter
                        </button>
                        <button type="button" class="btn btn-primary my-2 btn-icon-text d-inline-flex align-items-center">
                          <i class="fe fe-download-cloud me-2 fs-14"></i> Download Report
                        </button>
                    </div>
                  </div>
                </div>

                <!-- Page Header Close -->

                <!-- Start::row-1 -->
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-5 col-xl-4">
                        <div class="card custom-card overflow-hidden">
                            <div class="">
                                <div class="main-content-app main-content-contacts pt-0">
                                    <div class=" main-content-left main-content-left-contacts">
                                        <div class="tab-menu-heading">
                                            <div class="tabs-menu1 d-flex justify-content-center">
                                                <!-- Tabs -->
                                                <ul class="nav panel-tabs main-nav-line main-nav-line-chat d-flex ps-3 border-bottom">
                                                    <li><a href="#all-contact" class="nav-link active me-3" data-bs-toggle="tab">Approved Projects</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body p-0">
                                            <div class="tab-content">
                                                <div class="tab-pane p-0 active" id="all-contact">
                                                    <div class="main-contacts-list">
                                                        <div class="main-contact-label">
                                                            A
                                                        </div>
                                                        <div class="main-contact-item selected">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/2.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Abigail Johnson</h6><span class="phone">+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/3.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Archie Cantones</h6><span>archie@cantones.com</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-avatar online">
                                                                A
                                                            </div>
                                                            <div class="main-contact-body">
                                                                <h6>Allan Rey Palban</h6><span>allanr@palban.com</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-avatar bg-secondary">
                                                                A
                                                            </div>
                                                            <div class="main-contact-body">
                                                                <h6>Aileen Mante</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-label">
                                                            B
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/4.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Brandon Dilao</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/5.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Britney Labares</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-avatar bg-danger">
                                                                B
                                                            </div>
                                                            <div class="main-contact-body">
                                                                <h6>Brateyley Cruz</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-label">
                                                            C
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/6.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Camille Audrey</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/7.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Christian Lerio</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/8.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Christopher Segovia</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-label">
                                                            D
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/9.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Darius Clayton</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/10.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Dyanne Aceron</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/11.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Divina Gracia</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane p-0" id="fav-contact">
                                                    <div class="main-contacts-list">
                                                        <div class="main-contact-label">
                                                            A
                                                        </div>
                                                        <div class="main-contact-item selected">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/7.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Anna Sthesia</h6><span class="phone">+1-534-567-456</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/8.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Anna Mull</h6><span>annamul@gmail.com</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/4.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>AlFredo</h6><span>alfredo@gmail.com</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/11.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Aileen Mante</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-label">
                                                            B
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/5.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Bernadette</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/9.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Barry Mundy</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-avatar bg-danger">
                                                                B
                                                            </div>
                                                            <div class="main-contact-body">
                                                                <h6>Barb Akew</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-label">
                                                            C
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/12.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Charles</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/8.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Christopher</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/3.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Connor</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-label">
                                                            D
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/1.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Deirdre</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/8.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Dorothy</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="main-contact-item">
                                                            <div class="main-img-user online"><img alt="avatar" src="../assets/images/faces/7.jpg"></div>
                                                            <div class="main-contact-body">
                                                                <h6>Divina Gracia</h6><span>+1-234-567-890</span>
                                                            </div>
                                                            <a class="main-contact-star" href="javascript:void(0);">
                                                                <i class="fe fe-star me-1 text-warning"></i>
                                                                <i class="fe fe-edit-2 me-1"></i>
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7 col-xl-8">
                        <div class="card custom-card">
                            <div class="">
                                <div class="main-content-body main-content-body-contacts">
                                    <div class="main-contact-info-header pt-3">
                                        <div class="media">
                                            <div class="main-img-user">
                                                <img alt="avatar" src="../assets/images/faces/1.jpg"> <a href="javascript:void(0);"><i class="fe fe-camera"></i></a>
                                            </div>
                                            <div class="media-body">
                                                <h4>Sonia Taylor</h4>
                                                <p>Web Designer</p>
                                                <nav class="contact-info">
                                                    <a href="javascript:void(0);" class="contact-icon border text-muted" data-bs-toggle="tooltip" title="Call"><i class="fe fe-phone"></i></a>
                                                    <a href="javascript:void(0);" class="contact-icon border text-muted" data-bs-toggle="tooltip" title="Video"><i class="fe fe-video"></i></a>
                                                    <a href="javascript:void(0);" class="contact-icon border text-muted" data-bs-toggle="tooltip" title="message"><i class="fe fe-message-square"></i></a>
                                                    <a href="javascript:void(0);" class="contact-icon border text-muted" data-bs-toggle="tooltip" title="Add to Group"><i class="fe fe-user-plus"></i></a>
                                                    <a href="javascript:void(0);" class="contact-icon border text-muted" data-bs-toggle="tooltip" title="Block"><i class="fe fe-slash"></i></a>
                                                </nav>
                                            </div>
                                        </div>
                                        <div class="main-contact-action btn-list pt-3 pe-3">
                                            <a href="javascript:void(0);" class="btn ripple btn-primary text-fixed-white" data-bs-placement="top" data-bs-toggle="tooltip" title="Edit Profile"><i class="fe fe-edit"></i></a>
                                            <a href="javascript:void(0);" class="btn ripple btn-secondary text-fixed-white" data-bs-placement="top" data-bs-toggle="tooltip" title="Delete Profile"><i class="fe fe-trash-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-contact-info-body">
                                        <div>
                                            <h6>Biography</h6>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                        </div>
                                        <div class="media-list">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div>
                                                        <label>Work</label> <span class="tx-medium">+1 (234) 567 8901</span>
                                                    </div>
                                                    <div>
                                                        <label>Personal</label> <span class="tx-medium">+1 (498) 021 0090</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-body">
                                                    <div>
                                                        <label>Gmail Account</label> <span class="tx-medium">sonia.taylor@gmail.com</span>
                                                    </div>
                                                    <div>
                                                        <label>Other Account</label> <span class="tx-medium">me@bootstrapdash.me</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-body">
                                                    <div>
                                                        <label>Current Address</label> <span class="tx-medium">012 Dashboard Apartments, San Francisco, California 13245</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media mb-0">
                                                <div class="media-body">
                                                    <div>
                                                        <label>Call History</label> <span class="tx-medium">Duration of last call: 2m 32sec</span>
                                                    </div>
                                                </div>
                                            </div>
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
        <?php include_once('partials/footer.php') ?>
        <!-- Footer End -->
        



    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    
    <!-- Custom-Switcher JS -->
    <script src="../assets/js/custom-switcher.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>
    

</body>

</html>