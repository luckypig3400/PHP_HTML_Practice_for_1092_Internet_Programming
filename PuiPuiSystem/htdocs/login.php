<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

	<head>
		<title>Login-PuiPuiSystem</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript>
			<link rel="stylesheet" href="assets/css/noscript.css" />
		</noscript>
	</head>

	<body class="contact is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="index.html">Pui Pui 系統</a></h1>
				<nav id="nav">
					<ul>
						<li class="current"><a href="index.html">系統首頁</a></li>
						<li class="submenu">
							<a href="#">功能總覽</a>
							<ul>
								<li><a href="left-sidebar.html">Left Sidebar</a></li>
								<li><a href="right-sidebar.html">Right Sidebar</a></li>
								<li><a href="no-sidebar.html">No Sidebar</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li class="submenu">
									<a href="#">Submenu</a>
									<ul>
										<li><a href="#">子菜單1</a></li>
										<li><a href="#">子菜單2</a></li>
										<li><a href="#">子菜單3</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="signup.php" class="button primary">立即註冊</a></li>
						<li><a href="login.php">會員登入</a></li>
					</ul>
				</nav>
			</header>

			<section id="banner">
				<header class="special container">
					<span class="icon solid fa-user"></span>
					<h2>會員登入</h2>
					<p>已經有帳號了</p>
					<p>登入享受各項服務</p>
				</header>
			</section>

			<!-- Main -->
			<article id="main">

				<!-- One -->
				<section class="wrapper style4 special container medium">

					<!-- Content -->
					<div class="content">
						<form action="login.php" method="POST">
							<div class="row gtr-50">
								<div class="col-12">
									<input type="text" name="email" placeholder="Email" />
								</div>
								<div class="col-12">
									<input type="password" name="password" placeholder="Password" />
								</div>
								<div class="col-12">
									<ul class="buttons">
										<li><input type="submit" class="special" value="登入" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>

				</section>

			</article>

			<!-- Footer -->
			<footer id="footer">

				<ul class="icons">
					<li><a href="#" class="icon brands circle fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands circle fa-facebook-f"><span class="label">Facebook</span></a>
					</li>
					<li><a href="#" class="icon brands circle fa-google-plus-g"><span class="label">Google+</span></a>
					</li>
					<li><a href="#" class="icon brands circle fa-github"><span class="label">Github</span></a></li>
					<li><a href="#" class="icon brands circle fa-dribbble"><span class="label">Dribbble</span></a></li>
				</ul>

				<ul class="copyright">
					<li>&copy; Untitled</li>
					<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>

			</footer>

		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/jquery.scrollgress.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>

</html>