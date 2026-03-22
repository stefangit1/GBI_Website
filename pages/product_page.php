<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<?php

    $lang = $_COOKIE['language'];

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

    $orderFile = $phppath . 'logistic/upload_files/products/product_order.txt';
    function getProductOrder() {
        $orderFile = $GLOBALS["orderFile"];
        if (file_exists($orderFile)) {
            return file($orderFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }
        return [];
    }

    $productOrder = getProductOrder();
    $base_dir = $phppath . "logistic/upload_files/products/";
    $html_base_path = $htmlpath . "logistic/upload_files/products/"; // Pfad für HTML
    $software_dirs = getDirectories($base_dir);
    $ordered_dirs = array_intersect($productOrder, $software_dirs);
    $unordered_dirs = array_diff($software_dirs, $ordered_dirs);
    $all_dirs = array_merge($ordered_dirs, $unordered_dirs);
?>

<head>
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/page_styling/product_page.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Expert Advisors for MetaTrader5 and Tools for Trading |GreenBumbleInvest</title>
    <meta name="description" content="Automatic trading systems for the MetaTrader5. Tools that help you trade smarter. Ready for trade without effort? Special: User interface for the EA. Completely free."/>
    <meta name="keywords" content="Expert Advisor for MetaTrader5, EA for MT5, free, user interface, automatic trading system"/>
</head>

<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php' ?>
<div class="content">
    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
    <main>
        <div class="product_show_center">
            <div class="product_page_introText">
                <h1><?php echo $lang == 'de' ? 'Genießen Sie unsere kostenlosen Applikationen.' : 'Enjoy our free applications.' ?> </h1>
                <h2> <?php echo $lang == 'de' ? 'Handelssysteme, Expert Advisors, Hilfsapps' : 'Trading systems, expert advisors, help apps' ?></h2>
                <p>  <?php echo $lang == 'de' ? 'Lassen Sie sich Ihren Trading Alltag erleichtern, indem Sie sich mit unseren Produkten eine Menge Zeit sparen, oder sich Unterstützung holen' : 'Make your everyday trading life easier by saving a lot of time with our products or by getting support' ?></p>

                <div class="product_page_text_text_container">
                    <div class="product_page_text"><h3>   <?php echo $lang == 'de' ? 'Warum bieten wir Apps an?' : 'Why do we offer apps?' ?></h3>
                        <p>  <?php echo $lang == 'de' ? 'Da wir unserer Produkte selbst im Trading verwenden und keine Intention haben diese zu verkaufen, haben wir beschlossen diese auch für Sie kostenlos zur Verfügung zu stellen. Außerdem möchten wir unserer Community volle Transparenz bieten und stellen daher alle von uns genutzten Systeme zur Verfügung, wie zum Beispiel den Fibotrader, der Tag und Nacht im Hintergrund voll automatisch für Sie handelt.' : 'Since we use our products ourselves in trading and have no intention of selling them, we have decided to make them available to you free of charge. We also want to offer our community full transparency and therefore make all the systems we use available, such as Fibotrader, which trades fully automatically for you in the background, day and night.' ?></p>
                    </div>
                    <div class="product_page_img">
                        <img src="<?php echo $htmlpath ?>styles/images/zahnradproductp.png" class="rotating-image">
                    </div>
                </div>

            </div>
            <?php
            foreach ($all_dirs as $index => $dir) {
                $dir_path = $base_dir . $dir . "/";
                $html_dir_path = $html_base_path . $dir . "/"; // Pfad für HTML
                if (is_dir($dir_path)) {
                    $image = "";
                    $description_de = "";
                    $description_en = "";
                    $technical_data_de = "";
                    $technical_data_en = "";
                    $software = "";
                    $name_de = "";
                    $name_en = "";

                    $files = scandir($dir_path);
                    foreach ($files as $file) {
                        $file_path = $dir_path . $file;
                        $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);

                        if (in_array($file_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                            $image = $html_dir_path . $file; // Pfad für HTML
                        } elseif ($file_ext == "txt" && $file == "description_de.txt") {
                            $description_de = file_get_contents($file_path);
                        } elseif ($file_ext == "txt" && $file == "description_en.txt") {
                            $description_en = file_get_contents($file_path);
                        } elseif ($file_ext == "txt" && $file == "technical_data_de.txt") {
                            $technical_data_de = file_get_contents($file_path);
                        } elseif ($file_ext == "txt" && $file == "technical_data_en.txt") {
                            $technical_data_en = file_get_contents($file_path);
                        } elseif ($file_ext == "txt" && $file == "name_de.txt") {
                            $name_de = file_get_contents($file_path);
                        } elseif ($file_ext == "txt" && $file == "name_en.txt") {
                            $name_en = file_get_contents($file_path);
                        } elseif (!in_array($file, ['.', '..']) && !is_dir($file_path)) {
                            $software = $file_path;
                        }
                    }

                    echo "<div class='product_item_box'>";
                    if ($name_de || $name_en) {
                        if ($lang == 'de') { echo "<div class='product_item_box_top'> <p>$name_de</p> </div>"; }
                        else { echo "<div class='product_item_box_top'> <p>$name_en</p> </div>"; }
                    }
                    if ($image) {
                        echo "<div class='product_item_box_middle'> <img src='$image'> </div>";
                    }
                    echo "<div class='product_item_box_bottom'>";
                    if ($description_de || $description_en) {
                        if ($lang == 'de') { echo "<div class='product_item_box_bottom_description'> <p>$description_de</p> </div>"; }
                        else { echo "<div class='product_item_box_bottom_description'> <p>$description_en</p> </div>"; }
                    }
                    if ($technical_data_de || $technical_data_en) {
                        $button_id = "tech-button-" . $index;
                        $dropdown_id = "dropdownContent-" . $index;
                        echo "<div class='product_item_box_bottom'>";
                        if ($lang == 'de') { echo "<button class='tech-button' id='$button_id' onclick='toggleDropdown(\"$dropdown_id\")'>Technische Daten</button>"; }
                        else { echo "<button class='tech-button' id='$button_id' onclick='toggleDropdown(\"$dropdown_id\")'>Technical Data</button>"; }
                        echo "<div id='$dropdown_id' class='tech-dropdown-content'>";
                        if ($lang == 'de') {
                            echo "<p>$technical_data_de</p>";
                        } else {
                            echo "<p>$technical_data_en</p>";
                        }
                        echo "</div> </div>";
                    }
                    if ($software) {
                        $filename = basename($software);
                        $download_filename = $name_en . "." . pathinfo($filename, PATHINFO_EXTENSION);

                        echo "<a href='$software' download='$download_filename'> <button type='button' class='button_download'>Download</button> </a>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </main>
    <aside class="right_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
</div>

<script>
    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle("tech-show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.tech-button')) {
            var dropdowns = document.getElementsByClassName("tech-dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('tech-show')) {
                    openDropdown.classList.remove('tech-show');
                }
            }
        }
    }
</script>

<?php include_once $phppath . 'logistic/structure/footer.php' ?>
</body>