<?php

class UpdateData {

    function updateUser() {
        
        include('DBCredentials.php');
        
        $userid = $_GET['id'];
        $username = $_POST['user'];
        $fullname = $_POST['fullname'];
        $photo = $_POST['photo'];
        $companyAddress = $_POST['companyAddress'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $birthday = $_POST['birthday'];
        $fra = $_POST['favRestaurantAddress'];
        
        
        $sql = "UPDATE clients SET 
        username='" . $username . "', fullname='" . $fullname . "', photo='" . $photo . "', companyAddress= '" . $companyAddress . "', 
        phone= '" . $phone . "', 
        email= '" . $email . "', 
        website= '" . $website . "', 
        birthday= '" . $birthday . "', 
        favRestaurantAddress= '" . $fra . "' 
        WHERE userid='" . $userid . "';";
        
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        

        header('Location: ?action=dashboard');
    
    }

}

?>