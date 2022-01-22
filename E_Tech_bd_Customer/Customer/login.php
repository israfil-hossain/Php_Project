<?php 
//nclude('../includes/header.php'); 
include ('../control/signin_val.php');
?>
<div class="login_box">
<script src="../js/Signin_val.js"></script>
<form method = "post" action="" onsubmit="return validate()" enctype="multipart/form-data">
  
  <table align="left" width="70%">
  <h5><?php echo $err_db; ?></h5>
    <tr align="left">	   
     <td colspan="4">
     <h2>Login.</h2><br />
     <span>
       Don't have account? <a href="register.php">Register Here</a><br /><br />
     </span>
     </td>	   
    </tr>
    
    <tr>
	   <td width="15%"><b>Email:</b></td>
	   <td colspan="3"><input type="text" name="email" id="e_email"  value="<?php echo $email;?>" placeholder="Email" /> <br>
	   <span id="er_email" style="color:red;"><?php echo $err_email;?></span> </td>
	  </tr>
    
    
    <tr>
     <td width="15%"><b>Password:</b></td>
     <td colspan="3"><input type="password" id="password_confirm1" name="password" value="<?php echo $password;?>" placeholder="Password" />
     <br><span id="err_pass" style="color:red;"><?php echo $err_pass;?></span></td>
    </tr>
    
    <tr align="left">
     <td></td>
     <td colspan="4">
     <a href="forgot_password.php">
       Forgot Password
     </a>
     <br /><br />
     </td>
    </tr>
    
    <tr align="left">
     <td></td>
     <td colspan="4">
     <input type="submit" name="login" value="Login" />
     </td>
    </tr>
  
  </table>
  
  
</form>

</div>

<?php 


?>





