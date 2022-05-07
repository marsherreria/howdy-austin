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
				<button style="margin-left: 29px;" class="dropbtn"><a id = "selectednav" href= "foodanddrink.php">FOOD & DRINK</a></button>
			
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


 	<form method = "post" action = "foodanddrink.php">


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
		print<<<FOOD
<!DOCTYPE html>

<html lang="en">

<head>
   <title>Food and Drink - Howdy, Austin</title>
   <meta charset="UTF-8">
   <meta name="description" content="Food and Drink">
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
				<button style="margin-left: 29px;" class="dropbtn"><a id="selectednav" href= "foodanddrink.php">FOOD & DRINK</a></button>
			
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

	<br><br><br><br><br><br>

	<h1 class="subtitle">Restaurants</h1>

	<div>
	<img class="pics" src="photos/chuys.jpg" alt="Chuys">

	<div class="blurb">
	<br>
	<h2 class="name">Chuys</h2>
	<p class="text">When you think of delicious Tex-Mex and tasty margaritas, you think of Chuy's! There's multiple locations throughout 
	Austin including the original which resides on Barton Springs Road. On top of the amazing food and drinks, the fun and 
	colorful design of Chuy's is quintessential Austin.<p>
	<a href="https://www.chuys.com/locations" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://www.chuys.com/menu" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/velvetTaco.jpg" alt="Velvet Taco">

	<div class="blurb">
	<br>
	<h2 class="name">Velvet Taco</h2>
	<p class="text">Velvet Taco is on a mission to elevate the taco experience through combining fresh ingredients with globally-inspired recipes. With inventive combinations and explosive flavors, Velvet Taco will definitely leave you wanting so much more!<p>
	<a href="https://www.velvettaco.com/locations/" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://www.velvettaco.com/menu/" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	<div>
	<img class="pics" src="photos/rositas.jpg" alt="Rosita's">

	<div class="blurb">
	<br>
	<h2 class="name">Rosita's</h2>
	<p class="text">Rosita's Al Pastor is just a short bus or car ride away from campus on Riverside. They're famous for their delicious 
	tacos, but I highly recommend the quesadillas. It's hard to go wrong with Tex-Mex in Austin, but Rosita's holds a special place in my heart.
	<p>
	<a href="https://www.allmenus.com/tx/austin/660981-rositas-al-pastor/menu/" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/terryblacks.jpg" alt="Terry Blacks">

	<div class="blurb">
	<br>
	<h2 class="name">Terry Blacks</h2>
	<p class="text">The self-proclaimed home for legendary Central Texas BBQ, Terry Blacks is an absolute must for tourists and locals alike. They've got plenty of space, so you likely won't wait for long - and they've got the absolute best sides and pit-smoked meats in the game. <p>
	<a href="https://www.terryblacksbbq.com/austin/menu/" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/hopdoddy.jpg" alt="Hopdoddy">

	<div class="blurb">
	<br>
	<h2 class="name">Hopdoddy</h2>
	<p class="text">Forget Jendy's, in fact forget everything you thought you knew about burgers, and try Hopdoddy's range of 
	creative flavor combos. With several locations in and around Austin, Hopdoddy is a great choice for happy hour or a late night Doordash. Don't forget the truffle parmesan fries!  <p>
	<a href="https://www.hopdoddy.com/locations" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://www.hopdoddy.com/menu" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/homeslice.jpg" alt="Homeslice">

	<div class="blurb">
	<br>
	<h2 class="name">Homeslice</h2>
	<p class="text">Home Slice Pizza is one of Austin's finest: an independent neighborhood pizza joint serving authentic NY-style pizza at South Congress and the North Loop. they offer homemade, hand tossed, bona fide pies for either dine in or carry out, and are absolutely delicious!		<p>
	<a href="https://homeslicepizza.com/" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://homeslicepizza.com/" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/vicandals.jpeg" alt="Vic and Als">

	<div class="blurb">
	<br>
	<h2 class="name">Vic and Al's</h2>
	<p class="text">If you want a truly unique Austin eats experience, go to Vic & Als! They scratch up plates inspired by the culture, comfort, and cuisines of Southern Louisiana and have one of the best happy hour deals in town. 10/10 recommend. 		<p>
	<a href="https://www.vicandals.com/online-ordering" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br id="coffeeshops"><br><br><br><br><br><br><br><br>

	<h1 class="subtitle">Coffee Shops</h1>

	<div>
	<img class="pics" src="photos/bennu.jpg" alt="Bennu">

	<div class="blurb">
	<br>
	<h2 class="name">Bennu</h2>
	<p class="text">Bennu's Highland location is open 24 hours, serving refills for only a dollar as you grind 
	out that essay. The cozy but modern atmosphere, friendly service, and free wi-fi seal the deal.<p>
	<a href="https://bennucoffee.com/menu.html" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/medici.jpg" alt="Medici">

	<div class="blurb">
	<br>
	<h2 class="name">Medici</h2>
	<p class="text">Located right next to the Co-op, Medici's serves great coffee, snacks, and speciality drinks like their Golden Mylk turmeric latte. The upstairs area has plenty of space to study, meet with a project partner, or catch up with friends. </p>
	<a href="https://mediciroasting.com/pages/coffeeandespressomenu" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/thunderbird.jpg" alt="Thunderbird">

	<div class="blurb">
	<br>
	<h2 class="name">Thunderbird</h2>
	<p class="text">Thunderbird uses fair trade coffee and offers a cozy atmosphere perfect for a relaxing Sunday morning. </p>
	<a href="https://www.thunderbirdcoffee.com/location" target="_blank" style="font-size:1.2em;">Location</a>
	<a href="https://www.thunderbirdcoffee.com/menu" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/cherrywood.jpg" alt="Cherrywood Coffeehouse">

	<div class="blurb">
	<br>
	<h2 class="name">Cherrywood Coffeehouse</h2>
	<p class="text">Complete with delicious food & drink, a late closing time, and free Wi-Fi, Cherrywood Coffeehouse is a great place 
	to come either hang out with friends or study your heart out!<p>
	<a href="https://cherrywoodcoffeehouse.com/events-calendar/" target="_blank" style="font-size:1.2em;">Events</a>
	<a href="https://cherrywoodcoffeehouse.com/menu/" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/jos.jpg" alt="Jo's">

	<div class="blurb">
	<br>
	<h2 class="name">Jo's Coffee</h2>
	<p class="text">You can find it on South Congress (with the iconic "I love you so much" graffiti on the side of it), you can find it in the Austin airport, and you can find it in a random parking lot next to H-E-B... and each location delivers just as amazing coffee and customer service as the next. A favorite home-grown Austin coffee shop for locals!<p>
	<a href="https://www.joscoffee.com/" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://static1.squarespace.com/static/55679273e4b0f3550bf4a8fe/t/60c38dbfcbfcab6ca717492b/1623428546843/DowntownJos.pdf" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/alfred.jpg" alt="Alfred Coffee">

	<div class="blurb">
	<br>
	<h2 class="name">Alfred</h2>
	<p class="text">Located in The Line Hotel on Congress Ave, Alfred is a hip little coffee bar with a selection of delicious drinks. The Line is also a great place to study/work, and what better way than with an iced vanilla latte?<p>
	<a href="https://alfred.la/pages/locations" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://alfred.la/pages/food" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/epoch.jpg" alt="Epoch Coffee">

	<div class="blurb">
	<br>
	<h2 class="name">Epoch</h2>
	<p class="text">With multiple locations around Austin, and a very late closing time, Epoch is one of the best places to study or get some work done. The vibes are immaculate, and the coffee is even better. Try their Iced Mojo for a delicious, sweet pick-me-up.
	</p>
	<a href="https://epochcoffee.com/" target="_blank" style="font-size:1.2em;">Locations</a>
	</div>
	</div>



	<br id="bobatea"><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<h1 class="subtitle">Boba Tea</h1>

	<div>
	<img class="pics" src="photos/gongcha.jpg" alt="Gong cha">

	<div class="blurb">
	<br>
	<h2 class="name">Gong Cha</h2>
	<p class="text">Gong Cha is a great option when you're craving something sweet. Located in the Dobie food court, it features tons of unique bubble tea flavors and custom drinks.</p>
	<a href="https://gongchausa.com/locations/" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://gongchausa.com/our-tea/" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/cocos.jpg" alt="Coco's Cafe">

	<div class="blurb">
	<br>
	<h2 class="name">Coco's Cafe</h2>
	<p class="text">Coco's is a locally owned and operated business that specializes in bubble tea and Taiwanese cuisine. Their boba tea is absolutely delicious, and we recommend pairing some Thai Tea with Pearls with their famous Peppercorn Tofu!<p>
	<a href="https://www.cocos-cafe.com/menu" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/teapioca.jpg" alt="Teapioca">

	<div class="blurb">
	<br>
	<h2 class="name">Teapioca</h2>
	<p class="text">Head on over to Teapioca to enjoy their personal spin on authentic Taiwanese cuisine! You can't go wrong with any of their delicious selection of drinks and desserts, and there's a vast array of flavors to cater to everyone. <p>
	<a href="https://https://www.teapiocalounge.com/store-locator/" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://www.teapiocalounge.com/menu/" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/bubbleegg.jpg" alt="Bubble Egg">

	<div class="blurb">
	<br>
	<h2 class="name">Bubble Egg</h2>
	<p class="text">It can be easy to miss this cute cafe tucked away in West Campus. Bubble Egg has ice cream, waffles, and of course, bubble tea. I'm a huge fan of their fruit tea but everyone can find something to their taste. <p>
	<a href="https://www.bubbleeggcompany.com/locations" target="_blank" style="font-size:1.2em;">Events</a>
	<a href="https://www.bubbleeggcompany.com/menus" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div>
	<img class="pics" src="photos/fengcha.jpg" alt="Feng Cha">

	<div class="blurb">
	<br>
	<h2 class="name">Feng Cha</h2>
	<p class="text">Feng Cha is home to a comfortable, welcoming environment to people of all ages and backgrounds, in addition to high-quality drinks and delectable pastries. From their relaxing playlist to their comfortable seating, Feng Cha is the perfect spot to go for a cozy hang out or study teahouse experience.<p>
	<a href="https://www.fengchausa.com/copy-of-order" target="_blank" style="font-size:1.2em;">Locations</a>
	<a href="https://www.grubhub.com/restaurant/feng-cha-2525-w-anderson-ln-suite-285-austin/2466362" target="_blank" style="font-size:1.2em;">Menu</a>
	</div>
	</div>


	<br><br><br><br><br><br><br><br><br><br><br><br>
	

	<div class="bottom-info">
		<p id = "contact"></p>
		<script>document.getElementById("contact").innerHTML = "CONTACT US <br>Â© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
	</div>	
  
</body>
</html>
FOOD;

   	 	$username = $_COOKIE["username"];
  	}
?>
