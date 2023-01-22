<?php

$servername='localhost';
$username='root';
$password='';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	$query1="SELECT * FROM `complaints`";
	$result=mysqli_query($conn,$query1);
	$pend=0;
	$full=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			
				$cme=$row['pending'];
				if($cme=='1')
				{
					$pend++;
				}
			
		}
	}
	$full+=$pend;
	$query1="SELECT * FROM `completedcomp`";
	$result=mysqli_query($conn,$query1);
	$compl=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
					$full++;
					$compl++;	
			
		}
	}
	$query1="SELECT * FROM `inprogressomp`";
	$result=mysqli_query($conn,$query1);
	$inpro=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
				
					$inpro++;	
					$full++;
			
		}
	}
}
?>
<html>
	<head>   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="main.css">
  <title>Complaint system</title>
  
  
  
  <style>
	input{
		margin:20px;
	}
	.nav-item{
		padding:0px;
			width:100%;
	}
	.btn1{
		width:200px;
		padding:20px;
	}
	.btn1:hover{
		background:#17a2b8;
	}
	
	.navbar ul{
		padding:0px;
		border:1px solid white;
		width:100%;
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
			.tr{
				width:auto;
				float;left;
				border:1px solid black;
			}
			h5 {
				padding:15px;
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
			#specialchk
			{
				background-color:blue;
				color:white;
				float:right;
				border:1px solid blue;
				border-radius:10px;
				width:auto;
			}
			h6{
				padding:10px;
				border-bottom:1px solid black;
				border-left:1px solid black;
				border-right:1px solid black;
			}
			#span{
				color:green;
				padding:5px;
			}
			.now{
				display:none;
			}
			#remark{
				color:grey;
				font-size:20px;
			}
			.thead{
				font-size:large;
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
			function comp()
			{
				var p=document.getElementById("p_comp");
				var f=document.getElementById("f_comp");
				var i=document.getElementById("i_comp");
				if(document.getElementById('ccomp').style.display=='block')
				{
					p.style.display='none';
					document.getElementById('ccomp').style.display='none';
					f.style.display='none';
					i.style.display='none';
					
				}
				else
				{
					p.style.display='block';
					document.getElementById('ccomp').style.display='block';
					f.style.display='block';
					i.style.display='block';
					
				}
			}
			function manageuser(){
				var l=document.getElementById("l_user");
				if(l.style.display=='none')
				{
					l.style.display='block';
					document.getElementById('a_user').style.display='block';
				}
				else
				{
					l.style.display='none';
					document.getElementById('a_user').style.display='none';
					
				}
			}
			function dashboard()
			{
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				if(dash.style.display=='block')
				{
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
					pend.style.display='none';
				}
				else
				{
					dash.style.display='block';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
					pend.style.display='none';
				}
			}
			function pending()
			{
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				if(pend.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					pend.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
				function complcomp()
			{
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				if(comp.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					pend.style.display='none';
				}
				else
				{
					
					comp.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					pend.style.display='none';
				}
				
			}	
			function inpro()
			{
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				if(inpro.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					inpro.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					comp.style.display='none';
				}
				
			}
				
			function full()
			{
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				if(full.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					full.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
			function auser()
			{
				var auser=document.getElementById('alluser');
					var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				if(auser.style.display=='block')
				{
					
					dash.style.display='none';
					luser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				else
				{
					auser.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}function luser()
			{
				var luser=document.getElementById('logindata');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var auser=document.getElementById('alluser');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				if(luser.style.display=='none')
				{
					dash.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					auser.style.display='none';
					comp.style.display='none';
					
					document.getElementById("logindata").style.display="block";
				}
				else
				{
					
					document.getElementById("logindata").style.display="block";
					
					dash.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
	</script>
  </head>
  <body>
  
  
		<nav class="navbar-nav navbar-expand-sm bg-info" style="margin:0px;padding:0px;">
		
<i class="fa fa-reorder" onclick="callsh()" style="cursor:pointer;font-size:24px;margin:20px 2px 0px 20px;color:white"></i>
		<div class="nav-item item1" style="margin-left:5%">
		<img src="admin.png" style="border-radius:15%;margin-left:25%;float:left" width="70px" height="80px">
				<h3  style="float:left;cursor:pointer;margin:10px 2px 0px 20px;">CS | Admin</h3>
						
		</div>
				<div style="width:50%" >
				<a class="btn btn-danger" style="float:right;padding-left:30px;padding-right:30px;margin:10px;" href="adminlogin1.html">Logout</a>
		</div>
		
		</nav>
		<nav  class="navbar navbar1 bg-dark" style="float:left;margin:0px;display:block;padding:0px;box-shadow:.2px 1px 2px 1px;" id="sh_menu">
			<!-- Links -->
			<ul class="navbar-nav" style="width:100%;">
			
					
				
				<li class="nav-item" style="width:100%;border-bottom:2px solid white;" >
					<a class="btn btn-dark btn1" onclick="dashboard()" href="#">Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-dark btn1" onclick="comp()" href="#">Manage Complaints</a>
				</li>
				<li class="nav-item"  id="p_comp" style="display:none;border-top:1.2px solid white;">
					<a class="btn btn-dark btn1" onclick="pending()" href="#">Pending <br />complaints<p id="specialchk"><?php echo $pend;?></p></a>
				</li>
				<li class="nav-item" id="i_comp"  style="display:none"> 
					<a class="btn btn-dark btn1" onclick="inpro()"  href="#">In progress<p id="specialchk"><?php echo $inpro;?></p></a>
				</li>
				<li class="nav-item" id="ccomp" style="display:none;">
					<a class="btn btn-dark btn1" onclick="complcomp()"href="#">Complete <br />Complaints<p id="specialchk"><?php echo $compl; ?></p></a>
				</li>
				<li class="nav-item" id="f_comp" style="display:none;">
					<a class="btn btn-dark btn1" onclick="full()"  href="#">Full Complaint<br /> history<p id="specialchk"><?php echo $full;?></p></a>
				</li>
					
				<li class="nav-item"  style="border-top:2px solid white;">
					<a class="btn btn-dark btn1" onclick="manageuser()" href="#">Manage Users</a>
				</li>
				<li class="nav-item" id="a_user" style="display:none;border-top:1.2px solid white;">
					<a class="btn btn-dark btn1" onclick="auser()"   href="#">All users data</a>
				</li>
				<li class="nav-item" id="l_user"  style="display:none">
					<a class="btn btn-dark btn1" onclick="luser()"   href="#">User Login info</a>
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
					<div id="file2">
						<i class="fa fa-file-text" style="cursor:pointer;" onclick="inpro()"></i>
						<p id="file22" style="display:block;font-size:15px;text-align:center;">in progress complaints<div id="pen2"><?php echo $inpro; ?></div></p>
					</div>
						<div id="file3">
							<i class="fa fa-file-text" style="cursor:pointer;" onclick="complcomp()"></i>
							<p id="file32" style="display:block;font-size:15px;text-align:center;">Completed complaints<div id="pen3"><?php echo $compl; ?></div></p>
						</div>
			</div>
			
			<!----------------------------------------------------------------------------------------DASHBOARD-->
				
		
				<!----------------------------------------------------------------------------------------pending-->
			
			<div class="" id="pending" style="width:auto;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px solid aqua;">
			<h4>>Pending Complaints<hr /></h4>
				<?php
					$query1="SELECT * FROM `complaints`";
					$result=mysqli_query($conn,$query1);
						$num=0;
				
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
								{
									
									$cme=$row['pending'];
									if($cme=='1')
									{
										
										$num++;
											$id=$row['id'];
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>
											
											<form method='POST' action='solvepend1.php'>
											<input type='text' name='user' value='$usr' class='now'>
											<input type='text' name='compid' value='$id' class='now'>
											<input type='submit' value='solve it' style='float:right;margin:0px;' class='btn btn-info' >
											</form>
											
											Number:$num  
											User: $usr  
																					
											</h5>";
											echo"<h6>File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										
									}
								}
						}
											
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------pending-->
			<!----------------------------------------------------------------------------------------inprogress-->
			
			<div class="" id="inprocomp" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px solid aqua;">
			<h4>>In progress Complaints<hr /></h4>
			<?php
				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `inprogressomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($inpro=mysqli_fetch_assoc($reso))
						{
							$inid=$inpro['compnum'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$inid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>
											
											<form method='POST' action='solveinpro1.php'>
											<input type='text' name='user' value='$usr' class='now'>
											<input type='text' name='compid' value='$id' class='now'>
											<input type='submit' value='complete it' style='float:right;margin:0px;' class='btn btn-secondary' >
											</form>
											
											Number:$num  
											User: $usr  				
											</h5>";
											echo"<h6>File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
					}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------inprogress-->
			<!----------------------------------------------------------------------------------------completed-->
			
			<div class="" id="complcomp" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px solid aqua;">
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
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>											
											Number:$num  
											User: $usr  				
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
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------inprogress-->
			<!----------------------------------------------------------------------------------------full-->
			
			<div class="" id="fullhistory" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px solid aqua;">
			<h3>>Full history of Complaints<hr /></h3>
				<h4>>Pending Complaints<hr /></h4>
				<?php
					$query1="SELECT * FROM `complaints`";
					$result=mysqli_query($conn,$query1);
						$num=0;
				
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
								{
									
									$cme=$row['pending'];
									if($cme=='1')
									{
										
										$num++;
											$id=$row['id'];
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>
											
											<form method='POST' action='solvepend1.php'>
											<input type='text' name='user' value='$usr' class='now'>
											<input type='text' name='compid' value='$id' class='now'>
											<input type='submit' value='solve it' style='float:right;margin:0px;' class='btn btn-info' >
											</form>
											
											Number:$num  
											User: $usr  
																					
											</h5>";
											echo"<h6>File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										
									}
								}
						}
						
						
						//////////////////////////////////////////////////////////////////////////////////////////////////////////////
						echo "<br /br /><h4>>Inprogress Complaints<hr /></h4>";
						$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `inprogressomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($inpro=mysqli_fetch_assoc($reso))
						{
							$inid=$inpro['compnum'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$inid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>
											
											<form method='POST' action='solveinpro1.php'>
											<input type='text' name='user' value='$usr' class='now'>
											<input type='text' name='compid' value='$id' class='now'>
											<input type='submit' value='complete it' style='float:right;margin:0px;' class='btn btn-secondary' >
											</form>
											
											Number:$num  
											User: $usr  				
											</h5>";
											echo"<h6>File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
					}
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						//////////////////////////////////////////////////////////////////////////////////////////////////////////////
						echo "<br /br /><h4>>Completed Complaints<hr /></h4>";	

				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `completedcomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($coomp=mysqli_fetch_assoc($reso))
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
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>											
											Number:$num  
											User: $usr  				
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
					////////////////////////////////////////////////////////
			?>
			</div>
			
			<!----------------------------------------------------------------------------------------full-->
		
			<!----------------------------------------------------------------------------------------all-user-->
			
			<div class="" id="alluser" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px solid aqua;">
			<h4>>All Users data<hr /></h4>
				<?php
					$num=0;
					$userss="SELECT * FROM `userregistration`";
					$result786=mysqli_query($conn,$userss);
					if($result786)
					{
						while($rowuser=mysqli_fetch_assoc($result786))
						{$num++;
							$fnamen=$rowuser['fname'];
							$lnamen=$rowuser['lname'];
							$usern=$rowuser['username'];
							$mailn=$rowuser['email'];
							$phonen=$rowuser['phone'];
							$gendern=$rowuser['gender'];
							$daten=$rowuser['date'];
							echo"
							<table class='table table-striped table-info table-hover'> 
								<tr class='thead'><th>Number</th><th>$num</th></tr>
								<tr><td>First Name</td><td>$fnamen</td></tr>
								<tr><td>Last Name</td><td>$lnamen</td></tr>
								<tr><td>Username</td><td>$usern</td></tr>
								<tr><td>Email</td><td>$mailn</td></tr>
								<tr><td>Phone Number</td><td>$phonen</td></tr>
								<tr><td>Gender</td><td>$gendern</td></tr>
								<tr><td>Date</td><td>$daten</td></tr><hr /><br />
								</table>
								";
						}
					}
				
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------all-user-->
					<!----------------------------------------------------------------------------------------Login-->	
		<div class="" id="logindata" style="width:97%;float:left;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px solid aqua;">
			<h4>>Login data<hr /></h4>
				<?php
					$num=0;
					$users="SELECT * FROM `userlogininfo`";
					$result78=mysqli_query($conn,$users);
					if($result78)
					{
						while($rowuser=mysqli_fetch_assoc($result78))
						{$num++;
							$fnamen=$rowuser['fname'];
							$lnamen=$rowuser['lname'];
							$usern=$rowuser['user'];
							$daten=$rowuser['date'];
							echo"
							<table class='table table-striped table-danger table-hover'> 
								<tr class='thead'><th>Number</th><th>$num</th></tr>
								<tr><td>First Name</td><td>$fnamen</td></tr>
								<tr><td>Last Name</td><td>$lnamen</td></tr>
								<tr><td>Username</td><td>$usern</td></tr>
								<tr><td>Date</td><td>$daten</td></tr><hr /><br />
								</table>
								";
						}
					}
					
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------Login-->
			
			</div>
		
	</body>
</html>