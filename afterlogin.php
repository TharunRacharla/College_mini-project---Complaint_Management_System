<?php
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
				$fname=$row['fname'];
				$lname=$row['lname'];
				$email=$row['email'];
				$phone=$row['phone'];
				$gender=$row['gender'];
				$pass=$row['pass'];
			}
		}
	}	$query1="SELECT * FROM `complaints`";
	$result=mysqli_query($conn,$query1);
	$pend=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['user'])
			{
				$cme=$row['pending'];
				if($cme=='1')
				{
					$pend++;
				}
			}
		}
	}
	
	$query1="SELECT * FROM `completedcomp`";
	$result=mysqli_query($conn,$query1);
	$compl=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['user'])
			{	
					$compl++;	
			}
		}
	}
	
	$query1="SELECT * FROM `inprogressomp`";
	$result3=mysqli_query($conn,$query1);
	$inpro=0;
	if($result3)
	{
		while($row=mysqli_fetch_assoc($result3))
		{
			if($user==$row['user'])
			{	
					$inpro++;	
			}
		}
	}
	
	
}
 
 ?>
<html>
	<head>
			<title><?php echo $user;?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="main.css">
  		
		
		<style>
			.items{
				margin-top:5px;
				margin-right:5%;
				font-family:Cooper Black;
				float:right;
			}
			.btn1{
				width:100%;
			}
			.navbar1{
				width:200px;
				border:1px solid #a79c9c42;
				padding:0px;
				box-shadow:1px 2px 3px 0.5px;;
				background-color:#e4d7d7ab;
			}
			.navbar-nav,.nav-item{
				width:100%;
			}
			img{
				margin:10px;
				margin-left:50px;
			}
			#file1,#file2,#file3{
				display:inline-block;
				font-size:160px;
				margin-left:50px;
				color:aqua;
				padding:20px;
				border-bottom:1px solid black;
			}
			#file1:hover{
				border:1px solid black;
				color:green;
			}
			#file1:hover #pen{
				display:block;
			}
			#file2:hover{
				border:1px solid black;
				color:blue;
			}
				#file2:hover #pen2{
				display:block;
			}
			#file3:hover{
				border:1px solid black;
				color:black;
			}	#file3:hover #pen3{
				display:block;
			}
			.in1{
				width:100%;
				border-radius:15px;
				padding:10px;
				font-size:18px;
				
			}
			#span{
				
				font-size:21px;
			}
			td{
				border-top:1px solid aqua;
				text-align:center;
			}
			.tr{
				width:auto;
			}
			.table,.tr{
				padding:10px;
				float;left;
				border:1px solid black;
			}
			th{
				
				text-align:center;
			}
			#file12:hover #pen{
				display:block;
			}
			#pen,#pen2,#pen3{
				display:none;
				font-size:18px;
				text-align:center;
				border-bottom:0.5px solid black;
			}
			#remark{
				color:green;
				padding:10px;
				font-size:24px;
			}
		</style>
		<script>
			function callsh()
			{
				
				if(document.getElementById("sh_menu").style.display=='block')
				{
					document.getElementById("sh_menu").style.display='none';
				}
				else {
					document.getElementById("sh_menu").style.display='block';
				}
			}
			function comp(){
				var make=document.getElementById("m_comp");
				var pend=document.getElementById("p_comp");
				var c=document.getElementById("c_comp");
				var i=document.getElementById("i_comp");
				var h=document.getElementById("h_comp");
				if(make.style.display=='block')
				{
					make.style.display='none';
					pend.style.display='none';
					h.style.display='none';
					c.style.display='none';
					i.style.display='none';
				}
				else
				{
					make.style.display='block';
					pend.style.display='block';
					h.style.display='block';
					i.style.display='block';
					c.style.display='block';
					
				}
			}
			function personal(){
				var e_info=document.getElementById("e_info");
				var c_pass=document.getElementById("c_pass");
				if(e_info.style.display=='block')
				{
					e_info.style.display='none';
					c_pass.style.display='none';
				}
				else
				{e_info.style.display='block';
					c_pass.style.display='block';
					
				}
			}
			function dashboard(){
				var dash=document.getElementById("dashboard");
				var einfo=document.getElementById("editinfo");
				var mcom=document.getElementById("makecomplaint");
				var pending=document.getElementById("pending");
				var history=document.getElementById("history");
				var changepass=document.getElementById("changepass");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				changepass.style.display='none';
				if(dash.style.display=='block')
				{
					dash.style.display='block';
				}
				else
				{dash.style.display='block';
					
				}
			}
			function editinfo()
			{
				var einfo=document.getElementById("editinfo");
				var dash=document.getElementById("dashboard");
				var mcom=document.getElementById("makecomplaint");
				var pending=document.getElementById("pending");
				var history=document.getElementById("history");
				var changepass=document.getElementById("changepass");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				dash.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				changepass.style.display='none';
					if(einfo.style.display=='block')
				{
					einfo.style.display='block';
				}
				else
				{einfo.style.display='block';
					
				}
			}
			function makecomplaint()
			{
				var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var dash=document.getElementById("dashboard");
				var pending=document.getElementById("pending");
				var history=document.getElementById("history");
				var changepass=document.getElementById("changepass");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				changepass.style.display='none';
				
					if(mcom.style.display=='block')
				{
				}
				else
				{mcom.style.display='block';
					
				}
			}
			function pending()
			{
					var pending=document.getElementById("pending");
					var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var dash=document.getElementById("dashboard");
				var history=document.getElementById("history");
				var changepass=document.getElementById("changepass");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				history.style.display='none';
				changepass.style.display='none';
					if(pending.style.display=='block')
				{
					pending.style.display='block';
				}
				else
				{pending.style.display='block';
					
				}
			}
			function history()
			{	var history=document.getElementById("history");
			var pending=document.getElementById("pending");
					var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var dash=document.getElementById("dashboard");
				var inpro=document.getElementById("inpro");
				var c=document.getElementById("completed");
				c.style.display='none';
				inpro.style.display='none';
				var changepass=document.getElementById("changepass");
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				changepass.style.display='none';
					if(history.style.display=='block')
				{
					history.style.display='block';
				}
				else
				{
					history.style.display='block';
				}
				
			}
			function changepass()
			{
				var changepass=document.getElementById("changepass");
				var history=document.getElementById("history");
			var pending=document.getElementById("pending");
					var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var inpro=document.getElementById("inpro");
				inpro.style.display='none';
				var dash=document.getElementById("dashboard");
				var c=document.getElementById("completed");
				c.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
					if(changepass.style.display=='block')
				{
					changepass.style.display='block';
				}
				else
				{
					changepass.style.display='block';
				}
			}
			function completed(){
				var changepass=document.getElementById("changepass");
				var history=document.getElementById("history");
				var pending=document.getElementById("pending");
				var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var inpro=document.getElementById("inpro");
				var dash=document.getElementById("dashboard");
				var c=document.getElementById("completed");
				changepass.style.display='none';
				inpro.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				if(c.style.display=='block')
				{
					c.style.display='block';
				}
				else
				{
					c.style.display='block';
				}
			}
			function inpro(){
				var changepass=document.getElementById("changepass");
				var history=document.getElementById("history");
				var pending=document.getElementById("pending");
				var mcom=document.getElementById("makecomplaint");
				var einfo=document.getElementById("editinfo");
				var inpro=document.getElementById("inpro");
				var dash=document.getElementById("dashboard");
				var c=document.getElementById("completed");
				changepass.style.display='none';
				c.style.display='none';
				dash.style.display='none';
				einfo.style.display='none';
				mcom.style.display='none';
				pending.style.display='none';
				history.style.display='none';
				if(inpro.style.display=='block')
				{
					inpro.style.display='block';
				}
				else
				{
					inpro.style.display='block';
				}
			}
		</script>
	</head>
	<body>
				<nav class="navbar-nav nav2 navbar-expand-sm bg-primary">
		
