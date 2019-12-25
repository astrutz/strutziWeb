<p>Super, richtige Entscheidung! Dann können wir ja starten.</p>
<p>Als Erstes darfst du bestimmen was wir eigentlich machen. Bisher waren wir entweder am Meer (Pula, Malle und Korfu)
    oder hatten eine Städtetrip (London, Berlin, Pitesti) gemacht. Wir können aber genausogut auch ab in die Natur
    (Wandern diesdas) oder einen Wellnessurlaub machen, bzw. versuchen. Einfach anhaken worauf du Lust hast.</p>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text" style="width: 680px">
            <input id="Meer" style="margin-right: 20px" type="checkbox" aria-label="Checkbox for following text input">
            Ab ans Meer! Schwimmen, durchs Wasser latschen und im Restaurant an Fisch zuppeln.
        </div>
    </div>
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text" style="width: 680px">
            <input id="Natur" style="margin-right: 20px" type="checkbox" aria-label="Checkbox for following text input">
            Ab in die Natur! Wandern, Spazieren und guck mal die Landschaft!!
        </div>
    </div>
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text" style="width: 680px">
            <input id="Stadt" style="margin-right: 20px" type="checkbox" aria-label="Checkbox for following text input">
            Ab in die Stadt! Sightseeing, volle U-Bahnen nutzen und hippe Kneipen besuchen.
        </div>
    </div>
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text" style="width: 680px">
            <input id="Wellness" style="margin-right: 20px" type="checkbox"
                   aria-label="Checkbox for following text input">
            Ab ins Wellness! Gesichtsmaske, (professionelle) Massage und Sauna
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-4"></div>
    <div style="text-align: center" class="col-4">
        <button style="margin-right: 10px" onclick="step_three_two()" type="button" class="btn btn-primary">Zurück
        </button>
        <button style="margin-left: 10px" onclick="step_three_four()" type="button" class="btn btn-success">Weiter
        </button>
    </div>
    <div class="col-4"></div>
</div>

<script>
    if (filter['type'] !== undefined)
        filter['type'].forEach(checkCheckbox);

    function checkCheckbox(item, index) {
        $('#' + item).prop('checked', true);
    }

    function step_three_two() {
        setTypeFilter();
        $('.presentWrapper').load('christmas/2_vacation.php');
    }

    function step_three_four() {
        setTypeFilter();
        $('.presentWrapper').load('christmas/4_region.php');
    }

    function setTypeFilter() {
        filter['type'] = [];
        if ($('#Meer').prop('checked')) {
            filter['type'].push("Meer");
        }
        if ($('#Stadt').prop('checked')) {
            filter['type'].push("Stadt");
        }
        if ($('#Wellness').prop('checked')) {
            filter['type'].push("Wellness");
        }
        if ($('#Natur').prop('checked')) {
            filter['type'].push("Natur");
        }
    }
</script>