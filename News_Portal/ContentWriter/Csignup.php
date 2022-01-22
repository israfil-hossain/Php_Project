<?php 
    $message ='';
    $error = '';

    $fname="";
	$err_fname="";
    $lname="";
	$err_lname="";
	$gender="";
	$err_gender="";
	$email="";
	$err_email="";
	$phone="";
	$err_phone="";
	$address="";
	$err_address="";
	$pass="";
	$err_pass="";
	$conpass="";
	$err_conpass="";
	
	$hasError=false;

	

if ($_SERVER["REQUEST_METHOD"]== "POST")
    {
	if(empty($_POST["fname"])){
	$hasError=true;	
	$err_fname="Frist Name Required";}
	else if (strlen($_POST["fname"]) <=1){
		$hasError = true ;
		$err_fname = "name must be greater than 1 character";
	}
	else
	{
		$fname=$_POST["fname"];
	}
	
	
	if(empty($_POST["lname"])){
	$hasError=true;	
	$err_lname="Last Name Required";}
	else if (strlen($_POST["lname"]) <=1){
		$hasError = true ;
		$err_lname = "name must be greater than 1 character";
	}
	else
	{
		$lname=$_POST["lname"];
	}
	
	if(!isset($_POST["gender"])){
			$hasError = true;
			$err_gender = "Gender Required";
		}
		else{
			$gender = $_POST["gender"];
		}
		
    if(empty($_POST["email"])){
			$hasError=true;
			$err_email="Email Required";
		}
		elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
             $hasError=true;
			$err_email ="invalid email";
    }
       else
		{
			$email = $_POST["email"];
		}		
	
	if(empty($_POST["phone"])){
			$hasError=true;
			$err_phone="Phone number Required";
		}
		elseif (!is_numeric($_POST["phone"])){
			$hasError = true;
			$err_phone = "Number must be numeric";
		}
		else
		{
			$phone = $_POST["phone"];
		}

	if(empty($_POST["address"])){
			$hasError = true;
			$err_address = "Address Required";
		}
		else{
			$address = $_POST["address"];
		}
	
	
	
	
	if(empty($_POST["pass"])){
	$hasError=true;	
	$err_pass="password Required";}
	else if (strlen($_POST["pass"]) <=4){
		$hasError = true ;
		$err_pass = "password must be greater than 4 character";
	}
	else
	{
		$pass=$_POST["pass"];
	}
	
	
	
	if(empty($_POST["conpass"])){
		$hasError=true;
		$err_conpass="Confirm password Required";
	}
    elseif( $_POST["pass"] != $_POST["conpass"]){
		$hasError=true;
		$err_conpass=" Password not macthed  ";
	}
	else
	{
		$conpass = $_POST["conpass"];
	}

    if(file_exists('Content_data.json'))
    {
        $current_data = file_get_contents('Content_data.json');
        $array_data = json_decode($current_data,true);
        $extra = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'pass' => $_POST['pass'],
            'conpass' => $_POST['conpass']

        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        if(file_put_contents('Content_data.json',$final_data))
        {
            $message ="<label class='text-success'>Signup Successfully</p>";
        }
    }
    else
    {
        $error='File not exists' ;
    }
	
	
}
	
	?>

<html>

    <head>
	     <title >Content Manager Sign up Form</title>
	</head>
	
	<body>
	<form  action=" " method="post">
        <?php 
        if(isset($error))
        {
            echo $error;
        }

        ?>
	<p align="right"><a href="../Homepage.php">Home Page</a></p>
		<table style="width:300px; height:500px;background-color:#7bbcc9; border:2px black solid;" align="center" >
            <tr>
                <caption><h2>Content Manager Signup Form </h2></caption>
            </tr>
            <tr>
                <td style="color:blue;">First Name  </td>
                <td ><input name="fname"  value="<?php echo $fname ?>" type="text"  placeholder="Enter Frist Name" >
                <br><span style="color:red;"><?php echo $err_fname; ?></span></td>
            </tr>
            <tr>
                <td style="color:blue;">Last Name  </td>
                <td ><input name="lname" value="<?php echo $lname ?>" type="text"  placeholder="Enter Last Name">
                <br><span style="color:red;"><?php echo $err_lname; ?></span></td>
            </tr>
            
            <tr>
                <td style="color:blue;" > Gender  </td>
                <td ><input type="radio" value= "Male" <?php if($gender=="Male") echo "checked" ;?> name="gender">Male 
                    <input type="radio" value="Female" <?php if($gender=="Female") echo "checked" ;?> name="gender">Female		<br>
                <span style="color:red;"><?php echo $err_gender; ?></span></td>
            </tr>
            
            
            <tr>
                <td style="color:blue;">Email</td>
                <td><input name="email" value="<?php echo $email;?>" placeholder="Email" type="text" ><br>
                <span style="color:red;"><?php echo $err_email;?> </span></td>
                    </tr>
                    
            <tr>
                <td style="color:blue;" >Phone</td>
                    <td> 
                        <input name="phone" value="<?php echo $phone;?>" type="text"  placeholder=" Phone Number"><br>
                    <span style="color:red;"><?php echo $err_phone;?></span>
                </td>
                    
             </tr>
            
            
            <tr>
                <td style="color:blue;">Address</td>
                    <td> <textarea name="address" placeholder="address"><?php echo $address;?></textarea>
                        <br><span style="color:red;"><?php echo $err_address;?></span>
                    </td>
                        
            </tr>
            
            
            <tr>
                <td style="color:blue;">Password</td>
                <td><input name="pass" placeholder="password" value="<?php echo $pass;?>" type="password"><br>
                    <span style="color:red;"><?php echo $err_pass;?></span></td>
            </tr>

            <tr>
                <td style="color:blue;" >Confirm Password</td>
                <td><input name="conpass" placeholder="confirm password" value="<?php echo $conpass;?>" type="password"><br>
                    <span style="color:red;"><?php echo $err_conpass;?> </span></td>
            </tr>
            
            
        
            
            <tr>
                <td  colspan="2" align="center">
                <input type="submit" name="submit" value="Sign Up" class="btn">
                </td>
            </tr>
            <tr>
                <td  colspan="2" align="center">
                <p>You have an account please <a href="Csignin.php">Login</a></p>
                </td>
            </tr>
            
        <?php 
        if(isset($message))
        {
            echo $message;
        }
            
        ?>

        </table>	
	</form>			
	</body>
</html>