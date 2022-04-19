<?php
# get the incoming information
  $name  = $_POST["username"];
  $password  = $_POST["password"];

  # open file 'users.txt' and append the name and e-mail address
  if ($fh = fopen ("users.txt", "a"))
  {
    fwrite ($fh, "$name  $password\n");
    fclose ($fh);
  }

  # Write thank you page
print <<<REGISTRATION_RESULT
<html>
  <head>
   <title>Profile - Howdy, Austin</title>
   <meta charset="UTF-8">
   <meta name="description"
   <meta name="author" content="Hana Bredstein, Mariana Herreria, Kaitlyn Ream, Hayley Slotboom">
   <link href="home.css" rel="stylesheet">
   <link rel="ICON" href="DISCO.png">

</head>

<a href="home.html">
    <img src="HOWDY-AUSTIN.png" width="475" height="100">
    </a>

<body>
        <div class="navbar">
                        <button style="margin-left: 29px; float: left" class="dropbtn"><a  id = "selectednav" href="home.html">HOME</a></button>

                        <div class="dropdown">
                                <button style="margin-left: 29px;" class="dropbtn"><a id="pink" href= "foodanddrink.html">FOOD & DRINK</a></button>

                                <div class="dropdown-content">
                                        <a href="foodanddrink.html">Restaurants</a>
                                        <a href="foodanddrink.html#coffeeshops">Coffee Shops</a>
                                <a href="foodanddrink.html#bobatea">Boba Tea</a>
                                </div>
                        </div>

                        <div class="dropdown">
                                <button style="margin-left: 29px;" class="dropbtn"><a href="outdoors.html">OUTDOORS</a></button>

                                <div class="dropdown-content">
                                        <a href="outdoors.html">Hiking</a>
                                        <a href="outdoors.html#swimming">Swimming</a>
                                        <a href="outdoors.html#kayaking">Kayaking</a>
                                <a href="outdoors.html#rockclimbing">Rock Climbing</a>
                                </div>
                        </div>

                        <div class="dropdown">
                                <button style="margin-left: 29px;" class="dropbtn"><a id="pink" href = "nightout.html">NIGHT OUT</a></button>

                                <div class="dropdown-content">
                                        <a href="nightout.html">Bars</a>
                                        <a href="nightout.html#clubs">Clubs</a>
                                </div>
                        </div>

                        <div class="dropdown">
                                <button style="margin-left: 29px;" class="dropbtn"><a href = "campus.html">CAMPUS</a></button>

                                <div class="dropdown-content">
                                        <a href="campus.html">Study Places</a>
                                </div>
                        </div>

                        <div class="dropdown">
                                <button style="margin-left: 29px;" class="dropbtn"><a id="pink" href ="shopping.html">SHOPPING</a></button>

                                <div class="dropdown-content">
                                        <a href="shopping.html">Thrift Stores</a>
                                </div>
                        </div>

                        <div class="dropdown">
                                <button style="margin-left: 29px;" class="dropbtn"><a href= "events.html">EVENTS</a></button>

                                <div class="dropdown-content">
                                        <a href="events.html">Music</a>
                                        <a href="events.html#sports">Sports</a>
                                </div>
                        </div>

                        <button style="margin-left: 29px;" class="dropbtn"><a id="pink" href="contact.html">CONTACT US</a></button>

                        <button style="margin-left: 29px;" class="dropbtn"><a href= "aboutus.html">ABOUT US</a></button>


                </div>


<br>
<br>

<p id="instructions">
<b><i><u>Thank you for registering! Please log in below.</p>


<form>


   <table id="contact-form" frame="box">
      <tr >
         <td id="label">Username: </td>
         <td><input id="username" name = "username" type = "text" placeholder="Enter username..." width="40" /></td>
      </tr>

      <tr >
         <td id="label">Password: </td>
         <td><input id="password" name = "password" type = "password" placeholder="Enter password..." width="40"/></td>
      </tr>

      <tr >
         <td id="label">Repeat password: </td>
         <td><input id="repeat" name = "repeat" type = "password" placeholder="Repeat password..." width="40" /> </td>
      </tr>

      <tr>
         <td><br></td>
      </tr>

      <tr>
         <td id="buttons"> <input id="register" type="button" value="Register"/>
             <input id="clear" type="reset" value="Clear"/> </td>
      </tr>

</table>

</form>

        <div class="bottom-info">
                <p>CONTACT US <br>© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN 02/16/2022</p>
        </div>
</body>
</html>
REGISTRATION_RESULT;
?>
