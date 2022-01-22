<?php 
include('../includes/header.php');
?>
    <!-- Content Wrapper -->
    <div class="content_wrapper">
        <?php
            if(!isset($_SESSION['email'])){
                include('login.php');
            }
            else{
                include('payment.php');
            }

        ?>

      
    </div>
    <!-- End Content_Wrapper -->
 <?php include('../includes/footer.php'); ?>