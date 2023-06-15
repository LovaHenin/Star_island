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


// function changerImage() {

//     var imageEnCours = document.getElementById('reseaux-sociaux').getAttribute('data-image');
  

//     if(imageEnCours == 'discorde'){
//     document.getElementById('discorde').style.opacity = 0;
//     document.getElementById('instagramme').style.opacity = 1;
//     document.getElementById('reseaux-sociaux').setAttribute('data-image', 'instagramme');
//     }else if(imageEnCours == 'instagramme'){
//         document.getElementById('instagramme').style.opacity = 0;
//         document.getElementById('twitch').style.opacity = 1;
//         document.getElementById('reseaux-sociaux').setAttribute('data-image', 'twitch');

//     }else if(imageEnCours == 'twitch'){
//         document.getElementById('twitch').style.opacity = 0;
//         document.getElementById('youtube').style.opacity = 1;
//         document.getElementById('reseaux-sociaux').setAttribute('data-image', 'youtube');

//     }else{
//         document.getElementById('youtube').style.opacity = 0;
//         document.getElementById('discorde').style.opacity = 1;
//         document.getElementById('reseaux-sociaux').setAttribute('data-image', 'discorde');

//     }
//    // console.log(imageEnCours);
//     }

// changerImage();    
// setInterval(changerImage, 3000);
    // setInterval() permet d'éxécuter une fonction fournie en premier argument selon un timer
// fourni en deuxième argument (en milliseconde)

Rebour();