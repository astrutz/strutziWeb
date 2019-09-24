<?php include '../partials/header.php'; ?>

<?php
$travels = json_decode(file_get_contents('../data/travel.json'), true);
$times = [];
?>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
            integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
            crossorigin=""></script>

    <h1 class="custom-headline">Reisen</h1>

    <p>Ich würde jetzt nicht hergehen und behaupten, dass ich so unglaublich viel reise und die Welt entdecke oder
        ähnliches, wie das manche Influencer und Instagramproleten gern behaupten. Allerdings bin ich öfter mal
        unterwegs. Da bietet sich ja die Möglichkeit das Ganze mit ner netten Karte hübsch aufzumachen. </p>
    <h2 class="custom-headline">Übersicht</h2>
    <div id="mapid"></div>
    <h2 >Timeline</h2>
    <ul class="timeline">
        <?php foreach ($travels as $field => $travel) { ?>
            <li <?php if (($field + 1) % 2 == 0) echo "class= \"timeline-inverted\""; ?>>
                <div class="timeline-badge"><img
                            src="../img/country/<?php echo $travel['destination']['countryISO'] ?>.png"
                            alt="<?php echo $travel['destination']['country'] ?>" height="50px"
                            width="50px"/></div>
                <div class="timeline-panel">
                    <div class="timeline-heading"><img src="../img/transport/<?php echo $travel['transport'] ?>.svg"
                                                       height="25px"
                                                       width="25px" style=float:right>

                        <h4 class="timeline-title"><?php echo $travel['destination']['city'] . ", " . $travel['destination']['country'] ?></h4>
                        <!-- Icons from https://www.iconfinder.com/iconsets/world-flag-icons -->

                        <p>
                            <small class="text-muted"><i
                                        class="glyphicon glyphicon-time"></i> <?php setlocale(LC_ALL, 'de_DE.utf8'); array_push($times, strftime("%B %Y", $travel['endDate']));
                                echo $times[$field]; ?>
                            </small>
                        </p>
                    </div>
                    <div class="timeline-body">
                        <p><?php echo $travel['description'] ?></p>
                    </div>
                </div>
            </li>

        <?php } ?>
    </ul>

<script>
    renderMap(<?php echo json_encode($travels) ?>, <?php echo json_encode($times) ?>);
</script>

<?php include '../partials/footer.php'; ?>