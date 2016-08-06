<?php

list($recipient_id, $user_id) = explode("|", $_POST["connection"]);

if(!($stmt = $mysqli->prepare("SELECT u.username FROM user u WHERE u.id = $user_id"))){
		echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($currentUsername)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
//message
$message = "Please contact " . $username . " immediately!";


if(!($stmt = $mysqli->prepare("SELECT u.email FROM user u WHERE u.id = $recipientID"))){
		echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($recipientEmail)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

mail($recipientEmail, "Urgent Help - Veteran Connection", $message);

?>