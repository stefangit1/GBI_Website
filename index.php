<?php session_start(); ?>

<?php include_once 'website_specific_files/web_config.php'?>
<?php include_once 'logistic/structure/groundstructure.php'?>
<?php include_once 'website_specific_files/dbh_link.php'?>
<?php include_once 'logistic/functions/user_count.php'?>

<head>
    <link rel="stylesheet" href="styles/page_styling/main_page.css" type="text/css">
    <link rel="stylesheet" href="styles/button_styling/tech_button.css" type="text/css">
	  <title>Your Trading Partner! Courses, EAs, Finance Tools, Community |GreenBumbleInvest</title>
    <meta name="description" content="Feel free to explore the world of GreenBumbleInvest. Huge Community, Expert Advisors, Tools, and free Courses included. We growing together!"/>
    <meta name="keywords" content="GreenBumbleInvest, GBI, free courses, Expert Advisor for MetaTrader5, huge Community, free finance tools, and more"/>
</head>

<body>
<?php include_once 'logistic/structure/header.php'?>
<div class = "content">
    <aside class="left_content">
    </aside>

    <main>
        <div class="center_content">
            <div class="center_content_top">
                
                <?php if($lang == 'de'){echo '<img src="styles/images/BannerStartseite.png" alt="Banner">';}else {echo '<img src="styles/images/BannerStartseite.png" alt="Banner">';}?>
               <div class="center_content_top_show_current_users">
                <p><?php echo $lang == 'de' ? 'Mitglieder: ' : 'Members: '; ?><?php echo $user_count; ?></p>
               </div>
                <h1><?php echo $lang == 'de' ?'Dein nächstes Kapitel beginnt hier – GreenBumbleInvest':'Your next chapter begins here – GreenBumbleInvest'?></h1>
            </div>
            <div class="center_content_middle">
                <div class="center_content_middle_first">
                    <div class="center_content_middle_first_element">
                        <p>Apps</p>
                        <a href="pages/product_page.php">
                            <img src="styles/images/pc.png" alt="Produkte">
                        </a>
                    </div>
                    <div class="center_content_middle_first_element">
                        <p>Tools</p>
                        <a href="pages/tools_page.php">
                            <img src="styles/images/hammer.png" alt="Hammer">
                        </a>
                    </div>
                    <div class="center_content_middle_first_element">
                        <p><?php echo $lang == 'de' ?'Kurse':'Courses'?></p>
                        <a href="pages/information_page.php">
                            <img src="styles/images/libary.png" alt="Libary">
                        </a>
                    </div>
                    <div class="center_content_middle_first_element">
                        <p>Community</p>
                        <a href="#">
                            <img src="styles/images/comm.png" alt="Community">
                        </a>
                    </div>
                </div>

                <div class="center_content_middle_second">
                    <div class="center_content_middle_second_element_top">
                            <h2><?php echo $lang == 'de' ?'Warum GreenBumbleInvest?':'Why GreenBumbleInvest?'?></h2>
                    </div>
                    <div class="center_content_middle_second_elemente">
                            <div class="center_content_middle_second_element">
                                <img src="styles/images/callworld.png" alt="Support">
                                <p>    <?php echo $lang == 'de' ?'schnell und effizienter Support':'fast and efficient support'?></p>
                                        <a href="#supportFAQ">
                                        <div class="button-split">
                                            <span class="button-text"><?php echo $lang == 'de' ?'mehr Lesen':'read more'?></span>
                                            <span class="button-arrow"></span>
                                        </div>
                                        </a>
                            </div>
                            <div class="center_content_middle_second_element">
                                <img src="styles/images/strongcomm.png" alt="Community">
                                <p>  <?php echo $lang == 'de' ?'Revolution der Finanz-Community':'Revolutionizing the financial community'?></p>
                                        <a href="#commFAQ">
                                        <div class="button-split">
                                            <span class="button-text"><?php echo $lang == 'de' ?'mehr Lesen':'read more'?></span>
                                            <span class="button-arrow"></span>
                                        </div>
                                        </a>
                            </div>
                            <div class="center_content_middle_second_element">
                                <img src="styles/images/card.png" alt="Free">
                                <p>  <?php echo $lang == 'de' ?'Portmoney wegpacken, wir sind kostenlos':'Put away your wallet, we\'re free'?></p>
                                        <a href="#freeFAQ">
                                        <div class="button-split">
                                            <span class="button-text"><?php echo $lang == 'de' ?'mehr Lesen':'read more'?></span>
                                            <span class="button-arrow"></span>
                                        </div>
                                        </a>
                            </div>
                    </div>
                </div>

                <div class="center_content_middle_third">
                    <div class="carousel-container">
                        <button class="arrow left" id="prev">&#10094;</button>

                        <div class="carousel">

                            <?php
                                $sql = "SELECT username, review, rating FROM reviews ORDER BY created_at DESC";
                                $result = $stmt = $conn->prepare($sql);
                                $stmt->bind_param("ssssss", $name, $username, $country, $email, $password, $token);
                                $stmt->execute();

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $username = htmlspecialchars($row['username']);
                                        $review = htmlspecialchars($row['review']);
                                        $rating = (int)$row['rating'];

                                        $full_stars = str_repeat("&#9733;", $rating);
                                        $empty_stars = str_repeat("&#9734;", 5 - $rating);

                                        echo "<div class='carousel-item'>";
                                        echo "    <div class='rezession'>";
                                        echo "        <div class='rezession_stars'>";
                                        echo "            $full_stars$empty_stars";
                                        echo "        </div>";
                                        echo "        <div class='rezzesion_name'>";
                                        echo "            <strong>$username</strong>";
                                        echo "        </div>";
                                        echo "        <div class='rezzesion_desc'>";
                                        echo "            <p>$review</p>";
                                        echo "        </div>";
                                        echo "    </div>";
                                        echo "</div>";
                                    }
                                }
                                ?>

                        </div>

                        <button class="arrow right" id="next">&#10095;</button>

                    </div>
                </div>

                <div class="center_content_discord">
                    <div class="new-tag"><?php echo $lang == 'de' ?'Jetzt Neu!':'NEW!'?></div>
                    <div class="center_content_discord_content">
                    <a href="https://discord.gg/yVVrDt34tW" target="_blank">
                        <img src="styles/images/mainpagediscord.png">
                    </a>
                </div>
                </div>

                <div class="center_content_middle_fourth">
                    <div class="help-container">
                        <img src="styles/images/tenoften.png">
                        <h2><?php echo $lang == 'de' ?'Mitglieder setzen auf unsere Kurse':'Members rely on our courses'?></h2>
                        <p> <?php echo $lang == 'de' ?'Entdecke eine Vielfalt an kostenlosen Kursen, die dir helfen, dein Wissen zu erweitern und neue Fähigkeiten zu entwickeln. Unsere Mitglieder profitieren von praxisnahen Inhalten und persönlicher Erfahrungen.':'Discover a variety of free courses to help you expand your knowledge and develop new skills. Our members benefit from practical content and personal experiences.'?></p>
                        <a href="pages/information_page.php">
                            <div class="button-split">
                                <span class="button-text">   <?php echo $lang == 'de' ?'zu den Kursen':'to the courses'?></span>
                                <span class="button-arrow"></span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="news_section_title">
                    <h2><?php echo $lang == 'de' ?'Neues auf GBI':'What\'s new on GBI'?></h2>
                </div>
                <div class="news_section">
                    <div class="news_item">
                        <div class="news_item_img">
                            <img src="styles/images/news/toolsreleasenew.jpg">
                        </div>
                        <div class="news_item_date"><p>01.08.2024</p></div>
                        <div class="news_item_text"><p><?php echo $lang == 'de' ?'Absofort können Sie zusätzliche Finanz Tools, auf unserer Seite unter Werkzeuge abrufen.':'You can now access additional financial tools on our website under Tools.'?></p></div>
                    </div>

                    <div class="news_item">
                        <div class="news_item_img">
                            <img src="styles/images/news/searchingDiscordModerator.jpg">
                        </div>
                        <div class="news_item_date"><p>10.08.2024</p></div>
                        <div class="news_item_text"><p><?php echo $lang == 'de' ?'Wir suchen einen Discord Verwalter!':'We are looking for a Discord manager!'?></p></div>
                    </div>

                    <div class="news_item">
                        <div class="news_item_img">
                            <img src="styles/images/news/searchingteam.jpg">
                        </div>
                        <div class="news_item_date"><p>20.08.2024</p></div>
                        <div class="news_item_text"><p><?php echo $lang == 'de' ?'Wir suchen Teammitglieder!':'We are searching for team members!'?></p><p>Web-Developer</p><p>SEO-Marketing</p></div>
                    </div>
                </div>


        <div class="center_content_middle_info_section">
                    <div class="center_content_middle_info" id="supportFAQ">
                            <div class="center_content_middle_faq_img">
                                <img src="styles/images/startseitefackelgang.png" class="faq-image">
                            </div>
                            <div class="center_content_middle_faq_text">
                                    <h3> <?php echo $lang == 'de' ?'EFFIZIENZ':'EFFICIENCY'?></h3>
                                <p><?php echo $lang == 'de' ?
                                        'Auch wenn wir darauf setzen, dass all unsere Produkte fehlerfrei verwendbar sind, bieten wir Ihnen einen exzellenten Kundenservice an. Dieser lässt all Ihre Fragen und Probleme verschwinden und begleitet Sie auf Ihren Weg zum profitablen Trader. Uns ist wichtig, dass schnell eine Lösung gefunden wird, da wir selbst von vielen verschiedenen Unternehmen, den Support verteufeln, haben wir uns zum Ziel gesetzt, Sie als so zu behandeln, wie wir auch behandelt werden möchten.':
                                        'Even though we are committed to ensuring that all of our products are usable without errors, we offer you excellent customer service. This makes all your questions and problems disappear and accompanies you on your way to becoming a profitable trader. It is important to us that a solution is found quickly. Since we ourselves demonize support from many different companies, we have set ourselves the goal of treating you as we would like to be treated.'?></p>
                            </div>
                    </div>
                    <div class="center_content_middle_info" id="commFAQ">
                            <div class="center_content_middle_faq_text">
                                <h3>REVOLUTION</h3>
                                <p><?php echo $lang == 'de' ?'Die Menschen lernen am besten durch eigene Erfahrungen und können damit andere davor bewahren dieselben Fehler zu machen. Daher haben wir eine Community gegründet, die einander Unterstützt und einem vorantreibt. Alleine geht immer, doch als Gemeinschaft fällt es öfter einfacher und ist außerdem effizienter.':'People learn best through their own experiences and can therefore prevent others from making the same mistakes. That\'s why we founded a community that supports each other and pushes you forward. It\'s always possible to do it alone, but as a group it\'s often easier and more efficient.'?></p>
                            </div>
                            <div class="center_content_middle_faq_img">
                                <img src="styles/images/startseitefackelgang_gespiegelt.png" class="faq-image">
                            </div>
                    </div>
                    <div class="center_content_middle_info" id="freeFAQ">
                            <div class="center_content_middle_faq_img">
                                <img src="styles/images/startseitefackelgang.png" class="faq-image">
                            </div>
                            <div class="center_content_middle_faq_text">
                                <h3>  <?php echo $lang == 'de' ?'KOSTENLOS':'FOR FREE'?></h3>
                                <p><?php echo $lang == 'de' ?'Da wir uns fürs Erste darauf fokussieren, eine noch breitere Menschenmenge anzuziehen und uns durch Werbeeinnahmen zu finanzieren, haben wir beschlossen für Sie all unsere Angebote/Apps/Mitgliedschaften kostenlos anzubieten.':'Since we are initially focusing on attracting an even wider audience and financing ourselves through advertising revenue, we have decided to offer all of our offers/apps/memberships free of charge for you.'?></p>
                            </div>
                    </div>
        </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const faqImages = document.querySelectorAll(".faq-image");
                        const faqSections = document.querySelectorAll(".center_content_middle_info");
                        let scrolledSections = new Set();

                        function handleScroll() {
                            faqSections.forEach((section, index) => {
                                const faqSectionTop = section.getBoundingClientRect().top;
                                const screenPosition = window.innerHeight / 1.5;

                                if (faqSectionTop < screenPosition && !scrolledSections.has(index)) {
                                    faqImages[index].classList.add("visible");
                                    scrolledSections.add(index);  // Verhindert erneutes Auslösen der Animation
                                }
                            });

                            // Entfernt den Event-Listener, wenn alle Abschnitte sichtbar sind
                            if (scrolledSections.size === faqSections.length) {
                                window.removeEventListener('scroll', handleScroll);
                            }
                        }

                        window.addEventListener('scroll', handleScroll);
                    });

                    /*REZENSIONEN*/
                    document.addEventListener('DOMContentLoaded', function() {
                        const items = document.querySelectorAll('.carousel-item');
                        const container = document.querySelector('.carousel');
                        let currentIndex = 0;

                        // Berechne die Breite eines Items inklusive des Abstands
                        const itemWidth = items[0].offsetWidth + parseInt(window.getComputedStyle(items[0]).marginRight, 10);

                        function updateCarousel() {
                            items.forEach((item, index) => {
                                item.classList.remove('active', 'prev', 'next');
                                if (index === currentIndex) {
                                    item.classList.add('active');
                                } else if (index === (currentIndex - 1 + items.length) % items.length) {
                                    item.classList.add('prev');
                                } else if (index === (currentIndex + 1) % items.length) {
                                    item.classList.add('next');
                                }
                            });

                            // Center the carousel on the active item
                            container.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
                        }

                        document.getElementById('prev').addEventListener('click', function() {
                            currentIndex = (currentIndex - 1 + items.length) % items.length;
                            updateCarousel();
                        });

                        document.getElementById('next').addEventListener('click', function() {
                            currentIndex = (currentIndex + 1) % items.length;
                            updateCarousel();
                        });

                        updateCarousel();
                    });
                </script>


        </div>
            <div class="center_content_bottom">

            </div>

        </div>
    </main>
    <aside class="right_content">
    </aside>
</div>
<?php include_once 'logistic/structure/footer.php'?>
</body>