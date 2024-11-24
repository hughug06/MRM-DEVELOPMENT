<?php 

require 'Database/database.php';
session_start();

$key = "ansdlakjsdfuasduid";  // Must be the same key used for encryption

if (isset($_GET['id']) && isset($_GET['iv'])) {
    // Get the encrypted ID and IV from the URL parameters
    $encrypted_id = base64_decode($_GET['id']);
    $encoded_iv = base64_decode($_GET['iv']);

    // Decrypt the ID using openssl_decrypt
    $id = openssl_decrypt($encrypted_id, 'aes-256-cbc', $key, 0, $encoded_iv);

    // Now you have the original ID, proceed with your logic
    if ($id) {
        // Prepare the SQL query with a placeholder
        $sql_select = "SELECT * FROM accounts WHERE account_id = ?";
        $stmt = $conn->prepare($sql_select); // Prepare the query
        $stmt->bind_param("i", $id); // Bind the 'id' as an integer parameter
        $stmt->execute(); // Execute the query
        $select_result = $stmt->get_result(); // Get the result

        // Check if any results were returned
        if ($select_result->num_rows > 0) {
            $row = $select_result->fetch_array(MYSQLI_ASSOC); // Fetch the result as an associative array
            
            if ($row['re_password_request'] == 1) {
                // If re_password_request is 1, you can update or take further actions here
                // Example (uncomment if necessary):
                // $sql_update = "UPDATE accounts SET re_password_request = 0 WHERE account_id = ?";
                // $stmt_update = $conn->prepare($sql_update);
                // $stmt_update->bind_param("i", $id);
                // $stmt_update->execute();
            } else {
                // Show an error if the reset password request is not found (using SweetAlert)
                echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Error!",
                        text: "The account has no reset password request.",
                        icon: "error",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.href = "index.php";
                    });
                }); 
                </script>';
            }
        } else {
            // If no matching account found
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Error!",
                    text: "Account not found.",
                    icon: "error",
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location.href = "index.php";
                });
            });
            </script>';
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // If 'id' is not a valid numeric value, show an error
        echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Error!",
                text: "Invalid account ID.",
                icon: "error",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "index.php";
            });
        });
        </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="assets/css/icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/landing_assets/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/landing_assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/landing_assets/css/styles.css" />
    <link rel="icon" href="assets/landing_assets/images/logo-mrm.png" />
    <title>
    MRM-EG Company</title>
    <style>
      .reveal {
        opacity: 0;
        transform: translateY(100px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
      }

      .reveal.scroll-up, .reveal.scroll-down {
        opacity: 1;
        transform: translateY(0);
      }

    </style>
  </head>
  <body>

      <?php 
        require 'Database/database.php'; 
        $sql = "SELECT * FROM landing_page_info WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $id = 1;
        $stmt->bind_param("i", $id); // Replace $productId with the actual ID or dynamic ID
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        $descs = json_decode($row["description"], true);
      ?>
  
    <nav class="navbar navbar-expand-lg sticky-top navbar-light">
      <div class="container">
        <a href="index.php" class="navbar-brand d-flex">
          <img
            src="assets/landing_assets/images/logo-mrm.png"
            alt=""
            width="65"
          />
          <h1 class="my-auto">
            <span class="text-secondary">MRM</span
            ><span class="text-primary">-EG</span>
          </h1>
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <header class="header position-relative mt-3 mb-6 overflow-hidden">
      <img
        src="assets/landing_assets/images/decoraiton-star-circle.svg"
        alt=""
        class="decoration-star position-absolute"
      />
      <img
        src="assets/landing_assets/images/decoraiton-star-circle.svg"
        alt=""
        class="decoration-star-2 position-absolute"
      />
    </header>

    <section>
    <div class="row my-6">
        <div class="text-center">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="card mb-0 border-0">
              <div class="row row-sm gx-0">
                <div class="col-lg-7 col-xl-7 col-xs-12 col-sm-12 login_form">
                  <div class="main-container container-fluid">
                    <div class="row row-sm gx-0">
                      <div class="card-body p-5">
                        <form
                          id="change"
                          method="POST"
                          action="forgot_password_function.php"
                        >
                          <h1
                            class="text-start pb-4 d-flex justify-content-center text-secondary fw-bold"
                          >
                            RESET PASSWORD
                          </h1>
                          <p>Enter your new password.</p>
                          

                          <div class="row">
                            <div class="form-floating text-start mb-3">
                              <h5>Password</h5>
                              <input
                                class="form-control rounded-2"
                                placeholder="Password"
                                type="password"
                                name="password"
                                id="password"
                              />
                            </div>
                            <div class="form-floating text-start mb-3">
                            <h5>Confirm Password</h5>
                                <input
                                  class="form-control rounded-2"
                                  placeholder="Confirm Password"
                                  type="password"
                                  name="con_password"
                                  id="con_password"
                                />
                                <input
                                  type="hidden"
                                  name="acc_id"
                                  id="acc_id"
                                  value="<?php echo openssl_decrypt($encrypted_id, 'aes-256-cbc', $key, 0, $encoded_iv) ?>"
                                />
                            </div>
                          </div>


                          <!-- Submit Button -->
                          <div class="d-grid pb-2">
                            <button
                              type="submit"
                              class="btn btn-secondary text-white py-2 fw-bold"
                            >
                              Continue
                            </button>
                          </div>
                        </form>
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
    </section>

    <footer class="bg-light py-6">
      <div class="container">
        <div class="row">
          <div class="col-md-4 my-3">
            <h6>About MRM-EG</h6>
            <p>
            <?php echo $descs["about"] ?>
              
            </p>
          </div>
          <div class="col-md-4 my-3">
            <h6>Links</h6>
            <ul class="list-unstyled">
              <li>
                Important: <a href="">Terms & Conditions</a>,
                <a href="">Privacy Policy</a>
              </li>
              <li>
                Useful: <a href="">About</a>,
                <a href="">Company</a>
              </li>
              <li>
                Menu: <a href="#Home">Home</a>, <a href="#Details">Details</a>,
                <a href="#Services">Services</a>
                <a href="#Register">Register</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 my-3">
            <div class="mb-4">
              <a href="" class="text-decoration-none">
                <i class="fab fa-facebook fa-3x text-dark mx-2"></i>
              </a>
              <a href="" class="text-decoration-none">
                <i class="fab fa-instagram fa-3x text-dark mx-2"></i>
              </a>
              <a href="" class="text-decoration-none">
                <i class="fab fa-twitter fa-3x text-dark mx-2"></i>
              </a>
              <a href="" class="text-decoration-none">
                <i class="fab fa-google fa-3x text-dark mx-2"></i>
              </a>
            </div>
            <p>
              We would love to hear from you
              <a href=""><strong>mrm-eg@site.com</strong></a>
            </p>
          </div>
        </div>
      </div>
    </footer>

    <?php
    ?>





      <div id="loadingOverlay" style="display:none;">
        <div class="spinner">
            <div class="spinner-text">Loading...</div> <!-- Optional text inside the spinner -->
        </div>
      </div>
      
    </div>

    <script src="assets/landing_assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/landing_assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
      $(document).ready(function () {
        $("#change").on("submit", function (e) {
          e.preventDefault(); // Prevent default form submission
          if($("#password").val() == "" || $("con_password").val() == ""){
            Swal.fire({
                  title: "Error!",
                  text: "Complete the form first",
                  icon: "warning",
                  confirmButtonText: "ok",
                });
          }
          else if($("#password").val() !== $("#con_password").val()){
            Swal.fire({
                  title: "Error!",
                  text: "Password and Confirm Password does not match",
                  icon: "warning",
                  confirmButtonText: "ok",
                });
          }
          else{
            var formData = {
              password: $("#password").val(),
              change: true,
              id:$("#acc_id").val(),
            };

            $.ajax({
              type: "POST",
              url: "change_password.php",
              data: formData,
              dataType: "json",
              beforeSend: function () {
                $("#loadingOverlay").show(); // Show the loading indicator
              },
              success: function (response) {
                $("#loadingOverlay").hide(); // Hide the loading indicator
                if (response.success) {
                  Swal.fire({
                    title: "Password Changed",
                    text: "password has been saved",
                    icon: "success",
                    allowOutsideClick: false,
                  }).then(() => {
                    $("#signupmodal").modal("hide");
                    window.location.href = "index.php";
                  });
                } else {
                  Swal.fire({
                    title: "Error!",
                    text: response.message,
                    icon: "error",
                    confirmButtonText: "ok",
                  });
                }
              },
              error: function (xhr, status, error) {
                $("#loadingOverlay").hide(); // Hide the loading indicator
                alert(xhr.responseText);
                
              },
            });
          }
        });
      });
    </script>
  </body>
</html>
