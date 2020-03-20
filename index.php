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
if($_SERVER["REQUEST_METHOD"] == "POST") {      
    $accountUsername = $_POST['username'];
    $accountPassword = $_POST['password']; 

        $sql = "SELECT Username, Password, Email FROM user_account WHERE Username = '$accountUsername'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        clearConnection($conn); 

        if($result->num_rows == 1 && ($accountUsername == $row['Username'] && $accountPassword == $row['Password'])){
            $_SESSION['user'] = $accountUsername;
            $_SESSION['email'] = $row['Email'];
            header("location: user/account.php");  
        }else{
            header("location: index.php");  
        }      
}                     
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Black Ridge Limited</title>
        <meta charset="utf-8">
        <link rel="stylesheet/less" type="text/css" href="mainStyle.less">
        <script src="less.min.js" type="text/javascript"></script>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>                
        <script type="text/javascript" src="animations.js"></script>        
	</head>
	<body>
        <video autoplay loop>
            <source src="media/wildwest.mp4" type='video/mp4'>
        </video>
        <div id="logo">
            <img src="Media/logo.png" alt="logo center">
        </div>
        <div class="blurb">
            The Black Ridge Limited is your first  ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia.
        </div>
        <div class=mainMenu>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="cabins.php">Cabins</a></li>
                <li><a href="dining.php">Dining</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li class="login">Account</li>
            </ul>
        </div>
        <div id="open" onclick="openSideNav()">&#9776;</div>            
        <div id="sideMenu">
            <a href="javascript:void(0)" id="close" onclick="closeSideNav()">&times;</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="cabins.php">Cabins</a></li>
                <li><a href="dining.php">Dining</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li class="login">Account</li>
            </ul>
        </div>
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
                    <button class="submit"type="submit">Login</button>
                    <div><a href="createAccount.php">Don't have an account? Click here</a></div>
                </div>
            </form>    
        </div>
	</body>
</html>
