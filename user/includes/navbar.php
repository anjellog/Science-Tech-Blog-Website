

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#000; z-index:1000;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SciTech</a>
    <button class="navbar-toggler" style="box-shadow:none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#news">Latest News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php#profile">About</a>
        </li>

        <li class="nav-item dropdown border-none">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>

                    <li>
                      <a class="dropdown-item" href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
                    </li>
<?php } ?>
          </ul>
        </li>
                
      </ul>


      
      <form class="d-flex" name="search" action="../search.php" method="post">
        <input class="form-control me-2 bg-dark text-light" type="text" name="searchtitle" class="form-control" placeholder="Search something" required>
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>




