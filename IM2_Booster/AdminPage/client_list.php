<?php
session_start();


// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: ../LLSPage/login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="AdminStyles.css">
    <title>CLIENT LIST | Admin Page</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <img src="../Images/Logo.svg" alt="">
                <h4>Boostify</h4>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class='bx bx-search-alt'></i></label>
            </div>
            <i class="fas fa-bell"></i>
            <div class="user">
                <img src="../Images/user.png" alt="">
            </div>
        </div>        
        <div class="sidebar">
            <ul>
                <li id="clientList">
                    <a href="client_list.php">
                        <i class='bx bxs-user'></i>
                        <div>Client List</div>
                    </a>
                </li>
                <li id="gameList">
                    <a href="game_list.php">
                        <i class='bx bxs-server'></i>
                        <div>Game List</div>
                    </a>
                </li>
                <li id="ratings">
                    <a href="ratings.php">
                        <i class='bx bxs-star-half'></i>
                        <div>Ratings</div>
                    </a>
                </li>
                <li id="transactionHistory">
                    <a href="transaction_history.php">
                        <i class='bx bxs-dollar-circle'></i>
                        <div>Transaction History</div>
                    </a>
                </li>
                <li id="sessions">
                    <a href="sessions.php">
                        <i class='bx bx-history'></i>
                        <div>Sessions</div>
                    </a>
                </li>
                <li id="boosterList">
                    <a href="booster_list.php">
                        <i class='bx bxs-user-rectangle'></i>
                        <div>Booster List</div>
                    </a>
                </li>
                <li id="AdminSignOut" class="SignOut">
                    <a href="../LLSPage/landingPage.php">
                        <i class='bx bx-log-out'></i>
                        <div>Sign Out</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main client-list">
            <h2>CLIENT LIST</h2>
            <table id="ClientTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../LLSPage/connections.php");

                    $sql = "SELECT user_id, username, email FROM users_t";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["user_id"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td><button>Delete</button></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 
    </div>
    <script src="AdminJS.js"></script>
</body>

</html>
