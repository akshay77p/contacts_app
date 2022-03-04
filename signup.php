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
	<title>Sign Up</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: cyan;
		border: none;
	}

	#box{

		background-color: white;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
		
			<div style="font-size: 40px; text-align: center; margin: 10px ;color: black;">Sign Up</div><br><br>

			<div style="text-align: center; color: grey;">
			<p class="login-register-text">Already have an account? <a href="login.php">Sign in</a></p><br><br>
			</div>

			<mat-form-field class="full-width" appearance="outline">
            <mat-label>Email</mat-label>

			<input id="text" type="text" name="user_name"><br><br>

			<mat-form-field class="full-width" appearance="outline">
            <mat-label>Password</mat-label>
			<input id="text" type="password" name="password"><br><br>
			
			<div style="text-align: center;">
			<input id="button" type="submit" value="Signup">
			</div>
			<p style="text-align: center; font-size: 14px; color: grey;">By clicking the "Sign Up" button you are creating an account, and you agree to the Terms of Use.</p>
			
		</form>
	</div>
</body>
</html>