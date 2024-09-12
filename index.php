<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
                
		$_SESSION['cart'][$id]['quantity']++;
               
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			//header('location:index.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:account.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:wishlist.php');
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>MECHOP</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="css/home_1.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
	
	<div id="page">
		
	<header class="version_1">
		<!-- Mobile menu overlay mask -->

		<?php include('includes/Header1.php');?>
		<!-- /main_header -->
		<?php include('includes/Header2.php');?>
		
		<!-- /main_nav -->
	</header>
	<!-- /header -->

	<main>
            <div class="header-video" style="background-color: white">
                    <a href="http://localhost/PFF/listing.php">
                        <video width="100%" height="700px" loop autoplay muted>
  <source src="video/pff.mp4" type="video/mp4">
  
 
</video>
			
          
			<!--<img src="img/videofix.jpg" data-src="img/videofix.jpg" alt="" class="header-video--media" data-video-src="video/Project_ID__431pprenderfs_1621266632399" data-teaser-source="video/Project_ID__431pprenderfs_1621266632399" data-provider="" data-video-width="1920" data-video-height="960">-->
                    </a>    
                </div>
		<!-- /header-video -->

		<div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Free Shipping</h3>
								<p>For all oders</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Secure Payment</h3>
								<p>100% secure payment</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>24/7 Support</h3>
								<p>Online top support</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--/feat-->
	

		
		<!-- /container -->

		<hr class="mb-0">
		
		<div class="container margin_60_35">
			<div class="main_title mb-4">
				<h2>New Arrival Products</h2>
				
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
			<?php
$ret=mysqli_query($con,"select * from products limit 8");
while ($row=mysqli_fetch_array($ret)) 
{
?>

				<div class="item">

					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail.php?pid=<?php echo htmlentities($row['id']);?>">
								<img class="owl-lazy" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="180" height="300"alt="">
							</a>
						</figure>
						<a href="product-detail.php?pid=<?php echo htmlentities($row['id']);?>">
							<h3><?php echo htmlentities($row['productName']);?></h3>
						</a>
						<div class="price_box">
							<span class="new_price">$<?php echo htmlentities($row['productPrice']);?></span>
						</div>
						<ul>
							<li><a href="index.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="cart.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
					
				</div>
				<?php } ?>
				</div>	
				
   
			
	
    
						
		<!-- /container -->
		

		<!-- /featured -->
		
		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div><!-- /item --> 
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<br>
		<div class="main_title mb-4">
				<h2>Top Selling Products</h2>
				
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
			<?php
$ret=mysqli_query($con,"select * from products limit 8,8");
while ($row=mysqli_fetch_array($ret)) 
{
?>

				<div class="item">

					<div class="grid_item">
						<figure>
							<a href="product-detail.php?pid=<?php echo htmlentities($row['id']);?>">
								<img class="owl-lazy" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="180" height="300"alt="">
							</a>
						</figure>
						<a href="product-detail.php?pid=<?php echo htmlentities($row['id']);?>">
							<h3><?php echo htmlentities($row['productName']);?></h3>
						</a>
						<div class="price_box">
							<span class="new_price">$<?php echo htmlentities($row['productPrice']);?></span>
						</div>
						<ul>
							<li><a href="index.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="cart.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
					
				</div>
				<?php } ?>
				</div>	
		<!-- /bg_gray -->
		
		<!--blassa2 -->
		<!-- /container -->
		
	</main>
	<!-- /main -->
		
	<footer class="revealed" style="background-color: black">
	<?php include('includes/footer.php');?>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/modernizr.js"></script>
	<script src="js/video_header.min.js"></script>
	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>
	<script src="js/isotope.min.js"></script>
	<script>
		// Isotope filter
		$(window).on('load',function(){
		  var $container = $('.isotope-wrapper');
		  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
		});
		$('.isotope_filter').on( 'click', 'a', 'change', function(){
		  var selector = $(this).attr('data-filter');
		  $('.isotope-wrapper').isotope({ filter: selector });
		});
	</script>

</body>
</html>