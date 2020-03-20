<?php
if(isset($_POST['dep']) && empty($_POST['dep']) == false ){
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
        $sql = "SELECT * FROM departures WHERE Main= '" .trim($_POST['dep'])."'";
        $result = mysqli_query($conn,$sql);
        clearConnection($conn);        
        $count = mysqli_num_rows($result);
        
        if($count == 1){
            while ($row = mysqli_fetch_assoc($result)){
                echo"Departing From The Central Station: ". $row['Main'];
                echo" +    Arriving At Escalante On: ".$row['Escalante'];
                echo" +    Arriving At Pariah On: ".$row['Pariah'];
                echo" +    Arriving At Las Mudas On: ".$row['LasMudas'];
                echo" +    Arriving At Sweetwater On: ".$row['Sweetwater'];
            }
        }else{
            echo"There are no departures on that date. As of the year 2025, the Black Ridge Limited departs only on the first of the month.";
        }
        
}
?>