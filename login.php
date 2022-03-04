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
  
	<title>Sign In</title>

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
		background-color: cyan ;
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
		

			<div style="font-size:40px;text-align: center;margin: 10px;color: black; ">Sign In</div><br><br>

            <div style="text-align: center; color: grey;">
			<p class="login-register-text">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>

			<mat-form-field class="full-width" appearance="outline">
            <mat-label>Email</mat-label>
			

			<input id="text" type="text" name="user_name"><br><br>

			<mat-form-field class="full-width" appearance="outline">
            <mat-label>Password</mat-label>

			<input id="text" type="password" name="password"><br><br>
			
			<div style="text-align: right ;">
			<a href="#">Forgot Password?</a><br><br>
			</div>

			<div style="text-align: center; ">
			<input id="button" type="submit" value="Sign In"><br><br>
			</div>
			
		</form>
	</div>
</body>
</html>