<?php 
session_start();
include('includes/config.php');

    ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<?php require('includes/header.php');?>




<body class="demo-4" style="overflow-x:hidden">
	<main>
		<div class="container2">
			<?php require('includes/navbar2.php');?>
		</div>

		<div class="content">
			<div id="app" style="position:fixed"></div>
			<div class="content__title-wrap">
				<h2 class="content__title">Science and Technology Website</h2>
				<a href="#news">
					<div class="scrolldown" style="--color: skyblue; margin: auto;">
						<div class="chevrons">
							<div class="chevrondown"></div>
							<div class="chevrondown"></div>
						</div>
					</div>
				</a>
			</div>
		</div>

		<br><br><br><br>

		
		<div class="container" id="news">

		<?php include('includes/sidebar.php');?>


			<div class="row " data-masonry='{"percentPosition": true }' style="style display: flex;
  justify-content: center;">
				<?php 
     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 9;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
				<div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4 " data-aos="zoom-in-up">
					<div class="card ">
						<img class="card-img-top"
							src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
							alt="<?php echo htmlentities($row['posttitle']);?>">
						<div class="card-img-overlay">
							<a class="btn btn-danger btn-sm"
								href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
						</div>
						<div class="card card-body border-white">
							<h4 class="card-title"><?php echo htmlentities($row['posttitle']);?></h4>

							<span class="card-text" style="overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical"><?php $pt=$row['postdetails']; echo  (substr($pt,0));?> </span></br>

							<button class="learn-more">
								<span class="circle" aria-hidden="true">
									<span class="icon arrow"></span>
								</span>
								<span class="button-text"><a class="text-info"
										href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"
										style="text-decoration:none">Read More</a></span>
							</button>


						</div>
						<div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
							<div class="views"><?php echo htmlentities($row['postingdate']);?>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
		




		<ul class="pagination justify-content-center mb-4 ">
			<li class="page-item"><a href="?pageno=1#news" class="page-link">First</a></li>
			<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
				<a href="<?php if($pageno <= 1){ echo '#news'; } else { echo "?pageno=".($pageno - 1); } ?>#news"
					class="page-link">Prev</a>
			</li>
			<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
				<a href="<?php if($pageno >= $total_pages){ echo '#news'; } else { echo "?pageno=".($pageno + 1); } ?>#news "
					class="page-link">Next</a>
			</li>
			<li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>#news" class="page-link">Last</a></li>
		</ul>

		<?php require('includes/footer.php');?>
	
		</div>
		</div>



	</main>
	<script src="js/three.min.js"></script>
	<script src="js/postprocessing.min.js"></script>
	<script src="js/InfiniteLights.js"></script>
	<script src="js/Distortions.js"></script>

	<script>
		(function () {

			const container = document.getElementById('app');

			const options = {
				onSpeedUp: (ev) => {},
				onSlowDown: (ev) => {},
				// mountainDistortion || LongRaceDistortion || xyDistortion || turbulentDistortion || turbulentDistortionStill || deepDistortionStill || deepDistortion
				distortion: turbulentDistortion,

				length: 400,
				roadWidth: 10,
				islandWidth: 2,
				lanesPerRoad: 3,

				fov: 90,
				fovSpeedUp: 150,
				speedUp: 2,
				carLightsFade: 0.4,

				totalSideLightSticks: 20,
				lightPairsPerRoadWay: 40,

				// Percentage of the lane's width
				shoulderLinesWidthPercentage: 0.05,
				brokenLinesWidthPercentage: 0.1,
				brokenLinesLengthPercentage: 0.5,

				/*** These ones have to be arrays of [min,max].  ***/
				lightStickWidth: [0.12, 0.5],
				lightStickHeight: [1.3, 1.7],

				movingAwaySpeed: [60, 80],
				movingCloserSpeed: [-120, -160],

				/****  Anything below can be either a number or an array of [min,max] ****/

				// Length of the lights. Best to be less than total length
				carLightsLength: [400 * 0.03, 400 * 0.2],
				// Radius of the tubes
				carLightsRadius: [0.05, 0.14],
				// Width is percentage of a lane. Numbers from 0 to 1
				carWidthPercentage: [0.3, 0.5],
				// How drunk the driver is.
				// carWidthPercentage's max + carShiftX's max -> Cannot go over 1. 
				// Or cars start going into other lanes 
				carShiftX: [-0.8, 0.8],
				// Self Explanatory
				carFloorSeparation: [0, 5],

				colors: {
					roadColor: 0x080808,
					islandColor: 0x0a0a0a,
					background: 0x000000,
					shoulderLines: 0x131318,
					brokenLines: 0x131318,
					/***  Only these colors can be an array ***/
					leftCars: [0xD856BF, 0x6750A2, 0xC247AC],
					rightCars: [0x03B3C3, 0x0E5EA5, 0x324555],
					sticks: 0x03B3C3,
				}
			};

			const myApp = new App(container, options);
			myApp.loadAssets().then(myApp.init)
		})()
	</script>

	<script>
		AOS.init();
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

</body>

</html>