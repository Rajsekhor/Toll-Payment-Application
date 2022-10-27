<?php      
    include('connection.php');  
    $username = $_POST['user'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $username = mysqli_real_escape_string($con, $username);  
        
        $sql = "select balance from logindetails where userId = '$username'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            $current_balance = $row["balance"];
            if($current_balance >= 150){
                $current_balance = $current_balance - 150;
                $sql2 = "UPDATE logindetails set balance='$current_balance' where userId='$username'";
                $result = mysqli_query($con, $sql2);  
                echo "<h1>Balance updated! New balance is: '$current_balance'</h1>";
            }
            else{
                echo "<h1>Insufficient balance!</h1>";
            }
        }  
        else{  
            echo "<h1><center> Error! User does not exist! </center></h1>";  
        }     
?>  