<i class="fa fa-reorder" onclick="callsh()" style="cursor:pointer;font-size:24px;margin:10px 2px 0px 20px;color:white"></i>		
		<div class="nav-item item1" style="margin-left:5%">
		<h3 style="color:white"><?php echo $fname." ".$lname; ?></h3>
		</div>
		
	
			<div class="nav-item items"  style="margin-left:50%;">
			<a class="btn btn-danger" title="Click to Logout" href="userlogin1.html">LOGOUT</a>
		</div>
		</nav>
		<nav  class="navbar navbar1 bg-light" style="float:left;margin-top:0px;display:block;
				background-color:#e4d7d7ab;" id="sh_menu">
			<!-- Links -->
  <ul class="navbar-nav" style="width:100%;background-color:#17a2b86e;">
			  <li class="nav-item" >			
		<img src="user.png" width="90px" height="80px">
		   </li>
    <li class="nav-item"  >
      <a class="btn btn-dark btn1" onclick="dashboard()" href="#">Dashboard</a>
    </li><br />
    <li class="nav-item">
      <a class="btn btn-dark btn1" onclick="comp()" href="#">Complaint</a>
    </li>
	 <li class="nav-item" style="display:none;" id="m_comp">
      <a class="btn btn-dark btn1" onclick="makecomplaint()" href="#">Make Complaint</a>
    </li>
	
    <li class="nav-item" >
      <a class="btn btn-dark btn1" onclick="completed()" style="display:none;" id="c_comp" href="#">Completed</a>
    </li>
	
    <li class="nav-item" >
      <a class="btn btn-dark btn1" onclick="inpro()" style="display:none;" id="i_comp" href="#">Inprogress</a>
    </li>
    <li class="nav-item" >
      <a class="btn btn-dark btn1" onclick="pending()" style="display:none;" id="p_comp" href="#">Pending</a>
    </li>
	<li class="nav-item" >
      <a class="btn btn-dark btn1" onclick="history()" style="display:none;" id="h_comp" href="#">Complaint history</a>
    
	</li>
	    <li class="nav-item" >
      <a class="btn btn-dark btn1" onclick="personal()" href="#">Personal Info</a>
    </li>
	    <li class="nav-item">
      <a class="btn btn-dark btn1" onclick="editinfo()" style="display:none;" id="e_info" href="#">Edit Info</a>
    </li>
	    <li class="nav-item">
      <a class="btn btn-dark btn1" onclick="changepass()" style="display:none;" id="c_pass" href="#">Change password</a>
    </li>
	  
  </ul>
		</nav>
		<div id="main" style="width:78%;float:left;" >
			<!----------------------------------------------------------------------------------------DASHBOARD-->
			
			<div class="" id="dashboard" style="width:100%;display:block;padding:20px;">
			<h4>>Dashboard<hr /></h4>
				<div id="file1" onclick="pending()" style="cursor:pointer;">
					<i class="fa fa-file-text" style=""></i>
					<p id="file12" style="display:block;font-size:15px;text-align:center;">Pending complaints<div id="pen"><?php echo $pend; ?></div></p>
				</div>
					<div id="file2" onclick="inpro()" style="cursor:pointer;">
						<i class="fa fa-file-text" style=""></i>
						<p id="file22" style="display:block;font-size:15px;text-align:center;">in progress complaints<div id="pen2"><?php echo $inpro; ?></div></p>
					</div>
						<div id="file3" onclick="completed()" style="cursor:pointer;">
							<i class="fa fa-file-text" style=""></i>
							<p id="file32" style="display:block;font-size:15px;text-align:center;">Completed complaints<div id="pen3"><?php echo $compl; ?></div></p>
						</div>
			</div>
			
			<!----------------------------------------------------------------------------------------DASHBOARD-->
			<!----------------------------------------------------------------------------------------editinfo-->
			<div class="" id="editinfo" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>Personal Information<hr /></h4>
				<form class="form" action="userupdateinfo" method="POST" style="width:100%;">
					<span id="span">First Name</span><input type="text"  name="fname" class="form-control in1" placeholder="First name" value="<?php echo $fname; ?>"><br />
					<span id="span">Last Name</span><input type="text" name="lname" class="form-control in1" placeholder="Last name" value="<?php echo $lname; ?>"><br />
					<span id="span">Email</span><input type="text" name="email" class="form-control in1" placeholder="Email" value="<?php echo $email; ?>"><br />
					<span id="span">Phone number</span><input type="text" name="phone" class="form-control in1" placeholder="Phone number" value="<?php echo $phone; ?>"><br />
					<span id="span">Gender</span>
					<select name="gender" class="form-control in1" style="padding:2px;"  value="<?php echo $gender; ?>">
						<option>Male</option>
						<option>Fe Male</option>
					</select><br />
					<input type="submit"  class="btn btn-success " style="width:auto ;padding:10px;padding-left:50px;padding-right:50px;"  value="save"><br />
				</form>
			</div>
			
			<!----------------------------------------------------------------------------------------editinfo-->
						<!----------------------------------------------------------------------------------------makecomp-->
			<div class="" id="makecomplaint" style="width:100%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>Make a complaint<hr /></h4>
				<form class="form" action="usermakecomp.php" method="POST" style="width:100%;" enctype="multipart/form-data">
					<span id="span2">Category</span>
					<select id="category" name="category" style="width:30%;border-radius:12px;height:37px;"> 
						<option>Other</option>
						<option>Faculty</option>
						<option>Student</option>
					</select>
					<span id="span2" style="margin-left:20px;">Sub Categry</span>
					<input type="text" name="subcategory" style="width:30%;border-radius:5px;height:37px; border:.8px solid aqua;" placeholder="Please Enter a subcategory..">
					<br /><br />
					<span id="span2">Nature of Complaint</span><input type="text" name="nature" class="form-control in2" placeholder="Regarding to ...."><br />
					<span id="span">Complaint</span>
					<textarea name="comp" class="form-control in1" placeholder="Feel free to write. Your complaint is secure." style="height:200px;"></textarea><br />
					<br /><span id="span">Regarding File (If any) Max Size 2Mb</span><input name="f2" type="file" class="form-control" >
				<br />
					<input type="submit"  class="btn btn-success " style="width:auto ;padding:10px;padding-left:50px;padding-right:50px;"  value="Send"><br />
				</form>
			</div>
			
			<!----------------------------------------------------------------------------------------makecomp-->
			<!----------------------------------------------------------------------------------------pending-->
			<div class="" id="pending" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>Pending Information<hr /></h4>
				<?php
	$query1="SELECT * FROM `complaints`";
	$result=mysqli_query($conn,$query1);
	$num=0;
	if($result)
	{						echo "<table class='table'><tr class='tr'>";
									echo "<th>Number</th><th>Category</th><th>Sub-Category</th><th>Nature</th><th>Date & Time</th><th>File</th><th>Complaints</th></tr>";
									$num=0;
		while($row=mysqli_fetch_assoc($result))
		{
			if($user==$row['user'])
			{
				$cme=$row['pending'];
				if($cme=='1')
				{							$num++;
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<tr class='tr'>
											<td>$num</td>
											<td>$cate</td>
											<td>$subcate</td>
											<td>$nat</td>
											<td>$da</td>";
											if($fil==""||$fil=='0')
											{
												
											echo "<td>No file</td>";
											}
											else{
											echo "<td><a href='$fil' target='_blank'>view file</a></td>";
											}
											echo "<td style='width:200px;'>";
											echo $co;
											echo "</td>
											</tr>";
				}
			}
		}
		echo "</table>";
	}
	if($num==0)
	{
		echo "Still there is no record";
	}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------pending-->
			<!----------------------------------------------------------------------------------------inpro-->
			<div class="" id="inpro" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>Inprogress Complaints<hr /></h4>
				<?php
				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seeme="SELECT * FROM `inprogressomp`";
				$resolt=mysqli_query($conn,$seeme);
					
					if($resolt)
					{
						while($cmp=mysqli_fetch_assoc($resolt))
						{
							$tellme=$cmp['user'];
						if($user==$tellme)
						{
							$inid=$cmp['compnum'];
							$remark=$cmp['remarks'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$inid)
										{
											$num++;
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>											
											Number:$num			
											</h5>
											<h6>
											 Remark :<span id='remark'>$remark</span><br />
											";
											echo"File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "
											 Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
						}
					}
	if($num==0)
	{
		echo "Still there is no record";
	}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------inpro-->
			<!----------------------------------------------------------------------------------------completed-->
			<div class="" id="completed" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>Completed Complaints<hr /></h4>
				<?php
				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `completedcomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($coomp=mysqli_fetch_assoc($reso))
						{
							$tellme=$coomp['user'];
						if($user==$tellme)
						{
							$cid=$coomp['compnum'];
							$remark=$coomp['remark'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$cid)
										{
											$num++;
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>											
											Number:$num			
											</h5>
											<h6>
											 Remark :<span id='remark'>$remark</span><br />
											";
											echo"File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "
											 Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
						}
					}		
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------completed-->
			<!----------------------------------------------------------------------------------------history-->
			<div class="" id="history" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>History Information<hr /></h4>
				<?php
					$conn=mysqli_connect($servername,$username,$password,$dbname);
					if($conn)
						{
							$query1="SELECT * FROM `complaints`";
							$result=mysqli_query($conn,$query1);
							if($result)
								{
									$num=0;
									echo "<table class='table'><tr class='tr'>";
									echo "<th>Number</th><th>Category</th><th>Sub-Category</th><th>Nature</th><th>Date & Time</th><th>File</th><th>Complaints</th></tr>";
									while($row=mysqli_fetch_assoc($result))
									{ 
										if($user==$row['user'])
										{$num++;
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<tr class='tr'>
											<td>$num</td>
											<td>$cate</td>
											<td>$subcate</td>
											<td>$nat</td>
											<td>$da</td>";
											if($fil==""||$fil=='0')
											{
												
											echo "<td>No file</td>";
											}
											else{
											echo "<td><a href='$fil' target='_blank'>view file</a></td>";
											}
											echo "<td style='width:200px;'>";
											echo $co;
											echo "</td>
											</tr>";
											
										}
									}
									echo "</table>";
									if($num==0)
									{
										echo "NO complaint made yet.";
									}
								}
						}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------history-->
			<!----------------------------------------------------------------------------------------changepass-->
			<div class="" id="changepass" style="width:90%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(32, 76, 5, 0.1);border:1px solid aqua;">
				<h4>>Change Password<hr /></h4>
				<form class="form" action="userchangepass.php" method="POST" style="width:100%;">
				
					<span id="span">Enter OLD password</span><input type="password"  name="oldpass" class="form-control in1" placeholder="Old Password..."><br />		
					<span id="span">Enter new Password</span><input type="password" name="newpass" class="form-control in1" placeholder="New Password..."><br />
					<span id="span">Re-enter new password</span><input type="password" name="renewpass" class="form-control in1" placeholder="Re-enter New Password..."><br />
					
					<input type="submit"  class="btn btn-success " style="width:auto ;padding:10px;padding-left:50px;padding-right:50px;"  value="save"><br />
				</form>
			</div>
			
		</div>

	</body>
</html>