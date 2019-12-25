<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
      integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
      crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>

<div class="row">
    <div class="col-4"></div>
    <div style="text-align: center" class="col-4">
        <button style="margin-right: 10px" onclick="step_sevena_one()" type="button" class="btn btn-primary">Neustart
        </button>
    </div>
    <div class="col-4"></div>
</div>
<br>

<div id="mapid"></div>

<script>
    $.getJSON("data/hotels.json", function (json) {
        renderMap(json);
    });

    function renderMap(hotels) {
        var mymap = L.map('mapid').setView([49.965, 16.699], 5);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiYXN0cnV0eiIsImEiOiJjazB1ejRpNXAwcjZiM2pwM2FkdjNtZnk3In0.wEKjT3_RlIPQVOuhPu0oSQ'
        }).addTo(mymap);
        for (let i in hotels) {
            let hotel = hotels[i];
            let marker = L.marker([hotel['location']['lat'], hotel['location']['lng']]).addTo(mymap);
            marker.bindPopup("<b>" + hotel['location']['city'] + "</b><br>" + hotel['name'] + "");
        }
    }

    function step_sevena_one() {
        $('.presentWrapper').load('christmas/1_introduction.php');
    }
</script>