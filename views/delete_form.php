<?php
if(!empty($_SESSION['user_name'])) {

    echo "Welcome <b>";
    echo $_SESSION['user_name'] . "</b>! ~";
    echo "Click here to <a href='?action=logoutUser'>Logout</a>&nbsp;|&nbsp;";

    $user_id = $_SESSION['user_id'];
    $usernameInput = $_SESSION['user_name'];
    $passwordInput = $_SESSION['pass_word'];
    $photofile = $_SESSION['photo_file'];
}
?>

<body>

<?php

$userid = $_GET['id'];

echo "<a href='?action=profile'>My profile</a>";
echo "<a href='?action=dashboard'>Delete More?</a>";

?>
    
    <h2>Delete User Console</h2><br><br>
    <br>Are you sure you want to delete User Id <?php echo '"' . $userid . '"'; ?><br><br>
    
    <form method='post' action='?action=deleteUserNow&id=<?php echo $userid?>'>
        If so, click yes... 
        <input type='submit' name='submit' value='Yes, Delete it now!' />
    </form>
</body>