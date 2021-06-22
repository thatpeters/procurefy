<?php
include '../connect.php';
session_start();
if (!isset($_SESSION['userid'])) {
  header('Location: ../index.html');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">




  <link rel='stylesheet prefetch' href='https://npmcdn.com/leaflet@0.7.7/dist/leaflet.css'>



  <style>
    body {
      height: 100vh;
      padding: 0;
      margin: 0;
      background: rgba(73, 155, 234, 1);
      background: -moz-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
      background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(73, 155, 234, 1)), color-stop(100%, rgba(32, 124, 229, 1)));
      background: -webkit-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
      background: -o-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
      background: -ms-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
      background: radial-gradient(ellipse at center, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#499bea', endColorstr='#207ce5', GradientType=1);
    }

    .example-container {
      background: white;
      width: 330px;
      box-sizing: border-box;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-family: helvetica;
      font-size: 16px;
      padding: 1em;
      -webkit-box-shadow: 1px 5px 5px 0px rgba(0, 0, 0, 0.15);
      -moz-box-shadow: 1px 5px 5px 0px rgba(0, 0, 0, 0.15);
      box-shadow: 1px 5px 5px 0px rgba(0, 0, 0, 0.15);
      border-radius: 8px;
    }

    .example-container * {
      box-sizing: inherit;
      font-size: inherit;
    }

    .example-container .header {
      margin: 1em 0;
    }

    .example-container #MapLocation {
      margin-bottom: 0.75em;
    }

    .example-container input {
      width: 100%;
      margin: 0.5em 0;
      padding: 0.5em;
      border: 1px solid #569ae3;
    }
  </style>



</head>

<body>

  <div class="example-container">
    <div class="row">
      <section class="col col-2 header">Drag the Marker to the Exact Location.</section>
      <section class="col col-2 header">(Refresh to Relocate)</section>

      <section class="col col-10">
        <div class="row">
          <section class="col col-6">
            <div id="MapLocation" style="height: 350px"></div>
          </section>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="row">
            <section class="col col-3">
              <label class="input">
                <input id="Latitude" type="text" placeholder="Latitude" name="Latitude" readonly/>
              </label>
            </section>
            <section class="col col-3">
              <label class="input">
                <input id="Longitude" type="text" placeholder="Longitude" name="Longitude" readonly />

              </label>
            </section>
            <section class="col col-3">
              <label class="input">

                <input type="submit" value="Submit" id="submit" name="Submit"  disabled/>
                <input type="button" value="Back" onclick="window.location='new_post.php';" />


              </label>
            </section>
          </div>
        </form>


        <?php
        if (isset($_POST['Submit'])) {


          $_SESSION['longitude'] = $_POST['Longitude'];
          $_SESSION['latitude'] = $_POST['Latitude'];



          echo "<script>location.href='new_post.php';</script>";
        }
        ?>







      </section>
    </div>
  </div>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src='https://npmcdn.com/leaflet@0.7.7/dist/leaflet.js'></script>

  <script>
    $(function() {



      var uLat = "";
      var uLon = "";

      var getPosition = {
        enableHighAccuracy: true,
        timeout: 9000,
        maximumAge: 0
      };

      function success(gotPosition) {
        uLat = gotPosition.coords.latitude;
        uLon = gotPosition.coords.longitude;
        console.log(`${uLat}`, `${uLon}`);
        var curLocation = [uLat, uLon];

        $("#Latitude").val(uLat);
        $("#Longitude").val(uLon);
        document.getElementById("submit").disabled = false;
        var map = L.map('MapLocation').setView(curLocation, 18);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
          draggable: 'true'
        });

        marker.on('dragend', function(event) {

          var position = marker.getLatLng();
          marker.setLatLng(position, {
            draggable: 'true'
          }).bindPopup(position).update();
          $("#Latitude").val(position.lat);
          $("#Longitude").val(position.lng).keyup();
        });

        $("#Latitude, #Longitude").change(function() {
          var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
          marker.setLatLng(position, {
            draggable: 'true'
          }).bindPopup(position).update();
          map.panTo(position);
        });

        map.addLayer(marker);
      };

      function error(err) {
        alert(`ERROR(${err.code}): ${err.message}`);
        window.history.back();

      };


      navigator.geolocation.getCurrentPosition(success, error, getPosition);



    })
  </script>




</body>

</html>