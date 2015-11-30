<?php
session_start();
if(isset($_POST['submit']))
{
	require_once("reg.php");
	$x = new connect();
	if($x -> login())
	{
		header('Location: student.php');
	}
	else
	{
		echo "<center>";
		echo "Sorry! The username and password does not match!";
		echo "</center>";
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
<center><h1><font face="Comic Sans MS">Login to continue</font></h1>
	<form name="form2" action="#" method="post">
	<p>
<pre>
UserName	:	<input type="text" name="username" required size=30><br><br>
Password:	<input type ="password" name="password" required size=30><br>
<input  type="submit"   name="submit" value="login">	<input type="reset" name="reset" value="clear"><br>
<a href="register.php" class="link">Click here to get an account</a>
</pre>
</p>
</form>	
</body>
</html>










