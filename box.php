<?php
$page = $_SERVER['PHP_SELF'];
$sec = "20";
if(!isset($_SESSION))
{
    session_start();
}
$username = $_SESSION['username'];
?>
<html>
<head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
<title>Chat - Customer Module</title>
<style>
body {
    font:12px arial;
    color: #222;
    background-color:#A9A9A9;
    text-align:center;
    padding:35px; }
  
form, p, span {
    margin:0;
    padding:0; }
  
input { font:12px arial; }
  
a {
    color:#0000FF;
    text-decoration:none; }
  
    a:hover { text-decoration:underline; }
  
#wrapper, #loginform {
    margin:0 auto;
    padding-bottom:25px;
    background:#EBF4FB;
    width:504px;
    border:1px solid #ACD8F0; }
  
#loginform { padding-top:18px; }
  
    #loginform p { margin: 5px; }
  
#chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    background:#fff;
    height:270px;
    width:430px;
    border:1px solid #ACD8F0;
    overflow:auto; }
  
#usermsg {
    width:395px;
    border:1px solid #ACD8F0; }
  
#submit { width: 60px; }
  
.error { color: #ff0000; }
  
#menu { padding:12.5px 25px 12.5px 25px; }
  
.welcome { float:left; }
  
.logout { float:right; }
  
.msgln { margin:0 0 2px 0; }
</style>
</head>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<div id="wrapper">
    <div id="menu">
        <p class="Welcome">Welcome <?php echo $username; ?>, <b></b></p>
        <form action="#" method="POST">
        <button type="submit" value="Exit" name="exit">Exit</button>
        </form>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
        <?php
            
            $con = mysqli_connect("localhost","root","","a1115422_sivaji");
        
            $sql1 = "select * from logs";
            $result = mysqli_query($con,$sql1);
            if(mysqli_num_rows($result))
            {
                while($res = mysqli_fetch_array($result))
                {
                        echo $res['username']."> ".$res['msg']."<br>";
                }
            }
            else
            {
                echo mysqli_error($con);
            }

            if(isset($_POST['submitmsg']))
            {
                //$username = $_SESSION['username'];
                $msg = $_POST['usermsg'];
                $con = mysqli_connect("localhost","root","","a1115422_sivaji");
                $sql = "insert into logs values ('','".$username."','".$msg."')";
                if(mysqli_query($con,$sql))
                {
                    $sql1 = "SELECT * FROM logs ORDER BY id DESC LIMIT 1";
                    $result = mysqli_query($con,$sql1);
                    if(mysqli_num_rows($result))
                    {
                        while($res = mysqli_fetch_array($result))
                        {
                            echo $res['username']."> ".$res['msg']."<br>";
                        }
                    }
                }
                else
                {
                    echo mysqli_error($con);
                }
            }

            if(isset($_POST['exit']))
            {
                session_destroy();
                header('Location: home.php');
            }

        ?>
    </div>
     
    <form name="message" method="post" action="#">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
</body> 
</html>