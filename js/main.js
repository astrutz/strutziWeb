function moveAccordion(element) {
    if ($("#content" + element).is(":visible")) {
        $("#game" + element).css("background-color", "#ffffff");
        $("#content" + element).css("display", "none");
        $("#accordionIcon" + element).attr("src", "../img/baseline-keyboard_arrow_down-24px.svg");
    } else {
        $("#game" + element).css("background-color", "#f5f5f5");
        $("#content" + element).css("display", "block");
        $("#accordionIcon" + element).attr("src", "../img/baseline-keyboard_arrow_up-24px.svg");
    }
}

function sortBy(url) {
    window.open(url + "?sort=" + $('#sorter').val(), "_self");
}

function addGameEventRow(button) {
    let rowId = getRowId(button) + 1;
    $('#teamCol').append('<br><select class="form-control" id="inputTeam' + rowId + '" name="gameEventTeam' + rowId + '"><option id="home">Heim</option><option id="away">Gast</option></select></div>');
    $('#minuteCol').append('<br><input type="number" id="inputMinute' + rowId + '" name="gameEventMinute' + rowId + '" class="form-control" placeholder="Minute..">');
    $('#numberCol').append('<br><input type="number" id="inputNumber' + rowId + '" class="form-control" placeholder="Nummer.." name="gameEventNumber' + rowId + '">');
    $('#eventCol').append('<br><input id="inputEvent' + rowId + '" name="gameEvent' + rowId + '" class="form-control" placeholder="Ereignis..">');
    $('#typeCol').append('<br><input id="inputType' + rowId + '" name="gameEventType' + rowId + '" class="form-control" placeholder="Typ..">');
    $('#addBtnCol').append('<br><button onclick="addGameEventRow(this)" id="addEvent' + rowId + '" type="button" class="btn-info form-control">+</button>');
    $('#deleteBtnCol').append('<br><button onclick="deleteGameEventRow(this)" id="deleteEvent' + rowId + '" type="button" class="btn-danger form-control">-</button>');
}

function deleteGameEventRow(button) {
    let rowId = getRowId(button);
    if (rowId !== 0) {
        $('#inputTeam' + rowId).prev().remove();
        $('#inputTeam' + rowId).remove();
        $('#inputMinute' + rowId).prev().remove();
        $('#inputMinute' + rowId).remove();
        $('#inputNumber' + rowId).prev().remove();
        $('#inputNumber' + rowId).remove();
        $('#inputEvent' + rowId).prev().remove();
        $('#inputEvent' + rowId).remove();
        $('#inputType' + rowId).prev().remove();
        $('#inputType' + rowId).remove();
        $('#addEvent' + rowId).prev().remove();
        $('#addEvent' + rowId).remove();
        $('#deleteEvent' + rowId).prev().remove();
        $('#deleteEvent' + rowId).remove();
    }
}

function getRowId(button) {
    let btnId = $(button).attr('id');
    if (isNaN(btnId.substr(btnId.length - 2, btnId.length))) {
        return Number(btnId.substr(btnId.length - 1, btnId.length));
    } else {
        return Number(btnId.substr(btnId.length - 2, btnId.length));
    }
}

function renderMap(travels, times) {
    var mymap = L.map('mapid').setView([49.965, 16.699], 4);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYXN0cnV0eiIsImEiOiJjazB1ejRpNXAwcjZiM2pwM2FkdjNtZnk3In0.wEKjT3_RlIPQVOuhPu0oSQ'
    }).addTo(mymap);
    for (let i in travels) {
        let travel = travels[i];
        let marker = L.marker([travel['destination']['lat'], travel['destination']['lng']]).addTo(mymap);
        marker.bindPopup("<b>" + travel['destination']['city'] + "</b><br>" + times[i] + "");
    }
    console.log(travels);
}