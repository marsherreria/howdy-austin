<?php
sql();

function sql() {
	$server = "spring-2022.cs.utexas.edu";
	$my_user = "cs329e_bulko_mariana";
	$my_password = "derby6crude6divine";
	$dbName = "cs329e_bulko_mariana";

	$mysqli = new mysqli ($server, $my_user, $my_password, $dbName);

	$name  = $mysqli -> real_escape_string($_POST["name"]);
	$email  = $mysqli -> real_escape_string($_POST["email"]);
	$comment = $mysqli -> real_escape_string($_POST["comments"]);
	$connection = $mysqli -> real_escape_string($_POST["connection"]);
		
	$command = "INSERT INTO form VALUES ('$name, '$email', '$comment', '$connection')";
	$mysqli -> query($command);
}

run_page();

function run_page() {
print <<<THANK_YOU
<html>
  <head>
   <title>Profile - Howdy, Austin</title>
   <meta charset="UTF-8">
   <meta name="description"
   <meta name="author" content="Hana Bredstein, Mariana Herreria, Kaitlyn Ream, Hayley Slotboom">
   <link href="home.css" rel="stylesheet">
   <link rel="ICON" href="DISCO.png">

</head>
<body>

<a href="home.html">
    <img src="HOWDY-AUSTIN.png" width="475" height="100">
    </a>


        <div class="navbar">
			<button style="margin-left: 29px; float: left" class="dropbtn"><a href="home.html">HOME</a></button>
			
			<div class="dropdown">
				<button style="margin-left: 29px;" class="dropbtn"><a id="pink" href= "foodanddrink.php">FOOD & DRINK</a></button>
			
				<div class="dropdown-content">
					<a href="foodanddrink.php">Restaurants</a>
     			 		<a href="foodanddrink.php#coffeeshops">Coffee Shops</a>
      					<a href="foodanddrink.php#bobatea">Boba Tea</a>
				</div>
			</div>

			<div class="dropdown">
				<button style="margin-left: 29px;" class="dropbtn"><a href="outdoors.php">OUTDOORS</a></button>
			
				<div class="dropdown-content">
					<a href="outdoors.php">Hiking</a>
     			 		<a href="outdoors.php#swimming">Swimming</a>
					<a href="outdoors.php#kayaking">Kayaking</a>
      					<a href="outdoors.php#rockclimbing">Rock Climbing</a>
				</div>
			</div>

			<div class="dropdown">
				<button style="margin-left: 29px;" class="dropbtn"><a id="pink" href = "nightout.php">NIGHT OUT</a></button>
			
				<div class="dropdown-content">
					<a href="nightout.php">Bars</a>
     			 		<a href="nightout.php#clubs">Clubs</a>
				</div>
			</div>

			<div class="dropdown">
				<button style="margin-left: 29px;" class="dropbtn"><a href = "campus.php">CAMPUS</a></button>
			
				<div class="dropdown-content">
					<a href="campus.php">Study Places</a>
				</div>
			</div>

			<div class="dropdown">
				<button style="margin-left: 29px;" class="dropbtn"><a id="pink" href ="shopping.php">SHOPPING</a></button>
			
				<div class="dropdown-content">
     			 		<a href="shopping.php">Thrift Stores</a>
				</div>
			</div>

			<div class="dropdown">
				<button style="margin-left: 29px;" class="dropbtn"><a href= "events.php">EVENTS</a></button>
			
				<div class="dropdown-content">
					<a href="events.php">Events</a>
     			 		<a href="events.php#sports">Sports</a>
				</div>
			</div>

			<button style="margin-left: 29px;" class="dropbtn""><a id="selectednav" href="contact.html">CONTACT US</a></button>

			<button style="margin-left: 29px;" class="dropbtn"><a href= "aboutus.html">ABOUT US</a></button>


		</div>

	</div>



<p id = "instructions"><b><i><u>Thank you for your feedback!<u><i><b></p>

<div class="bottom-info">
    <p id = "contact"></p>
    <script>document.getElementById("contact").innerHTML = "CONTACT US <br>Â© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
</div>
</body>
</html>
THANK_YOU;
}
?>

