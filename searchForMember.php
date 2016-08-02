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
</div>

<div>
		<br>
		<form action="http://web.engr.oregonstate.edu/~orellang/mainpage.php?">
			<input type="submit" value="Return to Mainpage" />
		</form>
</div>
</body>
</html>
