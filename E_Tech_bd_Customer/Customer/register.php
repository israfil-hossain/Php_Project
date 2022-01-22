

<!------------ Header starts --------------------->
<?php 
include('../includes/header.php'); 
include ('../control/register_validation.php');
?>
<!------------ Header ends ----------------------->

<!------------ Content wrapper starts -------------->
  <div class="content_wrapper">
    
<script>
 $(document).ready(function(){
  
  $("#password_confirm2").on('keyup',function(){   
   
   var password_confirm1 = $("#password_confirm1").val();
   
   var password_confirm2 = $("#password_confirm2").val();
   
   //alert(password_confirm2);
   
   if(password_confirm1 == password_confirm2){
   
    $("#status_for_confirm_password").html('<strong style="color:green">Password match</strong>');
   
   }else{
    $("#status_for_confirm_password").html('<strong style="color:red">Password do not match</strong>');
   
   }
   
  });
  
 });
</script>
<script src="../js/checkuser.js"></script>
<script src="../js/Signup_val.js"></script>
<div class="register_box">

<form method = "post" onsubmit="return validate()" action="" enctype="multipart/form-data">
    
	<table align="left" width="70%">
	<h5><?php echo $err_db; ?></h5>
	  <tr align="left">	   
	   <td colspan="4">
	   <h2>Register.</h2><br />
	   <span>
	     Already have account? <a href="Homepage.php?action=login">Login Now.</a><br /><br />
	   </span>
	   </td>	   
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Name:</b></td>
	   <td colspan="3"><input type="text" name="name" id="name"  value="<?php echo $name;?>" placeholder="Name" /> <br>
	   <span id="err_name" style="color:red;"><?php echo $err_name;?></span></td>
	</tr>
	  
	  <tr>
	   <td width="15%"><b>Email:</b></td>
	   <td colspan="3"><input type="text" name="email" id="e_email" onfocusout="checkUseremail(this)" value="<?php echo $email;?>" placeholder="Email" /> <br>
	   <span id="er_email" style="color:red;"><?php echo $err_email;?></span> </td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Password:</b></td>
	   <td colspan="3"><input type="password" id="password_confirm1" name="password" value="<?php echo $password;?>" placeholder="Password" /><br>
	   <span id="err_pass" style="color:red;"><?php echo $err_pass;?></span></td>
	</tr>
	  
	  <tr>
	   <td width="15%"><b>Confirm Password:</b></td>
	   <td colspan="3"><input type="password" id="password_confirm2" name="confirm_password" value="<?php echo $confirm_password;?>"  placeholder="Confirm Password" />
	   <br><span id="err_con_pass" style="color:red;"><?php echo $err_conpass;?></span> <br>
	   <p id="status_for_confirm_password"></p><!-- Showing validate password here --> 
	   </td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Image:</b></td>
	   <td colspan="3"><input type="file" name="image" id="u_image" /> 
	   <br><span id="err_i_image" style="color:red;"></span></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Country:</b></td>
	   <td colspan="3">
		<!-- < name="country" id="con" value="" /> -->
	   		<?php include('../includes/country_list.php'); ?> 
			  
	   </td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>City:</b></td>
	   <td colspan="3"><input type="text" name="city"id="c_city" value="<?php echo $city; ?>" placeholder="City" /><br>
	   <span id="err_c_city" style="color:red;"><?php echo $err_city;?></span></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Contact:</b></td>
	   <td colspan="3"><input type="text" name="contact" id="c_contact" value="<?php echo $contact; ?>" placeholder="Contact" />
	   <br><span id="err_c_contact" style="color:red;"><?php echo $err_contact;?></span></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Address:</b></td>
	   <td>: <textarea id="address" name="address"><?php echo $address;?></textarea>
			<br><span id="err_address" style="color:red;"><?php echo $err_add;?></span>
		</td>
	  </tr>
	  <tr>
        	<td><b>Role</b></td>
            <td>:
              <select id="role" name="role">
                <option selected disabled>Choose</option>
                
                <?php
  								foreach($roles as $r){
  									if($r == $role)
  										echo "<option selected>$r</option>";
  									else
  										echo "<option>$r</option>";
  								}
  							?>
              </select><br>
              <span id="err_role" style="color:red;"><?php echo $err_role;?></span>
            </td>
        </tr>
	  <tr align="left">
	   <td></td>
	   <td colspan="4">
	   <input type="submit" name="register" value="Register" />
	   </td>
	  </tr>
	
	</table>

  </form>

</div>

<?php 
// if(isset($_POST['register'])){  
  
//   
if(!$hasError)
{
	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])){
	$ip = get_ip();
   $name = $_POST['name'];
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $hash_password = $password;
   $confirm_password = trim($_POST['confirm_password']);
   
   $image = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
   $country = $_POST['country'];
   $city = $_POST['city'];
   $contact = $_POST['contact'];
   $address = $_POST['address'];
   
   $check_exist = mysqli_query($con,"select * from ecustomer where email = '$email'");
   
   $email_count = mysqli_num_rows($check_exist);
   
   $row_register = mysqli_fetch_array($check_exist);
   
   if($email_count > 0){
   echo "<script>alert('Sorry, your email $email address already exist in our database !')</script>";
   
   }elseif($row_register['email'] !=$email && $password == $confirm_password ){
   
    move_uploaded_file($image_tmp,"upload-files/$image");
	
    $run_insert = mysqli_query($con,"insert into ecustomer (ip_address,name,email,password,country,city,contact,user_address,image) values ('$ip','$name','$email','$hash_password','$country','$city','$contact','$address','$image') ");
    
	if($run_insert){
	$sel_user = mysqli_query($con,"select * from ecustomer where email='$email' ");
	$row_user = mysqli_fetch_array($sel_user);
	
	$_SESSION['user_id'] = $row_user['id'] ."<br>";
	$_SESSION['role'] = $row_user['role'];	
	}
	
	$run_cart = mysqli_query($con,"select * from cart where ip_address='$ip'");
	
	$check_cart = mysqli_num_rows($run_cart);
	
	if($check_cart == 0){
	
	$_SESSION['email'] = $email;
	
	echo "<script>alert('Account has been created successfully!')</script>";
	
	echo "<script>window.open('customer/my_account.php','_self')</script>";
	
	}else{
	
	$_SESSION['email'] = $email;
	
	echo "<script>alert('Account has been created successfully!')</script>";
	
	echo "<script>window.open('checkout.php','_self')</script>";
	
	}
	
   }
} 
}
  


?>






	
	
  </div><!-- /.content_wrapper-->
  <!------------ Content wrapper ends -------------->
  
  <?php include ('../includes/footer.php'); ?>
  
  
