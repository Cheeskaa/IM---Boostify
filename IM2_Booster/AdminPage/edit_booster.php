<?php
include("../LLSPage/connections.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booster_id = $_POST["booster_id"];

    $sql = "DELETE FROM boosters_t WHERE booster_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $booster_id);

    if ($stmt->execute()) {
        header("Location: booster_list.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
