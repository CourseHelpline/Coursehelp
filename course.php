<html>
<head>
<style>
.link{
background-color:#DAA520;
color:#484848;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body bgcolor="#A9A9A9">
<center>
<h1>COURSE RERGISTRATION</h1>
<form method="post" action="#">
<?php
	if(isset($_POST['submit']))
	{
		require_once("reg.php");
		$x = new connect();
		if($x -> course())
		{
			header('Location: home.php');
		}
		else
		{
			echo "error";
		}
	}
?>
<pre>

GRADUATION:	<input type="radio" name="graduation" value="UG" />UG	<input type="radio" name="graduation" value="PG" />PG

Degree:		<select name="degree">
<option value="select option" selected> Select category</option>
<option value="B.Tech">B.Tech</option>
<option value="M.Tech">M.Tech</option>
</select>

Department:	<select name="department">
<option value="select option" selected> Select category</option>
<option value="Computer Science">Computer Science</option>
<option value="ECE">ECE</option>
<option value="Civil">Civil</option>
<option value="Mechanical">Mechanical</option>
<option value="EEE">EEE</option>
<option value="Bio Technology">Bio Technology</option>
</select>

<input type="submit" name="submit" value="Register">

</pre>
</form>
</body>
</html>
