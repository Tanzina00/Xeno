<?php 
  session_start();
    
  if(!isset($_SESSION))
  {
    header('location:index.php');
    exit;
  }
  
?>
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
        <a class="navbar-brand" href="index.php">Xeno</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="drdashboard.php">Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
               <a href="logout.php?logout=true" class="nav-link">Logout</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

        <section class="section-padding area" style="height: 90vh">
            <div class="container">
                 <div class="row">
                <div class="col-sm-12">
                    <div class="section-title text-center" style="background-color: black; color: white; font-size: 20px; padding: 20px 0;">
    Welcome to the dashboard! <span class="user-name"><?php echo ucwords($_SESSION['first_name'])?> <?php echo ucwords($_SESSION['last_name']);?> </span> 
    
                         
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-12 text-center">
                  
               <div class="section-title text-center" style="">
                Please complete your profile.<br>
   Want to get assigned? Keep your status as free to be assigned. And if you are already assigned change it to busy.
   <form action="functions.php" method="post" style="margin-top: 100px;">
<select name="status_as" style="padding: 6px 0; width: 200px; font-size: 19px;">
<option value="">Select a status:</option>
<option value="0">Free</option>
<option value="1">Busy</option>
</select>
<input type="submit" name="status" class="btn btn-success" value="Confirm">
</form>  
<div style=" margin-top: 30px;"><b id="txtHint" style="text-align: center; font-size: 18px;"><?php echo "your current status is ".$_SESSION['status']; ?></b></div>
    
                         
                    </div>

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQyiTDN6OK97ynAD4ps51JM5qLlMn9Fuk&libraries=places&callback=initMap"
        async defer></script>
 
<script>

</script>
  </body>

</html>
