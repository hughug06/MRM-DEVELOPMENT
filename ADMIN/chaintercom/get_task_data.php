<?php 
session_start();

include '../../Database/database.php';


if (isset($_GET['kanban_id'])) {
    $kanban_id = $_GET['kanban_id'];

    $query = "SELECT * FROM kanban 
              INNER JOIN user_info ON kanban.user_id = user_info.user_id 
              WHERE kanban_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $kanban_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            // Decode products JSON and fetch product names
            $productsid = json_decode($data['products'], true);
            $productnamearray = [];
            foreach ($productsid as $product) {
                $sqlget = "SELECT ProductName FROM products WHERE ProductID = ?";
                if ($stmt2 = $conn->prepare($sqlget)) {
                    $stmt2->bind_param("i", $product);
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {
                            $productnamearray[] = $row2['ProductName'];
                        }
                    }
                    $stmt2->close();
                }
            }
            $data['products'] = implode(", ", $productnamearray);

            echo json_encode($data);
        } else {
            echo json_encode(null);
        }
        $stmt->close();
    }
}
?>