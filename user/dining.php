<?php
//Start session
session_start();
/*Citation:
1BestCsharp (2017) Php How To Filter Data In Html Table Using Php And MySQL [Computer program]. 
Available at http://1bestcsharp.blogspot.ca/2015/10/php-html-table-search-filter-data-mysql-database.html 
(Accessed 17 November 2017)*/
$result='';
if(isset($_POST['search'])){
        $amen=$_POST['Amen'];
        $type=$_POST['Type'];   
        $vac=$_POST['Vacancy'];
        if ($type == 'All' && $vac == 'All' && $amen == 'All'){
            $sql = "SELECT * FROM cabins";
            $result = filterTable($sql);
        }else{                          
            $count=0;     
            $sql = "SELECT * FROM cabins WHERE";
            if($type != 'All'){
                $count++;
                $sql=$sql. " TYPE = '" .$type. "'";
            }
            if($amen!= 'All'){
                if($count !=0){
                    $sql=$sql. " AND Amenities = '" .$amen. "'";                
                }else{
                    $sql=$sql. " Amenities = '" .$amen. "'";
                }
                $count++;                
            }
            if($vac!= 'All'){
                if($count !=0){
                    $sql=$sql. " AND Vacant = '" .$vac. "'";                
                }else{
                    $sql=$sql. " Vacant = '" .$vac. "'";
                }                
            }

            //echo $sql;
            $result = filterTable($sql);
        }        
}else {
    $sql = "SELECT * FROM cabins";
    $result = filterTable($sql);
}
                
// function to connect and execute the query
function filterTable($sql){
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

    $filterResult = mysqli_query($conn, $sql);
    return $filterResult;
}              
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dining</title>
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
            <img class="headerImg" alt='dining header' src='../Media/dining/header.jpeg'>
            <div class="cabinDiningIntro">
                <h2>A culinary experince that complements your westward adventures</h2>
                <h4>
                    Let us provide a unique dining experience as you journey past the Appalachians. Our culinary team is skilled in ut 
                    enim ad minima veniam nostrum exercitationem ullam. Corporis suscipit laboriosam, nisi ut aliquid ex ea.  
                </h4>
            </div>
            <div class="dining">
                <button class="book">Make a reservation to visit our dining car</button> 
                <div class='diningBack'>
                    <div class='diningInfo'>
                        <h3>The Dining Car</h3>
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores 
                            eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, 
                            consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                            quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem.
                        </p>
                    </div>
                </div>
                <div class='diningBack'>
                    <div class='diningInfo'>
                        <h3>Dining Options</h3>
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores 
                            eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, 
                            consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                            quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem.
                        </p>
                    </div>
                </div>
                <div class='diningBack'>
                    <div class='diningInfo'>
                        <h3>Meals and Menus</h3>
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores 
                            eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, 
                            consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                            quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem.
                        </p>
                    </div>
                </div>
                <div class='diningBack'>
                    <div class='diningInfo'>
                        <h3>Special Diets</h3>
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores 
                            eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, 
                            consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                            quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem.
                        </p>
                    </div>
                </div>
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
