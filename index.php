<?php 
  session_start();

  if(isset($_SESSION['login'])){
      if($_SESSION['login'] == true)  {
        $role = $_SESSION['role'];
        if($role == 'client'){
          header("location: /USER/dashboard/user-home.php");
          exit();
      }
      else if($role == 'worker'){
        header("location: /ADMIN/worker/dashboard.php");
        exit();
      }
      
      else if($role == 'admin'){
          header("location: /ADMIN/dashboard/admin-dashboard.php");
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
        $imageNamesString = '';
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
            $imageNamesString = $row["images"]; // The JSON-like string of image names

            // Decode the JSON string into a PHP array
            $imageNames = json_decode($imageNamesString, true);
          
                $imageName = $imageNames[0];
                $imagePath = 'assets/images/landing/' . $imageName;

                   $imageName1 = $imageNames[1];
                   $imagePath1 = 'assets/images/landing/' . $imageName1;

                   $imageName2 = $imageNames[2];
                   $imagePath2 = 'assets/images/landing/' . $imageName2;

                   $imageName3 = $imageNames[3];
                   $imagePath3 = 'assets/images/landing/' . $imageName3;

                   $imageName4 = $imageNames[4];
                   $imagePath4 = 'assets/images/landing/' . $imageName4;

                   $imageName5 = $imageNames[5];
                   $imagePath5 = 'assets/images/landing/' . $imageName5;

                   $imageName6 = $imageNames[6];
                   $imagePath6 = 'assets/images/landing/' . $imageName6;

                   $imageName7 = $imageNames[7];
                   $imagePath7 = 'assets/images/landing/' . $imageName7;

                   $imageName8 = $imageNames[8];
                   $imagePath8 = 'assets/images/landing/' . $imageName8;

                   $imageName9 = $imageNames[9];
                   $imagePath9 = 'assets/images/landing/' . $imageName9;

                   $imageName10 = $imageNames[10];
                   $imagePath10 = 'assets/images/landing/' . $imageName10;

                   $imageName11 = $imageNames[11];
                   $imagePath11 = 'assets/images/landing/' . $imageName11;

          
                  // Display the image (you can customize the HTML as needed)
                  // echo "<img src='$imagePath' alt='$imageName' />";
              


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
              <a href="#Projects" class="nav-link">Permits</a>
            </li>
            <!-- <li class="nav-item d-none">
              <a
                class="nav-link btn btn-outline-secondary px-4 mx-4"
                href=""
                data-bs-toggle="modal"
                data-bs-target="#signinmodal"
                >Login</a
              >
            </li> -->
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
                <span class="text-secondary"><?php echo $titles["title1_f"] ?> </span> 
                <span><?php echo $titles["title1_d"] ?> </span> 
                <span class="text-primary"><?php echo $titles["title1_l"] ?></span>
              </h1>
              <p class="lead mb-4">
              MRM E-G COMPANY is the sole proprietorship managed by Ms. Ruby Anne Chavez, a young Entrepreneur 
              who has experience of almost 8 years in Generator and Solar Industry. 
              MRM Company also engages sub-contract with (Triple A Companies) for private and government projects.
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
                src="assets/landing_assets/images/mrm_images/hero-img-mrm.jpg"
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
            <h2 class="mb-4">Our
               <span class="text-secondary">Vision</span> 
            </h2>
            <p class="fs-5">
              Leading the world’s most compelling energy power, alleviating climate change, 
              and ending poverty allowing next generation to see the country. Execute clean 
              and renewable energy projects all over in the Philippines, through innovative 
              and profitable production processes, aligned with environmental protection 
              and the development of the communities in which we operate.
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
                src="assets/landing_assets/images/mrm_images/img4.png"
                alt=""
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mt-4">
              <h2 class="mb-5">
                <span class="text-secondary">Mission</span> 
              </h2>
              <ul class="list-unstyled">
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                  Provide the highest quality, cost-effective renewable energy power products and services.
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                  Serve customers interested in reducing energy costs.
                    
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                  Offer sustainable, clean energy solutions.
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                  Provide affordable solutions to address the environmental crisis.
                    
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                  Contribute to a better future for the country.
                    
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
              <?php echo $descs["desc3"] ?>
                
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
              <?php echo $descs["desc4"] ?>
                
              </p>
              <a href="article.html" class="mt-5 btn btn-secondary text-white"
                >Get Started</a
              >
            </div>
          </div>
          <div class="col-lg-6">
            <div class="image-container">
              <img
                src="<?php echo $imagePath2 ?>"
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
            <?php echo $faqs["faqdesc"] ?>
              
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
                    <span class="me-3 fs-18 fw-bold">01.</span><?php echo $faqs["faq_q1"] ?>
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
                    <?php echo $faqs["faq_a1"] ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">02.</span><?php echo $faqs["faq_q2"] ?>
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
                    <?php echo $faqs["faq_a2"] ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">03.</span><?php echo $faqs["faq_q3"] ?>
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
                    <?php echo $faqs["faq_a3"] ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">04.</span><?php echo $faqs["faq_q4"] ?>
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
                    <?php echo $faqs["faq_a4"] ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">05.</span><?php echo $faqs["faq_q5"] ?>
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
                    <?php echo $faqs["faq_a5"] ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">06.</span><?php echo $faqs["faq_q6"] ?>
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
                    <?php echo $faqs["faq_a6"] ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">07.</span><?php echo $faqs["faq_q7"] ?>
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
                    <?php echo $faqs["faq_a7"] ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">08.</span><?php echo $faqs["faq_q8"] ?>
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
                    <?php echo $faqs["faq_a8"] ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">09.</span><?php echo $faqs["faq_q9"] ?>
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
                    <?php echo $faqs["faq_a9"] ?>
                    
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
                    <span class="me-3 fs-18 fw-bold">10.</span><?php echo $faqs["faq_q10"] ?>
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
                    <?php echo $faqs["faq_a10"] ?>
                     
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 my-auto">
            <div class="image-container">
              <img
                src="<?php echo $imagePath3 ?>"
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
        <h2 class="text-center pb-4">Business <span class="text-secondary">Permits</span></h2>
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_permits/img5.jpg"
                alt=""
                class="rounded-4"
                height="500"
              />
              <div class="card-body">
                  <a href="assets/landing_assets/images/mrm_permits/img5.jpg" class="article.html btn btn-secondary d-flex justify-content-center text-light">View Image</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_permits/img9.jpg"
                alt=""
                class="rounded-4"
                height="500"
              />
              <div class="card-body">
                <a href="assets/landing_assets/images/mrm_permits/img9.jpg" class="article.html btn btn-secondary d-flex justify-content-center text-light">View Image</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_permits/img8.jpg"
                alt=""
                class="rounded-4"
                height="500"
              />
              <div class="card-body">
                <a href="assets/landing_assets/images/mrm_permits/img8.jpg" class="article.html btn btn-secondary d-flex justify-content-center text-light">View Image</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_permits/img10.jpg"
                alt=""
                class="rounded-4"
                height="500"
              />
              <div class="card-body">
                <a href="assets/landing_assets/images/mrm_permits/img10.jpg" class="article.html btn btn-secondary d-flex justify-content-center text-light">View Image</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_permits/img11.jpg"
                alt=""
                class="rounded-4"
                height="500"
              />
              <div class="card-body">
                <a href="assets/landing_assets/images/mrm_permits/img11.jpg" class="article.html btn btn-secondary d-flex justify-content-center text-light">View Image</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="assets/landing_assets/images/mrm_permits/img12.jpg"
                alt=""
                class="rounded-4"
                height="500"
              />
              <div class="card-body">
                <a href="assets/landing_assets/images/mrm_permits/img12.jpg" class="article.html btn btn-secondary d-flex justify-content-center text-light">View Image</a>
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
              <!-- <img
                src=""
                alt=""
                class="rounded-circle"
                width="120"
              /> -->
              <p class="w-50 my-4 fst-italic fs-4 mb-4">

              </p>
              <div class="fw-bold fs-5 mt-4">CEO - Ruby Chavez</div>
              <!-- <div>CEO - Ruby Chavez</div> -->
            </div>
          </div>
          <div class="carousel-item">
            <div
              class="d-flex flex-column justify-content-center align-items-center text-center"
            >
              <!-- <img
                src=""
                alt=""
                class="rounded-circle"
                width="120"
              /> -->
              <p class="w-50 my-4 fst-italic fs-4 mb-4">

              </p>
              <div class="fw-bold fs-5 mt-4">Alyssa Rivera</div>
              <!-- <div>Team Leader - Marvie</div> -->
            </div>
          </div>
          <div class="carousel-item">
            <div
              class="d-flex flex-column justify-content-center align-items-center text-center"
            >
              <!-- <img
                src=""
                alt=""
                class="rounded-circle"
                width="120"
              /> -->
              <p class="w-50 my-4 fst-italic fs-4 mb-4">

                
              </p>
              <div class="fw-bold fs-5 mt-4"></div>
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

    <section id="register" class="register my-6 reveal d-none">
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

    <footer class="bg-light py-6" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-4 my-3">
            <h6>About MRM-EG</h6>
            <p>
            <?php echo $descs["about"] ?>
              
            </p>
          </div>
          <div class="col-md-4 my-3">
            <h6>Locations</h6>
            <ul class="list-unstyled">
              <li>
                Main Office: 87 Stanford St. Cubao Quezon City 1102
                <!-- <a href="">Privacy Policy</a> -->
              </li>
              <li>
                Warehouse: F.Lazaro St. Brgy Canuway West. Valenzuela City
                <!-- <a href="">Company</a> -->
              </li>
              <!-- <li>
                Menu: <a href="#Home">Home</a>, <a href="#Details">Details</a>,
                <a href="#Services">Services</a>
                <a href="#Register">Register</a>
              </li> -->
            </ul>
          </div>
          <div class="col-md-4 my-3">
            <h6>We would love to hear from you</h6>
            <ul class="list-unstyled">
              <li>
                Facebook <a href="https://www.facebook.com/share/19nNaPGh9V/">MRM Electric Power Generation Services</a>
                <!-- <a href="">Privacy Policy</a> -->
              </li>
              <li>
                Gmail: mrm.eg.sales@gmail.com
                <!-- <a href="">Company</a> -->
              </li>
              <li>
                Contact No.: 02 8641-7494 / 0951-931-7281
              </li>
            </ul>
          </div>
          <!-- <div class="col-md-4 my-3">
            <div class="mb-4">
              <a href="https://www.facebook.com/share/19nNaPGh9V/" class="text-decoration-none">
                <i class="fab fa-facebook fa-3x text-dark mx-2"></i>
              </a> -->
              <!-- <a href="" class="text-decoration-none">
                <i class="fab fa-instagram fa-3x text-dark mx-2"></i>
              </a> -->
              <!-- <a href="" class="text-decoration-none">
                <i class="fab fa-twitter fa-3x text-dark mx-2"></i>
              </a> -->
              <!-- <a href="" class="text-decoration-none">
                <i class="fab fa-google fa-3x text-dark mx-2"></i>
              </a> -->
            <!-- </div> -->
            <!-- <p>
              We would love to hear from you
              <a href=""><strong>mrm.eg.sales@gmail.com</strong></a>
              <a href="https://www.facebook.com/share/19nNaPGh9V/"><strong>MRM Electric Power Generation Services.</strong></a>
              <a href=""><strong>mrm.eg.sales@gmail.com</strong></a>
            </p> -->
          <!-- </div> -->
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
                            href="forgot_password.php"
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
          if($("#su_firstname").val() == "" ||
            $("#su_lastname").val() == "" ||
            $("#su_middlename").val() == "" ||
            $("#su_email").val() == "" ||
            $("#su_password").val() == "" ||
            $("#su_address").val() == "" ||
            $("#su_city").val() == "" ||
            $("#su_province").val() == "" ||
            $("#su_zipcode").val() == "" ||
            $('input[name="user_type"]:checked').val() == ""
          ){
            Swal.fire({
                  title: "Error!",
                  text: "Please fill up the form",
                  icon: "error",
                  confirmButtonText: "ok",
                });
          }
          else{

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
          }
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
