<?php 
  session_start();

  if(isset($_SESSION['login'])){
      if($_SESSION['login'] == true)  {
        $role = $_SESSION['role'];
        if($role == 'user'){
          header("location: /USER/dashboard/user-dashboard.php");
          exit();
      }
      else{
          header("location: /ADMIN/accountManagement/accountcontrol/user-management.php");
          exit();
      }
    }
  }


  
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']); // Clear the message after displaying it
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
      <div class="container d-flex justify-content-center">
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="text-center">
              <div class="card mb-0 border-0">
                <div class="card-body">
                  <form
                    id="forgot_req"
                    method="POST"
                    action="forgot_password_function.php"
                  >
                    <h1
                      class="text-start pb-4 d-flex justify-content-center text-secondary fw-bold"
                    >
                      FORGOT PASSWORD
                    </h1>
                    <p>Enter your email of your account which will receive the password reset mail.</p>
                    <!-- Email and Password Row -->
                    <div class="row">
                      <div class="form-floating text-start mb-3">
                        <input
                          class="form-control rounded-2"
                          placeholder=""
                          type="email"
                          name="email"
                          id="su_email"
                        />
                        <label for="su_email" class="text-muted">Email Address</label>
                      </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="d-grid pb-2">
                      <button
                        type="submit"
                        name="forgotsent"
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
        $("#forgot_req").on("submit", function (e) {
          e.preventDefault(); // Prevent default form submission
          if($("#su_email").val() == ""){
            Swal.fire({
                  title: "Error!",
                  text: "Enter an email first",
                  icon: "warning",
                  confirmButtonText: "ok",
                });
          }
          else{
            var formData = {
              email: $("#su_email").val(),
              forgotsent: true,
            };

            $.ajax({
              type: "POST",
              url: "forgot_password_function.php",
              data: formData,
              dataType: "json",
              beforeSend: function () {
                $("#loadingOverlay").show(); // Show the loading indicator
              },
              success: function (response) {
                $("#loadingOverlay").hide(); // Hide the loading indicator
                if (response.success) {
                  Swal.fire({
                    title: "Success",
                    text: "Request of new password has been sent to your email",
                    icon: "success",
                    allowOutsideClick: false,
                  });
                  $("#signupmodal").modal("hide");
                  //  window.location.href = "USER/generator/generator.php";
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
