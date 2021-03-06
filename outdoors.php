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
				<button style="margin-left: 29px;" class="dropbtn"><a id = "selectednav" href="outdoors.php">OUTDOORS</a></button>
			
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


 	<form method = "post" action = "outdoors.php">


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
		<p>CONTACT US <br>???? HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN 02/16/2022</p>
	</div>
	</body>
	</html>

LOGIN;
 	 }

	function run_page() {
		print<<<OUTDOORS
<!DOCTYPE html>

<html lang="en">

<head>
   <title>Outdoors - Howdy, Austin</title>
   <meta charset="UTF-8">
   <meta name="description" content="Outdoors">
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
				<button style="margin-left: 29px;" class="dropbtn"><a id = "selectednav" href="outdoors.php">OUTDOORS</a></button>
			
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

	<br><br><br><br><br><br>

	<h1 class="subtitle">Hiking</h1>

	<div>
	<img class="pics" src="photos/riverplace.jpg" alt="River Place Nature Trail">

	<div class="blurb">
	<br>
	<h2 class="name">River Place Nature Trail</h2>
	<p class="text">Countless wooden steps crisscross this park and lead to gorgeous views of the Central Texas Hill Country, especially at sunset. Tucked away in a residential neighborhood, it's a quiet, hidden gem perfect for a weekend outing with friends.<p>
	<a href="https://www.google.com/maps/dir//River+Place+Nature+Trail,+Big+View+Drive,+Austin,+TX/@30.3569807,-97.8992376,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x865b3423a0841089:0xe82d0ff59d18e44a!2m2!1d-97.8641322!2d30.3569113!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/mckinneyfalls.jpg" alt="McKinney Falls">

	<div class="blurb">
	<br>
	<h2 class="name">McKinney Falls</h2>
	<p class="text">McKinney Falls is just a short drive from downtown but you wouldn't know it. With over 10 miles of trails and overnight camping, it offers a great escape from the noise of the city</p>
	<a href="https://www.google.com/maps/dir//McKinney+Falls+State+Park,+McKinney+Falls+Parkway,+Austin,+TX/@30.1837182,-97.7572998,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x8644b3be3538b38b:0xfb83098f6001c693!2m2!1d-97.7221944!2d30.1836487!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/flats.jpg" alt="The Flats (Greenbelt)">

	<div class="blurb">
	<br>
	<h2 class="name">The Flats (Greenbelt)</h2>
	<p class="text">Locals enjoy going to The Flats on a warm day; the water spot is quite close to downtown, and it's a pretty easy hike to no fancy hiking gear is necessary. The water is really refreshing on a hot day, and the train is gorgeous!<p>
	<a href="https://www.google.com/maps/dir//The+Flats,+Austin,+TX/@30.2585104,-97.8195285,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x8644b52cdaa32071:0x5f0427108fe34c0c!2m2!1d-97.7844231!2d30.2584409!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/sculpturefalls.jpg" alt="Sculpture Falls">

	<div class="blurb">
	<br>
	<h2 class="name">Twin Falls and Sculpture Falls (Greenbelt)</h2>
	<p class="text">For a relatively easy 3-mile loop, try out Twin Falls! It usually takes just over an hour to complete, and it's beautiful to visit any time of the year. Dogs are welcome, so this is a really popular area for trail dog-walking.<p>
	<a href="https://www.google.com/maps/dir//Sculpture+Falls,+Barton+Creek+Greenbelt+Trail,+Austin,+TX/@30.2619197,-97.8586307,13z/data=!3m1!4b1!4m9!4m8!1m0!1m5!1m1!1s0x865b4a6086909eeb:0x1b165cc8ddb7d45c!2m2!1d-97.8235253!2d30.2618502!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/bastrop.jpg" alt="Bastrop State Park">

	<div class="blurb">
	<br>
	<h2 class="name">Bastrop State Park</h2>
	<p class="text">Home to one of the ancient pine forests of East Texas, this park is a great place to hike and camp. Unfortunately, many trees burned down over a decade ago and replanting efforts are ongoing. Seeing nature reclaim this land makes hiking here extra special, and don't worry, there is still more than enough shade.<p>
	<a href="https://www.google.com/maps/dir//Bastrop+State+Park,+Park+Road+1A,+Bastrop,+TX/@30.1102776,-97.3220292,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x86448534f962ddf9:0x718b461274315782!2m2!1d-97.2869238!2d30.110208!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/lakegeorgetown.jpg" alt="Lake Georgetown">

	<div class="blurb">
	<br>
	<h2 class="name">Lake Georgetown</h2>
	<p class="text">The trail around lake Georgetown continues for over 26 miles and is perfect for hiking, trail running, or mountain biking. While I wouldn't recommend attempting the entire loop, there are plenty of trail access points and a few campsites for short day trips or weekend wilderness forays.<p>
	<a href="https://www.google.com/maps/dir//Lake+Georgetown,+Georgetown,+TX/@30.4579217,-98.0317795,10z/data=!4m9!4m8!1m0!1m5!1m1!1s0x86452a7c71d26489:0x32f09c7a7689ab19!2m2!1d-97.7355595!2d30.6776793!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br id="swimming"><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<h1 class="subtitle">Swimming</h1>

	<div>
	<img class="pics" src="photos/bartonsprings.jpg" alt="Barton Springs">

	<div class="blurb">
	<br>
	<h2 class="name">Barton Springs</h2>
	<p class="text">A classic Austin spot, the home to the Barton Springs salamander, and the location of a perfectly bouncy diving board. Need I say more? The water at Barton Springs stays at 68 degrees year-round, perfect for chilly morning swims or refreshing summer dips. Entry is free before 8 am and after 8 pm.</p>
	<a href="https://www.google.com/maps/dir//Barton+Springs+Municipal+Pool,+William+Barton+Drive,+Austin,+TX/@30.2641787,-97.8063775,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x8644b53a8c49575d:0xe4a16a1a804ca8b9!2m2!1d-97.7712721!2d30.2641092!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/bluehole.jpg" alt="Blue Hole">

	<div class="blurb">
	<br>
	<h2 class="name">Blue Hole</h2>
	<p class="text">If you're up for a quick road trip, drive 45 minutes south of Austin for a refreshing dip in the gorgeous, crystal-clear waters of Blue Hole. The temperatures typically stay around 75 degrees year-round and are towered by enormous cypress trees. There's even rope swings to complete anyone's ideal watering hole experience!<p>
	<a href="https://www.google.com/maps/dir//Blue+Hole+Park,+Blue+Hole+Park,+Georgetown,+TX/@30.6429705,-97.7149922,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x8644d66ba88361eb:0xcd150b1d48574085!2m2!1d-97.6798868!2d30.6429014!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/jacobswell.jpg" alt="Jacob's Well">

	<div class="blurb">
	<br>
	<h2 class="name">Jacob's Well</h2>
	<p class="text">Jacob's Well is a perennial karstic spring in the Texas Hill Country flowing from the bed of Cypress Creek. It is notorious for its lush ecological beauty and aquatic life. Reservations are necessary, and are absolutely worth it!<p>
	<a href="https://www.google.com/maps/dir//Jacob's+Well+Natural+Area,+Mount+Sharp+Road,+Wimberley,+TX/@30.0391615,-98.1614559,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x865b5d8f7ce5e4c5:0x49e0f7ac2493276d!2m2!1d-98.1263505!2d30.0390919!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/hippiehollow.jpg" alt="Hippie Hollow">

	<div class="blurb">
	<br>
	<h2 class="name">Hippie Hollow</h2>
	<p class="text">This rocky beach on Lake Travis is the only clothing optional beach in Texas, and as such, is 18+. Hippie Hollow has been keeping Austin weird since the 60s and fosters a welcoming, respectful, and open-minded culture.</p>
	<a href="https://www.google.com/maps/dir//Hippie+Hollow+Park,+Comanche+Trail,+Austin,+TX/@30.4145599,-97.9219781,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x865b316dde65868d:0x56ac6b2ed6b24924!2m2!1d-97.8868727!2d30.4144906!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/krausesprings.jpg" alt="Krause Springs">

	<div class="blurb">
	<br>
	<h2 class="name">Krause Springs</h2>
	<p class="text">Krause Springs is a camping and swimming site located in Spicewood, Texas; about 30 miles northwest of Austin. The property has 32 springs and natural pools that flow into Lake Travis. There are plentiful camping spots for campers, and even a Butterfly Garden to stroll through!<p>
	<a href="https://www.google.com/maps/dir//Krause+Springs,+County+Road+404,+Spicewood,+TX/@30.4777515,-98.1867654,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x865b3cef95c752a7:0xabfd1911c3fac737!2m2!1d-98.15166!2d30.4776822!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/hamiltonpool.jpg" alt="Hamilton Pool">

	<div class="blurb">
	<br>
	<h2 class="name">Hamilton Pool</h2>
	<p class="text">Hamilton Pool is a swimming hole in Dripping Springs. The grotto has a waterfall that collects into a beautiful blue-green pool. Unfortunately, it is temporarily closed due to the danger of falling rocks, but will hopefully reopen in the future. </p>
	<a href="https://www.google.com/maps/dir//Hamilton+Pool+Preserve,+Hamilton+Pool+Road,+Dripping+Springs,+TX/@30.3424526,-98.1620079,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x865b3fb27b5050e3:0xd8c54250a880cf94!2m2!1d-98.1269025!2d30.3423832!3e0" target="_blank" style="font-size:1.2em;">Directions</a>
	</div>
	</div>


	<br id="kayaking"><br><br><br><br><br><br><br><br><br><br><br>

	<h1 class="subtitle">Kayaking</h1>

	<div>
	<img class="pics" src="photos/texasrowingcenter.jpg" alt="Texas Rowing Center">

	<div class="blurb">
	<br>
	<h2 class="name">Texas Rowing Center</h2>
	<p class="text">Located just off of the Lady Bird Lake trail near the Mopac bridge, Texas Rowing Center provides kayaks and paddleboards for rent. Just make sure to stay out of the way of rowers as they speed past!</p>
	<a href="https://www.google.com/maps/dir//Texas+Rowing+Center,+West+Cesar+Chavez+Street,+Austin,+TX/@30.3525047,-98.159522,12.72z/data=!4m9!4m8!1m0!1m5!1m1!1s0x8644b53f28111089:0x373c4efdce38f1ec!2m2!1d-97.7689174!2d30.2722466!3e0" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/livelovepaddle.jpg" alt="Live Love Paddle">

	<div class="blurb">
	<br>
	<h2 class="name">Live Love Paddle</h2>
	<p class="text">Head to Live Love Paddle for a prime experience of Austin's Lady Bird Lake! They offer kayaks and stand-up paddleboards in all shapes and sizes for anyone who wants a refreshing float down the lake. <p>
	<a href="https://www.google.com/maps/dir//Live+Love+Paddle,+East+Riverside+Drive,+Austin,+TX/@30.2457465,-97.7657574,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x8644b4ff04511499:0x9bacb3512239d047!2m2!1d-97.730593!2d30.2457616!3e0" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/lonestarkayak.jpg" alt="Lone Star Kayak Tours">

	<div class="blurb">
	<br>
	<h2 class="name">Lone Star Kayak Tours</h2>
	<p class="text">Lone Star Kayak Tours provide a new perspective through which guests can get to know Austin! Whether it's a full moon tour with the bats on Congress Avenue Bridge or the beautiful Texas sunset reflected on the skyline, they provide a way for everyone to get to know Austin's unique culture and views. <p>
	<a href="https://www.google.com/maps/dir//Lone+Star+Kayak+Tours,+East+Riverside+Drive,+Austin,+TX/@30.2457465,-97.7657574,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x8644b5b86592925f:0x660a238e063f8610!2m2!1d-97.7410739!2d30.2523719!3e0" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>


	<br id="rockclimbing"><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<h1 class="subtitle">Rock Climbing</h1>

	<div>
	<img class="pics" src="photos/austinbouldering.jpg" alt="Austin Bouldering Project">

	<div class="blurb">
	<br>
	<h2 class="name">Austin Bouldering</h2>
	<p class="text">Austin is home to two locations of Austin Bouldering Project - Springdale and Westgate. These bouldering gyms offer a yoga studio, fitness studio, weight room, cafe, co-working space, and saunas. Absolutely everyone is welcome and you're guaranteed to get a great workout. 
	</p>
	<a href="https://austinboulderingproject.com/" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/greenbelt.jpg" alt="Greenbelt">

	<div class="blurb">
	<br>
	<h2 class="name">Greenbelt</h2>
	<p class="text">If you are looking for more of an outdoorsy vibe, absolutely head to the Greenbelt for some climbing. You will find climbing of all levels here, as well as numerous watering holes to take a dip in afterwards. Everyone in the Austin climbing community is really friendly, and you'll certainly have a great adventure!		<p>
	<a href="https://www.mountainproject.com/area/105905087/barton-creek-greenbelt" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/cruxclimbing.jpg" alt="Crux Climbing Center">

	<div class="blurb">
	<br>
	<h2 class="name">Crux Climbing Center</h2>
	<p class="text">Crux Climbing Center is a wonderful spot to get your climbing, yoga, and fitness needs all at one location. They welcome all levels and promise some really creative climbing routes for climbers of all levels.</p>
	<a href="https://www.cruxclimbingcenter.com/" target="_blank" style="font-size:1.2em;">Website</a>
	</div>
	</div>


	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	

	<div class="bottom-info">
		<p id = "contact"></p>
		<script>document.getElementById("contact").innerHTML = "CONTACT US <br>???? HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
	</div>	
  
</body>
</html>
OUTDOORS;

   	 	$username = $_COOKIE["username"];
  	}
?>
