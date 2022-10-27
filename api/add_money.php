<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $balance = $_POST['balance'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $balance = stripcslashes($balance);  
        $username = mysqli_real_escape_string($con, $username);  
        $balance = mysqli_real_escape_string($con, $balance);  
        
        $sql = "select balance from logindetails where userId = '$username'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            $current_balance = $row["balance"];
            $current_balance = $current_balance + $balance;

            $sql2 = "UPDATE logindetails set balance='$current_balance' where username='$username'";
            $result = mysqli_query($con, $sql2);  
            echo "<h1>Balance updated! New balance is: '$current_balance'</h1>";
        }  
        else{  
            echo "<h1><center> Error! User does not exist! </center></h1>";  
        }     
?>  