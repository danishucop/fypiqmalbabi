<?php

//dash-admin.php$sql= "SELECT orderbook.*,user.contact,user.username FROM orderbook 
include "checksessionuser.php";
include "headerpublic.template.php";
include "dbconnect.php";
?>

<h2>Welcome <?php echo $_SESSION['username'] ?></h2>
<a href="testcart.php">Menu </a><br>
<a href="myorder.php">My Order</a><br>
<a href="aboutus.php">About Us</a><br>
<a href="editprofile.php">Edit Profile</a><br>
                 
<?php     

                     
                            

	include ("footer.template.php");
?>
                           
                          
                            
                    
