<?php include '../partials/header.php'; ?>


<?php
$json = json_decode(file_get_contents('../data/games.json'), true);
?>
    <br><br>
    <br><br>
    <h1>Where the fuck referees Alex Strutz?</h1>
    <br><br>
    <div class="container">

        <table class="table table-hover">
            <thead>
            <th style="border: none">Spiele</th>
            </thead>
            <tbody>
            <?php foreach ($json as $field => $game) { ?>
                <tr onclick="moveAccordion(<?php echo $field ?>)">
                    <td class="row game" id="game<?php echo $field ?>">
                            <span class="col-5 homeName">
                                <?php echo findAttribute($game['home'], 'name', 'teams'); ?>
                            </span>
                        <span class="col-2" style="text-align: center">
                                <img class="icon homeIcon"
                                     src="<?php echo findAttribute($game['home'], 'picture', 'teams'); ?>">
                            <?php echo getResult($game); ?>
                            <img class="icon awayIcon"
                                 src="<?php echo findAttribute($game['away'], 'picture', 'teams'); ?>">
                            </span>
                        <span class="col-5 awayName">
                                <?php echo findAttribute($game['away'], 'name', 'teams'); ?>
                            <img class="accordionIcon" id="accordionIcon<?php echo $field ?>"
                                 src="../img/baseline-keyboard_arrow_down-24px.svg" alt="SVG mit img Tag laden">
                            </span>
                    </td>
                </tr>
                <tr class="accordionContent" id="content<?php echo $field ?>">
                    <td colspan="1" class="gameContent">
                        <!-- Accordion content-->
                        <?php echo renderSpecialEvents($game); ?>
                        <div class="progress">
                        <?php echo renderGameHistory($game); ?>
                        </div>
                        <div><?php echo date("d.m.Y H:i", $game['timestamp']) ?></div>
                        <div><?php echo $game['class'] . " " . findAttribute($game['league'], 'name', 'leagues') ?></div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<?php
function getResult($game)
{
    return $game['resultHome'] . ":" . $game['resultAway'];
}

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

function renderSpecialEvents($game){
    return "";
}

function renderGameHistory($game){
    $timeForClass = json_decode(file_get_contents('../data/time.json'), true);
    $time = $timeForClass[$game['class']];
    $events = array_merge($game['gameEventsHome'], $game['gameEventsAway']);
    usort($events,function($a,$b) {return $a['minute'] > $b['minute'];});
    $timeFactor = 100 / $time;
    $eventMarkup = "";
    $lastMinute = 0;
    foreach ($events as $field => $event){
        if($event['minute'] == 0){
            return '<div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100"></div>';
        }
        if($field == 0){
            $eventMarkup = $eventMarkup . '<div class="progress-bar bg-success" role="progressbar" style="width: ' . ($event['minute'] - $lastMinute - 1) * $timeFactor . '%" aria-valuenow="' . ($event['minute'] - $lastMinute - 1) . '"></div>';
        } else{
            $eventMarkup = $eventMarkup . '<div class="progress-bar bg-success" role="progressbar" style="width: ' . ($event['minute'] - $lastMinute - 1) * $timeFactor . '%" aria-valuenow="' . ($event['minute'] - $lastMinute - 1) . '"></div>';
        }
        $color = 'info';
        switch ($event['event']){
            case 'goal': $color = 'dark'; break;
            case 'yellow': $color = 'warning'; break;
            case 'red': $color = 'danger'; break;
            case 'time': $color = 'primary'; break;
        }
        $eventMarkup = $eventMarkup . '<div class="progress-bar bg-'.$color.'" role="progressbar" style="width: ' . $timeFactor . '%" aria-valuenow="' . ($event['minute']) . '"></div>';
        $lastMinute = $event['minute'];
    }
    $eventMarkup = $eventMarkup . '<div class="progress-bar bg-success" role="progressbar" style="width: ' . ($time - $lastMinute) * $timeFactor . '%" aria-valuenow="' . ($time - $lastMinute) . '"></div>';

    return $eventMarkup;
}


?>
<?php include '../partials/footer.php'; ?>