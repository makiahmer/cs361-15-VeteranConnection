<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
</head>
<body>

<h1>Login to Profile</h1>
<div>
<form action="profile.php" method="post">

    <fieldset>
      <legend>Username/Password</legend>
    <p>Username: <input type="text" name="username" required></p>
    <p>Password: <input type="text" name="password" required></p>
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