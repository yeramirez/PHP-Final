<?php
$userid = $_GET['id'];

$user = 'root';
$pass = 'root';
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

$userid = $_GET['id'];

$stmt = $dbh->prepare("SELECT * FROM clients where userid = :userid");
$stmt->bindParam(':userid', $userid);
$stmt->execute();
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

echo "&nbsp;|&nbsp;<a href='?action=profile'>My Profile</a>&nbsp;|&nbsp;";
echo "<a href='?action=dashboard'>Update More?</a>";
?>

    <h2>Update User</h2>
    
    <form action="?action=updateUserNow&id=<?php echo $userid ?>" method="post">
        <label>Username: </label>
            <input type="text" name="user" value= <?php echo '"' . $result[0]['username'].'"'; ?> /><br><br>
        <label>Full Name: </label>
            <input type="text" name="fullname" value= <?php echo '"' . $result[0]['fullname'].'"'; ?> /><br><br>
        <label>Photo: </label>
            <input type="text" name="photo" value= <?php echo '"' . $result[0]['photo'].'"'; ?> /><br><br>
        <label>Company Address: </label>
            <input type="text" name="companyAddress" value= <?php echo '"' . $result[0]['companyAddress'].'"'; ?> /><br><br>
        <label>Phone: </label>
            <input type="tel" name="phone" value= <?php echo '"' . $result[0]['phone'].'"'; ?> /><br><br>
        <label>Email: </label>
            <input type="email" name="email" value= <?php echo '"' . $result[0]['email'].'"'; ?> /><br><br>
        <label>Website: </label>
            <input type="url" name="website" value= <?php echo '"' . $result[0]['website'].'"'; ?> /><br><br>
        <label>Birthday: </label>
            <input type="date" name="birthday" value= <?php echo '"' . $result[0]['birthday'].'"'; ?> /><br><br>
        <label>Favorite Restaurant Address: </label>
            <input type="text" name="favRestaurantAddress" value= <?php echo '"' . $result[0]['favRestaurantAddress'].'"'; ?> /><br><br>
        <input type="submit" name='submit' value='Update Database' />
    </form>