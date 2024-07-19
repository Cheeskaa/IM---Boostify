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
    <title>GAME LIST | Admin Page</title>
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
                <!-- <li id="help">
                    <a href="help.html">
                        <i class='bx bxs-help-circle'></i>
                        <div>Help</div>
                    </a>
                </li> -->
            </ul>
        </div>
        <div class="main gamelist">
            <h2>GAME LIST</h2>
            <h3>Add Game</h3>
            <form id="gameForm" method="POST" action="add.php">
                <input type="text" name="gameName" id="gameName" placeholder="Game Name" required>
                <input type="text" name="gameType" id="gameType" placeholder="Game Type" required>
                 <button type="submit">Add Game</button>
            </form>


            <table id="gameTable">
                <thead>
                    <tr>
                        <th>GAME ID</th>
                        <th>NAME</th>
                        <th>GAME TYPE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                    include("../LLSPage/connections.php");

                    $sql = "SELECT * FROM games_t";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }
                    ?> -->
                    <?php
                    include("../LLSPage/connections.php");

                    $sql = "SELECT * FROM games_t";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["game_id"] . "</td>
                    <td>" . $row["game_name"] . "</td>
                    <td>" . $row["game_type"] . "</td>
                    <td>
                    <form method='post' action='delete_game.php'>
                    <input type='hidden' name='game_id' value='" . $row["game_id"] . "'>
                    <button type='submit'>Delete</button>
                </form>
            </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No games found</td></tr>";
    }
    ?>
                </tbody>
            </table>
        </div> 
    </div>
    <script src="AdminJS.js"></script>
</body>

</html>
