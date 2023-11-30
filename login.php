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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		background-color: #a15151;
		border: none;
	}

	#box{
		
		top: 60%;
    	left: 50%;
		transform: translate(-50%, -50%);
		position: absolute;
		background-color: white;
		margin: 0 auto;
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
			<div style="font-size: 30px;margin: 0px;color: black;">Login</div><br></br>
			<a style="color:black">Username:</a>
			<input id="text" type="text" name="user_name"><br><br>
			<a style="color:black">Password:</a>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>
			<a style="color:black"> Don't have an account?</a>
			<a href="signup.php" style="color:#a15151">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>