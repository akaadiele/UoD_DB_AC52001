<html>
<head>
</head>
<body>

<p> Login Form:</p>
<form action="login.php"  method="post"> 
<label for="name">Name:</label><input id="name"name="name">
<label for="password">Password:</label><input id="password" name="password" type="password">
<input type="submit">
</form>

<?php
	
	//check if username is correct & check if password is correct
//connect to database
	$connection1 = mysql_connect('arlia.computing.dundee.ac.uk', '11mscadmin11', 'aaa111');
	
	mysql_select_db('11mscdbase11');
	
	if(isset($_POST['name']) && $_POST['password'])
	{
		$username = mysql_real_escape_string ($_POST['name']);
		$password= crypt(mysql_real_escape_string ($_POST['password']),"mysalt");
	
		$result = mysql_query("SELECT * FROM mytable WHERE FirstName='$username'");
		
		if(mysql_num_rows($result) ==1)
		{
			$row = mysql_fetch_assoc($result);
			echo "<br>valid password:" . $row['Password'];
			echo "<br>entered one:".$password;
			echo "<p>cool</p>";
			if(strcmp(trim($password),trim($row['Password']))==0)
			{
				echo "your logged in!";
				$_SESSION['isLoggedIn'] = "yes!";
			}
			else
			echo "try again hacker!";
		}
		else
		{
			echo "could not find user";
		}
		
	}
	
	mysql_close($connection1);
	
?>
<a href="registerUser.php">clickme</a>
</body>
</html>
