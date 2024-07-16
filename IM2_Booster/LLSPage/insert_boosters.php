<?php
require 'connections.php'; // Ensure this path is correct

$boosters = [
    ['username' => 'booster1', 'email' => 'booster1@gmail.com', 'password' => 'booster1', 'expertise' => 'Valorant'],
    ['username' => 'booster2', 'email' => 'booster2@gmail.com', 'password' => 'booster2', 'expertise' => 'Dota 2'],
    ['username' => 'booster3', 'email' => 'booster3@gmail.com', 'password' => 'booster3', 'expertise' => 'Genshin Impact'],
    ['username' => 'booster4', 'email' => 'booster4@gmail.com', 'password' => 'booster4', 'expertise' => 'Counter Strike 2'],
    ['username' => 'booster5', 'email' => 'booster5@gmail.com', 'password' => 'booster5', 'expertise' => 'Mobile Legends'],
    ['username' => 'booster6', 'email' => 'booster6@gmail.com', 'password' => 'booster6', 'expertise' => 'League of Legends'],
    ['username' => 'booster7', 'email' => 'booster7@gmail.com', 'password' => 'booster7', 'expertise' => 'Apex Legends'],
];

foreach ($boosters as $booster) {
    $username = mysqli_real_escape_string($conn, $booster['username']);
    $email = mysqli_real_escape_string($conn, $booster['email']);
    $password = mysqli_real_escape_string($conn, $booster['password']);
    $expertise = mysqli_real_escape_string($conn, $booster['expertise']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO boosters_t (username, email, password, expertise, rating) 
            VALUES ('$username', '$email', '$hashed_password', '$expertise', 5.0)";
    if ($conn->query($sql) === TRUE) {
        echo "Booster $username inserted successfully.<br>";
    } else {
        echo "Error inserting $username: " . $conn->error . "<br>";
    }
}

$conn->close();
?>
