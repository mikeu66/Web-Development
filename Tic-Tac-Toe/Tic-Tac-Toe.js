var isX = true;
var xWins = 0;
var oWins = 0;
var squareArr = ["sq1","sq2","sq3","sq4","sq5","sq6","sq7","sq8","sq9"];
//sets up the board
function setSquare(id){
    var query = "#"+id;
    if (document.querySelector(query).innerHTML == ""){
        document.querySelector(query).value = isX;
        document.querySelector(query).innerHTML = eitherOr();
    }
    
}
//alternates between players
function eitherOr(){
    if (isX == true){
        isX = false;
        return ("X");
    }
    else{
        isX = true;
        return ("O");
    }

}
//updates the scoreboard
function updateScore(){
    document.getElementById("scoreX").innerHTML = xWins;
    document.getElementById("scoreO").innerHTML = oWins;
}
//resets the game
function resetAll(){
    for (let i = 0; i < 9; i++) { 
        document.getElementById(squareArr[i]).value = "";
        document.getElementById(squareArr[i]).innerHTML = ""
      }
      isX = true;

}

function checkAll(){
    checkTop();
    checkMiddleHorz();
    checkBottom();
    checkLeft();
    checkRight();
    checkMiddleVert();
    checkDiagLtR();
    checkDiagRtL();
    updateScore();
}


//functions to check if either player has won
function checkTop(){
    if ((document.getElementById("sq1").value == document.getElementById("sq2").value) &&
       (document.getElementById("sq2").value == document.getElementById("sq3").value) && (document.getElementById("sq2").value != "")){
           if (document.getElementById("sq2").value == "true"){
               alert("X has won");
               xWins++;
           }
           else if (document.getElementById("sq2").value == "false"){
               alert("O has won");
               oWins++;
           }
       }
}

function checkMiddleHorz(){
    if ((document.getElementById("sq4").value == document.getElementById("sq5").value) &&
       (document.getElementById("sq5").value == document.getElementById("sq6").value) && (document.getElementById("sq5").value != "")){
           if (document.getElementById("sq5").value == "true"){
            alert("X has won");
            xWins++;
        }
        else if (document.getElementById("sq5").value == "false"){
            alert("O has won");
            oWins++;
        }
       }
}

function checkBottom(){
    if ((document.getElementById("sq7").value == document.getElementById("sq8").value) &&
       (document.getElementById("sq8").value == document.getElementById("sq9").value) && (document.getElementById("sq8").value != "")){
            if (document.getElementById("sq8").value == "true"){
                alert("X has won");
                xWins++;
            }
            else if (document.getElementById("sq8").value == "false"){
                alert("O has won");
                oWins++;
            }
       }
}
Z
function checkLeft(){
    if ((document.getElementById("sq1").value == document.getElementById("sq4").value) &&
       (document.getElementById("sq4").value == document.getElementById("sq7").value) && (document.getElementById("sq4").value != "")){
            if (document.getElementById("sq4").value == "true"){
                alert("X has won");
                xWins++;
            }
            else if (document.getElementById("sq4").value == "false"){
                alert("O has won");
                oWins++;
            }
       }

}

function checkRight(){
    if ((document.getElementById("sq3").value == document.getElementById("sq6").value) &&
       (document.getElementById("sq6").value == document.getElementById("sq9").value) && (document.getElementById("sq6").value != "")){
            if (document.getElementById("sq6").value == "true"){
                alert("X has won");
                xWins++;
            }
            else if (document.getElementById("sq6").value == "false"){
                alert("O has won");
                oWins++;
            }
       }
    

}

function checkMiddleVert(){
    if ((document.getElementById("sq2").value == document.getElementById("sq5").value) &&
       (document.getElementById("sq5").value == document.getElementById("sq8").value) && (document.getElementById("sq5").value != "")){
            if (document.getElementById("sq5").value == "true"){
                alert("X has won");
                xWins++;
            }
            else if (document.getElementById("sq5").value == "false"){
                alert("O has won");
                oWins++;
            }
       }
    

}

function checkDiagLtR(){
    if ((document.getElementById("sq7").value == document.getElementById("sq5").value) &&
       (document.getElementById("sq5").value == document.getElementById("sq3").value) && (document.getElementById("sq5").value != "")){
            if (document.getElementById("sq5").value == "true"){
                alert("X has won");
                xWins++;
            }
            else if (document.getElementById("sq5").value == "false"){
                alert("O has won");
                oWins++;
            }
       }

}

function checkDiagRtL(){
    if ((document.getElementById("sq9").value == document.getElementById("sq5").value) &&
       (document.getElementById("sq5").value == document.getElementById("sq1").value) && (document.getElementById("sq5").value != "")){
            if (document.getElementById("sq5").value == "true"){
                alert("X has won");
                xWins++;
            }
            else if (document.getElementById("sq5").value == "false"){
                alert("O has won");
                oWins++;
            }
       }

}