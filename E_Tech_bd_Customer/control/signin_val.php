<?php 
// session_start();
$email="";
$err_email="";

$password="";
$err_pass="";
$err_db = "";
$hasError = false;

if(isset($_POST['login']))
{
    // Email Validation .............................................  

    if(empty($_POST["email"])){
        $hasError=true;
        $err_email=" *Email Required";
    }
    elseif (!strpos($_POST["email"],"@") )
    {
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

    
    // Password Validation ..........................  

    if(empty($_POST["password"]))
    {
        $hasError=true;
        $err_pass="&nbsp;&nbsp; *Password Required";
    }
    elseif (strlen($_POST["password"]) < 5)
    {
        $hasError = true;
        $err_pass = "&nbsp;&nbsp;*Password must be greater than 5 characters";
    }

    else if(ctype_upper($_POST["password"]) || ctype_lower($_POST["password"]) )
    {
    $hasError = true;
    $err_pass="&nbsp;&nbsp;*Password should combination of uppercase and lowercase alphabet";
    }

    elseif (!strpos($_POST["password"],"#") && !strpos($_POST["password"],"?") )
    {
        $hasError = true;
        $err_pass = "&nbsp;&nbsp;*Password should have atleast 1 special character ";
    }

    elseif (is_numeric($_POST["password"]))
    {
    $hasError = true;
    $err_pass = "&nbsp;&nbsp;*Password should have uppercase and lowercase alphabe ";
    }

    else
    {
        $l=0;
        $arr_1=str_split($_POST["password"]);

            for ($i=0; $i < count($arr_1) ; $i++)
            {
                if (is_numeric($arr_1[$i]))
                {
                    $l++;
                    break;
                }
            }
        if ($l==0) 
        {
        $hasError = true;
        $err_pass = "&nbsp;&nbsp; *Password should have atleast 1 number ";
        }
        else
        {
        $password = htmlspecialchars($_POST["password"]);
        }
    }
    if(! $hasError)
{

  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = $password;

  $run_login = mysqli_query($con, "select * from ecustomer where password='$password' AND email='$email' " );

  $check_login = mysqli_num_rows($run_login);

  $row_login = mysqli_fetch_array($run_login);

  if($check_login == 0){
  echo "<script>alert('Password or email is incorrect, please try again!')</script>";
  exit();
  }
  $ip = get_ip();

  $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip'");

  $check_cart = mysqli_num_rows($run_cart);

  if($check_login > 0 AND $check_cart==0){

  $_SESSION['user_id'] = $row_login['id'];

  $_SESSION['role'] = $row_login['role'];

  $_SESSION['email'] = $email;
  echo "<script>alert('You have logged in successfully !')</script>";
  echo "<script>window.open('customer/my_account.php','_self')</script>";

  }else{
  $_SESSION['user_id'] = $row_login['id'];

  $_SESSION['role'] = $row_login['role'];

  $_SESSION['email'] = $email;
  echo "<script>alert('You have logged in successfully !')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
  }

  
}
}

?>