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

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','xeno');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"driver_info");
$sql="SELECT * FROM user WHERE d_id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Driver name</th>
<th>License number</th>
<th>Phone number</th>
<th>Area In</th>
</tr>";
while($row = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['License_no'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['area'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>

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
          center: {lat: -33.8688, lng: 151.2195},
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

    </script>
    


  </body>

</html>
