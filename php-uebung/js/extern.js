 
function inputCheck() {
    var frage = document.getElementById("frage").value;
    var antwort1 = document.getElementById("antwort1").value;
    var antwort2 = document.getElementById("antwort2").value;
    var antwort3 = document.getElementById("antwort3").value;
    var antwort4 = document.getElementById("antwort4").value;
    var korrektarray = document.getElementsByName("korrekt");
    var correct = null;
    korrektarray.forEach(element => {
      if(element.checked) {
          correct=element.value;
      } 

    });
    if(correct==null){
        alert("Ein Radiobutton muss ausgewählt werden!");
    }

    if (frage == "" || antwort1 == "" || antwort2 == "" || antwort3 == "" || antwort4 == "") {
        alert("Es müssen alle Felder ausgefüllt sein!");
    }
}




function validateForm() {
    var radios = document.getElementsByName("yesno");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    }

    if (!formValid) alert("Must check some option!");
    return formValid;
}
