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
              <a class="nav-link" href="index.php">Dashboard
                <span class="sr-only">(current)</span>
              </a>
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
            <div class="container-fluid">
                 <div class="row">
                <div class="col-sm-12" style="background-color: black;">
                    <div class="section-title text-center" style="background-color: black; color: white; font-size: 20px; padding: 20px 0;">
    Welcome to the dashboard! <span class="user-name"><?php echo ucwords($_SESSION['first_name'])?> <?php echo ucwords($_SESSION['last_name']);?> </span> 
    
                         
                    </div>
                </div>
                <div class="col-sm-12" style="background: #f9f9f9;" >
                  <div id="txtHint"></div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-12 text-center">
                  
   <form id="distance_form">
  
    <input id="origin-input" class="controls" type="text"
        placeholder="Enter an origin location">

    <input id="destination-input" class="controls" type="text"
        placeholder="Enter a destination location">

    <div id="mode-selector" class="controls" >
    
      <input type="submit" name="submit" id="submit">
      
 </div>
 
    </form>

    <div id="map" ></div>

                </div>
                <div class="col-sm-12">
                    <div id="result">
<ul class="list-group">
  <li  class="list-group-item d-flex justify-content-between align-items-center">
            DISTANCE IN KILO:
            <span id='in_kilo' class="badge badge-primary badge-pill"></span>
        </li>
<li  class="list-group-item d-flex justify-content-between align-items-center">
            FARE:
            <span id="duration_value" class="badge badge-primary badge-pill"></span>
        </li>
<li  class="list-group-item d-flex justify-content-between align-items-center">
            FROM:
            <span id="from" class="badge badge-primary badge-pill"></span>
        </li>
        <li  class="list-group-item d-flex justify-content-between align-items-center">
            TO:
            <span id="to" class="badge badge-primary badge-pill"></span>
        </li>

</ul>
</div>
<form>
  <button class="btn btn-success btn-lg dinfo" onclick="showUser()" style="margin: 0 auto; display: block; width:150px; margin-top:20px;"> CONFIRM</button>
</form>
    </div>
                
            </div>

    
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="section-title text-center" style="background-color: black; color: white; font-size: 20px; padding: 20px 0;">
    Leave Us A Feedback!   
                         
                    </div>
      </div>
      <div class="col-sm-12">
         <form  class="form register" method="post" action="functions.php" style="display: block; position: relative; margin:0 auto;
    width: 600px;   border-radius: initial;  border: none; max-width: initial;">
                                <div class="row">
                                   
                                    <div class="form-group col-sm-12">
                                        <textarea cols="20" rows="5" class="form-control"  name="feedback" placeholder="Write your Feedback" required id="feedback"></textarea>
                                    </div>      

                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-default btn-normal" name="feed_submit"  >Submit </button>
                                       
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
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: 23.752983, lng: 90.377866},
          zoom: 13
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});


        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

       // calculate distance
        function calculateDistance() {
            var origin = $('#origin-input').val();
            var destination = $('#destination-input').val();
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callback);
        }
        // get distance results
        function callback(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    console.log(response.rows[0].elements[0].distance);
                    var distance_in_kilo = distance.value / 1000; // the kilom               
                    var price_value = distance_in_kilo*20;
                    $('#in_kilo').text(distance_in_kilo.toFixed(2));
                    $('#duration_value').text(price_value);
                    $('#from').text(origin);
                    $('#to').text(destination);
                }
            }
        }
        // print results on submit the form
        $('#distance_form').submit(function(e){
          e.preventDefault();
            calculateDistance();
        });



function showUser() {
   
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getdriver.php",true);
        xmlhttp.send();
    
}
$('.dinfo').click(function(e) {
    e.preventDefault();
    showUser();
    // Normal code goes here but you no longer need return false;
});

    </script>
    


  </body>

</html>
