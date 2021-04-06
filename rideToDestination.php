<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    }
catch(PDOException $e)
    {

    }

$sql = "CREATE TABLE Ordertable (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
car_name VARCHAR(10) NOT NULL,
startloc VARCHAR(255) NOT NULL,
endloc VARCHAR(255) NOT NULL,
date_ VARCHAR(255),
time_ VARCHAR(255),
price VARCHAR(255),
reg_date TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {

} else {

}


$car = $_POST['car'] ?? "";
$price = substr($car,7);
$car_name = substr($car,0,7);
$start =  $_POST['startloc'] ?? "";
$end = $_POST['endloc'] ?? "";
$date = $_POST['date'] ?? "";
$time = $_POST['time'] ?? "";

$sql = "INSERT INTO Ordertable (car_name,startloc, endloc, date_, time_,price)
VALUES ('$car_name','$start','$end','$date','$time','$price')";

if ($conn->multi_query($sql) === TRUE) {
    echo "<br>";
    echo "New records created successfully";

} else {
   echo "<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
?>


    <html>
    <head>
    	<title>Plan for Smart Service : Ride to Destination</title>
    	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    	<style type="text/css">
    	#map {
    	        height: 100%;
    	      }
    		html,
    		body {
    			height: 100%;
    			margin: 0;
    			padding: 0;
    		}

    		#map {
    			height: 100%;
    			float: left;
    			width: 70%;
    			height: 50%;
    		}

    	</style>
       <link rel="stylesheet" type="text/css" href="main.css">
       <link rel="stylesheet" type="text/css" href="css/contact.css">
    </head>
    <body>
<<<<<<< HEAD
      <div id="navbar">
    		<a href="main.html" style="width:7%; position: absolute; right: 22%; color: rgb(0,0,0) !important">Home</a>
    		<a href="database.php" style="width:7%; position: absolute; right: 17% ;color: rgb(0,0,0) !important">Database</a>
    		<a onclick="openForm()" style="width:7%; position: absolute; right: 11%; color: rgb(0,0,0) !important"> Contact Us</a>
    		<a href="" style="width:7%; position: absolute; right: 5%; color: rgb(0,0,0) !important"> Reviews</a>
    		<a href="services.html" style="width:7%;  position: absolute; right: 0%; color: rgb(0,0,0) !important"> Service</a>
        <a href="cart.php">
    		<img alt="Facebook" src="https://www.charge.com/wp-content/uploads/2015/12/cart.png" class="thumbnail" width="50" height="50"></a>
    	</div>
=======
    <button onclick="home()" class="float-left submit-button" >Home</button>
    <button onclick="logo()" class="float-left submit-button" >System logo</button>
    <button onclick="aboutUs()" class="float-left submit-button" >About us</button>
    <button	onclick="contactUs()" class="float-left submit-button" >Contact us</button>
    <button onclick="signup()" class="float-left submit-button" >Sign up</button>
	<button onclick="review()" class="float-left submit-button" >Reviews</button>
	<button onclick="cart()" class="float-left submit-button" >Shopping Cart</button>
	<button onclick="services()" class="float-left submit-button" >Types of Service</button>

	<script>
	function home(){
	  window.location='main.html';
	}
	function aboutUs(){
	  window.location='aboutUs.html';
	}
	function contactUs(){
	  window.location='contactUs.html';
	}
	function ride(){
	  window.location='rideToDestination.php';
	}
	function deliver(){
	  window.location='ride&deliver.php';
	}
	function services(){
	  window.location='services.html';
	}
	function cart(){
	  window.location='cart.php';
	}
	function signup(){
	  window.location='signup.php';
	}
	function logo(){
      window.location='logo.html';
    }
	function review(){
		window.location='review.html';
	}
