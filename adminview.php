<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="adminstyles2.css">
</head>
<body>
    <header>
        <div class="img"><img src="Assets/products/settings.png" alt="img"></div><div><h1>Admin</h1></div>
    </header>
    <div class="main">
        <div class="navigation">
            <div class="nav_bar"><a href="admin.php">Home</a></div>
            <div class="nav_bar"><a href="adminadd.php">Add Products</a></div>
            <div class="nav_bar"><a href="admindlt.php">Delete Products</a></div>
            <div class="nav_bar"><a href="adminview.php">View Products</a></div>
            <div class="nav_bar"><a href="login.php">Logout</a></div>
        </div>
        <div class="display">
            <form action="" method="POST" style="height:30px;">
                <div class="dashboard">
                    <h2>Products List</h2>
                    <input type="submit" name="viewbtn" value="VIEW">
                </div>
            </form>
            <br><br>
            <?php
if (isset($_POST['viewbtn'])){

    $cn = mysqli_connect('localhost', 'root', '', 'smartbasket');
    $qry ="SELECT * FROM `products_list`";
    $rs=mysqli_query($cn,$qry);
    $r=mysqli_num_rows($rs);
    if($r==0){
    echo "<script>alert('No products found');</script>";
    echo "<script>window.location.href='adminview.php';</script>";
    }else{
        echo "<table border='1' cellspacing='1' cellpadding='15'>";
        echo "<thead>";
        echo "<th>Product Id</th>";
        echo "<th>Product Name</th>";
        echo "<th>Product Price</th>";
        echo "<th>Product Category</th>";
        echo "<th>Product Discount</th>";
        echo "<th>Product Qty</th>";
        echo "</thead><tbody>";
        
        while($row=mysqli_fetch_array($rs))
        {
           echo "<tr>";
           echo "<td>".$row['prod_id']."</td>";
           echo "<td>".$row['prod_name']."</td>";
           echo "<td>₹".$row['prod_price']."</td>";
           echo "<td>".$row['prod_cat']."</td>";
           echo "<td>".$row['prod_discount']."%</td>";
           echo "<td>".$row['prod_qty']."</td>";
           echo "</tr>";
        }
        echo "</tbody></table>";
    }
}
?>

        </div>
    </div>
</body>
</html>

