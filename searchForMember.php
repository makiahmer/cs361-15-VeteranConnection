<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","orellang-db","LW95pTHsRbglbY3q","orellang-db");
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Search Page</title>
</head>
<body>

<h1>Search for Members</h1>
	<p>Search for fellow service members</p>
<!-- Search for service member -->
<div>
<form action="branchsearch.php" method="post">

    <fieldset>
      <legend>Search by Military Branch</legend>
      <select name="branch" required>
        <option value="marineCorps">Marine Corps</option>
        <option value="navy">Navy</option>
        <option value="army">Army</option>
        <option value="airforce">Air Force</option>
        <option value="coastguard">Coast Guard</option>
      </select>
	  <input type="submit" value="Search">
		</fieldset>
    <br>
    
</form>
<form action="namesearch.php" method="post">

    <fieldset>
		<legend>Search by Name</legend>
		<p>First Name: <input type="text" name="fname" required></p>
		<p>Last Name: <input type="text" name="lname" required></p>
		<input type="submit" value="Search">
	</fieldset>  
	<br>	
    
</form>
<form action="emailsearch.php" method="post">

    <fieldset>
		<legend>Search by Email Address</legend>
		<p>Email: <input type="email" name="email" required></p>
		<input type="submit" value="Search">
	</fieldset>    
	<br>
</form>
<form action="phonesearch.php" method="post">

    <fieldset>
		<legend>Search by Phone Number</legend>
		<p>Phone Number: <input type="tel" pattern ="\d{3}[\-]\d{3}[\-]\d{4}" name="phone" required> (Format must be: xxx-xxx-xxxx)</p>
				 
		<input type="submit" value="Search">
	</fieldset>    
    <br>
</form>

<form method="post" action="unitsearch.php">
		<fieldset>
			<legend>Search by Unit</legend>
				<select name="unit">
					<!-- Get list of units -->
					<?php
					if(!($stmt = $mysqli->prepare("SELECT id, unit FROM unit"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($unit_id, $unit_name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $unit_id . ' "> ' . $unit_name . '</option>\n';
					}
					$stmt->close();
					?>
				</select>
			<input type="submit" value="Search" />
		</fieldset>
		<br>
</form>

<form method="post" action="campaignsearch.php">
		<fieldset>
			<legend>Search by Campaign</legend>
				<select name="campaign">
					<!-- Get list of campaigns -->
					<?php
					if(!($stmt = $mysqli->prepare("SELECT id, campaign FROM campaign"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($campaign_id, $campaign_name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $campaign_id . ' "> ' . $campaign_name . '</option>\n';
					}
					$stmt->close();
					?>
				</select>
			<input type="submit" value="Search" />
		</fieldset>
		<br>
</form>

<form method="post" action="basesearch.php">
		<fieldset>
			<legend>Search by Base</legend>
				<select name="base">
					<!-- Get list of bases -->
					<?php
					if(!($stmt = $mysqli->prepare("SELECT id, name FROM base"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($base_id, $base_name)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $base_id . ' "> ' . $base_name . '</option>\n';
					}
					$stmt->close();
					?>
				</select>
			<input type="submit" value="Search" />
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
