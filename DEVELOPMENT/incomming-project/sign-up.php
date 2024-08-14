<?php
//  fullName, emailAddress, passWord
if(isset($_POST['submit'])){
  $fullName = $_POST['fullName'];
  $emailAddress = $_POST['emailAddress'];
  $passWord = $_POST['passWord']; 
  $passWords = $_POST['passWords']; 
  $passwordHaSH = password_hash($passWord , PASSWORD_DEFAULT);
  $errors = array();

  if(empty( $fullName ) or empty( $emailAddress ) or  empty( $passWord ) or empty( $passWords )){
      array_push($errors , 'all fields are required');
  }
  if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
    array_push($errors , "Email is invalid");
  }
  if(strlen($passWord) < 8){
    array_push($errors , "Password must be at least 8 characters long");
  }
  if($passWord !== $passWords){
    array_push($errors , "password do not match");
  }
  if(count($errors)>0){
      
  }
  else{
    require_once('../incomming-project/Database/database.php');
    $sql_insert = "INSERT INTO REGISTRATION (fullname , emailaddress , password
                  VALUES(?,?,?)";
  }
}
  
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup-style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="../assets/landing_css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/landing_css/style.css">
	<title>Document</title>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">


    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black"id="card-body">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form class="mx-1 mx-md-4" action="sign-up.php"  method="POST">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
				          	<label class="form-label" for="fullname"> Full name</label>
                    <input type="text" id="fullname" class="form-control" placeholder="example: Jonathan Villapando" name="fullName" required value=""/>                  
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
				            	<label class="form-label" for="email" >Email</label>
                      <input type="email" id="email" placeholder="@gmail.com" class="form-control" name="emailAddress"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
				          	  <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" class="form-control" name="passWord" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
				          	  <label class="form-label" for="passWords">Repeat Password</label>
                      <input type="password" id="passWords" class="form-control" name="passWords" />
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" name="submit"></input>
                  </div>

                </form>

              </div>
              <?php foreach($errors as $error){
        echo "<div class='alert alert-danger'> $error </div>" ;
         } ?>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 border-start border-5 border-dark">
              
                <img src="../assets/MRM IMAGES/solar-images-1.jpg"
                  class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</section>
</body>
</html>