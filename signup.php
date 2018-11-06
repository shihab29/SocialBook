<?php

include 'inc/connection.inc.php';

$reg=@$_POST['reg'];

$first =$_POST['firstname'];
$last =$_POST['lastname'];
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$email =$_POST['email'];
$email2=$_POST['email2'];
$d=date("Y-m-d");
$u_check="";


if($reg){
	if($email==$email2){

		if($first && $last && $username && $email && $email2 && $password && $password2){

			if($password==$password2){

				$sql = "INSERT INTO users
				VALUES ('','$username','$first','$last','$email','$password','$d','0')";

				$result=mysqli_query($conn,$sql);

				die("<h2> Welcome to SocialBook</h2>Login to your account to get started....");

			}
			else{
				echo "Password Doesn't Match!";
			}
		}

		else{
			echo "Fill Up The Form First!";
		}
	}
			
	else{
		echo "Your Email Doesn't Match!";
	}
}

?>