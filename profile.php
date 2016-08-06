<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
	<table>
		<tr>
			<td>Members</td>
		</tr>
			<tr>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Rank</td>
        		<td>Branch</td>
        		<td>Need Urgent Help</td>
        		<td>E-mail</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT user.fname, user.lname, user.rank, user.branch, user.urgentHelp, user.email FROM user WHERE user.username = ? AND user.password = ?"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("ss",$_POST['username'], $_POST['password']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($fname, $lname, $rank, $branch)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $fname . "\n</td>\n<td>\n" . $lname . "\n</td>\n<td>\n" . $rank . "\n</td>\n<td>\n"  . $branch .  "\n</td>\n<td>\n" . $urgentHelp . "\n</td>\n<td>\n" . $email . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

<form method="post" action="message.php">
		<fieldset>
			<legend>Ask for Urgent Help.</legend>
				<select name="connection">
					<!-- Get list of connections from current user -->
					<?php
					if(!($stmt = $mysqli->prepare("SELECT user.id FROM user WHERE user.username = ?"))){
						echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
					}
					if(!($stmt->bind_param("ss",$_POST['username']))){
						echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($currentUserID)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!($stmt = $mysqli->prepare("SELECT user.fname, user.lname, user.id FROM user INNER JOIN friend f ON f.idfriend = user.id WHERE f.iduser = $currentUserID"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($friend_id, $f_name, $l_name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $friend_id|$currentUserID . ' "> ' . $f_name . ' ' . $l_name . '</option>\n';
					}
					$stmt->close();
					?>
				</select>
			<input type="submit" value="Email for Urgent Help" />
		</fieldset>
		<br>
</form>

</body>
</html>