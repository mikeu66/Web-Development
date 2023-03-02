var button = document.getElementById("submit");

function validate(event) {
    let myForm = document.querySelector("#mainForm");

    //question one
    var firstTrue = document.getElementById("oneT");
    var firstFalse = document.getElementById("oneF");

    //question two
    var secondTrue = document.getElementById("twoT");
    var secondFalse = document.getElementById("twoF");

    //question three
    var thirdA = document.getElementById("threeA");
    var thirdB = document.getElementById("threeB");
    var thirdC = document.getElementById("threeC");
    var thirdD = document.getElementById("threeD");

    //question four
    var fourthA = document.getElementById("fourA");
    var fourthB = document.getElementById("fourB");
    var fourthC = document.getElementById("fourC");
    var fourthD = document.getElementById("fourD");

    var fifthText = document.getElementById("fiveAnswer");
    var sixthText = document.getElementById("sixAnswer");



    if ((firstTrue.checked || firstFalse.checked) & (secondTrue.checked || secondFalse.checked) & 
        (thirdA.checked || thirdB.checked || thirdC.checked || thirdD.checked) & 
        (fourthA.checked || fourthB.checked || fourthC.checked || fourthD.checked) & 
        (fifthText.value.length != 0) & (sixthText.value.length != 0)) {
            button.type = "submit"
    }
    else{
        alert("Please select an answer for every question")
    }

}

let myForm = document.querySelector("#mainForm");
myForm.submit.addEventListener("click", validate); 