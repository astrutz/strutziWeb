<p>
    Du hast es geschafft! Unten siehst du nochmal dein ausgewähltes Hotel. Wenn das alles für dich so passt, kannst du
    deine Auswahl bestätigen und deinen Urlaub abschicken. Alternativ kannst du auch nochmal von vorne starten.
</p>
<p id="confirmContent">

</p>
<br>
<div class="row">
    <div class="col-4"></div>
    <div style="text-align: center" class="col-4">
        <button style="margin-right: 10px" onclick="step_eight_one()" type="button" class="btn btn-primary">Neustart
        </button>
        <button style="margin-left: 10px" onclick="send(filter)" type="button" class="btn btn-success">Absenden
        </button>
    </div>
    <div class="col-4"></div>
</div>
<br>
<script>
    $.getJSON("data/hotels.json", function (json) {
        for (let i in json) {
            if (json[i]['name'] === filter['choice']) {
                console.log(json[i]);
                let hotelString = "";
                hotelString = hotelString + '<div style="margin-bottom: 15px; background-color: lightgray; overflow: hidden;" class="row"><div style="padding-left: 0" class="col-2"><img style="height: 128px; width: 128px" src="' + json[i]['image'] + '"></div><div class="col-7"> ';

                hotelString = hotelString + '<b>' + json[i]['name'] + '</b><br/>' + json[i]['location']['city'] + ', ' + json[i]['location']['region'] + '<br/>';
                if (json[i]['hostel']) {
                    hotelString = hotelString + json[i]['stars'] + ' Sterne Hostel - ';
                } else {
                    hotelString = hotelString + json[i]['stars'] + ' Sterne Hotel - ';
                }
                hotelString = hotelString + json[i]['location']['distance'] + 'km entfernt';

                hotelString = hotelString + '<br/>Mit ' + json[i]['rating'] + ' von 5 Sternen bewertet';

                hotelString = hotelString + '<br/>Eigenschaften: ' + json[i]['attributes'].join(', ');

                hotelString = hotelString + '</div><div class="col-3"><br/><a style="margin-right: 20px" target="_blank" href="' + json[i]['url'] + '" class="btn btn-secondary">Mehr Informationen</a></div></div>';

                $(hotelString).insertAfter('#confirmContent');

            }
        }
    });

    function step_eight_one() {
        $('.presentWrapper').load('christmas/1_introduction.php');
    }

    function send(hotel) {
        $.getJSON("data/hotels.json", function (json) {
            for (let i in json) {
                if (json[i]['name'] === hotel['choice']) {
                    <?php mail('werist@strutzi.de', 'Urlaubsauswahl getroffen!', "Erledigt!"); ?>
                    $('.presentWrapper').load('christmas/9_finish.php');
                }
            }
        });
    }
</script>