<?php include '../partials/header.php'; ?>

<?php include '../partials/tools.php'?>

<?php
$gameTimestamp = $_GET["gameTimestamp"];
$gameRole = $_GET["gameRole"];
$gameIsDeleted = false;
$gameToDelete;

$json = json_decode(file_get_contents('../data/games.json'), true);
$jsonToDelete = $json;
foreach ($json as $field => $game){
    if($game['timestamp'] == $gameTimestamp){
        $gameToDelete = $game;
        if($game['role'] == $gameRole){
            unset($jsonToDelete[$field]);
            $jsonData = json_encode($jsonToDelete, JSON_PRETTY_PRINT);
            file_put_contents('../data/games.json', $jsonData);
            $gameIsDeleted = true;
        }
    }
}
?>

<?php if($gameIsDeleted){ ?>
    <div class="alert alert-success" role="alert">
        Das Spiel <?php echo findAttribute($gameToDelete['home'], 'name', 'teams') . ' ' . $gameToDelete['resultHome'] . ':' . $gameToDelete['resultAway'] . ' ' .findAttribute($gameToDelete['away'], 'name', 'teams'); ?> wurde gelöscht.
    </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        Das Spiel <?php echo findAttribute($gameToDelete['home'], 'name', 'teams') . ' ' . $gameToDelete['resultHome'] . ':' . $gameToDelete['resultAway'] . ' ' .findAttribute($gameToDelete['away'], 'name', 'teams'); ?> konnte nicht gelöscht werden.
    </div>
<?php } ?>


<?php include '../partials/footer.php'?>
