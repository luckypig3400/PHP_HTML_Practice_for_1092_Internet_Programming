<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
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
    <title>新增題庫-PuiPuiSystem</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="index is-preload">

    <div id="page-wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <h1 id="logo"><a href="index.html">Pui Pui 系統</a></h1>
            <nav id="nav">
                <ul>
                    <li class="current"><a href="welcome.php">系統首頁</a></li>
                    <li class="submenu">
                        <a href="#">功能總覽</a>
                        <ul>
                            <li><a href="joinRoom.php">加入房間</a></li>
                            <li><a href="viewPublicQues.php">劉覽公開題庫</a></li>
                            <li class="submenu">
                                <a href="#">會員專屬</a>
                                <ul>
                                    <li><a href="addNewQues.php">建立新的題庫</a></li>
                                    <li><a href="viewMyQues.php">瀏覽我的題庫</a></li>
                                    <li><a href="createRoom.php">建立房間</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">聯繫我們</a></li>
                        </ul>
                    </li>
                    <li><a href="reset-password.php" class="button alert-danger">重設密碼</a></li>
                    <li><a href="logout.php" class="button primary">登出帳號</a></li>
                </ul>
            </nav>
        </header>

        <section id="banner">
            <header class="special container">
                <span class="icon solid fa-plus-square"></span>
                <h2>新增題庫</h2>
            </header>
        </section>

        <!-- Main -->
        <article id="main">

            <!-- One -->
            <section class="wrapper style4 special container medium">

                <!-- Content -->
                <div class="content">
                    <h2>題庫新增系統</h2>
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
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>