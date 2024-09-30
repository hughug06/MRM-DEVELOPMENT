<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap 5 Tab List Example with Design</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom Design */
    .nav-tabs .nav-link {
      color: #555;
      font-weight: bold;
      background-color: #f8f9fa;
      border: none;
    }

    .nav-tabs .nav-link.active {
      color: white;
      background-color: #0056b3;
    }

    .tab-content {
      padding: 20px;
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-top: none;
      border-radius: 0 0 10px 10px;
    }

    .tab-content h3 {
      color: #333;
      margin-bottom: 15px;
    }

    .tab-content p {
      font-size: 14px;
      color: #666;
    }

    .container {
      background-color: #f8f9fa;
      padding: 30px;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true">About</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Edit Profile</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="chain-tab" data-bs-toggle="tab" data-bs-target="#chain" type="button" role="tab" aria-controls="chain" aria-selected="false">Chaintercom</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="service-tab" data-bs-toggle="tab" data-bs-target="#service" type="button" role="tab" aria-controls="service" aria-selected="false">Service</button>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
      <h3>Biodata</h3>
      <p>Hi, I'm Petey Cruiser, the industry's standard dummy text since the 1500s.</p>
      <h3>Experience</h3>
      <p><strong>Lead Designer / Developer</strong><br>websitename.com (2010-2015)</p>
      <p><strong>Senior Graphic Designer</strong><br>coderhemes.com (2007-2009)</p>
    </div>
    
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <h3>Edit Profile</h3>
      <p>Update your profile information here.</p>
      <!-- Add profile update form or details here -->
    </div>

    <div class="tab-pane fade" id="chain" role="tabpanel" aria-labelledby="chain-tab">
      <h3>Chaintercom</h3>
      <p>Chat system to connect with users and team members.</p>
    </div>

    <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
      <h3>Service</h3>
      <p>Overview of all services offered, including maintenance and support.</p>
    </div>
  </div>
</div>

<!-- Bootstrap 5 JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
