<?php
if (isset($_POST['dltbtn'])) {
    $prod_id = $_POST['prod_id'];
    $cn = mysqli_connect('127.0.0.1', 'root', 'root', 'smartbasket', 3306);
    $qry = "SELECT * FROM `products_list` WHERE prod_id='$prod_id'";
    $rc = mysqli_query($cn, $qry);
    $r = mysqli_num_rows($rc);
    if ($r == 0) {
        echo "<script>alert('No such Data Exists');</script>";
        echo "<script>window.location.href='admindlt.php';</script>";
    } else {
        $qry = "DELETE FROM `products_list` WHERE prod_id='$prod_id'";
        $rs = mysqli_query($cn, $qry);
        if ($rs) {
            echo "<script>alert('Deleted Successfully');</script>";
            echo "<script>window.location.href='admindlt.php';</script>";
        } else {
            echo "<script>alert('Deletion Failed');</script>";
            echo "<script>window.location.href='admindlt.php';</script>";
        }
    }
}
?>

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
                   <h2>Delete Product</h2>
                  <input type="submit" name="dltbtn" value="DELETE">
                 </div>
                <label for="prod_id">Enter the Product Id you want Delete:</label>
                <input type="text" id="prod_id" name="prod_id" required><br>
            </form>   
        </div>
    </div>
</body>
</html>

