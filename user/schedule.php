<?php
    /*Set up*/
    $servername = "localhost";
    $username = "project";
    $password = "project";
    $dbname = "brl";
    // Create connections
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    //clear procedure
    function clearConnection($mysql){
        while($mysql->more_results()){
        $mysql->next_result();
        $mysql->use_result();
        }
    }
    //Start session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Schedule</title>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" href="style.less"/>
    <script src="less.min.js" type="text/javascript"></script>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>                
    <script type="text/javascript" src="animations.js"></script>     
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="cabins.php">Cabins</a></li>  
                <li id="logo">
                    <a id="link" href="index.php"><img src="../Media/logoSimple.png" alt="logo link"></a> 
                </li>                  
                <li><a href="dining.php">Dining</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li class="collapsable"><a href="account.php">Account</a>
                    <ul>
                        <li><a href="reservations.php">Reservations</a></li>                            
                    </ul>
                    <ul>
                        <li><a href="logout.php">Log Out</a></li>                            
                    </ul>
                </li>
            </ul>                    
        </nav>
    </header>
    <main>
        <img class="headerImg" alt='cabin header' src='../Media/schedule.jpeg'>
        <div id="scheduleContent">
            <div id="scheduleTitle">Departure Time</div> 
            <div id="scheduleInfo">
                In accordance to WestWorld policy, the Black Ridge Limited departs from the Central Station the first of every month at 0900 hours.
                Please ensure you are  at the facilities at 0600 hours, to make your reservation.
                <span id="instructions">Select a departure date to obtain the arrival date at your destination.</span>
            </div>
            <input type="text" id="dep" placeholder="YYYY-MM-DD">
            <input type="submit" id="dep-submit">
            <div id="data"></data>
        </div>
        <!--Modal-->
        <div class="modal2">
                <span class="closeModal" title="Close Modal">&times;</span>
                <!--Login Form-->
                <form class="modalContent" action="user/account.php" method="post">
                    <div class="container">
                        <label><b>Username</b></label><br>
                        <input class="inputBox" type="text" placeholder="Enter Username" name="username" required><br>
                    
                        <label><b>Password</b></label><br>
                        <input class="inputBox" type="password" placeholder="Enter Password" name="password" required><br>
                        <button class="submit"type="submit">Login</button>
                        <div><a href="createAccount.php">Don't have an account? Click here</a></div>
                    </div>
                </form>    
            </div>
    </main>
    <footer>
        <div class="contact">
            <div>CONTACT US</div>
            <br>
            <div>
                <span id="hideMobile">1 800 555 5555</span>
                <span id="showMobile"><a href="tel:18005555555">1 800 555 555</a></span>
                <br> 42 Wallaby Way, Sydney, Australia
                <br> 221b Baker St, London, England
                <br> 12 Grimmauld Place, London, England
            </div>
        </div>
        <div class="socialMedia">
            <a href="instagram.com"><img src="../Media/ig.png"></a>
            <a href="facebook.com"><img src="../Media/fb.png"></a>
            <a href="twitter.com"><img src="../Media/tw.png"></a>
        </div>
        <div class="copyright">
            Copyright &copy; Westworld Management Limited 2025-2055. All copyright and other intellectual property rights in all logos,
            designs, text, images and other materials on this website are owned by Westworld Management Limited or appear
            with permission of the relevant owner. 'Black Ridge Limited' is a registered trade mark. All rights reserved.
        </div>
        <div class="references">
            <div id="char">&omicron;</div>
            <div class="icon">
                Icons made by <a href="https://www.flaticon.com/authors/bogdan-rosu" title="Bogdan Rosu">Bogdan Rosu</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                <br> Icons made by <a href="https://www.flaticon.com/authors/elegant-themes" title="Elegant Themes">Elegant Themes</a>from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                <br> Icons made by <a href="https://www.flaticon.com/authors/bogdan-rosu" title="Bogdan Rosu">Bogdan Rosu</a>from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
            </div>
        </div>
    </footer>
</body>
</html>