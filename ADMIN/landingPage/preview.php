<?php 

    $title = $_POST['title1'];

    $title1_f = strtok($title, " ");
    $title1_l = substr(strrchr($title, " "), 1);

    $words = explode(" ", $title); // Split the sentence into an array of words
    array_shift($words); // Remove the first word
    array_pop($words); // Remove the last word
    $title1_d = implode(" ", $words);

    $desc1 = $_POST['desc1'];
    $title2 = $_POST['title2'];
    $desc2 = $_POST['desc2'];
    $goal1 = $_POST['goal1'];
    $goal2 = $_POST['goal2'];
    $goal3 = $_POST['goal3'];
    $goal4 = $_POST['goal4'];
    $desc3 = $_POST['desc3'];
    $desc4 = $_POST['desc4'];
    $faqdesc = $_POST['faqdesc'];
    $faq_q1 = $_POST['faq_q1'];
    $faq_a1 = $_POST['faq_a1'];
    $faq_q2 = $_POST['faq_q2'];
    $faq_a2 = $_POST['faq_a2'];
    $faq_q3 = $_POST['faq_q3'];
    $faq_a3 = $_POST['faq_a3'];
    $faq_q4 = $_POST['faq_q4'];
    $faq_a4 = $_POST['faq_a4'];
    $faq_q5 = $_POST['faq_q5'];
    $faq_a5 = $_POST['faq_a5'];
    $faq_q6 = $_POST['faq_q6'];
    $faq_a6 = $_POST['faq_a6'];
    $faq_q7 = $_POST['faq_q7'];
    $faq_a7 = $_POST['faq_a7'];
    $faq_q8 = $_POST['faq_q8'];
    $faq_a8 = $_POST['faq_a8'];
    $faq_q9 = $_POST['faq_q9'];
    $faq_a9 = $_POST['faq_a9'];
    $faq_q10 = $_POST['faq_q10'];
    $faq_a10 = $_POST['faq_a10'];
    $pj1_title = $_POST['pj1_title'];
    $pj1_desc = $_POST['pj1_desc'];
    $pj2_title = $_POST['pj2_title'];
    $pj2_desc = $_POST['pj2_desc'];
    $pj3_title = $_POST['pj3_title'];
    $pj3_desc = $_POST['pj3_desc'];
    $pj4_title = $_POST['pj4_title'];
    $pj4_desc = $_POST['pj4_desc'];
    $pj5_title = $_POST['pj5_title'];
    $pj5_desc = $_POST['pj5_desc'];
    $pj6_title = $_POST['pj6_title'];
    $pj6_desc = $_POST['pj6_desc'];
    $xp1_name = $_POST['xp1_name'];
    $xp1_comment = $_POST['xp1_comment'];
    $xp2_name = $_POST['xp2_name'];
    $xp2_comment = $_POST['xp2_comment'];
    $xp3_name = $_POST['xp3_name'];
    $xp3_comment = $_POST['xp3_comment'];
    $about = $_POST['about'];


    // Store uploaded image paths
    $uploadedImages = [];

    // Loop through the $_FILES array
    foreach ($_FILES as $key => $file) {
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Generate a unique name for the file
            $uploadDir = '../../assets/images/temp/';
            $fileName = basename($file['name']);
            $uniqueFilePath = $uploadDir . uniqid() . '_' . $fileName;

            // Ensure the upload directory exists
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Move the file to the upload directory
            if (move_uploaded_file($file['tmp_name'], $uniqueFilePath)) {
                // Store the file path for displaying later
                $uploadedImages[] = $uniqueFilePath;
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
    <link href="../../assets/css/icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/landing_assets/css/font-awesome.css" />
    <link rel="stylesheet" href="../../assets/landing_assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../../assets/landing_assets/css/styles.css" />
    <link rel="icon" href="../../assets/landing_assets/images/logo-mrm.png" />
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
          <h1 class="my-auto">
            <span class="text-secondary navbar-brand d-flex">This is just a preview of the landing page based on what you have entered</span>
          </h1>
          <button onclick="goBack()">
            <h1 class="my-auto">
              <span class="navbar-brand d-flex">Go back</span>
            </h1>
          </button>
        </a>
      </div>
    </nav>
  
    <nav class="navbar navbar-expand-lg sticky-top navbar-light">
      <div class="container">
        <a href="#" class="navbar-brand d-flex">
          <img
            src="../../assets/landing_assets/images/logo-mrm.png"
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
        src="../../assets/landing_assets/images/decoraiton-star-circle.svg"
        alt=""
        class="decoration-star position-absolute"
      />
      <img
        src="../../assets/landing_assets/images/decoraiton-star-circle.svg"
        alt=""
        class="decoration-star-2 position-absolute"
      />
      
      <div class="container position-relative z-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="mt-6">
              <h1 class="xl-text">
                <span class="text-secondary"><?php echo $title1_f ?> </span> 
                <span><?php echo $title1_d ?> </span> 
                <span class="text-primary"><?php echo $title1_l ?></span>
              </h1>
              <p class="lead mb-4">
              <?php echo $desc1 ?>
                
              </p>
              <a class="btn btn-primary btn-lg m-2">
                More Details
              </a>
              <a class="btn btn-outline-secondary btn-lg m-2">
                Contact Us
              </a>
            </div>
          </div>
          <div class="col-lg-6 my-auto">
            <div class="image-container">
              
              <img
                src="<?php echo htmlspecialchars($uploadedImages[0]); ?>"
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
            <h2 class="mb-4"><?php echo $title2 ?>
               <span class="text-secondary"></span> 
            </h2>
            <p class="fs-5">
            <?php echo $desc2 ?>
              
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
        src="../../assets/landing_assets/images/decoration-leaves.svg"
        class="decoration-star position-absolute"
        alt=""
      />
      <div class="container position-relative z-3 reveal">
        <div class="row">
          <div class="col-lg-6">
            <div class="image-container d-flex justify-content-center">
              <img
                src="<?php echo htmlspecialchars($uploadedImages[1]); ?>"
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
                  <?php echo $goal1 ?>
                    
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                  <?php echo $goal2 ?>
                    
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                  <?php echo $goal3 ?>
                    
                  </p>
                </li>
                <li class="d-flex mb-3">
                  <i class="fas fa-check text-primary fa-2x mx-4"></i>
                  <p>
                  <?php echo $goal4 ?>
                    
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
              <?php echo $desc3 ?>
                
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
        src="../../assets/landing_assets/images/decoraiton-star-circle.svg"
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
              <?php echo $desc4 ?>
                
              </p>
              <a href="" class="mt-5 btn btn-secondary text-white"
                >Get Started</a
              >
            </div>
          </div>
          <div class="col-lg-6">
            <div class="image-container">
              <img
                src="<?php echo htmlspecialchars($uploadedImages[2]); ?>"
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
            <?php echo $faqdesc ?>
              
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
                    <span class="me-3 fs-18 fw-bold">01.</span><?php echo $faq_q1 ?>
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
                    <?php echo $faq_a1 ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">02.</span><?php echo $faq_q2 ?>
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
                    <?php echo $faq_a2 ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">03.</span><?php echo $faq_q3 ?>
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
                    <?php echo $faq_a3 ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">04.</span><?php echo $faq_a4 ?>
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
                    <?php echo $faq_a4 ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">05.</span><?php echo $faq_q5 ?>
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
                    <?php echo $faq_a5 ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">06.</span><?php echo $faq_q6 ?>
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
                    <?php echo $faq_a6 ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">07.</span><?php echo $faq_q7 ?>
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
                    <?php echo $faq_a7 ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">08.</span><?php echo $faq_q8 ?>
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
                    <?php echo $faq_a8 ?>
                      
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
                    <span class="me-3 fs-18 fw-bold">09.</span><?php echo $faq_q9 ?>
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
                    <?php echo $faq_a9 ?>
                    
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
                    <span class="me-3 fs-18 fw-bold">10.</span><?php echo $faq_q10 ?>
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
                    <?php echo $faq_a10 ?>
                     
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 my-auto">
            <div class="image-container">
              <img
                src="<?php echo htmlspecialchars($uploadedImages[3]); ?>"
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
                src="<?php echo htmlspecialchars($uploadedImages[4]); ?>"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title"><?php echo $pj1_title ?></h5>
                <p class="card-text">
                <?php echo $pj1_desc ?>
                  <a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="<?php echo htmlspecialchars($uploadedImages[5]); ?>"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title"><?php echo $pj2_title ?></h5>
                <p class="card-text">
                <?php echo $pj2_desc ?>
                  <a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="<?php echo htmlspecialchars($uploadedImages[6]); ?>"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title"><?php echo $pj3_title ?></h5>
                <p class="card-text">
                <?php echo $pj3_desc ?>
                  <a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="<?php echo htmlspecialchars($uploadedImages[7]); ?>"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title"><?php echo $pj4_title ?></h5>
                <p class="card-text">
                <?php echo $pj4_desc ?>
                  <a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="<?php echo htmlspecialchars($uploadedImages[8]); ?>"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title"><?php echo $pj5_title ?></h5>
                <p class="card-text">
                <?php echo $pj5_desc ?>
                  <a href="" class="article.html">...Read More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img
                src="<?php echo htmlspecialchars($uploadedImages[9]); ?>"
                alt=""
                class="rounded-4"
              />
              <div class="card-body">
                <h5 class="card-title"><?php echo $pj6_title ?></h5>
                <p class="card-text">
                <?php echo $pj6_desc ?>
                  <a href="" class="article.html">...Read More</a>
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
                src="<?php echo htmlspecialchars($uploadedImages[10]); ?>"
                alt=""
                class="rounded-circle"
                width="120"
              />
              <p class="w-50 my-4 fst-italic fs-4 mb-4">
              <?php echo $xp1_comment ?>
                
              </p>
              <div class="fw-bold fs-5 mt-4"><?php echo $xp1_name ?></div>
              <!-- <div>General Manager - Marvie</div> -->
            </div>
          </div>
          <div class="carousel-item">
            <div
              class="d-flex flex-column justify-content-center align-items-center text-center"
            >
              <img
                src="<?php echo htmlspecialchars($uploadedImages[11]); ?>"
                alt=""
                class="rounded-circle"
                width="120"
              />
              <p class="w-50 my-4 fst-italic fs-4 mb-4">
              <?php echo $xp2_comment ?>
                
              </p>
              <div class="fw-bold fs-5 mt-4"><?php echo $xp2_name ?>Alyssa Rivera</div>
              <!-- <div>Team Leader - Marvie</div> -->
            </div>
          </div>
          <div class="carousel-item">
            <div
              class="d-flex flex-column justify-content-center align-items-center text-center"
            >
              <img
                src="<?php echo htmlspecialchars($uploadedImages[12]); ?>"
                alt=""
                class="rounded-circle"
                width="120"
              />
              <p class="w-50 my-4 fst-italic fs-4 mb-4">
              <?php echo $xp3_comment ?>
                
              </p>
              <div class="fw-bold fs-5 mt-4"><?php echo $xp3_name ?></div>
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
        src="../../assets/landing_assets/images/decoraiton-star-circle.svg"
        alt=""
        class="decoration-star position-absolute"
      />

      <div class="container position-relative z-3">
        <div class="row">
          <div class="col-lg-6 d-none d-md-block">
            <div class="image-container">
              <img
                src="../../assets/landing_assets/images/contact.png"
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
            <?php echo $about ?>
              
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
                <a href="">Services</a>
                <a href="">Register</a>
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

    <script src="../../assets/landing_assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/landing_assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
      function goBack() {
            window.history.back(); // Takes the user to the previous page in their browsing history
        }


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
