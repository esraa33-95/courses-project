<?php
  include_once('include/checklogged.php');
  $id = $_GET['id'];
if($_SERVER['REQUEST_METHOD']=== "POST")
{
	include_once('include/conn.php');
	
	if(isset($_POST['update']))
	{
	try{
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
		$active = isset($_POST['active']);

		$sql = "UPDATE `users` SET `fullname`=?,`username`=?,`email`=?,`password`=?,`active`=? where `id`=?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$fullname,$username,$email,$password,$active,$id]);
		$msg = "updated Successfully";
		$alertType = "alert-success";
	  } catch(PDOException $e) {
		$msg = $e->getMessage();
		$alertType = "alert-danger";
	  }
    }

	try{
		$sql = "SELECT * FROM `users` WHERE id = ?";
		$stmts = $conn->prepare($sql);
		$stmts->execute([$id]);
		

		$result = $stmts->fetch();
		
		$full = $result['fullname'];
		$user = $result['username'];
		$email1 =  $result['email'];
		$active1 = $result['active'];
		$password1 =$result['password'];

	} catch(PDOException $e) {
		$msg = $e->getMessage();
		$alertType = "alert-danger";
	}

}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Education Admin | Edit User</title>

	<?php include_once('components/head.php');?>
</head>

<body class="nav-md">
<?php include_once('components/nav.php');?>
					<!-- /menu profile quick info -->

					
					<!-- sidebar menu -->
					<?php include_once('components/sidebar.php');?>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<?php include_once('components/menufooter.php');?>

			<!-- top navigation -->
			<?php include_once('components/topnav.php');?>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Users</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit User</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								
								<div class="x_content">
									<br />
									
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" class="form-control" name="fullname" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="user-name" name="username" required="required" class="form-control" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="email" class="form-control" type="email" name="email" required="required" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active" >
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" id="password" name="password" required="required" class="form-control" >
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button" name="cancel">Cancel</button>
												<button type="submit" class="btn btn-success" name="update">Update</button>
											</div>
										</div>
										
									</form>
									
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<?php include_once('components/footercontent.php');?>

	<!-- jQuery -->
	<?php include_once('components/js.php');?>

</body></html>
