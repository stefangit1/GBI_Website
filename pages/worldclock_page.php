<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<script>
    const exchanges = [
        { name: "NYSE", open: "09:30", close: "16:00", timezone: "America/New_York" },
        { name: "NASDAQ", open: "09:30", close: "16:00", timezone: "America/New_York" },
        { name: "Tokyo Stock Exchange", open: "09:00", close: "15:00", timezone: "Asia/Tokyo" },
        { name: "London Stock Exchange", open: "08:00", close: "16:30", timezone: "Europe/London" },
        { name: "Deutsche Börse", open: "09:00", close: "17:30", timezone: "Europe/Berlin" },
        { name: "Wiener Börse", open: "09:00", close: "17:30", timezone: "Europe/Vienna" },
        { name: "SWISS SIX", open: "09:00", close: "17:30", timezone: "Europe/Zurich" },
        { name: "Nasdaq Nordic", open: "09:00", close: "17:30", timezone: "Europe/Stockholm" },
        { name: "Toronto SE", open: "09:30", close: "16:00", timezone: "America/Toronto" },
        { name: "Shanghai SE", open: "09:30", close: "15:00", timezone: "Asia/Shanghai" },
        { name: "Korea SE", open: "09:00", close: "15:00", timezone: "Asia/Seoul" },
        { name: "Johannesburg SE", open: "09:00", close: "17:00", timezone: "Africa/Johannesburg" },
        { name: "Brasil SE", open: "10:00", close: "17:00", timezone: "America/Sao_Paulo" },
        { name: "Taiwan SE", open: "09:00", close: "13:30", timezone: "Asia/Taipei" },
        { name: "Australien SE", open: "10:00", close: "16:00", timezone: "Australia/Sydney" },
        { name: "Bombay SE", open: "09:15", close: "15:30", timezone: "Asia/Kolkata" }
    ];
    function calculateTimeDifference(fromTime, toTime) {
        const diff = toTime - fromTime;
        const hours = Math.floor(diff / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        return { hours, minutes, seconds };
    }

    function updateTimes() {
        const container = document.getElementById('exchanges');
        container.innerHTML = '';

        exchanges.forEach(exchange => {
            const exchangeTimeStr = new Date().toLocaleString('en-US', { timeZone: exchange.timezone });
            const exchangeTime = new Date(exchangeTimeStr);

            const [openHours, openMinutes] = exchange.open.split(':').map(Number);
            const [closeHours, closeMinutes] = exchange.close.split(':').map(Number);

            const openTime = new Date(exchangeTime);
            const closeTime = new Date(exchangeTime);

            openTime.setHours(openHours, openMinutes, 0, 0);
            closeTime.setHours(closeHours, closeMinutes, 0, 0);

            let nextEventTime;
            let isOpen;

            if (exchangeTime < openTime) {
                nextEventTime = openTime;
                isOpen = false;
            } else if (exchangeTime  >= closeTime) {
                nextEventTime = new Date(openTime);
                nextEventTime.setDate(nextEventTime.getDate() + 1);
                isOpen = false;
            } else {
                nextEventTime = closeTime;
                isOpen = true;
            }

            const timeUntilNextEvent = calculateTimeDifference(exchangeTime , nextEventTime);
            const timeString = `${timeUntilNextEvent.hours}h ${timeUntilNextEvent.minutes}m ${timeUntilNextEvent.seconds}s`;

            container.innerHTML += `
                <div>
                    <strong>${exchange.name}</strong><br>
                    ${isOpen ? '<?php echo $lang == 'de' ? 'Schließt in:' : 'Closes in:';?> ' : '<?php echo $lang == 'de' ? 'Öffnet in:' : 'Opens in:';?> '}
                    ${timeString}
                </div>
            `;
        });
    }

    setInterval(updateTimes, 1000);
    updateTimes();
</script>

<head>
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/page_styling/worldclock_page.css" type="text/css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
    <title>Stock exchange closing and opening times| stock clock |GreenBumbleInvest</title>
    <meta name="description" content="Have a view about all stock exchange opening and closing times arround the world. See whats currently active and get prepared for the next trading session!"/>
    <meta name="keywords" content="stock market clock, trading clock, sessions, stock exchange times, stock exchange opening and closing"/>
</head>

<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php'?>
<div class = "content">

    <aside class="left_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>

    <main>
        <div class="worldclock_content">
            <div class="times_container_top">
                <div class="times_headtitel">
                    <h1><?php echo $lang == 'de' ? 'Börsenzeiten' : 'Stock market hours';?></h1>
                </div>
                <div class="times_exchanges_container">
                    <div id="exchanges"></div>
                </div>
            </div>
        </div>
        <h2>Trading Sessions</h2>
        <div class="trading_session_times_container">
            <table>
                <thead>
                <tr>
                    <th>Session</th>
                    <th><?php echo $lang == 'de' ? 'Ortszeit Öffnung' : 'Local time opening';?></th>
                    <th><?php echo $lang == 'de' ? 'Ortszeit Schließung' : 'Local time closure';?></th>
                    <th><?php echo $lang == 'de' ? 'UTC Öffnung' : 'UTC opening';?></th>
                    <th><?php echo $lang == 'de' ? 'UTC Schließung' : 'UTC closing';?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Sydney</td>
                    <td>7:00 AM</td>
                    <td>4:00 PM</td>
                    <td>9:00 PM</td>
                    <td>6:00 AM</td>
                </tr>
                <tr>
                    <td>Tokyo</td>
                    <td>9:00 AM</td>
                    <td>6:00 PM</td>
                    <td>12:00 AM</td>
                    <td>9:00 AM</td>
                </tr>
                <tr>
                    <td>London</td>
                    <td>8:00 AM</td>
                    <td>5:00 PM</td>
                    <td>7:00 AM</td>
                    <td>4:00 PM</td>
                </tr>
                <tr>
                    <td>New York</td>
                    <td>8:00 AM</td>
                    <td>5:00 PM</td>
                    <td>1:00 PM</td>
                    <td>10:00 PM</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2><?php echo $lang == 'de' ? 'Börsenzeiten weltweit' : 'Stock market times worldwide';?></h2>
        <div class="world_stockexchangetable">
            <table>
                <thead>
                <tr>
                    <th><?php echo $lang == 'de' ? 'Börse' : 'Stock market';?></th>
                    <th><?php echo $lang == 'de' ? 'Standort' : 'Location';?></th>
                    <th><?php echo $lang == 'de' ? 'Öffnungs- und Schlusszeit (Zeitzone)' : 'Opening and closing time (time zone)';?></th>
                    <th><?php echo $lang == 'de' ? 'Mittagspause' : 'Lunch break';?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>New York Stock Exchange (NYSE) & NASDAQ</td>
                    <td>New York, USA</td>
                    <td>09:30 AM - 04:00 PM Eastern Time (ET)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>London Stock Exchange (LSE)</td>
                    <td>London, UK</td>
                    <td>08:00 AM - 04:30 PM Greenwich Mean Time (GMT) / British Summer Time (BST)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>Frankfurt Stock Exchange (Xetra)</td>
                    <td><?php echo $lang == 'de' ? 'Frankfurt, Deutschland' : 'Frankfurt, Germany';?></td>
                    <td><?php echo $lang == 'de' ? '09:00 AM - 05:30 PM Mitteleuropäische Zeit (MEZ) / Mitteleuropäische Sommerzeit (MESZ)' : '09:00 AM - 05:30 PM Central European Time (CET) / Central European Summer Time (CEST)';?></td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>Tokyo Stock Exchange (TSE)</td>
                    <td>Tokio, Japan</td>
                    <td>09:00 AM - 03:00 PM Japan Standard Time (JST)</td>
                    <td>11:30 AM - 12:30 PM Japan Standard Time (JST)</td>
                </tr>
                <tr>
                    <td>Hong Kong Stock Exchange (HKEX)</td>
                    <td>Hongkong</td>
                    <td>09:30 AM - 04:00 PM Hong Kong Time (HKT)</td>
                    <td>12:00 PM - 01:00 PM Hong Kong Time (HKT)</td>
                </tr>
                <tr>
                    <td>Shanghai Stock Exchange (SSE)</td>
                    <td>Shanghai, China</td>
                    <td>09:30 AM - 03:00 PM China Standard Time (CST)</td>
                    <td>11:30 AM - 01:00 PM China Standard Time (CST)</td>
                </tr>
                <tr>
                    <td>Australian Securities Exchange (ASX)</td>
                    <td><?php echo $lang == 'de' ? 'Sydney, Australien' : 'Sydney, Australia';?></td>
                    <td>10:00 AM - 04:00 PM Australian Eastern Standard Time (AEST) / Australian Eastern Daylight Time (AEDT)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>Toronto Stock Exchange (TSX)</td>
                    <td><?php echo $lang == 'de' ? 'Toronto, Kanada' : 'Toronto, Canada';?></td>
                    <td>09:30 AM - 04:00 PM Eastern Time (ET)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td><?php echo $lang == 'de' ? 'Euronext (Paris, Amsterdam, Brüssel, Lissabon)' : 'Euronext (Paris, Amsterdam, Brussels, Lisbon)';?></td>
                    <td><?php echo $lang == 'de' ? 'Paris, Frankreich' : 'Paris, France';?></td>
                    <td><?php echo $lang == 'de' ? '09:00 AM - 05:30 PM Mitteleuropäische Zeit (MEZ) / Mitteleuropäische Sommerzeit (MESZ)' : '09:00 AM - 05:30 PM Central European Time (CET) / Central European Summer Time (CEST)';?></td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>Swiss Exchange (SIX Swiss Exchange)</td>
                    <td><?php echo $lang == 'de' ? 'Zürich, Schweiz' : 'Zurich, Switzerland';?></td>
                    <td><?php echo $lang == 'de' ? '09:00 AM - 05:30 PM Mitteleuropäische Zeit (MEZ) / Mitteleuropäische Sommerzeit (MESZ)' : '09:00 AM - 05:30 PM Central European Time (CET) / Central European Summer Time (CEST)';?></td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>Korea Exchange (KRX)</td>
                    <td><?php echo $lang == 'de' ? 'Seoul, Südkorea' : 'Seoul, South Korea';?></td>
                    <td>09:00 AM - 03:30 PM Korea Standard Time (KST)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>Taiwan Stock Exchange (TWSE)</td>
                    <td>Taipei, Taiwan</td>
                    <td>09:00 AM - 01:30 PM Taiwan Time (TWT)</td>
                    <td>11:30 AM - 01:00 PM Taiwan Time (TWT)</td>
                </tr>
                <tr>
                    <td>BSE India (Bombay Stock Exchange)</td>
                    <td><?php echo $lang == 'de' ? 'Mumbai, Indien' : 'Mumbai, India';?></td>
                    <td>09:15 AM - 03:30 PM India Standard Time (IST)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>National Stock Exchange of India (NSE)</td>
                    <td><?php echo $lang == 'de' ? 'Mumbai, Indien' : 'Mumbai, India';?></td>
                    <td>09:15 AM - 03:30 PM India Standard Time (IST)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>Sao Paulo Stock Exchange (B3)</td>
                    <td><?php echo $lang == 'de' ? 'São Paulo, Brasilien' : 'Sao Paulo, Brazil';?></td>
                    <td>10:00 AM - 05:00 PM Brasília Time (BRT)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                <tr>
                    <td>Johannesburg Stock Exchange (JSE)</td>
                    <td><?php echo $lang == 'de' ? 'Johannesburg, Südafrika' : 'Johannesburg, South Africa';?></td>
                    <td>09:00 AM - 05:00 PM South Africa Standard Time (SAST)</td>
                    <td><?php echo $lang == 'de' ? 'Keine' : 'No';?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>

    <aside class="right_content">
        <?php include_once $phppath . 'website_specific_files/ads.php'?>
    </aside>

</div>
<?php include_once $phppath . 'logistic/structure/footer.php'?>
</body>