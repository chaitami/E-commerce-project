<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			//echo "<script>alert('Your Cart hasbeen Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:account.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);


		foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(userId,productId,quantity,orderStatus,paymentMethod) values('".$_SESSION['id']."','$qty','$val34','in Process','Debit / Credit card')");

}
        header("location:checkout.php");
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
    <title>MECHOP | Cart Page</title>

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
	
	<?php include('includes/Header2.php');?>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
	
	<main class="bg_gray">
		<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
                                    <li><a href="index.php">Home</a></li>
					<li>Cart</li>
				</ul>
			</div>
			<h1>Cart page</h1>
		</div>
        <!-- /page_header -->
        <form action="cart.php" method="post">
        <?php
if(!empty($_SESSION['cart'])){
	?>
		<table class="table table-striped ">
							<thead>
								<tr>
									<th>
										Product
									</th>
									<th>
										Price
									</th>
									<th>
										Quantity
									</th>
									<th>
										Subtotal
									</th>
									<th>
									<a><i class="ti-trash"></i></a>
									</th>
								
								</tr>
							</thead>
							<tbody>
                            <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	?>
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" data-src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" class="lazy" alt="Image">
										</div>
										<span class="item_cart"><?php echo $row['productName']; $_SESSION['sid']=$pd; ?></span>
									</td>
									<td>
										<strong><?php echo "$"." ".$row['productPrice']; ?></strong>
									</td>
									<td>
										<div class="numbers-row">
											<input type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" id="quantity_1" class="qty2" name="quantity[<?php echo $row['id']; ?>]">
										<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
									</td>
									<td>
										<strong><?php echo "$"." ".($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']); ?></strong>
									</td>
									<td class="options">
									<input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" />
									</td>
									
                                </tr>
                                <?php }} }$_SESSION['pid']=$pdtid;?>
								
							</tbody>
						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-4 text-right">
							<button type="submit" name="submit"class="btn_1 gray">Update Cart</button>
						</div>
							<div class="col-sm-8">
							<div class="apply-coupon">
								<div class="form-group form-inline">
									<input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<?php
                        if(!empty($totalprice))
                        {
                            
                
                        ?>
                                    <ul>
		
				<li>
					<span>Total</span> <?php echo "$"." ".  $_SESSION['tp']="$totalprice". ".00"; ?>
				</li>
			</ul>
                                    
			<!--<a href="checkout.php" name="pay" class="btn_1 full-width cart">Proceed to Checkout</a>-->
                        <button type="submit" name="ordersubmit" class="btn_1 full-width cart">Proceed to Checkout</button>
                        <?php
                        }
                        ?>
					</div>
				</div>
			</div>
        </div>
        </form>
      
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