<?php 

include '../includes/db.php';


$name="";
$err_name="";

$email="";
$err_email="";

$password="";
$err_pass="";

$confirm_password="";
$err_conpass = "";

// $image = "";
// $err_image="";

// $country = "";
// $err_country ="";

$city = "";
$err_city="";

$address="";
$err_add="";

$contact="";
$err_contact="";

$role="";
$err_role="";

$err_db = "";
$hasError = false;
$roles = array("Employee","Delivery man","Customer");


// if ($_SERVER["REQUEST_METHOD"]== "POST")
if(isset($_POST['register']))
{
    // Name Validation ............................... 

    if(empty($_POST["name"])){
        $hasError=true;
        $err_name= "&nbsp;&nbsp;*Username Required";
      }
      elseif (strlen($_POST["name"]) < 3){
        $hasError = true;
        $err_name = "&nbsp;&nbsp;*Username must be greater than 3 characters";
      }
    // elseif(strpos($_POST["name"]," "))
    //     {
    //       $hasError = true;
    //       $err_name = "&nbsp;&nbsp;*Space is not allowed.";
    //     }
    else
      {
        $name = htmlspecialchars($_POST["name"]);
  
      }


    // Email Validation .............................................  

    if(empty($_POST["email"])){
        $hasError=true;
        $email="&nbsp;&nbsp;*Email Required";
    }
    elseif (!strpos($_POST["email"],"@") )
    {
        $hasError = true;
        $email = "&nbsp;&nbsp;*Email must have '@' symbol";
    }
    else
    {
        $dot=strpos($_POST["email"],"@");
        if(!strpos($_POST["email"],".",$dot+1))
        {
            $hasError = true;
            $email = "&nbsp;&nbsp;*Email must have '.' after @ symbol";
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
    
    // Confirm Password Validation ................................ 

    if(empty($_POST["confirm_password"])){
        $hasError=true;
        $err_conpass="Confirm password Required";
    }
    elseif( $_POST["password"] != $_POST["confirm_password"]){
        $hasError=true;
        $err_conpass=" Password not macthed  ";
    }
    else
    {
        $confirm_password = $_POST["confirm_password"];
        
    }

     // Image Validation .......................................  

    //  if(empty($_POST["image"])){
    //     $hasError = true;
    //     $err_image = "Image Required !";
    // }
    // else{
    //     $image = $_POST["image"];
    // }

    // // Country Validation ................................   

    // if(empty($_POST["country"])){
    //     $hasError = true;
    //     $err_country = "Please Chosse a Country !";
    // }
    // else{
    //     $country = $_POST["country"];
    // }

      // City Validation ...........................   

      if(empty($_POST["city"]))
      {
          $hasError = true;
          $err_city = "City Required !";
      }
      else{
          $city = $_POST["city"];
      }

    // Contact number Validation .......................................  

    if(empty($_POST["contact"])){
        $hasError=true;
        $err_contact="&nbsp;&nbsp;*Number Required";
    }
    elseif (!is_numeric($_POST["contact"])){
        $hasError=true;
        $err_contact="&nbsp;&nbsp;*Only number allowed";
    }
    else
    {
        $contact = htmlspecialchars($_POST["contact"]);
    }

    // Address Validation ...............................  
    if(empty($_POST["address"]))
    {
        $hasError = true;
        $err_add = "Address Required !";
    }
    else
    {
        $address = $_POST["address"];
    }

    // Role Validation ....................................... 

    if(!isset($_POST["role"])){
        $hasError = true;
        $err_role= "&nbsp;&nbsp;*Role Required";
    }
    else{
        $role = $_POST["role"];
    }
    


    // if(!$hasError)
    // {
    //     $ip = get_ip();
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $password = $_POST['passw'];
    //     $confirm_password = $_POST['conpass'];

    //     $image = $_FILES['image']['name'];
    //     $image_tmp = $_FILES['image']['tmp_name'];
    //     $country = $_POST['country'];
    //     $city = $_POST['city'];
    //     $contact = $_POST['contact'];
    //     $address = $_POST['address'];
    //     $role = $_POST['role'];

    //     $check_exist = mysqli_query($con,"select * from users where email = '$email'");
    //     $row_register = mysqli_fetch_array($check_exist);


    //     if($row_register['email'] !=$email && $password == $confirm_password )
    //     {
    //         move_uploaded_file($image_tmp,"../upload-files/$image");
            
    //         $run_insert = mysqli_query($con,"insert into users (ip_address,name,email,password,country,city,contact,user_address,image,role) values ('$ip','$name','$email','$password','$country','$city','$contact','$address','$image','$role') ");
            
    //         if($run_insert){
    //             $sel_user = mysqli_query($con,"select * from users where email='$email' ");
    //             $row_user = mysqli_fetch_array($sel_user);
                
    //             $_SESSION['user_id'] = $row_user['id'] ."<br>";
    //             // $_SESSION['role'] = $row_user['role'];	
    //         }
            
    //         $run_cart = mysqli_query($con,"select * from cart where ip_address='$ip'");
            
    //         $check_cart = mysqli_num_rows($run_cart);
            
    //         if($check_cart == 0)
    //         {
            
    //             $_SESSION['email'] = $email;
                
    //             echo "<script>alert('Account has been created successfully!')</script>";
                
    //             echo "<script>window.open('customer/my_account.php','_self')</script>";
            
    //         }
    //         else
    //         { 
    //             $_SESSION['email'] = $email; 
    //             echo "<script>alert('Account has been created successfully!')</script>";
    //             echo "<script>window.open('checkout.php','_self')</script>";
    //         }

    //     }
    // }



   
}
function checkUseremail($email){
    $query = "select email from ecustomer where email = '$email'";
    $rs = get($query);
    if(count($rs) > 0){
        return true;
    }
    return false;
    
}

?>