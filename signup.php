<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
<img src="Background .jpg" alt="Background" width="100%" >
<img id="header-image" src="quizz.jpg" alt="Quiz Image">
	<style type="text/css">
	
	#text{
		font-family: 'Arial', sans-serif;
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{
		font-size:16px;
		padding: 10px;
		width: 100px;
		color: black;
		background-color: #e9c8aa;
		border: none;
	}

	#box{
		top: 60%;
    	left: 50%;
		transform: translate(-50%, -50%);
		position: absolute;
		background-color: black;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	#header-image {
      width: 380px;
      height: 250px;
      position: absolute;
      top: 7px; /* Adjust the top distance as needed */
      left: 50%;
      transform: translateX(-50%);
    }

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 30px;margin: 0px;color: white;">Signup</div><br></br>
            <a style="color:white">Username:</a>
			<input id="text" type="text" name="user_name"><br><br>
			<a style="color:white">Password:</a>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>
		<a style="color:white"> Already have an account?</a>
		<a href="login.php" style="color:#e9c8aa"> Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>