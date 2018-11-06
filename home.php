<?php  
	include ("./inc/header.inc.php");

	if($username){

	}
	else{
		die ("You must be logged in to view this!");
	}

		$sql = "SELECT * FROM posts order by id DESC";
       
       	$result=mysqli_query($conn,$sql);

		while($row=mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$body = $row['body'];	
			$date_added = $row['date_added'];
			$added_by = $row['added_by'];
			$user_posted_to = $row['user_posted_to'];

			echo "<div class='posted' style='font-weight: 800; color: #000; border-bottom: 1px solid #E2E2E2;'><h4>$added_by</h4><h1>$body</h1> <h3>Date: $date_added <h3/></div><br />";
		}
	
?>