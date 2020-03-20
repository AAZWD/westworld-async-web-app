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
		<title>Our History</title>
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
			<div id="slideshow">
                <img id="filler" src="../Media/history/1.jpeg">
            </div>
                <div id="historyContent">
                    <span class="historyTitle">Black Ridge Limited</span><br>
                    <p>
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni 
                    dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, 
                    consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                    quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, 
                    nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse 
                    quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla.
                    </p>
                    <span class="historyTitle">The American Frontier</span><br>
                    <p>
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni 
                    dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, 
                    consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                    quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, 
                    nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse 
                    quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla.
                    </p>
                    <span class="historyTitle">Dr. Robert Ford</span><br>
                    <p>
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni 
                    dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, 
                    consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                    quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, 
                    nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse 
                    quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla.
                    </p>
                </div>
		</main>
		<footer>
            <div class="contact">
                <div>CONTACT US</div>        
                    <br>
                    <div>
                    <span id="hideMobile">1 800 555 5555</span>
                    <span id="showMobile"><a href="tel:18005555555">1 800 555 555</a></span>
                    <br>
                    42 Wallaby Way, Sydney, Australia
                    <br>
                    221b Baker St, London, England
                    <br>
                    12 Grimmauld Place, London, England
                    </div>
            </div>    
            <div class="socialMedia">
                <a href="instagram.com"><img src="../Media/ig.png"></a>
                <a href="facebook.com"><img src="../Media/fb.png"></a>
                <a href="twitter.com"><img src="../Media/tw.png"></a>                  
            </div>
            <div class="copyright">
                Copyright &copy; Westworld Management Limited 2025-2055. All copyright and other intellectual property rights in all logos, designs, text, 
                images and other materials on this website are owned by Westworld Management Limited or appear with permission of the relevant owner. 
                'Black Ridge Limited' is a registered trade mark. All rights reserved.        
            </div>
            <div class="references">
                <div id="char">&omicron;</div>
                <div class="icon">
                    Icons made by <a href="https://www.flaticon.com/authors/bogdan-rosu" title="Bogdan Rosu">Bogdan Rosu</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                    <br>
                    Icons made by <a href="https://www.flaticon.com/authors/elegant-themes" title="Elegant Themes">Elegant Themes</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                    <br>
                    Icons made by <a href="https://www.flaticon.com/authors/bogdan-rosu" title="Bogdan Rosu">Bogdan Rosu</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                </div>
            </div>
        </footer>
	</body>
</html>
