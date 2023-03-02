var puzzles = {
    puzzle1: ["img1-1.jpg", "img1-2.jpg", "img1-3.jpg", "img1-4.jpg", "img1-5.jpg", "img1-6.jpg", "img1-7.jpg", "img1-8.jpg", "img1-9.jpg", "img1-10.jpg", "img1-11.jpg", "img1-12.jpg"],
    puzzle2: ["img2-1.jpg", "img2-2.jpg", "img2-3.jpg", "img2-4.jpg", "img2-5.jpg", "img2-6.jpg", "img2-7.jpg", "img2-8.jpg", "img2-9.jpg", "img2-10.jpg", "img2-11.jpg", "img2-12.jpg"],
    puzzle3: ["img3-1.jpg", "img3-2.jpg", "img3-3.jpg", "img3-4.jpg", "img3-5.jpg", "img3-6.jpg", "img3-7.jpg", "img3-8.jpg", "img3-9.jpg", "img3-10.jpg", "img3-11.jpg", "img3-12.jpg"]
}
var puzzleNum = window.onload = whichPuzzle();
var puzzleName = "puzzle"+puzzleNum;
window.onload = setPosition(puzzles[puzzleName]);
var timerVariable = setInterval(timer, 1000);
var total = 0;

function grabber(event) {

    event.preventDefault();

    // Set the global variable for the element to be moved
    theElement = event.currentTarget;

    // Determine the position of the word to be grabbed, first removing the units from left and top
    posX = parseInt(theElement.style.left);
    posY = parseInt(theElement.style.top);

    // Compute the difference between where it is and where the mouse click occurred
    diffX = event.clientX - posX;
    diffY = event.clientY - posY;

    // Now register the event handlers for moving and dropping the word
    document.addEventListener("mousemove", mover, true);
    document.addEventListener("mouseup", dropper, true);

}

// The event handler function for moving the word
function mover(event) {
    // Compute the new position, add the units, and move the word
    theElement.style.left = (event.clientX - diffX) + "px";
    theElement.style.top = (event.clientY - diffY) + "px";
}

// The event handler function for dropping the word
function dropper(event) {
    // Unregister the event handlers for mouseup and mousemove
    document.removeEventListener("mouseup", dropper, true);
    document.removeEventListener("mousemove", mover, true);
}

function randomizeArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));         
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
 }

 function whichPuzzle(){
     return(Math.floor(Math.random() * 3)+1);
 }

 function setPosition(array) {
     otherArray = randomizeArray(array)
     for (var i = 1; i < 13; i++){
        document.getElementById(i).src =  "puzzle" + puzzleNum+ "/" + otherArray[i-1];
     }
 }
 
 function timer() {
    total += 1;
    var hour = Math.floor(total / 3600);
    var minute = Math.floor((total - hour * 3600) / 60);
    var seconds = total - (hour * 3600 + minute * 60);
    document.getElementById("timer").innerHTML =  "Time: " + minute + ":" + seconds;
}

