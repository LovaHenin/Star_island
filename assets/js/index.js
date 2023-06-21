/* variables index rond*/
const section1 = document.getElementById("section1");
const button1 = document.getElementById("rond1");
const section2 = document.getElementById("section2");
const button2 = document.getElementById("rond2");
const section3 = document.getElementById("section3");
const button3 = document.getElementById("rond3");


button1.addEventListener("click", function () {

  
    section1.style.opacity = "1";
   
    button1.style.color = "white";
    section3.style.opacity = "0";
    section2.style.opacity = "0";
    button2.style.color = "red";
    button3.style.color = "red";
    

});


button2.addEventListener("click", function () {


    
    section2.style.opacity = "1";
   
    button2.style.color = "white";
    section1.style.opacity = "0";
    section3.style.opacity = "0";
  
    button1.style.color = "red";
    button3.style.color = "red";

});
button3.addEventListener("click", function () {


    
        section3.style.opacity = "1";
       
        button3.style.color = "white";
        section1.style.opacity = "0";
        section2.style.opacity = "0";
        button1.style.color = "red";
        button2.style.color = "red";
    
});

