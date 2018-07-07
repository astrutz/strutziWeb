<?php include '../partials/header.php'; ?>

    <h1>Where the fuck was Alex Strutz?</h1>

<?php
$str = file_get_contents('../data/locations.json');
$json = json_decode($str, true);

?>

    <!--Accordion wrapper-->
    <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
        <?php foreach ($json as $field => $value) { ?>
            <!-- Accordion card -->
            <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne" aria-expanded="true"
                       aria-controls="collapseOne">
                        <h5 class="mb-0">
                            <?php echo (string)$value['reason']; ?> in<i class="fa fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                     data-parent="#accordionEx">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute,
                        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch
                        3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                        sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                        accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <!-- Accordion card -->
        <?php } ?>

    </div>
    <!--/Accordion wrapper-->


    <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <div style="overflow:hidden;height:400px;width:600px;">
            <div id="map_canvas" style="height:400px;width:600px;">

            </div>
            <a href="http://www.maps-einbinden.de">google maps für webseite</a>
        </div>
        <script type="text/javascript">window.setTimeout("initGmaps();", 300);

        function initGmaps() {
            var myOptions = {
                zoom: 15,
                center: new google.maps.LatLng(52.02067, 8.55000999999993),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(52.02067, 8.55000999999993)});
            infowindow = new google.maps.InfoWindow({content: "<b>Meine Adresse</b><br>Niedermühlenkamp 69<br>Bielefeld"});
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }</script>-->
<?php include '../partials/header.php'; ?>