<?php
// Function to register a new user
function registerUser($username, $email, $password, $conn) {
    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into users_t table
    $sql = "INSERT INTO users_t (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    
    if ($conn->query($sql) === TRUE) {
        return true; // Registration successful
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false; // Registration failed
    }
}

// Function to check if a user exists in the database for login
function loginUser($username, $password, $conn) {
    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL queries to fetch user data based on username in each table
    $user_sql = "SELECT * FROM users_t WHERE username='$username'";
    $admin_sql = "SELECT * FROM admins_t WHERE username='$username'";
    $booster_sql = "SELECT * FROM boosters_t WHERE username='$username'";

    // Execute queries
    $user_result = $conn->query($user_sql);
    $admin_result = $conn->query($admin_sql);
    $booster_result = $conn->query($booster_sql);

    // Check which table has the user
    if ($user_result->num_rows == 1) {
        $user = $user_result->fetch_assoc();
        $hashed_password = $user['password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            return 'user'; // Return role as 'user'
        } else {
            return 'invalid_password';
        }
    } elseif ($admin_result->num_rows == 1) {
        $admin = $admin_result->fetch_assoc();
        $hashed_password = $admin['password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            return 'admin'; // Return role as 'admin'
        } else {
            return 'invalid_password';
        }
    } elseif ($booster_result->num_rows == 1) {
        $booster = $booster_result->fetch_assoc();
        $hashed_password = $booster['password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            return 'booster'; // Return role as 'booster'
        } else {
            return 'invalid_password';
        }
    } else {
        return 'user_not_found'; // User not found in any table
    }
}


?>