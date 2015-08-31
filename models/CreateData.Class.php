<?php

class CreateData {

    function createrecord() {
    
        if ($_POST['password'] != null && $_POST['user'] != null) {
        
            function makeArray() {

                $salt = 'SuperYanely\'sSaltHash';
                $epass = md5($_POST['password'] . $salt);
                $euser = $_POST['user'];

                return array('User Name' => $euser, 'Hashed Password' => $epass);

            }

            echo "<h2>Congratulations!</h2> Your membership account sign-up was successful";
            echo "<table width=100% align=left border=0><tr><td>";

            $data = makeArray();

            foreach ($data as $attribute => $data) {
                echo "<p align=left><font color = #ff4136>{$attribute}</font>: {$data}";
            }
            
            $tmp_file = $_FILES['photofile']['tmp_name'];
            $target_file = basename($_FILES['photofile']['name']);
            $upload_dir = "uploads";

            if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
                echo "<br>File uploaded successfully.";
                echo "<br><br>Your photo Photo: " . $target_file;
                echo "<br><a href=\"?action=profile\"><img src=\"uploads/" . $target_file . "\" class=\"left userPhoto\" width=\"200\"/></a><br>";
            } else {
                echo "<br><br>No Photo uploaded";
            }

            echo "<br><a href='?action=home'>Please try logging in Now!</a>";
            echo "</td></tr></table>";
            
            include ('DBCredentials.php');
            $salt = 'SuperYanely\'sSaltHash';
            $epass = md5($_POST['password'] . $salt);
            $euser = $_POST['user'];

            $stmt = $dbh->prepare("insert into clients (username, password, fullname, photo, companyAddress, phone, email, website, birthday, favRestaurantAddress) values(:username, :password, :fullname, :photo, :companyAddress, :phone, :email, :website, :birthday, :favRestaurantAddress)");
            $stmt->bindParam(':username', $euser);
            $stmt->bindParam(':password', $epass);
            $stmt->bindParam(':fullname', $_POST['fullname']);
            $stmt->bindParam(':photo', $target_file);
            $stmt->bindParam(':companyAddress', $_POST['companyAddress']);
            $stmt->bindParam(':phone', $_POST['phone']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':website', $_POST['website']);
            $stmt->bindParam(':birthday', $_POST['birthday']);
            $stmt->bindParam(':favRestaurantAddress', $_POST['favRestaurantAddress']);
            $stmt->execute();
        } else {
            echo "Sorry, you must submit ALL registration fields to proceed.<br>";
            echo "<a href='?action=home'>Try again?</a><br>";
        }
    }
}


?>