<?php 
$email="";
$err_email="";
$pass="";
$err_pass="";
 
$hasError=false;


if(isset($_COOKIE['email']) and isset($_COOKIE['pass']))
{
    $email = $_COOKIE['email'];
    $pass = $_COOKIE['pass'];
    echo "<script>
    document.getElementById('email').value='$email';
    document.getElementById('pass').value='$pass';
    </script>";
}
 
if ($_SERVER["REQUEST_METHOD"]== "POST"){
	
	if(empty($_POST["email"])){
			$hasError=true;
			$err_email="! Email Required";
		}
		elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
             $hasError=true;
			$err_email ="! invalid email";
    }
    else
	{
		$email = $_POST["email"];
	}	
			
	
	if(empty($_POST["pass"])){
	$hasError=true;	
	$err_pass="! password Required";}
	else if (strlen($_POST["pass"]) <=4){
		$hasError = true ;
		$err_pass = "! password must be greater than 4 character";
	}
	else
	{
		$pass=$_POST["pass"];
	}	
    if(isset($_POST['login']))
    {
        $json_string = file_get_contents('Publisher_data.json');
        $parsed_json = json_decode($json_string, true);

        foreach($parsed_json as $key => $value)
        {
            if($email== $value['email'] && $pass == $value['pass']){         
                if(isset($_POST['remember'])){
                setcookie('email',$email,time()+60*60*7);
                setcookie('pass',$pass,time()+60*60*7);
                }
                session_start();
                $_SESSION['email'] = $email;
                header("location:../Welcome.php");
                
            }
            else{
                echo "Email or Password is Invalid !<br>please   <a href='Psignin.php'>try again</a><br><br>" ;
            }
        }
    }
    else{
        header("location:Psignin.php");
    }

    if(!$hasError){
        echo $_POST["email"]."<br>";
        echo $_POST["pass"]."<br>";
        }
}
?>

<html>
<body>

<form  action="" method="post">
<p align="right"><a href="../Homepage.php">Home Page</a></p>
    <table style="width:300px; height: 250px;background-color:#7bbcc9; border:2px black solid;" align="center">

        <caption><h2 align ="center">Publisher Sign In Form </h2><br></caption>
        <tr>
            <td style="color:blue;"> Email </td>
            <td><input name="email" id="email" placeholder="Enter Email" value="<?php echo $email;?>" type="text" ><br>
            <span style="color:red;"><?php echo $err_email;?> </span></td>
        </tr>
        <tr>
            <td style="color:blue;"> Password </td>
            <td><input type="password" name="pass" id="pass" placeholder="Enter Password" value="<?php echo $pass;?>" ><br>
            <span style="color:red;"><?php echo $err_pass;?> </span></td>

        </tr>
        <tr>
            <td colspan="2" align="left" style="color:green">
                <input type="checkbox" name="remember" value="1">Remember Me</input>  
            </td>
        </tr>
        <tr> 
            <td  colspan="2" align="center">
                <input type="submit" value="Login" name="login">
            </td>
        </tr> 
        <tr>
            <td  colspan="2" align="center">
                <p>You have no account Please <a href="Psignup.php">Signup</a></p>
            </td>
        </tr>
            
    </table>


</form>
</body>
</html>
