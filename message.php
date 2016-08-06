<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database

$mysqli = new mysqli("oniddb.cws.oregonstate.edu","orellang-db","LW95pTHsRbglbY3q","orellang-db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Login Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div>
<?php
$recipient_id = $_POST['connection'];
$username = $_POST['username'];
//message
$message = "Please contact " . $username . " immediately!";
if(!($stmt = $mysqli->prepare("SELECT u.email FROM user u WHERE u.id = ?"))){
	echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("i",$_POST['connection']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($recipientEmail)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
$stmt->fetch();
mail($recipientEmail, "Urgent Help - Veteran Connection", $message);
echo "Message Sent!";
$stmt->close();
?>
<div>
		<br>
		<form action="http://web.engr.oregonstate.edu/~orellang/mainpage.php?">
			<input type="submit" value="Return to Mainpage" />
		</form>
</div>
</body>
</html>
