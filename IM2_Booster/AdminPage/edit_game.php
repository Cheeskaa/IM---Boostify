<?php
include("../LLSPage/connections.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $game_type = $_POST['game_type'];

    $sql = "UPDATE games_t SET game_name = ?, game_type = ? WHERE game_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $game_name, $game_type, $game_id);

    if ($stmt->execute()) {
        echo "Game updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
