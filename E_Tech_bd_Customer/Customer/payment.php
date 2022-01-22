
<?php 

$select_user = mysqli_query($con,"select * from ecustomer where id='$_SESSION[user_id]' ");

$fetch_user = mysqli_fetch_array($select_user);

?>


<div class="checkout_order">
    <form method = "post" action="" enctype="multipart/form-data">
        <div class="delivery_information">
            <table align="Center" width="70%" color="blue" border="2px solid black">
                
                <tr align="left">	   
                    <td colspan="4">
                    <h2>Checkout Page</h2><br />
                    </td>	   
                </tr>
                <tr>
                    <td width="15%"><b>Delivery address:</b></td>
                    <td colspan="3"><input type="text" name="address" value="<?php echo $fetch_user['user_address'];?>"  required placeholder="Address" /></td>
                </tr>
                    
                <tr>
                    <td width="15%"><b>Contact:</b></td>
                    <td colspan="3"><input type="text" name="contact" value="<?php echo $fetch_user['contact'];?>" required placeholder="Contact" /></br></br></br></td>
                </tr>        
        </div>

       
        <div class="order_summery">
            <tr>
                <td><h2>Order Summary</h2></br></td>
            </tr>


            <?php 

                $total = 0;

                $ip = get_ip();

                $run_cart = mysqli_query($con,"select * from cart where ip_address = '$ip'");  //select to cart [ run_cart]

                while($fetch_cart = mysqli_fetch_array($run_cart)){
                    $product_id = $fetch_cart ['product_id'];

                    $result_product = mysqli_query($con,"select * from products where product_id = '$product_id'"); //select to products [result_product]

                    
                    while($fetch_product = mysqli_fetch_array($result_product)){
                        $product_price = array($fetch_product['product_price']);
                        $product_title = $fetch_product['product_title'];
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
                    <td> <input type="" name="pro_title" value="<?php echo $product_title;?>" READONLY/></td>
                    <td><input type = "" size="4" name="qty" value="<?php echo $qty; ?>" READONLY/></td>
                    <td><input type ="" name="pro_price" value="<?php echo "$" . $sing_price;?>" READONLY/></br></br></td>
                </tr>

                <?php }}// End While ?>


                <tr>
                    <td> <br></td><br> 
                    <td align="center"><br><b>Sub Total:</b><?php echo "$" . total_price(); ?> </td>
                    
                </tr>

                    <div class="Payment">
                <tr>
                    <td><h2>Payment Method</h2><br><br></td>
                </tr>
                <tr><td><input type="checkbox" name="Bkash" />Bkash</td>
                <td><input type="checkbox"value="Cashon Delivery"/>Cash on Delivery</td>
                
                <tr align="center">
                    <td></td>
                    <td colspan="4"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="payment" value="Place Order" /><br><br><br>
                    </td>
                </tr>
            </div>

            </table>
    </form> 
</div>

<?php 
if(isset($_POST['payment'])){  
  
    if(!empty($_POST['address']) && !empty($_POST['contact'])){
    
    $address = $_POST['address'];
    $contact = $_POST['contact']; 
    $pro_name = $_POST['pro_title'];
    
    $qty = $_POST['qty'];
    $pro_price = $_POST['price'];
    
     
     
     //$payment_order = mysqli_query($con,"insert into orders set pro_name='$pro_name', qty='$qty',price='$price', contact='$contact', address='$address' where id='$_SESSION[user_id]'");
     $payment_order = mysqli_query($con,"insert into eorders (pro_name,quantity,price,address,phone) values ('$pro_name','$qty','$pro_price','$address','$contact') ");
     if($payment_order){
     echo "<script>alert('Your updated was successfully!')</script>";
     
     echo "<script>window.open(window.location.href,'_self')</script>";
     }
     
    }
}

?>