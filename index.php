


<?php 
session_start();
if(isset($_SESSION['login'])){
    if($_SESSION['login'] == true)  {
      $role = $_SESSION['role'];
      if($role == 'user'){
        header("location: /MRM-DEVELOPMENT/USER/solar/solar.php");
        exit();
    }
    else{
        header("location: /MRM-DEVELOPMENT/ADMIN/accountManagement/accountcontrol/user-management.php");
        exit();
    }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRM LANDING PAGE</title>
    
    <!-- All CSS -->
    <link href="assets/landing_css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/landing_css/style.css">

    <!-- Favicon -->
    <link rel="icon" href="assets/images/brand-logos/favicon.ico" type="image/x-icon">
    <!-- Icons Css -->
    <link href="assets/css/icons.css" rel="stylesheet">

</head>
<body>  
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#"><span style="color: orange;">MRM</span>POWER</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#portfoli o">Portfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#team">Team</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li> 
              <li class="nav-item"> <!-- TRIGGER MODAL SIGN IN -->
                <a class="nav-link ms-4" href="" data-bs-toggle="modal" data-bs-target="#signinmodal"><span class="text-success">Sign in</span></a>
              </li> 
              <li class="nav-item"> <!-- TRIGGER MODAL SIGN UP -->
                <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#signupmodal"><span class="text-warning" style="color: orange;">Sign up</span></a>
              </li>        
            </ul>
          </div>
        </div>            
      </nav>
   
      

         
         <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/home-1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>POWER GENERATOR</h5>
                <p>Our company provides many types of generators, from different brands to many specifications.</p>
                <p><a href="#" class="btn btn-warning mt-3" >Learn More</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/home-2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>SOLAR</h5>
                <p>We provide solar panels with a complete set for our clients.</p>
                <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/home-3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>SERVICE</h5>
                <p>We also have different services along with our products, or we provide services only to our clients.</p>
                <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

<!-- Modal SIGN UP -->
<div class="modal fade" id="signupmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signupmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: white; border-radius: 50%; padding: 0.5rem;"></button>
      <div class="card mb-0 border-0">
        <div class="row row-sm gx-0">
          <div class="col-lg-5 col-xl-5 d-lg-flex d-none text-center bg-warning details rounded-start">
            <div class="d-flex align-items-center">
              <h3 class="text-white px-4">WELCOME TO MRM! JOIN NOW FOR A BRIGHTER FUTURE</h3>
            </div>
          </div>
          <div class="col-lg-7 col-xl-7 col-xs-12 col-sm-12 login_form">
            <div class="main-container container-fluid">
              <div class="row row-sm gx-0">
                <div class="card-body p-5">
                  <form id="signupForm" method="POST" action="user/signup/function.php">
                    <h1 class="text-start pb-4 d-flex justify-content-center text-warning fw-bold">SIGN UP</h1>
                    <div class="form-floating text-start mb-3">
                      <input class="form-control" placeholder="" type="text" name="firstname" id="su_firstname" >
                      <label for="su_FirstName" class="text-muted">First Name</label>
                    </div>
                    <div class="form-floating text-start mb-3">
                      <input class="form-control" placeholder="" type="text" name="lastname" id="su_lastname" >
                      <label for="su_LastName" class="text-muted">Last Name</label>
                    </div>
                    <div class="form-floating text-start mb-3">
                      <input class="form-control" placeholder="" type="text" name="middlename" id="su_middlename" >
                      <label for="su_MiddleInitial" class="text-muted">Middle Name</label>
                    </div>
                    <div class="form-floating text-start mb-3">
                      <input class="form-control" placeholder="" type="email" name="email" id="su_email" >
                      <label for="su_Email" class="text-muted">Email Address</label>
                    </div>
                    <div class="form-floating text-start mb-3">
                      <i class="ri-eye-fill icon icon-c" id="toggle_Pass"></i>
                      <input class="form-control" placeholder="" type="password" name="password" id="su_password" >
                      <label for="su_Password" class="text-muted">Password</label>
                    </div>
                    <!-- <div class="form-floating text-start mb-5">
                      <input class="form-control" placeholder="" type="password" name="passWord" id="su_RepeatPassword" >
                      <label for="su_RepeatPassword" class="text-muted">Repeat Password</label>
                    </div> -->
                    <div class="d-grid pb-2">
                      <button type="submit" name="signup" class="btn btn-warning text-white py-2">Register</button>
                    </div>
                  </form>
                  <div class="d-flex justify-content-center mt-3 gap-1 text-muted">Already have an account?<a class="text-warning" href="signin.php" data-bs-toggle="modal" data-bs-target="#signinmodal">Login Here</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>     
    </div>
  </div>
</div>






<!-- Modal SIGN IN -->
<div class="modal fade" id="signinmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signinmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: white; border-radius: 50%; padding: 0.5rem;"></button>
      <div class="card mb-0 border-0">
          <div class="row row-sm gx-0">
              <div class="col-lg-5 col-xl-5 d-lg-flex d-none text-center bg-warning details rounded-start">
                <!-- <a href="index.html">
                    <img src="../assets/images/sigin/logo_login.png" class="header-brand-img mb-4" alt="logo">
                </a> -->
                <div class="d-flex align-items-center">
                    <h1 class="text-white px-4">WELCOME BACK</h1>
                </div>
                <div class="clearfix"></div>
                <!-- <img src="../../assets/images/sigin/example.jpg" class="ht-100 mb-0" alt="user"> -->
                <!-- <h5 class="mt-4">Create Your Account</h5>
                <span class="text-white-6 fs-13 mb-5 mt-xl-0">Signup to create, discover and connect with the global community</span> -->
              </div>
              <div class="col-lg-7 col-xl-7 col-xs-12 col-sm-12 login_form ">
                  <div class="main-container container-fluid">
                      <div class="row row-sm gx-0">
                          <div class="card-body p-5">
                              <div class="clearfix"></div>
                              <form action="user/signin/function.php" id="signinform" method="POST">                              
                                  <h1 class="text-start pb-4 d-flex justify-content-center text-warning">LOGIN</h1>
                                  <!-- <p class="mb-4 text-muted fs-13 ms-0 text-start">Signin to create, discover and connect with the global community</p> -->
                                  <div class="form-group text-start pb-3">
                                  <i class="ri-mail-fill icon icon-a"></i>
                                      <label class="form-label">Email Address</label>
                                      <input class="form-control py-2" placeholder="" type="text" name="email" id="signin_email">
                                  </div>
                                  <div class="form-group text-start">
                                  <i class="ri-lock-fill icon icon-b"></i>
                                      <label class="form-label">Password</label>
                                      <input class="form-control py-2" placeholder="" type="password" name="password" id="signin_password">
                                      
                                  </div>
                                  <div class="form-check d-flex mt-2 pb-5 gap-2">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                                        <label class="form-check-label" for="invalidCheck">
                                            <small class="text-warning">Remember me</small>
                                        </label>
                                        <a href="forgot.html" class="text-warning ms-auto text-decoration-none"><small>Forgot password?</small></a>
                                  </div>
                                  <div class="d-grid pb-2">
                                  <button name="login" type="submit" class="btn btn-warning text-white py-2 fw-normal">Login</button>                                 
                                  </div>
                              </form>
                              <div class="d-flex justify-content-center mt-3 gap-1">Don't have an account?<a class="text-warning" href="signup.php" data-bs-toggle="modal" data-bs-target="#signupmodal">Register Here</a></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>   
    </div>
  </div>
</div>


      <!-- about section starts -->
      <section id="about" class="about section-padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-12 col-12">
                      <div class="about-img">
                          <img src="img/about.jpg" alt="" class="img-fluid">
                      </div>
                  </div>
                  <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                      <div class="about-text">
                            <h2>We Provide the Best Quality <br/> Services Ever</h2>
                            <p>Our services include tune-up, maintenance, installation, and repairs for our clients to have the best condition for their generators and to provide the best performance available.</p>
                            <a href="#" class="btn btn-warning">Learn More</a>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- about section Ends -->
      <!-- services section Starts -->
      <section class="services section-padding" id="services">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="section-header text-center pb-5">
                          <h2>Our Services</h2>
                          <p>We provide Services available to <br>our clients and to those who only needs service</p>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="h-100 card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-laptop"></i>
                            <h3 class="card-title">Tune Up</h3>
                            <p class="lead">We provide tune-up services available solely for the generators.</p>
                            <button class="btn bg-warning text-dark mt-auto">Read More</button>
                        </div>
                    </div>
                </div>
                  <div class="col-12 col-md-12 col-lg-3">
                      <div class="h-100 card text-white text-center bg-dark pb-2">
                          <div class="card-body">
                            <i class="bi bi-journal"></i>
                              <h3 class="card-title">Maintenance</h3>
                              <p class="lead">We provide maintenance services, such as oil changes or fuse replacements.</p>
                              <button class="btn bg-warning text-dark mt-4">Read More</button>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-3">
                      <div class="h-100 card text-white text-center bg-dark pb-2">
                          <div class="card-body">
                            <i class="bi bi-intersect"></i>
                              <h3 class="card-title">Installation</h3>
                              <p class="lead">We provide installation for generators from us or outside sources.</p>
                              <button class="btn bg-warning text-dark mt-4">Read More</button>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-3">
                      <div class="h-100 card text-white text-center bg-dark pb-2">
                          <div class="card-body">
                            <i class="bi bi-intersect"></i>
                              <h3 class="card-title">Repair</h3>
                              <p class="lead">We provide repairs for generators in case the clients encounter problems.</p>
                              <button class="btn bg-warning text-dark mt-4">Read More</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- services section Ends -->

      <!-- portfolio strats -->
      <section id="portfolio" class="portfolio section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Our Projects</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                          <div class="img-area mb-4">
                              <img src="img/project-1.jpg" class="img-fluid" alt="">
                          </div>
                            <h3 class="card-title">Project 1</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                          <div class="img-area mb-4">
                              <img src="img/project-2.jpg" class="img-fluid" alt="">
                          </div>
                            <h3 class="card-title">Project 2</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p>
                            <button class="btn bg-warning text-dark">learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                          <div class="img-area mb-4">
                              <img src="img/project-3.jpg" class="img-fluid" alt="">
                          </div>
                            <h3 class="card-title">Project 3</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- portfolio ends -->
      <!-- team starts -->
      <section class="team section-padding" id="team">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>OUR TEAM</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/team-1.jpg" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">RUBY CHAVEZ</h3>
                        <p class="card-text">The CEO of the company and the main head of the team.</p>
                        

                        <p class="socials">
                            <i class="bi bi-twitter text-dark mx-1"></i>
                        <i class="bi bi-facebook text-dark mx-1"></i>
                        <i class="bi bi-linkedin text-dark mx-1"></i>
                        <i class="bi bi-instagram text-dark mx-1"></i>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/team-2.jpg" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">MICHAEL MATA</h3>
                        <p class="card-text">Operations Manager, and the one responsible for the operations in the company.</p>
                        <p class="socials">
                            <i class="bi bi-twitter text-dark mx-1"></i>
                        <i class="bi bi-facebook text-dark mx-1"></i>
                        <i class="bi bi-linkedin text-dark mx-1"></i>
                        <i class="bi bi-instagram text-dark mx-1"></i>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/team-3.jpg" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">RALPH MATA</h3>
                        <p class="card-text">Sales Manager, responsible for the sales of the company.</p>
                        <p class="socials">
                            <i class="bi bi-twitter text-dark mx-1"></i>
                        <i class="bi bi-facebook text-dark mx-1"></i>
                        <i class="bi bi-linkedin text-dark mx-1"></i>
                        <i class="bi bi-instagram text-dark mx-1"></i>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/team-4.jpg" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">GIZELLE GAMBALA</h3>
                        <p class="card-text">Administrator, responsible in ensuring the company operates smoothly.</p>
                        <p class="socials">
                            <i class="bi bi-twitter text-dark mx-1"></i>
                        <i class="bi bi-facebook text-dark mx-1"></i>
                        <i class="bi bi-linkedin text-dark mx-1"></i>
                        <i class="bi bi-instagram text-dark mx-1"></i>
                        </p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </section>
      <!-- team ends -->
      <!-- Contact starts -->
      <section id="contact" class="contact section-padding">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Contact Us</h2>
                        <p>Send your email and message us for more information</p>
                    </div>
                </div>
            </div>
			<div class="row m-0">
				<div class="col-md-12 p-0 pt-4 pb-4">
					<form action="#" class="bg-light p-4 m-auto">
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<input class="form-control" placeholder="Full Name" required="" type="text">
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<input class="form-control" placeholder="Email" required="" type="email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<textarea class="form-control" placeholder="Message" required="" rows="3"></textarea>
								</div>
							</div><button class="btn btn-warning btn-lg btn-block mt-3" type="button">Send Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
      </section>
      <!-- contact ends -->
      <!-- footer starts -->
      <footer class="bg-dark p-2 text-center">
          <div class="container">
              <p class="text-white">All Right Reserved By @website Name</p>
          </div>
      </footer>
      <!-- footer ends -->

    <!-- All Js -->
    <script>
        const togglePassword = document.querySelector("#toggle_Pass");
        const pass = document.querySelector("#su_Password");
        togglePassword.addEventListener("click", (e) => {
            const type = pass.getAttribute("type") === "password" ? "text" : "password";
            pass.setAttribute("type", type);
            e.target.classList.toggle("ri-eye-off-line");
        });
    </script>
    <script src="assets/landing_js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/script.js"></script> -->
    <!-- SWEET ALERT JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
</body>
</html>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#signupForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = {
            firstname: $('#su_firstname').val(),
            lastname: $('#su_lastname').val(),
            middlename: $('#su_middlename').val(),
            email: $('#su_email').val(),
            password: $('#su_password').val(),
            signup: true
        };

        $.ajax({
            type: "POST",
            url: "user/signup/function.php",
            data: formData,
            dataType: "json", // Expect JSON response from the server
            success: function(response) {
                if (response.success) {
                  Swal.fire({
                title: "Account Created",
                text: "Verification has ben send to your email",
                icon: "success"
                 });
                    $('#signupmodal').modal('hide');
                  //  window.location.href = "USER/generator/generator.php";
                } else {
                  Swal.fire({
                  title: 'Error!',
                  text: response.message,
                  icon: 'error',
                  confirmButtonText: 'ok'
                })
                    
                }
            },
            error: function(xhr, status, error) {
                alert("Something went wrong. Please try again.");
                console.log(xhr.responseText);
            }
        });
    });
});

$(document).ready(function() {
    $('#signinform').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: 'user/signin/function.php', // URL to your PHP script
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                  Swal.fire({
                  title: 'Success!',
                  text: response.message,
                  confirmButtonText: 'ok'
                })
                 window.location.href = response.redirect;  // REDIRECT
              } else {
                  Swal.fire({
                  title: 'Error!',
                  text: response.message,
                  icon: 'error',
                  confirmButtonText: 'ok'
                })
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('AJAX error: ' + textStatus + ' : ' + errorThrown);
                console.log('Response text: ' + jqXHR.responseText);
                alert('An error occurred while processing the request.');
            }
        });
    });
});
</script>
