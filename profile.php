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
        <a class="navbar-brand" href="index.html">Xeno</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="drdashboard.php">Dashboard
                
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="profile.php">Profile</a>
              <span class="sr-only">(current)</span>
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

        <section class="section-padding area" >
            <div class="container">
               
             <div class="row">
                <div class="col-sm-12 text-center">
                  
               <div class="section-title text-center" style="">
                Please complete your profile.
                    </div>

                </div>
                
                
            </div>
            <div class="row">
              <div class="col-sm-12">
                
                <form  class="form register" method="post" action="functions.php" style="display: block; position: relative; margin:0 auto;">
                                <div class="row">
                                   <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="d_id" placeholder="User ID <?php echo ucwords($_SESSION['user_id']); ?>" id="id" readonly>
                                    </div>
                                  <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="name" placeholder="<?php echo ucwords($_SESSION['first_name']); ?> <?php echo ucwords($_SESSION['last_name']);?>" value="<?php echo ucwords($_SESSION['first_name'])?> <?php echo ucwords($_SESSION['last_name']);?>" id="name" readonly>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="email" class="form-control"  name="email" placeholder="<?php echo ucwords($_SESSION['email']); ?>" required id="emailAddress" readonly>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="phone" placeholder="<?php echo ucwords($_SESSION['phone']); ?>" value="<?php echo ucwords($_SESSION['phone']); ?>" readonly id="phone">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="license" placeholder="Enter your Car license Number" required id="license">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control"  name="area" placeholder="Enter your service area." required id="area">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <select class="form-control" name="status_as" >
                                          <option>Status As</option>
                                          <option value="0">Free</option>
                                          <option value="1">Busy</option>
                                        </select>
                                    </div>      

                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-default btn-normal" name="pr_submit"  >Submit Info</button>
                                       
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
