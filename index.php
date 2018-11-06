<?php include ("./inc/header.inc.php"); ?>

<?php

$reg=@$_POST['reg'];

$first =strip_tags(@$_POST['firstname']);
$last =strip_tags(@$_POST['lastname']);
$username=strip_tags(@$_POST['username']);
$password=strip_tags(@$_POST['password']);
$password2=strip_tags(@$_POST['password2']);
$email =strip_tags(@$_POST['email']);
$email2=strip_tags(@$_POST['email2']);
$d=date("Y-m-d");
$u_check="";


if($reg){
	if($email==$email2){

		if($first && $last && $username && $email && $email2 && $password && $password2){

			if($password==$password2){

				$sql = "INSERT INTO users
				VALUES ('','$username','$first','$last','$email','$password','$d','0','')";

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

//User Login Code

$login=@$_POST['login'];

if(isset($_POST["user_login"]) && isset($_POST["password_login"])){
	$user_login=$_POST['user_login'];
	$password_login=$_POST['password_login'];

	$sql="SELECT * FROM users WHERE username='$user_login' AND password='$password_login'";
	$result=mysqli_query($conn,$sql);

	if(!$row=mysqli_fetch_assoc($result)){
		echo "Your username or password is incorrect!";
	}
	else{
		
		$_SESSION["user_login"]=$user_login;
		header("Location: home.php");
		//echo "You are logged in!";

		exit();
		
	}
}

?>
		
		<table>
			<tr>
				<td width="60%" valign="top">
					<h2>Already a Member? Sign in Below!</h2>
					<form action="index.php" method="POST">
						<input type="text" name="user_login" size="25" placeholder="Username" /><br></br>
						<input type="password" name="password_login" size="25" placeholder="Password" /><br></br>
						<input type="submit" name="login" value="Login" />
					</form>
					<br/>
					<br/>
					<br/>

				</td>
				<td width="40%" valign="top">
					<h2>Sign Up Below.</h2>
					<form action="#" method="POST">
						<input type="text" name="firstname" size="25" placeholder="First Name" /><br> </br>
						<input type="text" name="lastname" size="25" placeholder="Last Name" /><br> </br>
						<input type="text" name="username" size="25" placeholder="User Name" /><br> </br>
						<input type="text" name="email" size="25" placeholder="Email Address" /><br> </br>
						<input type="text" name="email2" size="25" placeholder="Email Address(again)" /><br> </br>
						<input type="password" name="password" size="25" placeholder="Password"/><br> </br>
						<input type="password" name="password2" size="25" placeholder="Password(again)"/><br> </br>
						<input type="submit" name="reg" value="Sign Up">
					</form>
				</td>
			</tr>
		</table>
		
<?php include("./inc/footer.inc.php"); ?>

		