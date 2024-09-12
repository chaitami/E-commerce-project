<?php 
session_start();
error_reporting(0);
include('includes/config.php');
/*if(isset($_GET['action']) && $_GET['action']=="add"){
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
}*/

if(isset($_POST['add'])){
	
        $qu=$_POST['quantity_1'];
       $id=$_POST['idp'];
	if(isset($_SESSION['cart'][$id])){
             
		$_SESSION['cart'][$id]['quantity']++;
	}else{
           
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => $qu, "price" => $row_p['productPrice']);
			header('location:cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}

$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:account.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:wishlist.php');

}
}
/*if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}
*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>MECHOP | Product Page</title>

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
    <link href="css/product_page.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
	
	<div id="page">
		
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
	        <div> <div></div>
	        </div>
	        <div class="row">   
<?php 
$ret=mysqli_query($con,"select * from products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>

	            <div class="col-md-6">
	                <div class="all">
	                    <div class="slider">
	                        <div class="owl-carousel owl-theme main">
	                            <div style="background-image: url(admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>);" class="item-box" width="370" height="350" ></div>
	                            <div style="background-image: url(admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>);" class="item-box"></div>
	                            <div style="background-image: url(admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>);" class="item-box"></div>
	                        </div>
	                        <div class="left nonl"><i class="ti-angle-left"></i></div>
	                        <div class="right"><i class="ti-angle-right"></i></div>
	                    </div>
	                    <div class="slider-two">
	                        <div class="owl-carousel owl-theme thumbs">
	                            <div style="background-image: url(admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>);" class="item active"></div>
	                            <div style="background-image: url(admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>);" class="item"></div>
	                            <div style="background-image: url(admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>);" class="item"></div>
	                        </div>
	                        <div class="left-t nonl-t"></div>
	                        <div class="right-t"></div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="breadcrumbs">
	                    <ul>
	                        <li><a href="#">Home</a></li>
	                        <li>search</li>
	                    </ul>
	                </div>
	                <!-- /page_header -->
                        <form action="product-detail.php?pid=<?php echo htmlentities($row['id']);?>" method="POST">
	                <div class="prod_info">
	                    <h1><?php echo htmlentities($row['productName']);?></h1>
	                    <p><small><?php echo htmlentities($row['productCompany']);?></small><br></p>
	                    <div class="prod_options">
	                        <div class="row">
                                    
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong></strong></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                        <div>
	                                    <input type="text" value="1"  class="qty2" name="quantity_1" hidden>
                                            
                                            <input type="text" name="idp" value="<?php echo $row['id']; ?>" hidden>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-lg-5 col-md-6">
	                            <div class="price_main"><span class="new_price">$<?php echo htmlentities($row['productPrice']);?>	</span><span class="percentage">-20%</span> <span class="old_price">$<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span></div>
	                        </div>
	                        <div class="col-lg-4 col-md-6">
	                            <!--<div class="btn_add_to_cart"><a href="cart.php?page=product&action=add&id=<?php //echo $row['id']; ?>" class="btn_1">Add to Cart</a></div>-->
                                   <!-- <button type="submit" class="btn_add_to_cart" name="btn">Add to Cart</button>-->
                                    <input type="submit" class="btn_1" name="add" value="Add to Cart">
	                        </div>
	                    </div>
	                </div>
                            </form>
	                <!-- /prod_info -->
	                <div class="product_actions">
	                    <ul>
	                        <li>
	                            <a href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
	                        </li>
	                        
	                    </ul>
	                </div>
	                <!-- /product_actions -->
                </div>
                    <p><?php echo $row['productDescription'];?></p>
                 <?php  
                 $cid=$row['category'];
			$subcid=$row['subCategory']; } ?>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	    

	    <!-- /tabs_product -->

		<!-- /tab_content_wrapper -->
		
	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>Related</h2>
	            <span>Products</span>
	            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
	        </div>
			<div class="owl-carousel owl-theme products_carousel">
			<?php
$ret=mysqli_query($con,"select * from products where subCategory='$subcid' and category='$cid'");
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
							<li><a href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="product-detail.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
					
				</div>
				<?php } ?>
				</div>
	        <!-- /products_carousel -->
	    </div>
	    <!-- /container -->

	    <div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Free Shipping</h3>
								<p>For all oders over $99</p>
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

	</main>
	<!-- /main -->
	
	<footer class="revealed" style="background-color: black">
	<?php include('includes/footer.php');?>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->

     
	<!-- /add_cart_panel -->

	<!-- Size modal -->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="size-modal" id="size-modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Size guide</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  	<i class="ti-close"></i>
				</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, et velit propriae invenire mea, ad nam alia intellegat. Aperiam mediocrem rationibus nec te. Tation persecuti accommodare pro te. Vis et augue legere, vel labitur habemus ocurreret ex.</p>
					<div class="table-responsive">
                                <table class="table table-striped table-sm sizes">
                                    <tbody><tr>
                                        <th scope="row">US Sizes</th>
                                        <td>6</td>
                                        <td>6,5</td>
                                        <td>7</td>
                                        <td>7,5</td>
                                        <td>8</td>
                                        <td>8,5</td>
                                        <td>9</td>
                                        <td>9,5</td>
                                        <td>10</td>
                                        <td>10,5</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Euro Sizes</th>
                                        <td>39</td>
                                        <td>39</td>
                                        <td>40</td>
                                        <td>40-41</td>
                                        <td>41</td>
                                        <td>41-42</td>
                                        <td>42</td>
                                        <td>42-43</td>
                                        <td>43</td>
                                        <td>43-44</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">UK Sizes</th>
                                        <td>5,5</td>
                                        <td>6</td>
                                        <td>6,5</td>
                                        <td>7</td>
                                        <td>7,5</td>
                                        <td>8</td>
                                        <td>8,5</td>
                                        <td>9</td>
                                        <td>9,5</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Inches</th>
                                        <td>9.25"</td>
                                        <td>9.5"</td>
                                        <td>9.625"</td>
                                        <td>9.75"</td>
                                        <td>9.9375"</td>
                                        <td>10.125"</td>
                                        <td>10.25"</td>
                                        <td>10.5"</td>
                                        <td>10.625"</td>
                                        <td>10.75"</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">CM</th>
                                        <td>23,5</td>
                                        <td>24,1</td>
                                        <td>24,4</td>
                                        <td>24,8</td>
                                        <td>25,4</td>
                                        <td>25,7</td>
                                        <td>26</td>
                                        <td>26,7</td>
                                        <td>27</td>
                                        <td>27,3</td>
                                    </tr>
                                </tbody></table>
                            </div>
					<!-- /table -->
				</div>
			</div>
		</div>
	</div>
	
	
 	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
  
    <!-- SPECIFIC SCRIPTS -->
    <script  src="js/carousel_with_thumbs.js"></script>

</body>

</html>
