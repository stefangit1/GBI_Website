<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<head>
    <link rel="stylesheet" href="<?php echo$htmlpath?>styles/page_styling/about_us_page.css" type="text/css">
    <link rel="stylesheet" href="<?php echo$htmlpath?>styles/button_styling/tech_button.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Who, What, Why? About us. Discover our world!| GreenBumbleInvest</title>
    <meta name="description" content="Who are we? What do we do? What are our goals? View our progress on just one page. Get to know us better. Discover our next projects, see what our vision is. | GreenBumbleInvest"/>
    <meta name="keywords" content="About us, Projects, Team, Roadmap, Vision, Important to us"/>
</head>

<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php'?>

<div class = "content">
    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
    <main>
        <div class="center_content_aboutus">
            <div class="center_content_top">
                <?php if($lang == 'de'){echo '<img src="' . $htmlpath . 'styles/images/aboutusbanner.png" alt="Banner"';}else {echo '<img src="' . $htmlpath . 'styles/images/aboutusbanner.png" alt="Banner" alt="Banner"';}?>
            </div>
        </div>
        <div class="title_aboutus_container">
            <h1><?php echo $lang == 'de' ? 'Sie haben es geschafft!':'You did it!';?></h1>
            <h2><?php echo $lang == 'de' ? 'Sie sind auf dem richtigen Weg':'You are on the right path';?></h2>
        </div>
        <div class="aboutus_buttons">

            <a class="button-split" href="#roadmap">
                <span class="button-text">Roadmap</span>
                <span class="button-arrow"></span>
            </a>

            <a class="button-split" href="#team">
                <span class="button-text">Team</span>
                <span class="button-arrow"></span>
            </a>
        </div>

     <div class="about_us_question_section">
            <h2><?php echo $lang == 'de' ? 'Wer sind wir?':'Who are we?';?></h2>
            <div class="about_us_question">
                <p><?php echo $lang == 'de' ?
                        'GreenBumbleInvest ist ein österreichisches Unternehmen, welches sich darauf fokussiert ein stabiles Netzwerk aus Tradern und Lernenden zu erschaffen.  Offiziell kam der Name GreenBumbleInvest, am 01.08.2024 in die Öffentlichkeit, doch die Vision einer universellen Plattform für Finanz begeisterte Menschen, besteht schon seit 10.10.2023. ':
                        'GreenBumbleInvest is an Austrian company that focuses on creating a stable network of traders and learners.  The name GreenBumbleInvest officially came to public attention on August 1st, 2024, but the vision of a universal platform for people who are passionate about finance has existed since October 10th, 2023.';?></p>
                <img src="<?php echo$htmlpath?>styles/images/austriawallpaper.png">
            </div>
             <p> <?php echo $lang == 'de' ?
                     'Bis heute hat sich einiges getan und wir wachsen stetig. Es kommen ständig neue Produkte und Werkzeuge auf den Markt, die Sie kostenlos nutzen können. Außerdem erwartet Sie viele neue Updates, wie unser Communityupdate. Genauere Informationen finden Sie in unsere Roadmap.':
                     'A lot has happened to date and we are constantly growing. New products and tools are constantly coming onto the market that you can use for free. You can also expect many new updates, such as our community update. You can find more detailed information in our roadmap.';?></p>
         <video controls>
             <source src="<?php echo$htmlpath?>styles/videos/AboutUsVideo.mp4" type="video/mp4">
             <?php echo $lang == 'de' ? 'Ihr Browser unterstützt das Video-Tag nicht.':'Your browser does not support the video tag.';?>
         </video>
            <h2><?php echo $lang == 'de' ? 'Was ist unser Ziel?':'What is our goal?';?></h2>
            <div class="about_us_question">
                <p><?php echo $lang == 'de' ?
                        'Unser Ziel ist es die Finanzwelt besser untereinander zu vernetzen und da sprechen wir nicht von großen Instituten, sondern von jeder einzelnen Persönlichkeit. Wir möchten, dass Sich jeder mit jeden austauschen kann. Wir möchten einen Informationstausch zwischen Erfahrenen die nach Hilfe suchen und neuen Einsteigern, die keine Ahnung haben“, wie, wo, wann und wieso.“.':
                        'Our goal is to better network the financial world and we are not talking about large institutions, but about each individual personality. We want everyone to be able to exchange ideas with everyone. We want an exchange of information between experienced people who are looking for help and new beginners who have no idea “how, where, when and why.”';?>
                <br><br></p>
                <p><?php echo $lang == 'de' ?
                        'Es gibt in dieser Welt unzählige Foren, Informationsplattformen, Apps, Tools und noch viele weitere Optionen, die alle etwas anbieten, dass man gerne in Anspruch nimmt. Doch nur ist meist alles Vereinzelt und nicht einheitlich, daher ist es unser Ziel alle diese Angebote auf eine Plattform zu bekommen und Ihnen die Suche so zu erleichtern.':
                        'There are countless forums, information platforms, apps, tools and many other options in this world, all of which offer something that you are happy to use. But everything is usually isolated and not uniform, so our goal is to get all of these offers on one platform and make your search easier.';?></p>
            </div>
         <h2 id="roadmap">ROADMAP</h2>
            <div class="roadmap_container">
                <div class="roadmap_title"><h2><?php echo $lang == 'de' ? 'Website V2_0 Überarbeitung':'Website V2_0 revision';?></h2></div>
                <div class="roadmap_context">
                    <div class="roadmap_project_img"><img src="<?php echo$htmlpath?>styles/images/roadmapV2IMG.png"></div>
                    <div class="roadmap_text"> <p> <?php echo $lang == 'de' ? 'Brandneues Design. Mehr Information. Schnelleres Durchforsten und bessere Navigation. Diese Ziele haben wir uns für das neue Update gesetzt.':'Brand new design. More information. Faster browsing and better navigation. We have set these goals for the new update.';?></p></div>
                    <div class="roadmap_point_img"><img src="<?php echo$htmlpath?>styles/images/roadmap_points.png"></div>
                    <div class="roadmap_date"><p>22.08.2024</p></div>
                </div>
            </div>
         <div class="roadmap_container">
             <div class="roadmap_title2"><h2>  <?php echo $lang == 'de' ? 'Community Update':'Community update';?></h2></div>
             <div class="roadmap_context">
                 <div class="roadmap_date"> <p>30.09.2024</p></div>
                 <div class="roadmap_point_img"><img src="<?php echo$htmlpath?>styles/images/roadmap_points.png"></div>
                 <div class="roadmap_text"> <p><?php echo $lang == 'de' ? 'Eine eigene Seite nur für die Community. Inkludierter Live-Chat, posten, liken und kommentieren von Beiträgen, Profile, detaillierte Personenangaben und kommunizieren untereinander.':'A dedicated page just for the community. Included is live chat, posting, liking and commenting on posts, profiles, detailed personal information and communicating with each other.';?></p></div>
                 <div class="roadmap_project_img"><img src="<?php echo$htmlpath?>styles/images/roadmapcommIMG.png"> </div>
             </div>
         </div>
         <div class="roadmap_container">
             <div class="roadmap_title"><h2> <?php echo $lang == 'de' ? 'Ränge Update':'Ranks update';?></h2></div>
             <div class="roadmap_context">
                 <div class="roadmap_project_img"><img src="<?php echo$htmlpath?>styles/images/roadmapRangIMG.png"></div>
                 <div class="roadmap_text"> <p><?php echo $lang == 'de' ? 'Für alle die es ein bisschen exklusiver haben möchten, können sich ab nun einen Premium Rang verdienen, mit dem Ihnen ein breites Spektrum an Zusätzen ermöglicht wird.':'For everyone who wants it to be a little more exclusive, you can now earn a premium rank, which gives you a wide range of additional features.';?></p></div>
                 <div class="roadmap_point_img"><img src="<?php echo$htmlpath?>styles/images/roadmap_points.png"></div>
                 <div class="roadmap_date"><p>10.11.2024</p></div>
             </div>
         </div>
         <div class="roadmap_container">
             <div class="roadmap_title2"><h2><?php echo $lang == 'de' ? 'Post/Reward System':'Post/reward system';?></h2></div>
             <div class="roadmap_context">
                 <div class="roadmap_date"> <p>01.02.2025</p></div>
                 <div class="roadmap_point_img"><img src="<?php echo$htmlpath?>styles/images/roadmap_points.png"></div>
                 <div class="roadmap_text"> <p><?php echo $lang == 'de' ? 'Verdienen Sie mithilfe von regelmäßigen veröffentlichen von Beiträgen Geld.':'Earn money by publishing posts regularly.';?></p></div>
                 <div class="roadmap_project_img"><img src="<?php echo$htmlpath?>styles/images/roadmapCoin.png"></div>
             </div>
         </div>
            <h2> <?php echo $lang == 'de' ? 'Wie werde ich ein Teil der GreenBumbleInvest Community?':'How do I become part of the GreenBumbleInvest community?';?></h2>
         <div class="about_us_question">
             <p>  <?php echo $lang == 'de' ? 'Es ist einfach, als bei jedem Verein oder jeder sonstigen Gesellschaft oder Community. Sie müssen sich nur Registrieren, um die Möglichkeit zu besitzen, Teil eines großen Netzwerks zu sein. Wenn Sie stattdessen gerne anonym bleiben möchten, stehen Ihnen noch immer unsere Werkzeuge/Apps und unsere Kurse zur Verfügung und wir stehen Ihnen immer zur Seite, wenn Sie Hilfe benötigen.':'It\'s easier than with any club or other society or community. You just have to register to have the opportunity to be part of a large network. If you would like to remain anonymous instead, our tools/apps and our courses are still available to you and we are always here to help if you need help.';?></p>
         </div>
         <h2><?php echo $lang == 'de' ? 'Was ist uns wichtig?':'What is important to us?';?></h2>
        <div class="about_us_question_column">
            <p>  <?php echo $lang == 'de' ? 'Wir setzen auf authentische Persönlichkeiten, bedeutet, dass wir auf ehrliche Erfahrungen und helfende Beiträge hoffen. Wir dulden daher keine Betrugsmaschen oder gefälschte Information, wie zum Beispiel: „Ich habe 200 000 im Monat gemacht, kommt in meinen Kurs“. Wir bieten keinen Marktplatz, sondern eine Bibliothek und Community aus wertvollen Individuen, die etwas Lernen, Teilen oder Benutzen möchten.':'We rely on authentic personalities, which means we hope for honest experiences and helpful contributions. We therefore do not tolerate scams or fake information such as: “I made 200,000 a month, join my course”. We do not provide a marketplace, but rather a library and community of valuable individuals who want to learn, share or use.';?>
            <br></p>
            <p> <?php echo $lang == 'de' ? 'Außerdem ist bei uns ständige Entwicklung ein großes Thema, weshalb Sie regelmäßige Updates nutzen können und somit auch Ihren Horizont erweitern können.':'In addition, constant development is a big topic for us, which is why you can use regular updates and thus broaden your horizons.';?>
            <br></p>
            <p>   <?php echo $lang == 'de' ? 'Unser größtes Ziel ist es, dass die Nutzer sich selbst mit wertvollen Informationen versorgen. Nur so können wir eine wachsende Gemeinschaft aufbauen und uns fortbilden mit Erfahrungen. Immerhin ist diese Plattform sowohl für Einsteiger als auch Experten gedacht und soll für jedes Wissen ein sicherer Hafen sein.':'Our biggest goal is for users to provide themselves with valuable information. This is the only way we can build a growing community and continue to educate ourselves with experiences. After all, this platform is intended for both beginners and experts and is intended to be a safe haven for all types of knowledge.';?></p>
        </div>

         <div class="about_us_mitarbeiter" id="team">
            <h2>Team</h2>
             <div class="mitarbeiter_container">
                     <div class="mitarbeiter_item">
                         <h3>Marco Hummel</h3>
                         <img src="<?php echo$htmlpath?>styles/images/impressumPictures/MarcoHummelManagerPhoto.png">
                         <p> <?php echo $lang == 'de' ? 'Geschäftsführer':'Managing Director';?></p>
                     </div>
                     <div class="mitarbeiter_item">
                         <h3>Stefan Hummel</h3>
                         <img src="#">
                         <p>CEO of IT</p>
                     </div>
                     <div class="mitarbeiter_item">
                         <h3>Muizz Mahmood</h3>
                         <img src="">
                         <p>Social Media Manager</p>
                     </div>
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
