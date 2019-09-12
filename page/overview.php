<?php include '../partials/header.php'; ?>

<?php include '../partials/tools.php'?>


<?php
$json = json_decode(file_get_contents('../data/games.json'), true);
?>
    <h1>Where the fuck referees Alex Strutz?</h1>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <select id="sorter" class="btn btn-secondary dropdown-toggle">
                    <option value="timestamp">Datum</option>
                    <option value="goalNum">Anzahl der Tore</option>
                    <option value="cardNum">Anzahl der Karten</option>
                    <option value="league">Liga</option>
                </select>
                <a onclick="sortBy()" class="btn btn-secondary">Sortieren!</a>
            </div>
            <div class="col-sm-3">
                <input class="form-control" id="gameSearch" type="text" placeholder="Spiele durchsuchen">
            </div>
        </div>
        <br>
    </div>
    <table class="table table-hover">
        <thead>
        <th style="border: none">Spiele</th>
        </thead>
        <tbody id="gameList">
        <?php foreach ($json as $field => $game) { ?>
            <tr id="gameHeadline" onclick="moveAccordion(<?php echo $field ?>)">
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

    <script>
        $(document).ready(function () {
            $("#gameSearch").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#gameList #gameHeadline").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

<?php

function sortJson($sortKey)
{

    $str = file_get_contents('../data/games.json');
    $json = json_decode($str, true);
    switch ($sortKey) {
        case 'timestamp':
            usort($json, function ($a, $b) {
                return $a['timestamp'] <=> $b['timestamp'];
            });
            break;
        case 'goalNum':
            usort($json, function ($a, $b) {
                return ($a['resultHome'] + $a['resultAway']) <=> ($b['resultHome'] + $b['resultAway']);
            });
            break;
        case 'cardNum':
            usort($json, function ($a, $b) {
                $cardsA = 0;
                $cardsB = 0;
                foreach ($a['gameEventsHome'] as $field => $value) {
                    if ($value['event'] == 'yellow' || $value['event'] == 'time' || $value['event'] == 'red') {
                        $cardsA++;
                    }
                }
                foreach ($a['gameEventsAway'] as $field => $value) {
                    if ($value['event'] == 'yellow' || $value['event'] == 'time' || $value['event'] == 'red') {
                        $cardsA++;
                    }
                }
                foreach ($b['gameEventsHome'] as $field => $value) {
                    if ($value['event'] == 'yellow' || $value['event'] == 'time' || $value['event'] == 'red') {
                        $cardsB++;
                    }
                }
                foreach ($b['gameEventsAway'] as $field => $value) {
                    if ($value['event'] == 'yellow' || $value['event'] == 'time' || $value['event'] == 'red') {
                        $cardsB++;
                    }
                }
                return $cardsA <=> $cardsB;
            });
            break;
        case 'league':
            usort($json, function ($a, $b) {
                $leagueA = 0;
                $leagueB = 0;
                $str = file_get_contents('../data/leagues.json');
                $json = json_decode($str, true);
                foreach ($json as $field => $value) {
                    if ($value['id'] == $a['league']) {
                        $leagueA = $value['level'];
                    }
                }
                foreach ($json as $field => $value) {
                    if ($value['id'] == $b['league']) {
                        $leagueB = $value['level'];
                    }
                }
                return $leagueA <=> $leagueB;
            });
            break;
    }

    $jsonData = json_encode($json, JSON_PRETTY_PRINT);
    if (file_put_contents('../data/games.json', $jsonData)) {
        echo '<script type="text/javascript">',
        'window.open("http://dev.strutzi.de/page/overview.php","_self");',
        '</script>';
    }
}

if (isset($_GET['sort'])) {
    sortJson($_GET['sort']);
}

function getResult($game)
{
    return $game['resultHome'] . ":" . $game['resultAway'];
}

function renderSpecialEvents($game)
{
    return "";
}

function renderGameHistory($game)
{
    $timeForClass = json_decode(file_get_contents('../data/time.json'), true);
    $time = $timeForClass[$game['class']];
    $events = array_merge($game['gameEventsHome'], $game['gameEventsAway']);
    usort($events, function ($a, $b) {
        return $a['minute'] > $b['minute'];
    });
    $timeFactor = 100 / $time;
    $eventMarkup = "";
    $lastMinute = 0;
    foreach ($events as $field => $event) {
        if ($event['minute'] == 0) {
            return '<div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100"></div>';
        }
        if ($field == 0) {
            $eventMarkup = $eventMarkup . '<div class="progress-bar bg-success" role="progressbar" style="width: ' . ($event['minute'] - $lastMinute - 1) * $timeFactor . '%" aria-valuenow="' . ($event['minute'] - $lastMinute - 1) . '"></div>';
        } else {
            $eventMarkup = $eventMarkup . '<div class="progress-bar bg-success" role="progressbar" style="width: ' . ($event['minute'] - $lastMinute - 1) * $timeFactor . '%" aria-valuenow="' . ($event['minute'] - $lastMinute - 1) . '"></div>';
        }
        $color = 'info';
        switch ($event['event']) {
            case 'goal':
                $color = 'dark';
                break;
            case 'yellow':
                $color = 'warning';
                break;
            case 'red':
                $color = 'danger';
                break;
            case 'time':
                $color = 'primary';
                break;
        }
        $eventMarkup = $eventMarkup . '<div class="progress-bar bg-' . $color . '" role="progressbar" style="width: ' . $timeFactor . '%" aria-valuenow="' . ($event['minute']) . '"></div>';
        $lastMinute = $event['minute'];
    }
    $eventMarkup = $eventMarkup . '<div class="progress-bar bg-success" role="progressbar" style="width: ' . ($time - $lastMinute) * $timeFactor . '%" aria-valuenow="' . ($time - $lastMinute) . '"></div>';

    return $eventMarkup;
}

?>
<?php include '../partials/footer.php'; ?>