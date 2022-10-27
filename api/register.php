<?php      
    include('connection.php');  
    $username = $_POST['User'];  
    $password = $_POST['Pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        
        $sql = "select * from logindetails where userId = '$username'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            echo "<h1><center> User already exists! </center></h1>";  
        }  
        else{  
            $sql2 = "insert into logindetails (userId,password) values ('$username','$password')";
            $result = mysqli_query($con, $sql2);  
            echo "<h1> Sign up successful.</h1>";
        }     
?>  