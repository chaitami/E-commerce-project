<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('trai.php');
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
			header('location:index.php');
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
        
     /*   if(empty($_SESSION['login']))
    {   
header('location:account.php');
} */




if(!empty($_POST['pay']))
{
   
    
  
    $nam=$_POST['nom'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zipcode=$_POST['zipcode'];
    $country=$_POST['country'];
    $tel=$_POST['tel'];
    $payment=$_POST['payment'];
    $shipping=$_POST['shipping'];
    
    $last=$_POST['last'];
    
    
    $query1=mysqli_query($con,"select id from users where email='".$_SESSION['login']."'");
    //$cur=mysqli_fetch_array($query1);
    $id=0;
    while($row = mysqli_fetch_array($query1)){    
       $id=$row[0];
    }
     
    
    
    //$id= trai::getid($email);
    //$r= trai::update($payment,$id);
    $query2=mysqli_query($con,"update orders set paymentMethod='$payment' where userId = '$id'");
   
    
    $query=mysqli_query($con,"update users set shippingAddress = '$address' , name='$nam / $last' , MethodShipping='$shipping' , Country='$country' , contactno='$tel' , shippingCity='$city' , shippingPincode='$zipcode' where email='".$_SESSION['login']."'");
    
    
    header("location:confirm.php");
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
    <title>MECHOP | Checkout </title>

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
    <link href="css/checkout.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

    <script src="./js/jquery-1.11.1.min.js"></script>

   <link rel="stylesheet" href="css/glyphicones.css">
    <link rel="stylesheet" href="css/styles.css">
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
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
		</div>
		<h1>Sign In or Create an Account</h1>
			
	</div>
            <!-- /page_header --><form action="checkout.php" method="POST">
			<div class="row">
                            
				<div class="col-lg-4 col-md-6">
					<div class="step first">
						<h3>1. User Info and Billing address</h3>
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Register</a>
					  </li>
					 
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
						
                                                   
							
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
                                                                    <input type="text" class="form-control" placeholder="Name" name="nom" required>
								</div>
								<div class="col-6 form-group pl-1">
                                                                    <input type="text" class="form-control" placeholder="Last Name" name="last" required>
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Full Address" name="address" required>
							</div>
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
                                                                    <input type="text" class="form-control" placeholder="City" name="city" required>
								</div>
								<div class="col-6 form-group pl-1">
                                                                    <input type="text" class="form-control" placeholder="Postal code" name="zipcode" required>
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-md-12 form-group">
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="country" required>
											<option value="" selected>Country</option>
											<option value="Europe">Europe</option>
											<option value="United states">United states</option>
											<option value="Asia">Asia</option>
                                                                                        <option value="Africa">Africa</option>
										</select>
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Telephone" name="tel" required>
							</div>
							
						</div>
						<!-- /tab_1 -->
					
						<!-- /tab_2 -->
					</div>
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step middle payments">
						<h3>2. Payment and Shipping</h3>
							<ul>
								<li>
									<label class="container_radio">Credit Card<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                                                            <input type="radio" name="payment" value="Credit Card" checked>
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Paypal<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                                                            <input type="radio" name="payment" value="Paypal">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Cash on delivery<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                                                            <input type="radio" name="payment" value="Cash on delivery">
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Bank Transfer<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                                                            <input type="radio" name="payment" value="Bank Transfer">
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<div class="payment_info d-none d-sm-block"><figure><img src="img/cards_all.svg" alt=""></figure>	<p>Sensibus reformidans interpretaris sit ne, nec errem nostrum et, te nec meliore philosophia. At vix quidam periculis. Solet tritani ad pri, no iisque definitiones sea.</p></div>
							
							<h6 class="pb-2">Shipping Method</h6>
							
						
						<ul>
								<li>
									<label class="container_radio">Standard shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                                                            <input type="radio" name="shipping" value="Standard shipping" checked>
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Express shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                                                            <input type="radio" name="shipping" value="Express shipping">
										<span class="checkmark"></span>
									</label>
								</li>
								
							</ul>
						
					</div>
					<!-- /step -->
					
                </div>
                <?php
                                   if(!empty($_SESSION['cart'])){
													?>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Order Summary</h3>
					<div class="box_general summary">
                    
						<ul>                    <?php
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
							<li class="clearfix"><em><?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>x <?php echo $row['productName']; ?></em>  <span><?php echo "$"." ".($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']); ?></span></li>
							<?php } }?>
						</ul>
						<ul>
							<li class="clearfix"><em><strong>Subtotal</strong></em>  <span> <?php echo "$"." ".  $_SESSION['tp']="$totalprice". ".00"; ?></span></li>
							<li class="clearfix"><em><strong>Shipping</strong></em> <span>$0</span></li>
							
						</ul>
						<div class="total clearfix">TOTAL <span> <?php echo "$"." ".  $_SESSION['tp']="$totalprice". ".00"; ?></span></div>
						<div class="form-group">
								<label class="container_check">Register to the Newsletter.
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
							</div>
						
                                               <!-- <a href="checkout.php" class="btn_1 full-width">Confirm and Pay</a>-->
                                               <input type="submit" name="pay" value="Confirm and Pay" class="btn_1 full-width">
            
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
                </div>
                <?php } else{ ?>
                    <div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Order Summary</h3>
					<div class="box_general summary">
                    

						<ul>
							<li class="clearfix"><em>Your Shopping Cart is Empty.</em>  <span>$0.00</span></li>
							
						</ul>
						<ul>
							<li class="clearfix"><em><strong>Subtotal</strong></em>  <span>$0.00</span></li>
							<li class="clearfix"><em><strong>Shipping</strong></em> <span>$0</span></li>
							
						</ul>
						<div class="total clearfix">TOTAL <span>$0.00</span></div>
						<div class="form-group">
								<label class="container_check">Register to the Newsletter.
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
							</div>
						
                       <!-- <a href="confirm.php" class="btn_1 full-width">Confirm and Pay</a>-->
                       
            
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
                </div>
            <?php } ?>
                               
			</div>
			<!-- /row -->
                         
		</div>
            </form>
		<!-- /container -->
	</main>
	<!--/main-->
	
	<footer style="background-color: black">
	<?php include('includes/footer.php');?>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	<!-- Modal Payments Method-->
	<div class="modal fade" id="payments_method" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">Payments Methods</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>Lorem ipsum dolor sit amet, oratio possim ius cu. Labore prompta nominavi sea ei. Sea no animal saperet gloriatur, ius iusto ullamcorper ad. Qui ignota reformidans ei, vix in elit conceptam adipiscing, quaestio repudiandae delicatissimi vis ei. Fabulas accusamus no has.</p>
			 <p>Et nam vidit zril, pri elaboraret suscipiantur ut. Duo mucius gloriatur at, in vis integre labitur dolores, mei omnis utinam labitur id. An eum prodesset appellantur. Ut alia nemore mei, at velit veniam vix, nonumy propriae conclusionemque ea cum.</p>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>

   <!-- <script>
    	// Other address Panel
		$('#other_addr input').on("change", function (){
	        if(this.checked)
	            $('#other_addr_c').fadeIn('fast');
	        else
	            $('#other_addr_c').fadeOut('fast');
	    });
	</script>-->
		
</body>
</html>