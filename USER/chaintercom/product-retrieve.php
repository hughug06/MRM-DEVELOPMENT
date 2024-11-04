<?php 
require_once '../../ADMIN/authetincation.php';
require_once '../../Database/database.php';
$sql = "SELECT * FROM Products WHERE Availability = 1";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="form-check product-item">';
            echo '<input class="form-check-input" type="checkbox" id="product_' . $row['ProductID'] . '" name="selected_products[]" value="' . $row['ProductID'] . '">';
            echo '<label class="form-check-label product-name" for="product_' . $row['ProductID'] . '">' . $row['ProductName'] . '</label>';
            echo '<span class="specification"><br> SPECIFICATION: ' . htmlspecialchars($row['Specification']) . '</span>'; // Display specification
            echo '</div>';
        }
    }     
}

?>
