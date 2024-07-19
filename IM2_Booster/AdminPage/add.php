<?php
include("../LLSPage/connections.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gameName = $_POST['gameName'];
    $gameType = $_POST['gameType'];

    $sql = "INSERT INTO games_t (game_name, game_type) VALUES ('$gameName', '$gameType')";

    if ($conn->query($sql) === TRUE) {
        echo "New game added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: game_list.php");
    exit();
}
?>
