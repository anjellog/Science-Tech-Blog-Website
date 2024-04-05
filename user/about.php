<?php 
session_start();
include('includes/config.php');

    ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	
		
<link rel="stylesheet" type="text/css" href="css/about.css" />

<?php require('includes/header.php');?>


		
		<script>
		document.documentElement.className = "js";
		var supportsCssVars = function() { var e, t = document.createElement("style"); return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e };
		supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
		</script></head>
    <style>
       
    </style>
	
	<body class="loading" style="overflow-x:hidden;">

        <main>
			
<div class="container2"><?php require('includes/navbar3.php');?></div>
		

			<div class="content">
				<article class="content__item">
					<div class="img-wrap img-wrap--content">
						<div class="img img--content" style="background-image: url(img/Angelo.jpg);"></div>
					</div>
					<header class="content__item-header">
						<span class="content__item-header-meta">Gaspe, Angelo L.</span>
						<h2 class="content__item-header-title">Angelo</h2>
					</header>
					<div class="content__item-copy">
						<p class="content__item-copy-text" style="align:justify">
						Angelo is the sole programmer who worked on this website alone. He used his 3 days worth of time to complete
						this website. Angelo used bootstrap to lessen the coding time. <br>In order to have database, Angelo used PhP with
						the combination of MySql. Other languages that have been used here are HTML, CSS, JS and its different variations
						or libraries such as Three.js, Swiper.js, Popover.js, Jquery, Vue.js, and some basic type of javascript.
						</p>
						
					</div>
				</article>
				<article class="content__item">
					<div class="img-wrap img-wrap--content">
						<div class="img img--content" style="background-image: url(img/legarte.jpg);"></div>
					</div>
					<header class="content__item-header">
						<span class="content__item-header-meta">Legarte, John May</span>
						<h2 class="content__item-header-title">John</h2>
					</header>
					<div class="content__item-copy">
						<p class="content__item-copy-text">
						He is a groupmate of Angelo.
						</p>
					</div>
				</article>
				<article class="content__item">
					<div class="img-wrap img-wrap--content">
						<div class="img img--content" style="background-image: url(img/mejorada.jpg);"></div>
					</div>
					<header class="content__item-header">
						<span class="content__item-header-meta">Mejorada, Rendyl</span>
						<h2 class="content__item-header-title">Rendyl</h2>
					</header>
					<div class="content__item-copy">
						<p class="content__item-copy-text">
						He is also a groupmate of Angelo.
						</p>
					</div>
				</article>
				<article class="content__item">
					<div class="img-wrap img-wrap--content">
						<div class="img img--content" style="background-image: url(img/team.jpg);"></div>
					</div>
					<header class="content__item-header">
						<span class="content__item-header-meta">BSCS 3F</span>
						<h2 class="content__item-header-title">Group 3</h2>
					</header>
					<div class="content__item-copy">
						<p class="content__item-copy-text">
						This is a work of Group 3 from BSCS 3F. With the help of bootstrap and javascript libraries, you can make your own website like this.
						</p>
					</div>
				</article>
			</div>
			<div class="revealer">
				<div class="revealer__inner"></div>
			</div>
			<div class="grid grid--slideshow">
				<figure class="grid__item grid__item--slide">
					<span class="number">Leader</span>
					<div class="img-wrap">
						<div class="img" style="background-image: url(img/Angelo.jpg);"></div>
					</div>
					<figcaption class="caption">Gaspe, Angelo L.</figcaption>
				</figure>
				<figure class="grid__item grid__item--slide">
					<span class="number">Member</span>
					<div class="img-wrap">
						<div class="img" style="background-image: url(img/legarte.jpg);"></div>
					</div>
					<figcaption class="caption">Legarte, John May</figcaption>
				</figure>
				<figure class="grid__item grid__item--slide">
					<span class="number">Member</span>
					<div class="img-wrap">
						<div class="img" style="background-image: url(img/mejorada.jpg);"></div>
					</div>
					<figcaption class="caption">Mejorada, Rendyl</figcaption>
				</figure>
				<figure class="grid__item grid__item--slide">
					<span class="number">CC106</span>
					<div class="img-wrap">
						<div class="img" style="background-image: url(img/team.jpg);"></div>
					</div>
					<figcaption class="caption">BSCS3F - Group 3</figcaption>
				</figure>
				<div class="titles-wrap">
					<div class="grid grid--titles">
						<h3 class="grid__item grid__item--title">Angelo</h3>
						<h3 class="grid__item grid__item--title">John</h3>
						<h3 class="grid__item grid__item--title">Rendyl</h3>
						<h3 class="grid__item grid__item--title">G3</h3>
					</div>
				</div>
				<div class="grid grid--interaction">
					<div class="grid__item grid__item--cursor grid__item--left"></div>
					<div class="grid__item grid__item--cursor grid__item--center"></div>
					<div class="grid__item grid__item--cursor grid__item--right"></div>
				</div>
			</div>
			<div class="frame">
				<div class="frame__title-wrap">
					
					
						</div>
					</div>
				</div>
			</div><!-- /frame -->
		</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/charming.min.js"></script>
		<script src="js/TweenMax.min.js"></script>
		<script src="js/demo.js"></script>
	</body>
</html>