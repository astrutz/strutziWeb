<?php include '../partials/header.php'; ?>

<?php include '../partials/tools.php' ?>

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
    if($response['success'] == true){
        $games = json_decode(file_get_contents('../data/games.json'), true);
        array_push($games, buildGame());
        $jsonData = json_encode($games, JSON_PRETTY_PRINT);
        file_put_contents('../data/games.json', $jsonData);
    }
}

function getGameEvents($team)
{//TODO: Handle SpecialEvents
    $gameEvents = [];
    $i = 0;
    while (isset($_POST["gameEventMinute" . $i])) {
        if ($_POST["gameEventTeam" . $i] == $team) {
            $gameEvent = [];
            $gameEvent['minute'] = $_POST["gameEventMinute" . $i];
            $gameEvent['number'] = $_POST["gameEventNumber" . $i];
            $gameEvent['event'] = translateEvent($_POST["gameEvent" . $i]);
            $gameEvent['type'] = translateEvent($_POST["gameEventType" . $i]);
            array_push($gameEvents, $gameEvent);
        }
        $i++;
    }
    return $gameEvents;
}

function getTimeByClass($class)
{
    $timeForClass = json_decode(file_get_contents('../data/time.json'), true);
    return $timeForClass[$class];
}

function getGoals($isHalftime, $team, $halftimeGoals)
{
    $goals = 0;
    $i = 0;
    $halftime = getTimeByClass($_POST["gameClass"]) / 2;
    while (isset($_POST["gameEventMinute" . $i])) {
        if (($_POST["gameEventTeam" . $i] == $team && $_POST["gameEvent" . $i] == 'Tor' && $_POST["gameEventType" . $i] != 'Eigentor') || ($_POST["gameEventTeam" . $i] != $team && $_POST["gameEventType" . $i] == 'Eigentor')) {
            if (($isHalftime && $_POST["gameEventMinute" . $i] <= $halftime) || (!$isHalftime && $_POST["gameEventMinute" . $i] > $halftime)) {
                $goals++;
            }
        }
        $i++;
    }
    if (!$isHalftime) {
        $goals = $goals + $halftimeGoals;
    }
    return $goals;
}

function buildGame()
{
    $gameToSave = [];
    $gameToSave['timestamp'] = strtotime($_POST["gameDate"] . ' ' . $_POST["gameTime"]);
    $gameToSave['home'] = findAttributeByName($_POST["gameHome"], 'id', 'teams');
    $gameToSave['away'] = findAttributeByName($_POST["gameGuest"], 'id', 'teams');
    $gameToSave['halftimeHome'] = getGoals(true, 'Heim', null);
    $gameToSave['halftimeAway'] = getGoals(true, 'Gast', null);
    $gameToSave['resultHome'] = getGoals(false, 'Heim', $gameToSave['halftimeHome']);
    $gameToSave['resultAway'] = getGoals(false, 'Gast', $gameToSave['halftimeAway']);
    $gameToSave['class'] = $_POST["gameClass"];
    $gameToSave['role'] = $_POST["gameRole"];
    $gameToSave['team'] = [];
    if ($gameToSave['role'] != "Schiedsrichter") {
        $gameToSave['team'] = explode(',', $_POST["gameTeam"]);
    }
    $gameToSave['league'] = findAttributeByName($_POST["gameLeague"], 'id', 'leagues');
    $gameToSave['gameEventsHome'] = getGameEvents('Heim');
    $gameToSave['gameEventsAway'] = getGameEvents('Gast');
    return $gameToSave;
}


?>
<?php if(isset($response) && $response['success'] == true){ ?>
<div class="alert alert-success" role="alert">
    Das
    Spiel <?php echo $_POST["gameHome"] . ' ' . getGoals(false, 'Heim', getGoals(true, 'Heim', null)) . ':' . getGoals(false, 'Gast', getGoals(true, 'Gast', null)) . ' ' . $_POST["gameGuest"]; ?>
    wurde hinzugefügt.
</div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        Das
        Spiel <?php echo $_POST["gameHome"] . ' ' . getGoals(false, 'Heim', getGoals(true, 'Heim', null)) . ':' . getGoals(false, 'Gast', getGoals(true, 'Gast', null)) . ' ' . $_POST["gameGuest"]; ?>
        wurde nicht hinzugefügt.
    </div>
<?php } ?>

<?php include '../partials/footer.php' ?>
