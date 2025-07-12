<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Matrix Operations</title>
</head>
<body>
    <h2>Matrix Operations</h2>
    <form method="post">
        <label for="rows">Number of Rows:</label>
        <input type="number" id="rows" name="rows" required><br><br>
        <label for="cols">Number of Columns:</label>
        <input type="number" id="cols" name="cols" required><br><br>
        <input type="submit" name="generate" value="Generate Matrix">
    </form>

    <?php
    if (isset($_POST['generate'])) {
        $rows = $_POST['rows'];
        $cols = $_POST['cols'];
        ?>

        <form method="post">
            <input type="hidden" name="rows" value="<?php echo $rows; ?>">
            <input type="hidden" name="cols" value="<?php echo $cols; ?>">

            <h3>Matrix 1</h3>
            <table border="1" cellspacing="0">
                <?php
                for ($i = 0; $i < $rows; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $cols; $j++) {
                        echo "<td><input type='number' name='matrix1[$i][$j]' required></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>

            <h3>Matrix 2</h3>
            <table border="1">
                <?php
                for ($i = 0; $i < $rows; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $cols; $j++) {
                        echo "<td><input type='number' name='matrix2[$i][$j]' required></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <br>
            <button type="submit" name="add">Add Matrices</button>
            <button type="submit" name="multiply">Multiply Matrices</button>
        </form>

        <?php
    } elseif (isset($_POST['add']) || isset($_POST['multiply'])) {
        $rows = $_POST['rows'];
        $cols = $_POST['cols'];
        $matrix1 = $_POST['matrix1'];
        $matrix2 = $_POST['matrix2'];

        if (isset($_POST['add'])) {
            echo "<h3>Sum of Matrices</h3>";
            echo "<table border='1'cellpadding='2'>";
            for ($i = 0; $i < $rows; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $cols; $j++) {
                    $sum = $matrix1[$i][$j] + $matrix2[$i][$j];
                    echo "<td>$sum</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        if (isset($_POST['multiply'])) {
            echo "<h3>Product of Matrices</h3>";
            echo "<table border='1'>";
            for ($i = 0; $i < $rows; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $cols; $j++) {
                    $product = 0;
                    for ($k = 0; $k < $cols; $k++) {
                        $product += $matrix1[$i][$k] * $matrix2[$k][$j];
                    }
                    echo "<td>$product</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>