<?php include '../partials/header.php'; ?>

<?php include '../partials/tools.php'?>

<?php
$games = json_decode(file_get_contents('../data/games.json'), true);
usort($games,function($a,$b) {if($a['timestamp'] == $b['timestamp']){ return 0 ; } return ($a['timestamp'] < $b['timestamp']) ? -1 : 1; } );

?>
<form method="post" action="removeSuccess.php">
    <div class="form-group">
        <label for="inputGuest">Zu löschendes Spiel</label>
        <select name="gameTimestamp" class="form-control" id="inputGuest">
            <option selected id="0">Spiel auswählen..</option>
            <?php foreach ($games as $field => $game) {?>
                <option value=<?php echo $game['timestamp']; ?>><?php echo findAttribute($game['home'], 'name', 'teams') . ' ' . $game['resultHome'] . ':' . $game['resultAway'] . ' ' .findAttribute($game['away'], 'name', 'teams'); ?></option>
            <?php } ?>
        </select>
    </div>
    <input style="display: none;" id="inputToken" class="form-control" name="gameToken">
    <button type="submit" class="btn btn-danger">Spiel löschen</button>
</form>
<script src="https://www.google.com/recaptcha/api.js?render=6Ld-vLgUAAAAAPdyWpf066E9_X-oohEUrzlAYwGe"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6Ld-vLgUAAAAAPdyWpf066E9_X-oohEUrzlAYwGe', {action: 'homepage'}).then(function(token) {
            $('#inputToken').val(token);
        });
    });
</script>

<?php include '../partials/footer.php'?>
