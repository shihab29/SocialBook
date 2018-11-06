<?php 
include ("./inc/header.inc.php"); 

if($username){

}
else{
	die ("You must be logged in to view this!");
}
?>

<?php  
$update=@$_POST['update'];

$oldPassword =strip_tags(@$_POST['oldPassword']);
$newPassword =strip_tags(@$_POST['newPassword']);
$repeatPassword =strip_tags(@$_POST['repeatPassword']);

$oldUsername =strip_tags(@$_POST['oldUsername']);
$newUsername =strip_tags(@$_POST['newUsername']);
$repeatUsername =strip_tags(@$_POST['repeatUsername']);

if($update){
	if(($oldPassword && $newPassword && $repeatPassword) || ($oldUsername && $newUsername && $repeatUsername)){

		$sql="SELECT * FROM users WHERE username='$username' AND password='$oldPassword'";
		$result=mysqli_query($conn,$sql);

		if(!$row=mysqli_fetch_assoc($result)){
			
		}
		else{
		
			if($newPassword == $repeatPassword){

				$sql="UPDATE users SET password='$newPassword' WHERE username='$username'";
				$result=mysqli_query($conn,$sql);
			}
			else{
			echo "Check Your Password Again!";
			}
		
		}

		$sql="SELECT * FROM users WHERE username='$oldUsername'";
		$result=mysqli_query($conn,$sql);

		if(!$row=mysqli_fetch_assoc($result)){
			
		}
		else{
		
			if($newUsername == $repeatUsername){

				$sql="UPDATE users SET username='$newUsername' WHERE username='$username'";
				$result=mysqli_query($conn,$sql);
			}
			else{
			echo "Check Your Username Again!";
			}
		
		}
	}
	else{
		echo "You Must Fill The Form First!";
	}
}
?>

<form action="account_settings.php" method="post">
<h2>Edit Your Account Settings Below!</h2>
<hr/>

<h2>Update Password</h2>
Your Old Password: <input type="text" name="oldPassword" size="25" placeholder="Old Password" style="margin-left: 5px;"  /><br> </br>
Your New Password: <input type="text" name="newPassword" size="25" placeholder="New Password" /><br> </br>
Repeat Password: <input type="text" name="repeatPassword" size="25" placeholder="Repeat Password" style="margin-left: 12px;" /><br> </br>

<hr />

<h2>Update Username</h2>
Your Old Username: <input type="text" name="oldUsername" size="25" placeholder="Old Username" style="margin-left: 5px;"  /><br> </br>
Your New Username: <input type="text" name="newUsername" size="25" placeholder="New Username" /><br> </br>
Repeat Username: <input type="text" name="repeatUsername" size="25" placeholder="Repeat Username" style="margin-left: 12px;" /><br> </br>

<hr />

<input type="submit" name="update" value="Update">
</form>