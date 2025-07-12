    <?php
        include 'partials/header.php';
        include 'partials/categories_nav.php';
        ?>
        <div class="container">
            <h3>Fashion</h3>
        </div>
        <?php
        $_SESSION['url']="fashion.php";
        $cn = new mysqli('localhost', 'root', '', 'smartbasket');
        $qry ="select * from products_list where prod_cat='fashion'";
        $rc=mysqli_query($cn,$qry);
        echo "<div class='product_container'>";
        if(mysqli_num_rows($rc) > 0){
            while($row=mysqli_fetch_assoc($rc)){
                echo "<div class='product_image'>";
                echo "<div class ='img1'><img src = 'Assets/products/" .$row["prod_img"]. "' alt =' " .$row["prod_name"]. "'></div>";
                echo "<h4>" .$row["prod_name"]. "</h4>";
                echo "<p>₹" .$row["prod_price"]. "</p>";
                echo "<form action='buy_product.php' method='POST'>";
                echo "<input type='hidden' name='product_id' value='{$row["prod_id"]}'>";
                echo "<input type='submit' name='btn' value='Buy'>";
                echo "</form>";
                echo "</div>";
            }
         }
         echo "</div>";
        include 'partials/footer.php';
        ?>     