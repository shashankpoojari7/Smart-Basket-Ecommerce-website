    <?php
    include 'partials/header.php';
    if(isset($_POST['btn'])) {
        $product_id = $_POST['product_id'];
        $cn = mysqli_connect('127.0.0.1', 'root', 'root', 'smartbasket', 3306);
        $qry ="select * from products_list where prod_id=".$product_id;
        $rc=mysqli_query($cn,$qry);
        $row=mysqli_fetch_assoc($rc);
        $_SESSION['pid'] = $row['prod_id'];
        
        echo "<div class='buy_product'>";
        echo "<div class='left_div'>";
        echo "<div class='img'><img src = 'Assets/products/" .$row["prod_img"]. "' alt =\" " .$row["prod_name"]. "\"></div>";
        echo "<form name='cartform' action='productadd.php' method='POST'>";
        
        $qry2 = "SELECT * FROM products_list WHERE prod_id = {$row["prod_id"]} AND prod_qty != 0";
        $rs = mysqli_query($cn, $qry2);
        
        if (mysqli_num_rows($rs) > 0) {
            echo "<input type='submit' name='cart_btn' value='Add to Cart'>";
        } else {
            echo "<input type='submit' name='cart_btn' value='Out of Stock' style='background-color:#ff0000;' disabled>";
        }
        

        echo "<input type='hidden' name='product_id' value='".$row["prod_id"]."'>";
        echo "</form>";
        echo "</div>";
        echo "<div class='right_div'>";
        echo "<p style='margin: 7px 0px -5px 0px; font-size: 21px;'>".$row['prod_name']."</p>";
        echo "<p style='color: green; font-size: 20px; margin-bottom:1px;'>Special Price</p>";
        echo "<p style='font-size: x-large; font-weight: 500;'>₹".$row['prod_price']."</p>";
        echo "<div class='offers'>";
        echo "<p style='color:red;'>Available Offers</p>";
        echo "<ul style='padding-left: 20px;'><li><p>Bank Offer 10% off on Axis Bank Credit Cards, up to ₹1500. On orders of ₹5000 and above <x style='color:blue;'>T&C</x></p></li>
        <li><p>Bank Offer 15% Instant discount on first Flipkart Pay Later order of 500 and above <x style='color:blue;'>T&C</x></p></li>
        <li><p>Special Price Extra ₹2200 off(price inclusive of discount) <x style='color:blue;'>T&C</x></p></li>
        <li><p>Bank Offer Flat ₹4000 off on Flipkart Axis Bank Credit Cards. On order of ₹80,000 and above <x style='color:blue;'>T&C</x></p></li>";
        echo "<br>";
        echo "<p style='color:gray;'>Delivery:<span style='display: inline-block; width: 50px;'></span><x style='color:black;font-weight:550;'>Delivery by 21st,October</x></p></ul>";
        echo "</div>";
        echo "</div>";

        echo "</div>";
    }
    include 'partials/products.php';
    include 'partials/footer.php';
    ?>