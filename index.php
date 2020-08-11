<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Xeno - A Online Vehicle Hire Service Povider</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/html5-simple-date-input-polyfill.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">
   
    <link rel="icon" href="images/favicon.jpg">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-default sticky fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">Xeno</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('images/3.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h1>Register Today & Get<br>A Discount on first Ride</h1>
            </div>
          </div>
         
        </div>
        
      </div>
                      <form  class="form login" method="post" action="functions.php">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="email" placeholder="Enter your Email" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="password" class="form-control"  name="password" placeholder="Enter your password" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <select class="form-control" name="log_as" required="">
                                          <option>Login As</option>
                                          <option value="passenger">Passenger</option>
                                          <option value="driver">Driver</option>
                                        </select>
                                    </div>      

                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-default btn-normal" name="l_submit" >Login</button>
                                       
                                    </div> 
                                    <div class="sm-info">
                                     <h5>Don't have an account? <span id="register">Sign Up Here</span></h5>
                                      <h5><span id="forget">Forgot Password?</span></h5>
                                       </div>     
                                   </div>
                            </form> <!-- end of form -->   
                            <form  class="form register" method="post" action="functions.php" >
                                <div class="row">
                                  <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="fname" placeholder="Enter your First Name" required id="firstName">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="lname" placeholder="Enter Your Last Name" required id="lastName">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="email" class="form-control"  name="email" placeholder="Enter Your Email" required id="emailAddress">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="phone" placeholder="Enter Valid Mobile Number" required id="phone">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="password" class="form-control"  name="pass" placeholder="Enter your password" required id="password">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="password" class="form-control"  name="repass" placeholder="Re-type your password" required id="password2">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <select class="form-control" name="reg_as" required="">
                                          <option>Register As</option>
                                          <option value="passenger">Passenger</option>
                                          <option value="driver">Driver</option>
                                        </select>
                                    </div>      

                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-default btn-normal" name="r_submit" id="submitForm" >Register</button>
                                       
                                    </div> 
                                    <div class="sm-info">
                                     <h5>Already have an account? <span id="login">Login Here</span></h5>
                                      <h5><span id="forget2">Forgot Password?</span></h5>
                                       </div> 

                                       <?php 
    if(isset($errorMsg))
    {
      echo '<div class="error_msg">';
      echo $errorMsg;
      echo '</div>';
      unset($errorMsg);
    }
    
    if(isset($successMsg))
    {
      echo '<div class="success_msg">';
      echo $successMsg;
      echo '</div>';
      unset($successMsg);
    }
    
  ?>    
                                    </div>
                            </form> <!-- end of form -->     
                             <form  class="form forgot" method="post" action="functions.php">
                                <div class="row">
                            
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="email" placeholder="Enter Your Email" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="password" class="form-control"  name="newpass" placeholder="Enter New password" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="password" class="form-control"  name="repass" placeholder="Re-type your password" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <select class="form-control" name="user_as" required="">
                                          <option>You Are A</option>
                                          <option value="passenger">Passenger</option>
                                          <option value="driver">Driver</option>
                                        </select>
                                    </div>    

                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-default btn-normal" name="f_submit" >Change Password</button>
                                       
                                    </div> 
                                    <div class="sm-info">
                                     <h5>Don't have an account? <span id="register2">Sign Up Here</span></h5>
                                      <h5><span id="login2">Want to Login? </span></h5>
                                       </div>     
                                   
                                </div>
                            </form> <!-- end of form -->                                 


    </header>


        <section class="section-padding area" >
            <div class="container">
                 <div class="row">
                <div class="col-sm-12">
                    <div class="section-title text-center">
                        <h2>Our Services Area</h2>                        
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-2 text-center">
                    <div class="areas">
                        <h2>Dhanmondi</h2>                        
                    </div>
                </div>
                <div class="col-sm-2 text-center">
                    <div class="areas">
                        <h2>Gulshan</h2>                        
                    </div>
                </div>
                <div class="col-sm-2 text-center">
                    <div class="areas">
                        <h2>Bonani</h2>                        
                    </div>
                </div>
                <div class="col-sm-2 text-center">
                    <div class="areas">
                        <h2>Badda</h2>                        
                    </div>
                </div>
                <div class="col-sm-2 text-center">
                    <div class="areas">
                        <h2>Airport</h2>                        
                    </div>
                </div>
                <div class="col-sm-2 text-center">
                    <div class="areas">
                        <h2>Gazipur</h2>                        
                    </div>
                </div>
            </div>

    
  </div>
</section>
       <section class="section-padding area" >
            <div class="container">
                 <div class="row">
                <div class="col-sm-12">
                    <div class="section-title text-center">
                        <h2>Our Users Feedback</h2>                        
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-offset-3 col-md-7 text-left">
                  <?php  
                  $con = mysqli_connect('localhost','root','','xeno');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"feedback");  
$sql="SELECT * FROM feedback";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
                  ?>
                  <div style="margin-bottom: 9px; text-align: left;">
                  <p><b><?php echo $row['name']." Said:"; ?> </b></p>
                  <p><?php echo $row['msg'] ?></p> 
                  </div>
                  <?php    

}

                  ?> 
            </div>
          </div>

    
  </div>
</section>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
       <p class="m-0 text-center text-white">&copy;copyright reserved by Xeno.</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/html5-simple-date-input-polyfill.min.js"></script>
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/script.js"></script>
<script type="text/javascript">
  $("document").ready(function(){
    $(".register").hide();
    $(".forgot").hide();

    $("#register, #register2").click(function(){
    $(".login, .forgot").hide();    
    $(".register").show();
});
    $("#login, #login2").click(function(){
    $(".register, .forgot").hide();    
    $(".login").show();
});
    $("#forget, #forget2").click(function(){
    $(".register, .login").hide();    
    $(".forgot").show();
});

});
</script>


  </body>

</html>
