<?php 
include('../includes/header.php');
?>

          

    <!-- Content Wrapper -->
    <div class="content_wrapper">
        <?php if(!isset($_GET['action'])){?>

          <!-- Start Catagories  -->
        <div id="sidebar">  
            <div id="sidebar_title">Categories</div>
            <ul id="cats">
            
            <?php 
            getCats();
            ?>
            
            </ul>

            <div id="sidebar_title">Brands</div>
            <ul id="cats">
                <?php 
                    getBrands();
                ?>  
            </ul>

        </div> 
         <!-- End Catagories -->

         <!-- Content Area  -->
        <div id="content_area">
            <?php cart();  ?>
            
            <div id="products_box">
            
            <?php getPro(); ?>
            <?php               
                get_pro_by_cat_id();               
            ?>

            <?php 
                get_pro_by_brand_id();
            ?>

            <?php } else { ?>

                <?php include('login.php');?>

            </div> <!-- # Products _ box End # -->
        </div>
        <?php } ?>
    </div>
    <!-- End Content_Wrapper -->
<?php 

include('../includes/footer.php'); ?>