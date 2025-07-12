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
            <form action="" method="POST">
                <div class="dashboard">
                   <h2>Add a New Product</h2>
                  <input type="submit" name="addbtn" value="ADD">
                 </div>
                <label for="prod_id">Product id:</label>
                <input type="text" id="prod_id" name="prod_id" required><br>

                <label for="prod_name">Product Name:</label>
                <input type="text" id="prod_name" name="prod_name" required><br>

                <label for="prod_price">Product Price:</label>
                <input type="text" id="prod_price" name="prod_price" required><br>

                <label for="prod_img">Image URL:</label>
                <input type="text" id="prod_img" name="prod_img" required><br>

                <label for="prod_qty">Quantity:</label>
                <input type="text" id="prod_qty" name="prod_qty" required><br>

                <label for="prod_cat">Category:</label>
                <select name="prod_cat">
                    <option values="mobiles">Mobiles</option>
                    <option values="appliances">Appliances</option>
                    <option values="electronics">Electronics</option>
                    <option values="fashion">Fashion</option>
                    <option values="homeacc">Home Accesories</option>
                    <option values="childrens">Childrens</option>
                </select><br>

                <label for="prod_discount">Discount:</label>
                <input type="text" id="prod_discount" name="prod_discount" required><br>

                <label for="prod_dtls">Details:</label>
                <textarea id="prod_dtls" name="prod_dtls" rows="4" cols="50" required></textarea><br>
             </form>   
        </div>
    </div>
    <footer></footer>
</body>
</html>
<?php
if (isset($_POST['addbtn'])){
    $prod_id = $_POST['prod_id'];
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $prod_img = $_POST['prod_img'];
    $prod_dtls = $_POST['prod_dtls'];
    $prod_qty = $_POST['prod_qty'];
    $prod_cat = $_POST['prod_cat'];
    $prod_discount = $_POST['prod_discount'];

    $cn = mysqli_connect('localhost', 'root', '', 'smartbasket');
    $cqry = "SELECT * FROM products_list WHERE prod_id = " . $prod_id;
    $crs=mysqli_query($cn,$cqry);
    $crc=mysqli_num_rows($crs);
    if($crc==0)
    {
        $qry ="INSERT INTO `products_list`(`prod_id`, `prod_name`, `prod_price`, `prod_img`, `prod_dtls`, `prod_cat`, `prod_discount`,`prod_qty`) VALUES ('$prod_id','$prod_name','$prod_price','$prod_img','$prod_dtls','$prod_cat','$prod_discount','$prod_qty')";
        $rs=mysqli_query($cn,$qry);
        if($rs){
            echo "<script>alert('Updated Sucesfully');</script>";
            echo "<script>window.location.href='adminadd.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('product id already exists');</script>";
    }
}
?>
