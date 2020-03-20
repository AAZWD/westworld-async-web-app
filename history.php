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
            header("location: history.php");  
        }      
}  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Our History</title>
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
        <div id="slideshow">
                <img id="filler" src="Media/history/1.jpeg">
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
