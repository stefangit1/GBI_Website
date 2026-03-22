<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<?php

function getDirectories($dir) {
    $directories = array();
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != "." && $file != ".." && is_dir($dir . $file)) {
                    $directories[] = $file;
                }
            }
            closedir($dh);
        }
    }
    return $directories;
}

$orderFile = $phppath . 'logistic/upload_files/course_order.txt';
function getCourseOrder() {
    $orderFile = $GLOBALS["orderFile"];
    if (file_exists($orderFile)) {
        return file($orderFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
    return [];
}

$lang = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en';

$courseOrder = getCourseOrder();
$base_dir = $phppath . "logistic/upload_files/courses/";
$course_dirs = getDirectories($base_dir);
$ordered_dirs = array_intersect($courseOrder, $course_dirs);
$unordered_dirs = array_diff($course_dirs, $ordered_dirs);
$all_dirs = array_merge($ordered_dirs, $unordered_dirs);
?>

<head>
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/page_styling/information_page.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/button_styling/top_scroll_button.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Free finance/trading/invest courses |GreenBumbleInvest</title>
    <meta name="description" content="More than 5 free courses about: market structure, trading, periods, positions, risk management, trading psychology, mistakes and much more!"/>
    <meta name="keywords" content="forex, trading ,market structure course, beginners course, risk management, trading psychology, trading mistakes"/>
</head>

<body>
    <?php include_once $phppath . 'website_specific_files/ad-body.php'?>
    <?php include_once $phppath . 'logistic/structure/header.php'?>
    <div class="content">
        <aside class="left_content">
            <?php include_once $phppath . 'website_specific_files/ads.php'?>
        </aside>
        <main>
            <a href="#">
                <button class="top_scroll_buton">&#9650;</button>
            </a>

            <div class="Infopage_viewPort">
                <div class="Information_libary">
                    <p><?php echo ($lang == 'de') ? 'BIBLIOTHEK' : 'LIBRARY'; ?></p>
                    <div class="Libary_Theme_Input">
                        <?php
                        foreach ($all_dirs as $dir) {
                            $dir_path = $base_dir . $dir . "/";
                            if (is_dir($dir_path)) {
                                $name_file = ($lang == 'de') ? $dir_path . "name_de.txt" : $dir_path . "name_en.txt";
                                if (file_exists($name_file)) {
                                    $name = file_get_contents($name_file);
                                    $isActive = isset($_GET['course']) && $_GET['course'] == $dir;
                                    $activeClass = $isActive ? 'active' : '';
                                    echo "<a href='?course=$dir'>";
                                    echo "<button type='button' class='button3 $activeClass'>$name</button>";
                                    echo "</a>";
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="Information_show">
                    <?php
                    if (isset($_GET['course'])) {
                        $course = $_GET['course'];
                        $dir_path = $phppath . "logistic/upload_files/courses/" . $course . "/";
                        if (is_dir($dir_path)) {
                            $text_file = ($lang == 'de') ? $dir_path . "text_de.txt" : $dir_path . "text_en.txt";
                            if (file_exists($text_file)) {
                                $text = file_get_contents($text_file);
                                echo '<div class="course_text">' . $text . '</div>';
                            }
                        }
                    } else {
                        if ($lang == 'de') {
                            echo '<h1>Informations Seite</h1>
                                  <h2>Sie haben eine Frage oder möchten sich zum Thema Trading oder Investieren weiterbilden? Dann sind Sie hier genau richtig.</h2>
                                  <h3>Durchstöbern Sie unsere Bibliothek und lernen Sie etwas neues dazu!</h3>
                                    <p>Hier auf unserer Informationsseite finden Sie kostenlose Kurse zum Durchlesen. Ob Sie Anfänger oder Experte sind, spielt keine Rolle. Hier ist für jeden etwas dabei. </br></br>
                                    Sie können uns gerne für Verbesserungen oder Falschmeldungen, über unser Kontaktformular oder per E-Mail aufklären. Wir würden uns freuen. 
                                    </br></br></p>
                                      <video controls>
                                         <source src="' . $htmlpath . 'styles/videos/Infopagevideo.mp4" type="video/mp4">
                                         Ihr Browser unterstützt das Video-Tag nicht.
                                      </video>
                                     <h3>Warum Lesen?</h3>
                                     <p>Warum sollten wir Lesen, auch wenn wir uns schon sehr gut auskennen? Lesen bildet uns weiter, es gibt uns eine neue Sichtweise auf eine Thematik und gibt uns auch ab und zu Information mit, die wir bis jetzt noch nicht kannten.</p>
                                    <p><br>Indem Sie Lesen wird Ihnen Erfahrung mehrerer Jahre in einem kurzen Text vermittelt. Sie können Fehler vermeiden, bevor Sie sie selbst gemacht hätten und finden auch verbesserte Wege, eine Sache anzugehen. Außerdem bleiben Sie immer auf den neusten Stand und verpassen keine Möglichkeiten mehr oder lernen bei der nächsten diese nicht zu übersehen.</p>
                                    <p><br>Daher setzen auch die erfolgreichen Persönlichkeiten auf Lesen und wir natürlich auch. Beschleunigen Sie Ihren Weg und bilden Sie sich weiter!<br><br></p>
                                    <h3>Updates</h3>
                                    <p>Wir bemühen uns stetig neue Kurse für Sie zu veröffentlichen. Vorbeischauen zahlt sich also aus.</p>
                                    <h4>Kurswünsche</h4>
                                    <p>Wenn Sie einen Wunsch zu einem Kurs haben, oder ein Idee für ein neues Kapitel haben, werden wir dieses natürlich auch beherzigen und mit etwas Glück auch verfassen und veröffentlichen. </p>
                                    <h4>Sie haben einen Kurs den Sie veröffentlichen möchten?</h4>
                                    <p>Wenn Sie gerne Schriftsteller für GreenBumbleInvest werden möchten, bitten wir Sie uns zu kontaktieren, da wir immer wieder gerne Leute in unser Team aufnehmen möchten. Wir werden, dann mit Ihnen die Einzelheiten durchgehen.<br></p>
                                    <h3>Wir wünschen Ihnen viel Spaß beim Lesen.</h3>
                                    ';
                        } else {
                            echo '<h1>Information Page</h1>
                            <h2>Do you have a question or want to further your knowledge about trading or investing? Then you are in the right place.</h2>
                            <h3>Browse our library and learn something new!</h3>
                            <p>On our information page, you will find free courses to read through. Whether you are a beginner or an expert, there is something here for everyone. </br></br>
                            Feel free to let us know about any improvements or inaccuracies through our contact form or by email. We would appreciate it. 
                            </br></br></p>
                            
                            <video controls>
                                         <source src="' . $htmlpath . 'styles/videos/Infopagevideo.mp4" type="video/mp4">
                                         Your Browser does not support this video.
                                      </video>
                                     <h3>Why reading?</h3>
                                     <p>Why should we read, even if we already know it very well? Reading educates us, it gives us a new perspective on a topic and occasionally gives us information that we didn\'t know before.</p>
                                    <p><br>By reading, you will gain experience from several years in a short text. You can avoid mistakes before you made them yourself and also find improved ways of approaching something. In addition, you always stay up to date and don\'t miss any more opportunities or learn not to overlook them the next time.</p>
                                    <p><br>That\'s why successful personalities also rely on reading and of course we do too. Accelerate your path and educate yourself!<br><br></p>
                                    <h3>Updates</h3>
                                    <p>We constantly strive to publish new courses for you. So it pays to stop by.</p>
                                    <h4>Course requests</h4>
                                    <p>If you have a wish for a course or an idea for a new chapter, we will of course take this to heart and, with a bit of luck, write and publish it.</p>
                                    <h4>Do you have a course you would like to publish?</h4>
                                    <p>If you would like to become a writer for GreenBumbleInvest, please contact us as we are always keen to add people to our team. We will then go through the details with you.<br></p>
                                    
                            <h3>Have fun in our libary.</h3>
                                    ';
                        }
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