var Affiche=document.getElementById("timer");
 function Rebour() {
 var date1 = new Date();
 var date2 = new Date ("Jun 25, 2023 00:00:00");
 var sec = (date2 - date1) / 1000;
 var n = 24 * 3600;
 if (sec > 0) {
 j = Math.floor (sec / n);
 h = Math.floor ((sec - (j * n)) / 3600);
 mn = Math.floor ((sec - ((j * n + h * 3600))) / 60);
 sec = Math.floor (sec - ((j * n + h * 3600 + mn * 60)));
 Affiche.innerHTML = "" + j +" j "+ h +" h "+ mn +" min "+ sec + " s";
 window.status = "Temps restant : " + j +" j "+ h +" h "+ mn +" min "+ sec + " s ";
 }
 tRebour=setTimeout ("Rebour();", 1000);
 }
 Rebour();