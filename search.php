<?php 

include ("./inc/header.inc.php"); 

echo "searchBox";

$st=strip_tags(@$_POST['searchText']);
echo "$st,a";

$sql = "SELECT * FROM users WHERE username='$st'";
 
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
	$name = $row['username'];
	$fn = $row['first_name'];	
	$ln = $row['last_name'];

	echo "$name,$fn,$ln";
	//echo "<div class='search_to' style='font-weight: 800; color: #000; border-bottom: 1px solid #E2E2E2;'><h4>Name: $name<br/>First Name: $fn <br/>Last Name: $ln   <br/>";
}	

?>