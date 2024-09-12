<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid=intval($_GET['cid']);
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
			header('location:cart.php');
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
    <title>MECHOP | Category Listing</title>

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
    <link href="css/listing.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
	
	<div id="page">
		
	<header class="version_1">
	<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<?php include('includes/Header1.php');?>
		<!-- /main_header -->
		<?php include('includes/Header2.php');?>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
		
	<main>
		
		<div class="container margin_30">
		    <div class="top_banner version_2">
		        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
		            <div class="container">
		                <div class="d-flex justify-content-center">
		                    <h1>You are in the right place</h1>
		                </div>
		            </div>
		        </div>
		     
		    </div>
		    <!-- /top_banner -->
		    <div id="stick_here"></div>
		    <div class="toolbox elemento_stick version_2">
		        <div class="container">
		            <ul class="clearfix">
		                <li>
		                    <div class="sort_select">
		                        <select name="sort" id="sort">
		                            <option value="popularity" selected="selected">Sort by popularity</option>
		                            <option value="rating">Sort by average rating</option>
		                            <option value="date">Sort by newness</option>
		                            <option value="price">Sort by price: low to high</option>
		                            <option value="price-desc">Sort by price: high to
		                        </select>
		                    </div>
		                </li>
		                <li>
		                    <a href="#0"><i class="ti-view-grid"></i></a>
		                    <a href="#0"><i class="ti-view-list"></i></a>
		                </li>
		                <li>
		                </li>
		            </ul>
		        </div>
		    </div>
		    <!-- /toolbox -->
			<div class="row small-gutters">
			<?php
			$ret=mysqli_query($con,"select * from products where category='$cid'");
			$num=mysqli_num_rows($ret);
			if($num>0)
			{
			while ($row=mysqli_fetch_array($ret)) 
			{?>	
				<div class="col-6 col-md-4 col-xl-3">
				
					<div class="grid_item">
						<figure>
							
							<a href="product-detail.php?pid=<?php echo htmlentities($row['id']);?>">
								<img class="lazy" src="assets/images/blank.gif" data-src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="200" height="300" alt="">
							</a>
							
						</figure>
						<a href="product-detail.php?pid=<?php echo htmlentities($row['id']);?>">
							<h3><?php echo htmlentities($row['productName']);?></h3>
						</a>
						<div class="price_box">
							<span class="new_price">$<?php echo htmlentities($row['productPrice']);?></span>
							<span class="old_price">$<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
						</div>
						<ul>
							<li><a href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="cart.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
                    </div>
                  
		</div>
        <?php } } else {?>
                        <div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>

					<!-- /grid_item -->
				</div>
				<!-- /col -->
				<?php } ?>
				
				<!-- /col -->				
			</div>
			<!-- /row -->
								
		</div>
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
	<script src="js/sticky_sidebar.min.js"></script>
	<script src="js/specific_listing.js"></script>
		
</body>
</html>