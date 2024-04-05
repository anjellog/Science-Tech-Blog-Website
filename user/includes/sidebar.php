  
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
  
        <h2 class="mt-5 mb-2 pt-4 text-center header-font fw-bold text-white" style="z-index:1004; position: relative">Recent News</h2>
     <div class="container mt-3">
     <div class="swiper swiper-feedbacks " style=" width: 100%;
  height: 100%;" >
      <div class="swiper-wrapper mb-5 ">
      <?php 
     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
        <div class="swiper-slide bg-white h-100 p-3 " >
          <div class=" p-2 d-flex"  >
            <img src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
							alt="<?php echo htmlentities($row['posttitle']);?>" width="90%" style="
    width:  230px;
    height: 150px;
    display:block;
    margin:auto;
    object-fit: cover;
"> 
            
          </div>
          <h5 class="m-0 text-center mt-2"><?php echo htmlentities($row['posttitle']);?></h5></br>

							<button class="learn-more">
								<span class="circle" aria-hidden="true">
									<span class="icon arrow"></span>
								</span>
								<span class="button-text"><a class="text-info"
										href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"
										style="text-decoration:none">Go to News</a></span>
							</button>

        </div>
        
        <?php } ?>

       



      </div>
      <div class="swiper-pagination"></div>
    </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script>
      var swiper = new Swiper(".swiper-feedbacks", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints:{
        320:{
            slidesPerView: 1,
        },
        640:{
            slidesPerView: 1,
        },
        768:{
            slidesPerView: 2,
        },
        1024:{
            slidesPerView: 3,
        },
    }
      });
    </script>