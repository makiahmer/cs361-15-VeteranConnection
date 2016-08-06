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
	<!-- Add user -->
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
	<!-- Add user unit -->
	<?php
	if(!($stmt = $mysqli->prepare("INSERT INTO user_unit (usid, unid, date_start, date_end) VALUES ((SELECT user.id FROM user WHERE user.fname = ? and user.lname = ?),(SELECT unit.id FROM unit WHERE unit.id = ?),?,?)"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("sssss",$_POST['fname'],$_POST['lname'],$_POST['unit'],$_POST['date_start'],$_POST['date_start']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		echo "Added " . $stmt->affected_rows . " rows to user_unit.";
	}
	?>	
	<!-- Add user campaign -->
	<?php
	if(!empty($_POST['campaign'])){
	if(!($stmt = $mysqli->prepare("INSERT INTO user_campaign (uid, cid) VALUES ((SELECT user.id FROM user WHERE user.fname = ? and user.lname = ?),(SELECT campaign.id FROM campaign WHERE campaign.id = ?))"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("ssi",$_POST['fname'],$_POST['lname'],$_POST['campaign']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		echo "Added " . $stmt->affected_rows . " rows to user_unit.";
	}
	}
	?>
		<!-- Add user base -->
	<?php
	if(!empty($_POST['base'])){
	if(!($stmt = $mysqli->prepare("INSERT INTO user_base (uid, bid) VALUES ((SELECT user.id FROM user WHERE user.fname = ? and user.lname = ?),(SELECT base.id FROM base WHERE base.id = ?))"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("ssi",$_POST['fname'],$_POST['lname'],$_POST['base']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		echo "Added " . $stmt->affected_rows . " rows to user_unit.";
	}
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