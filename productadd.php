<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Buy Product</title>
</head>
<body>
    <?php
        session_start();
        $pid =$_SESSION['pid'];
        $user =$_SESSION['user'];
        $url =$_SESSION['url'];
        $name =$_SESSION['name'];
        $cn = mysqli_connect('127.0.0.1', 'root', 'root', 'smartbasket', 3306);
        $qry ="select * from products_list where prod_id='$pid'";
        $rc = mysqli_query($cn,$qry);
        $row = mysqli_fetch_array($rc);
        $cqry ="select * from cart where prod_id='$pid' and username='".$user."'";
        $rs = mysqli_query($cn,$cqry);
        $rcount = mysqli_num_rows($rs);
        if($rcount==0)
        {
        $upqry ="insert into cart values(".$pid.",'".$row['prod_name']."','".$row['prod_img']."',
        '".$row['prod_price']."','".$user."','".$name."')";
        $rs = mysqli_query($cn,$upqry);
        if($rs)
        {
            echo "<script>alert('Product Added to Cart');</script>";
            echo "<script>window.location.href='".$url."';</script>";
        }
        }else{
            echo "<script>alert('Product Already Added to Cart');</script>";
            echo "<script>window.location.href='".$url."';</script>";
        }
    ?>
</body>
</html>