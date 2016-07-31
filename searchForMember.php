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
		</fieldset>
    
    <input type="submit" value="Submit">
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
