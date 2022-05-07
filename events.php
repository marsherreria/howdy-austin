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
				<button style="margin-left: 29px;" class="dropbtn"><a  id = "selectednav" href= "events.php">EVENTS</a></button>
			
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


 	<form method = "post" action = "events.php">


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
		print<<<EVENTS
	<html>

<head>
   <title>Events - Howdy, Austin</title>
   <meta charset="UTF-8">
   <meta name="description" content="Events">
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
				<button style="margin-left: 29px;" class="dropbtn"><a id = "selectednav" href= "events.php">EVENTS</a></button>
			
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

	<h1 class="subtitle">Events</h1>

	<div>
	<img class="pics" src="photos/acl.jpg" alt="ACL">

	<div class="blurb">
	<br>
	<h2 class="name">Austin City Limits</h2>
	<p class="text">This star-studded festival features the likes of Megan Thee Stallion, Billie Eilish, George Strait, 
	and Paul McCartney. The festival takes places in Zilker Park over the course of two three-day weekends in the fall, but tickets sell 
	out months in advance.</p>
	<a href="https://www.aclfestival.com" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/sxsw.jpg" alt="SXSW">

	<div class="blurb">
	<br>
	<h2 class="name">SXSW</h2>
	<p class="text">Every March, South by Southwest brings countless tourists to Austin from all over the world. Lasting several
	weeks, SXSW features live music, film screenings, keynote speakers and interactive demos. If you volunteer enough hours, 
	you earn free entry to many of these events. 
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/eeyores.png" alt="Eeyores">

	<div class="blurb">
	<br>
	<h2 class="name">Eeyore's Birthday</h2>
	<p class="text">Held every Spring for the past 57 years, Eeyore's Birthday is a free event for people of all ages. It's also the biggest hippie event in Austin! There are drum circles, jugglers, performers, vendors, and of course a lot of... well you know what hippies do. The event is also a great opportunity to give back to the Austin community, as all proceds help non-profits in Texas. 
	</p>
	<a href="https://eeyores.org/" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/drumcircle.jpg" alt="Drum Circle">

	<div class="blurb">
	<br>
	<h2 class="name">Barton Springs Drum Circle</h2>
	<p class="text">Every Sunday for the past 15 years, people from all across Austin have gathered under the Monkey Tree, right next to Barton Springs, to drum the evening away. Bring a picnic blanket and come vibe out with some of Austin's most eccentric people!
	</p>
	<a href="https://www.google.com/maps/dir//The+Monkey+Tree,+Austin,+TX/@30.2628029,-97.8043374,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x8644b56b0d04a641:0x62c608e81e56b41a!2m2!1d-97.769232!2d30.2627334" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/grandprix.jpg" alt="Grand Prix">

	<div class="blurb">
	<br>
	<h2 class="name">Grand Prix</h2>
	<p class="text">Held in October, the Grand Prix attracts crowds that are completely different from those drawn by the Austin Film Festival and South by Southwest. Since the races are held all over the world, you almost have to be wealthy to be a devoted fan. And many of the F1 fans do travel to every race, whether it's in Mexico City or Monaco. Instead of driving to the track in southeast Austin, many of them commute by helicopter from downtown Austin. 
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/trailoflights.jpg" alt="Trail of Lights">

	<div class="blurb">
	<br>
	<h2 class="name">Trail of Lights</h2>
	<p class="text">Every December for over 50 years, Zilker Park transforms into a Christmas Wonderland, with over 2 million lights, 90 holiday trees, and 70 holiday displays and lighted tunnels.
	</p>
	<a href="https://austintrailoflights.org/" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>


	<br id="sports"><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<h1 class="subtitle">Sports</h1>

	<div>
	<img class="pics" src="photos/roundrockexpress.jpg" alt="Round Rock Express">

	<div class="blurb">
	<br>
	<h2 class="name">Round Rock Express</h2>
	<p class="text">Round Rock's own minor league team plays regularly at Dell Diamond in Old Settlers' Park. Many players have gone to play for the Rangers, Astros, and other MLB teams. <p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/utsports.jpg" alt="UT Sports">

	<div class="blurb">
	<br>
	<h2 class="name">University of Texas Sports</h2>
	<p class="text">With world-class athletes and contagious school spirit, the University of Texas provides some seriously fun game day atmospheres. Currently, baseball season is in full swing at UT Austin and the season will continue through the summer. <a href="https://texassports.com/sports/baseball/schedule/2022">Click here</a> for the full schedule!		<p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/q2.jpg" alt="Q2">

	<div class="blurb">
	<br>
	<h2 class="name">Q2</h2>
	<p class="text">For soccer fans: head on over to the Q2 stadium to cheer on Austin FC at a home game! They promise to provide a healthy, inclusive and super-charged experience to every visitor, and the vibes are honestly great.		<p>
	</div>
	</div>


	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/nitrocircus.jpg" alt="Nitro Circus">

	<div class="blurb">
	<br>
	<h2 class="name">Nitro Circus</h2>
	<p class="text">For nearly two decades, Nitro Circus has stunned crowds around the globe with some of the world's craziest stunts, biggest fails, and comedic moments. The hellraising performers have been coming to Dell Diamond for the past few years, so if you want to see some action, don't miss out on their show this July.
	<p>
	<a href="ttps://www.milb.com/round-rock/fans/nitro-circus" target="_blank" style="font-size:1.2em;">Tickets</a>
	</div>
	</div>


	<br><br><br><br><br><br><br><br>
	    
	<div class="bottom-info">
		<p id = "contact"></p>
		<script>document.getElementById("contact").innerHTML = "CONTACT US <br>Â© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
	</div>
  
</body>
</html>
EVENTS;

   	 	$username = $_COOKIE["username"];
  	}
?>
