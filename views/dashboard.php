<?php
if(!empty($_SESSION['user_name'])) {
?>

    Welcome <b><?php echo $_SESSION['user_name']; ?></b>! ~
    Click here to <a href='?action=logoutUser'>Logout</a>&nbsp;|&nbsp;
    
<?php
    $user_id = $_SESSION['user_id'];
    $usernameInput = $_SESSION['user_name'];
    $passwordInput = $_SESSION['pass_word'];
    $photofile = $_SESSION['photo_file'];
}


if (isset($_SESSION['user_id'])) {

    echo "<h2>Clients Dashboard</h2>";
    echo "Sorry, you must be an admin to access this area!<br>";
    echo "<a href='?action=profile'>Profile</a>...";
} else {
    echo "<a href='?action=logoutUser'>Logout</a>...";
    echo "<h2>Users 101 Dashboard</h2>";
    echo "<table width=80% align=center>";
    echo "<tr>";
    echo "<th>User Id</th>";
    echo "<th>User Name</th>";
    echo "<th>Password</th>";
    echo "<th>Full Name</th>";
    echo "<th>Profile Photo</th>";
    echo "<th>Company Address</th>";
    echo "<th>Phone</th>";
    echo "<th>Email</th>";
    echo "<th>Website</th>";
    echo "<th>Birthday</th>";
    echo "<th>Favorite Restaurant Address</th>";
    echo "<th>Action</th></tr>";
}
?>