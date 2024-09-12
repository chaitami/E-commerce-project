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
			//header('location:cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}


 if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>
<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categories
										</a>
									</span>
									<div id="menu">
										<ul>
										<?php $sql=mysqli_query($con,"select id,categoryName  from category limit 6");
while($row=mysqli_fetch_array($sql))
{
    ?>
											<li><span><a href="category.php?cid=<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></a></span></li>
											
											<?php } ?>
											
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
							<form name="search" method="post" action="listing.php">
							<input type="text" placeholder="Search over 10.000 products" name="product">
							<button name="search" type="submit"><i class="header-icon_search_custom"></i></button>
							</form>
						</div>
					</div>

					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>					<?php
                                   if(!empty($_SESSION['cart'])){
													?>
								<div class="dropdown dropdown-cart">

									<a href="cart.php" class="cart_bt"><strong><?php echo $_SESSION['qnty'];?></strong></a>
									<div class="dropdown-menu">
										<ul>								<?php
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

	?>
											<li>
												<a href="product-detail.php?pid=<?php echo htmlentities($row['id']);?>">
													<figure><img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" data-src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span><?php echo $row['productName']; ?></span>$<?php echo ($row['productPrice']); ?></strong>
												</a>
												
											</li><?php } }?>
										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span>$<?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span></div>
											<a href="cart.php" class="btn_1 outline">View Cart</a><a href="checkout.php" class="btn_1">Checkout</a>
										</div>
									</div>
								</div><?php } else { ?>
									<div class="dropdown dropdown-cart">
									<a href="cart.php" class="cart_bt"><strong>0</strong></a>
									<div class="dropdown-menu">
										<ul>
											<li>
												<a href="">
													
													<strong><span>Your Shopping Cart is Empty.</span>$0.00</strong>
												</a>
												
											</li>
										</ul>
								</div><?php } ?>
								<!-- /dropdown-cart-->
							</li>
							<li>
								<a href="wishlist.php" class="wishlist"><span>Wishlist</span></a>
							</li>
							<li>
								<div class="dropdown dropdown-access">
									<a href="account.php" class="access_link"><span>Account</span></a>
									<div class="dropdown-menu">
									<?php if(strlen($_SESSION['login'])==0)  { ?>
                                   
										<a href="account.php" class="btn_1">Sign In or Sign Up</a>
										<?php }
										else{ ?>
										<a href="logout.php" class="btn_1">Disconnect</a>
										<?php } ?>
										<ul>
											<li>
												<a href="track-order.php"><i class="ti-truck"></i>Track your Order</a>
											</li>
											<!--<li>
												<a href="account.php"><i class="ti-user"></i>My Profile</a>
											</li>-->
											<li>
												<a href="contacts.php"><i class="ti-help-alt"></i>Help and Faq</a>
											</li>
										</ul>
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>
						</ul>
					</div>
						
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<form name="search" method="post" action="listing.php">
				<input type="text" class="form-control" placeholder="Search over 10.000 products" name="product">
				<input type="submit" class="btn_1 full-width" value="Search">
				</form>
			</div>
			<!-- /search_mobile -->
		</div>