<!DOCTYPE html>
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

<h1>Login to Profile</h1>
<div>
<form action="profile.php" method="post">

    <fieldset>
      <legend>Username/Password</legend>
    <p>Username: <input type="text" name="username" required></p>
    <p>Password: <input type="password" name="password" required></p>
    <input type="submit" value="Login">
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