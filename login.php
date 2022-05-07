<?php

	if (!isset ($_COOKIE["username"])) {
		test();
	}
	else {
		run_page();
	}
	


	function test() {
		if (isset ($_POST["login"])) {
			$username = $_POST["username"];
			$password = $_POST["password"];

			run_form();
			$validated = validate($username, $password);
	
	
			if ($validated == TRUE) {
				setcookie ("username", $username, time()+3600*24*3, "/");
				header("Refresh:0");
			}	

		}
		else {
			run_form();
		}
	}

	function validate($username, $password) {
		$server = "spring-2022.cs.utexas.edu";
		$my_user = "cs329e_bulko_mariana";
		$my_password = "derby6crude6divine";
		$dbName = "cs329e_bulko_mariana";
		$mysqli = new mysqli ($server, $my_user, $my_password, $dbName);

		$username = $mysqli -> real_escape_string($_GET["username"]);
		$password = $mysqli -> real_escape_string($_GET["password"]);


		$verified = False;

		$command = "SELECT * FROM howdyusers WHERE user = \"$username\"";
		$result = $mysqli -> query($command);

		if ($result->num_rows > 0) {
			$command = "SELECT pass FROM howdyusers WHERE user = \"$username\"";
			$result = $mysqli -> query($command);
			$row = $result->fetch_row();
			$pass2 = $row[0];

			if ($password == $pass2) {
				$verified = True;
			} else {				
				echo "<p align='center'> <font color='#004280'> Password is incorrect </font></p>";
			} 
		} else {
				echo "<p align='center'> <font color='#004280'> Username does not exist </font></p>";
		}


		return $verified;

	}


	function run_form() {
		print <<<LOGIN
		<html>

		<head>
   		<title>Profile - Howdy, Austin</title>
   		<meta charset="UTF-8">
   		<meta name="description" content="Shopping">
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

			<button style="margin-left: 29px;" class="dropbtn""><a id="pink" href="contact.html">CONTACT US</a></button>

			<button style="margin-left: 29px;" class="dropbtn"><a href= "aboutus.html">ABOUT US</a></button>


		</div>

	</div>


		<p id="instructions">
		<b><i><u>Login to access content</u></i></b>
		<br>
		Don't have an account? Click <a href = "profile.html"> here </a> to register
		</p>


 	<form method = "post" action = "login.php">


   <table id="contact-form" frame="box">

      <tr >
         <td id="label">Username: </td>
         <td><input id="username" name = "username" type = "text" placeholder="Enter username..." width="40" /></td>
      </tr>

      <tr >
         <td id="label">Password: </td>
         <td><input id="password" name = "password" type = "password" placeholder="Enter password..." width="40"/></td>
      </tr>
      
      <tr>
         <td><br></td>
      </tr>

      <tr>
         <td id="buttons"> <input id="register" name = "login" type="submit" value="Register"/> 
             <input id="clear" type="reset" value="Clear"/> </td>
      </tr>

	</table>

	</form>
  
	<div class="bottom-info">
		<p>CONTACT US <br>Â© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN 02/16/2022</p>
	</div>
	</body>
	</html>

LOGIN;
 	 }


	function run_page() {
		print <<<SUCCESS
		<html>

		<head>
   		<title>Login - Howdy, Austin</title>
   		<meta charset="UTF-8">
   		<meta name="description" content="Shopping">
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
					<a href="events.php">Music</a>
     			 		<a href="events.php#sports">Sports</a>
				</div>
			</div>

			<button style="margin-left: 29px;" class="dropbtn""><a id="pink" href="contact.html">CONTACT US</a></button>

			<button style="margin-left: 29px;" class="dropbtn"><a href= "aboutus.html">ABOUT US</a></button>


		</div>

	</div>


		<p id="instructions">
		<b><i><u>You have successfully logged in</b></i></u>
		<br>
SUCCESS;
	}
?>
