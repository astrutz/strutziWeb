<?php include '../partials/header.php'; ?>


<?php
$teams = json_decode(file_get_contents('../data/teams.json'), true);
$leagues = json_decode(file_get_contents('../data/leagues.json'), true);
usort($teams,function($a,$b) {return strnatcasecmp($a['name'],$b['name']);});
usort($leagues,function($a,$b) {if($a['level'] == $b['level']){ return 0 ; } return ($a['level'] < $b['level']) ? -1 : 1; } );

?>
<form action="addSuccess.php" method="post">
    <div class="row form-group">
        <div class="col">
            <label for="inputDate">Datum</label>
            <input type="date" class="form-control" id="inputDate" name="gameDate">
        </div>
        <div class="col">
            <label for="inputTime">Uhrzeit</label>
            <input type="time" class="form-control" id="inputTime" name="gameTime">
        </div>
    </div>
    <div class="row form-group">
        <div class="col">
            <label for="inputHome">Heimmannschaft</label>
            <select class="form-control" id="inputHome" name="gameHome">
                <option selected id="0">Team auswählen..</option>
                <?php foreach ($teams as $field => $team) {?>
                    <option  id=<?php echo $team['id']; ?>><?php echo $team['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col">
            <label for="inputGuest">Gastmannschaft</label>
            <select class="form-control" id="inputGuest" name="gameGuest">
                <option selected id="0">Team auswählen..</option>
                <?php foreach ($teams as $field => $team) {?>
                    <option id=<?php echo $team['id']; ?>><?php echo $team['name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col">
            <label for="inputClass">Spielklasse</label>
            <input id="inputClass" class="form-control" placeholder="Klasse eingeben.." name="gameClass">
        </div>
        <div class="col">
            <label for="inputLeague">Wettbewerb</label>
            <select class="form-control" id="inputLeague" name="gameLeague">
                <option selected id="0">Wettbewerb auswählen..</option>
                <?php foreach ($leagues as $field => $league) {?>
                    <option id=<?php echo $league['id']; ?>><?php echo $league['name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col">
            <label for="inputRole">Rolle</label>
            <select class="form-control" id="inputRole" name="gameRole">
                    <option id="0">Schiedsrichter</option>
                    <option id="1">Assistent 1</option>
                    <option id="2">Assistent 2</option>
            </select>
        </div>
        <div class="col">
            <label for="inputRefTeam">Gespann</label>
            <input id="inputRefTeam" class="form-control" placeholder="Gespann angeben.." name="gameTeam">
        </div>
            <input style="display: none;" id="inputToken" class="form-control" name="gameToken">
    </div>
    <div class="row form-group" id="gameEvents">
        <div class="col-2" id="teamCol">
            <label for="inputTeam0">Team</label>
            <select class="form-control" id="inputTeam0" name="gameEventTeam0">
                <option id="home">Heim</option>
                <option id="away">Gast</option>
            </select>
        </div>
        <div class="col-2" id="minuteCol">
            <label for="inputMinute0">Minute</label>
            <input type="number" id="inputMinute0" class="form-control" placeholder="Minute.." name="gameEventMinute0">
        </div>
        <div class="col-2" id="numberCol">
            <label for="inputNumber0">Nummer</label>
            <input type="number" id="inputNumber0" class="form-control" placeholder="Nummer.." name="gameEventNumber0">
        </div>
        <div class="col-2" id="eventCol">
            <label for="inputEvent0">Ereignis</label>
            <input id="inputEvent0" class="form-control" placeholder="Ereignis.." name="gameEvent0">
        </div>
        <div class="col-2" id="typeCol">
            <label for="inputType0">Typ</label>
            <input id="inputType0" class="form-control" placeholder="Typ.." name="gameEventType0">
        </div>
        <div class="col-1" id="addBtnCol">
            <label for="addEvent0">&nbsp;</label>
            <button onclick="addGameEventRow(this)" id="addEvent0" type="button" class="btn-info form-control">+</button>
        </div>
        <div class="col-1" id="deleteBtnCol">
            <label for="deleteEvent0">&nbsp;</label>
            <button onclick="deleteGameEventRow(this)" id="deleteEvent0" type="button" class="btn-danger form-control">-</button>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Absenden</button>
<!--    TODO: Special Events berücksichtigen und Dropdown für gameEvents -->
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
