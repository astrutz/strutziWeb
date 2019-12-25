<p>
    Zuletzt darfst du etwas nebensächliches auswählen: Den Transport. Es kann gut sein, dass es dir relativ egal ist, in
    dem Fall wähl einfach alles aus.
</p>
<p>
    Wie vorhin werden nur Verkehrsmittel angezeigt, die zu deiner Auswahl passen. Hast du z.B. als Land nur Hessen
    ausgewählt, wird dir das Flugzeug als Transportmittel nicht angezeigt. Die Seite übernimmt das Denken, du musst nur
    entscheiden :)
</p>
<br>
<div id="transportEntryPoint" class="row">
    <div class="col-4"></div>
    <div style="text-align: center" class="col-4">
        <button style="margin-right: 10px" onclick="step_five_four()" type="button" class="btn btn-primary">Zurück
        </button>
        <button style="margin-left: 10px" onclick="step_five_six()" type="button" class="btn btn-success">Weiter
        </button>
    </div>
    <div class="col-4"></div>
</div>

<script>
    $.getJSON("data/hotels.json", function (json) {
        let possibleTransport = [];
        for (let i in json) {
            for (let j in filter['type']) {
                if (json[i]['attributes'].includes(filter['type'][j]) && filter['countries'].includes(json[i]['location']['region'])) {
                    for (let k in json[i]['transport']) {
                        if (!possibleTransport.includes(json[i]['transport'][k])) {
                            possibleTransport.push(json[i]['transport'][k]);
                        }
                    }
                }
            }
        }
        for (let i in possibleTransport) {
            $('<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<div class="input-group-text" style="width: 100px">' +
                '<input id=' + possibleTransport[i] + ' style="margin-right: 20px" type="checkbox" aria-label="Checkbox for following text input">' +
                possibleTransport[i] +
                '</div>' +
                '</div>' +
                '</div>' +
                '<br>').insertBefore('#transportEntryPoint');
        }
        if (filter['transport'] !== undefined)
            filter['transport'].forEach(checkCheckbox);
    });

    function checkCheckbox(item, index) {
        $('#' + item).prop('checked', true);
    }

    function step_five_six() {
        setTransportFilter()
        $('.presentWrapper').load('christmas/6_confirm.php');
    }

    function step_five_four() {
        setTransportFilter()
        $('.presentWrapper').load('christmas/4_region.php');
    }

    function setTransportFilter() {
        filter['transport'] = [];
        if ($('#Flug').prop('checked')) {
            filter['transport'].push("Flug");
        }
        if ($('#Zug').prop('checked')) {
            filter['transport'].push("Zug");
        }
        if ($('#Auto').prop('checked')) {
            filter['transport'].push("Auto");
        }
    }
</script>
