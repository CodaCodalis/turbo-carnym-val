 
function inputCheck() {
    var frage = document.getElementById("frage").value;
    var antwort1 = document.getElementById("antwort1").value;
    var antwort2 = document.getElementById("antwort2").value;
    var antwort3 = document.getElementById("antwort3").value;
    var antwort3 = document.getElementById("antwort3").value;
    if (frage == "" || antwort1 == "" || antwort2 == "" || antwort3 == "" || antwort4 == "") {
        alert("Es müsse alle Felder ausgefüllt sein!");
    }
}
