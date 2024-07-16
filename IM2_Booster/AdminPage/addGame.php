<?php
include("../LLSPage/connections.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game_name = $_POST['game_name'];
    $game_type = $_POST['game_type'];

    $sql = "INSERT INTO games_t (game_name, game_type) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $game_name, $game_type);

    if ($stmt->execute()) {
        echo "Game added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
