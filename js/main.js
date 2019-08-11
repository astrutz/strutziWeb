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

function sortBy() {
    window.open("http://localhost:63342/page/referee.php?sort=" + $('#sorter').val(),"_self");
}