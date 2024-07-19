<?php
include("../LLSPage/connections.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $game_id = $_POST['game_id'];

    $sql = "DELETE FROM games_t WHERE game_id = $game_id";

    if ($conn->query($sql) === TRUE) {
        echo "Game deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: game_list.php");
    exit();
}
?>
