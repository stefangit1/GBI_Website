<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<?php
if (!isset($_SESSION['mail_attempts'])) {
    $_SESSION['mail_attempts'] = [];
}

$current_time = time();
$time_limit = 600;
$max_attempts = 5;

$_SESSION['mail_attempts'] = array_filter($_SESSION['mail_attempts'], function($timestamp) use ($current_time, $time_limit) {
    return ($current_time - $timestamp) < $time_limit;
});

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vorname = htmlspecialchars(strip_tags(trim($_POST["vorname"])));
    $nachname = htmlspecialchars(strip_tags(trim($_POST["nachname"])));
    $betreff = htmlspecialchars(strip_tags(trim($_POST["betreff"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    $to = "Office@greenbumbleinvest.com";

    $subject = "Neue Kontaktanfrage: $betreff";

    $email_message = "Vorname: $vorname\n";
    $email_message .= "Nachname: $nachname\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Nachricht:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    if (contactMail($to, $subject, $email_message, $headers)) {
        if($lang == 'de'){$success_message = "Thank you for your message! We will get in touch with you soon.";;}
        else {$success_message = "Danke für Ihre Nachricht! Wir werden uns bald bei Ihnen melden.";;}
    } else {
        if($lang == 'de'){$success_message = "There was a problem sending your message. Please try again later.";;}
        else {$success_message = "Beim Senden Ihrer Nachricht ist ein Problem aufgetreten. Bitte versuchen Sie es später noch einmal.";;}
    }
}
?>

<head>
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/page_styling/contact_page.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Need help? Searching for answers? Contact page |GreenBumbleInvest</title>
    <meta name="description" content="Users trust our Support! Do you need help with your trading system or one of our features? If you would like to give us feedback or cooperate with us, then visit our contact form."/>
    <meta name="keywords" content="Contact us, Help, Expert Advisor Help, Community help, Support"/>
</head>

<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php'?>
<div class = "content">
    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
    <main>
        <div class="center_content_contactpage"><div class="hauptform">
            <div class="intro-text">
                <h2><?php echo $lang == 'de' ? 'Kontaktieren Sie uns' : 'Contact us'; ?></h2>
                <p>
                    <?php echo $lang == 'de' ? 
                    'Wir freuen uns, von Ihnen zu hören! Egal, ob Sie Fragen, Anregungen oder spezielle Anliegen haben, zögern Sie nicht, uns zu kontaktieren.
                    Füllen Sie einfach das untenstehende Formular aus, und unser Team wird sich so schnell wie möglich mit Ihnen in Verbindung setzen.
                    Ihre Meinung ist uns wichtig, und wir sind bestrebt, Ihnen den bestmöglichen Service zu bieten.' : 
                    'We are happy to hear from them! Whether you have any questions, suggestions or specific concerns, please do not hesitate to contact us.
                    Simply fill out the form below and our team will contact you as soon as possible.
                    Your opinion is important to us and we are committed to providing you with the best possible service.'; ?>
                </p>
                <div class="intro-text-phone-box">
                    <img src="<?php echo$htmlpath?>styles/images/phone.png">
                    <p>+43 670 700 5001</p>
                </div>
                <div class="intro-text-times">
                    <ul>
                        <li><?php echo $lang == 'de' ? 'Montag ':'Monday';?> </li>
                        <li><?php echo $lang == 'de' ? 'Dienstag':'Tuesday';?> </li>
                        <li><?php echo $lang == 'de' ? 'Mittwoch':'Wednesday';?> </li>
                        <li><?php echo $lang == 'de' ? 'Donnerstag':'Thursday';?> </li>
                        <li><?php echo $lang == 'de' ? 'Freitag':'Friday';?> </li>
                        <li><?php echo $lang == 'de' ? 'Samstag':'Saturday';?> </li>
                        <li><?php echo $lang == 'de' ? 'Sonntag':'Sunday';?> </li>
                    </ul>
                    <ul style="list-style-type: none">
                        <li>12:00-17:00</li>
                        <li>12:00-17:00</li>
                        <li>12:00-17:00</li>
                        <li>12:00-17:00</li>
                        <li>12:00-17:00</li>
                        <li>geschlossen</li>
                        <li>14:00-20:00</li>
                    </ul>
                </div>
            </div>

            <div class="contactform_block">
            <?php
            if (!empty($success_message)) {
                echo "<p style='color:green;'>$success_message</p>";
            } elseif (!empty($error_message)) {
                echo "<p style='color:red;'>$error_message</p>";
            }
            ?>
            <form action="contact_page.php" method="post">
                <label for="vorname"><?php if($lang == 'de'){echo 'Vorname';}else {echo 'First Name';}?>:</label>
                <input type="text_contact" id="vorname" name="vorname" required>
                <br>
                <label for="nachname"><?php if($lang == 'de'){echo 'Nachname';}else {echo 'Last Name';}?>:</label>
                <input type="text_contact" id="nachname" name="nachname" required>
                <br>
                <label for="betreff"><?php if($lang == 'de'){echo 'Betreff';}else {echo 'Subject';}?>:</label>
                <input type="text_contact" id="betreff" name="betreff" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="message"><?php if($lang == 'de'){echo 'Nachricht';}else {echo 'Message';}?>:</label>
                <textarea id="message" name="message" class="contact_page_textarea" required></textarea>
                <br>
                <input type="submit" value="<?php if($lang == 'de'){echo 'Senden';}else {echo 'Send';}?>">
            </form>
            </div>
        </div>
            <div class="kategorie_explain">
                <p> <?php echo $lang == 'de' ? 'Um den Schriftverkehr etwas zu beschleunigen, bitten wir Sie den <strong>richtigen Betreff</strong> Ihres Anliegens auszuwählen, bevor Sie den Antrag absenden.':'In order to speed up correspondence, we ask you to select the <strong>correct subject</strong> of your request before sending the application.';?></p>
                <p><br><strong> <?php echo $lang == 'de' ? 'Kritik':'criticism';?>:</strong><?php echo $lang == 'de' ? 'Wenn Sie Verbesserungsvorschläge teilen möchten.':'If you would like to share suggestions for improvement.';?></p>
                <p><br><strong>IT:</strong> <?php echo $lang == 'de' ? 'Wenn sie Fragen oder ein Problem haben, mit einer unserer Applikationen.':'If you have any questions or a problem with one of our applications.';?></p>
                <p><br><strong><?php echo $lang == 'de' ? 'Business':'business';?>:</strong>   <?php echo $lang == 'de' ? 'Wenn Sie ein Geschäftliches Anliegen haben.':'If you have a business concern.';?></p>
                <p><br><strong> <?php echo $lang == 'de' ? 'Sonstiges':'others';?>:</strong><?php echo $lang == 'de' ? 'Für alle sonstigen, nicht erwähnten Fälle.':'For all other cases not mentioned.';?></p>
            </div>
            <div class="info_container_contact">
                <img src="<?php echo$htmlpath?>styles/images/uhrezeiger.png">
                <h3>  <?php echo $lang == 'de' ? 'Wir bitten Sie um Geduld':'We ask for your patience';?></h3>
                <p><?php echo $lang == 'de' ? 'Falls Sie, aufgrund des erhöhten Anrufvolumens und Schriftverkehr, etwas länger auf Ihren Rückruf oder die Antwort warten müssen.':'If you have to wait a little longer for your callback or response due to increased call volume and correspondence.';?></p>
                <p><br><?php echo $lang == 'de' ? 'Wir werden Sie bei der nächsten möglichen Gelegenheit sofort zurückrufen, oder auf Ihre Mail zurückschreiben.':'We will call you back immediately at the next possible opportunity or write back to your email.';?></p>
            </div>
        </div>
    </main>
    <aside class="right_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>
</div>
<?php include_once $phppath . 'logistic/structure/footer.php'?>
</body>