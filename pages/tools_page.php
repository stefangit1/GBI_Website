<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<head>
    <link rel="stylesheet" href="<?php echo$htmlpath?>styles/page_styling/tools_page.css" type="text/css">
    <link rel="stylesheet" href="<?php echo$htmlpath?>styles/button_styling/tech_button.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Tools page |GreenBumbleInvest</title>
    <meta name="description" content="Searching for your trading tool? Members trust our applications. Find your favourite finance tool here. Huge selection and many features included."/>
    <meta name="keywords" content="finance tools, huge selection, new tools, stock market, interest"/>
</head>

<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php'?>
<div class = "content">
    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
    <main>
        <div class="content_center">
            <h1>Vereinfachen Sie Ihren Alltag!</h1>
            <div class="tool_container">
                <div class="tool_item">
                    <div class="tool_item_titel"><h2> <?php echo $lang == 'de' ?'Positionsrechner':'Position calculator'?></h2></div>
                    <div class="tool_item_image"></div>
                    <div class="tool_item_desc"><p><?php echo $lang == 'de' ?'Berechnen Sie sich die passende Größe, wie viele Pips maximal Verloren oder Gewonnen werden dürfen, mit Ihrem Risiko, im Forex':'Calculate the appropriate size of how many pips can be lost or won based on your risk in Forex'?></p></div>
                    <a href="position_calc_page.php">
                        <div class="button-split">
                            <span class="button-text"> <?php echo $lang == 'de' ?'Positionsrechner':'Position calculator'?></span>
                            <span class="button-arrow"></span>
                        </div>
                    </a>
                </div>
                <div class="tool_item">
                    <div class="tool_item_titel"><h2> <?php echo $lang == 'de' ?'Zinsrechner':'Interest calculator'?></h2></div>
                    <div class="tool_item_image"></div>
                    <div class="tool_item_desc"><p><?php echo $lang == 'de' ?'Rechnen Sie sich Ihren Zinseszins über X beliebige Jahre aus. Auf Knopfdruck, sind die Steuern inkludiert. ':'Calculate your compound interest over any number of years. At the push of a button, taxes are included.'?></p></div>
                    <a href="interest_calc_page.php">
                        <div class="button-split">
                            <span class="button-text"> <?php echo $lang == 'de' ?'Zinsrechner':'Interest calculator'?></span>
                            <span class="button-arrow"></span>
                        </div>
                    </a>
                </div>
                <div class="tool_item">
                    <div class="tool_item_titel"><h2> <?php echo $lang == 'de' ?'Börsenuhr':'Stock market clock'?></h2></div>
                    <div class="tool_item_image"></div>
                    <div class="tool_item_desc"><p><?php echo $lang == 'de' ?'Alle Börsen Öffungs/Schlusszeiten auf einer Anzeige':'All stock exchange opening/closing times on one display'?></p></div>
                    <a href="worldclock_page.php">
                        <div class="button-split">
                            <span class="button-text"> <?php echo $lang == 'de' ?'Börsenuhr':'Stock market clock'?></span>
                            <span class="button-arrow"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <aside class="right_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>

</div>
<?php include_once $phppath . 'logistic/structure/footer.php'?>
</body>