<?php
//登入系統參考:
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$userID = $password = $confirm_password = "";
$userID_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Validate userID
	if (empty(trim($_POST["userID"]))) {
		$userID_err = "Please enter a userID.";
	} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["userID"]))) {
		$userID_err = "userID can only contain letters, numbers, and underscores.";
	} else {
		// Prepare a select statement
		$sql = "SELECT id FROM users WHERE userID = :userID";

		if ($stmt = $pdo->prepare($sql)) {
			// Bind variables to the prepared statement as parameters
			$stmt->bindParam(":userID", $param_userID, PDO::PARAM_STR);

			// Set parameters
			$param_userID = trim($_POST["userID"]);

			// Attempt to execute the prepared statement
			if ($stmt->execute()) {
				if ($stmt->rowCount() == 1) {
					$userID_err = "This userID is already taken.";
				} else {
					$userID = trim($_POST["userID"]);
				}
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			unset($stmt);
		}
	}

	// Validate password
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter a password.";
	} elseif (strlen(trim($_POST["password"])) < 6) {
		$password_err = "Password must have atleast 6 characters.";
	} else {
		$password = trim($_POST["password"]);
	}

	// Validate confirm password
	if (empty(trim($_POST["confirm_password"]))) {
		$confirm_password_err = "Please confirm password.";
	} else {
		$confirm_password = trim($_POST["confirm_password"]);
		if (empty($password_err) && ($password != $confirm_password)) {
			$confirm_password_err = "Password did not match.";
		}
	}

	// Check input errors before inserting in database
	if (empty($userID_err) && empty($password_err) && empty($confirm_password_err)) {

		// Prepare an insert statement
		$sql = "INSERT INTO users (userID, password) VALUES (:userID, :password)";

		if ($stmt = $pdo->prepare($sql)) {
			// Bind variables to the prepared statement as parameters
			$stmt->bindParam(":userID", $param_userID, PDO::PARAM_STR);
			$stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

			// Set parameters
			$param_userID = $userID;
			$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

			// Attempt to execute the prepared statement
			if ($stmt->execute()) {
				// Redirect to login page
				header("location: login.php");
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			unset($stmt);
		}
	}

	// Close connection
	unset($pdo);
}
?>

<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>SignUp-PuiPuiSystem</title>
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
				<span class="icon solid fa-user-plus"></span>
				<h2>註冊會員</h2>
				<p>請填寫以下資料註冊您的帳號</p>
				<p>Email請填寫有在使用的以免錯失系統公告</p>
			</header>
		</section>

		<!-- Main -->
		<article id="main">

			<!-- One -->
			<section class="wrapper style4 special container medium">

				<!-- Content -->
				<div class="content">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
						<div class="row gtr-50">
							<div class="col-6 col-12-mobile">
								<input type="text" name="Fname" placeholder="First Name" />
							</div>
							<div class="col-6 col-12-mobile">
								<input type="text" name="Lname" placeholder="Last Name" />
							</div>
							<div class="col-12">
								<input type="text" name="userID" placeholder="User ID" class="form-control <?php echo (!empty($userID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $userID; ?>">
								<span class="invalid-feedback"><?php echo $userID_err; ?></span>
							</div>
							<div class="col-12">
								<input type="text" name="email" placeholder="Email" />
							</div>
							<div class="col-12">
								<input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
								<span class="invalid-feedback"><?php echo $password_err; ?></span>
							</div>
							<div class="col-12">
								<input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
								<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
							</div>
							<div class="col-6 col-12-mobile">
								<input type="submit" class="btn btn-primary" value="送出註冊">
							</div>
							<div class="col-6 col-12-mobile">
								<input type="reset" class="btn btn-secondary ml-2" value="清空重填">
							</div>
							<div class="col-12">
								<p>已經有帳號了? <a href="login.php">點此立即登入</a>.</p>
								<p>Already have an account? <a href="login.php">Login here</a>.</p>
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