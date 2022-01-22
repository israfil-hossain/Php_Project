




    


<?php 

$select_user = mysqli_query($con,"select * from ecustomer where id='$_SESSION[user_id]' ");

$fetch_user = mysqli_fetch_array($select_user);
?>
	
<div class="register_box">

  <form method = "post" action="" enctype="multipart/form-data">
    
	<table align="left" width="70%">
	
	  <tr align="left">	   
	   <td colspan="4">
	   <h2>Edit Profile.</h2><br />
	   
	   </td>	   
	  </tr>
	  
	  <tr>
	   <td width="25%"><b>Change Name:</b></td>
	   <td colspan="3"><input type="text" name="name" value="<?php echo $fetch_user['name'];?>" required placeholder="Name" /></td>
	  </tr>	 
	  
	  <tr>
	   <td width="15%"><b>Country:</b></td>
	   <td colspan="3">
	   <?php include('../users/edit_country_list.php');?>
	   </td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>City:</b></td>
	   <td colspan="3"><input type="text" name="city" value="<?php echo $fetch_user['city'];?>" required placeholder="City" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Contact:</b></td>
	   <td colspan="3"><input type="text" name="contact" value="<?php echo $fetch_user['contact'];?>" required placeholder="Contact" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Address:</b></td>
	   <td colspan="3"><input type="text" name="address" value="<?php echo $fetch_user['user_address'];?>" required placeholder="Address" /></td>
	  </tr>
	  
	  <tr align="left">
	   <td></td>
	   <td colspan="4">
	   <input type="submit" name="edit_profile" value="Save" />
	   </td>
	  </tr>
	
	</table>
	
	
  </form>

</div>

<?php 
if(isset($_POST['edit_profile'])){  
  
  if($_POST['name'] !='' && $_POST['edit_country'] !='' && $_POST['city'] !='' && $_POST['contact']!='' && $_POST['address']!='' ){
  
   
   $name = $_POST['name'];
  
   $country = $_POST['edit_country'];
   $city = $_POST['city'];
   $contact = $_POST['contact'];
   $address = $_POST['address']; 
   
   $update_profile = mysqli_query($con,"update ecustomer set name='$name', country='$country', city='$city', contact='$contact', user_address='$address' where id='$_SESSION[user_id]'");
   
   if($update_profile){
   echo "<script>alert('Your updated was successfully!')</script>";
   
   echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
  }
  
}

?>




  
