<?php include '../partials/header.php'; ?>

<?php include '../partials/tools.php' ?>

<?php

$games = json_decode(file_get_contents('../data/games.json'), true);
array_push($games, buildGame());
$jsonData = json_encode($games, JSON_PRETTY_PRINT);
file_put_contents('../data/games.json', $jsonData);


function getGameEvents($team)
{//TODO: Handle SpecialEvents
    $gameEvents = [];
    $i = 0;
    while (isset($_GET["gameEventMinute" . $i])) {
        if ($_GET["gameEventTeam" . $i] == $team) {
            $gameEvent = [];
            $gameEvent['minute'] = $_GET["gameEventMinute" . $i];
            $gameEvent['number'] = $_GET["gameEventNumber" . $i];
            $gameEvent['event'] = translateEvent($_GET["gameEvent" . $i]);
            $gameEvent['type'] = translateEvent($_GET["gameEventType" . $i]);
            array_push($gameEvents, $gameEvent);
        }
        $i++;
    }
    return $gameEvents;
}

function getTimeByClass($class){
    $timeForClass = json_decode(file_get_contents('../data/time.json'), true);
    return $timeForClass[$class];
}

function getGoals($isHalftime, $team, $halftimeGoals)
{
    $goals = 0;
    $i = 0;
    $halftime = getTimeByClass($_GET["gameClass"]) / 2;
    while (isset($_GET["gameEventMinute" . $i])) {
        if (($_GET["gameEventTeam" . $i] == $team && $_GET["gameEvent" . $i] == 'Tor' && $_GET["gameEventType" . $i] != 'Eigentor') || ($_GET["gameEventTeam" . $i] != $team && $_GET["gameEventType" . $i] == 'Eigentor')) {
            if(($isHalftime && $_GET["gameEventMinute" . $i] <= $halftime) || (!$isHalftime && $_GET["gameEventMinute" . $i] > $halftime)){
                $goals++;
            }
        }
        $i++;
    }
    if(!$isHalftime){
        $goals = $goals + $halftimeGoals;
    }
    return $goals;
}

function buildGame(){
    $gameToSave = [];
    $gameToSave['timestamp'] = strtotime($_GET["gameDate"] . ' ' . $_GET["gameTime"]);
    $gameToSave['home'] = findAttributeByName($_GET["gameHome"], 'id', 'teams');
    $gameToSave['away'] = findAttributeByName($_GET["gameGuest"], 'id', 'teams');
    $gameToSave['halftimeHome'] = getGoals(true, 'Heim', null);
    $gameToSave['halftimeAway'] = getGoals(true, 'Gast', null);
    $gameToSave['resultHome'] = getGoals(false, 'Heim', $gameToSave['halftimeHome']);
    $gameToSave['resultAway'] = getGoals(false, 'Gast', $gameToSave['halftimeAway']);
    $gameToSave['class'] = $_GET["gameClass"];
    $gameToSave['role'] = $_GET["gameRole"];
    $gameToSave['team'] = [];
    if($gameToSave['role'] != "Schiedsrichter"){
        $gameToSave['team'] = explode(',', $_GET["gameTeam"]);
    }
    $gameToSave['league'] = findAttributeByName($_GET["gameLeague"], 'id', 'leagues');
    $gameToSave['gameEventsHome'] = getGameEvents('Heim');
    $gameToSave['gameEventsAway'] = getGameEvents('Gast');
    return $gameToSave;
}


?>

<div class="alert alert-success" role="alert">
    Das Spiel <?php echo $_GET["gameHome"] . ' ' . getGoals(false, 'Heim', getGoals(true, 'Heim', null)) . ':' . getGoals(false, 'Gast', getGoals(true, 'Gast', null)) . ' ' . $_GET["gameGuest"]; ?> wurde hinzugefügt.
</div>

<?php include '../partials/footer.php' ?>
