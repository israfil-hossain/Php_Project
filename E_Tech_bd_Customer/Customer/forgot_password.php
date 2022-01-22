<?php 
include ('../includes/db.php');
?>
<form method = "post">
Recover Password <input type = "text" name="email" placeholder ="Enter your Email" >
<input type = "submit" name="submit">
</form>

<?php 
   
   
    if (isset($_POST['submit']))
    {
        $to_email = $_POST['email'];
        $query = "SELECT * FROM ecustomer WHERE email = '$to_email'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);

        if($count > 0){
            while($row = mysqli_fetch_assoc($result)){
                $pass_rec = $row['password'];
                $subject = "Password Recovery ";
                $body = "Your Password is : $pass_rec";
                $headers = "From :Israfil166091@gmail.com";

                if(mail($to_email,$subject,$body,$headers)){
                    echo "Your password successfully sent to ". $to_email;
                    
                }
                else{
                    echo "Password recover failed";
                }
            }
        }
    }
    else{
        echo "Your Password does not Match !" ;
    }

?>