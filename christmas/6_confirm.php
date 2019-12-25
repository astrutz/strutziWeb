<p>
    So, das wars auch schon! Unten siehst du noch einmal deine getroffene Auswahl. Wenn du etwas ändern oder rückgängig
    machen möchtest, kannst du zurück gehen und deine Änderungen tätigen. Ansonsten kannst du dir dein Ergebnis anzeigen
    lassen.
</p>
<p id="confirmContent">
    
</p>
<br>
<div class="row">
    <div class="col-4"></div>
    <div style="text-align: center" class="col-4">
        <button style="margin-right: 10px" onclick="step_six_five()" type="button" class="btn btn-primary">Zurück
        </button>
        <button style="margin-left: 10px" onclick="step_six_seven()" type="button" class="btn btn-success">Weiter
        </button>
    </div>
    <div class="col-4"></div>
</div>
<br>
<script>
    confirmContent = "";
    confirmContent = confirmContent + "Urlaubsart";
    if (filter['type'].length > 1) {
        confirmContent = confirmContent + "en"
    }
    confirmContent = confirmContent + ": " + filter['type'].join(", ") + '<br>';

    confirmContent = confirmContent + "Urlaubsort";
    if (filter['countries'].length > 1) {
        confirmContent = confirmContent + "e"
    }
    confirmContent = confirmContent + ": " + filter['countries'].join(", ") + '<br>';

    confirmContent = confirmContent + "Transportmittel";
    confirmContent = confirmContent + ": " + filter['transport'].join(", ") + '<br>';

    $('#confirmContent').html(confirmContent);

    function step_six_five() {
        $('.presentWrapper').load('christmas/5_transport.php');
    }

    function step_six_seven() {
        $('.presentWrapper').load('christmas/7_result.php');
    }
</script>
