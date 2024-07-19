<?php
include("../LLSPage/connections.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];

    $sql = "DELETE FROM games_t WHERE game_id = $game_id";

    if ($conn->query($sql) === TRUE) {
        echo ("Game deleted successfully");
      // You can redirect or refresh the page after deleting the game if needed
    } else {
        echo "Error deleting game: " . $conn->error;
    }
}
?>
