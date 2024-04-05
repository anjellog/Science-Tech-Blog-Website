<?php 
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News</title>

    

    <?php require('includes/header.php');?>
    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/news-details-ess.css" rel="stylesheet">

  <link href="css/breakpoints-w.css" rel="stylesheet">


  </head>

  <body style="background-color:#000 ">

    <main>
    <?php require('includes/navbar2.php');?>


    <div class="container">

    
<h2 class="text-white mt-5 pt-5 pb-3 text-center">News Details</h2>
     


    <?php
$pid=intval($_GET['nid']);
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>  
    <div class="card mb-3 mx-auto w-lg-75 w-sm-100 " >
    <div class="pt-3 d-flex " >
            
     
     <button onclick="history.back()" class="butun ml-3 me-auto">
  <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
  <span>Back</span>
</button>

							

                <a class="btn btn-danger btn-sm mr-3" 
								href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
              
                <a class="btn btn-warning btn-sm mr-3" 
								style="pointer-events: auto! important;
     cursor: not-allowed! important;"><?php echo htmlentities($row['subcategory']);?> </a>
					
					
          </div>
  <img src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" class="card-img-top p-3 img-fluid rounded">
  <div class="card-body">
    <h5 class="card-title text-center"><?php echo htmlentities($row['posttitle']);?></h5>
    <span class="card-text text-justify"><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));
             ?></span>
     <p class="card-text"><small class="text-muted"><?php echo htmlentities($row['postingdate']);?></small></p>
  </div>
</div>

<?php } ?>









        <!-- Sidebar Widgets Column -->
      <!-- /.row -->
<!---Comment Section --->

<div class="card mb-3 mx-auto w-lg-75 w-sm-100 mt-5">
            <h5 class="card-header">Join the Discussion:</h5>
            <div class="card-body">
            <?php 
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
	<div class="be-comment">
		<div class="be-img-comment">	
			
      <img class="d-flex mr-3 rounded-circle" src="../images/usericon.png" alt="">
			
		</div>
		<div class="be-comment-content">
			
				<span class="be-comment-name"><b>
					<?php echo htmlentities($row['name']);?>
					</b></span>
				<span class="be-comment-time">
					<i class="fa fa-clock-o"></i>
					<?php echo htmlentities($row['postingDate']);?>
				</span>

			<p class="be-comment-text">
      <?php echo htmlentities($row['comment']);?>
			</p>
		</div>
	</div>
  <?php } ?>
              <form name="Comment" method="post" >
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
      <div class="row my-2">
 <div class="form-group col-lg-6 col-sm-12">
<input type="text" name="name" class="form-control " placeholder="Enter your Name" required>
</div>
<div class="form-group col-lg-6 col-sm-12">
 <input type="email" name="email" class="form-control " placeholder="Enter your Email" required>
 </div>
 </div>

                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                </div>

                <button class="botonsend" type="submit"  style="float:right" name="submit">
                  <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                      </svg>
                    </div>
                  </div>
                  <span>Comment</span>
                </button>
              </form>
            </div>
            
          </div>

        </div>
      

        <?php include('includes/sidebar.php');?>
   
        <?php require('includes/footer.php');?>
        
   

    

    
</main>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
  </body>

</html>
