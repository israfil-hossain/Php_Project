<?php 
    session_start();
    echo "Welcome To " .$_SESSION['email'];

?>
<html>
<head>
</head>
<body>

 <!-- Start Home -->
<table border ="0" width = "100%" height="500px"  cellpadding ="" cellspacing="0" bgcolor="#292929">
    <tr>
        <td>
            <table border="0" width ="100%" height="auto" cellpadding="" cellspacing ="0" align="center">
                <tr>
                    <td align="center" valign="middle" >
                        <h1>
                            <font align="left" face ="arial" color="#f3971b" size="8">
                            WELCOME TO <br> NEWS PORTAL MANAGEMENT
                            </font>
                        </h1>
                       
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>   
</body>
</html>

<?php 
echo "<br> <a href='logout.php'> logout </a>";
?>