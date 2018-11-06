<?php 
include 'inc/connection.inc.php'; 

session_start();
if(!isset($_SESSION["user_login"])){
	$username="";
}
else{
	//header("Location: home.php");
	$username=$_SESSION["user_login"];
}

?>


<!doctype html>
<html>
	<head>
		<title> SocialBook </title>
		<!--<link rel="stylesheet" type="text/css" href="./css/style.css" />-->
		<link rel="stylesheet" href="style/style.css" media="all" />
	</head>

	<body>
		<div class="headerMenu">
			<div id="wrapper">
				<div class="logo">
					<img src="img/logo.png" />
				</div>
				
				<?php  
					if(!$username){
						echo '<div id="menu">
							<a href="index.php" />SIGN UP</a>
						</div>'
						;
					}
					else{
						echo '<div id="menu">
							<a href="search.php" >SEARCH</a>
							<a href="messege.php" >MSG</a>
							<a href="home.php" >HOME</a>
							<a href="profile.php" >PROFILE</a>
							<a href="account_settings.php" />SETTINGS</a>
							<a href="logout.php" />LOG OUT</a>
						</div>';

						echo '<div class="search_box">
						<form action="search.php" method="POST" id="search">
							<input type="text" name="searchText" size="10" placeholder="Search ..."/>
						</form>
					</div>'; 
					}
				?>
			</div>
		</div>
		<div id="bodyWrapper" style="background-color: #EFF5F9; margin-left: auto; margin-right: auto; width: 850px; height: auto; border-left: 1px solid #DCE5EE; border-right: 1px solid #DCE5EE; padding-left: 10px; padding-right: 10px;">
		<br />