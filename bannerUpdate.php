<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>

<body>

	<!-- Main navbar -->
	<?php include('mainNav.php'); ?>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<?php include('navigation.php'); ?>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-image-compare position-left"></i> Banner</a></li>
							<li><a href="datatable_basic.html">List</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Banner Update</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a href="#" class="btn btn-primary add-new">Update</a></li>
			                		<!-- <li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li> -->
			                	</ul>
		                	</div>
						</div>

					<div class="panel-body">
						<?php
						require "db_config.php";
						$banner_id = $_GET['banner_id'];
						$getSingleDataQry = "SELECT * FROM banners WHERE id={banner_id}";
						$getResult = mysqli_query($dbCon,$getSingleDataQry);
						?>
					<form class="form-horizontal" action="bannerControlar.php" method = "post">
						<fieldset class="content-group mt-10">
							<?php 
							if(isset($_GET['msg'])){
							?>
							<div class="alert text-violet-800 alpha-violet no-border">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<?php echo $_GET['msg']; ?>.
							</div>
							<?php
							} ?>
							<?php 
							foreach ($getResult as $key => $banner) {
							?>
									
									<legend class="text-bold">Basic inputs</legend>

								
											<input type="hidden" class="form-control" id="banner_id" name="title" value="<?php echo $banner['id']; ?>">
									

									<div class="form-group">
										<label class="control-label col-lg-2" for = "title">Title</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="title" name="title" value="<?php echo $banner['title']; ?>">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2" for ="sub_title" >Sub Title</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="sub_title" id="sub_title" value="<?php echo $banner['sub_tile']; ?>>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2" for="details">Details</label>
										<div class="col-lg-10">
											<textarea rows="5" cols="5" class="form-control" name="details" id="details" placeholder="Default textarea"><?php echo $banner['details']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2" for="image">Image</label>
										<div class="col-lg-10">
										<input type="file" name="image" class="form-control" id="image">
										</div>
									</div>
								</fieldset>
							<?php
							}
							
							?>
								<div class="text-right">
									<a  href="banner.php" class="btn btn-defult">Back to List</a>

									<button type="submit" name="updateBanner" class="btn btn-primary">Submit</button>
								</div>
							</form>


					</div>
					<!-- /basic datatable -->



					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<?php include('script.php'); ?>
</body>
</html>
