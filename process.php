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
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Log In</title>
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
            <?php
                $Username=$_POST['Username'];
                $Password=$_POST['Password'];
                $Email=$_POST['Email'];

                mysqli_query($conn,"INSERT INTO user_account (Username, Password, Email)
                VALUES ('$Username','$Password','$Email')");
                                
                if(mysqli_affected_rows($conn) > 0){
                    header('Location: index.php');
                }else{
                    echo "<div class='error'>
                            This account already exists. <a href='index.php'>Try again</a> with a different username.
                        </div>
                        <img src='Media/error.jpg' alt='error' id='errorImg'>";
                }
            ?>
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
