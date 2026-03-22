<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<head>
    <title><?php echo $lang == 'de' ? 'Forex Positionsrechner' : 'Forex Position Calculator';?></title>
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/page_styling/position_calc_page.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Forex position calculator |GreenBumbleInvest</title>
    <meta name="description" content="Calculate your forex position like a pro. Integrated risk management options. Show max loose and max win in PIPS. Include your spread and get perfect results!"/>
    <meta name="keywords" content="forex position calculator, pips, spread, risk management, stock market calculator"/>
</head>
<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php'?>
<div class = "content">
    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>

    <main>
        <div class="positioncalc_titel">
            <h1><?php echo $lang == 'de' ? 'Forex Positionsrechner' : 'Forex Position Calculator';?></h1>
            <h2><?php echo $lang == 'de' ? 'Optimieren Sie Ihr Risikomanagement mit unserem Forex-Positionsgrößenrechner' : 'Optimize your risk management with our Forex position size calculator';?></h2>
               <p><?php echo $lang == 'de' ? 
               'Im Devisenhandel ist die richtige Positionsgröße entscheidend für den langfristigen Erfolg. Unser Forex-Positionsgrößenrechner hilft Ihnen dabei, das Risiko jeder einzelnen Position präzise zu berechnen, basierend auf Ihrem Kontostand, dem gewünschten Risiko pro Trade und dem gewählten Währungspaar. Egal, ob Sie ein erfahrener Trader oder Anfänger sind, unser Tool unterstützt Sie dabei, fundierte Entscheidungen zu treffen und Ihre Handelsstrategie zu optimieren. Geben Sie einfach Ihre Parameter ein, und erhalten Sie sofort die ideale Positionsgröße für Ihren nächsten Trade.
                Beginnen Sie jetzt und handeln Sie mit mehr Vertrauen und Kontrolle!' : 
                'In foreign exchange trading, the correct position size is crucial for long-term success. Our Forex position size calculator helps you accurately calculate the risk of each individual position based on your account balance, desired risk per trade and the chosen currency pair. Whether you are an experienced trader or a beginner, our tool will help you make informed decisions and optimize your trading strategy. Simply enter your parameters and instantly get the ideal position size for your next trade.';?></p>
            <button><a href="#help_poscalc" class="button1"><?php echo $lang == 'de' ? 'Wie funktionierts' : 'How does it work?';?></a></button>
        </div>
        <div class="container">
            <div class="form-container">
                <form id="forex-form" method="post">
                    <label for="kapital"><?php echo $lang == 'de' ? 'Kapital:' : 'Capital:';?></label>
                    <input type="number" id="kapital" name="kapital" step="0.01" required>

                    <label for="hebel"><?php echo $lang == 'de' ? 'Hebel:' : 'Lever:';?></label>
                    <input type="number" id="hebel" name="hebel" step="1" required>

                    <label for="lot_size"><?php echo $lang == 'de' ? 'Lot Size:' : 'Lot Size:';?></label>
                    <input type="number" id="lot_size" name="lot_size" step="0.01" required>

                    <label for="max_verlust"><?php echo $lang == 'de' ? 'Max Verlust $:' : 'Max loss $:';?></label>
                    <input type="number" id="max_verlust" name="max_verlust" step="0.01" required>

                    <label for="max_gewinn"><?php echo $lang == 'de' ? 'Max Gewinn $:' : 'Max profit $:';?></label>
                    <input type="number" id="max_gewinn" name="max_gewinn" step="0.01" required>

                    <label for="spread"><?php echo $lang == 'de' ? 'Spread:' : 'Spread:';?></label>
                    <input type="number" id="spread" name="spread" step="0.01" required>

                    <input type="submit" value="<?php echo $lang == 'de' ? 'Berechnen' : 'Calculate';?>">
                </form>
            </div>
            <div class="table-container" id="result-section">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $kapital = $_POST["kapital"];
                    $hebel = $_POST["hebel"];
                    $lot_size = $_POST["lot_size"];
                    $max_verlust = $_POST["max_verlust"];
                    $max_gewinn = $_POST["max_gewinn"];
                    $spread = $_POST["spread"];

                    $einheiten = $kapital * $hebel;
                    $benoetigtes_kapital = (100000 * $lot_size) / $hebel;
                    $preis_pro_pip = $lot_size * 10;
                    $max_pip_verlust = ($max_verlust / $preis_pro_pip) - $spread;
                    $max_pip_gewinn = ($max_gewinn / $preis_pro_pip) + $spread;

                    echo "<h2>Ergebnis</h2>";
                    echo "<table>";
                    echo "<tr><th>Einheiten</th><td>" . number_format($einheiten, 2, ',', '.') . " €</td></tr>";
                    echo "<tr><th>Benötigtes Kapital</th><td>" . number_format($benoetigtes_kapital, 2, ',', '.') . " €</td></tr>";
                    echo "<tr><th>Preis pro Pip</th><td>" . number_format($preis_pro_pip, 2, ',', '.') . " €</td></tr>";
                    echo "<tr><th>Max PIP Verlust</th><td>" . number_format($max_pip_verlust, 0, ',', '.') . "</td></tr>";
                    echo "<tr><th>Max PIP Gewinn</th><td>" . number_format($max_pip_gewinn, 0, ',', '.') . "</td></tr>";
                    echo "</table>";
                }
                ?>
            </div>
        </div>
        <script>
            document.getElementById('forex-form').addEventListener('submit', function(event) {
                setTimeout(function() {
                    if (window.innerWidth <= 768) {
                        document.getElementById('result-section').scrollIntoView({ behavior: 'smooth' });
                    }
                }, 100);
            });
        </script>

        <div class="positioncalc_titel" id="help_poscalc">
            <h2><?php echo $lang == 'de' ? 'Forex Positionsrechner Benutzeranleitung' : 'Forex Position Calculator User Guide';?></h2>
            <p><?php echo $lang == 'de' ? 
            'Dieser Forex Positionsrechner hilft Ihnen, wichtige Kennzahlen für Ihre Trades zu berechnen, basierend auf Ihrem verfügbaren Kapital, Hebel, Lotgröße und weiteren Parametern. Folgen Sie diesen Schritten, um die Berechnungen durchzuführen:' : 
            'This Forex position calculator helps you calculate important metrics for your trades based on your available capital, leverage, lot size and other parameters. Follow these steps to perform the calculations:';?>
                
            </p>
            <ol>
                <li><strong><?php echo $lang == 'de' ? 'Kapital:' : 'Capital:';?></strong><?php echo $lang == 'de' ? 'Geben Sie Ihr aktuelles Handelskapital in das Feld "Kapital" ein. Dies ist der Betrag, den Sie für den Trade einsetzen möchten.' : 'Enter your current trading capital in the "Capital" field. This is the amount you want to stake on the trade.';?></li>
                <li><strong><?php echo $lang == 'de' ? 'Hebel:' : 'Lever:';?></strong><?php echo $lang == 'de' ? 'Tragen Sie den Hebel ein, den Sie für den Trade verwenden. Der Hebel multipliziert Ihr Kapital, sodass Sie größere Positionen handeln können.' : 'Enter the leverage you are using for the trade. Leverage multiplies your capital, allowing you to trade larger positions.';?></li>
                <li><strong><?php echo $lang == 'de' ? 'Lot Size:' : 'Lot Size:';?></strong><?php echo $lang == 'de' ? 'Geben Sie die Lotgröße ein, die Sie handeln möchten. Die Lotgröße bestimmt, wie viel Sie in einem Trade investieren.' : 'Enter the lot size you want to trade. The lot size determines how much you invest in a trade.';?></li>
                <li><strong><?php echo $lang == 'de' ? 'Max Verlust $:' : 'Max Loss $:';?></strong><?php echo $lang == 'de' ? 'Definieren Sie den maximalen Verlust, den Sie in diesem Trade akzeptieren möchten. Dies hilft, das Risiko zu steuern.' : 'Define the maximum loss you want to accept in this trade. This helps manage risk.';?></li>
                <li><strong><?php echo $lang == 'de' ? 'Max Gewinn $:' : 'Max Profit $:';?></strong><?php echo $lang == 'de' ? 'Geben Sie den maximalen Gewinn ein, den Sie in diesem Trade erzielen möchten. Dies gibt Ihnen ein Ziel für Ihren Trade.' : 'Enter the maximum profit you want to make in this trade. This gives you a target for your trade.';?></li>
                <li><strong><?php echo $lang == 'de' ? 'Spread:' : 'Spread:';?></strong><?php echo $lang == 'de' ? 'Tragen Sie den Spread ein, den Sie von Ihrem Broker erhalten. Der Spread ist die Differenz zwischen Kauf- und Verkaufspreis und beeinflusst Ihre Gewinn- und Verlustrechnung.' : 'Enter the spread you receive from your broker. The spread is the difference between the buy and sell price and affects your profit and loss statement.';?></li>
                <li><strong><?php echo $lang == 'de' ? 'Berechnen' : 'Calculate';?></strong><?php echo $lang == 'de' ? 'Klicken Sie auf "Berechnen", um die Ergebnisse zu sehen. Der Rechner zeigt Ihnen die Einheiten, das benötigte Kapital, den Preis pro Pip, den maximalen PIP-Verlust und den maximalen PIP-Gewinn an.' : 'Click "Calculate" to see the results. The calculator shows you the units, the capital required, the price per pip, the maximum PIP loss and the maximum PIP profit.';?></li>
            </ol>
            <p>
                <strong><?php echo $lang == 'de' ? 'Ergebnisse anzeigen:' : 'View results:';?></strong><br>
                <?php echo $lang == 'de' ? 'Nach dem Klicken auf "Berechnen" sehen Sie die Berechnungsergebnisse im unteren Bereich des Bildschirms. Bei kleineren Bildschirmen scrollt die Seite automatisch zu den Ergebnissen.' : 'After clicking "Calculate", you will see the calculation results at the bottom of the screen. On smaller screens, the page automatically scrolls to the results.';?>
            </p>
        </div>
    </main>

    <aside class="right_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
</div>
<?php include_once $phppath . 'logistic/structure/footer.php'?>
</body>