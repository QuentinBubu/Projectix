let ShownConnexion = document.getElementById("ShownConnexion");
ShownConnexion.addEventListener("click", function() { visibilityBalence("divInscription", "divConnexion") }, false);

let ShownInscription = document.getElementById("ShownInscription");
ShownInscription.addEventListener("click", function() { visibilityBalence("divConnexion", "divInscription") }, false);

function visibilityBalence(id, id2) {
    let div1 = document.getElementById(id);
    let div2 = document.getElementById(id2);
    div1.style.display = "none";
    div2.style.display = "block";
}