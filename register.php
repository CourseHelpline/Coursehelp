<?php
if(isset($_POST['submit']))
{
	$con=mysqli_connect("localhost","root","","a1115422_sivaji");
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$pword2 = $_POST['password2'];
    if($pword != $pword2){
		echo "<center>Passwords does not match!</center><br>";
	}
	else
	{
		$checkexist = mysqli_query($con,"SELECT username FROM users WHERE username='$uname'");
		if(mysqli_num_rows($checkexist))
		{
			echo "<center>That username already exists,please selct a different username</center><br>";
		}
		else
		{
			$sql = "INSERT INTO users VALUES ('','".$uname."','".$pword."')";
			mysqli_query($con,$sql);
			echo "<center>You have successfully registered! Click <a href=\"index1.php\">here</a> to login!</center><br>";
		}
	}
}
?>
<html>
<head>
<style>
.link{

color:#484848;
}
</style>
</head>
<body bgcolor="#A9A9A9">
<center><h1><font face="Comic Sans MS">Registration</font></h1>
<form action="#" method="POST">
<p>
<pre>
Enter your UserName:	<input type="text" name="username" required size=30><br><br>
Create Password:	<input type ="password" name="password" required size=30><br>
Renter your Password:	<input type ="password" name="password2" required size=30><br>
<input  type="submit"   name="submit" value="Register">	<input type="reset" name="reset" value="Clear"><br>
</pre>
</p>
</form>	
</body>
</html>
