<?php 
//include_once('include/checklogged.php');
include_once('include/conn.php');

  try{
		$sql = "SELECT `id`,`category_name` FROM `categories`";
		$stmt = $conn->prepare($sql);
		$stmt ->execute();
    $result = $stmt->fetchAll();
		
	} catch(PDOException $e) {
		$msg = $e->getMessage();
		$alertType = "alert-danger";
	}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Categories</title>
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
                <h3>Manage Categories</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
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
                    <h2>List of Categories</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Category Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                           foreach($result as $row)
                           {
                            $id = $row['id'];
                            $category_name = $row['category_name'];

                          ?>
                        <tr>
                          <td><?php echo $category_name;?></td>
                         <td> <a href="editCategory.php?id=<?php echo $id;?>"><img src="./images/edit.png" alt="Edit"></a></td>
                        
                          <td><a href="delete.php?id=<?php echo $id?>" onclick="return confirm('Delete category?')"><img src="./images/delete.png" alt="Delete"></a></td>
                        </tr>
                     <?php
                     }
                     ?>
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
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

  </body>
</html>