<?php

	session_start();
 
	require_once 'config.php';
 
	if(isset($_POST['register'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$name = $_POST['name'];
			$password = $_POST['email'];
			$password = $_POST['phone'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `member` WHERE `username`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['mem_id'];
				header("location: home.php");
			} else{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'index.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'index.php'</script>
			";
		}
	}
?>