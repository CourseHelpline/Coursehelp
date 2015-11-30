<head>
<style>
.link{
background-color:#DAA520;
color:#484848;

}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body bgcolor="#A9A9A9">
<center>
<h2>ENTER THE DETAILS</h2>
<form method="post" action="box.php">
<?php
	if(isset($_POST['submmit']))
	{
		require_once("reg.php");
		$x = new connect();
		$x -> chat();
	}
?>
<pre><center>
Name:<input type="text" name="name" required size=30/>

Contact NO:<input type="radio" name="contact no" value="Landline" />Landline <input type="radio" name="contact no" value="Mobile" />Mobile
	<input type="text" name="phone" required size=30/>

Address:<textarea name="address" required size=30></textarea>

Email:<input type="text" name="email" reuired size=30/>

Query on:<textarea name="query on" required size=30/></textarea>
	<input type="submit" name="submit" value="Submit" />
				
</center>
</pre>
</form>
</body>
</html>
