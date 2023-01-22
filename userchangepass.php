<?php
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];

$date= date("F j, Y, g:i a"); 
$servername='localhost';
$username='root';
$password='';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	$query1="SELECT * FROM `userlogininfo`";
	$result=mysqli_query($conn,$query1);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$user=$row['user'];
		}
	}
	$query="SELECT * FROM `userregistration`";
	$result=mysqli_query($conn,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['username'])
			{
				$id=$row["id"];
				$pass=$row['pass'];
			}
		} 
	}
	
	if($oldpass==$pass)
	{
	$query="UPDATE `userregistration` SET `pass`='$newpass',`date`='$date'
	 WHERE `userregistration`.`id` = '$id'";
	$result=mysqli_query($conn,$query);
	if($result)
	{
			echo "<script>window.location.assign('afterlogin.php');</script>";
	}
	else
	{
		echo "error";
	}
	}
	else
	{
		echo "<script>alert(' You Enter wrong password ');
		window.location.assign('afterlogin.php');</script>";
	}
}
?>