<html>
<head>
<style>
.link{
background-color:DAA520;
color:#484848;
}
</style>
</head>
<body bgcolor="#A9A9A9">
<center><h1><font face="Comic Sans MS">Enter name to continue</font></h1>
<form method="post" action="#">
<?php
	if(isset($_POST['submit']))
	{
		// require_once("reg.php");
		// $x = new connect();
		// if($x -> login())
		// {
		if(!isset($_SESSION))
		{
			session_start();
		}
		$_SESSION['username'] = $_POST["name"];
		header('Location: box.php');
		// }
	}
?>
<p>
<pre>
UserName	:	<input type="text" name="name" required size=30><br><br>
<!-- Password:	<input type ="password" name="password" required size=30><br> -->
<input  type="submit"   name="submit" value="Go">	<input type="reset" name="reset" value="Clear">
</pre>
</p>
</form>
</body>
</html>
