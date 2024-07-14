<?php
include_once('include/checklogged.php');
?>
<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Education Admin</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/img.jpg" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
						<?php if(isset($_SESSION['username'])): ?>
                            <span>Welcome,<?php echo $_SESSION['username']; ?></span>
                        <?php else: ?>
                            <span>Welcome,guest</span>
                        <?php endif; ?>
							
						</div>
					</div>
					<!-- /menu profile quick info -->
					<br />