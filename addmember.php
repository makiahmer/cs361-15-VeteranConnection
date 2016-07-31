<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","orellang-db","LW95pTHsRbglbY3q","orellang-db");
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
	<title>Add New Member</title>
	<meta charset="utf-8">
</head>
	<body>	
	<?php
	if(!($stmt = $mysqli->prepare("INSERT INTO user(fname, lname, gender, birthDate, city, state, phone, email, rank,
	username, password, branch, date_start, date_end) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("ssssssssssssss",$_POST['fname'],$_POST['lname'],$_POST['gender'],$_POST['birthDate'],$_POST['city'],
  $_POST['state'],$_POST['phone'], $_POST['email'], $_POST['rank'],$_POST['username'],$_POST['password'],$_POST['branch'],$_POST['date_start'],$_POST['date_end']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		echo "Added " . $stmt->affected_rows . " rows to new user.";
	}
	?>  
  
	<div>
		<br>
		<form action="http://web.engr.oregonstate.edu/~orellang/mainpage.php?">
			<input type="submit" value="Return to Mainpage" />
		</form>
	</div>
	</body>
</html>