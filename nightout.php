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
				<button style="margin-left: 29px;" class="dropbtn"><a id = "selectednav" href = "nightout.php">NIGHT OUT</a></button>
			
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
				<button style="margin-left: 29px;" class="dropbtn"><a  href= "events.php">EVENTS</a></button>
			
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


 	<form method = "post" action = "nightout.php">


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
		print<<<NIGHTOUT
<!DOCTYPE html>

<html lang="en">

<head>
   <title>Night Out - Howdy, Austin</title>
   <meta charset="UTF-8">
   <meta name="description" content="Night Out">
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
				<button style="margin-left: 29px;" class="dropbtn"><a id="selectednav" href = "nightout.php">NIGHT OUT</a></button>
			
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

	<br>

	<h1 class="subtitle">Bars</h1>

	<div>
	<img class="pics" src="photos/cainandabels.jpg" alt="Cain & Abel's">

	<div class="blurb">
	<br>
	<h2 class="name">Cain & Abel's</h2>
	<p class="text">A classic college bar nestled right in the heart of West Campus that’s filled with UT students every night of the week -- don’t forget to go on Tuesdays for dollar beers. They’re notoriously strict on fake IDs  so it’s almost like a rite of passage for UT students to turn 21 and finally get to start going here for drinks with friends.<p>
	<a href="https://abels.com/original">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/ranch.jpg" alt="The Ranch">

	<div class="blurb">
	<br>
	<h2 class="name">The Ranch</h2>
	<p class="text">The Ranch prides itself on being the best bar in Austin, Texas. With lively nightlife, bottle service, and generally just good vibes, The Ranch promises the biggest party experience on West 6th Street every Friday and Saturday night.<p>
	<a href="https://www.theranchaustin.com/">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/unbarlievable.jpg" alt="Unbarlievable">

	<div class="blurb">
	<br>
	<h2 class="name">Unbarlievable</h2>
	<p class="text">Recently under new management, Unbarlievable is a kooky, circus-themed bar with not one, but TWO locations in Austin (Rainey St and West 6th).  Complete with slides, games, large animal statues, Unbarlievable is a great place to go with friends!<p>
	<a href="https://www.unbarlievable.com/">Website</a>
	</div>
	</div>

	<br id="clubs"><br><br><br><br><br><br><br><br><br><br>

	<h1 class="subtitle">Clubs</h1>

	<div>
	<img class="pics" src="photos/barbarella.jpg" alt="Barbarella Austin">

	<div class="blurb">
	<br>
	<h2 class="name">Barbarella</h2>
	<p class="text">Barbarella is a club that’s always bumping and on Thursdays they do $2 (yes, TWO dollar) drinks. They play a range of exciting music and is always a fun place to go and dance!<p>
	<a href="https://www.instagram.com/barbarella_atx/?hl=en">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br>
	
 	<div class="bottom-info">
		<p id = "contact"></p>
		<script>document.getElementById("contact").innerHTML = "CONTACT US <br>© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
	</div> 
 
</body>
</html>
NIGHTOUT;

   	 	$username = $_COOKIE["username"];
  	}
?>
