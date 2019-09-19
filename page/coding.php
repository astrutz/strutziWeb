<?php include '../partials/header.php'; ?>

    <h1 class="custom-headline">Coding</h1>

    <p>Nicht nur in meinem Studium und meinem Beruf programmiere ich gerne. Am liebsten "baue" ich Software von 0 an,
        wie man an der Website hier sieht mag ich Backend, tolle Datenverwaltungen und algorithmisches Hexhex; weniger
        aber Pixelschubsen, Design und Frontend. Aber Bootstrap hält den Laden hier glücklicherweise gut zusammen.
    </p>

    <h2 class="custom-headline">Skills</h2>

    <p>Das soll hier keine verlogene Xing-Auflistung von Technologien werden. Mehr will ich ein wenig sammeln was ich
        kann (und konnte).</p>

    <div class="card" style="width: 32rem">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Java</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png"><img
                                src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Gradle</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Maven</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png"><img
                                src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Android</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png"><img
                                src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">C</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">OpenGL</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">HTML/CSS/Javascript</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png"><img
                                src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">CMS (Wordpress, FirstSpirit)</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png"><img
                                src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Versionierung</div>
                    <div class="col-6">
                        <img src="../img/icons8-stern-24.png"><img src="../img/icons8-stern-24.png"><img
                                src="../img/icons8-stern-24.png">
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <h2 class="custom-headline">Projekte</h2>
    <p>Hier möchte ich meine Projekte ein wenig auflisten. Wenn möglich, versuche ich hier auch Livedemos zu zeigen oder
        auf Git-Repositories zu verweisen. Für spannende Projekte bin ich immer zu begeistern, insbeonders in den obigen
        Technologien, nutze dazu am besten das <a href="../page/kontakt">Kontaktformular</a>.</p>

    <h4 class="custom-headline"><i>Filmfix</i> - Filmvorschläge von einer künstlichen Intelligenz</h4>
    <div class="row">
        <div class="col-8">
            <p>Das Projekt Flimfix entstand im Rahmen des verkorksten Moduls <a
                        href="https://www.medieninformatik.th-koeln.de/study/bachelor/moduls/ba_vertiefung-web_development/">Web
                    Development</a> im vierten Semester. Leider ist das Projekt nie ganz fertig geworden und liegt auch
                nicht mehr auf meinem heroku Dashboard. Für ein Backend ist es nicht wirklich vorzeigbar.</p>
            <p>Prinzipiell hat man sich als Nutzer Filme ausgesucht, die man gerne sieht. Das wurde vom Backend
                gespeichert und anhand von Schlagworten zum Film (aus der API) mit anderen Filmen abgeglichen. Die neuen
                Filme werden dem Nutzer vorgeschlagen und wiederum bewertet. So verbessern sich die Vorschläge in der
                Theorie. Prinzipiell klappte das für 2 - 3 Iterationen gut, danach ging gar nichts mehr, leider.</p>
        </div>
        <div class="col-4">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th colspan="2">Projektinfos</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Zeit</td>
                    <td>Oktober 2017 - Januar 2018</td>
                </tr>
                <tr>
                    <td>Sprache</td>
                    <td>Node.js</td>
                </tr>
                <tr>
                    <td>Repository</td>
                    <td><a href="https://github.com/astrutz/WBA2SS17NeumannStrutzVoell">WBA2SS17NeumannStrutzVoell</a>
                    </td>
                </tr>
                <tr>
                    <td>APIs</td>
                    <td><a href="https://developers.themoviedb.org">The Movie DB API</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h4 class="custom-headline"><i>Lighting Up Dennis</i> - Automatische Regulierung der Bildschirmhelligkeit anhand des
        Wetters</h4>
    <div class="row">
        <div class="col-8">
            <p>Mein erstes größeres Projekt startete als Füller für einen langweiligen Nachmittag im Herbst. Dennis
                hatte das Problem, dass er bei längeren Zock-Tagen seine Bildschirmhelligkeit mehrmals händisch ändern
                und dazu das Spiel unterbrechen musste. Lighting Up Dennis soll da Abhilfe verschaffen.</p>
            <img class="float-left coding-left" src="../img/lud.PNG" alt="Screenshot of Lighting up Dennis">
            <p>Dazu gibt es einen Java Client, der sich alle 15 Minuten die aktuellen Wetterinformationen holt
                und
                anhand dieser entscheidet, wie hell der Bildschirm (in Prozent) sein soll. Hinzu kommt ein
                kleines
                Swing-Frontend, welches entsprechende Werte anzeigt. Auch erstmalig kann man das Ganze mit einem
                Setup
                installieren. Angesprochen wird das Display über ein CMD-Tool der PC Welt (ja, wirklich), dass
                die
                Bildschirmhelligkeit von externen Monitoren ansprechen kann.</p>
        </div>
        <div class="col-4">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th colspan="2">Projektinfos</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Zeit</td>
                    <td>März 2018</td>
                </tr>
                <tr>
                    <td>Sprache</td>
                    <td>Java, Swing, C++</td>
                </tr>
                <tr>
                    <td>Repository</td>
                    <td><a href="https://github.com/astrutz/LightingUpDennis">Lighting Up Dennis</a></td>
                </tr>
                <tr>
                    <td>APIs</td>
                    <td><a href="https://openweathermap.org/api">Open Weather Map API</a></td>
                </tr>
                <tr>
                    <td>Download</td>
                    <td><a class="btn btn-dark" type="download" href="../data/Lighting%20Up%20Dennis.rar">Lighting Up
                            Dennis.rar</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h4 class="custom-headline"><i>CologneCoins</i> - Sehenswürdigkeiten in Köln entdecken und Treuepunkte sammeln</h4>
    <p>To be filled soon</p>

    <h4 class="custom-headline"><i>Regiofood</i> - Lebensmittellisten und regionale Einkäufe durch künstliche
        Intelligenz</h4>
    <p>To be filled soon</p>

    <h4 class="custom-headline"><i>Catfinder</i> - App zur Speicherung des Standortes der Katze</h4>
    <p>To be filled soon</p>

    <h4 class="custom-headline"><i>Bachelorarbeit</i> - Synchronisierung von analogen und digitalen Scrumboards</h4>
    <p>To be filled soon</p>

    <h4 class="custom-headline"><i>strutziWeb</i> - Eigenes Website mit dynamischem Content und eigenem Editor</h4>
    <p>To be filled soon</p>

    <h4 class="custom-headline"><i>Was letzte Preis?</i> - Ebay-Simulator</h4>
    <p>To be filled soon</p>

<?php include '../partials/footer.php'; ?>