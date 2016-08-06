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
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT us.fname, us.lname, us.rank, us.branch FROM user us 
INNER JOIN user_campaign uc ON us.id = uc.uid INNER JOIN campaign c ON uc.cid = c.id WHERE c.id = ?"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("i",$_POST['campaign']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($fname, $lname, $rank, $branch)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $fname . "\n</td>\n<td>\n" . $lname . "\n</td>\n<td>\n" . $rank . "\n</td>\n<td>\n"  . $branch .  "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>
<div>
		<br>
		<form action="searchForMember.php?">
			<input type="submit" value="Return to Search Page" />
		</form>
</div>
</body>
</html>