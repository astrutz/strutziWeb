<?php include '../partials/header.php'; ?>

<?php
$projects = json_decode(file_get_contents('../data/coding.json'), true);
$skills = json_decode(file_get_contents('../data/skills.json'), true);
?>

    <h1 class="custom-headline">Coding</h1>

    <p>Nicht nur in meinem Studium und meinem Beruf programmiere ich gerne. Am liebsten "baue" ich Software von 0 an,
        wie man an der Website hier sieht mag ich Backend, tolle Datenverwaltungen und algorithmisches Hexhex; weniger
        aber Pixelschubsen, Design und Frontend. Aber Bootstrap hält den Laden hier glücklicherweise gut zusammen.
    </p>

    <h2 class="custom-headline">Meine Skills</h2>

    <p>Das soll hier keine verlogene Xing-Auflistung von Technologien werden. Mehr will ich ein wenig sammeln was ich
        kann (und konnte).</p>

    <div class="card" style="width: 32rem">
        <ul class="list-group list-group-flush">
            <?php foreach ($skills as $field => $skill) { ?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-6"><?php echo $skill['name']; ?></div>
                        <div class="col-6">
                            <?php for ($i = 1; $i <= $skill['level']; $i++) { ?><img src="../img/icons8-stern-24.png"><?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <h2 class="custom-headline">Bisherige Projekte</h2>
    <p>Hier möchte ich meine Projekte ein wenig auflisten. Wenn möglich, versuche ich hier auch Livedemos zu zeigen oder
        auf Git-Repositories zu verweisen. Für spannende Projekte bin ich immer zu begeistern, insbeonders in den obigen
        Technologien, nutze dazu am besten das <a href="../page/kontakt">Kontaktformular</a>.</p>

<?php foreach ($projects as $field => $project) { ?>

    <h4 class="custom-headline"><i><?php echo $project['title'] ?></i> - <?php echo $project['subtitle'] ?></h4>
    <div class="row">
        <div class="col-8">
            <?php if ($project['image'] != "") { ?><img class="float-left coding-left"
                                                        src="<?php echo $project['image'] ?>"><?php } ?>
            <?php foreach ($project['descriptions'] as $descField => $desc) { ?>
                <p><?php echo $desc; ?></p>
            <?php } ?>
        </div>
        <div class="col-4">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th colspan="2">Projektinfos</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($project['projectinfos'] as $infoField => $info) { ?>
                    <tr>
                        <td><?php echo $info['key'] ?></td>
                        <?php if ($info['type'] == "String") { ?>
                            <td><?php echo $info['value'] ?></td>
                        <?php } else if ($info['type'] == "Link") { ?>
                            <td><a href="<?php echo $info['value'] ?>"><?php echo $info['title'] ?></a></td>
                        <?php } else if ($info['type'] == "Download") { ?>
                            <td><a class="btn btn-dark" type="download"
                                   href="<?php echo $info['value'] ?>"><?php echo $info['title'] ?></a></td>
                        <?php } else { ?>
                            <!-- Multiple Links -->
                            <td>
                                <?php foreach ($info['links'] as $linksField => $link) { ?>
                                    <a href="<?php echo $link['value'] ?>"><?php echo $link['title'] ?></a><br>
                                <?php } ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php } ?>

<?php include '../partials/footer.php'; ?>