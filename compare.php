<!DOCTYPE html>
<html>
<head>
	<title>Plan for Smart Service : Cart</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" type="text/css" href="css/contact.css">
   <link rel="stylesheet" type="text/css" href="service.css">
</head>
<div id="navbar">
	<a href="testing.php" style="width:7%; position: absolute; right: 22%; color: rgb(0,0,0) !important">Home</a>
	<a href="database.php" style="width:7%; position: absolute; right: 17% ;color: rgb(0,0,0) !important">Database</a>
	<a onclick="openForm()" style="width:7%; position: absolute; right: 11%; color: rgb(0,0,0) !important"> Contact Us</a>
	<a href="" style="width:7%; position: absolute; right: 5%; color: rgb(0,0,0) !important"> Reviews</a>
	<a href="testing.php#!/services" style="width:7%;  position: absolute; right: 0%; color: rgb(0,0,0) !important"> Service</a>
	<a href="cart.php">
	<img alt="Facebook" src="https://www.charge.com/wp-content/uploads/2015/12/cart.png" class="thumbnail" width="50" height="50"></a>
</div>

<form action="" method="post">
  <input type="radio" id="1" name="option" value="1">
  <label for="male">Option 1</label>
  <input type="radio" id="1" name="option" value="2">
  <label for="female">Option 2</label>
  <button id="submit"> Submit</button>
  </form>

<a href="cart.php" style="width:7%; position: absolute;bottom: 60% ; color: rgb(0,0,0) !important">Continue</a>
</body>
</html>

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


    echo "<br>";
    echo "<br>";
		$sql = "SELECT * FROM comparetablea";
		if($result = mysqli_query($conn, $sql)){
		    if(mysqli_num_rows($result) > 0){
		        echo "<table>";
		            echo "<tr>";
		                echo "<th>Car</th>";
		                echo "<th>Starting Location</th>";
		                echo "<th>Destinnation</th>";
		                echo "<th>Date</th>";
										echo "<th>Time</th>";
		            echo "</tr>";
		        while($row = mysqli_fetch_array($result)){
		            echo "<tr>";
		                echo "<td>" . $row['car_name'] . "</td>"."</td>";
		                echo "<td>" . $row['startloc'] . "</td>"."</td>"."</td>";
		                echo "<td>" . $row['endloc'] . "</td>"."</td>"."</td>";
		                echo "<td>" . $row['date_'] . "</td>"."</td>"."</td>";
										echo "<td>" . $row['time_'] . "</td>"."</td>"."</td>";
                    echo "<td>" . $row['price'] . "</td>"."</td>"."</td>";
		            echo "</tr>";
		        }
		        echo "</table>";
		        mysqli_free_result($result);
          }
        }
echo "<br>";
echo "<br>";

$save = $_POST['option'] ?? "";

if ($save === "1"){
$sql = "INSERT INTO Ordertable(car_name,startloc, endloc, date_, time_,price)
SELECT car_name,startloc, endloc, date_, time_,price
FROM Comparetablea
WHERE id = 3";
}
elseif ($save ==="2"){
  $sql = "INSERT INTO Ordertable(car_name,startloc, endloc, date_, time_,price)
  SELECT car_name,startloc, endloc, date_, time_,price
  FROM Comparetablea
  WHERE id =4";

}
if ($conn->multi_query($sql) === TRUE) {

} else {
   echo "<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}


		mysqli_close($conn);
		?>