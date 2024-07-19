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
    <title>TRANSACTION HISTORY | Admin Page</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <img src="/Images/Logo.svg" alt="">
                <h4>Boostify</h4>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class='bx bx-search-alt'></i></label>
            </div>
            <i class="fas fa-bell"></i>
            <div class="user">
                <img src="/Images/user.png" alt="">
            </div>
        </div>        
        <div class="sidebar">
            <ul>
                <li id="bhome">
                    <a href="bhome.php">
                        <i class='bx bxs-user'></i>
                        <div>Home</div>
                    </a>
                </li>
                <li id="orderreq">
                    <a href="orderreq.php">
                        <i class='bx bxs-server'></i>
                        <div>Order Requests</div>
                    </a>
                </li>
                    <li id="earnings">
                    <a href="earnings.php">
                        <i class='bx bxs-dollar-circle'></i>
                        <div>Earnings</div>
                    </a>
                </li>
                <li id="ratings">
                    <a href="ratings.php">
                        <i class='bx bxs-star-half'></i>
                        <div>Ratings</div>
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
        <div class="main transaction-history">
            <h2>EARNINGS</h2>
            <table id="THTable">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>SESSION ID</th>
                        <th>CLIENT ID</th>
                        <th>PURCHASE</th>
                        <th>PAYMENT METHOD</th>
                        <th>TOTAL PROFIT</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be inserted here dynamically -->
                </tbody>
            </table>
        </div> 
    </div>
    <script src="AdminJS.js"></script>
</body>

</html>
