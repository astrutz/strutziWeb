<?php include '../partials/header.php'; ?>

    <h1 class="custom-headline">Über mich</h1>
    <div class="media">
        <img src="../img/alexander-strutz-foto.128x128.jpg" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="mt-0">Hello World!</h5>
            Ich bin Alex, komme aus der oberbergischen Provinz und interessiere mich für all die tollen Themen im Menü.
            Außerdem hab ich eine Katze, was schon Grund genug ist hier zu bleiben. Auf dieser Seite veröffentliche ich
            unregelmäßig kleine Backend-Spielereien und ein bisschen Web-Training.
        </div>
    </div>
    <h2 class="custom-headline">Mensch</h2>
    <dl class="row">
        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9">Alexander Strutz</dd>
        <dt class="col-sm-3">Alter</dt>
        <dd class="col-sm-9">
            <?php echo getYearsFrom("1997-05-30 00:00:00") ?> Jahre
        </dd>
        <dt class="col-sm-3">Herkunft</dt>
        <dd class="col-sm-9">
            Irgendwas zwischen Oberberg und Pitești
        </dd>
        <dt class="col-sm-3">Studium</dt>
        <dd class="col-sm-9">Medieninformatik bei <a target="_blank"
                                                     href="https://www.th-koeln.de/studium/medieninformatik-bachelor_2379.php"
                                                     class="badge badge-danger">TH Köln</a></dd>
        <dt class="col-sm-3 text-truncate">Job</dt>
        <dd class="col-sm-9">Web Developer bei <a target="_blank" class="badge badge-warning"
                                                  href="https://www.kernpunkt.de">kernpunkt</a></dd>
    </dl>
    <h2 class="custom-headline">Katze</h2>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php if ($handle = opendir('../img/cat')) {
                $first = "active";
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != "..") {

                        echo '<div class="carousel-item ' . $first . '">
                <img src="../img/cat/' . $entry . '" class="d-block w-100" alt="...">
            </div>';
                        $first = "";
                    }
                }

                closedir($handle);
            } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <h2 class="custom-headline">Ey Schiri!</h2>
    <p>Seit <?php echo getYearsFrom("2012-09-01 00:00:00") ?> Jahren bin ich nun Schiedsrichter und kann mittlerweile
        auf <?php echo getGameCount() ?>
        Spiele zurückblicken. Da das <a
                target="_blank"
                href="https://portal.dfbnet.org/de/startseite.html"
                class="badge badge-success">DFB-Net</a> sich davor scheut seine Daten nach außen hin öffentlich zu
        halten (es sei denn man hat millionenschwere Verträge), habe ich <a href="overview">hier</a> mein eigenes
        Datatool gebaut.</p>
    <h2 class="custom-headline">Darts</h2>
    <p>Noch länger als Schiri bin ich besessen von Darts. Mit 9 Jahren hab ich angefangen und konnte in den letzten
        Jahren einige kleinere Titel holen und bei Turnieren teilweise sogar um Preisgeld mitmischen. In folgenden
        Turnieren konnte ich mich als Sieger durchsetzen:</p>
    <ul>
        <li>Gummersbacher Vereinsmasters 2017</li>
        <li>Berghausener Meisterschaften 2018</li>
        <li>Oberberger 4 Clubs Cup 2018</li>
    </ul>
    <p>Sämtliche Turniere und Ergebnisse findest Du <a href="darts">hier</a>.</p>
    <h2 class="custom-headline">Coding</h2>
    <p>Wie man es schon an dieser Seite sieht, bin ich ein Fan von Programmierung und Informatik, auch außerhalb von Job und Studium. Dabei sind Projekte in den verschiedensten Sprachen und Gebieten entstanden, über die ich <a href="coding">hier</a> berichten will, vielleicht folgen auch Demos. Mal sehen was da so geht.</p>
<?php
function getYearsFrom($startDate)
{
    $date = new DateTime($startDate);
    return $date->diff(new DateTime())->format("%y");
}

function getGameCount()
{
    return sizeof(json_decode(file_get_contents('../data/games.json'), true));
}

?>

<?php include '../partials/footer.php'; ?>