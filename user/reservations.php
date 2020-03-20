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
		<title>Reservations</title>
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
        <?php
            if (isset($_GET['submit'])) {                 
                $cabin = $_GET['Cabin'];
                $date = $_GET['Dep_Date'];
                $sql = "SELECT * FROM departures WHERE `$cabin` = 'Y' AND Main = '$date'";
                $result = mysqli_query($conn,$sql);
                clearConnection($conn); 
                $count=mysqli_num_rows($result);
                if($count != 1){
                    echo "<strong>The cabin you are attempting to book is unavailable.</strong>"; 
                }else{
                    header('Location:reservationProcess.php?Date='.$_GET['Dep_Date'].'&Destination='.$_GET['Destination'].'&Cabin='.$_GET['Cabin'].'&Diet='.$_GET['Diet'].'&Special='.$_GET['Special'].'');
                }
            }
        ?>
            <img class="headerImg" alt='res header' src='../Media/reservations.jpeg'>
            <div class="resContent">
                <form class="filter" action="" method= "get">
                    <div>
                        <label>Departure Date &nbsp;</label>
                        <select id="Date" name="Date" required>
                            <option value="2025-01-01">January 1 2025</option>
                            <option value="2025-02-01">February 1 2025</option>
                            <option value="2025-03-01">March 1 2025</option>
                            <option value="2025-04-01">April 1 2025</option>
                            <option value="2025-05-01">May 1 2025</option>
                            <option value="2025-06-01">June 1 2025</option>
                            <option value="2025-07-01">July 1 2025</option>
                            <option value="2025-08-01">August 1 2025</option>
                            <option value="2025-09-01">September 1 2025</option>
                            <option value="2025-10-01">October 1 2025</option>
                            <option value="2025-11-01">November 1 2025</option>
                            <option value="2025-12-01">December 1 2025</option>
                        </select>
                    </div>
                    <div>
                        <table>
                            <tr>
                                <td>
                                    <label class="destIn">
                                        <span>Escalante</span><br>
                                        <input class="Destination" type="radio" name="Destination" value="Escalante">
                                        <img src="../Media/locations/escalante.jpeg" alt="escalante">
                                    </label>
                                </td>
                                <td>
                                    <label class="destIn">
                                        <span>Pariah</span><br>
                                        <input class="Destination" required type="radio" name="Destination" value="Pariah">
                                        <img src="../Media/locations/pariah.jpeg" alt="pariah">
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label class="destIn">
                            <span>Las Mudas</span><br>
                            <input class="Destination" type="radio" name="Destination" value="LasMudas">
                            <img src="../Media/locations/lasmudas.jpeg" alt="las mudas">
                        </label>
                                </td>
                                <td>
                                <label class="destIn">
                            <span>Sweetwater</span><br>
                            <input class="Destination" type="radio" name="Destination" value="Sweetwater">
                            <img src="../Media/locations/sweetwater.jpeg" alt="sweetwater">
                        </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>                     
                        <label>Cabin &nbsp;</label>
                        <select name="Cabin" required>
                            <option value="1"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 1){
                                echo "selected";
                                }
                            ?>
                            >Abernathy</option>
                            <option value="2"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 2){
                                echo "selected";
                                }
                            ?>
                            >Armistice</option>
                            <option value="3"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 3){
                                echo "selected";
                                }
                            ?>
                            >Black</option>
                            <option value="4"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 4){
                                echo "selected";
                                }
                            ?>
                            >Escaton</option>
                            <option value="5"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 5){
                                echo "selected";
                                }
                            ?>
                            >Flood</option>
                            <option value="6"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 6){
                                echo "selected";
                                }
                            ?>
                            >Ford</option>
                            <option value="7"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 7){
                                echo "selected";
                                }
                            ?>
                            >Hughes</option>
                            <option value="8"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 8){
                                echo "selected";
                                }
                            ?>
                            >Millay</option>
                            <option value="9"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 9){
                                echo "selected";
                                }
                            ?>
                            >PennyFeather</option>
                            <option value="10"
                            <?php
                                if(!empty($_GET['cabin']) && $_GET['cabin']== 10){
                                echo "selected";
                                }
                            ?>
                            >Stubbs</option>
                        </select>
                    </div>
                    <div>
                        <label>Dietary Restrictions</label><br>
                        <textarea rows="10" cols="70" name="Diet" placeholder="If you have any dietary restrictions, please outline them here"></textarea>
                    </div>
                    <div>
                        <label>Special Requests</label><br>
                        <textarea rows="10" cols="70" name="Special" placeholder="If you have any special requests for your journey, please outline them here"></textarea>
                    </div>
                    <button class="submitButton" type="submit" name="submit">Make Reservation</button>
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
