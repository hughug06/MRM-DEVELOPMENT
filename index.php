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

    <section id="stats" class="stats container reveal d-none">
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

    <section id="intro" class="intro bg-light reveal py-6">
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
      class="details position-relative my-6 overflow-hidden reveal"
    >
      <img
        src="assets/landing_assets/images/decoration-leaves.svg"
        class="decoration-star position-absolute"
        alt=""
      />
      <div class="container position-relative z-3 reveal">
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

    <section id="Services" class="services bg-light py-6 reveal">
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

    <section class="details-2 position-relative my-6 overflow-hidden reveal">
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

    <section class="faq bg-light py-6 text-center reveal">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6 px-4">
            <h2>FAQ'S ?</h2>
            <h2 class="text-center">
              We are here to <span class="text-secondary">help</span> you
            </h2>
            <p>
              Find answers to common questions about our generators, 
              solar panels, and services. For further inquiries, 
              please reach out through our contact page!
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
                    <span class="me-3 fs-18 fw-bold">01.</span>What types of generators do you offer?
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
                      MRM E-G Electric Power Generation Services offers a range of generators to meet diverse power needs, from residential units to heavy-duty commercial and industrial generators. Our options include diesel, gas, and portable models to fit various applications and preferences.
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
                    <span class="me-3 fs-18 fw-bold">02.</span>What types of solar panels do you provide?
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
                      We offer high-efficiency solar panels suitable for residential, commercial, and industrial installations. Our solar panels are chosen for their durability, performance, and cost-effectiveness, helping you achieve sustainable energy solutions.
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
                    <span class="me-3 fs-18 fw-bold">03.</span>Do you provide installation services?
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
                      Yes, we offer comprehensive installation services for both generators and solar panels. Our skilled technicians ensure safe, efficient, and compliant installation, helping you get your system up and running smoothly.
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
                    <span class="me-3 fs-18 fw-bold">04.</span>Can you help with generator or solar panel maintenance?
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
                      Absolutely! We provide maintenance services for both generators and solar panel systems. Regular maintenance extends the lifespan of your equipment and ensures it operates at peak efficiency.
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
                    <span class="me-3 fs-18 fw-bold">05.</span>What repair services do you offer?
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
                      MRM E-G Electric Power Generation Services offers complete repair services for generators and solar panel systems. Whether it's a minor issue or a major repair, our team can diagnose and resolve problems efficiently to get your system back to optimal performance.
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
                    data-bs-target="#sixthcard"
                    aria-expanded="false"
                    aria-controls="sixthcard"
                  >
                    <span class="me-3 fs-18 fw-bold">06.</span>How often should I schedule maintenance for my generator?
                  </button>
                </h2>
                <div
                  id="sixthcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="sixthcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      For optimal performance, we recommend generator maintenance at least once a year, though heavy-use generators may need more frequent checks. Regular maintenance reduces the risk of breakdowns and extends the lifespan of your equipment.
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
                    data-bs-target="#seventhcard"
                    aria-expanded="false"
                    aria-controls="seventhcard"
                  >
                    <span class="me-3 fs-18 fw-bold">07.</span>Can you help with system tuning for better performance?
                  </button>
                </h2>
                <div
                  id="seventhcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="seventhcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      Yes, we offer tuning services for generators to ensure they perform at their best. Our technicians adjust settings and calibrate components for maximum efficiency and reliability.
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
                    data-bs-target="#eighthcard"
                    aria-expanded="false"
                    aria-controls="eighthcard"
                  >
                    <span class="me-3 fs-18 fw-bold">08.</span>Are there financing options available for generator and solar panel installations?
                  </button>
                </h2>
                <div
                  id="eighthcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="eighthcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      We understand that investing in a power generation system is significant. We offer flexible financing options to help you achieve energy independence affordably. Please reach out to discuss available plans.
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
                    data-bs-target="#ninthcard"
                    aria-expanded="false"
                    aria-controls="ninthcard"
                  >
                    <span class="me-3 fs-18 fw-bold">09.</span>Do you offer warranties on your products and services?
                  </button>
                </h2>
                <div
                  id="ninthcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="ninthcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                    Yes, all our products come with a manufacturer’s warranty, and we also provide warranties on our installation and repair services. Our goal is to give you peace of mind and confidence in your purchase.
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
                    data-bs-target="#tenthcard"
                    aria-expanded="false"
                    aria-controls="tenthcard"
                  >
                    <span class="me-3 fs-18 fw-bold">10.</span>How can I request a quote or consultation?
                  </button>
                </h2>
                <div
                  id="tenthcard"
                  class="accordion-collapse collapse"
                  aria-labelledby="tenthcard"
                  data-bs-parent="#accordionFAQ2"
                >
                  <div class="accordion-body">
                    <p>
                      You can easily request a quote or consultation by contacting us via phone or email, or by visiting our website. We’ll assess your power needs and provide a detailed proposal tailored to your specific requirements.
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

    <section id="Projects" class="py-6 reveal">
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
                <h5 class="card-title">Cagayan Solar Farm Project</h5>
                <p class="card-text">
                  Develop a large-scale solar farm in Cagayan to provide renewable energy
                  for local communities and reduce reliance on 
                  fossil fuels.<a href="" class="article.html">...Read More</a>
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
                <h5 class="card-title">Ilocos Solar Farm Irrigation Project</h5>
                <p class="card-text">
                  Utilize solar energy to power irrigation systems in Ilocos,
                  enhancing agricultural productivity in areas with limited 
                  access to consistent water resources.<a href="" class="article.html">...Read More</a>
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
                <h5 class="card-title">Boracay Clean Water Irrigation Project</h5>
                <p class="card-text">
                  Establish an eco-friendly irrigation system in Boracay to support 
                  sustainable landscaping, local agriculture, 
                  and clean water access.<a href="" class="article.html">...Read More</a>
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
                <h5 class="card-title">Cebu Solar Farm Project</h5>
                <p class="card-text">
                  Construct a solar farm in Cebu to supply renewable energy 
                  to industrial areas and reduce electricity 
                  costs for local businesses.<a href="" class="article.html">...Read More</a>
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
                <h5 class="card-title">Isabela Farm Project</h5>
                <p class="card-text">
                  Establish a sustainable farming project in Isabela 
                  that combines renewable energy and modern 
                  agricultural practices to improve crop yields 
                  and farmer income.<a href="" class="article.html">...Read More</a>
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
                <h5 class="card-title">Samar Potato Farm Project</h5>
                <p class="card-text">
                  Launch a solar-powered potato farm in Samar, aimed at 
                  bolstering local food production and creating 
                  a sustainable agricultural model for root crops.<a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonials" class="testimonials bg-light py-6 reveal">
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
                "MRM E-G Electric Power Generation Services offers 
                exceptional service and knowledgeable staff. The website is user-friendly, 
                making it easy to find what I need among their quality generators and solar solutions. 
                Their commitment to sustainability and prompt support truly sets them apart!"
              </p>
              <div class="fw-bold fs-5 mt-4">James Velasco</div>
              <!-- <div>General Manager - Marvie</div> -->
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
                "MRM E-G provides reliable and professional power solutions with a 
                full range of services from solar installations to generator maintenance. 
                The website is clear and concise, offering all the details needed. 
                Their team is always available and helpful—I highly recommend them!"
              </p>
              <div class="fw-bold fs-5 mt-4">Alyssa Rivera</div>
              <!-- <div>Team Leader - Marvie</div> -->
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
                "MRM E-G Electric Power Generation Services is a one-stop 
                shop for green energy needs. The website offers extensive 
                information on eco-friendly products, making it easy to make 
                informed decisions. They truly prioritize customer satisfaction 
                in every interaction."
              </p>
              <div class="fw-bold fs-5 mt-4">Carlos Mendoza</div>
              <!-- <div>Product Manager - Marvie</div> -->
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

    <section id="register" class="register my-6 reveal">
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
