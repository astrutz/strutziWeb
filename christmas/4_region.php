<p>
    Nun gilt es den Ort herauszufinden. Generell dreht es sich um Deutschland und einige Länder drumherum. Die meisten
    Unterkünfte sind in Deutschland, daher sind unten die Bundesländer aufgelistet.
</p>
<p>
    Hier kannst du jedes (Bundes-)land
    anhaken, das für dich in Frage käme. Alternativ kannst du auch direkt alle Felder ankreuzen, wenn du kein "No
    Go"-Land hast. Hier werden nur die Länder angezeigt, die Hotels mit dem eben ausgewählten Typ enthalten. Wenn du
    also z.B. nur "Meer" vorhin ausgewählt hast, wirst du keine Hotels aus Österreich sehen, ist ja logisch.
</p>
<div style="text-align: center">
    <button class="btn btn-secondary" onclick="checkAll();">Alle auswählen</button>
</div>
<br>
<div id="countryEndPoint" class="row">
    <div class="col-4"></div>
    <div style="text-align: center" class="col-4">
        <button style="margin-right: 10px" onclick="step_four_three()" type="button" class="btn btn-primary">Zurück
        </button>
        <button style="margin-left: 10px" onclick="step_four_five()" type="button" class="btn btn-success">Weiter
        </button>
    </div>
    <div class="col-4"></div>
</div>
<script>
    //Init possible countries
    $.getJSON("data/hotels.json", function (json) {
        let possibleCountries = [];
        for (let i in json) {
            for (let j in filter['type']) {
                if (json[i]['attributes'].includes(filter['type'][j]) && !possibleCountries.includes(json[i]['location']['region'])) {
                    possibleCountries.push(json[i]['location']['region']);
                }
            }
        }
        for (let i in possibleCountries) {
            $('<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<div class="input-group-text" style="width: 250px">' +
                '<input id=' + possibleCountries[i] + ' style="margin-right: 20px" type="checkbox" aria-label="Checkbox for following text input">' +
                possibleCountries[i] +
                '</div>' +
                '</div>' +
                '</div>' +
                '<br>').insertBefore('#countryEndPoint');
        }
        if (filter['countries'] !== undefined)
            filter['countries'].forEach(checkCheckbox);
    });


    function checkCheckbox(item, index) {
        $('#' + item).prop('checked', true);
    }

    function checkAll() {
        for (let i in countries) {
            $('#' + countries[i]).prop('checked', true);
        }
    }

    function step_four_five() {
        setCountryFilter();
        $('.presentWrapper').load('christmas/5_transport.php');
    }

    function step_four_three() {
        setCountryFilter();
        $('.presentWrapper').load('christmas/3_type.php');
    }

    function setCountryFilter() {
        filter['countries'] = [];
        for (let i in countries) {
            if ($('#' + countries[i]).prop('checked')) {
                filter['countries'].push(countries[i]);
            }
        }
    }
</script>
