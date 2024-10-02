<?php
//get the data from service.php after the book trigger

require_once '../../Database/database.php';
require_once '../../ADMIN/authetincation.php';
if (isset($_GET['availability_id'], $_GET['date'], $_GET['start_time'], $_GET['end_time'])) {
    $_SESSION['availability_id'] = $_GET['availability_id'];
    $_SESSION['date'] = $_GET['date'];
    $_SESSION['start_time'] = $_GET['start_time'];
    $_SESSION['end_time'] = $_GET['end_time'];

    // Now you have the availability_id, date, start_time, and end_time to process further
   // echo "Booking confirmed for availability ID: $availability_id on $date from $start_time to $end_time.";
    
} 




?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php 
    
    include_once(__DIR__. '/../../partials/head.php');
    ?>
    <title> Inquries </title>
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

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
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
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                
                <div class="card">
                        <form class="p-5" action="book_appointment.php" method="POST" id="serviceForm">
                            <h1 class="text-start pb-4 d-flex justify-content-center text-warning">SERVICES</h1>
                            <?php
                            require_once '../../Database/database.php';
                            
                            $user = $_SESSION['user_id'];
                            $sql = "select * from user_info where user_id = '$user'";
                            $result = mysqli_query($conn, $sql);
                        
                            if(mysqli_num_rows($result)) {
                                $row = mysqli_fetch_assoc($result);
                                $name = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']; 
                            ?>
                            <div class="form-group text-start mb-3">
                                <label for="s_fName" class="text-muted">Full Name</label>
                                <input class="form-control" type="text" name="name" id="s_fName" disabled placeholder="" value="<?= $name ?>">
                            </div>

                            <div class="form-group text-start mb-3">
                                <label for="location" class="text-muted">Address</label>
                                <input class="form-control" type="text" name="location" id="location" readonly placeholder="Click to select location" data-bs-toggle="modal" data-bs-target="#mapModal">
                            </div>

                            <?php } ?>
                            
                            <div class="form-group text-start mb-3">
                                <label for="s_Product" class="text-muted">Product</label>
                                <select class="form-control" name="product" id="s_Product">
                                    <option value="">Select Product</option>
                                    <option value="solar">Solar</option>
                                    <option value="generator">Generator</option>
                                </select>
                            </div>
                            
                            <div class="form-group text-start mb-3">
                                <label for="s_Brand" class="text-muted">Brand</label>
                                <select class="form-control" name="" id="product-dummy" style="display:block;">
                                    <option value="">Please select product</option>
                                </select>
                                <select class="form-control" name="brand" id="s_Brand" style="display:none;">
                                    <option value="solar-philippines">Solar Philippines</option>
                                    <option value="enphase-energy">Enphase Energy</option>
                                    <option value="sungrow">Sungrow</option>
                                    <option value="ja-solar">JA Solar</option>
                                    <option value="trina-solar">Trina Solar</option>
                                    <option value="canadian-solar">Canadian Solar</option>
                                    <option value="rec-solar">REC Solar</option>
                                    <option value="longi-solar">Longi Solar</option>
                                    <option value="first-solar">First Solar</option>
                                    <option value="gcl-poly-energy">GCL-Poly Energy</option>
                                    <option value="jinkosolar">JinkoSolar</option>
                                    <option value="sunpower">SunPower</option>
                                    <option value="hanwha-q-cells">Hanwha Q CELLS</option>
                                    <option value="solaric">Solaric</option>
                                    <option value="philsolar">PhilSolar</option>
                                    <option value="solartech">Solartech</option>
                                </select>

                                <select class="form-control" name="brand" id="g_Brand" style="display:none;">
                                    <option value="honda">Honda</option>
                                    <option value="yamaha">Yamaha</option>
                                    <option value="kipor">Kipor</option>
                                    <option value="fogo">Fogo</option>
                                    <option value="kohler">Kohler</option>
                                    <option value="cummins">Cummins</option>
                                    <option value="perkins">Perkins</option>
                                    <option value="volvo-penta">Volvo Penta</option>
                                    <option value="mtu-onsite-energy">MTU Onsite Energy</option>
                                    <option value="isuzu">Isuzu</option>
                                    <option value="powertech">Powertech</option>
                                    <option value="sdmo">SDMO</option>
                                    <option value="atlas-copco">Atlas Copco</option>
                                    <option value="generac">Generac</option>
                                    <option value="sullivan-palatek">Sullivan-Palatek</option>
                                    <option value="caterpillar">Caterpillar</option>
                                    <option value="wanco">Wanco</option>
                                </select>
                            </div>
                            
                            <div class="form-group text-start mb-3">
                                <label for="powerLabel" class="text-muted" id="powerLabel">KVA</label>
                                <input class="form-control" type="text" name="power" id="powerInput" placeholder="">
                            </div>
                            
                            <div class="form-group text-start mb-3">
                                <label for="su_Email" class="text-muted">Running Hours Unit</label>
                                <input class="form-control" type="text" name="running_hours" id="su_Email" placeholder="">
                            </div>
                            
                            <div class="form-group text-start mb-3">
                                <label for="s_Type" class="text-muted">Service Type</label>
                                <select class="form-control" name="service_type" id="s_Type">
                                    <option value="maintenance">Maintenance</option>
                                    <option value="repair">Repair</option>
                                    <option value="installation">Installation</option>
                                    <option value="tune_up">Tune-up</option>
                                </select>
                            </div>

                            <div class="d-flex flex-column align-items-stretch flex-grow mt-5">
                                <button type="submit" name="book" class="btn btn-warning text-white py-2">Book</button>
                            </div>
                        </form>
                    </div>

                    <!-- Map Modal -->
                    <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mapModalLabel">Select Location</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="map"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="saveLocation" data-bs-dismiss="modal">Save Location</button>
                                </div>
                            </div>
                        </div>
                    </div>
  
                </div>
            </div>
            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__. '/../../partials/footer.php') ?>
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
    <!-- <script src="../../assets/js/custom.js"></script> -->

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() { // USE TO HIDE tuneup if the user choose solar
    // Event listener for product selection
    $('#s_Product').on('change', function() {
        var product = $(this).val(); // Get the selected product
        
        // Change the label for KVA/Watts
        if (product === 'generator') {
            $('#powerLabel').text('KVA');  // Change label to KVA for Generator
            $('#s_Type option[value="tune_up"]').prop('disabled', false);  // Enable Tune-up
        } else if (product === 'solar') {
            $('#powerLabel').text('Watts');  // Change label to Watts for Solar
            $('#s_Type option[value="tune_up"]').prop('disabled', true);  // Disable Tune-up
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // SCRIPT USE TO SHOW MAPS AND GET THE VALUE, AND PASS TO LOCATION INPUT
        let map;
        let marker;
        const locationInput = document.getElementById('location');

        // Function to fetch fake location data
        async function fetchFakeLocation() {
            // Simulating an API response
            return new Promise((resolve) => {
                setTimeout(() => {
                    resolve({
                        lat: 15.0824, // Latitude for Luzon
                        lng: 120.5674 // Longitude for Luzon
                    });
                }, 1000); // Simulate network delay
            });
        }

        async function reverseGeocode(lat, lng) {
            const response = await fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json&addressdetails=1`);
            const data = await response.json();
            return data.display_name || "Address not found";
        }

        async function initMap() {
            // Fetch fake location data
            const fakeLocation = await fetchFakeLocation();
            
            // Initialize the map centered on Luzon
            map = L.map('map').setView([fakeLocation.lat, fakeLocation.lng], 8);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            marker = L.marker([fakeLocation.lat, fakeLocation.lng], { draggable: true }).addTo(map);

            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
            });

            marker.on('moveend', async function(e) {
                const address = await reverseGeocode(e.latlng.lat, e.latlng.lng);
                locationInput.value = address;
            });
        }

        document.getElementById('saveLocation').addEventListener('click', async () => {
            const position = marker.getLatLng();
            const address = await reverseGeocode(position.lat, position.lng);
            locationInput.value = address;
            const mapModal = bootstrap.Modal.getInstance(document.getElementById('mapModal'));
            mapModal.hide();
        });

        // Initialize the map as soon as the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', initMap);
    </script>

<script>
    // USE TO SHOW SOLAR OR GENERATOR, IF USER DONT CHOOSE ANYTHING SYSTEM WILL NOT SHOW BRAND
document.getElementById('s_Product').addEventListener('change', function() {
    var selectedProduct = this.value;
    var solarBrandDropdown = document.getElementById('s_Brand');
    var generatorBrandDropdown = document.getElementById('g_Brand');
    var productdummy = document.getElementById('product-dummy');

    if (selectedProduct === 'solar') {
        solarBrandDropdown.style.display = 'block';
        generatorBrandDropdown.style.display = 'none';
        productdummy.style.display = 'none';
    } else if (selectedProduct === 'generator') {
        solarBrandDropdown.style.display = 'none';
        generatorBrandDropdown.style.display = 'block';
        productdummy.style.display = 'none';
    } else {
        solarBrandDropdown.style.display = 'none';
        generatorBrandDropdown.style.display = 'none';
        productdummy.style.display = 'block';
    }
});
</script>
