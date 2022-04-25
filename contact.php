<?php
# get the incoming information
$name  = $_POST["name"];
$email  = $_POST["email"];
$comment = $_POST["comments"];
if(isset($_POST['connection'])){
$connection = $_POST["connection"];
}
if ($fh = fopen ("comments.txt", "a"))
{
fwrite ($fh, "$name\n$email\n$connection\n$comment");
fclose ($fh);
}
print <<<THANK_YOU
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

<p id = "instructions"><b><i><u>Thank you for your feedback!<u><i><b></p>

<div class="bottom-info">
    <p id = "contact"></p>
    <script>document.getElementById("contact").innerHTML = "CONTACT US <br>© HAYLEY SLOTBOOM, MARIANA HERRERIA, KAITLYN REAM, HANA BREDSTEIN " + (new Date().getMonth() + 1) +'/'+(new Date().getDate())+'/'+new Date().getFullYear()</script>
</div>
</body>
</html>
THANK_YOU;
?>

