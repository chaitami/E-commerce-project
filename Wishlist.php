<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
// Code forProduct deletion from  wishlist	
$wid=intval($_GET['del']);
if(isset($_GET['del']))
{
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
}


if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	$query=mysqli_query($con,"delete from wishlist where productId='$id'");
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);	
header('location:wishlist.php');
}
		else{
			$message="Product ID is invalid";
		}
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
    <title>MECHOP </title>

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
    <link href="css/cart.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
	
	<div id="page">
		
	<header class="version_1">
	<?php include('includes/Header1.php');?>
		<!-- /main_header -->
		<?php include('includes/Header2.php');?>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
	
	<main class="bg_gray">
		<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
				
					<li>Wishlist</li>
				</ul>
			</div>
			<h1>Wishlist page</h1>
		</div>
		<!-- /page_header -->
		<table class="table table-striped ">
							<thead>
								<tr>
									<th>
										Product
									</th>
									<th>
										
									</th>
									<th>
										
									</th>
									<th>
									Remove			
									</th>
									<th>
						
									</th>
								</tr>
							</thead>
							<tbody>
							
                            <?php
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='".$_SESSION['id']."'");
$num=mysqli_num_rows($ret);
	if($num>0)
	{
while ($row=mysqli_fetch_array($ret)) {

?>
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="admin/productimages/<?php echo htmlentities($row['pid']);?>/<?php echo htmlentities($row['pimage']);?>" data-src="admin/productimages/<?php echo htmlentities($row['pid']);?>/<?php echo htmlentities($row['pimage']);?>" class="lazy" alt="Image">
										</div>
										<span class="item_cart"><?php echo htmlentities($row['pname']);?></span>
									</td>
									<td></td>
									<td></td>
									
									
									<td class="options">
										<a href="wishlist.php?del=<?php echo htmlentities($row['wid']);?>"  onClick="return confirm('Are you sure you want to delete?')"><i class="ti-trash"></i></a>
									</td>
								</tr>
								<?php } } else{ ?>
									<tr>
									<strong>Your Wishlist is Empty</strong>
									</tr>
								<?php }} ?>
							</tbody>
						</table>

						
						
							
						
					</div>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		

		<!-- /box_cart -->
		
	</main>
	<!--/main-->
	
	<footer style="background-color: black">
	<?php include('includes/footer.php');?>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>

		
</body>
</html>