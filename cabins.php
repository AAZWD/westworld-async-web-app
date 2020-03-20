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
if(isset($_POST['acc'])){
        $accountUsername = $_POST['username'];
        $accountPassword = $_POST['password']; 

            $sql = "SELECT Username, Password, Email FROM user_account WHERE Username = '$accountUsername'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            clearConnection($conn); 
            echo $sql;
            if($result->num_rows == 1 && ($accountUsername == $row['Username'] && $accountPassword == $row['Password'])){
                $_SESSION['user'] = $accountUsername;
                $_SESSION['email'] = $row['Email'];
                header("location: user/account.php");  
            }else{
                header("location: cabins.php");  
            }      
}     
if(isset($_POST['res'])){
    $accountUsername = $_POST['username'];
    $accountPassword = $_POST['password']; 

        $sql = "SELECT Username, Password, Email FROM user_account WHERE Username = '$accountUsername'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        clearConnection($conn); 
        echo $sql;
        if($result->num_rows == 1 && ($accountUsername == $row['Username'] && $accountPassword == $row['Password'])){
            $_SESSION['user'] = $accountUsername;
            $_SESSION['email'] = $row['Email'];
            header("location: user/reservations.php");  
        }else{
            header("location: cabins.php");  
        }      
}                  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cabins</title>
        <meta charset="utf-8">
        <link rel="stylesheet/less" type="text/css" href="style.less">
        <script src="less.min.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>                
        <script type="text/javascript" src="animations.js"></script>     
    </head>
	<body>
        <?php
        //Twig template #1
        require_once './vendor/autoload.php';
        $loader = new Twig_Loader_Filesystem('./templates');

        $twig = new Twig_Environment($loader);

        $template = $twig->load('nav.html');
    
        echo $template->render(array('link1' => array('index.php', 'history.php', 'cabins.php'),
                                    'name1' => array('Home', 'History', 'Cabins'),
                                    'link2' => array('dining.php', 'schedule.php'),
                                    'name2' => array('Dining', 'Schedule')));
        ?>
		<main>
            <img class="headerImg" alt='cabin header' src='Media/cabins/header.jpeg'>
            <div class="cabinDiningIntro">
                <h2>Your journey into the greatest frontier begins here</h2>
                <h4>
                    As with the entirety of the Black Ridge Limited, our cabins' 18th century decor has been carefully restored,
                    ut enim ad minima veniam. Quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                    commodi consequatur.  
                </h4>
                <h3>Each of our cabins include</h3>
                <ul>
                    <li>An old thing</li>
                    <li>An old thing</li>
                    <li>An old thing</li>
                    <li>An old thing</li>
                    <li>A new thing</li>
                    <li>A new thing</li>
                    <li>A new thing</li>
                    <li>A new thing</li>
                    <li>An expensive thing</li>
                    <li>An expensive thing</li>
                    <li>An expensive thing</li>
                    <li>An expensive thing</li>
                </ul>
            </div>
            <button class="book">Make a reservation to book a cabin</button> 
            <form action="cabins.php" method="post" class="filter">    
                    
                    <select name="Type">
                        <option value="All">Type&nbsp;</option>
                        <option value="All">All</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Twin">Twin</option> 
                    </select>

                    <select name="Vacancy">
                        <option value="All">Availability&nbsp;</option>
                        <option value="All">All</option>
                        <option value="Y">Available</option>
                        <option value="N">Not Available</option>
                    </select>
                    
                    <select name="Amen">
                        <option value="All">Amenities&nbsp;</option>
                        <option value="All">All</option>
                        <option value="Modern">Modern</option>
                        <option value="Immersive">Immersive</option>
                    </select>
                
                <button class="submit" type="submit" name="search">Search</button>  
            </form>
            <?php
            
            if(mysqli_num_rows($result)==0){
                echo"<div class='error'>We don't have the cabins you are looking for. Try a different search.</div>";
            }                
            while ($row = mysqli_fetch_array($result)){
                echo "<div class='selections'>";
                    echo "<span id='name'>" .$row['Name']. "</span><br>"; //should be in western font
                    echo "<input class='option' type='image' src = 'Media/cabins/".$row['ID'].".jpg'alt='cabin'>
                    <div class='details'>";
                        echo "<div id='description'>" .$row['Description']. "</div>";
                        echo "Amenities:&nbsp;";
                        if($row['Amenities']=='Modern'){
                            echo"The latter-day explorer need not fret! The " .$row['Name']. " is outfitted with the latest modern ammenities to ease your
                            transition into the Sweetwater experience.";
                        }else{
                            echo"In keeping with the wild-west spirirt, the " .$row['Name']. " is designed with the immersive Sweetwater experience in mind. Please be 
                            advised that the extreme authenticity of amenities have been adhered to.";
                        }
                        if($row['Vacant'] == 'Y'){
                            echo"<br><span id='vac'>Next Departure: Available</span>";
                        }else{
                            echo"<br><span id='vac'>Next Departure: Reserved</span>";
                        }
                    echo"</div>";                    
                echo "</div>";
            }
            
            ?>
            <!--Modal-->
            <div class="modal">
                <span class="closeModal" title="Close Modal">&times;</span>
                <!--Login Form-->
                <form class="modalContent" action="" method="post">
                    <div class="container">
                        <label><b>Username</b></label><br>
                        <input class="inputBox" type="text" placeholder="Enter Username" name="username" required><br>
                    
                        <label><b>Password</b></label><br>
                        <input class="inputBox" type="password" placeholder="Enter Password" name="password" required><br>
                        <button class="submit" type="submit" name="res">Login</button>
                        <div><a href="createAccount.php">Don't have an account? Click here</a></div>
                    </div>
                </form>    
            </div>
            <!--Modal-->
            <div class="modal2">
                <span class="closeModal" title="Close Modal">&times;</span>
                <!--Login Form-->
                <form class="modalContent" action="" method="post">
                    <div class="container">
                        <label><b>Username</b></label><br>
                        <input class="inputBox" type="text" placeholder="Enter Username" name="username" required><br>
                    
                        <label><b>Password</b></label><br>
                        <input class="inputBox" type="password" placeholder="Enter Password" name="password" required><br>
                        <button class="submit"type="submit" name="acc">Login</button>
                        <div><a href="createAccount.php">Don't have an account? Click here</a></div>
                    </div>
                </form>    
            </div>
        </main>
            <?php
            //Twig template #2
            require_once './vendor/autoload.php';
            $loader = new Twig_Loader_Filesystem('./templates');
        
            $twig = new Twig_Environment($loader);
        
            $template = $twig->load('footer.html');
        
            echo $template->render(array('locations' => array('42 Wallaby Way, Sydney, Australia', '221b Baker St, London, England', '12 Grimmauld Place, London, England'),
                                        'media' => array('https://www.instagram.com', 'https://www.facebook.com', 'https://www.twitter.com'),
                                    'icon' => array('Media/ig.png', 'Media/fb.png', 'Media/tw.png'),
                                    'copy' => 'Copyright Westworld Management Limited 2025-2055. All copyright and other intellectual property rights in all logos,
                                    designs, text, images and other materials on this website are owned by Westworld Management Limited or appear
                                    with permission of the relevant owner. \'Black Ridge Limited\' is a registered trade mark. All rights reserved.',
                                    'madeBy' => array('https://www.flaticon.com/authors/bogdan-rosu', 'https://www.flaticon.com/authors/elegant-themes', 'https://www.flaticon.com/authors/bogdan-rosu'),
                                    'from' => 'https://www.flaticon.com/',
                                    'lic' => 'http://creativecommons.org/licenses/by/3.0/',
                                    'name' => array('Bogdan Rosu', 'Elegant Themes', 'Bogdan Rosu')));
        ?>
	</body>
</html>
