<?php

session_start();

include('models/Views.Class.php');
include('models/CreateData.Class.php');
include('models/ReadData.Class.php');
include('models/UpdateData.Class.php');
include('models/DeleteData.Class.php');
include('models/Login.Class.php');
include('models/DBCredentials.php');

$views = new Views();
$create = new CreateData();
$read = new ReadData();
$update = new UpdateData();
$delete = new DeleteData();
$login = new Login();

if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        $views->getView('views/header.php');
        $views->getView('views/signup_form.php');
        $views->getView('views/login_form.php');
        $views->getView('views/footer.php');
    } 
    if ($_GET['action'] == 'signupUser') {

        $views->getView('views/header.php');

        $salt = 'SuperYanely\'sSaltHash';
        $epass = md5($_POST['password'] . $salt);
        $euser = $_POST['user'];

        $create->createrecord($euser, $epass);
        $views->getView('views/footer.php');

    }
    if ($_GET['action'] == 'loginUser') {
        $salt = 'SuperYanely\'sSaltHash';
        $epass = md5($_POST['password_li'] . $salt);
        $euser = $_POST['username_li'];

        $views->getView('views/header.php');
        $login->loginUser();
        $views->getView('views/footer.php');
    } else if ($_GET['action'] == 'logoutUser') {
        session_unset();
        session_destroy();
        $views->getView('views/header.php');
        $views->getView('views/logout.php');
        $views->getView('views/footer.php');
    }
    if ($_GET['action'] == 'profile') {
        $user_id = $_SESSION['user_id'];
        $usernameInput = $_SESSION['user_name'];
        $passwordInput = $_SESSION['pass_word'];
        $fullname = $_SESSION['fullname'];
        $photofile = $_SESSION['photo_file'];
        $birthday = $_SESSION['birthday'];
        $compAddress = $_SESSION['companyAddress'];
        $phoneNumber = $_SESSION['phone'];
        $website = $_SESSION['website'];
        $favRestaurantAddress = $_SESSION['favRestaurantAddress'];
        
        $views->getView('views/header.php');
        $views->getView('views/profile.php');
        $views->getView('views/footer.php');
    }
    
    if ($_GET['action'] == 'dashboard') {
        $views->getView('views/header.php');
        $views->getView('views/dashboard.php');
        $read->readDisplayAllRecords();
        $views->getView('views/footer.php');
    }
    if ($_GET['action'] == 'updateForm') {
        $views->getView('views/header.php');
        $views->getView('views/update_form.php');
        $views->getView('views/footer.php');
    } else if ($_GET['action'] == 'updateUserNow') {
        $update->updateUser();
        header('Location: ?action=dashboard');
    }
    if ($_GET['action'] == 'deleteForm') {
        $views->getView('views/header.php');
        $views->getView('views/delete_form.php');
        $views->getView('views/footer.php');
    } else if ($_GET['action'] == 'deleteUserNow') {
        $delete->deleteUserNow();
        header('Location: ?action=dashboard');
    }
} else {
    header ('Location: ?action=home');
}

?>