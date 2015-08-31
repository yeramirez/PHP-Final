<?php

class Login {
    
    function loginUser() {
    
        include('DBCredentials.php');
        
        $adminUser = 'admin';
        $adminPass = 'admin';
        
        if ($_POST['username_li'] == $adminUser && $_POST['password_li'] == $adminPass) {
            
            header ('Location: ?action=dashboard');
            
        } else if ($_POST['username_li'] != null && $_POST['password_li'] != null) {
        
            $salt = 'SuperYanely\'sSaltHash';
            $usernameInput = $_POST['username_li'];
            $passwordInput = md5($_POST['password_li'] . $salt);
            
            $sth = $dbh->prepare("select userid, username, password, fullname, photo, birthday, companyAddress, phone, email, website, favRestaurantAddress from clients where username = :username and password = :password");
            $sth->bindParam(':username', $usernameInput);
            $sth->bindParam(':password', $passwordInput);
            $sth->execute();
            $result = $sth->fetchAll();

            if (isset($result[0]['userid'])) {

                $user_id = $result[0]['userid'];
                $fullname = $result[0]['fullname'];
                $photofile = $result[0]['photo'];
                $birthday = $result[0]['birthday'];
                $compAddress = $result[0]['companyAddress'];
                $phoneNumber = $result[0]['phone'];
                $email = $result[0]['email'];
                $website = $result[0]['website'];
                $favRestaurantAddress = $result[0]['favRestaurantAddress'];
                

                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $usernameInput;
                $_SESSION['pass_word'] = $passwordInput;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['photo_file'] = $photofile;
                $_SESSION['birthday'] = $birthday;
                $_SESSION['companyAddress'] = $compAddress;
                $_SESSION['phone'] = $phoneNumber;
                $_SESSION['email'] = $email;
                $_SESSION['website'] = $website;
                $_SESSION['favRestaurantAddress'] = $favRestaurantAddress;
                    
                echo 'Session Check: You are now logged in<br><br>';


                echo 'Congrats! You have successfully logged in.<br>';
                echo "<a href='?action=logoutUser'>Logout</a>&nbsp;|&nbsp;";
                echo "<a href='?action=dashboard'>Dashboard</a>&nbsp;|&nbsp;<br>";
                echo "<a href='?action=profile'>Profile</a>&nbsp;|&nbsp;<br>";
                
                
                foreach ($result as $row) {
                    $sth = $dbh->prepare("select * from clients where userid = :userid");
                    $sth->bindParam(':userid', $row['userid']);
                    $sth->execute();
                    $result = $sth->fetchAll();

                    echo "<p>";
                    $userid = $row['userid'];
                    
                    //foreach ($result as $row) {
                    $photo = $row['photo'];
                    $username = $row['username'];
                    $birthday = $row['birthday'];
                    //}

                    if (!empty($photo)) {
                        echo "<br><a href=\"?action=profile\"><img src=\"uploads/" . $photo . "\" class=\"left userPhoto\" width=\"200\"/></a><br>";
                    } else {
                        echo "photo status: You did not provide an photo photo during sign-up.";
                    }

                    echo "</p>";
                    echo "<ul>
                            <li>Your User ID is: {$userid}</li>
                            <li>Your Username is: {$username}</li>
                            <li>Your Photo Name is: {$photo}</li>
                            <li>Your Birthday is: {$birthday}</li>
                        </ul>";
                };
                
            } else {
                echo "So sorry - your login failed!<br>The user name or password is incorrect. Please try again";
                echo "<a href='?action=home'>Go Back?</a><br>";

            }
        }
    }
    
}

?>

<pre><?php var_dump(get_defined_vars()); ?></pre>