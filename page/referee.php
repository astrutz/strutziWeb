<?php include '../partials/header.php'; ?>


<?php
$str = file_get_contents('../data/games.json');
$json = json_decode($str, true);

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
                <?php foreach ($json as $field => $value) { ?>
                    <tr onclick="moveAccordion(<?php echo$field ?>)">
                        <td class="row game" id="game<?php echo $field ?>">
                            <span class="col-5 homeName">
                                <?php echo findAttribute($value['home'], 'name', 'teams'); ?>
                            </span>
                            <span class="col-2" style="text-align: center">
                                <img class="icon homeIcon" src="<?php echo findAttribute($value['home'], 'picture', 'teams'); ?>">
                                <?php echo getResult($value); ?>
                                <img class="icon awayIcon" src="<?php echo findAttribute($value['away'], 'picture', 'teams'); ?>">
                            </span>
                            <span class="col-5 awayName">
                                <?php echo findAttribute($value['away'], 'name', 'teams'); ?>
                                <img class="accordionIcon" id="accordionIcon<?php echo $field ?>" src="../img/baseline-keyboard_arrow_down-24px.svg" alt="SVG mit img Tag laden">
                            </span>
                        </td>
                    </tr>
                    <tr class="accordionContent" id="content<?php echo $field ?>">
                        <td colspan="1">
                            <div><?php echo date("d.m.Y", $value['timestamp']) ?></div>
                            <div><?php echo $value['class'] . " " . findAttribute($value['league'], 'name', 'leagues')?></div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php
function getResult($value)
{
    return $value['resultHome'] . ":" . $value['resultAway'];
}

function findAttribute($id, $attribute, $file)
{
    $str = file_get_contents('../data/'.$file.'.json');
    $json = json_decode($str, true);
    foreach ($json as $field => $value) {
        if ((string)$value['id'] == $id) {
            return $value[$attribute];
        }
    }
    return "ERR";
}
?>
<?php include '../partials/header.php'; ?>