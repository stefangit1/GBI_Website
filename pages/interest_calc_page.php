<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<head>
    <title><?php echo $lang == 'de' ? 'Zinsrechner' : 'Interest Calculator';?></title>
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/page_styling/interest_calc_page.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Free interest calculator |GreenBumbleInvest</title>
    <meta name="description" content="Calculate interest over a time of years. Taken into account taxes for each country. Choose reinvest or not. Special for any finance calculating challenge."/>
    <meta name="keywords" content="interest calculator, Zinsrechner, for stocks, for bonds, for investing, for real estate"/>
</head>

<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php'?>
<div class = "content">
    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>

    <main>
        <div class="title_zinsrechner">
            <h1><?php echo $lang == 'de' ? 'Zinsrechner' : 'Interest Calculator'; ?></h1>
            <p>
                <?php echo $lang == 'de' ? 
                'Mit unserem Zinsrechner können Sie einfach und schnell berechnen, wie sich Ihr Startkapital über die Jahre hinweg entwickeln wird. Geben Sie einfach Ihr Startkapital, den Zinssatz und die Anzahl der Jahre ein, um eine präzise Prognose zu erhalten.
                Zusätzlich haben Sie die Möglichkeit, spezifische steuerliche Unterschiede in verschiedenen Ländern zu berücksichtigen und zu entscheiden, ob die erzielten Zinsen reinvestiert werden sollen.
                Nutzen Sie dieses Tool, um fundierte Entscheidungen über Ihre Finanzplanung zu treffen und das Wachstum Ihres Vermögens über die Zeit hinweg zu optimieren.' : 
                'With our interest calculator you can quickly and easily calculate how your starting capital will develop over the years. Simply enter your starting capital, interest rate and number of years to get a precise forecast.
                In addition, you have the opportunity to take specific tax differences into account in different countries and decide whether the interest earned should be reinvested.
                Use this tool to make informed decisions about your financial planning and optimize the growth of your wealth over time.'; ?>
            </p>
        </div>

        <div class="container">
            <div class="form-container">
                <form method="post">
                    <label for="startkapital"><?php echo $lang == 'de' ? 'Startkapital:' : 'Starting Capital:'; ?></label>
                    <input type="number" id="startkapital" name="startkapital" step="0.01" required><br><br>

                    <label for="zinssatz"><?php echo $lang == 'de' ? 'Zinssatz in Prozent:' : 'Interest rate in percent:'; ?></label>
                    <input type="number" id="zinssatz" name="zinssatz" step="0.01" required><br><br>

                    <label for="jahre"><?php echo $lang == 'de' ? 'Anzahl der Jahre:' : 'Number of years:'; ?></label>
                    <input type="number" id="jahre" name="jahre" required><br><br>

                    <label for="land"><?php echo $lang == 'de' ? 'Land:' : 'Country:'; ?></label>
                    <select id="land" name="land" required>
                        <option value="de" selected><?php echo $lang == 'de' ? 'Deutschland' : 'Germany'; ?></option>
                        <option value="at"><?php echo $lang == 'de' ? 'Österreich' : 'Austria'; ?></option>
                        <option value="ch"><?php echo $lang == 'de' ? 'Schweiz' : 'Switzerland'; ?></option>
                        <option value="am"><?php echo $lang == 'de' ? 'United States' : 'United States'; ?></option>
                        <option value="jp"><?php echo $lang == 'de' ? 'Japan' : 'Japan'; ?></option>
                        <option value="in"><?php echo $lang == 'de' ? 'Indien' : 'India'; ?></option>

                    </select><br><br>

                    <label for="steuern"><?php echo $lang == 'de' ? 'Steuern berücksichtigen:' : 'Consider taxes:'; ?></label>
                    <input type="checkbox" id="steuern" name="steuern"><br><br>

                    <label for="reinvestieren"><?php echo $lang == 'de' ? 'Reinvestieren:' : 'Reinvest:'; ?></label>
                    <input type="checkbox" id="reinvestieren" name="reinvestieren"><br><br>

                    <input type="submit" value="<?php echo $lang == 'de' ? 'Berechnen' : 'Calculate;' ?>">
                </form>
            </div>
            <div class="table-container">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $startkapital = $_POST["startkapital"];
                    $zinssatz = $_POST["zinssatz"] / 100;
                    $jahre = $_POST["jahre"];
                    $land = $_POST["land"];
                    $steuern = isset($_POST["steuern"]);
                    $reinvestieren = isset($_POST["reinvestieren"]);

                    // Steuersätze je nach Land
                    $steuersaetze = [
                        "de" => 0.26, // Deutschland 26%
                        "at" => 0.275, // Österreich 27.5%
                        "ch" => 0.35, // Schweiz 35%
                        "am" => 0.30,
                        "jp" => 0.10,
                        "in" => 0.15,
                    ];

                    $steuersatz = $steuern ? $steuersaetze[$land] : 0;

                    echo "<h2>Ergebnis</h2>";
                    echo "<table>";
                    echo "<tr><th>Jahr</th><th>Startkapital</th><th>Zinsen</th><th>Steuern</th><th>Endkapital</th></tr>";

                    for ($jahr = 1; $jahr <= $jahre; $jahr++) {
                        $zinsen = $startkapital * $zinssatz;
                        $steuerbetrag = $zinsen * $steuersatz;
                        $nettozinsen = $zinsen - $steuerbetrag;
                        $endkapital = $reinvestieren ? $startkapital + $nettozinsen : $startkapital + $nettozinsen * $jahr;
                        echo "<tr>
                            <td>$jahr</td>
                            <td>" . number_format($startkapital, 2, ',', '.') . " €</td>
                            <td>" . number_format($zinsen, 2, ',', '.') . " €</td>
                            <td>" . number_format($steuerbetrag, 2, ',', '.') . " €</td>
                            <td>" . number_format($endkapital, 2, ',', '.') . " €</td>
                          </tr>";
                        if ($reinvestieren) {
                            $startkapital = $endkapital;
                        }
                    }

                    echo "</table>";
                }
                ?>
            </div>
        </div>
    </main>
    <aside class="right_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
</div>
<?php include_once $phppath . 'logistic/structure/footer.php'?>
</body>
