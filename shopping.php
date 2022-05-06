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
				<button style="margin-left: 29px;" class="dropbtn"><a id = "pink" href = "nightout.php">NIGHT OUT</a></button>
			
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
				<button style="margin-left: 29px;" class="dropbtn"><a id = "selectednav" href ="shopping.php">SHOPPING</a></button>
			
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
		<b><i><u>Login to access content</u></i></b>
		<br>
		Don't have an account? Click <a href = "profile.html"> here </a> to register
		</p>


 	<form method = "post" action = "shopping.php">


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
		print<<<SHOPPING
<!DOCTYPE html>

<html lang="en">

<head>
   <title>Shopping - Howdy, Austin</title>
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
				<button style="margin-left: 29px;" class="dropbtn"><a id="selectednav" href ="shopping.php">SHOPPING</a></button>
			
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

	<h1 class="subtitle">Thrift Stores</h1>

	<div>
	<img class="pics" src="photos/pavement.jpg" alt="Pavement">

	<div class="blurb">
	<br>
	<h2 class="name">Pavement</h2>
	<p class="text">Pavement is a unique buy/sell/trade thrift store offering a vast selection of new and used clothes, shoes, and accessories. The merchandise is curated with customers in mind, and offers everything from vintage wear, new clothes, and gently used items brought in from the public. The hand-picked selections are absolutely beautiful</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/uptowncheapskate.jpg" alt="Uptown Cheapskate">

	<div class="blurb">
	<br>
	<h2 class="name">Uptown Cheapskate</h2>
	<p class="text">Uptown Cheapskate is nothing if not stylish. They pay cash for gently used merchandise, handbags, and accessories and resell them for up to 70% off retail value! With hundreds of new items for sale each day, there's always something to grab from your favorite designer for a cheap price all under one roof. </p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/flamingovintage.jpg" alt="Flamingo Vintage">

	<div class="blurb">
	<br>
	<h2 class="name">Flamingo Vintage</h2>
	<p class="text">Flamingo Vintage offers the most gorgeous, high-quality vintage pieces by-the-pound. Located on Guadalupe Street, this store is an absolute staple in the Austin thrifting community due to their top-notch merchandise and lovely staff.</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/buffaloexchange.jpg" alt="Buffalo Exchange">

	<div class="blurb">
	<br>
	<h2 class="name">Buffalo Exchange</h2>
	<p class="text">If you're looking for an eclectic new addition to your wardrobe, Buffalo Exchange is the place for you! Their proximity to the University of Texas means they curate to a college-age clientele, so this is a great spot to curate a youthful style. They accept recycled closet cleanouts as a way to help the environment while providing you with a bit of cash to trade in for a new wardrobe!</p>
	</div>
	</div>


	<br><br><br><br><br><br><br><br><br><br><br>
  
	<div class="bottom-info">
		<p id = "contact"></p>
		<script>document.getElementById("contact").innerHTML = "CONTACT US <br>Â© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
	</div>
</body>
</html>
SHOPPING;

   	 	$username = $_COOKIE["username"];
  	}
?>
