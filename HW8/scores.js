function playAgain() {
    window.location.href = "welcome.php";
}

let timeoutID = null;
update();

function update() {
    $.ajax( {
        method: "GET",
        cache: false,
        url: 'scores.txt',
        success: function(data) {

            const scoresPara = document.getElementById('scores');
            scoresPara.innerHTML = data.split("\n").join("<br>");
        }
    })
    timeoutID = setTimeout(update, 10000);
}

function stop_update() {
    clearTimeout(timeoutID);
}

function force_update() {
    stop_update();
    update();
}