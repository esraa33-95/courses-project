<?php

if($_SERVER['REQUEST_METHOD']==="POST")
{
	include_once('include/conn.php');
	include_once('include/uploadcar.php');
	

	if(isset($_POST['add']))
	{
		$title = $_POST['title'];
		$content = $_POST['content'];
		$meeting_date = $_POST['meeting_date'];
		$active =isset( $_POST['active']);
		$price = $_POST['price'];
		$location = $_POST['location'];
		$category =$_POST['category'];


		try{
		   $sql = "INSERT INTO `courses`(`title`, `image`, `content`, `meeting_date`, `active`, `price`, `location`,`category`) VALUES (?,?,?,?,?,?,?,?)";
		   $stmt = $conn->prepare($sql);
		   $stmt ->execute([$title,$image_name,$content,$meeting_date,$active,$price,$location,$category]);
		   $msg = "Inserted Successfully";
		   $alertType = "alert-success";
	   } catch(PDOException $e) {
		   $msg = $e->getMessage();
		   $alertType = "alert-danger";
	   }
   
	}



}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Education Admin | Add Meeting</title>

	<?php include_once('components/head.php');?>
</head>

<body class="nav-md">
<?php include_once('components/nav.php');?>

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
							<h3>Manage Meetings</h3>
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
									<h2>Add Meeting</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">
										<?php
										include_once('include/alert.php');?>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="meeting-date">Meeting Date <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" id="meeting-date" required="required" class="form-control" name="meeting_date">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="title" required="required" class="form-control" name="title">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="content" required="required" class="form-control">Contents</textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="location" class="col-form-label col-md-3 col-sm-3 label-align">Location <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="location" class="form-control" type="text" name="location" required="required">
											</div>
										</div>
										<div class="item form-group">
											<label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="price" class="form-control" type="number" name="price" required="required">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active">
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="image" name="image" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="category" id="">
												<option value="">select option</option>
												    <option value="">programming</option>
												    <option value="">basics of computer</option>
												    <option value="">security</option>
													<option value="">personal skills</option>
													<option value="">languages</option>
												</select>
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button type="submit" class="btn btn-success" name="add">Add</button>
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
