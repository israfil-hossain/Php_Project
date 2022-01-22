<?php 
include ('../includes/db.php');
$email="";
$err_email="";
$fname="";
$err_fname="";

$lname="";
$err_lname="";

$country ="";
$err_country="";

$subject = "";
$err_subject="";

$err_db="";

$hasError=false;


if(isset($_POST["submit"]))
{
    if(empty($_POST["fname"])){
			$hasError=true;
			$err_fname="&nbsp;&nbsp;*First name required";
		}
		elseif (strlen($_POST["fname"]) <3){
			$hasError = true;
			$err_fname = "&nbsp;&nbsp;*First name must be greater than 3 characters";
		}
    elseif (is_numeric($_POST["fname"])){
      $hasError = true;
      $err_fname = "&nbsp;&nbsp;*First name must be characters";
        }
		else
		{
			$fname = htmlspecialchars($_POST["fname"]);
		}

    if(empty($_POST["lname"])){
			$hasError=true;
			$err_lname="&nbsp;&nbsp;*Last name required";
		}
		elseif (strlen($_POST["lname"]) <3){
			$hasError = true;
			$err_lname = "&nbsp;&nbsp;*Last  name must be greater than 2 characters";
		}
    elseif (is_numeric($_POST["lname"])){
      $hasError = true;
      $err_lname = "&nbsp;&nbsp;*Last  name must be characters";
        }
		else
		{
			$lname = htmlspecialchars($_POST["lname"]);
		}

    if(empty($_POST["email"])){
      $hasError=true;
      $err_email="&nbsp;&nbsp;*Email Required";
    }
    elseif (!strpos($_POST["email"],"@") ){
      $hasError = true;
      $err_email = "&nbsp;&nbsp;*Email must have '@' symbol";
    }
    else
    {
      $dot=strpos($_POST["email"],"@");
      if(!strpos($_POST["email"],".",$dot+1))
      {
        $hasError = true;
        $err_email = "&nbsp;&nbsp;*Email must have '.' after @ symbol";
      }
      else {
        $email = htmlspecialchars($_POST["email"]);
      }

    }
    if(empty($_POST["country"])){
        $hasError=true;
        $err_country="&nbsp;&nbsp;*Country Required";
    }

    else
    {
        $country = htmlspecialchars($_POST["country"]);
    }


    if(empty($_POST["subject"])){
        $hasError=true;
        $err_subject="&nbsp;&nbsp;*Subject Required";
    }

    else
    {
        $subject = htmlspecialchars($_POST["subject"]);
    }

    if(!$hasError)
    {
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $country = $_POST['country'];
        $subject = $_POST['subject'];
        
    
    
    if($con -> connect_error)
    {
        die("Connection failed : ".$conn->connect_error);
    }
    $query1 = "insert into contacts (email,first_name,last_name,country,des) 
    values ('$email','$fname','$lname','$country','$subject')";
        if($con -> query($query1) === TRUE)
        {
        echo "<script>alert('Contact information has been Submit successfully!')</script>";
        header("location: #");
        }
        else {
            echo "Not Successfully !";
        }


    
    }
}



?>