<?php include '../partials/header.php'; ?>

<?php
if (isset($_POST['gameToken'])) {
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => "6Ld-vLgUAAAAAAxQCLTkAM-hnPt7JJCtOASu7RBO",
        'response' => $_POST['gameToken']
    ];
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $response = json_decode(file_get_contents($url, false, $context), true);
    if ($response['success'] == true) {
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        mail('werist@strutzi.de', 'Contact attempt from ' . $_POST['mail'], $_POST['text'], [$headers]);
        ?>

        <h1 class="custom-headline">Danke!</h1>

        <p>Danke für deine Kontaktaufnahme. Ich werde mich schnellstmöglich melden.</p>

    <?php } else { ?>

        <h1 class="custom-headline">Oh no!</h1>

        <p>Etwas ist schief gelaufen. Nutze doch bitte alternativ die Mailadresse im <a
                    href="impressum.php">Impressum</a></p>

    <?php }
} else { ?>

    <h1 class="custom-headline">Oh no!</h1>

    <p>Etwas ist schief gelaufen. Nutze doch bitte alternativ die Mailadresse im <a
                href="impressum.php">Impressum</a></p>

<?php } ?>


<?php include '../partials/footer.php'; ?>