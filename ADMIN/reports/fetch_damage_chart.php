<?php
require_once '../../Database/database.php';

$query = "SELECT when_happen, SUM(quantity) AS damage_count 
          FROM damage_report 
          GROUP BY when_happen 
          ORDER BY FIELD(when_happen, 'pick_up', 'arrive')";
$result = $conn->query($query);

$labels = [];
$counts = [];
while ($row = $result->fetch_assoc()) {
    $labels[] = $row['when_happen'];
    $counts[] = $row['damage_count'];
}

echo json_encode([
    'when_happen_labels' => $labels,
    'damage_counts' => $counts
]);
?>
