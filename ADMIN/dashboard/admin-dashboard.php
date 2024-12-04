<?php
require_once '../authetincation.php';
include_once '../../Database/database.php';
function formatMoney($number) {
    return number_format($number, 2, '.', ',');
}

  // SQL query to count clients, workers, and agents
  $sql = "SELECT 
  role,
  COUNT(*) AS role_count
FROM 
  accounts
WHERE
  role IN ('client', 'worker', 'agent')
GROUP BY 
  role";

   $sql2 = "SELECT 
   booking_status,
   COUNT(*) AS booking_status_count
 FROM 
   service_booking
 WHERE
   booking_status IN ('pending', 'ongoing', 'completed')
 GROUP BY 
   booking_status";

  $result = mysqli_query($conn , $sql);
  $result2 = mysqli_query($conn , $sql2);
        //hold the value of number of role
        $clientCount = 0;
        $workerCount = 0;
        $agentCount = 0;

         //hold the value of number of booking status
         $pendingCount = 0;
         $ongoingCount = 0;
         $completedCount = 0;

    
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['role'] == 'client') {
            $clientCount = $row['role_count'];
        } elseif ($row['role'] == 'worker') {
            $workerCount = $row['role_count'];
        } elseif ($row['role'] == 'agent') {
            $agentCount = $row['role_count'];
        }
    }

    while ($row2= mysqli_fetch_assoc($result2)) {
        if ($row2['booking_status'] == 'pending') {
            $pendingCount = $row2['booking_status_count'];
        } elseif ($row2['booking_status'] == 'ongoing') {
            $ongoingCount = $row2['booking_status_count'];
        } elseif ($row2['booking_status'] == 'completed') {
            $completedCount = $row2['booking_status_count'];
        }
    }

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


        <script type="text/javascript">
    // Load Tawk.to Widget
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6730d9822480f5b4f59b5f52/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    #admin-chat-container {
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 8px;
    }
    #chat-messages {
      height: 300px;
      overflow-y: scroll;
      border: 1px solid #ddd;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 8px;
    }
    #chat-messages p {
      margin: 5px 0;
    }
    #admin-input {
      display: flex;
      gap: 10px;
    }
    #admin-input input {
      flex-grow: 1;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    #admin-input button {
      padding: 8px 12px;
      background-color: #28a745;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    #admin-input button:hover {
      background-color: #218838;
    }
  </style>
    </head>

    <body>


        <div class="page">
            



            <!-- app-header -->
            <?php include_once('../../partials/header.php') ?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once('../../partials/sidebar.php') ?>
            <!-- End::app-sidebar -->


            <h1>Admin Chat Interface</h1>
  <div id="admin-chat-container">
    <div id="chat-messages">
      <!-- Chat messages will appear here -->
    </div>
    <div id="admin-input">
      <input type="text" id="message" placeholder="Type your message...">
      <button onclick="sendMessage()">Send</button>
    </div>
  </div>

  <script>
    // Tawk.to Admin Chat API Logic
    document.addEventListener("DOMContentLoaded", function() {
      // Tawk.to's onLoad event
      Tawk_API.onLoad = function() {
        console.log("Tawk.to widget loaded successfully.");
        listenForMessages();
      };
    });

    // Listen for incoming messages
    function listenForMessages() {
      Tawk_API.onChatMaximized = function() {
        console.log("Chat opened by client.");
      };

      Tawk_API.onChatMinimized = function() {
        console.log("Chat minimized by client.");
      };

      Tawk_API.onChatMessageSent = function(message) {
        addMessageToChat("Admin", message);
      };

      Tawk_API.onChatMessageReceived = function(message) {
        addMessageToChat("Client", message);
      };
    }

    // Display messages in the chat box
    function addMessageToChat(sender, message) {
      const chatMessages = document.getElementById("chat-messages");
      const newMessage = document.createElement("p");
      newMessage.textContent = `${sender}: ${message}`;
      chatMessages.appendChild(newMessage);

      // Auto-scroll to the latest message
      chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Send a message from the admin
    function sendMessage() {
      const messageInput = document.getElementById("message");
      const message = messageInput.value;

      if (message.trim() === "") return;

      // Send message via Tawk.to API
      Tawk_API.addMessage(message);

      // Clear the input field
      messageInput.value = "";
    }
  </script>


            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                        <div>
                            <h2 class="main-content-title fs-24 mb-1">Welcome To Dashboard</h2>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Project Dashboard</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row row-sm">
                        <div class="col-sm-4 col-md-4 col-xl-2">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-order">
                                        <label class="main-content-label mb-3 pt-1">Payment checking</label>
                                        <h2 class="text-end"><i class="mdi mdi-cube icon-size float-start text-primary"></i><span class="fw-bold"><?= $pendingCount ?></span></h2>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xl-2">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-order">
                                        <label class="main-content-label mb-3 pt-1">On going project</label>
                                        <h2 class="text-end"><i class="mdi mdi-cube icon-size float-start text-primary"></i><span class="fw-bold"><?= $ongoingCount ?></span></h2>                          
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xl-2">
                            <div class="card custom-card">
                                <div class="card-body">
                                <div class="card-order">
                                    <label class="main-content-label mb-3 pt-1">Completed projects</label>
                                    <h2 class="text-end">
                                        <i class="mdi mdi-cube icon-size float-start text-primary"></i>
                                        <span class="fw-bold"><?= $completedCount ?></span>
                                    </h2>     
                                </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xl-2">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-order">
                                        <label class="main-content-label mb-3 pt-1">Number of agent</label>
                                        <h2 class="text-end"><i class="mdi mdi-cube icon-size float-start text-primary"></i><span class="fw-bold"><?= $agentCount ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xl-2">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-order">
                                        <label class="main-content-label mb-3 pt-1">Number of worker</label>
                                        <h2 class="text-end"><i class="mdi mdi-cube icon-size float-start text-primary"></i><span class="fw-bold"><?= $workerCount ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xl-2">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-order">
                                        <label class="main-content-label mb-3 pt-1">Number of client</label>
                                        <h2 class="text-end"><i class="mdi mdi-cube icon-size float-start text-primary"></i><span class="fw-bold"><?= $clientCount ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div>
                                        <div class="row row-sm">
                                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                                <div class="card custom-card">
                                                    <div class="card-header border-bottom-0">
                                                        <div>
                                                            <div class="card-title">On going projects</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pt-3">
                                                        <div class="table-responsive tasks">
                                                        <table class="table card-table table-vcenter text-nowrap border">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-lg-20p">#</th>
                                                                                <th class="wd-lg-20p">CLIENT NAME</th>
                                                                                <th class="wd-lg-20p">LOCATION</th>
                                                                                <th class="wd-lg-20p">PAYMENT STATUS</th>
                                                                                <th class="wd-lg-20p">AMOUNT TO PAY</th>
                                                                                <th class="wd-lg-20p">PROJECT PROGRESS</th>
                                                                                <th class="wd-lg-20p">STATUS</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                                $ongoing = "SELECT * FROM service_booking
                                                                                            INNER JOIN worker_ongoing ON service_booking.booking_id = worker_ongoing.booking_id
                                                                                            INNER JOIN user_info on user_info.user_id = service_booking.user_id 
                                                                                            INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id     
                                                                                            WHERE status != 'completed'";
                                                                                $result_ongoing = mysqli_query($conn, $ongoing);
                                                                                if (mysqli_num_rows($result_ongoing) > 0) {
                                                                                    // Define progress mapping for each enum status
                                                                                    $statusMap = [
                                                                                        'pick_up' => 16, // 1/6 of 100%
                                                                                        'delivery' => 33, // 2/6 of 100%
                                                                                        'arrive' => 50, // 3/6 of 100%
                                                                                        'ongoing_construction' => 66, // 4/6 of 100%
                                                                                        'checking' => 83, // 5/6 of 100%
                                                                                        'completed' => 100 // 6/6 of 100%
                                                                                    ];

                                                                                    while ($row = mysqli_fetch_assoc($result_ongoing)) {
                                                                                        // Get the current progress percentage based on the status
                                                                                        $status = $row['status'];
                                                                                        $progressPercentage = $statusMap[$status] ?? 0; // Default to 0 if status is not found
                                                                            ?>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td><?= htmlspecialchars($row['first_name']) .' '. htmlspecialchars($row['last_name'])  ?></td>
                                                                                <td><?= htmlspecialchars($row['pin_location']) ?></td>
                                                                                <td><?= htmlspecialchars($row['payment_status']) ?></td>
                                                                                <td><?= htmlspecialchars($row['total_cost']) ?></td>
                                                                                <td>
                                                                                    <div class="progress" style="height: 20px;">
                                                                                        <div class="progress-bar bg-success" role="progressbar" 
                                                                                            style="width: <?= $progressPercentage; ?>%;" 
                                                                                            aria-valuenow="<?= $progressPercentage; ?>" 
                                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                                            <?= $progressPercentage; ?>%
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-start"><a href="javascript:void(0);" class="text-success"><?= htmlspecialchars($row['status']) ?></a></td>
                                                                                <!-- Button to trigger the modal with data attributes -->
                                                                                <td>
                                                                                    <button class="btn btn-primary" 
                                                                                            data-bs-toggle="modal" 
                                                                                            data-bs-target="#paymentLogModal"
                                                                                            data-first-payment="<?php echo $row['first_payment']; ?>"
                                                                                            data-second-payment="<?php echo $row['second_payment']; ?>"
                                                                                            data-third-payment="<?php echo $row['third_payment']; ?>"
                                                                                            data-first-reference="<?php echo $row['first_reference']; ?>"
                                                                                            data-second-reference="<?php echo $row['second_reference']; ?>"
                                                                                            data-third-reference="<?php echo $row['third_reference']; ?>">
                                                                                        <i class="fas fa-credit-card"></i> <!-- Payment icon from FontAwesome -->
                                                                                    </button>
                                                                                </td>

                                                                            </tr>
                                                                            <?php 
                                                                                    }
                                                                                }
                                                                                else{
                                                                                    echo "<td class='text-center align-middle text-danger'>no ongoing works</td>";
                                                                                }
                                                                            ?>                                                     
                                                                        </tbody>

                                                                    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                                                            <!-- Modal -->
                                                            <div class="modal fade" id="paymentLogModal" tabindex="-1" aria-labelledby="paymentLogModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="paymentLogModalLabel">Payment Log</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Initial Payment Section -->
                                                                                    <div class="payment-section">
                                                                                    <h6 class="fw-bold">Initial Payment</h6>
                                                                                    <p id="first-payment-status" class="text-muted"></p>
                                                                                    <table class="table table-sm">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">Reference Number</th>
                                                                                            <th scope="col">Amount</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td id="first-reference"></td>
                                                                                            <td id="first-payment"></td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    </div>

                                                                                    <!-- Second Payment Section -->
                                                                                    <div class="payment-section">
                                                                                    <h6 class="fw-bold">Second Payment</h6>
                                                                                    <p id="second-payment-status" class="text-muted"></p>
                                                                                    <table class="table table-sm">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">Reference Number</th>
                                                                                            <th scope="col">Amount</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td id="second-reference"></td>
                                                                                            <td id="second-payment"></td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    </div>

                                                                                    <!-- Last Payment Section -->
                                                                                    <div class="payment-section">
                                                                                    <h6 class="fw-bold">Last Payment</h6>
                                                                                    <p id="third-payment-status" class="text-muted"></p>
                                                                                    <table class="table table-sm">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">Reference Number</th>
                                                                                            <th scope="col">Amount</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td id="third-reference"></td>
                                                                                            <td id="third-payment"></td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                    <div class="row row-sm">
                        <div class="col-sm-12 col-lg-12 col-xl-8">
                            <div class="row row-sm">
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <div class="card-title">Generator Stocks</div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="chartjs-bar2" class="chartjs-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <div class="card-title">Solar Panel Stocks</div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="chartjs-bar" class="chartjs-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="row row-sm">
                                        <div class="col-sm-12 col-lg-12 col-xl-6">
                                            <div class="card custom-card">
                                                <div class="card-header">
                                                    <div class="card-title">Out of Stocks</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive userlist-table">
                                                        <div class="row">
                                                            <div class="col-xl-12 mb-3">
                                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                                    <thead>Solar Panel</thead>
                                                                    <tbody>
                                                                    <?php 
                                                                        require '../../Database/database.php';                                          
                                                                        $select = "Select * from products Where ProductType = 'Solar Panel' and stock =0";
                                                                        $result = mysqli_query($conn , $select);
                                                                        if(mysqli_num_rows($result) > 0){
                                                                            foreach($result as $resultItem){
                                                                                ?>
                                                                                    <tr>
                                                                                        <td class="text-danger">Item: "<?php echo $resultItem['ProductName'] ?>" has 0 stock!</td>
                                                                                    </tr>
                                                                                <?php
                                                                            }      
                                                                        }
                                                                        else{
                                                                        ?>
                                                                            <tr>
                                                                                <td>All items on Solar Panel have stocks</td>   
                                                                            </tr>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-xl-12 mb-3">
                                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                                    <thead>Generator</thead>
                                                                    <tbody>
                                                                        <?php 
                                                                        require '../../Database/database.php';                                          
                                                                        $select = "Select * from products Where ProductType = 'Generator' and stock =0";
                                                                        $result = mysqli_query($conn , $select);
                                                                        if(mysqli_num_rows($result) > 0){
                                                                            foreach($result as $resultItem){
                                                                                ?>
                                                                                    <tr>
                                                                                        <td class="text-danger">Item: "<?php echo $resultItem['ProductName'] ?>" has 0 stock!</td>
                                                                                    </tr>
                                                                                <?php
                                                                            }      
                                                                        }
                                                                        else{
                                                                        ?>
                                                                            <tr>
                                                                            <td>All items on Generator have stocks</td>    
                                                                            </tr>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-xl-6">
                                            <div class="card custom-card">
                                                <div class="card-header">
                                                    <div class="card-title">Stocks</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive userlist-table">
                                                        <div class="row">
                                                            <div class="col-xl-12 mb-3">
                                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                                    <thead>Total Solar Panel in Stocks</thead>
                                                                    <tbody>
                                                                        <?php 
                                                                        require '../../Database/database.php';                                          
                                                                        $select = "Select * from products Where ProductType = 'Solar Panel'";
                                                                        $result = mysqli_query($conn , $select);
                                                                        $total = 0.00;
                                                                        if(mysqli_num_rows($result) > 0){
                                                                            foreach($result as $resultItem){
                                                                                $total = $total + $resultItem['stock'];
                                                                            }      
                                                                        ?>
                                                                            <tr>
                                                                                <td><?php echo $total ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        else{
                                                                        ?>
                                                                            <tr>
                                                                                <td>Empty</td>   
                                                                            </tr>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-xl-12 mb-3">
                                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                                    <thead>Total Generator in Stocks</thead>
                                                                    <tbody>
                                                                        <?php 
                                                                        require '../../Database/database.php';                                          
                                                                        $select = "Select * from products Where ProductType = 'Generator'";
                                                                        $result = mysqli_query($conn , $select);
                                                                        $total = 0.00;
                                                                        if(mysqli_num_rows($result) > 0){
                                                                            foreach($result as $resultItem){
                                                                                $total = $total + $resultItem['stock'];
                                                                            }      
                                                                        ?>
                                                                            <tr>
                                                                                <td><?php echo $total ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        else{
                                                                        ?>
                                                                            <tr>
                                                                                <td>Empty</td>   
                                                                            </tr>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
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
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Stock Status</div>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive userlist-table mb-3">
                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                            <thead>Solar Panel Stock List</thead>
                                            <tbody>
                                            <?php 
                                            require '../../Database/database.php';                                          
                                            $select = "Select * from products where ProductType = 'Solar Panel' and stock <= 50";
                                            $result = mysqli_query($conn , $select);
                                            if(mysqli_num_rows($result) > 0){
                                                foreach($result as $resultItem){
                                                    ?> 
                                                    <tr>
                                                    <td class="text-warning">Item: "<?= $resultItem['ProductName']?>" is low on stocks! stocks left: <?= $resultItem['stock']?></td>     
                                                </tr>

                                                    <?php 
                                                }
                                                
                                                }
                                                else{
                                                ?>
                                                    <tr>
                                                        <td>No low stocks for Solar Panels</td>   
                                                    </tr>
                                                <?php 
                                                }
                                                ?>
                                                        
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive userlist-table">
                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                            <thead>Generator Stock List</thead>
                                            <tbody>
                                            <?php 
                                            require '../../Database/database.php';                                          
                                            $select = "Select * from products where ProductType = 'Generator' and stock <= 5";
                                            $result = mysqli_query($conn , $select);
                                            if(mysqli_num_rows($result) > 0){
                                                foreach($result as $resultItem){
                                                    ?> 
                                                    <tr>
                                                        <td class="text-warning">Item: "<?= $resultItem['ProductName']?>" is low on stocks! stocks left: <?= $resultItem['stock']?></td>   
                                                    </tr>

                                                    <?php 
                                                }
                                                
                                            }
                                            else{
                                                ?>
                                                    <tr>
                                                        <td>No low stocks for Generators</td>   
                                                    </tr>
                                                <?php 
                                            }
                                            ?>
                                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Stock Value</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Total Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Total Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['price'] * $resultItem['stock'];
                                                            $total = $total + $product_total;
                                                        }      
                                                    ?>
                                                        <tr>
                                                            <td>₱<?php echo formatMoney($total) ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                        <tr>
                                                            <td>Empty</td>   
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Solar Total Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Solar Panel Total Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products Where ProductType = 'Solar Panel'";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['price'] * $resultItem['stock'];
                                                            $total = $total + $product_total;
                                                        }      
                                                    ?>
                                                        <tr>
                                                            <td>₱<?php echo formatMoney($total) ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                        <tr>
                                                            <td>Empty</td>   
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Gen Total Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Generator Total Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products Where ProductType = 'Generator'";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['price'] * $resultItem['stock'];
                                                            $total = $total + $product_total;
                                                        }      
                                                    ?>
                                                        <tr>
                                                            <td>₱<?php echo formatMoney($total) ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                        <tr>
                                                            <td>Empty</td>   
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>

            <!-- Footer Start -->
            <?php include_once('../../partials/footer.php') ?>
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
        
        <!-- Custom JS -->
        <script src="../../assets/js/custom.js"></script>

        <!-- Chartjs Chart JS -->
        <script src="../../assets/libs/chart.js/chart.min.js"></script>

        <script>
            // Stock data for solar panel
            const solar = {
                products: [
                    <?php 
                    require '../../Database/database.php';                                          
                    $select = "SELECT * FROM products where ProductType = 'Solar Panel'";
                    $result = mysqli_query($conn, $select);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $productNames = [];
                        foreach ($result as $resultItem) {
                            $productNames[] = json_encode($resultItem['ProductName']);
                        }
                        echo implode(", ", $productNames);
                    }
                    ?>
                    
                ],
                stockLevels: [
                    <?php 
                    require '../../Database/database.php';                                          
                    $select = "SELECT * FROM products where ProductType = 'Solar Panel'";
                    $result = mysqli_query($conn, $select);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $stockLevels = [];
                        foreach ($result as $resultItem) {
                            $stockLevels[] = (int)$resultItem['stock']; // Ensure stock levels are integers
                        }
                        echo implode(", ", $stockLevels);
                    }
                    ?>
                ]
            };
            // Stock data for generator
            const generator = {
                products: [
                    <?php 
                    require '../../Database/database.php';                                          
                    $select = "SELECT * FROM products where ProductType = 'Generator'";
                    $result = mysqli_query($conn, $select);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $productNames = [];
                        foreach ($result as $resultItem) {
                            $productNames[] = json_encode($resultItem['ProductName']);
                        }
                        echo implode(", ", $productNames);
                    }
                    ?>
                    
                ],
                stockLevels: [
                    <?php 
                    require '../../Database/database.php';                                          
                    $select = "SELECT * FROM products where ProductType = 'Generator'";
                    $result = mysqli_query($conn, $select);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $stockLevels = [];
                        foreach ($result as $resultItem) {
                            $stockLevels[] = (int)$resultItem['stock']; // Ensure stock levels are integers
                        }
                        echo implode(", ", $stockLevels);
                    }
                    ?>
                ]
            };


            // Define the data for solar
            const data1 = {
                labels: solar.products,
                datasets: [{
                    label: 'Stock Levels',
                    data: solar.stockLevels,
                    backgroundColor: [
                        'rgba(98, 89, 202, 0.2)',
                        'rgba(1, 184, 255, 0.2)',
                        'rgba(255, 155, 33, 0.2)',
                        'rgba(0, 204, 204, 0.2)'
                    ],
                    borderColor: [
                        'rgb(98, 89, 202)',
                        'rgb(1, 184, 255)',
                        'rgb(255, 155, 33)',
                        'rgb(0, 204, 204)'
                    ],
                    borderWidth: 1
                }]
            };

            // Define the data for generator
            const data2 = {
                labels: generator.products,
                datasets: [{
                    label: 'Stock Levels',
                    data: generator.stockLevels,
                    backgroundColor: [
                        'rgba(98, 89, 202, 0.2)',
                        'rgba(1, 184, 255, 0.2)',
                        'rgba(255, 155, 33, 0.2)',
                        'rgba(0, 204, 204, 0.2)'
                    ],
                    borderColor: [
                        'rgb(98, 89, 202)',
                        'rgb(1, 184, 255)',
                        'rgb(255, 155, 33)',
                        'rgb(0, 204, 204)'
                    ],
                    borderWidth: 1
                }]
            };
            
            // Define the chart configuration for solar
            const config1 = {
                type: 'bar',
                data: data1,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // Define the chart configuration for generator
            const config2 = {
                type: 'bar',
                data: data2,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            
            // Create the chart for solar
            const myChart1 = new Chart(
                document.getElementById('chartjs-bar'),
                config1
            );

            // Create the chart for generator
            const myChart2 = new Chart(
                document.getElementById('chartjs-bar2'),
                config2
            );

        </script>

    </body>

</html>

<script>
  // JavaScript to populate modal with data when button is clicked
  var paymentLogModal = document.getElementById('paymentLogModal');
  paymentLogModal.addEventListener('show.bs.modal', function (event) {
    // Get the button that triggered the modal
    var button = event.relatedTarget;

    // Get data attributes from the button
    var firstPayment = button.getAttribute('data-first-payment');
    var secondPayment = button.getAttribute('data-second-payment');
    var thirdPayment = button.getAttribute('data-third-payment');
    var firstReference = button.getAttribute('data-first-reference');
    var secondReference = button.getAttribute('data-second-reference');
    var thirdReference = button.getAttribute('data-third-reference');

    // Set the modal content dynamically for the first payment
    if (firstPayment === 'null' || firstPayment === '') {
      document.getElementById('first-payment-status').textContent = 'The client has not paid';
      document.getElementById('first-reference').textContent = '';
      document.getElementById('first-payment').textContent = '';
    } else {
      document.getElementById('first-payment-status').textContent = '';
      document.getElementById('first-reference').textContent = firstReference;
      document.getElementById('first-payment').textContent = firstPayment;
    }

    // Set the modal content dynamically for the second payment
    if (secondPayment === 'null' || secondPayment === '') {
      document.getElementById('second-payment-status').textContent = 'The client has not paid';
      document.getElementById('second-reference').textContent = '';
      document.getElementById('second-payment').textContent = '';
    } else {
      document.getElementById('second-payment-status').textContent = '';
      document.getElementById('second-reference').textContent = secondReference;
      document.getElementById('second-payment').textContent = secondPayment;
    }

    // Set the modal content dynamically for the third payment
    if (thirdPayment === 'null' || thirdPayment === '') {
      document.getElementById('third-payment-status').textContent = 'The client has not paid';
      document.getElementById('third-reference').textContent = '';
      document.getElementById('third-payment').textContent = '';
    } else {
      document.getElementById('third-payment-status').textContent = '';
      document.getElementById('third-reference').textContent = thirdReference;
      document.getElementById('third-payment').textContent = thirdPayment;
    }
  });
</script>

<script>
    document.querySelectorAll('.report-btn').forEach(button => {
    button.addEventListener('click', () => {
        const reportType = button.getAttribute('data-type'); // Get report type (weekly, monthly, yearly)
        
        fetch('fetch_sales_reports.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ type: reportType })
        })
        .then(response => response.json())
        .then(data => {
            // Update the report amount dynamically
            document.getElementById('report-amount').textContent = `$${data.total_cost.toFixed(2)}`;
        })
        .catch(error => console.error('Error fetching reports:', error));
    });
});

</script>