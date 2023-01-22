<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mail=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
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
	$query1="SELECT * FROM `userregistration`";
	$result=mysqli_query($conn,$query1);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['username'])
			{
				$id=$row['id'];
			}
		} 
	}

	$query="UPDATE `userregistration` SET `fname`='$fname',`lname`='$lname',`email`='$mail',`phone`='$phone',`gender`='$gender',`date`='$date'
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
?>