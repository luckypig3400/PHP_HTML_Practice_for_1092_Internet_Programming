<?php
// 登入系統參考
// https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: welcome.php");
	exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$userID = $password = "";
$userID_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Check if userID is empty
	if (empty(trim($_POST["userID"]))) {
		$userID_err = "Please enter userID.";
	} else {
		$userID = trim($_POST["userID"]);
	}

	// Check if password is empty
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter your password.";
	} else {
		$password = trim($_POST["password"]);
	}

	// Validate credentials
	if (empty($userID_err) && empty($password_err)) {
		// Prepare a select statement
		$sql = "SELECT id, userID, password FROM users WHERE userID = :userID";

		if ($stmt = $pdo->prepare($sql)) {
			// Bind variables to the prepared statement as parameters
			$stmt->bindParam(":userID", $param_userID, PDO::PARAM_STR);

			// Set parameters
			$param_userID = trim($_POST["userID"]);

			// Attempt to execute the prepared statement
			if ($stmt->execute()) {
				// Check if userID exists, if yes then verify password
				if ($stmt->rowCount() == 1) {
					if ($row = $stmt->fetch()) {
						$id = $row["id"];
						$userID = $row["userID"];
						$hashed_password = $row["password"];
						if (password_verify($password, $hashed_password)) {
							// Password is correct, so start a new session
							session_start();

							// Store data in session variables
							$_SESSION["loggedin"] = true;
							$_SESSION["id"] = $id;
							$_SESSION["userID"] = $userID;

							// Redirect user to welcome page
							header("location: welcome.php");
						} else {
							// Password is not valid, display a generic error message
							$login_err = "Invalid userID or password.";
						}
					}
				} else {
					// userID doesn't exist, display a generic error message
					$login_err = "Invalid userID or password.";
				}
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
					<h2>Login</h2>
					<p>登入您的Pui Pui帳號</p>

					<?php
					if (!empty($login_err)) {
						echo '<div class="alert alert-danger">' . $login_err . '</div>';
					}
					?>

					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
						<div class="row gtr-50">
							<div class="col-12">
								<input type="text" name="userID" placeholder="User ID" class="form-control <?php echo (!empty($userID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $userID; ?>">
								<span class="invalid-feedback"><?php echo $userID_err; ?></span>
							</div>
							<div class="col-12">
								<input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
								<span class="invalid-feedback"><?php echo $password_err; ?></span>
							</div>
							<div class="col-12">
								<ul class="buttons">
									<li><input type="submit" class="special" value="登入" /></li>
								</ul>
							</div>
							<div class="col-6 col-12-mobile">
								<p>還沒有帳號? <a href="signup.php">立即註冊</a>.</p>
							</div>
							<div class="col-6 col-12-mobile">
								<p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
							</div>
						</div>
					</form>

				</div>
			</section>
		</article>
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