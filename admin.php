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
            <div class="dashboard"><h2>Dashboard</h2></div>
                <div class="stats">
                    <div class="total_products">
                    <p>Total Products:</p>
                    <?php
                        $cn = mysqli_connect('localhost', 'root', '', 'smartbasket');
                        $qry = "SELECT * FROM products_list";
                        $rs = mysqli_query($cn,$qry);
                        $rc = mysqli_num_rows($rs);
                        echo "<h1>".$rc."</h1>";
                    ?>
                    </div>
                    <div class="total_products">
                    <p>Total sales:</p>
                    <h1>20</h1>
                    </div>
                    <div class="total_products">
                    <p>Total Users:</p>
                    <?php
                        $cn = mysqli_connect('localhost', 'root', '', 'smartbasket');
                        $qry = "SELECT * FROM logindb";
                        $rs = mysqli_query($cn,$qry);
                        $rc = mysqli_num_rows($rs);
                        echo "<h1>".$rc."</h1>";
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
</body>
</html>