</script>
>>>>>>> 0ab051be7c0ed312cb0b74df91542113814f03b3

    	<script>
    	    function initMap() {
    	      const directionsService = new google.maps.DirectionsService();
    	      const directionsRenderer = new google.maps.DirectionsRenderer();
    	      const map = new google.maps.Map(document.getElementById("map"), {
    	        zoom: 7,
    	        center: { lat: 43.6532, lng: -79.3832 },
    	      });
    	      directionsRenderer.setMap(map);

    	      const onChangeHandler = function () {
    	        calculateAndDisplayRoute(directionsService, directionsRenderer);
    	      };
    				document
    	          .getElementById("start")
    	          .addEventListener("change", onChangeHandler);
    	        document
    	          .getElementById("end")
    	          .addEventListener("change", onChangeHandler);
    	    }

    	    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    	      directionsService.route(
    	        {
    	          origin: {
    	            query: document.getElementById("start").value,
    	          },
    	          destination: {
    	            query: document.getElementById("end").value,
    	          },
    	          travelMode: google.maps.TravelMode.DRIVING,
    	        },
    	        (response, status) => {
    	          if (status === "OK") {
    	            directionsRenderer.setDirections(response);
    	          }
    	        }
    	      );
    	    }
    	  </script>
    	<div>

    <br>
    <img src="https://smartcdn.prod.postmedia.digital/driving/wp-content/uploads/2020/03/chrome-image-410909.png" alt="2020 wrx" width="500">
    <img src="https://images.honda.ca/models/H/Models/2021/civic_sedan/touring_10666_241modern_steel_metallic_front.png?width=1000" alt="2019 civic" width="500">
    <img src="https://cars.usnews.com/static/images/Auto/izmo/i94428619/2019_toyota_camry_angularfront.jpg" alt="2019 camry" width="500">

    <br>
<form action="" method="post">
      <input type="radio" id="Wrx" name="car" value="wrx      $30">
      <label for="male">2020 Subaru Wrx ($30)</label>
      <input type="radio" id="Civic" name="car" value="civic   $10">
      <label for="female">2019 Honda Civic ($10)</label>
      <input type="radio" id="Camry" name="car" value="camry   $20">
      <label for="other">2019 Toyota Camry ($20)</label><br><br>

    	<label for="fname">Starting location(City, Province(in Acronyms)):</label>
    	<input type="text" id="start" name="startloc"><br><br>
    	<label for="fname">Destination(City, Province(in Acronyms)):</label>
    	<input type="text" id="end" name="endloc"><br><br>

    	<label for="fname">Date:</label>
    	<input type="text" id="Date" name="date"><br><br>
    	<label for="fname">Time:</label>
    	<input type="text" id="Time" name="time"><br><br>
      <button id="submit"> Add to Cart</button>
</form>
    	<script>
    	document.getElementById("submit").addEventListener("click",function(){
    			alert("Order Added to Cart");
    		});
    	</script>
    </div>
    		<div id="map"></div>

    		<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    		<script
    			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGCD8Bk6r07WnOxrz5AYEbMPdOA1NOGPE&callback=initMap&libraries=&v=weekly"
    			async
    		></script>



        <!--Contact Us Popup Code -->
        	<div class="form-popup" id="contactus">
        				<div class="wrap-contact2">
        					<form class="contact2-form">
        						<span class="contact2-form-title">
        							Contact Us
        						</span>

        						<div class="wrap-input2">
        							<input class="input2" type="text" name="name">
        							<span class="focus-input2" data-placeholder="NAME"></span>
        						</div>

        						<div class="wrap-input2">
        							<input class="input2" type="text" name="email">
        							<span class="focus-input2" data-placeholder="EMAIL"></span>
        						</div>

        						<div class="wrap-input2">
        							<textarea class="input2" name="message"></textarea>
        							<span class="focus-input2" data-placeholder="MESSAGE"></span>
        						</div>

        						<div class="container-contact2-form-btn">
        							<div class="wrap-contact2-form-btn">
        								<div class="contact2-form-bgbtn"></div>
        								<button class="contact2-form-btn">
        									Send Your Message
        								</button>
        							</div>
        							<div class="wrap-contact2-form-btn">
        								<div class="contact2-form-bgbtn"></div>
        								<button class="contact2-form-btn" onclick="closeForm()">
        									Close
        								</button>
        							</div>
        						</div>
        					</form>
        				</div>

        	</div>
        		<script>

        		function openForm() {
        		  document.getElementById("contactus").style.display = "block";
        		}

        		function closeForm() {
        		  document.getElementById("contactus").style.display = "none";
        		}
        		</script>
    </body>
    </html>
