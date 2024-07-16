<?php
// Include your database connection file
include("connections.php");

$username = 'admin';
$email = 'admin@gmail.com';
$password = 'admin'; // Plain text password for hashing

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Construct SQL query
$sql = "INSERT INTO admins_t (username, email, password) 
        VALUES ('$username', '$email', '$hashed_password')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Admin record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection (though usually not necessary if connections.php handles this)
$conn->close();
?>
