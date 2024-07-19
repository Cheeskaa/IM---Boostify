<?php
include("../LLSPage/connections.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $game_type = $_POST['game_type'];

    $sql = "UPDATE games_t SET game_name='$game_name', game_type='$game_type' WHERE game_id=$game_id";

    if ($conn->query($sql) === TRUE) {
        echo "Game updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: game_list.php");
    exit();
}
?>
