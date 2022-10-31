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
                $pdf_file_path = '../view/new_ticket.html';
                header('Location: '.$pdf_file_path) and exit; 
            }
            else{
                $pdf_file_path = '../view/error.html';
                header('Location: '.$pdf_file_path) and exit; 
            }
        }  
        else{  
            $pdf_file_path = '../view/error.html';
            header('Location: '.$pdf_file_path) and exit; 
        }     
?>  