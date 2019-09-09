<?php include '../partials/header.php'; ?>


<?php
$teams = json_decode(file_get_contents('../data/teams.json'), true);
$leagues = json_decode(file_get_contents('../data/leagues.json'), true);
usort($teams,function($a,$b) {return strnatcasecmp($a['name'],$b['name']);});
usort($leagues,function($a,$b) {if($a['level'] == $b['level']){ return 0 ; } return ($a['level'] < $b['level']) ? -1 : 1; } );

?>
<br><br>
<br><br>
<form>
    <div class="row form-group">
        <div class="col">
            <label for="inputDate">Datum</label>
            <input type="date" class="form-control" id="inputDate">
        </div>
        <div class="col">
            <label for="inputTime">Uhrzeit</label>
            <input type="time" class="form-control" id="inputTime">
        </div>
    </div>
    <div class="row form-group">
        <div class="col">
            <label for="inputHome">Heimmannschaft</label>
            <select class="form-control" id="inputHome">
                <option selected id="0">Team auswählen..</option>
                <?php foreach ($teams as $field => $team) {?>
                    <option  id=<?php echo $team['id']; ?>><?php echo $team['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col">
            <label for="inputGuest">Gastmannschaft</label>
            <select class="form-control" id="inputGuest">
                <?php foreach ($teams as $field => $team) {?>
                    <option selected id="0">Team auswählen..</option>
                    <option id=<?php echo $team['id']; ?>><?php echo $team['name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col">
            <label for="inputClass">Spielklasse</label>
            <input id="inputClass" class="form-control" placeholder="Klasse eingeben..">
        </div>
        <div class="col">
            <label for="inputLeague">Liga</label>
            <select class="form-control" id="inputLeague">
                <?php foreach ($leagues as $field => $league) {?>
                    <option id=<?php echo $league['id']; ?>><?php echo $league['name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    HIER MÜSSEN NOCH GAME EVENTS UND BESONDERHEITEN HIN! <br>
    <button type="submit" class="btn btn-success">Absenden</button>
</form>
<?php include '../partials/footer.php'?>
