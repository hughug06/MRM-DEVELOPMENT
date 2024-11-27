<?php 
require_once '../../Database/database.php';
require_once '../../ADMIN/authetincation.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once(__DIR__. '/../../partials/head.php')?>
    <title>Home</title>
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
    <!-- FullCalendar Stylesheets -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel="stylesheet" /> -->

    <!-- FullCalendar JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script> -->

    <style>
        .custom-card {
            margin: 30px auto;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }
        /* #calendar {
            width: 100%; 
            max-width: 100%;
            height: auto; 
            overflow-x: auto; 
        } */

        /* .fc-toolbar h2 {
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
        } */
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
                                <a class="card custom-card" href="/USER/solar/solar.php">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/project-solar1.jpg" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Mountains<span class="badge bg-primary float-end fs-10">New</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <a class="card custom-card" href="/USER/generator/generator.php">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen2.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <a class="card custom-card" href="USER/generator/generator.php">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen3.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <a class="card custom-card" href="/USER/generator/generator.php">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen1.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <a class="card custom-card" href="/USER/generator/generator.php">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen2.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <a class="card custom-card" href="/USER/generator/generator.php">
                                    <div class="card-body">
                                        <img src="../../assets/images/mrm-images/dashboard-images/gen3.jpg"" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </a>
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
                                        <a href="/USER/services/bookappointments/service.php" class="btn btn-primary">Inquire Now</a>
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
                                        <a href="/USER/services/bookappointments/service.php" class="btn btn-primary">Inquire Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 col-xl-4">
                        <!-- <div class="card custom-card">
                            <div id='calendar'></div> 
                        </div> -->
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Project 1</div>
                            </div>
                            <div class="card-body">
                                <img src="../../assets/images/mrm-images/dashboard-images/project-solar1.jpg" class="card-img mb-3" alt="...">
                                <a href="/USER/services/bookappointments/service.php" class="btn btn-primary">Inquire Now</a>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Project 1</div>
                            </div>
                            <div class="card-body">
                                <img src="../../assets/images/mrm-images/dashboard-images/project-solar2.jpg" class="card-img mb-3" alt="...">
                                <a href="/USER/services/bookappointments/service.php" class="btn btn-primary">Inquire Now</a>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Project 1</div>
                            </div>
                            <div class="card-body">
                                <img src="../../assets/images/mrm-images/dashboard-images/project-solar3.jpg" class="card-img mb-3" alt="...">
                                <a href="/USER/services/bookappointments/service.php" class="btn btn-primary">Inquire Now</a>
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
</body>

</html>

<!-- 
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
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
            events: function(info, successCallback, failureCallback) {
                $.ajax({
                    url: 'fetch_appointments.php',
                    dataType: 'json',
                    success: function(data) {
                        successCallback(data);
                    },
                    error: function() {
                        failureCallback();
                    }
                });
            },
            eventClick: function(info) {
              
                $('#eventDetailsModal .modal-title').text(info.event.title); 
                $('#eventDetailsModal .modal-body').html(`
                    <p><strong>Name:</strong> ${info.event.extendedProps.first_name}</p>
                    <p><strong>Location:</strong> ${info.event.extendedProps.pin_location}</p>
                    <p><strong>Date:</strong> ${info.event.extendedProps.date}</p>
                    <p><strong>Start Time:</strong> ${info.event.extendedProps.start_time}</p>
                    <p><strong>End Time:</strong> ${info.event.extendedProps.end_time}</p>
                    <p><strong>Payment Status:</strong> ${info.event.extendedProps.payment_status}</p>
                    <p><strong>Booking Status:</strong> ${info.event.extendedProps.booking_status}</p>
                    <p><strong>Payment:</strong> ${info.event.extendedProps.payment}</p>
                `);
                $('#eventDetailsModal').modal('show');
            },
            eventColor: '#007bff',
            eventTextColor: '#ffffff', 
            eventRender: function(info) {
                
                return info.event.title; 
            }
        });

        calendar.render();
    });
</script> -->

