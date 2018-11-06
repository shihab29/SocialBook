<?php include ("./inc/header.inc.php"); 
if($username){

}
else{
	die ("You must be logged in to view this!");
}
?>
<?php
if (isset($_GET['u'])) {
	$username = ($_GET['u']);
	if (ctype_alnum($username)) {
		$check = mysqli_query($conn, "SELECT username, first_name FROM users WHERE username='$username'");
		if (mysqli_num_rows($check)===1) {
			$get = mysqli_fetch_assoc($check);
			$username = $get['username'];
			$firstname = $get['first_name'];
			
		}
		else
		{
		echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/SdSocialBook/index.php\">";
		exit();
		}
	}
}

//post something

$send=@$_POST['send'];
$dt=date("Y-m-d");


$post =strip_tags(@$_POST['post']);

if($send){
	if($post!=""){
	$sql = "INSERT INTO posts
			VALUES ('','$post','$dt','$username','test123')";

			$result=mysqli_query($conn,$sql);
	}
	else{
		echo "You should post something first!";
	}
}

//upload an image

$imageUpload = @$_POST['imageUpload'];
$imagePath = strip_tags(@$_POST['imagePath']);

if($imageUpload){
	if($imagePath!=""){
			$sql="UPDATE users SET image='$imagePath' WHERE username='$username'";
			$result=mysqli_query($conn,$sql);
			echo "Upload complete!";
	}
	else{
		echo "somethings wrong!";
	}
}


?>

<div class="postForm" style=" float: right; width: 560px; height: 80px; background-color: #F3F6F9; padding: 5px;">
	<form action="profile.php" method="post">
		<textarea id="post" name="post" rows="3" cols="79"></textarea>
		<input type="submit" name="send" value="Post" style="background-color: #DCE5EE; float: right; border: 1px solid #666; color:#666;height:70px; width: 65px;margin-top: 0px;" />
	</form>
</div>
<div class="profilePosts" style=" float: right; width: 560px; height: 414px; background-color: #DCE5EE; padding: 5px;">
	<?php
		
		$sql = "SELECT * FROM posts WHERE added_by='$username' order by id DESC";
       
       	$result=mysqli_query($conn,$sql);

		while($row=mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$body = $row['body'];	
			$date_added = $row['date_added'];
			$added_by = $row['added_by'];
			$user_posted_to = $row['user_posted_to'];

			echo "<div class='posted_by' style='font-weight: 800; color: #000;'><a href='http://localhost/SdSocialBook/profile.php?u=$username'>$added_by</a> -$date_added -</div><h2>$body</h2><br />";
		}
	
		
	?>
</div>

<img src="img/<?php 
	$sql="SELECT image FROM users WHERE username='$username'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_assoc($result)){
		$im=$row['image'];
		echo "$im";
	}
 ?>" height="250" width="200" alt="<?php echo $username; ?>'s Profile photo" title="<?php echo $username; ?>'s Profile"/>
<br />
<form method="post" action="#">
	<input type="text" name="imagePath" id="noneText" style="	background-color: #FFFFFF;border: 1px solid #E2E2E2;font-size: 15px;padding: 5px;width: 190px;margin-bottom: 3px;margin-top: 3px;outline: none;" placeholder="Image Name"><br />
	<input type="submit" name="imageUpload" value="Upload Image">
</form>

<div class="textHeader"> <?php echo $username; ?>'s Profile</div>
<div class="profileLeftSideContent" style="width: 194px; padding-right: 0px; padding-bottom: 5px; padding-top: 5px; padding-left: 0px; height: 200px;">Some content about this persons profile ...</div>
<div class="textHeader" style="width: 190px; height: 15px; padding: 5px; border-bottom: 1px solid #DCE5EE; font-weight: 600;"> <?php echo $username; ?>'s Friends</div>
<div class="profileLeftSideContent">
	<img src="#" height="50" width="40"/>&nbsp;&nbsp;
	<img src="#" height="50" width="40"/>&nbsp;&nbsp;
	<img src="#" height="50" width="40"/>&nbsp;&nbsp;
	<img src="#" height="50" width="40"/>&nbsp;&nbsp;
	<img src="#" height="50" width="40"/>&nbsp;&nbsp;
	<img src="#" height="50" width="40"/>&nbsp;&nbsp;
	<img src="#" height="50" width="40"/>&nbsp;&nbsp;
	<img src="#" height="50" width="40"/>&nbsp;&nbsp;
</div>