<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database

$mysqli = new mysqli("oniddb.cws.oregonstate.edu","orellang-db","LW95pTHsRbglbY3q","orellang-db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Create New Account</title>
</head>
<body>

<h1>Create New Account</h1>
	<p>Create a new user account for Veteran Connection.</p>

  <form action="addmember.php" method="post">
    <fieldset>
    	<legend>Name</legend>
        <p>First Name: <input type="text" name="fname" required></p>
        <p>Last Name: <input type="text" name="lname" required></p>  
    </fieldset>
		<fieldset>
    	<legend>Gender</legend>
      <input type="radio" name="gender" value="male" checked> Male<br>
      <input type="radio" name="gender" value="female"> Female<br>
      <input type="radio" name="gender" value="other"> Other
    </fieldset>
    
    <fieldset>
			<legend>DOB</legend>
				 <input type="date" name="birthDate" required>
		</fieldset>
    
    <fieldset>
    	  <legend>Current Address</legend>
        <p>City: <input type="text" name="city"></p>
        <p>State: <input type="text" name="state"></p>  
    </fieldset>
    
    <fieldset>
			<legend>Phone Number</legend>
				 <input type="tel" pattern ="\d{3}[\-]\d{3}[\-]\d{4}" name="phone" required>
				 (Format must be: xxx-xxx-xxxx)
	</fieldset>

    <fieldset>
			<legend>E-mail</legend>
				 <input type="text" name="email" required>
		</fieldset>
    <fieldset>
			<legend>Rank</legend>
				 <input type="text" name="rank" required>
		</fieldset>
    
  <fieldset>
				<legend>Username and Password</legend>
				<p>Username: <input type="text" name="username" required></p>
  			<p>Password: <input type="password" name="password" required></p>
	</fieldset>

    <fieldset>
			<legend>Date Joined</legend>
				 <input type="date" name="date_start" required>
				 <input type="date" name="date_end" required>
		</fieldset>

    <fieldset>
      <legend>Military Branch</legend>
      <select name="branch" required>
        <option value="marineCorps">Marine Corps</option>
        <option value="navy">Navy</option>
        <option value="army">Army</option>
        <option value="airforce">Air Force</option>
        <option value="coastguard">Coast Guard</option>
      </select>
		</fieldset>

  <br>  
 

    <input type="submit" value="Submit">
  </form>

</body>
</html>