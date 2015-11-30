<?php
$uname = $_POST('uname');
$mag = $_POST('mag');
$database = $_POST('a1115422_sivaji');

if($con = mysqli_connect('localhost','root','','a1115422_sivaji'))
{mysqli_select_db('a1115422_sivaji',$con);

mysqli_query("INSERT INTO logs ('username' , 'mag') VALUES ('$uname','$mag')");

$result1 = mysqli_query("SELECT * FROM logs ORDER by id DESC");

while ($extract = mysqli_fetch_array($result1)){
echo  "<span class='uname'>" . $extract{'username'} . "</span>" : <span class='mag'>" . $extract{'mag'} . "</span><br>";
 
}

	
}
	


//or die('connection failed');
?>