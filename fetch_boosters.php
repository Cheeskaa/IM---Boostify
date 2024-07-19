<?php
include("LLSPage/connections.php");

$sql = "SELECT booster_id, username, email, expertise, rating FROM boosters_t";
$result = $conn->query($sql);

$boosters = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $boosters[] = $row;
    }
}

echo json_encode($boosters);

$conn->close();
?>
