<?php 
session_start();
error_reporting(0);
include('includes/config.php');

    ?>

<!DOCTYPE html>
<html lang="en" class="no-js">

  <head>

    <title>Category Page</title>

    <?php require('includes/header.php');?>
    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/news-details-ess.css" rel="stylesheet">

    <link href="css/breakpoints-w.css" rel="stylesheet">

  </head>

  <body style="background-color:#000 ">
      <main>
      <?php require('includes/navbar2.php');?>


    <div class="container">



        <!-- Blog Entries Column -->
        

          <!-- Blog Post -->
          <?php 
        if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
             

     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{

}
else {
  $row=mysqli_fetch_array($query)



?>
<h2 class="text-white text-center mt-5 pt-5 pb-3"><?php echo htmlentities($row['category']);?> News</h2>
<?php } ?>





<div class="row mb-4 " style=" display: flex;
  justify-content: center;" >

<?php 
        if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
             

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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "<span class='text-danger'>No record found</span>";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>

  <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4 " data-aos="zoom-in-up">
    <div class="card h-100">
    <img class="card-img-top" src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
    <div class="card-img-overlay" >
							<a class="btn btn-warning btn-sm"
								style="cursor: not-allowed;"><?php echo htmlentities($row['subcategory']);?></a>
						</div>
      <div class="card-body">
        <h5 class="card-title"><?php echo htmlentities($row['posttitle']);?></h5>
        <button class="learn-more">
								<span class="circle" aria-hidden="true">
									<span class="icon arrow"></span>
								</span>
								<span class="button-text"><a class="text-info"
										href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"
										style="text-decoration:none">Read More</a></span>
							</button>

      
      </div>
      <div class="card-footer">
        <small class="text-muted"><?php echo htmlentities($row['postingdate']);?></small>
      </div>
    </div>
  </div>
  
  <?php } ?>

</div>


<ul class="pagination justify-content-center mb-1">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
<?php } ?>



        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php');?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
      <?php include('includes/footer.php');?>

</main>
    
	<script>
		AOS.init();
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

 
  </body>

</html>
