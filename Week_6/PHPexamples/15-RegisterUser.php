<html>
<head>
</head>
<body>

<form action="registerUser.php"  method="post"> 
<label for="name">Name:</label><input id="name"name="name">
<label for="password">Password:</label><input id="password" name="password" type="password">
<input type="submit">

<?php

	//connect to database
	$connection1 = mysql_connect('arlia.computing.dundee.ac.uk', '11mscadmin11', 'aaa111');
	
	mysql_select_db('11mscdbase11');
	
	if(isset($_SESSION['isLoggedIn']))
		echo "logged in";
	
	//if they have posted a value then obviously its not the first time they just arrived
	if(isset($_POST['name']) && $_POST['password'])
	{
		$username = $_POST['name'];
		$password = crypt($_POST['password'],'mysalt');
		
		$insertUserSQL = "INSERT INTO mytable(FirstName,SecondName,Password) VALUES('$username','','$password')";
		echo $insertUserSQL;
		
		mysql_query($insertUserSQL );
	
	}
	
	mysql_close($connection1);
	
	
?>

</form>



</body>
</html>
