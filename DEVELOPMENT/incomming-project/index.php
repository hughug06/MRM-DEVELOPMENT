<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRM LANDING PAGE</title>
    
    <!-- All CSS -->
    <link href="../assets/landing_css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/landing_css/style.css">
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
                <a class="nav-link" href="#">Homec2</a>
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
              <li class="nav-item">
                <a class="nav-link ms-4" href="signin.php"><span class="text-success">Sign in</span></a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href=""><span class="text-warning" style="color: orange;" >Sign up</span></a>
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
                            <p>Our services include tune-up, maintenance, installation, and repairs for our clients to have the best condition for their generators and to provide the best performance available. By giving </p>
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
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-laptop"></i>
                            <h3 class="card-title">Tune Up</h3>
                            <p class="lead">We provide tune-up services available solely for the generators.</p>
                            <button class="btn bg-warning text-dark">Read More</button>
                        </div>
                    </div>
                </div>
                  <div class="col-12 col-md-12 col-lg-4">
                      <div class="card text-white text-center bg-dark pb-2">
                          <div class="card-body">
                            <i class="bi bi-journal"></i>
                              <h3 class="card-title">Maintenance</h3>
                              <p class="lead">We provide maintenance services, such as oil changes or fuse replacements.</p>
                              <button class="btn bg-warning text-dark">Read More</button>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-4">
                      <div class="card text-white text-center bg-dark pb-2">
                          <div class="card-body">
                            <i class="bi bi-intersect"></i>
                              <h3 class="card-title">Installation</h3>
                              <p class="lead">Our service provides installation for generators from us or outside sources.</p>
                              <button class="btn bg-warning text-dark">Read More</button>
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
                        <p>Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit. Non, quo.</p>
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
                            <h3 class="card-title">Building Make</h3>
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
                            <h3 class="card-title">Building Make</h3>
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
                            <h3 class="card-title">Building Make</h3>
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
                        <h2>Our Team</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit. Non, quo.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/team-1.jpg" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">MISS CHAVIZ</h3>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam nostrum illo tempora esse quibusdam.</p>
                        

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
                        <h3 class="card-title py-2">MISS CHAVIZ</h3>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam nostrum illo tempora esse quibusdam.</p>
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
                        <h3 class="card-title py-2">MISS CHAVIZ</h3>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam nostrum illo tempora esse quibusdam.</p>
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
                        <h3 class="card-title py-2">MISS CHAVIZ</h3>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam nostrum illo tempora esse quibusdam.</p>
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
                        <p>Send your email and message to us</p>
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
    <script src="../assets/landing_js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>




<!--for getting the form download the code from download button-->