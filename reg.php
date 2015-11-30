<?php
class connect
{
    function student2()
    {
        $con=mysqli_connect("localhost","root","","a1115422_sivaji");
        $reg = array();
        $reg[] = $_POST["name"]; //0
        $reg[] = $_POST["email"]; //1
        $reg[] = $_POST["pass"]; //2
        $reg[] = $_POST["cpass"]; //3
        $userid = rand(1,1000);

        $pass = md5($reg[2]);

        if(!isset($_POST["terms"]))
        {
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Please agree to our terms to register!</center>";
            echo "</div></div><br><br>";   
        }
        else if($this->checkEmail($reg[1]))
        {
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Please enter a valid email address!</center>";
            echo "</div></div><br><br>";
        }
        /*
        else if($this->emailexists($reg[1]))
        {   
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>That email id already exists!</center>";
            echo "</div></div><br><br>";
        }
        */
        else if(($reg[0] && $reg[1] && $reg[2] && $reg[3])==null)
        {
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Please enter all the necessary details!</center>";
            echo "</div></div><br><br>";
        }
        else if($reg[2] !== $reg[3])
        {
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Passwords do not match!</center>";
            echo "</div></div><br><br>";
        }
        else if(strlen($reg[2]) < 8)
        {
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Your password must be at least 8 characters long!</center>";
            echo "</div></div><br><br>";
        }
        else
        {
            //$vcode = md5(uniqid("#Road@i,m,z@Assist#", true));
            //if(mysqli_query($con,"INSERT into users values ('','$reg[0]','$reg[1]','$reg[2]','$vcode')"))
            if(mysqli_query($con,"INSERT into users values ('$userid','$reg[0]','$reg[1]','$pass','1','0')"))
            {
                /*
                $verificationCode = md5(uniqid("#Road@i,m,z@Assist#", true));
                $verificationLink = "http://facultylinked.com/hb42dqxm37jb/support_tm/testfiles/fl/signup/activate.php?code=" . $verificationCode . "&email=" . $userEmail;
                $subject = "Verification Link | RoadAssist";
                $recipient_email = $reg[1];
                $body = "Hi $reg[0]\nWelcome to RoadAssist!\nThank you for registering! To complete the activation of your account please click the following link:\n\n$verificationLink\nKindly ignore this message if you haven't used your email id to sign up to RoadAssist\nRegards,\nTeam RoadAssist";
                mail($recipient_email, $subject, $body, 'From: RoadAssist <no-reply@RoadAssist.com>');
                */

                echo '<div class="col-sm-3"></div><div class="col-sm-6">';
                echo "<div class=\"alert alert-success\" role=\"alert\">";
                echo "<center>Thank you! We have send a confirmation mail to $reg[1]. Please confirm your mail to login!</center>";
                echo "</div></div><br><br>";
            }
            else
            {
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo "Oops! Something went wrong. Please try again!";
                echo "</div>";
            }
            mysqli_close($con);
            return true;                
        }


    }


    function Login()
    {
        if(empty($_POST['username']))
        {
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Email cannot be empty!</center>";
            echo "</div></div>";
            return false;
        }
        
        if(empty($_POST['password']))
        {
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Password cannot be empty!</center>";
            echo "</div></div>";
            return false;
        }
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if($this->CheckLoginInDB($username,$password))
        {
            return true;
        }   
        else
        {
            return false;
        }
    }
    

    function CheckLoginInDB($username,$password)
    {         
        $this->connection = mysql_connect("localhost","root","");
        mysql_select_db("a1115422_sivaji", $this->connection);
        $username = $this->SanitizeForSQL($username);
        $qry = "Select userid, username, password from users where username='$username' and password='$password'";
        $result = mysql_query($qry,$this->connection);

        if(!$result || mysql_num_rows($result) <= 0)
        {
            echo '<div class="col-sm-3"></div><div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>The email id and password do not match!</center>";
            echo "</div></div>";
            return false;
        }
        else
        {
            $row = mysql_fetch_assoc($result);
            if(!isset($_SESSION))
            {
                session_start();
            }
            $_SESSION['username']  = $row['userid'];
            return true;
        }
    }

    function SanitizeForSQL($str)
    {
        if( function_exists( "mysql_real_escape_string" ) )
        {
              $ret_str = mysql_real_escape_string( $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }

    function student()
    {
        $con=mysqli_connect("localhost","root","","a1115422_sivaji");
        $abc = array();
        $abc[] = $_POST["name"]; //0
        $abc[] = $_POST["lastname"]; //1
        $abc[] = $_POST["fname"]; //2
        $abc[] = $_POST['mname']; //3
        $abc[] = $_POST['dob']; //4
		$abc[] = $_POST['gender']; //5
		$abc[] = $_POST['religion']; //6
		$abc[] = $_POST['address']; //7
		$abc[] = $_POST['phone']; //8
		$abc[] = $_POST['pincode']; //9
		$abc[] = $_POST['sslc']; //10
        $abc[] = $_POST['smarks']; //11
		$abc[] = $_POST['HSC']; //12
		$abc[] = $_POST['hmarks']; //13
		$abc[] = $_POST['email']; //14
		
        if(($abc[0] || $abc[1] || $abc[2] || $abc[3] || $abc[4] || $abc[5] || $abc[6] || $abc[7] || $abc[8] || $abc[9] || $abc[10] || $abc[11] || $abc[12] || $abc[13] || $abc[14])==null)
        {
            echo '<div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Please enter necessary details!</center>";
            echo "</div></div>";
        }
        else
        {
            if(mysqli_query($con,"INSERT into registration values ('','$abc[0]','$abc[1]','$abc[2]','$abc[3]','$abc[4]','$abc[5]','$abc[6]','$abc[7]','$abc[8]','$abc[9]','$abc[10]','$abc[11]','$abc[12]','$abc[13]','$abc[14]' )"))
            {
                echo '<div class="col-sm-6">';
                echo "<div class=\"alert alert-success\" role=\"alert\">";
                echo "<center>Thank you for contacting us!</center>";
                echo "</div></div>";
                return true;
            }
            else
            {
                // echo "<div class=\"alert alert-danger\" role=\"alert\">";
                // echo "Oops! Something went wrong. Please try again!";
                // echo "</div>";
                return false;
            }
            mysqli_close($con);
            return true;
        }   
    }
	    function course()
    {
        $con=mysqli_connect("localhost","root","","a1115422_sivaji");
        $abc = array();
        $abc[] = $_POST["graduation"]; //0
        $abc[] = $_POST["degree"]; //1
        $abc[] = $_POST["department"]; //2
	 if(($abc[0] || $abc[1] || $abc[2])==null)
        {
            echo '<div class="col-sm-6">';
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<center>Please enter necessary details!</center>";
            echo "</div></div>";
        }
        else
        {
            if(mysqli_query($con,"INSERT into course values ('','$abc[0]','$abc[1]','$abc[2]')"))
            {
                echo '<div class="col-sm-6">';
                echo "<div class=\"alert alert-success\" role=\"alert\">";
                echo "<center>Thank you for contacting us!</center>";
                echo "</div></div>";
                return true;
            }
            else
            {
                echo mysqli_error($con);
                die();
                // echo "<div class=\"alert alert-danger\" role=\"alert\">";
                // echo "Oops! Something went wrong. Please try again!";
                // echo "</div>";
                return false;
            }
            mysqli_close($con);
            return true;
        }   
    }
}
?>