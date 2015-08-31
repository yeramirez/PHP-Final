<?php

class DeleteData {

    function deleteUserNow() {
        
        include('DBCredentials.php');
        
        $userid = $_GET['id'];
        $stmt = $dbh->prepare("DELETE FROM clients where userid IN (:userid)");
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();
    
    }
    
}

?>