<?php
$compnum=$_POST["complaintnum"];
$user=$_POST['user'];
$remark=$_POST['remark'];


$servername='localhost';
$username='root';
$password='';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	
		$sel="SELECT * FROM `inprogressomp`";
		$res1=mysqli_query($conn,$sel);
		$id='-1';
		while($row=mysqli_fetch_assoc($res1))
		{
			if($compnum==$row['compnum'])
			{
				$id=$row['id'];
			}
		}
		if($id!='-1')
		{
		
		$del="DELETE FROM `inprogressomp` WHERE `inprogressomp`.`id` = '$id'";
		$result=mysqli_query($conn,$del);
		if($result)
		{
			
			$insert="INSERT INTO `completedcomp`(`user`, `remark`, `compnum`) VALUES ('$user','$remark','$compnum')";
			$res=mysqli_query($conn,$insert);
			
			if($res)
			{
				echo "<script>window.location.assign('afteradminlogin.php');</script>";
			}
		}
		}else{
		
	echo "<script>window.location.assign('afteradminlogin.php');</script>";
		}
}
?>