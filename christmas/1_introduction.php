<?php ?>

<div class="presentWrapper">
    <h2 style="text-align: center" class="custom-headline">Let's go!</h2>
    <p>Hast du zu Weihnachten schonmal einen Link bekommen? Ich denke mal nicht und ich hab bisher auch noch keine
        Website verschenkt. Im Endeffekt ist es das auch gar nicht, die Website ist eine gute Möglichkeit das
        Verpacken
        mit Geschenkpapier zu vermeiden.</p>
    <p>Denn du bekommst von mir einen Kurzurlaub zu zweit für drei Tage von Animod (ist so ein Online-Reisebüro)
        geschenkt. Jetzt könnte ich dir einfach einen
        Gutschein in die Hand drücken und sagen: "So, wo gehts hin?". Wir wissen aber beide, dass es ziemlich tricky
        ist
        allein einen Kurzurlaub zu planen und nicht mehr viel mit einem Geschenk zu tun hat. Daher habe ich
        folgendes
        Tool entwickelt:</p>
    <p><b>Der Urlaubomat™</b><br/>Er ist DAS Tool um deinen Urlaub zu planen. Du sagst wo du hin willst und der
        Urlaubomat™ ermittelt dir automatisch dein Weihnachtsgeschenk und deinen Urlaub. Klicke einfach auf den
        Button
        unten und du wirst von selbst verstehen.</p>
    <p>Viel Spaß damit!</p>
    <p>P.S: Würdige bitte diesen Schneeflockeneffekt. Du willst nicht wissen wie lang das gedauert hat. Aber wenn
        ich da
        jetzt so drauf schaue werde ich es wohl doch auf den nächsten Seiten ausblenden. Nervt schon etwas^^</p>
    <div style="text-align: center">
        <button class="btn btn-success" onclick="step_one_two();">Starten</button>
    </div>
</div>

<script src="../js/jquery.flurry.js"></script>
<script>
    filter = {};
    confirmContent = "";

    $('.presentWrapper').flurry({
        color: "lightgrey"
    });

    function step_one_two() {
        $('.presentWrapper').load('christmas/2_vacation.php');
    }

</script>