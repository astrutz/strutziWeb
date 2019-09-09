<?php include '../partials/header.php'; ?>


<?php
$games = json_decode(file_get_contents('../data/games.json'), true);
usort($games,function($a,$b) {if($a['timestamp'] == $b['timestamp']){ return 0 ; } return ($a['timestamp'] < $b['timestamp']) ? -1 : 1; } );

?>
<br><br>
<br><br>
<form>
    <div class="form-group">
        <label for="inputGuest">Zu löschendes Spiel</label>
        <select class="form-control" id="inputGuest">
            <option selected id="0">Spiel auswählen..</option>
            <?php foreach ($games as $field => $game) {?>
                <option id=<?php echo $game['timestamp']; ?>><?php echo findAttribute($game['home'], 'name', 'teams') . ' ' . $game['resultHome'] . ':' . $game['resultAway'] . ' ' .findAttribute($game['away'], 'name', 'teams'); ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-danger">Spiel löschen</button>
</form>
<?php
function findAttribute($id, $attribute, $file)
{
    $str = file_get_contents('../data/' . $file . '.json');
    $json = json_decode($str, true);
    foreach ($json as $field => $value) {
        if ((string)$value['id'] == $id) {
            return $value[$attribute];
        }
    }
    return "ERR";
}
?>
<?php include '../partials/footer.php'?>
