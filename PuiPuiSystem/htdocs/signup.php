<?php
//登入系統參考:
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

// 引導已經登入的使用者留在Welcome Page不再註冊
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
	header("location: welcome.php");
	exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$userID = $password = $confirm_password = $Fname = $Lname = $email = "";
$userID_err = $password_err = $confirm_password_err = $Fname_err = $Lname_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Validate First name
	if (empty(trim($_POST["Fname"]))) {
		$Fname_err = "Please enter your First Name.";
	} else {
		$Fname = trim($_POST["Fname"]);
	}

	// Validate Last name
	if (empty(trim($_POST["Lname"]))) {
		$Lname_err = "Please enter your Last Name.";
	} else {
		$Lname = trim($_POST["Lname"]);
	}

	// Validate userID
	if (empty(trim($_POST["userID"]))) {
		$userID_err = "Please enter a userID.";
	} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["userID"]))) {
		$userID_err = "userID can only contain letters, numbers, and underscores.";
	} else {
		// Prepare a select statement
		$sql = "SELECT userID FROM user WHERE userID = :userID";

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

	// Validate email
	if (empty(trim($_POST["email"]))) {
		$email_err = "Please enter your email.";
	} else {
		$email = trim($_POST["email"]);
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
	if (empty($userID_err) && empty($password_err) && empty($confirm_password_err) && empty($Fname_err) && empty($Lname_err) && empty($email_err)) {

		// Prepare an insert statement
		$sql = "INSERT INTO user (userID, Fname, Lname, Email, Password, lastLoginIP) VALUES (:userID, :Fname, :Lname, :Email, :password, :lastLoginIP)";

		if ($stmt = $pdo->prepare($sql)) {
			// Bind variables to the prepared statement as parameters
			$stmt->bindParam(":userID", $param_userID, PDO::PARAM_STR);
			$stmt->bindParam(":Fname", $param_Fname, PDO::PARAM_STR);
			$stmt->bindParam(":Lname", $param_Lname, PDO::PARAM_STR);
			$stmt->bindParam(":Email", $param_email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
			$stmt->bindParam(":lastLoginIP", $param_IP, PDO::PARAM_STR);

			// Set parameters 這邊可以再做個字串處理:例如移除特殊符號防止SQL Injection
			$param_userID = $userID;
			$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			$param_Fname = $Fname;
			$param_Lname = $Lname;
			$param_email = $email;
			$param_IP = "New sign up not login yet";

			// Attempt to execute the prepared statement
			if ($stmt->execute()) {
				//echo "<script>alert('註冊成功!\n1秒後自動轉跳至登入畫面');</script>";
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
							<li><a href="joinRoom.php">加入房間</a></li>
							<li><a href="viewPublicQues.php">劉覽公開題庫</a></li>
							<li class="submenu">
								<a href="#">會員專屬</a>
								<ul>
									<li><a href="addNewQues.php">建立新的題庫</a></li>
									<li><a href="editQues.php">編輯我的題庫</a></li>
									<li><a href="createRoom.php">建立房間</a></li>
								</ul>
							</li>
							<li><a href="contact.html">聯繫我們</a></li>
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
					<h2>Sign Up</h2>
					<p>註冊您專屬的Pui Pui帳號</p>

					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
						<div class="row gtr-50">
							<div class="col-6 col-12-mobile">
								<input type="text" name="Fname" placeholder="名字 First Name" class="form-control <?php echo (!empty($Fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Fname; ?>">
								<span class="invalid-feedback"><?php echo $Fname_err; ?></span>
							</div>
							<div class="col-6 col-12-mobile">
								<input type="text" name="Lname" placeholder="姓氏 Last Name" class="form-control <?php echo (!empty($Lname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Lname; ?>">
								<span class="invalid-feedback"><?php echo $Lname_err; ?></span>
							</div>
							<div class="col-12">
								<input type="text" name="userID" placeholder="User ID" class="form-control <?php echo (!empty($userID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $userID; ?>">
								<span class="invalid-feedback"><?php echo $userID_err; ?></span>
							</div>
							<div class="col-12">
								<input type="email" name="email" placeholder="Email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
								<span class="invalid-feedback"><?php echo $email_err; ?></span>
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
				<li>&copy; Pui Pui System</li>
				<li>Website Creator: LuckyPig3400</li>
				<li>Template Design: <a href="http://html5up.net">HTML5 UP</a></li>
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