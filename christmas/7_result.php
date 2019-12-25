<p>Fertig! Unten findest du die Empfehlungen des Urlaubomaten mit einem Foto und Google Rezensionen (ja, die
    echten!).</p>
<p>Wenn dir ein Hotel gefällt, kannst du es direkt bestätigen, dir alle Hotels auf einer Karte
    ansehen oder von neu
    starten.</p>
<br>
<div id="resultEntryPoint" class="row" style="margin-bottom: 20px">
    <div class="col-4"></div>
    <div style="text-align: center" class="col-4">
        <button style="margin-right: 10px" onclick="step_seven_one()" type="button" class="btn btn-primary">Nochmal!
        </button>
        <button style="margin-left: 10px" onclick="step_seven_sevena()" type="button" class="btn btn-info">Karte
            ansehen
        </button>
    </div>
    <div class="col-4"></div>
</div>
<script>
    $.getJSON("data/hotels.json", function (json) {
        let result = json.filter(hotel => hasCommonElement(hotel['attributes'], filter['type'])).filter(hotel => hasCommonElement(hotel['transport'], filter['transport'])).filter(hotel => filter['countries'].includes(hotel['location']['region']));
        renderResults(result);
    });

    function step_seven_one() {
        $('.presentWrapper').load('christmas/1_introduction.php');
    }

    function step_seven_sevena() {
        $('.presentWrapper').load('christmas/7a_map.php');
    }

    function hasCommonElement(arr1, arr2) {
        let bExists = false;
        $.each(arr2, function (index, value) {

            if ($.inArray(value, arr1) != -1) {
                bExists = true;
            }

            if (bExists) {
                return false;  //break
            }
        });
        return bExists;
    }

    function renderResults(result) {
        let resultString = "";
        if (result.length < 1) {
            resultString = '<div class="alert alert-danger" role="alert">Oh Nein! Leider hat der Urlaubomat keine passende Unterkunft gefunden. Lockere deine Anforderungen und versuche es erneut!</div>';
        } else {
            for (let i in result) {
                resultString = resultString + '<div style="margin-bottom: 15px; background-color: lightgray; overflow: hidden;" class="row"><div style="padding-left: 0" class="col-2"><img style="height: 128px; width: 128px" src="'+result[i]['image']+'"></div><div class="col-6"> ';

                resultString = resultString + '<b>' + result[i]['name'] + '</b><br/>' + result[i]['location']['city'] + ', ' + result[i]['location']['region'] + '<br/>';
                if(result[i]['hostel']){
                    resultString = resultString + result[i]['stars'] +  ' Sterne Hostel - ';
                } else {
                    resultString = resultString + result[i]['stars'] + ' Sterne Hotel - ';
                }
                resultString = resultString + result[i]['location']['distance'] + 'km entfernt';

                resultString = resultString + '<br/>Mit ' + result[i]['rating'] + ' von 5 Sternen bewertet';

                resultString = resultString + '<br/>Eigenschaften: ' + result[i]['attributes'].join(', ');

                resultString = resultString + '</div><div class="col-4"><br/><a style="margin-right: 20px" target="_blank" href="'+result[i]['url']+'" class="btn btn-secondary">Mehr Informationen</a><button class="btn btn-success" onclick="step_seven_eight(\''+result[i]['name']+'\')">Bestätigen</button></div></div>';
            }
        }
        $(resultString).insertAfter('#resultEntryPoint');
    }

    function step_seven_eight(result) {
        filter['choice'] = result;
        $('.presentWrapper').load('christmas/8_send.php');
    }

</script>