<?php 
session_start();
error_reporting(0);
include('includes/config.php');

    ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Results</title>

    <?php require('includes/header.php');?>
    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/news-details-ess.css" rel="stylesheet">

    <link href="css/breakpoints-w.css" rel="stylesheet">


  </head>

  <body style="background-color:#000 ">
      <main>
      <?php require('includes/navbar2.php');?>


    <div class="container">

<h2 class="text-white mt-5 pt-5 pb-3 text-center">Search Result</h2>
     
<div class="row mb-4 " style=" display: flex;
  justify-content: center;" >

       

          <!-- Blog Post -->
<?php 
        if($_POST['searchtitle']!=''){
$st=$_SESSION['searchtitle']=$_POST['searchtitle'];
}
$st;
             




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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "<span class='text-danger'>No record found</span>";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>



<div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4" data-aos="zoom-in-up">
    <div class="card h-100">
    <img class="card-img-top" src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
    
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

    <ul class="pagination justify-content-center mb-2">
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item text-primary">
            <a onclick="history.back()" class="page-link">Go Back</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">See Related News</a>
        </li>
    </ul>
<?php } ?>
       

      

      <?php include('includes/sidebar.php');?>
      </div>
    

    </div> 
      
    

    <?php require('includes/footer.php');?>
</main>

      <script>
		AOS.init();
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

</head>
  </body>

</html>
