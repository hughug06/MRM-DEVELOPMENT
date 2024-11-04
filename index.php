<?php 
  session_start();
  if(isset($_SESSION['login'])){
      if($_SESSION['login'] == true)  {
        $role = $_SESSION['role'];
        if($role == 'user'){
          header("location: /MRM-DEVELOPMENT/USER/dashboard/user-dashboard.php");
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
  </head>
  <body>
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
      <div class="container position-relative z-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="mt-6">
              <h1 class="xl-text">
                <span class="text-secondary">Power</span> Your Home with Clean,
                Reliable <span class="text-primary">Energy</span>
              </h1>
              <p class="lead mb-4">
                At MRM Electric Power Generation Services, we deliver reliable solar solutions that promote a cleaner planet by reducing fossil fuel reliance and empowering communities to embrace renewable energy for a sustainable future.
              </p>
              <a href="#introduction" class="btn btn-primary btn-lg m-2">
                More Details
              </a>
              <a href="#contact" class="btn btn-outline-secondary btn-lg m-2">
                Contact Us
              </a>
            </div>
          </div>
          <div class="col-lg-6 my-auto">
            <div class="image-container">
              <img
                src="assets/landing_assets/images/hero-img.png"
                alt=""
                class="img-fluid"
              />
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="stats" class="stats container d-none">
      <div class="row my-6">
        <div class="col-md-3 col-sm-6 text-center">
          <h2 class="counter xl-text" data-target="328">328</h2>
          <p>Happy Customer</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <h2 class="counter xl-text" data-target="285">285</h2>
          <p>Solar Installed</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <h2 class="counter xl-text" data-target="159">159</h2>
          <p>Good Feedbacks</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <h2 class="counter xl-text" data-target="328">328</h2>
          <p>Generator Installed</p>
        </div>
      </div>
    </section>

    <section id="intro" class="intro bg-light py-6">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center">
            <h2 class="mb-4">
              What is <span class="text-secondary">Clean</span> Energy?
            </h2>
            <p class="fs-5">
              At MRM Electric Power Generation Services, we deliver reliable solar solutions that promote a cleaner planet by reducing fossil fuel reliance and empowering communities to embrace renewable energy for a sustainable future.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section
      id="Details"
      class="details position-relative my-6 overflow-hidden"
    >
      <img
        src="assets/landing_assets/images/decoration-leaves.svg"
        class="decoration-star position-absolute"
        alt=""
      />
      <div class="container position-relative z-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="image-container d-flex justify-content-center">
              <img
                src="assets/landing_assets/images/mrm_images/details-2.png"
                alt=""
                class="img-fluit"
              />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mt-4">
              <h2 class="mb-5">
                The <span class="text-secondary">Goal</span> of Solar Energy
              </h2>
              <ul class="list-unstyled">
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                    To enhance livelihoods across various sectors within communities in the Philippines.
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                    To foster new connections by providing sustainable energy opportunities for local communities.
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                    To cultivate a culture of clean energy consumption that benefits both individuals and their communities.
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                    To raise awareness about the advantages of using clean and solar-based energy products and generators within the community.
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="Services" class="services bg-light py-6">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="text-container">
              <h2>
                <span class="text-secondary">Services</span> that we offer
              </h2>
              <p>
                The services offered are varied and vast to help accommodate costumers with their needs within the comforts of their own homes or businesses. The main function of our services is to cater towards a goal of helping organizations and businesses to have a smooth and stable product that works and can be used at a moment’s notice.
              </p>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="row mb-4">
              <div
                class="col-md-6 d-flex flex-column align-items-center text-center"
              >
                <i class="fas fa-rocket fa-4x text-secondary mb-2"></i>
                <p class="fs-5 fw-bold">Tune-up</p>
              </div>
              <div
                class="col-md-6 d-flex flex-column align-items-center text-center"
              >
                <i class="fas fa-rocket fa-4x text-secondary mb-2"></i>
                <p class="fs-5 fw-bold">Repair</p>
              </div>
              <div
                class="col-md-6 d-flex flex-column align-items-center text-center"
              >
                <i class="fas fa-rocket fa-4x text-secondary mb-2"></i>
                <p class="fs-5 fw-bold">Maintenance</p>
              </div>
              <div
                class="col-md-6 d-flex flex-column align-items-center text-center"
              >
                <i class="fas fa-rocket fa-4x text-secondary mb-2"></i>
                <p class="fs-5 fw-bold">Installation</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="details-2 position-relative my-6 overflow-hidden">
      <img
        src="assets/landing_assets/images/decoraiton-star-circle.svg"
        alt=""
        class="decoration-star position-absolute"
      />
      <div class="container position-relative z-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="text-container text-lg-start text-center mb-4">
              <h2 class="mb-4">
                Unlock Your 
                <span class="text-primary">Independence</span>
                with
                <span class="text-secondary">
                  SunSparkPower!
                </span>
              </h2>
              <p>
                We’re here to help you make the switch to solar energy and
                backup power as easy and seamless as possible. Our team
                understands that every home is unique, with different energy
                requirements and concerns. That’s why we’re dedicated to
                providing you with a personalized energy solution that fits your
                specific needs, lifestyle, and budget.
              </p>
              <a href="article.html" class="mt-5 btn btn-secondary text-white"
                >Get Started</a
              >
            </div>
          </div>
          <div class="col-lg-6">
            <div class="image-container">
              <img
                src="assets/landing_assets/images/details-2.png"
                class="img-fluid"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section class="get-quote bg-light py-6 text-center">
      <div class="container">
        <div class="col-lg-8 offset-lg-2">
          <h4 class="lh-base mb-5">
            We provide premium, high-efficiency solar panels designed to
            maximize sunlight capture and convert it into usable energy. Our
            backup generators ensure your home stays powered, no matter the
            weather.
          </h4>
          <a href="" class="btn btn-primary btn-lg">Learn More</a>
        </div>
      </div>
    </section> -->

    <section class="faq bg-light py-6 text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6 px-4">
            <h2>FAQ'S ?</h2>
            <h2 class="text-center">
              We are here to <span class="text-secondary">help</span> you
            </h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Asperiores praesentium voluptatibus laudantium eum tempora iste
              temporibus. Molestias voluptatibus tempore maiores eius nulla
              minus omnis, alias commodi officia nemo dolores similique?
            </p>
            <div class="accordion" id="accordionFAQ2">
              <div class="accordion-item border-0 border-bottom">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#firstcard"
                    aria-expanded="false"
                    aria-controls="firstcard"
                  >
                    <span class="me-3 fs-18 fw-bold">01.</span>Can i get a free
                    trial before purchase ?
                  </button>
                </h2>
                <div
                  id="firstcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="firstcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                      Fuga cumque esse dolor, facilis dolorem, sint eum quas
                      autem ipsum incidunt, vel repellendus impedit temporibus!
                      Sequi praesentium quisquam soluta veritatis consectetur.
                    </p>
                    <p class="mt-2 mb-3">
                      <span class="fw-bold">Note: </span>Please Refer support
                      section for more information.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item border-0 border-bottom">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#secondcard"
                    aria-expanded="false"
                    aria-controls="secondcard"
                  >
                    <span class="me-3 fs-18 fw-bold">02.</span>Can i get a free
                    trial before purchase ?
                  </button>
                </h2>
                <div
                  id="secondcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="secondcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                      Fuga cumque esse dolor, facilis dolorem, sint eum quas
                      autem ipsum incidunt, vel repellendus impedit temporibus!
                      Sequi praesentium quisquam soluta veritatis consectetur.
                    </p>
                    <p class="mt-2 mb-3">
                      <span class="fw-bold">Note: </span>Please Refer support
                      section for more information.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item border-0 border-bottom">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#thirdcard"
                    aria-expanded="false"
                    aria-controls="thirdcard"
                  >
                    <span class="me-3 fs-18 fw-bold">03.</span>Can i get a free
                    trial before purchase ?
                  </button>
                </h2>
                <div
                  id="thirdcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="thirdcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                      Fuga cumque esse dolor, facilis dolorem, sint eum quas
                      autem ipsum incidunt, vel repellendus impedit temporibus!
                      Sequi praesentium quisquam soluta veritatis consectetur.
                    </p>
                    <p class="mt-2 mb-3">
                      <span class="fw-bold">Note: </span>Please Refer support
                      section for more information.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item border-0 border-bottom">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#fourthcard"
                    aria-expanded="false"
                    aria-controls="fourthcard"
                  >
                    <span class="me-3 fs-18 fw-bold">04.</span>Can i get a free
                    trial before purchase ?
                  </button>
                </h2>
                <div
                  id="fourthcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="fourthcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                      Fuga cumque esse dolor, facilis dolorem, sint eum quas
                      autem ipsum incidunt, vel repellendus impedit temporibus!
                      Sequi praesentium quisquam soluta veritatis consectetur.
                    </p>
                    <p class="mt-2 mb-3">
                      <span class="fw-bold">Note: </span>Please Refer support
                      section for more information.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item border-0 border-bottom">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#fifthcard"
                    aria-expanded="false"
                    aria-controls="fifthcard"
                  >
                    <span class="me-3 fs-18 fw-bold">05.</span>Can i get a free
                    trial before purchase ?
                  </button>
                </h2>
                <div
                  id="fifthcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="fifthcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                      Fuga cumque esse dolor, facilis dolorem, sint eum quas
                      autem ipsum incidunt, vel repellendus impedit temporibus!
                      Sequi praesentium quisquam soluta veritatis consectetur.
                    </p>
                    <p class="mt-2 mb-3">
                      <span class="fw-bold">Note: </span>Please Refer support
                      section for more information.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 my-auto">
            <div class="image-container">
              <img
                src="assets/landing_assets/images/article-details-small.jpg"
                alt=""
                class="img-fluid rounded-3"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="Projects" class="py-6">
      <div class="container">
        <h2 class="text-center pb-4">
          Some of our <span class="text-secondary">Projects</span>
        </h2>
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_images/project-1.jpg"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title">Title here</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ratione, sed!<a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_images/project-2.jpg"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title">Title here</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ratione, sed!<a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_images/project-3.jpg"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title">Title here</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ratione, sed!<a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_images/project-4.jpg"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title">Title here</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ratione, sed!<a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_images/project-5.jpg"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title">Title here</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ratione, sed!<a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_images/project-6.jpg"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title">Title here</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ratione, sed!<a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonials" class="testimonials bg-light py-6">
      <div id="testimonialCarousel" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div
              class="d-flex flex-column justify-content-center align-items-center text-center"
            >
              <img
                src="assets/landing_assets/images/testimonial-1.jpg"
                alt=""
                class="rounded-circle"
                width="120"
              />
              <p class="w-50 my-4 fst-italic fs-4 mb-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Sapiente eaque odit saepe facilis sint earum magni ex amet error
                ipsam beatae quas molestias id laboriosam soluta, ipsum expedita
                commodi asperiores.
              </p>
              <div class="fw-bold fs-5 mt-4">John Marvie Placido</div>
              <div>General Manager - Marvie</div>
            </div>
          </div>
          <div class="carousel-item">
            <div
              class="d-flex flex-column justify-content-center align-items-center text-center"
            >
              <img
                src="assets/landing_assets/images/testimonial-2.jpg"
                alt=""
                class="rounded-circle"
                width="120"
              />
              <p class="w-50 my-4 fst-italic fs-4 mb-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Sapiente eaque odit saepe facilis sint earum magni ex amet error
                ipsam beatae quas molestias id laboriosam soluta, ipsum expedita
                commodi asperiores.
              </p>
              <div class="fw-bold fs-5 mt-4">John Marvie Placido</div>
              <div>Team Leader - Marvie</div>
            </div>
          </div>
          <div class="carousel-item">
            <div
              class="d-flex flex-column justify-content-center align-items-center text-center"
            >
              <img
                src="assets/landing_assets/images/testimonial-3.jpg"
                alt=""
                class="rounded-circle"
                width="120"
              />
              <p class="w-50 my-4 fst-italic fs-4 mb-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Sapiente eaque odit saepe facilis sint earum magni ex amet error
                ipsam beatae quas molestias id laboriosam soluta, ipsum expedita
                commodi asperiores.
              </p>
              <div class="fw-bold fs-5 mt-4">John Marvie Placido</div>
              <div>Product Manager - Marvie</div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#testimonialCarousel"
          data-bs-slide="prev"
        >
          <i class="fas fa-arrow-circle-left fa-3x text-secondary"></i>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#testimonialCarousel"
          data-bs-slide="next"
        >
          <i class="fas fa-arrow-circle-right fa-3x text-secondary"></i>
        </button>
      </div>
    </section>

    <section id="register" class="register my-6">
      <img
        src="assets/landing_assets/images/decoraiton-star-circle.svg"
        alt=""
        class="decoration-star position-absolute"
      />

      <div class="container position-relative z-3">
        <div class="row">
          <div class="col-lg-6 d-none d-md-block">
            <div class="image-container">
              <img
                src="assets/landing_assets/images/contact.png"
                alt=""
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="text-container">
              <h2 class="mb-5 text-secondary">Register Now</h2>
              <form>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First Name"
                    data-bs-toggle="modal"
                    data-bs-target="#signupmodal"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last Name"
                    data-bs-toggle="modal"
                    data-bs-target="#signupmodal"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Middle Name"
                    data-bs-toggle="modal"
                    data-bs-target="#signupmodal"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Email Address"
                    data-bs-toggle="modal"
                    data-bs-target="#signupmodal"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Password"
                    data-bs-toggle="modal"
                    data-bs-target="#signupmodal"
                    readonly
                  />
                </div>
                <div class="mt-5 d-grid gap-2">
                  <a
                    class="btn btn-secondary text-white fw-bold"
                    href="signup.php"
                    data-bs-toggle="modal"
                    data-bs-target="#signupmodal"
                    >Register Here</a
                  >
                </div>
              </form>
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
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni
              laboriosam sint, pariatur eos ullam laudantium!
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
                        <div class="form-floating text-start mb-3">
                          <input
                            class="form-control rounded-2"
                            placeholder=""
                            type="text"
                            name="firstname"
                            id="su_firstname"
                            oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                          />
                          <label for="su_FirstName" class="text-muted"
                            >First Name</label
                          >
                        </div>
                        <div class="form-floating text-start mb-3">
                          <input
                            class="form-control rounded-2"
                            placeholder=""
                            type="text"
                            name="lastname"
                            id="su_lastname"
                            oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                          />
                          <label for="su_LastName" class="text-muted"
                            >Last Name</label
                          >
                        </div>
                        <div class="form-floating text-start mb-3">
                          <input
                            class="form-control rounded-2"
                            placeholder=""
                            type="text"
                            name="middlename"
                            id="su_middlename"
                            oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                          />
                          <label for="su_MiddleInitial" class="text-muted"
                            >Middle Name</label
                          >
                        </div>
                        <div class="form-floating text-start mb-3">
                          <input
                            class="form-control rounded-2"
                            placeholder=""
                            type="email"
                            name="email"
                            id="su_email"
                          />
                          <label for="su_Email" class="text-muted"
                            >Email Address</label
                          >
                        </div>
                        <div class="form-floating text-start mb-3">
                          <input
                            class="form-control rounded-2"
                            placeholder=""
                            type="text"
                            name="contactnum"
                            id="su_contactnum"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                          />
                          <label for="su_contactNum" class="text-muted"
                            >Contact No.</label
                          >
                        </div>
                        <div class="form-floating text-start mb-3">
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
                          <label for="su_Password" class="text-muted"
                            >Password</label
                          >
                        </div>
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
            signup: true,
          };

          $.ajax({
            type: "POST",
            url: "user/signup/function.php",
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
              alert("Something went wrong. Please try again.");
              console.log(xhr.responseText);
            },
          });
        });
      });

      $(document).ready(function () {
        $("#signinform").on("submit", function (e) {
          e.preventDefault(); // Prevent the default form submission

          var formData = $(this).serialize(); // Serialize form data

          $.ajax({
            url: "user/signin/function.php", // URL to your PHP script
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
  </body>
</html>
