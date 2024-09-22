<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $selectedProducts = $_POST['selected_products'];

        foreach ($selectedProducts as $productId) {
            echo "You selected product ID: " . htmlspecialchars($productId) . "<br>";
            // Further processing can be done here
        }
    
}
?>
