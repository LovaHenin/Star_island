//var Affiche = document.getElementById("compte");
var jour = document.getElementById("jour");
var heure = document.getElementById("heure");
var min = document.getElementById("min");
var seconde = document.getElementById("sec");
function Rebour() {
    var date1 = new Date();
    var date2 = new Date("Jun 31, 2023 00:00:00");
    var sec = (date2 - date1) / 1000;
    var n = 24 * 3600;
    if (sec > 0) {
        j = Math.floor(sec / n);
        h = Math.floor((sec - (j * n)) / 3600);
        mn = Math.floor((sec - ((j * n + h * 3600))) / 60);

        sec = Math.floor(sec - ((j * n + h * 3600 + mn * 60)));

        jour.innerHTML = "" + j + " j " ;
        heure.innerHTML="" + h + " h ";
        min.innerHTML="" + mn + " min ";
        seconde.innerHTML="" + sec + " s ";

        window.status = "Temps restant : " + j + " j " + h + " h " + mn + " min " + sec + " s ";
    }
    tRebour = setTimeout("Rebour();", 1000);
}
Rebour();