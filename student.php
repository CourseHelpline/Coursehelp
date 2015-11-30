<html>
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
<h2>STUDENT DETAILS</h2>
<form method="post" action="#">
<?php
	if(isset($_POST['submit']))
	{
		require_once("reg.php");
		$x = new connect();
		if($x -> student())
		{
			header('Location: course.php');
		}
		else
		{
			echo "error";
		}
	}
?>
<pre>
Name:			<input type="text" name="name" required size="30"/>

Last name:		<input type="text" name="lastname" required size="30"/>

Fathers name:		<input type="text" name="fname" required size="30"/>

Mothers name:		<input type="text" name="mname" required size="30"/>

DOB:			<input type="date" name="dob" required size="30"/>

Gender:			<input type="radio" name="gender" value="male" />Male	<input type="radio" name="gender" value="female" />Female

Religion: <select name="religion">
<option value="select option" selected> Select category</option>
<option value="Hindu">Hindu</option>
<option value="christian">Christian</option>
<option value="Islam">Islam</option>
<option value="others">others</option>
</select>

Address:		<textarea name="address" required size="30"></textarea>

Phone:			<input type="text" name="phone" required size="30"/>

Pincode:		<input type="text" name="pincode" required size="30"/>

SSLC:	        <select name="sslc">
<option value="select option" selected> Select category</option>
<option value="matriculation">Matriculation</option>
<option value="stateboard">Stateboard</option>
<option value="CBSE">CBSE</option>
<option value="ICSE">ICSE</option>
</select>

Marks:			<input type="text" name="smarks" required size="30"/>

HSC:	        <select name="HSC">
<option value="select option" selected> Select category</option>
<option value="Stateboard">Stateboard</option>
<option value="CBSE">CBSE</option>
<option value="ICSE">ICSE</option>
</select>

Marks:			<input type="text" name="hmarks" required size="30"/>


Email:			<input type="text" name="email" reuired size="30"/>

				<input type="submit" name="submit" value="Submit" />

	
</pre>
</form>
</body>
</html>
