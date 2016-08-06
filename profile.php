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
        		<td>E-mail</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT user.fname, user.lname, user.rank, user.branch, user.email FROM user WHERE user.username = ? AND user.password = ?"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("ss",$_POST['username'], $_POST['password']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($fname, $lname, $rank, $branch, $email)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $fname . "\n</td>\n<td>\n" . $lname . "\n</td>\n<td>\n" . $rank . "\n</td>\n<td>\n"  . $branch .  "\n</td>\n<td>\n" . $email . "\n</td>\n</tr>";
}
$stmt->close();
?>

	</table>
</div>
<div>

<form method="post" action="message.php">
		<fieldset>
			<legend>Ask for Urgent Help.</legend>
				<select name="connection">
					<!-- Get list of connections from current user -->
					<?php
					if(!($stmt = $mysqli->prepare("SELECT u.id, u.fname, u.lname  FROM connections c INNER JOIN user u ON c.idfriend = u.id WHERE c.iduser = (SELECT user.id FROM user WHERE user.username = ?)"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!($stmt->bind_param("s",$_POST['username']))){
						echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
					}
					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($friend_id, $f_name, $l_name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $friend_id . ' "> ' . $f_name . ' ' . $l_name . '</option>\n';
					}
					$stmt->close();
					?>						
				</select>
				<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>"/>
			<input type="submit" value="Email for Urgent Help" />
		</fieldset>
		<br>
</form>
</div>
<div>
		<br>
		<form action="http://web.engr.oregonstate.edu/~orellang/mainpage.php?">
			<input type="submit" value="Return to Mainpage" />
		</form>
</div>
</body>
</html>