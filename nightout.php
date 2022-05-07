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
					<a href="events.php">Events</a>
     			 		<a href="events.php#sports">Sports</a>
				</div>
			</div>

			<button style="margin-left: 29px;" class="dropbtn""><a id="pink" href="contact.html">CONTACT US</a></button>

			<button style="margin-left: 29px;" class="dropbtn"><a href= "aboutus.html">ABOUT US</a></button>


		</div>

	</div>

	<br><br><br><br><br><br>

	<h1 class="subtitle">Bars</h1>

	<div>
	<img class="pics" src="photos/cainandabels.jpg" alt="Cain & Abel's">

	<div class="blurb">
	<br>
	<h2 class="name">Cain & Abel's</h2>
	<p class="text">A classic college bar nestled right in the heart of West Campus that's filled with UT students every night of the week -- don't forget to go on Tuesdays for dollar beers. They're notoriously strict on fake IDs so it's almost like a rite of passage for UT students to turn 21 and finally get to start going here for drinks with friends.<p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/ranch.jpg" alt="The Ranch">

	<div class="blurb">
	<br>
	<h2 class="name">The Ranch</h2>
	<p class="text">The Ranch prides itself on being the best bar in Austin, Texas. With lively nightlife, bottle service, and generally just good vibes, The Ranch promises the biggest party experience on West 6th Street every Friday and Saturday night.<p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/jackalope.jpg" alt="Jackalope">

	<div class="blurb">
	<br>
	<h2 class="name">Jackalope</h2>
	<p class="text">Jackalope is undeniably Austin's finest dive bar. They're famous for their burgers and unique Austin vibes. Two essentials of a Jackalope visit: Ordering one of their specialty sake bombs or famous burgers, and posing for a picture with their giant rabbit-antelope statue.
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/ironcactus.jpg" alt="Iron Cactus">

	<div class="blurb">
	<br>
	<h2 class="name">Iron Cactus</h2>
	<p class="text">Cactus juice is the perfect way to start off a night of debauchery on Dirty 6th... If you don't want to remember any of it, that is. While the Cactus Juice isn't for the faint of heart, the Iron Cactus is still a good choice if you're looking for more of a low-key night. The bar has consistently been voted one of the top 10 tequila bars in the country, and the hearty food menu hits better when that tequila starts hitting.
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/theparish.jpg" alt="The Parish">

	<div class="blurb">
	<br>
	<h2 class="name">The Parish</h2>
	<p class="text">If you're a fan of local music, this is the spot to go. The Parish hosts nightly shows, ranging from pop punk, comedy shows, hip hop, emo bands, and DJ nights. The Parish is definitely the best venue of its size in Austin, or even the state of Texas. Just know, the focus is the music, so the bar is... well meh.
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/driskill.jpg" alt="The Driskill">

	<div class="blurb">
	<br>
	<h2 class="name">The Driskill</h2>
	<p class="text">Probably the only place on Dirty 6th that you could call "classy". With brown leather seats, grand sculptures and designs, and walls full of taxidermy, it looks and feels truly Texan. Supposedly, it's also known for being haunted.
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



	<div>
	<img class="pics" src="photos/unbarlievable.jpg" alt="Unbarlievable">

	<div class="blurb">
	<br>
	<h2 class="name">Unbarlievable</h2>
	<p class="text">Recently under new management, Unbarlievable is a kooky, circus-themed bar with not one, but TWO locations in Austin (Rainey St and West 6th).  Complete with slides, games, large animal statues, Unbarlievable is a great place to go with friends!<p>
	</div>
	</div>

	<br id="clubs"><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<h1 class="subtitle">Clubs</h1>

	<div>
	<img class="pics" src="photos/barbarella.jpg" alt="Barbarella Austin">

	<div class="blurb">
	<br>
	<h2 class="name">Barbarella</h2>
	<p class="text">Barbarella is a club that's always bumping and on Thursdays they do $2 (yes, TWO dollar) drinks. They play a range of exciting music and is always a fun place to go and dance!<p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/rain.jpg" alt="Rain">

	<div class="blurb">
	<br>
	<h2 class="name">Rain on 4th</h2>
	<p class="text">One of the most popular gay clubs in town, Rain never misses. The music is always bumpin, the lights are always flashing, and the dancefloor is always filled. Thursday nights have an extra special treat: amateaur strip night, hosted by one of the local drag queens such as Vylette Ward or Nadine Hughes. Only go to Rain if you're looking for a good time. </p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/oilcan.jpg" alt="oilcan harry's">

	<div class="blurb">
	<br>
	<h2 class="name">Oilcan Harry's</h2>
	<p class="text">Oilcan Harry's is the oldest gay bar in Austin, but it is by no means over the hill. There's a party every night of the week at Oilcan Harry's, whether it's karaoke, drag queen/king shows, bingo, live shows, or something crazy. Attracting people from all walks of life and all over, it's a great place to make new friends in town.
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/cidercade.jpg" alt="Cidercade">
		
	<div class="blurb">
	<br>
	<h2 class="name">Cidercade</h2>
	<p class="text">Cider + arcade = cidercade! Located on Riverside, this arcade bar features classic aracde games and house-made ciders, seltzers, and kombucha. Bring your friends for a night of 80s throwbacks!<p>
	</div>
	</div>
		
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/mockingbird.jpg" alt="Mockingbird">
		
	<div class="blurb">
	<br>
	<h2 class="name">Mockingbird Saloon</h2>
	<p class="text">Located right on Guad and Dean Keeton, Mockingbird is a great choice when you want to avoid paying for an Uber from downtown at the end of your night. Catch $1 beers during weekday "Happy Minutes" (3:00-3:15), then stick around for some rock 'n roll and country music on the roomy patio.<p>
	</div>
	</div>
		
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/holeinthewall.jpg" alt="Hole in the Wall">
			
	<div class="blurb">
	<br>
	<h2 class="name">Hole in the Wall</h2>
	<p class="text">The Hole in the Wall has seen plenty of famous musicians, including Ryan Adams, Townes van Zandt, and Stevie Ray Vaughn. This intimate music venue is a classic in the world's Live Muisc Capital, and it's right next door to Mockingbird on the Drag! Karaoke, live music, and drinks; what more does a Friday night need?<p>
	</div>
	</div>
			
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/rio.jpg" alt="Rio">

	<div class="blurb">
	<br>
	<h2 class="name">Rio</h2>
	<p class="text">Rio can be found on the corner of 6th and Rio Grande. Sporting three levels, a rooftop lounge, and a giant pool, Rio is fun for nighttime clubs and pool darties. They also host private events.</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/elysium.jpg" alt="Elysium">

	<div class="blurb">
	<br>
	<h2 class="name">Elysium</h2>
	<p class="text">If you're looking to get into Austin's goth and punk scene, Elysium is a great place to start. They host a plethera of live events, from Djs and bands to themed events. 
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/cheerup.jpg" alt="Cheer Up Charlies">

	<div class="blurb">
	<br>
	<h2 class="name">Cheer Up Charlies</h2>
	<p class="text">You'll definitely cheer up at this colorful queer bar full of neon rainbows and smiley faces. Look out for live music, DJ sets, drag performances, and their vegan food truck in the back (plus some killer happy hour drinks from 4-6)
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/coconutclub.jpg" alt="Coconut Club">

	<div class="blurb">
	<br>
	<h2 class="name">Coconut Club</h2>
	<p class="text">Another gem amidst Austin's gay clubs, the Coconut Club has some of the coolest decorations and atmospheres. Go to dance the night away, but also to take some incredible photos.
	</p>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br>


	
 	<div class="bottom-info">
		<p id = "contact"></p>
		<script>document.getElementById("contact").innerHTML = "CONTACT US <br>Â© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
	</div> 
 
</body>
</html>
NIGHTOUT;

   	 	$username = $_COOKIE["username"];
  	}
?>
