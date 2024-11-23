<?php 
require_once '../../Database/database.php';
require_once '../../ADMIN/authetincation.php';
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
    <!-- FullCalendar JS -->
    <link rel="stylesheet" href="../../assets/libs/fullcalendar/main.min.css">

    <style>
        .custom-card {
            margin: 30px auto;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }
        #calendar {
            width: 100%; /* Make the calendar fill the container */
            max-width: 100%; /* Prevent overflow on smaller screens */
            height: auto; /* Allow the height to adjust */
            overflow-x: auto; /* Enable horizontal scrolling if necessary */
        }

        .fc-toolbar h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .fc-daygrid-event {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 5px;
            border-radius: 4px;
        }
        .fc-daygrid-event:hover {
            background-color: #0056b3;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-header {
            background-color: #007bff;
            color: #fff;
        }
        .modal-body p {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .modal-footer {
            border-top: none;
        }
    </style>

</head>

<body>

    <div class="page">
        <!-- app-header -->
        <?php include_once(__DIR__. '/../../partials/header.php')?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once(__DIR__. '/../../partials/sidebar.php')?>

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                    <div>
                        <h2 class="main-content-title fs-24 mb-1">Welcome To Dashboard</h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-sm-12 col-lg-12 col-xl-8">
                        <div class="row row-sm">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card bg-primary custom-card card-box">
                                    <div class="card-body p-4">
                                        <div class="row align-items-center">
                                            <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12">
                                                <h4 class="d-flex mb-3">
                                                    <span class="fw-bold text-fixed-white ">Hello Marvie Placido!</span>
                                                </h4>
                                                <p class="text-fixed-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto molestias pariatur laboriosam adipisci ab, velit expedita libero voluptatum sunt nihil nisi voluptates. Dignissimos aperiam harum praesentium distinctio necessitatibus recusandae corrupti!
                                                </p>
                                            </div>
                                            <img src="../../assets/images/mrm-images/dashboard-banner.png" alt="user-img" style="width: 23rem;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen1.jpg" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Mountains<span class="badge bg-primary float-end fs-10">New</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen2.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen3.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen1.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen2.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen3.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Services</div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">MRM EG Electric Power Generation Services offers comprehensive solutions for solar panels and generators, including expert tuning, repair, regular maintenance, and installation. Our experienced technicians ensure your power systems run efficiently and reliably. Click inquire to know more about our availability and specialized services tailored to meet your energy needs.</p>
                                        <a href="javascript:void(0);" class="btn btn-primary">Inquire Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Projects</div>
                                    </div>
                                    <div class="card-body">                                    
                                        <p class="card-text">MRM EG Electric Power Generation Services has a proven track record in delivering high-quality projects, from the seamless installation of solar panels and generators to reliable repair and maintenance solutions. Each project reflects our commitment to sustainability, efficiency, and customer satisfaction, tailored to meet diverse energy needs. Inquire now to see how our expertise can power your next project.</p>
                                        <a href="javascript:void(0);" class="btn btn-primary">Inquire Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-md-12 col-xl-12">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-header border-bottom-0 d-flex pb-0">
                                        <div>
                                            <label class="main-content-label mb-2 pt-1">Request Lists</label>
                                            <p class="fs-12 mb-3 text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, sit aspernatur quibusdam corporis mollitia quam nobis sed ducimus omnis? Optio tempore nostrum enim aliquam voluptatum blanditiis corporis molestiae aspernatur est?</p>
                                        </div>
                                        <div class="card-options float-end">
                                            <a href="javascript:void(0);" class="me-0 text-default" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="fe fe-more-vertical fs-17 float-end"></span> </a>
                                            <ul class="dropdown-menu dropdown-menu-end" role="menu">
                                                <li><a href="javascript:void(0);"><i class="fe fe-eye me-2"></i>View</a></li>
                                                <li><a href="javascript:void(0);"><i class="fe fe-plus-circle me-2"></i>Add</a></li>
                                                <li><a href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i>Remove</a></li>
                                                <li><a href="javascript:void(0);"><i class="fe fe-download-cloud me-2"></i>Download</a></li>
                                                <li><a href="javascript:void(0);"><i class="fe fe-settings me-2"></i>More</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter border mb-0 text-nowrap table-product">
                                                <thead>
                                                    <tr>
                                                        <th>Request ID</th>
                                                        <th>Request</th>
                                                        <!-- <th>Product Cost</th>
                                                        <th>Total</th> -->
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#C234</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/14.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$14,500</b></td>
                                                        <td>2,977</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C389</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/15.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$30,000</b></td>
                                                        <td>678</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C936</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/16.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$13,200</b></td>
                                                        <td>4,922</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C493</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/17.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$15,100</b></td>
                                                        <td>1,234</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C729</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/18.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">BService Request</span></td>
                                                        <!-- <td><b>$5,987</b></td>
                                                        <td>4,789</td> -->
                                                        <td><span class="badge bg-primary op-5">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C529</td>
                                                        <td class="my-auto"><img src="../../assets/images/pngs/19.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$11,987</b></td>
                                                        <td>938</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 col-xl-4">
                        <div class="card custom-card">
                            <div id='calendar'></div> 
                        </div>
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Project 1</div>
                            </div>
                            <div class="card-body">
                                <img src="../../assets/images/mrm-images/dashboard-images/project-solar1.jpg" class="card-img mb-3" alt="...">
                                <a href="javascript:void(0);" class="btn btn-primary">Inquire Now</a>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Project 1</div>
                            </div>
                            <div class="card-body">
                                <img src="../../assets/images/mrm-images/dashboard-images/project-solar2.jpg" class="card-img mb-3" alt="...">
                                <a href="javascript:void(0);" class="btn btn-primary">Inquire Now</a>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Project 1</div>
                            </div>
                            <div class="card-body">
                                <img src="../../assets/images/mrm-images/dashboard-images/project-solar3.jpg" class="card-img mb-3" alt="...">
                                <a href="javascript:void(0);" class="btn btn-primary">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::app-content -->

        <div class="scrollToTop d-none"></div>
        <!-- Footer Start -->
        <?php  include_once(__DIR__. '/../../partials/footer.php')?>
        <!-- Footer End -->
       
        <!--  MODAL FOR INFORMATION OF USER -->
        <div class="modal fade" id="eventDetailsModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventDetailsModalLabel">Appointment Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Appointment details will be shown here -->
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>

</body>

</html>





<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
<!-- FullCalendar Script Integration -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            initialView: 'dayGridMonth',
            events: 'fetch_appointments.php', // Fetch events from this PHP file
            eventClick: function(info) {
                // Show details in a modal on event click
                $('#eventDetailsModal .modal-title').text(info.event.title);
                $('#eventDetailsModal .modal-body').html(`
                    <p><strong>Location:</strong> ${info.event.extendedProps.location}</p>
                    <p><strong>Brand:</strong> ${info.event.extendedProps.brand}</p>
                    <p><strong>Product:</strong> ${info.event.extendedProps.product}</p>
                    <p><strong>Power:</strong> ${info.event.extendedProps.power}</p>
                    <p><strong>Running Hours:</strong> ${info.event.extendedProps.running_hours}</p>
                    <p><strong>Status:</strong> ${info.event.extendedProps.status}</p>
                    <p><strong>Worker Update:</strong> ${info.event.extendedProps.worker_update}</p>
                    <p><strong>Date:</strong> ${info.event.extendedProps.date}</p>
                    <p><strong>Start Time:</strong> ${info.event.extendedProps.start_time}</p>
                    <p><strong>End Time:</strong> ${info.event.extendedProps.end_time}</p>
                `);
                $('#eventDetailsModal').modal('show');
            },
            eventColor: '#007bff', // Default color for events
            eventTextColor: '#ffffff', // Text color for events
            eventRender: function(info) {
                // Render event title as only the service type
                return info.event.title; // This ensures only the service type is shown
            }
        });

        calendar.render();
    });
</script>
