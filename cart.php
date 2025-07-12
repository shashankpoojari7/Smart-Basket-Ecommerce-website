<?php
    include 'partials/header.php';
    $user = $_SESSION['user'];
    echo "<div class='container'><h3>Cart</h3></div>";
    echo "<div class='cart-display'>";
    echo "<div class='cart-container'>";
    $cn = mysqli_connect('localhost', 'root', '', 'smartbasket');
    $qry ="select * from cart where username='".$user."'";
    $rs = mysqli_query($cn,$qry);
    $rc =mysqli_num_rows($rs);
    $sum =0;
    if($rc!=0)
    {
        while($row = mysqli_fetch_assoc($rs))
        {
            echo "<div class='cart-item'>";
            echo "<div class='cart-img'><img src = 'Assets/products/" .$row['prod_img']. "'  alt ='".$row['prod_id']."'></div>";
            echo "<div class='cart-dtl'>";
            echo "<h3>".$row['prod_name']."</h3>";
            echo "<p>₹".$row['prod_price']."</p>";
            echo"<form method='post'>
            <input type='hidden' name='prod_id' value='".$row['prod_id']."'>
            <button name='remove'>Remove</button>
            </form>
            </div>";
            echo "</div>";
            $prod_price = str_replace(",", "", $row['prod_price']);
            $_SESSION['prod_price']=$row['prod_price'];
            $sum = $sum + (int)$prod_price;
        }
    }
    else
    {
        echo "<script>alert('no items in cart');</script>";
        echo "<script>window.location.href='home.php';</script>";
    }
    $qry ="select * from cart where username='".$user."'";
    $rs = mysqli_query($cn,$qry);
    $rc =mysqli_num_rows($rs);
    $row=mysqli_fetch_assoc($rs);
    echo "<div class='buy'>";
    echo "<form action='order.php' method='post'>";
    echo "<button>Place Order</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    $dis = 100*$rc;
    $net = $sum-$dis;
    $_SESSION['net']=$net;
    $_SESSION['dis']=$dis;
    echo "<div class='price-container'>
         <div class='a'>Price details</div>
         <hr style='border:1px solid rgba(198, 198, 198, 0.508); margin:0;'>
         <table>
         <tr><td class='b'>Price (".$rc." Items)</td><td class='b1'>₹".$sum."</td></tr>
         <tr><td class='b'>Discount</td><td class='b1'><x style='color:green';>-".$dis."</x></td></tr>
         <tr><td class='b'>Delivery Charges</td><td class='b1'><x style='color:green';>FREE</x></td></tr>
         <tr></tr><td class='c'><b>Total Amount</b></td><td class='c1'><b>₹".$net."</b></td></tr>
         </table>
        </div>";
    echo "</div>";
    include 'partials/footer.php';
    if(isset($_POST['remove'])) {
        $prod_id = $_POST['prod_id'];
        $prod_price=$_SESSION['prod_price'];
        $delete_query = "DELETE FROM cart WHERE prod_id='$prod_id' AND username='$user'";
        mysqli_query($cn, $delete_query);
        $sum=$sum-$ $prod_price;
        echo "<script>window.location.href = 'cart.php';</script>";
    }
?>