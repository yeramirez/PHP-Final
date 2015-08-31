<?php

class ReadData {

    function ReadDisplayAllRecords() {
    
        include ('DBCredentials.php');
        
        $stmt = $dbh->prepare('SELECT * FROM clients order by userId ASC;');
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        
        if (isset($_SESSION['user_id'])) {
            echo 'Dashboard not available.';
        } else {
        
            foreach ($result as $row) {
                echo '<tr><td>' . $row['userId'] . '</td><td>' . $row['username'] . '</td><td>' .
                    $row['password'] . '</td><td>' . $row['fullname'] . '</td><td>' . $row['photo'] . 
                    '</td><td>' . $row['companyAddress'] . '</td><td>' . $row['phone'] . 
                    '</td><td>' . $row['email'] . '</td><td>' . $row['website'] . 
                    '</td><td>' . $row['birthday'] . '</td><td>' . $row['favRestaurantAddress'] . 
                    '</td><td><a href="?action=deleteForm&id=' . $row['userId'] . 
                    '">Delete</a></td><td><a href="?action=updateForm&id=' . $row['userId'] . '">Update</a></td>';
            }
            echo "</tr></table>";
        } 
    }
}

?>