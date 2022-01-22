<?php 

session_start();

include("../functions/function.php");

include("../includes/db.php");

?>

<!DOCTYPE html><!-- HTML5 Declaration -->
<html>

<head>
<title>www.E-Techbd.com</title>

<link rel="stylesheet" href="../styles/style.css" media="all" />

<script src="../js/jquery3.6.0.js"></script>

</head>

<body>

<!-- Main container starts here -->
<div class="main_wrapper">
  
  <div class="header_wrapper">
  
        <div class="header_logo">
            <a href="Homepage.php">
            <img id="logo" src="../images/logo4.png" />
            </a>
        </div><!--/.header_logo-->
    
        <div id="form">
            <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a Product" />
            <input type="submit" name="search" value="Search" />
            </form>
        </div>  
    
        <div class="cart">
            <ul>
            <li class="dropdown_header_cart">
            <div id="notification_total_cart" class="shopping-cart">
                <img src="../images/cart_icon.png" id="cart_image">	
                <div class="noti_cart_number">
                    <?php total_items();?>
                </div><!-- /.noti_cart_number -->
                		  
            </div>
            </li>
            </ul>
        </div>
  
        <?php if(!isset($_SESSION['user_id'])){ ?>
    
        <div class="register_login" >
            <div class="login"><a href="Homepage.php?action=login">Login</a></div>
            &nbsp;&nbsp;
            <div class="register"><a href="register.php">Register</a></div>
        </div><!-- /.register_login --> 
        
        <?php }
        else{ ?>
        
        <?php 
         $select_user = mysqli_query($con,"select * from ecustomer where id='$_SESSION[user_id] '");
         $data_user = mysqli_fetch_array($select_user);
        ?>
        
        <div id ="Profile">
        
            <ul>
            <li class="dropdown_header">
                <a>
                
                <?php if($data_user['image'] !=''){ ?>
                
                    <span><img src="../upload-files/<?php echo $data_user['image']; ?>"></span> 
                    
                <?php }else{ ?>
                
                <span><img src="../images/man.png"></span>
                
                <?php } ?>
                
                </a>
            
                <ul class="dropdown_menu_header">
                    <li><a href="my_account.php?action=edit_account">Account Setting</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            
            </li>
            </ul>
        </div>
        
    
        <?php } ?>
  
  </div><!-- /.header_wrapper --> 
  
<!------------ Navigation Bar starts ------------->
  <div class="menubar">
    <ul id="menu">
	  <li><a href="Homepage.php">Home</a></li>
	  <li><a href="all_products.php">All Products</a></li>
	  <li><a href="my_account.php">My Account</a></li>
	  <li><a href="cart.php">Shopping Cart</a></li>
      <li><a href="about.php">About Us</a></li>
	  <li><a href="contact.php">Contact Us</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
  </div><!-- /.menubar --->

 
 <?php include('../js/drop_down.php');

 ?>
 </div> 
  
  
  
  
