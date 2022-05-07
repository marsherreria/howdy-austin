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
				<button style="margin-left: 29px;" class="dropbtn"><a  id = "selectednav" href = "campus.php">CAMPUS</a></button>
			
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


 	<form method = "post" action = "campus.php">


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
		print<<<CAMPUS
<!DOCTYPE html>

<html lang="en">

<head>
   <title>Campus - Howdy, Austin</title>
   <meta charset="UTF-8">
   <meta name="description" content="Campus">
   <meta name="author" content="Hana Bredstein, Mariana Herreria, Kaitlyn Ream, Hayley Slotboom">
   <link href="home.css" rel="stylesheet">
   <link rel="ICON" href="DISCO.png">

</head> 
<body>


<div class="top">
	<a href="home.html">
   		<img src="HOWDY-AUSTIN.png" width="475" height="100">
   	</a>

	<div class="navbar">
			<button style="margin-left: 29px; float: left" class="dropbtn"><a  href="home.html">HOME</a></button>
			
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
				<button style="margin-left: 29px;" class="dropbtn"><a id = "selectednav" href = "campus.php">CAMPUS</a></button>
			
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

	<br><br><br><br><br><br>

	<h1 class="subtitle">Study Spots</h1>

	<div>
	<img class="pics" src="photos/norman.jpg" alt="Norman Hackerman Patio">

	<div class="blurb">
	<br>
	<h2 class="name">Norman Hackerman Patio</h2>
	<p class="text">If you're someone who likes a bit of background noise while you study but your laptop, like mine, requires frequent charging, try hanging out at the 24th street side of the Norman Hackerman Building (NHB - the one with the canoe sculpture). This outdoor spot is shaded and has plenty of outlets!<p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/lifesciencelib.jpg" alt="Life Science Library">

	<div class="blurb">
	<br>
	<h2 class="name">Life Science Library</h2>
	<p class="text">For an extra quiet study session in a beautiful location, head to the Life Science Library on the 2nd floor of the tower for major Hogwarts vibes. What used to be the university's main library is now a quiet and well-lit space to grind out.</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/architecturelib.jpg" alt="Architecture Library">

	<div class="blurb">
	<br>
	<h2 class="name">Architecture Library</h2>
	<p class="text">Recently under new management, Unbarlievable is a kooky, circus-themed bar with not one, but TWO locations in Austin (Rainey St and West 6th).  Complete with slides, games, large animal statues, Unbarlievable is a great place to go with friends!<p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/eerbuilding.jpg" alt="EER building">

	<div class="blurb">
	<br>
	<h2 class="name">Engineering Education and Research Building</h2>
	<p class="text">The Engineering building on campus is honestly such a great place to study even if you aren't an engineer (I'm surely not one!)...the tall windows and ceilings let in an abundance of light and it's never too loud in there so you can really sit down, focus, and get your work done.</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/csbuilding.jpg" alt="CS Building">

	<div class="blurb">
	<br>
	<h2 class="name">Computer Science Building</h2>
	<p class="text">With six floors of study tables, whiteboards, and lab computers, and the the GDC has absolutely everything a student needs to succeed... including a cafe downstairs for a lunch study break! The architecture itself is modern and beautiful, and there are several different seating options to accommodate to everyone's idea of comfort. 10/10 study spot!</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/sac.png" alt="Sac">

	<div class="blurb">
	<br>
	<h2 class="name">Student Activity Center</h2>
	<p class="text">If you want a study spot that's always lively, the Student Activity Center is right for you. There are a bunch of places to study alone or in groups, from giant wooden stairs to comfy sofa chairs. And if you need a caffeine break, there's a coffee shop on the first floor!</p>
	</div>
	</div>


	<br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div class="bottom-info">
		<p id = "contact"></p>
		<script>document.getElementById("contact").innerHTML = "CONTACT US <br>Â© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
	</div>
  
</body>
</html>
CAMPUS;

   	 	$username = $_COOKIE["username"];
  	}
?>

