<form enctype="multipart/form-data" action="?action=signupUser" method="post">
    <fieldset>
        <legend>Sign Up Now?</legend>
    <label>Username: </label><br>
        <input type="text" name="user" /><br>
    <label>Password: </label><br>
        <input type="password" name="password" /><br>
    <label>Full Name: </label><br>
        <input type="text" name="fullname" /><br>
    <label>Select photo photo to upload: </label>
        <input type="file" name="photofile" value="" /><br>
    <label>Company Address: </label><br>
        <input type="text" name="companyAddress" /><br>
    <label>Phone: </label><br>
        <input type="tel" pattern="[0-9]{10}" name="phone" /><br>
    <label>Email: </label><br>
        <input type="email" name="email" /><br>
    <label>Website: </label><br>
         <input type="url" name="website" /><br>
    <label>Birthday: </label><br>
         <input type="date" name="birthday" /><br>
    <label>Favorite Restaurante Address: </label><br>
        <input type="text" name="favRestaurantAddress" /><br>
         <input type="submit" value="Sign Up!" name="submit" /><br>
    </fieldset>
</form>