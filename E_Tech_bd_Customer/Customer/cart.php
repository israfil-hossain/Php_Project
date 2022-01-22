<?php 
include('../includes/header.php');
?>

<!-- Content Wrapper -->
<div class="content_wrapper">

    <!--------------------- Start Catagories ------------------- -->
    <div id="sidebar">  
        <div id="sidebar_title">Categories</div>
            <ul id="cats">
                <?php getCats();?>  
            </ul>

        <div id="sidebar_title">Brands</div>
        <ul id="cats">
            <?php getBrands(); ?>  
        </ul>

    </div> 
    <!--------------End Catagories --------------------------->

    <!------------------------Content Area  ---------------------->
    <div id="content_area">
        <!----------------------Shoping_cart Container -------------------->
        <div class = "shopping_cart_container"> 
                
            <div id="shopping_cart" align="right"style="padding:15px">
                <?php 
                    if(isset($_SESSION['customer_email']))
                    {
                        echo "<b> Your Email:</b>" .$_SESSION['customer_email'];
                    }
                    else {
                        echo "";
                    }
                ?>
                <h2 align="center" ><b  style="color:yellow;">Your Cart -</b> Total Items:<?php total_items();?>
                Total Price:<?php total_price(); ?> </h2>
            </div> 
            <!-- ----------------end_shopping cart--------------------------->
    
            <form action="" method="post" enctype="multipart/form-data">
                <table align="center" width="100%">
                    <tr align="center">
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        
                    </tr>
                <?php 
                    $total = 0;

                $ip = get_ip();

                $run_cart = mysqli_query($con,"select * from cart where ip_address = '$ip'");

                while($fetch_cart = mysqli_fetch_array($run_cart)){
                    $product_id = $fetch_cart ['product_id'];

                    $result_product = mysqli_query($con,"select * from products where product_id = '$product_id'");
                    
                    while($fetch_product = mysqli_fetch_array($result_product)){
                        $product_price = array($fetch_product['product_price']);
                        $product_title = $fetch_product['product_title'];
                        $product_image = $fetch_product['product_image'];
                        $sing_price = $fetch_product['product_price'];
                        $values = array_sum($product_price);

                        // Getting Quantity of the product 
                        $run_qty = mysqli_query($con,"select * from cart where product_id = '$product_id'");
                        $row_qty = mysqli_fetch_array($run_qty);
                        $qty = $row_qty['quality']; 
                        $values_qty = $values * $qty;
                        $total += $values_qty;
                
                ?>
                    <tr align="center">
                        <td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>" /></td>
                        <td>
                            <?php echo $product_title;?>
                            <br/>
                            <img src ="../admin_area/product_images/<?php echo $product_image; ?>" />
                        </td>
                        <td><input type = "text" size="4" name="qty" value="<?php echo $qty; ?>" /></td>
                        <td><?php echo "$" . $sing_price;?></td>
                    </tr>
                <?php }}// End While ?>
                    <tr>
                        <td colspan="4" align="right"><b>Sub Total:</b></td>
                        <td>$<?php echo total_price(); ?> </td>
                    </tr>


                    <tr align="center">
                        <td colspan="2"><input type="submit" name="update_cart" value="Update_Cart"/></td>
                        <td><input type="submit" name="continue" value="Continue Shopping" /></td>
                        <td><button><a href="checkout.php" >Checkout</a></td>;
                </table>
            </form>
                    <?php 
                        if(isset($_POST['remove'])){
                            foreach($_POST['remove'] as $remove_id){

                                $run_delete = mysqli_query($con,"delete from cart where product_id ='$remove_id' AND ip_address='$ip' ");

                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                        if(isset($_POST['continue'])){
                            echo "<script>window.open('Homepage.php','_self')</script>";
                        }
                    ?>
        </div> <!-- Shopping_cart_container -->
                
    </div> <!--Content area End -->
</div> <!-- End Content_Wrapper -->
 <?php include('../includes/footer.php'); ?>