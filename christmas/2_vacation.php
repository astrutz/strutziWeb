<p>Damit das Ganze keine Entführung wird, sollte ich mir deine Einwilligung holen. Am Ende macht man Urlaub und du
    wolltest das gar nicht. Schlimmer noch: Wir fahren mit dem Trecker in den Südharz, nur um festzustellen, dass du das
    kacke findest, obwohl du ja alles selbst entscheiden
    <del>musst</del>
    darfst.
</p>
<p>
    Von daher hier die offizielle Frage: Möchtest du mit mir (geschenkten) Urlaub machen?
</p>
<div class="row">
    <div class="col-4"></div>
    <div style="text-align: center" class="col-4">
        <button style="margin-right: 10px" onclick="step_two_three()" type="button" class="btn btn-success">Ja</button>
        <button style="margin-left: 10px" onclick="step_two_twoa()" type="button" class="btn btn-danger">Nein</button>
    </div>
    <div class="col-4"></div>
</div>

<script>
    function step_two_three() {
        $('.presentWrapper').load('christmas/3_type.php');
    }

    function step_two_twoa() {
        $('.presentWrapper').load('christmas/2a_yes.php');
    }
</script>