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
    <title>BOOSTER LIST | Admin Page</title>
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
        <div class="main booster-list">
            <h2>BOOSTER LIST</h2>
            <table id="BoosterTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>RATING</th>
                        <th>EXPERTISE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include("../LLSPage/connections.php");

                    $sql = "SELECT booster_id, username, email, expertise, rating FROM boosters_t";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["booster_id"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["rating"] . "</td>
                        <td>" . $row["expertise"] . "</td>
                        <td>
                            <form method='post' action='delete_booster.php' style='display:inline-block;'>
                                <input type='hidden' name='booster_id' value='" . $row["booster_id"] . "'>
                                <button type='submit'>Delete</button>
                            </form>
                            <button onclick='openEditForm(" . $row["booster_id"] . ", \"" . $row["username"] . "\", \"" . $row["email"] . "\", \"" . $row["rating"] . "\", \"" . $row["expertise"] . "\")'>Edit</button>
                        </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div id="editFormContainer" style="display:none;">
                <h3>Edit Booster</h3>
                <form id="editBoosterForm" method="POST" action="edit_booster.php">
                    <input type="hidden" name="booster_id" id="editBoosterId">
                    <input type="text" name="username" id="editUsername" placeholder="Username" required>
                    <input type="email" name="email" id="editEmail" placeholder="Email" required>
                    <input type="text" name="rating" id="editRating" placeholder="Rating" required>
                    <input type="text" name="expertise" id="editExpertise" placeholder="Expertise" required>
                    <button type="submit">Update Booster</button>
                    <button type="button" onclick="closeEditForm()">Cancel</button>
                </form>
            </div>
        </div> 
    </div>
    <script>
        function openEditForm(id, username, email, rating, expertise) {
            document.getElementById('editBoosterId').value = id;
            document.getElementById('editUsername').value = username;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRating').value = rating;
            document.getElementById('editExpertise').value = expertise;
            document.getElementById('editFormContainer').style.display = 'block';
        }

        function closeEditForm() {
            document.getElementById('editFormContainer').style.display = 'none';
        }
    </script>
</body>
</html>
