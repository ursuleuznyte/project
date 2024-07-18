<?php
$email = $_POST['email'];

require 'db_connect.php';

    $conn = connectDB();

	$subscribe = $conn->prepare("INSERT INTO subscribers (email) VALUES(?)");
	$subscribe->bind_param("s", $email);

	try{
		$subscribe->execute();
		header("Location: index.html?dublicated=false&email=$email#subscribe-container");
		
	} catch (mysqli_sql_exception $error){
		header("Location: index.html?dublicated=true&email=$email#subscribe-container"); 
	}
	
?>
