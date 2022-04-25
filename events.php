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
	
			$validated = validate($username, $password);
			run_form();
	
	
			if ($validated == TRUE) {
				setcookie ("username", $username, time()+30, "/");
				header("Refresh:0");
			}

			else {
				echo "<script type='text/javascript'>alert('Username or password incorrect');</script>";
			}	

		}
		else {
			run_form();
		}
	}

	function validate($username, $password) {
		$file = fopen("password.txt", "r");
		$verified = False;

	
		while (!feof($file)) {
			$line = fgets($file);
			$line_array = explode( ':', $line);
			$user = trim($line_array[0]);
			$pass = trim($line_array[1]);
			
			if ($user == $username && $pass == $password) {
				$verified = True;
			}
		}

		fclose ($file);
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

		<a href="home.html">
    		<img src="HOWDY-AUSTIN.png" width="475" height="100">
    		</a>

		<body>
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
					<a href="events.php">Music</a>
     			 		<a href="events.php#sports">Sports</a>
				</div>
			</div>

			<button style="margin-left: 29px;" class="dropbtn""><a id="pink" href="contact.html">CONTACT US</a></button>

			<button style="margin-left: 29px;" class="dropbtn"><a href= "aboutus.html">ABOUT US</a></button>


		</div>

	</div>


		<p id="instructions">
		<b><i><u>Login to access content</b></i></u>
		<br>
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

<a href="home.html">
    <img src="HOWDY-AUSTIN.png" width="475" height="100">
    </a>

<body>
    <div class="top">
	<a href="home.html">
   		<img src="HOWDY-AUSTIN.png" width="475" height="100">
   	</a>

	<div id="placeholder-img">
		<a href="profile.html">
			<img id="placeholder-img" 
				 alt="Profile" 
				 src="photos/user-placeholder.png">
	</div>


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
					<a href="events.php">Music</a>
     			 		<a href="events.php#sports">Sports</a>
				</div>
			</div>

			<button style="margin-left: 29px;" class="dropbtn""><a id="pink" href="contact.html">CONTACT US</a></button>

			<button style="margin-left: 29px;" class="dropbtn"><a href= "aboutus.html">ABOUT US</a></button>


		</div>

	</div>

	<br>

	<h1 class="subtitle">Music</h1>

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

	<br><br><br><br><br><br><br><br><br><br><br>

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

	<br id="sports"><br><br><br><br><br><br><br><br>

	<h1 class="subtitle">Sports</h1>

	<div>
	<img class="pics" src="photos/roundrockexpress.jpg" alt="Round Rock Express">

	<div class="blurb">
	<br>
	<h2 class="name">Round Rock Express</h2>
	<p class="text">Round Rock’s own minor league team plays regularly at Dell Diamond in Old Settlers’ Park. Many players have gone to play for the Rangers, Astros, and other MLB teams. <p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/utsports.jpg" alt="UT Sports">

	<div class="blurb">
	<br>
	<h2 class="name">University of Texas Sports</h2>
	<p class="text">With world-class athletes and contagious school spirit, the University of Texas provides some seriously fun game day atmospheres. Currently, baseball season is in full swing at UT Austin and the season will continue through the summer. <a href="https://texassports.com/sports/baseball/schedule/2022">Click here</a> for the full schedule!		<p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/q2.jpg" alt="Q2">

	<div class="blurb">
	<br>
	<h2 class="name">Q2</h2>
	<p class="text">For soccer fans: head on over to the Q2 stadium to cheer on Austin FC at a home game! They promise to provide a healthy, inclusive and super-charged experience to every visitor, and the vibes are honestly great.		<p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br>
	    
	<div class="bottom-info">
		<p id = "contact"></p>
		<script>document.getElementById("contact").innerHTML = "CONTACT US <br>© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
	</div>
  
</body>
</html>
EVENTS;

   	 	$username = $_COOKIE["username"];
  	}
?>
