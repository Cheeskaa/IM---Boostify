<?php
include("../LLSPage/connections.php");

$sql = "SELECT * FROM games_t";
$result = $conn->query($sql);

$games = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $games[] = $row;
    }
}

echo json_encode($games);

$conn->close();
?>
