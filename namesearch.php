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
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>	
<body>
	<header id="header">
		<h1><a href="mainpage.php">Veteran Connection</a></h1>
		<nav id="nav">
			<ul>
				<li><a href="mainpage.php">Home</a></li>
				<li><a href="searchForMember.php">Search</a></li>
				<li><a href="http://web.engr.oregonstate.edu/~merrittm/cs344/phpBB-3.1.9/phpBB3/">Forum</a></li>
				<li><a href="mainpage.php">Sign In</a></li>
			</ul>
		</nav>
	</header>
	<br>
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
if(!($stmt = $mysqli->prepare("SELECT user.fname, user.lname, user.rank, user.branch FROM user WHERE user.fname = ? AND user.lname = ?"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("ss",$_POST['fname'],$_POST['lname']))){
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