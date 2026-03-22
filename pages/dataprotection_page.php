<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<head>
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Privacy policy |GreenBumbleInvest Privacy policy</title>
    <meta name="description" content="Any information about our privacy policy you find here."/>
    <meta name="keywords" content="Datenschutz, privacy policy GreenbumbleInvest, GBI"/>
</head>

<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php'?>
<div class = "content">
    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
    <main>
        <div class="center_content">
            <?php include $phppath . 'logistic/legal_writings/privacyPolicy.html'?>>
        </div>
    </main>
    <aside class="right_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
</div>
<?php include_once $phppath . 'logistic/structure/footer.php'?>
</body>