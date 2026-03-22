<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<head>
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/page_styling/help_page.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/button_styling/tech_button.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Get quick information: products/community/tools. |GreenBumbleInvest</title>
    <meta name="description" content="First aid for the problem or missing answer your searching for. Get information in detail about anything on our website."/>
    <meta name="keywords" content="Help, Dont work, How works, How, Why, Defoult, Expert Advisor, Finance Community, Tools, Forex position calculator, interest calculator, stock market clock"/>
</head>

<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php' ?>
<div class="content">
    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
    <main>
        <div class="center_content_helppage">
            <h1><?php echo $lang == 'de' ? 'Sie benötigen Hilfe?':'Need help?';?></h1>
                <div class="help_littleNAV">
                        <a class="button-split" href="#Products">
                            <span class="button-text"> <?php echo $lang == 'de' ? 'FAQ Produkte':'FAQ products';?></span>
                            <span class="button-arrow"></span>
                        </a>
                        <a class="button-split" href="#Tools">
                            <span class="button-text"> <?php echo $lang == 'de' ? 'FAQ Werkzeuge':'FAQ tools';?></span>
                            <span class="button-arrow"></span>
                        </a>
                        <a class="button-split" href="#Community">
                            <span class="button-text"> <?php echo $lang == 'de' ? 'FAQ Community':'FAQ community';?></span>
                            <span class="button-arrow"></span>
                        </a>
                </div>
            <section id="Products">
                <div class="faq_box">
                    <h2> <?php echo $lang == 'de' ? 'Produkt FAQ':'product FAQ';?></h2>
                    <h3>FiboTrader</h3>
                    <h4><?php echo $lang == 'de' ? 'Wie installiere ich den FiboTrader?':'How do I install FiboTrader?';?></h4>
                    <p>  <?php echo $lang == 'de' ?
                            'Unter Produkte finden Sie den FiboTrader, der anschließend unter dem Download Button heruntergeladen werden kann. Voraussetzung ist, dass sie entweder Windows 10 oder Windows 11 benutzen. Anschließend entpacken sie den ZIP Ordner. In dem Ordner befinden sich 2 wichtige Elemente. Die ExpertAdvisorUserInterface.msi Datei, die zum Installieren der Benutzeroberfläche benötigt wird und der Expert Advisor.':
                            'Under Products you will find the FiboTrader, which can then be downloaded using the Download button. The prerequisite is that you use either Windows 10 or Windows 11. Then unzip the ZIP folder. There are 2 important items in the folder. The ExpertAdvisorUserInterface.msi file needed to install the user interface and the Expert Advisor.';?></p>
                    <p><br><?php echo $lang == 'de' ?
                            ' Die .ex5 Datei [Expert Advisor] ziehen sie in ihren Advisors Ordner des MetaTraders5 unter MQL5 => Experts => Advisors':
                            'Drag the .ex5 file [Expert Advisor] into your Advisors folder of MetaTraders5 under MQL5 => Experts => Advisors';?><br><br></p>
                    <p><?php echo $lang == 'de' ? 'Jetzt sollten Sie den Expert Advisor auf den Chart ziehen können. Vergessen Sie nicht [Algo-Handel] zu erlauben, wenn Sie den ExpertAdvisor in den Chart ziehen.':'Now you should be able to drag the Expert Advisor onto the chart. Don\'t forget to allow [Algo trading] when dragging the ExpertAdvisor onto the chart.';?></p>
                    <h4><?php echo $lang == 'de' ? 'Was ist der FiboTrader?':'What is FiboTrader?';?></h4>
                    <p> <?php echo $lang == 'de' ?
                            'Der FiboTrader ist ein Expert Advisor für den MetaTrader5, der automatisch nach ihren Wertevorgaben handelt. Die Werte, die Sie über die Benutzeroberfläche einstellen, werden dann anschließend übernommen und nach diesen wird sich das System ausrichten.':
                            'FiboTrader is an expert advisor for MetaTrader5 that automatically trades according to your value specifications. The values ​​that you set via the user interface will then be adopted and the system will be based on these.';?> <br><br></p>
                    <h4> <?php echo $lang == 'de' ? 'Ist das Einstellen schwer?':'Is it difficult to set?';?></h4>
                    <p> <?php echo $lang == 'de' ?
                            'Es kann ein bisschen Zeit benötigen, um herauszufinden wie die Werte, die Sie einstellen, funktionieren [Schätzung: 1 Stunde], doch sobald sie den Dreh heraushaben, können Sie selbst damit herumspielen. Falls Sie dies nicht möchten, bieten wir an unsere Standardwerte zu verwenden, die bereits auf positive Ergebnisse getestet wurden.':
                            'It may take a bit of time to figure out how the values ​​you set work [estimate: 1 hour], but once you get the hang of it, you can play around with it yourself. If you do not want this, we offer to use our standard values, which have already been tested for positive results.';?></p>
                    <h4><?php echo $lang == 'de' ? 'FiboTrader Standardwerte':'FiboTrader default values';?></h4>
                    <table>
                        <thead>
                        <tr>
                            <th>SYM</th>
                            <th>23Z</th>
                            <th>38Z</th>
                            <th>50Z</th>
                            <th>64Z</th>
                            <th>Size23</th>
                            <th>Size38</th>
                            <th>Size50</th>
                            <th>Size64</th>
                            <th>tp/sl23</th>
                            <th>tp/sl38</th>
                            <th>tp/sl50</th>
                            <th>tp/sl64</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>EUR/USD</th>
                            <th>0,01</th>
                            <th>0,015</th>
                            <th>0,01815</th>
                            <th>0,01815</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>1/1</th>
                            <th>1/1</th>
                            <th>1/2</th>
                            <th>1/4</th>
                        </tr>
                        <tr>
                            <th>GBP/USD</th>
                            <th>0,01</th>
                            <th>0,015</th>
                            <th>0,01815</th>
                            <th>0,02</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>1/1</th>
                            <th>1/2</th>
                            <th>1/2</th>
                            <th>1/4</th>
                        </tr>
                        <tr>
                            <th>AUD/USD</th>
                            <th>0,008</th>
                            <th>0,008</th>
                            <th>0,009</th>
                            <th>0,01</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>1/1</th>
                            <th>1/1</th>
                            <th>1/1</th>
                            <th>1/3</th>
                        </tr>
                        <tr>
                            <th>USD/CHF</th>
                            <th>0,005</th>
                            <th>0,01</th>
                            <th>0,02</th>
                            <th>0,02</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>0,1</th>
                            <th>1/1</th>
                            <th>1/2</th>
                            <th>1/4</th>
                            <th>1/4</th>
                        </tr>
                        </tbody>
                    </table>
                       <h4> <?php echo $lang == 'de' ? 'Einstellen FiboTrader':'Setting FiboTrader';?></h4>
                    <p><strong>1: </strong><?php echo $lang == 'de' ? 'Klicken Sie auf [selectDB] rechts oben in der Benutzeroberfläche.':'Click on [selectDB] at the top right of the interface.';?></p>
                    <p><strong>2: </strong> <?php echo $lang == 'de' ? 'Wähle die [LinesValues.db] und klicke auf öffnen.':'Select the [LinesValues.db] and click open.';?></p>
                    <p><strong>3: </strong><?php echo $lang == 'de' ? 'Klicken Sie auf [Connect],um sich mit dem Expert Advisor zu verbinden.':' Click [Connect] to connect to the Expert Advisor.';?></p>
                    <p><strong>4: </strong><?php echo $lang == 'de' ? 'Gehen Sie zu SymbolOptions in der Benutzeroberfläche, um dort für das passende Symbol, Ihre Werte einstellen zu können.':'Go to SymbolOptions in the user interface to set your values ​​for the appropriate symbol.';?></p>
                        <p><strong>5: </strong><?php echo $lang == 'de' ? 'Wählen Sie Ihr gewünschtes Symbol.':'Choose your desired symbol.';?></p>
                        <p><strong>6: </strong><?php echo $lang == 'de' ? 'Wählen Sie, im Fenster rechts daneben, den gewünschten Wert, der verändert werden soll.':'In the window to the right, select the desired value that should be changed.';?></p>
                            <h5> <?php echo $lang == 'de' ? 'Was bedeuten die Werte?':'What do the values ​​mean?';?></h5>
                    <p><strong>23Z, 38Z, 50Z ,64Z:</strong> <?php echo $lang == 'de' ? '[Benutzeroberfläche Allow xZone] Sind von der TopLine die % nach unten. Bedeutet wie viele Pips muss die TopLine mindestens von der Bottom Line entfernt sein, sodass es erlaubt ist eine Position zu kaufen.':'[User Interface Allow xZone] Are the % downwards from the TopLine. This means how many pips the top line must be at least from the bottom line so that it is allowed to buy a position.';?></p>
                    <p><strong>Size23, Size38,Size50,Size64</strong><?php echo $lang == 'de' ? 'Wie groß soll die Position sein, wenn der Kurs in diese Zone fällt.':'How big should the position be if the price falls into this zone.';?></p>
                    <p><strong>tp/sl23, tp/sl38, tp/sl50, tp/sl64</strong><?php echo $lang == 'de' ? '[Benutzeroberfläche ist dies sepperat auf StopLoss und TakeProfit] Hier werden die Pips angegeben, die maximal Verloren oder Gewonnen werden fürfen. Bei der Standartwerte Tabelle ist nur ein Verhältnis angegeben, welches wir empfehlen.':'[User interface is separate from StopLoss and TakeProfit] The maximum pips that can be lost or won are specified here. The standard values ​​table only shows a ratio that we recommend.';?></p>
                   <h4>  <?php echo $lang == 'de' ? 'Zeitplan':'schedule';?></h4>
                    <p><?php echo $lang == 'de' ? 'Der Trader wurde dazu programmiert 24 Stunden, 7 Tage die Woche zu Handeln, doch falls Ihnen das zu viel ist, empfehlen wir 6:00 - 11:00 UTC.':'The trader is programmed to trade 24 hours, 7 days a week, but if that is too much for you, we recommend 6:00 - 11:00 UTC.';?></p>
                    <h4><?php echo $lang == 'de' ? 'Erklärvideos':'Explainer videos';?></h4>
                    <p> <?php echo $lang == 'de' ? 'Sie finden natürlich alle grafischen Erklärvideos auf unserem YouTube Kanal.':'Of course, you can find all graphic explanatory videos on our YouTube channel.';?></p>
                    <h3><?php echo $lang == 'de' ? 'FiboTrader Technische Daten':'FiboTrader Technical Data';?></h3>
                    <p><strong> <?php echo $lang == 'de' ? 'Betriebssystem':'Operating system';?></strong>Windows 10/11</p>
                    <p><strong>Bit-Version</strong>64Bit</p>
                    <p><strong>Version</strong>V3_0</p>
                </div>
            </section>
            <section id="Tools">
                <div class="faq_box">
                    <h2><?php echo $lang == 'de' ? 'Werkzeug FAQ':'tools FAQ';?></h2>
                    <br><br>
                    <h3><?php echo $lang == 'de' ? 'Positionsrechner':'Position calculator';?></h3>
                    <h4><?php echo $lang == 'de' ? 'Was kann der Positionsrechner?':'What can the position calculator do?';?></h4>
                    <p> <?php echo $lang == 'de' ?
                            'Der Positionsrechner wurde speziell für Forex und andere Hebelprodukte, wie zum Beispiel Termingeschäfte entwickelt. Dennoch müssen wir sagen, dass dieses Tool eher für den Forex Markt nützlich ist, da es bei den Termingeschäften viele verschiedene Strukturen gibt, die nicht den Werten des Rechners entsprechen. Trotzdem kann dieser für alle Symbole verwendet werden, die diese Einheiten verwenden.':
                            'The position calculator was developed specifically for Forex and other leveraged products such as futures. However, we must say that this tool is more useful for the Forex market, as there are many different structures in futures that do not correspond to the values ​​of the calculator. Nevertheless, this can be used for all symbols that use these units.';?></p>
                    <h4><?php echo $lang == 'de' ? 'Wie funktioniert der Positionsrechner?':'How does the position calculator work?';?></h4>
                    <p><strong><?php echo $lang == 'de' ? 'Kapital':'capital';?>:</strong><?php echo $lang == 'de' ? 'Sie geben Ihr Kapital an. Aufgepasst nicht die Einheiten die Sie besitzen! Also im Prinzip geben Sie das aktuelle von Ihnen auszahlbare Kapital an.':'You declare your capital. Be careful not the units you own! So basically you indicate the current capital that you can pay out.';?><br></p>
                    <p><strong> <?php echo $lang == 'de' ? 'Hebel':'leverage';?>: </strong><?php echo $lang == 'de' ? 'Hier geben Sie den Hebel ein, den Sie für die Position verwenden möchten.':'Here you enter the leverage you want to use for the position.';?><br></p>
                    <p><strong>Lot Size: </strong><?php echo $lang == 'de' ? 'In dieses Feld fügen Sie die Größe des Lots, sprich der Position ein.':'In this field you enter the size of the lot, i.e. the position.';?><br></p>
                    <p><strong><?php echo $lang == 'de' ? 'Max Verlust':'max loose';?>$: </strong><?php echo $lang == 'de' ? 'Wie viel Sie maximal verlieren möchten.':'The maximum amount you want to lose.';?></p>
                    <p><strong><?php echo $lang == 'de' ? 'Max Gewinn':'max win';?>$: </strong><?php echo $lang == 'de' ? 'Bei wie viel Profit Sie Ihre Position schließen möchten.':'How much profit you would like to close your position at.';?></p>
                    <p><strong>Spread:</strong> <?php echo $lang == 'de' ? 'Bei dem Spread können Sie entweder den fix vorgegebenen Spread des Brokers angeben oder falls dieser variabel ist, können Sie einen Durchschnittswert verwenden.':'For the spread, you can either specify the broker\'s fixed spread or, if it is variable, you can use an average value.';?></p>
                    <br><br>
                    <h3> <?php echo $lang == 'de' ? 'Zinsrechner':'Interest Calculator';?></h3>
                    <h4> <?php echo $lang == 'de' ? 'Was kann der Zinsrechner?':'What can the interest calculator do?';?></h4>
                    <p><?php echo $lang == 'de' ? 'Unser Zinsrechner kann sowohl als Zinsrechner als auch als normaler Prozentrechner verwendet werden. Sie geben ein mit welchem Startkapital Sie starten möchten und noch weitere Daten und schon erfahren Sie, wie viel Sie nach X Jahren besitzen.':'Our interest calculator can be used both as an interest calculator and as a normal percentage calculator. You enter the starting capital with which you would like to start and other data and you will find out how much you will have after X years.';?></p>
                    <br>
                    <h4><?php echo $lang == 'de' ? 'Wie funktioniert der Zinsrechner?':'How does the interest calculator work?';?></h4>
                    <p><strong><?php echo $lang == 'de' ? 'Startkapital':'Starting capital';?>:</strong><?php echo $lang == 'de' ? 'Anfangskapital mit dem begonnen wird zu rechnen.':'Initial capital with which you can start calculating.';?></p>
                    <p><strong><?php echo $lang == 'de' ? 'Zinssatz in Prozent':'Interest rate in percent';?>: </strong> <?php echo $lang == 'de' ? 'Sie geben die Prozente als Dezimalzahl an, sprich 100% = 1, 1% = 0,01 usw.':'You specify the percentages as a decimal number, i.e. 100% = 1, 1% = 0.01, etc.';?></p>
                    <p><strong><?php echo $lang == 'de' ? 'Anzahl der Jahre':'Number of years';?>: </strong><?php echo $lang == 'de' ? 'Geben Sie an, über wie viele Jahre berechnet werden soll.':'Specify over how many years the calculation should be made.';?></p>
                    <p><strong><?php echo $lang == 'de' ? 'Land':'Country';?>: </strong> <?php echo $lang == 'de' ? 'Das Land wird nur berücksichtigt, wenn sie Steuern berücksichtigen aktiviert haben. Sie können Ihr Land angeben, wo Sie versteuern, und dieser rechnet den passenden Steuersatz gleich ab.':'The country is only taken into account if you have activated Consider taxes. You can enter your country where you pay tax and it will calculate the appropriate tax rate straight away.';?></p>
                    <p><strong>  <?php echo $lang == 'de' ? 'Reinvestieren':'Reinvest';?>:</strong><?php echo $lang == 'de' ? 'Wenn Sie reinvestieren angehakt haben, dann wird die jährliche Zinszahlung zum vorjährigen Kapital dazu addiert und dieses wieder verzinst. Wir sprechen also von Zinseszins.':'If you have checked reinvest, then the annual interest payment will be added to the previous year\'s capital and this will earn interest again. So we talk about compound interest.';?>.</p>
                    <br><br><h3> <?php echo $lang == 'de' ? 'Börsenuhr':'Stock exchange clock';?></h3>
                    <p><?php echo $lang == 'de' ? 'Unsere Börsenuhr zeigt an in wie vielen Stunden/Minuten/Sekunden die Börse öffnet und wieder schließt. Steht „Öffnet in“ ist klar, dass die Börse momentan geschlossen hat. Bei „Schließt in“ ist klar, dass die Börse momentan offen hat.':'Our stock market clock shows how many hours/minutes/seconds the stock market opens and closes again. If it says “Opens in” it is clear that the stock exchange is currently closed. With “Closes in” it is clear that the stock exchange is currently open.';?></p>
                    <h4><?php echo $lang == 'de' ? 'Feiertage und Wochenenden':'Holidays and weekends';?></h4>
                    <p><?php echo $lang == 'de' ? 'Wir müssen uns entschuldigen, dass unsere momentane Börsenuhr noch keine Feiertage der Börse miteinbezieht und dies ebenfalls am Wochenende auch nicht macht.':'We have to apologize that our current stock market clock does not yet include stock market holidays and does not do so on weekends either.';?></p>
                </div>
            </section>
            <section id="Community">
                <div class="faq_box">
                    <h2>Community FAQ</h2>
                    <h3><?php echo $lang == 'de' ? 'Gibt es irgendwelche versteckte Kosten?':'Are there any hidden costs?';?></h3>
                    <p><?php echo $lang == 'de' ? 'Nein, bei uns gibt es keine versteckten Kosten. Alles, was Sie auf unserer Seite sehen, ist kostenlos.':'No, there are no hidden costs with us. Everything you see on our site is free.';?></p><br><br>
                    <h3> <?php echo $lang == 'de' ? 'Ich habe ein Anliegen oder brauche Hilfe. Wie kontaktiere ich GreenBumbleInvest?':'I have a concern or need help. How do I contact GreenBumbleInvest?';?></h3>
                    <p> <?php echo $lang == 'de' ? 'Wir bieten mehrere Möglichkeiten. Besuchen Sie die Kontakt Seite auf unserer Website. Dort finden Sie alle Möglichkeiten.':'We offer several options. Visit the contact page on our website. There you will find all the options.';?></p><br><br>
                    <h3><?php echo $lang == 'de' ? 'Ich möchte mich beteiligen, indem ich Verbesserungsvorschläge teile. Wo soll ich diese hinschicken?':'I would like to participate by sharing suggestions for improvements. Where should I send these?';?></h3>
                    <p><?php echo $lang == 'de' ? 'Wenn Sie uns helfen, möchten unser System zu verbessern oder Vorschläge für neue Projekte haben, würden wir uns über eine E-Mail unter office@greenBumbleInvest.com freuen. Oder kontaktieren Sie uns über unser Kontaktformular.':'If you would like to help us, improve our system or have suggestions for new projects, we would be happy to receive an email at office@greenBumbleInvest.com. Or contact us using our contact form.';?></p>
                </div>
            </section>
        </div>
    </main>
    <aside class="right_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
</div>
<?php include_once $phppath . 'logistic/structure/footer.php' ?>
</body>
