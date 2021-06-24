<?php
// 歡迎頁面參考自:
// https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
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
    <title>Welcome-PuiPuiSystem</title>
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

        <!-- CTA 當作歡迎頁面的頁首使用-->
        <section id="cta">

            <header>
                <h2><strong>~Welcome~</strong></h2>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>Hi, <b>
                        <?php echo htmlspecialchars($_SESSION["userID"]); ?>
                    </b>.</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </header>
            <footer>
                <ul class="buttons">
                    <li><a href="#main" class="button primary scrolly">開始使用</a></li>
                </ul>
            </footer>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </section>

        <!-- Main -->
        <article id="main">

            <header class="special container">
                <span class="icon solid fa-chart-bar"></span>
                <h2><strong>Pui Pui</strong>系統功能總覽</h2>
                <p>&nbsp;</p>
            </header>

            <section class="wrapper style1 container special">
                <div class="row">
                    <div class="col-4 col-12-narrower">

                        <section>
                            <span class="icon solid featured fa-book-medical"></span>
                            <header>
                                <h3>建立題庫</h3>
                            </header>
                            <p>讓您輕鬆建立自己的題庫，提供舒適簡潔的介面方便您新增/編輯題目，也提供CSV文件讓您可以方便快速匯入大量題目</p>
                        </section>
                        <footer>
                            <ul class="buttons">
                                <li><a href="addNewQues.php" class="button small">立即前往</a></li>
                            </ul>
                        </footer>
                    </div>
                    <div class="col-4 col-12-narrower">

                        <section>
                            <span class="icon solid featured fa-gamepad"></span>
                            <header>
                                <h3>遊戲模式</h3>
                            </header>
                            <p>選擇題遊戲模式，可選擇計時模擬考試(結束後公布解答)，或是複習模式(無時間限制並及時公布解答)<br><br></p>
                        </section>
                        <footer>
                            <ul class="buttons">
                                <li><a href="viewMyQues.php" class="button small">立即前往</a></li>
                            </ul>
                        </footer>
                    </div>
                    <div class="col-4 col-12-narrower">

                        <section>
                            <span class="icon solid featured fa-warehouse"></span>
                            <header>
                                <h3>創建房間</h3>
                            </header>
                            <p>自己一個人遊玩太無趣? 沒問題!<br>建立房間邀請好友一同加入一較高下! 一同遊玩更有趣!<br><br></p>
                        </section>

                        <footer>
                            <ul class="buttons">
                                <li><a href="createRoom.php" class="button small">立即前往</a></li>
                            </ul>
                        </footer>
                    </div>
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