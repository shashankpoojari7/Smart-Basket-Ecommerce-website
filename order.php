<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Placement</title>
<link rel="stylesheet" href="order1.css">
</head>
<body>
<form action="" method="post">
    <h2 style="margin: 20px 0px; color:green;"><center>Customer Information</center></h2>
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" value="<?php session_start(); echo $_SESSION['name']; ?>" disabled>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']; ?>" disabled>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" autocomplete="off" maxlength="10" required>

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4" required></textarea>

    <h2 style="margin: 10px 0px; color:green;"><center>Order Details</center></h2>
    <hr style="border :1px solid grey;">
    <?php
        $net = $_SESSION['net'];
        $dis = $_SESSION['dis'];
        $cn = mysqli_connect('localhost', 'root', '', 'smartbasket');
        $qry ="select * from cart where username='".$_SESSION['user']."'";
        $rs = mysqli_query($cn,$qry);
        $rc = mysqli_num_rows($rs);
        while($row = mysqli_fetch_assoc($rs))
        {
            echo "<span><p>".$row['prod_name']."</p><p style='margin-left:auto;'>₹".$row['prod_price']."</p></span>";
        }
        echo "<span><p>Discount</p><p style='margin-left:auto; color:green;'>-₹".$dis."</p></span>";
        echo "<span><p>Delivery Charges</p><p style='margin-left:auto; color:green;'>FREE</p></span>";
        echo "<hr style='border :1px dashed black;'>";
        echo "<span><p>Total Amount</p><p style='margin-left:auto;'>₹".$net."</p></span>";
        echo "<hr style='border :1px dashed black;'>";
    ?>
    <br>
    <center><input type="submit" name="btn" value="Place Order"></center>
    <br><br>
</form>
</body>
</html>
<?php
    if(isset($_POST['btn'])){
        $id = $_SESSION['user'];
        $cn = mysqli_connect('localhost', 'root', '', 'smartbasket');
        $dltqry = "UPDATE products_list SET prod_qty = prod_qty - 1 WHERE prod_id IN 
        (SELECT prod_id FROM cart WHERE username = '".$id."')";
        mysqli_query($cn,$dltqry);
        $qry ="Delete from cart where username='".$id."'";
        mysqli_query($cn,$qry);
        echo "<script>window.location.href='confirm.php';</script>";
    }
?>
