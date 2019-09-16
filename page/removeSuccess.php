<?php include '../partials/header.php'; ?>

<?php include '../partials/tools.php' ?>

<?php
$gameTimestamp = $_POST["gameTimestamp"];
$gameIsDeleted = false;
$gameToDelete;

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
        $json = json_decode(file_get_contents('../data/games.json'), true);
        $jsonToDelete = $json;
        foreach ($json as $field => $game) {
            if ($game['timestamp'] == $gameTimestamp) {
                $gameToDelete = $game;
                unset($jsonToDelete[$field]);
                $jsonData = json_encode($jsonToDelete, JSON_PRETTY_PRINT);
                file_put_contents('../data/games.json', $jsonData);
                $gameIsDeleted = true;
            }
        }
    }
}


?>

<?php if ($gameIsDeleted) { ?>
    <div class="alert alert-success" role="alert">
        Das
        Spiel <?php echo findAttribute($gameToDelete['home'], 'name', 'teams') . ' ' . $gameToDelete['resultHome'] . ':' . $gameToDelete['resultAway'] . ' ' . findAttribute($gameToDelete['away'], 'name', 'teams'); ?>
        wurde gelöscht.
    </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        Das
        Spiel <?php echo findAttribute($gameToDelete['home'], 'name', 'teams') . ' ' . $gameToDelete['resultHome'] . ':' . $gameToDelete['resultAway'] . ' ' . findAttribute($gameToDelete['away'], 'name', 'teams'); ?>
        konnte nicht gelöscht werden.
    </div>
<?php } ?>


<?php include '../partials/footer.php' ?>
