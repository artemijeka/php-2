<?php
	/* $_SESSION['login'] = '';
     $_SESSION['privelege'] = '';*/
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="/my_shop/v/assets/font-awesome/css/font-awesome.css">-->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i|Roboto:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" href="/my_shop/v/assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script src="https://use.fontawesome.com/33c8f60758.js"></script>
	<title><?= $title ?></title>
</head>
<body>
	<!-- screen-1 -->
	<div class="screen-1">
		<div class="content">
			<header>
				<div>
					<a href="#">
						<img src="/my_shop/v/assets/img/logo.png">
					</a>
				</div>
				<div>
                    <a href="<?= ROOT ?>user/signin">Войти/Регистрация</a><br>
                    <a href="<?= ROOT ?>cart">Корзина (<span class="cart-count-index"></span>)</a> <br>
                    <?php if(isset($_SESSION['login'])): ?>
                        <a href="<?= ROOT ?>user/room/">Личный кабинет</a>
                    <?php endif; ?>
                    
					<!--<a href="#">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-youtube" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-pinterest-p" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>-->
				</div>
			</header>

			<div class="screen-1--intro">
				<div></div>
				<div class="screen-1--intro-block">
					<h1>JP Funride 2014</h1>
					<h3>Super easy going freeride boards based on the X-Cite Ride shape concept with additional control and super easy jibing.</h3>
					<a href="#">BUY NOW</a>
				</div>
			</div>

			<div class="screen-1--welcom-block">
				<p>WELCOME TO SURFHOUSE</p>
				<p>The only online store you will ever need for all your windsurfing and kitesurfing and SUP needs</p>
			</div>
		</div>
	</div>
	
	<!-- main content this page (sidebar, catalog) -->
	<div class="screen-main">
		<div class="content">
			<div class="screen-main--left">
				<div>MENU</div>
				<ul>
					<li><a href="#">ABOUT</a></li>
					<li><a href="#">APPAREL</a></li>
					<li><a href="#">SURF APPAREL</a></li>
					<li><a href="#">WINDSURF</a></li>
					<li><a href="#">KITESURF</a></li>
					<li><a href="#">ACCESSORIES</a></li>
					<li><a href="#">SALE</a></li>
					<li><a href="#">BRANDS</a></li>
					<li><a href="#">BLOG</a></li>
					<li><a href="#">GADGETS</a></li>
					<li><a href="#">CONTACTS</a></li>
				</ul>
				<div class="screen-main--now-is">
					<p>NOW <br> IS <br> OPEN!</p>
				</div>
			</div>
			<div class="screen-main--right">
				<?= $content ?>
			</div>
		</div>

	</div>

	<!-- brand carousel, instagram feed, social big items -->
	<div class="pre-footer">
		<div class="content">
			<div class="brand-carousel">
				<img src="/my_shop/v/assets/img/brand.png" alt="">
				<img src="/my_shop/v/assets/img/brand.png" alt="">
				<img src="/my_shop/v/assets/img/brand.png" alt="">
				<img src="/my_shop/v/assets/img/brand.png" alt="">
				<img src="/my_shop/v/assets/img/brand.png" alt="">
				<img src="/my_shop/v/assets/img/brand.png" alt="">
				<img src="/my_shop/v/assets/img/brand.png" alt="">
				<img src="/my_shop/v/assets/img/brand.png" alt="">
			</div>

			<div class="instagram-feed">
				<div class="title">
					<img src="/my_shop/v/assets/img/inst-icon.png">
					<span>Instagram feed:</span> <span>#surfhouse</span>
				</div>

				<div class="instagram-feed-photo">
					<img src="/my_shop/v/assets/img/instafeed/instafeed-1.png">
					<img src="/my_shop/v/assets/img/instafeed/instafeed-2.png">
					<img src="/my_shop/v/assets/img/instafeed/instafeed-3.png">
					<img src="/my_shop/v/assets/img/instafeed/instafeed-4.png">
					<img src="/my_shop/v/assets/img/instafeed/instafeed-5.png">
					<img src="/my_shop/v/assets/img/instafeed/instafeed-6.png">
				</div>
			</div>

			<div class="social-big-items">
				<div>
					<i class="fa fa-facebook" aria-hidden="true"></i>
				</div>
				<div>
					<i class="fa fa-twitter" aria-hidden="true"></i>
				</div>
				<div>
					<i class="fa fa-pinterest" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
	
	<!-- footer -->
	<footer>
		<div class="footer-main">
			<div class="content">
				<div class="footer-main--menu">
					<div class="title">Category</div>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">About us</a></li>
						<li><a href="#">Eshop</a></li>
						<li><a href="#">Features</a></li>
						<li><a href="#">New collections</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contacts</a></li>
					</ul>
				</div>
				<div class="footer-main--menu">
					<div class="title">Our Account</div>
					<ul>
						<li><a href="#">Your Account</a></li>
						<li><a href="#">Personal Information</a></li>
						<li><a href="#">Addresses</a></li>
						<li><a href="#">Discount</a></li>
						<li><a href="#">Orders History</a></li>
						<li><a href="#">Addresses</a></li>
						<li><a href="#">Search Terms</a></li>
					</ul>
				</div>
				<div class="footer-main--menu">
					<div class="title">Our Support</div>
					<ul>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="#">Mobile</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Mobile</a></li>
						<li><a href="#">Adresses</a></li>
					</ul>
				</div>
				<div class="footer-main--subscribe">
					<div class="title">Newsletter</div>
					<p>Join thousands of other people subscribe to our news</p>
					<form action="" method="post">
						<input type="email" name="user_email" placeholder="INSERT EMAIL">
						<button type="submit">SUBMIT</button>
					</form>
					<div class="payments">
						<img src="/my_shop/v/assets/img/payment/payment-1.png">
						<img src="/my_shop/v/assets/img/payment/payment-2.png">
						<img src="/my_shop/v/assets/img/payment/payment-3.png">
						<img src="/my_shop/v/assets/img/payment/payment-4.png">
						<img src="/my_shop/v/assets/img/payment/payment-5.png">
						<img src="/my_shop/v/assets/img/payment/payment-6.png">
					</div>
				</div>
				<div class="footer-main--about">
					<div class="title">About Us</div>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
					Aenean commodo ligula eget dolor. Aenean massa. Cum sociis 
					natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
				 	Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. </p>
				 	<ul>
				 		<li>
				 			<div>Phone:</div>
				 			<div>1-999-342-9876</div>
				 		</li>
				 		<li>
				 			<div>e-mail</div>
				 			<div class="yellow">info@surfhouse.com</div>
				 		</li>
				 	</ul>
				</div>
			</div>
		</div>

		<div class="footer-copyright">
			<div class="content">
				<div>&#169; 2014  SURFHOUSE. All rights reserved - Designed by theuncreativelab.com</div>
				<div>
					<a href="#">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-pinterest-p" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-google-plus" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
					<a href="#">
						<i class="fa fa-rss" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</footer>
    
    <div class="pop-message"></div>
    <div class="error-message"></div>
	<script src="/my_shop/v/assets/js/script.js"></script>
</body>
</html>