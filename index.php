<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	
</head>
<body>

<style type="text/css">

#button{
	color:black;
	background-color: deepskyblue;
}
</style>

	<a href="logout.php">Logout</a><br></br>
	

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
	<div style="font-size:40px;text-align: center;margin: 10px;color: black; ">Contact Form and Contact List Page</div><br><br>
	
	<h2 style= "text-align: center">Add Contacts</h2>

	<form align = "center";>
    <p>Name   <input type="text" name=""></p>
	<p>Ph No  <input type="text" name=""></p>
	<p>Email  <input type="text" name=""></p>
</form>
	
<div style="text-align: center;">
<input id="button" type="submit" value="Save">
</div><br></br>

<form align = "center";>
<table width="800px"; border="1px"; height="200px" ; align = "center";>
	<tr>
		<td bgcolor="grey"> Name </td>
		<td bgcolor="grey"> Ph No </td>
		<td bgcolor="grey"> Email </td>
	</tr>
	<tr>
		<td> Virat Kohli </td>
		<td> 9191912321 </td>
		<td> viratkohli@bcci.in </td>
	</tr>
	<tr>
		<td> Dhoni </td>
		<td> 9122321122 </td>
		<td> dhoni@csk.in </td>
	</tr>
	
</table>
</form>
</body>
</html>