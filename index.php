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
if(isset($_POST['add_to_wishlist']))
{       
    $Wishlist_id=$_POST['product_id'];
    $Wishlist_name=$_POST['product_name'];
    $Wishlist_price=$_POST['product_price'];
    $Wishlist_image=$_POST['product_img'];
   $select_wishlist=mysqli_query($conn,"SELECT * FROM `wishlist` WHERE name='$Wishlist_name' AND use_id ='$user_id' ") or die('query failed');
   $select_cart=mysqli_query($conn,"SELECT * FROM `cart` WHERE name='$Wishlist_name' AND use_id ='$user_id'")or die('query failed');
   if(mysqli_num_rows($select_wishlist)>0)
   {
    $messege[]= 'wishlist already exist';

   }else if(mysqli_num_rows($select_cart)>0)
   {
    $messege[] ='product had already in cartory';
   }
   else{
    mysqli_query($conn,"INSERT INTO `wishlist`( `use_id`, `pid`, `name`, `price`, `image`) VALUES ('$user_id','$Wishlist_id','$Wishlist_name','$Wishlist_price','$Wishlist_image')")or die('query failed');
    $messege[] = 'successfully';
   }
}
if(isset($_POST['add_to_cart']))
{    
    $cart_id=$_POST['product_id'];
    $cart_name=$_POST['product_name'];
    $cart_price=$_POST['product_price'];
    $cart_image=$_POST['product_img'];
    $cart_quantity=$_POST['product_quantity'];
   
   $select_cart=mysqli_query($conn,"SELECT * FROM `cart` WHERE name='$cart_name' AND use_id ='$user_id'")or die('query failed');
  if(mysqli_num_rows($select_cart)>0)
   {
    $messege[] ='product had already in cartory';
   }
   else{
    mysqli_query($conn,"INSERT INTO `cart`( `use_id`, `pid`, `name`, `price`, `quantity`,`image`) VALUES ('$user_id','$cart_id','$cart_name','$cart_price','  $cart_quantity','$cart_image')")or die('query failed');
    $messege[] = 'successfully';
   }
}
if(isset($_GET['pid']))
{
    $pid_id=$_GET['pid'];
    mysqli_query($conn,"SELECT * FROM `products` Where id='$pid_id' ") or die('query failed ');
    header('location:index.php');
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

    <!-- home slider -->
    <div class="container-fluid">
        <div class="hero-slider">
            <div class="slider-item">
                <img src="./img/slider.jpg">
                <div class="slider-caption">
                    <span>Test Th quality</span>
                    <h1>Qrganic Premium <btr>Honey</h1>
                    <p>Enjoy sweet of <br>raw</p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
            </div>
            <!-- <div class="slider-item">
                <img src="./img/slider2.png" >
                <div class="slider-caption">
                    <span>Test Th quality</span>
                    <h1>Qrganic Premium <btr>Honey</h1>
                    <p>Enjoy sweet of <br>raw</p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
            </div> -->
        </div>
        <div class="controls">
            <i class="fa-sharp fa-solid fa-chevron-left prev"></i>
            <i class="fa-sharp fa-solid fa-chevron-right next"></i>
        </div>
    </div>
    <div class="line2"></div>
    <div class="services">
        <div class="row">
            <div class="box">
                <img src="./img/0.png">
                <div>
                    <h1>Free Shipping Fast</h1>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
            <div class="box">
                <img src="./img/1.png">
                <div>
                    <h1>money back </h1>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
            <div class="box">
                <img src="./img/2.png">
                <div>
                    <h1>Online support 24/7</h1>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line2"></div>
    <div class="story">
        <div class="row">
            <div class="box">
                <span>our story</span>
                <h1>Production of natural honey since 2001</h1>
                <p>Interdum
                    Placeta
                    EM
                    ANH
                </p>
                <a href="shop.php" class="btn">show now</a>
            </div>
            <div class="box">
                <img src="img/8.png" alt="">
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <div class="line4"></div>
    <div class="testimonial-fluid">
        <h1 class="title">what our customers Say's</h1>
        <div class="testimonial-slider">
            <div class="testimonail-item">
                <img src="img/3.jpg">
                <div class="testimonial-caption">
                    <span>Test The Quality</span>
                    <h1>image from internet</h1>
                    <p>test slider index error not yet javascrip .</p>
                </div>
            </div>
            <!-- <div class="testimonail-item">
                <img src="img/4.jpg">
                <div class="testimonial-caption">
                    <span>Test The Quality</span>
                    <h1>Organic Premium Honey</h1>
                    <p>Lorem My first visit to Nha Trang, the coastal city, was three years ago. It was a pleasant and memorable trip. Nha Trang, the capital of Khanhs Hoaf province,
                        has one of the most popular municipal beaches in all of Vietnam. In Nha Trang, nature beauties are so tempting. Waves crashing onto the cliffs;
                        early each morning to stroll along the beach a chance to breath in the fresh sea air and enjoy the sunrise across the water.</p>
                </div>
            </div> -->
            <!-- <div class="testimonail-item">
                <img src="img/profile.jpg">
                <div class="testimonial-caption">
                    <span>Test The Quality</span>
                    <h1>Organic Premium Honey</h1>
                    <p>Lorem My first visit to Nha Trang, the coastal city, was three years ago.It was a pleasant and memorable trip. Nha Trang, the capital of Khanhs Hoaf province,
                        has one of the most popular municipal beaches in all of Vietnam. In Nha Trang, nature beauties are so tempting. Waves crashing onto the cliffs;
                        early each morning to stroll along the beach a chance to breath in the fresh sea air and enjoy the sunrise across the water.</p>
                </div>
            </div> -->
        </div>
        <div class="controls">
            <i class="fa-sharp fa-solid fa-chevron-left prev1"></i>
            <i class="fa-sharp fa-solid fa-chevron-right next1"></i>
        </div>
    </div>
    <div class="line"></div>
    <!-- discover section -->
    <div class="discover">
        <div class="detail">
            <h1 class="title"></h1>
            <span> </span>
            <p>
            </p><br>
            <a href="shop.php" class="btn"></a>
        </div>
        <div class="img-box">
            <img src="img/13.png" alt="">
        </div>
    </div>
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
    <?php include 'homeshop.php';  ?>
    <div class="line2"></div>
    <div class="newslatter">
        <h1 class="titel">Join our to Newslatter</h1>
        <p>Get 15 %</p>
        <input type="text" name="" placeholder="your Email Adress...">
        <button>subscribe now</button>
    </div>
    <div class="line3"></div>
    <div class="client">
        <div class="box">
            <img src="img/client0.png" alt="">
        </div>
        <div class="box">
            <img src="img/client1.png" alt="">
        </div>
        <div class="box">
            <img src="img/client2.png" alt="">
        </div>
        <div class="box">
            <img src="img/client3.png" alt="">
        </div>
        <div class="box">
            <img src="img/client.png" alt="">
        </div>
    </div>
    <?php include 'footer.php';  ?>
    <script src="./script2.js"></script>
</body>

</html>