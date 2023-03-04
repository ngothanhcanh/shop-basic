<?php
include 'connection.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
if (isset($_POST['logout-btn'])) {
    session_destroy();
    header('location:login.php');
}
if (isset($_POST['add_to_wishlist'])) {
    $Wishlist_id = $_POST['product_id'];
    $Wishlist_name = $_POST['product_name'];
    $Wishlist_price = $_POST['product_price'];
    $Wishlist_image = $_POST['product_img'];
    $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name='$Wishlist_name' AND use_id ='$user_id' ") or die('query failed');
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$Wishlist_name' AND use_id ='$user_id'") or die('query failed');
    if (mysqli_num_rows($select_wishlist) > 0) {
        $messege[] = 'wishlist already exist';
    } else if (mysqli_num_rows($select_cart) > 0) {
        $messege[] = 'product had already in cartory';
    } else {
        mysqli_query($conn, "INSERT INTO `wishlist`( `use_id`, `pid`, `name`, `price`, `image`) VALUES ('$user_id','$Wishlist_id','$Wishlist_name','$Wishlist_price','$Wishlist_image')") or die('query failed');
        $messege[] = 'successfully';
    }
}
if (isset($_POST['add_to_cart'])) {
    $cart_id = $_POST['product_id'];
    $cart_name = $_POST['product_name'];
    $cart_price = $_POST['product_price'];
    $cart_image = $_POST['product_img'];
    $cart_quantity = $_POST['product_quantity'];

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$cart_name' AND use_id ='$user_id'") or die('query failed');
    if (mysqli_num_rows($select_cart) > 0) {
        $messege[] = 'product had already in cartory';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`( `use_id`, `pid`, `name`, `price`, `quantity`,`image`) VALUES ('$user_id','$cart_id','$cart_name','$cart_price','  $cart_quantity','$cart_image')") or die('query failed');
        $messege[] = 'successfully';
    }
}
?>
<style type="text/css">
    <?php
    include 'main.css';
    ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>home page</title>
</head>

<body>
    <?php include 'header.php';  ?>
    
    <div class="line2"></div>
    
    <section class="popular-brands-shop">
        <h2>POPULAR BRANDS</h2>
        <?php
   if(isset($messege))
   {
       foreach($messege as $messege)
       {
           echo'<div class="message">
           <span>'.$messege.'</span>
           <i class="click" onclick="this.parentElement.remove()">aa</i>
       </div>';
       }
   }
  ?>
        <div class="popular-brands-content-shop">
            <?php
            $select_product = mysqli_query($conn, "SELECT * FROM `products` ") or die('query failed');
            if (mysqli_num_rows($select_product) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_product)) {

            ?>
                    <form method="post" class="card-shop">
                        <img src="image/<?php echo $fetch_product['image']; ?>">
                        <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                        <div class="name"><?php echo $fetch_product['name'] ?></div>
                        <input type="hidden" name="product_id" value="<?php echo $fetch_product['id'] ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name'] ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price'] ?>">
                        <input type="hidden" name="product_quantity" value="1" min="1">
                        <input type="hidden" name="product_img" value="<?php echo $fetch_product['image'] ?>">
                        <div class="icon">
                            <a href="viewproduct.php?pid=<?php echo $fetch_product['id'] ?>"  class="fa-sharp fa-solid fa-eye"></a>
                            <button type="submit" name="add_to_wishlist" class="fa-sharp fa-solid fa-heart"></button>
                            <button type="submit" name="add_to_cart" class="fa-sharp fa-solid fa-cart-shopping"></button>
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty"> no products added yet!</p>';
            }
            ?>
        </div>
    </section>
         
   <div class="line4"></div>
    <?php include 'footer.php';  ?>
    <script src="./script2.js"></script>
</body>

</html>