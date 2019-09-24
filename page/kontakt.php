<?php include '../partials/header.php'; ?>

    <h1 class="custom-headline">Kontakt</h1>
    <p>Du willst mit mir Kontakt aufnehmen? Finde ich suspekt, aber ok.</p>

    <form action="kontaktSuccess.php" method="post">
        <div class="form-group">
            <label for="exampleInputText">Name</label>
            <input type="text" class="form-control" id="exampleInputText" placeholder="Name eingeben..">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail">E-Mail Adresse</label>
            <input name="mail" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Mailadresse eingeben..">
            <small id="emailHelp" class="form-text text-muted">Ich werde deine E-Mail Adresse keinem weiterleiten.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputText">Text</label>
            <textarea name="text" class="form-control" id="exampleInputText" placeholder="Schreib mir etwas.." rows="10"></textarea>
        </div>
        <input style="display: none;" id="inputToken" class="form-control" name="gameToken">
        <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <script src="https://www.google.com/recaptcha/api.js?render=6Ld-vLgUAAAAAPdyWpf066E9_X-oohEUrzlAYwGe"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Ld-vLgUAAAAAPdyWpf066E9_X-oohEUrzlAYwGe', {action: 'homepage'}).then(function(token) {
                $('#inputToken').val(token);
            });
        });
    </script>

<?php include '../partials/footer.php'; ?>