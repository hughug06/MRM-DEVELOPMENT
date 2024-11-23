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

            $titles = json_decode($row["title"], true);
            $descs = json_decode($row["description"], true);
            $goals = json_decode($row["goals"], true);
            $faqs = json_decode($row["faq"], true);
            $projects = json_decode($row["projects"], true);
            $user_experience = json_decode($row["user_experience"], true);

      ?>
  
    <nav class="navbar navbar-expand-lg sticky-top navbar-light">
      <div class="container">
        <a href="#" class="navbar-brand d-flex">
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
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="#" aria-current="page" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#Details" class="nav-link">Details</a>
            </li>
            <li class="nav-item">
              <a href="#Services" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
              <a href="#Projects" class="nav-link">Projects</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link btn btn-outline-secondary px-4 mx-4"
                href=""
                data-bs-toggle="modal"
                data-bs-target="#signinmodal"
                >Login</a
              >
            </li>
          </ul>
        </div>
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
        <div class="col-md-3 col-sm-6 text-center">
          <h2 class="counter xl-text" data-target="328">328</h2>
          <p>Happy Customer</p>
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

    <!-- Login Modal -->
    <div
      class="modal fade"
      id="signinmodal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="signinmodal"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <button
            type="button"
            class="btn-close position-absolute top-0 end-0 m-2"
            data-bs-dismiss="modal"
            aria-label="Close"
            style="
              z-index: 1050;
              background-color: white;
              border-radius: 50%;
              padding: 0.5rem;
            "
          ></button>
          <div class="card mb-0 border-0">
            <div class="row row-sm gx-0">
              <div
                class="col-lg-5 col-xl-5 d-lg-flex d-none text-center bg-secondary details rounded-start"
              >
                <div class="d-flex align-items-center">
                  <h1 class="text-white px-4">WELCOME BACK</h1>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="col-lg-7 col-xl-7 col-xs-12 col-sm-12 login_form">
                <div class="main-container container-fluid">
                  <div class="row row-sm gx-0">
                    <div class="card-body p-5">
                      <div class="clearfix"></div>
                      <form
                        action="user/signin/function.php"
                        id="signinform"
                        method="POST"
                      >
                        <h1
                          class="text-start pb-4 d-flex justify-content-center text-secondary"
                        >
                          LOGIN
                        </h1>
                        <div class="form-group text-start pb-3">
                          <i class="ri-mail-fill icon icon-a"></i>
                          <label class="form-label">Email Address</label>
                          <input
                            class="form-control py-2 rounded-2"
                            placeholder=""
                            type="text"
                            name="email"
                            id="signin_email"
                          />
                        </div>
                        <div class="form-group text-start">
                          <i class="ri-lock-fill icon icon-b"></i>
                          <label class="form-label">Password</label>
                          <input
                            class="form-control py-2 rounded-2"
                            placeholder=""
                            type="password"
                            name="password"
                            id="signin_password"
                          />
                        </div>
                        <div class="form-check d-flex mt-2 pb-5 gap-2">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="invalidCheck"
                          />
                          <label class="form-check-label" for="invalidCheck">
                            <small class="text-secondary">Remember me</small>
                          </label>
                          <a
                            href="forgot.html"
                            class="text-secondary ms-auto text-decoration-none"
                            ><small>Forgot password?</small></a
                          >
                        </div>
                        <div class="d-grid pb-2">
                          <button
                            name="login"
                            type="submit"
                            class="btn btn-secondary text-white py-2 fw-bold"
                          >
                            Login
                          </button>
                        </div>
                      </form>
                      <div class="d-flex justify-content-center mt-3 gap-1">
                        Don't have an account?<a
                          class="text-secondary"
                          href="signup.php"
                          data-bs-toggle="modal"
                          data-bs-target="#signupmodal"
                          >Register Here</a
                        >
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

    
    <!-- Sign up Modal  -->
    <div
      class="modal fade"
      id="signupmodal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="signupmodal"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <button
            type="button"
            class="btn-close position-absolute top-0 end-0 m-2"
            data-bs-dismiss="modal"
            aria-label="Close"
            style="
              z-index: 1050;
              background-color: white;
              border-radius: 50%;
              padding: 0.5rem;
            "
          ></button>
          <div class="card mb-0 border-0">
            <div class="row row-sm gx-0">
              <div
                class="col-lg-5 col-xl-5 d-lg-flex d-none text-center bg-secondary details rounded-start"
              >
                <div class="d-flex align-items-center">
                  <h3 class="text-white px-4">
                    WELCOME TO MRM! JOIN NOW FOR A BRIGHTER FUTURE
                  </h3>
                </div>
              </div>
              <div class="col-lg-7 col-xl-7 col-xs-12 col-sm-12 login_form">
                <div class="main-container container-fluid">
                  <div class="row row-sm gx-0">
                    <div class="card-body p-5">
                      <form
                        id="signupForm"
                        method="POST"
                        action="user/signup/function.php"
                      >
                        <h1
                          class="text-start pb-4 d-flex justify-content-center text-secondary fw-bold"
                        >
                          SIGN UP
                        </h1>

                        <!-- First Name, Last Name, Middle Name Row -->
                        <div class="row">
                          <div class="col-md-4 form-floating text-start mb-3">
                            <input
                              class="form-control rounded-2"
                              placeholder=""
                              type="text"
                              name="firstname"
                              id="su_firstname"
                              oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                            />
                            <label for="su_firstname" class="text-muted"
                              >First Name</label
                            >
                          </div>
                          <div class="col-md-4 form-floating text-start mb-3">
                            <input
                              class="form-control rounded-2"
                              placeholder=""
                              type="text"
                              name="lastname"
                              id="su_lastname"
                              oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                            />
                            <label for="su_lastname" class="text-muted"
                              >Last Name</label
                            >
                          </div>
                          <div class="col-md-4 form-floating text-start mb-3">
                            <input
                              class="form-control rounded-2"
                              placeholder=""
                              type="text"
                              name="middlename"
                              id="su_middlename"
                              oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                            />
                            <label for="su_middlename" class="text-muted"
                              >Middle Name</label
                            >
                          </div>
                        </div>

                        <!-- Email and Password Row -->
                        <div class="row">
                          <div class="col-md-6 form-floating text-start mb-3">
                            <input
                              class="form-control rounded-2"
                              placeholder=""
                              type="email"
                              name="email"
                              id="su_email"
                            />
                            <label for="su_email" class="text-muted">Email Address</label>
                          </div>
                          <div class="col-md-6 form-floating text-start mb-3">
                            <i
                              class="ri-eye-fill icon icon-c"
                              id="toggle_Pass"
                            ></i>
                            <input
                              class="form-control rounded-2"
                              placeholder=""
                              type="password"
                              name="password"
                              id="su_password"
                            />
                            <label for="su_password" class="text-muted">Password</label>
                          </div>
                        </div>

                        <!-- Address Row -->
                        <div class="form-floating text-start mb-3">
                          <input
                            class="form-control rounded-2"
                            placeholder=""
                            type="text"
                            name="address"
                            id="su_address"
                          />
                          <label for="su_address" class="text-muted">Address</label>
                        </div>

                        <!-- City, Province, ZIP Code Row -->
                        <div class="row">
                          <div class="col-md-4 form-floating text-start mb-3">
                            <input
                              class="form-control rounded-2"
                              placeholder=""
                              type="text"
                              name="city"
                              id="su_city"
                            />
                            <label for="su_city" class="text-muted">City</label>
                          </div>
                          <div class="col-md-4 form-floating text-start mb-3">
                            <input
                              class="form-control rounded-2"
                              placeholder=""
                              type="text"
                              name="province"
                              id="su_province"
                            />
                            <label for="su_province" class="text-muted">Province</label>
                          </div>
                          <div class="col-md-4 form-floating text-start mb-3">
                            <input
                              class="form-control rounded-2"
                              placeholder=""
                              type="text"
                              name="zipcode"
                              id="su_zipcode"
                              oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            />
                            <label for="su_zipcode" class="text-muted">ZIP Code</label>
                          </div>
                        </div>

                        <!-- Radio Buttons for Organization or Individual -->
                        <div class="form-check form-check-inline mb-3">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="user_type"
                            id="individual"
                            value="individual"
                            checked
                          />
                          <label class="form-check-label" for="individual">Individual</label>
                        </div>
                        <div class="form-check form-check-inline mb-3">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="user_type"
                            id="organization"
                            value="organization"
                          />
                          <label class="form-check-label" for="organization">Organization</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid pb-2">
                          <button
                            type="submit"
                            name="signup"
                            class="btn btn-secondary text-white py-2 fw-bold"
                          >
                            Register
                          </button>
                        </div>
                      </form>
                      <div
                        class="d-flex justify-content-center mt-3 gap-1 text-muted"
                      >
                        Already have an account?<a
                          class="text-secondary"
                          href="signin.php"
                          data-bs-toggle="modal"
                          data-bs-target="#signinmodal"
                          >Login Here</a
                        >
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
        $("#signupForm").on("submit", function (e) {
          e.preventDefault(); // Prevent default form submission

          var formData = {
            firstname: $("#su_firstname").val(),
            lastname: $("#su_lastname").val(),
            middlename: $("#su_middlename").val(),
            email: $("#su_email").val(),
            password: $("#su_password").val(),
            address: $("#su_address").val(),
            city: $("#su_city").val(),
            province: $("#su_province").val(),
            zip_code: $("#su_zipcode").val(),
            user_type: $('input[name="user_type"]:checked').val(),
            signup: true,
          };

          $.ajax({
            type: "POST",
            url: "USER/signup/function.php",
            data: formData,
            dataType: "json",
            beforeSend: function () {
              $("#loadingOverlay").show(); // Show the loading indicator
            },
            success: function (response) {
              $("#loadingOverlay").hide(); // Hide the loading indicator
              if (response.success) {
                Swal.fire({
                  title: "Account Created",
                  text: "Verification has ben send to your email",
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
        });
      });

      $(document).ready(function () {
        $("#signinform").on("submit", function (e) {
          e.preventDefault(); // Prevent the default form submission

          var formData = $(this).serialize(); // Serialize form data

          $.ajax({
            url: "USER/signin/function.php", // URL to your PHP script
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
              if (response.success) {
                Swal.fire({
                  title: "Success!",
                  text: "Successfully Signed in!",
                  icon: "success",
                  allowOutsideClick: false,
                  timer: 2000,
                  showConfirmButton: false, // Hide the confirm button
                }).then(() => {
                  window.location.href = response.redirect; // REDIRECT
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
            error: function (jqXHR, textStatus, errorThrown) {
              console.log("AJAX error: " + textStatus + " : " + errorThrown);
              console.log("Response text: " + jqXHR.responseText);
              alert("An error occurred while processing the request.");
            },
          });
        });
      });
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        let lastScrollTop = window.pageYOffset;
        const sections = document.querySelectorAll('.reveal');

        const observer = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            const currentScrollTop = window.pageYOffset;

            if (entry.isIntersecting) {
              if (currentScrollTop > lastScrollTop && !entry.target.classList.contains('scroll-up')) {
                entry.target.classList.add('scroll-up');
                entry.target.classList.remove('scroll-down');
              } else if (currentScrollTop < lastScrollTop && !entry.target.classList.contains('scroll-down')) {
                entry.target.classList.add('scroll-down');
                entry.target.classList.remove('scroll-up');
              }
            } else {
              // This line should be adjusted based on behavior:
              // Remove this line if you don't want elements to disappear once they leave the viewport.
              entry.target.classList.remove('scroll-up', 'scroll-down');
            }
          });

          lastScrollTop = currentScrollTop;
        }, { threshold: 0.1 }); // Adjust threshold if needed

        sections.forEach(section => observer.observe(section));
      });
    </script>
  </body>
</html>
