<?php

echo "<a href='?action=logoutUser'>Logout</a>&nbsp;|&nbsp;";
echo "<a href='?action=dashboard'>Dashboard</a>";

if ($_SESSION['pass_word'] !=null && $_SESSION['user_name'] !=null){

	function makeArray(){

		$epass = $_SESSION['pass_word'];
		$euser = $_SESSION['user_name'];
		$photofile = $_SESSION['photo_file'];
        $efullname = $_SESSION['fullname'];
        $ebirthday = $_SESSION['birthday'];
        $ecomp = $_SESSION['companyAddress'];
        $ephone = $_SESSION['phone'];
        $eemail = $_SESSION['email'];
        $ewebsite = $_SESSION['website'];
        $efavRestaurantAddress = $_SESSION['favRestaurantAddress'];

		return array("Username: " => $euser, "Hashed: " => $epass, "Photo: " => $photofile, "Full Name: " => $efullname, "Birthday: " => $ebirthday, "Company Address: " => $ecomp, "Phone: " => $ephone, "Email: " => $eemail, "Website: " => $ewebsite, "Favorite Restaurant Address: " => $efavRestaurantAddress);
	}

	echo "<h2>User Profile Page - Welcome</h2>";
	echo "<table width=100% align=left border=0><tr><td>";

	$data = makeArray();

	foreach ($data as $attribute => $data) {
		echo "<p align=left>{$attribute} {$data}";
	}

	if(!empty($_SESSION['photo_file'])){
		//echo "<br>photo photo:" . $_SESSION['photo_file'];
        //echo "<br><img src='" . "uploads" . "/". $_SESSION['photo_file'] . "'width='200' />";
        echo "<br><a href=\"?action=profile\"><img src=\"uploads/" . $_SESSION['photo_file'] . "\" class=\"left userPhoto\" width=\"200\"/></a><br>";
	}else{
		echo "<br>Photo: no photo";
	}
		echo "</td></tr></table>";

}else {
	echo "Sorry you are not currently logged in. <br>";
	echo "<a href ='?action=home'>Try again?</a><br>";
}

?>