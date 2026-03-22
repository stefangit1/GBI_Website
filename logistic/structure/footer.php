<?php $lang = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en'; ?>
<body>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-left">
            <h3><?php if($lang == 'de'){echo 'Angaben';}else {echo 'Information';}?></h3>
            <ul>
                <li><a href="<?php echo $htmlpath ?>logistic/legal_writings/impressum.php" target="blank"><?php if($lang == 'de'){echo 'Impressum';}else {echo 'Imprint';}?></a></li>
                <li><a href="<?php echo $htmlpath ?>pages/dataprotection_page.php"><?php if($lang == 'de'){echo 'Datenschutz';}else {echo 'Privacy policy';}?></a></li>
<?php if(isset($_SESSION["adminId"])): ?>
                <li><a href="<?php echo $htmlpath ?>admin/pages/admin_manage_products_page.php" target="blank">Dashboard</a></li>
<?php else: ?>
                <li><a href="<?php echo $htmlpath ?>admin/pages/admin_login_page.php" target="blank">Admin</a></li>
<?php endif; ?>
            </ul>
        </div>
        <div class="footer-right">
            <h3><?php if($lang == 'de'){echo 'Kontaktinformationen';}else {echo 'Contact Information';}?></h3>
            <p>Email: Office@greenbumbleinvest.com</p>
            <p><?php if($lang == 'de'){echo 'Telefonnummer';}else {echo 'Phone Number';}?>: +43 670 7005001</p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; GreenBumbleInvest.
    </div>
</footer>
</body>