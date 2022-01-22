<?php include('../includes/header.php');
include('../control/contact_val.php');
?>
<head>
    <link rel="stylesheet" href="../styles/style1.css" media="all"/>
<div class="container">
<div class="about-section">
  <h1>Contact Us </h1>
</div>
<br><br>
<form method = "post" action="" enctype="multipart/form-data">

    <label for="fname">Email</label>
    <input type="text" id="email" name="email" value="<?php echo $email;?>" placeholder="Your Email.."><br>
    <span style="color:red;"><?php echo $err_email;?></span><br>

    <label for="fname">First Name</label>
    <input type="text"  name="fname" value="<?php echo $fname;?>" placeholder="Your first name.."><br>
    <span style="color:red;"><?php echo $err_fname;?></span><br>

    <label for="fname">Last Name</label>
    <input type="text"  name="lname" value="<?php echo $lname;?>" placeholder="Your last name.."><br>
    <span style="color:red;"><?php echo $err_lname;?></span><br>

    <label for="country">Country</label>
    <?php include('../includes/country_list.php'); ?>
    <span style="color:red;"><?php echo $err_country;?></span><br>
   <br>
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject"  value="<?php echo $subject;?>" placeholder="Write something.." style="height:200px"></textarea>
    <span style="color:red;"><?php echo $err_subject;?></span><br>
    <input type="submit" value="Submit" name="submit">

  </form>
</div>