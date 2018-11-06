<?php

$conn = mysqli_connect("localhost","root","","socialbook");

if(!$conn){
	die("connection failed: ".mysqli_connect_error());
}

?>