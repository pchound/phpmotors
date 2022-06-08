<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/phpmotors/css/small_nav.css">
    <link rel="stylesheet" href="/phpmotors/css/medium_nav.css">
    <link rel="stylesheet" href="/phpmotors/css/large_nav.css">
    
    <link rel="stylesheet" href="/phpmotors/css/xsmall.css">
    <link rel="stylesheet" href="/phpmotors/css/small.css">
    <link rel="stylesheet" href="/phpmotors/css/medium.css">
    <link rel="stylesheet" href="/phpmotors/css/large.css">
    <title>PHP Motors - Home</title>

</head>
<body>
<div id="top">
    <div id ="logo_area">
        <img src="/phpmotors/images/site/logo.png" id="logo" alt="PHP Motors">
    </div>

    <!--<a href="view/login.php" id="my_account">My Account</a>-->
    <a href= "/phpmotors/accounts/index.php?action=login_page" id="my_account">My Account</a>
    
</div>
<!--<nav>
    <ul class="navigation">    
        <li class="ham"><a class="ham_link" href="#"><span class="ham_text">&equiv; MENU</span></a></li>

        <li><a href="home.php" class="nav_link"><span class="link_text">Home</span></a></li>
        <li><a href="#classic.php" class="nav_link"><span class="link_text">Classic</span></a></li>
        <li><a href="#sports.php" class="nav_link"><span class="link_text">Sports</span></a></li>
        <li><a href="#suv.php" class="nav_link"><span class="link_text">SUV</span></a></li>
        <li><a href="#trucks.php" class="nav_link"><span class="link_text">Trucks</span></a></li>
        <li><a href="#used.php" class="nav_link"><span class="link_text">Used</span></a></li>
    </ul>
</nav>-->
<nav>
    <?php 
echo $navList;
    ?>
</nav>
<main>
<div id="main_content">