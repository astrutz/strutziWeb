<?php include '../partials/header.php'; ?>

<?php include '../partials/tools.php';  ?>

<?php
$team = [];
$sdc = [];
$other = [];
$first = [];
$second = [];
$third = [];
$several = [];
$tournaments = json_decode(file_get_contents('../data/darts.json'), true);
foreach ($tournaments as $key => $tournament) {
    switch ($tournament['playerType']) {
        case 'team':
            array_push($team, $tournament);
            break;
        case 'sdc':
            array_push($sdc, $tournament);
            break;
        case 'other':
            array_push($other, $tournament);
            break;
    }
}
foreach ($tournaments as $key => $tournament) {
    switch ($tournament['position']) {
        case 1:
            array_push($first, $tournament);
            break;
        case 2:
            array_push($second, $tournament);
            break;
        case 3:
            array_push($third, $tournament);
            break;
        default:
            if($tournament['position'] != null)
            array_push($several, $tournament);
            break;
    }
}
?>


    <h1 class="custom-headline">Darts</h1>

    <h2 class="custom-headline">Überblick</h2>
    <p>Die folgende Auflistung soll einen kleinen Überblick über meine bisherigen Ergebnisse geben, da drunter folgen
        dann (soweit vorhanden) detaillierte Statistiken.</p>

    <h4 class="custom-headline">Erste Plätze</h4>
    <ul>
        <?php echo getAllPlaces($first, false); ?>
    </ul>
    <h4 class="custom-headline">Zweite Plätze</h4>
    <ul>
        <?php echo getAllPlaces($second, false); ?>
    </ul>
    <h4 class="custom-headline">Dritte Plätze</h4>
    <ul>
        <?php echo getAllPlaces($third, false); ?>
    </ul>
    <h4 class="custom-headline">Weitere Platzierungen</h4>
    <ul>
        <li><a href="#Meisterschaften2018">Höchstes Finish (96): Vereinsmeisterschaften 2018</a></li>
        <?php echo getAllPlaces($several, true); ?>
    </ul>


    <h2 class="custom-headline">Mannschaftswettbewerbe SDC Gummersbach</h2>
<?php foreach ($team as $key => $season) { ?>
    <a name="<?php echo $season['short'] ?>"></a>
    <h4 class="custom-headline"><?php echo $season['name'] ?></h4>
    <?php if ($season['results'] != null) { ?>
        <table class="table">
            <thead>
            <tr>
                <?php foreach ($season['tableheads'] as $rowKey => $rowHead) { ?>
                    <th scope="col"><?php echo $rowHead; ?></th>
                <?php } ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($season['results'] as $rowKey => $rowValue) { ?>
                <tr>
                    <th scope="row"><?php echo $rowValue[0] ?></th>
                    <td><?php if ($rowValue[1] != "") { ?><img width="32" height="32"
                                                               src="<?php echo $rowValue[1] ?>"><?php } ?>
                    </td>
                    <?php foreach ($rowValue as $teamKey => $teamValue) {
                        if ($teamKey > 1) { ?>
                            <td><?php echo $teamValue; ?></td>
                        <?php } ?>
                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <iframe id="blockrandom" style="border-width: 0;" title="Tabellen"
                src="https://www.nwdv.live/index.php/component/dartliga/?controller=showligagameplan&amp;layout=showdashboard&amp;filVbKey=1&amp;filStaffKey=14#"
                name="iframe" width="100%" height="650px">
            Nutze einen ordentlichen Browser!
        </iframe>
    <?php } ?>
<?php } ?>

    <h2 class="custom-headline">Einzelwettbewerbe SDC Gummersbach</h2>
<?php foreach ($sdc as $key => $tournament) { ?>
    <a name="<?php echo $tournament['short'] ?>"></a>
    <h4 class="custom-headline"><?php echo $tournament['name'] ?></h4>
    <p><?php echo $tournament['description'] ?></p>
    <?php if ($tournament['results'] != null) { ?>
        <?php if ($tournament['tournamentType'] == 'league') { ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <?php foreach ($tournament['tableheads'] as $rowKey => $rowHead) { ?>
                        <th scope="col"><?php echo $rowHead; ?></th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tournament['results'] as $rowKey => $rowValue) { ?>
                    <tr>
                        <th scope="row"><?php echo $rowValue[0] ?></th>
                        <?php foreach ($rowValue as $teamKey => $teamValue) {
                            if ($teamKey > 0) { ?>
                                <td><?php echo $teamValue; ?></td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } else if ($tournament['tournamentType'] == 'ko') { ?>
            <?php foreach ($tournament['results'] as $roundKey => $roundValue) { ?>
                <p>
                    <strong><?php echo $roundValue['roundName'] ?></strong>
                    <?php foreach ($roundValue['games'] as $gameKey => $gameValue) { ?>
                        <br><?php echo $gameValue; ?>
                    <?php } ?>
                </p>
            <?php } ?>
        <?php } ?>
    <?php } ?>
<?php } ?>

    <h2 class="custom-headline">Sonstige Einzelwettbewerbe</h2>

<?php foreach ($other as $key => $tournament) { ?>
    <a name="<?php echo $tournament['short'] ?>"></a>
    <h4 class="custom-headline"><?php echo $tournament['name'] ?></h4>
    <p><?php echo $tournament['description'] ?></p>
    <?php if ($tournament['results'] != null) { ?>
        <?php if ($tournament['tournamentType'] == 'league') { ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <?php foreach ($tournament['tableheads'] as $rowKey => $rowHead) { ?>
                        <th scope="col"><?php echo $rowHead; ?></th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tournament['results'] as $rowKey => $rowValue) { ?>
                    <tr>
                        <th scope="row"><?php echo $rowValue[0] ?></th>
                        <?php foreach ($rowValue as $teamKey => $teamValue) {
                            if ($teamKey > 0) { ?>
                                <td><?php echo $teamValue; ?></td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } else if ($tournament['tournamentType'] == 'ko') { ?>
            <?php foreach ($tournament['results'] as $roundKey => $roundValue) { ?>
                <p>
                    <strong><?php echo $roundValue['roundName'] ?></strong>
                    <?php foreach ($roundValue['games'] as $gameKey => $gameValue) { ?>
                        <br><?php echo $gameValue; ?>
                    <?php } ?>
                </p>
            <?php } ?>
        <?php } ?>
    <?php } ?>
<?php } ?>

<?php include '../partials/footer.php'; ?>