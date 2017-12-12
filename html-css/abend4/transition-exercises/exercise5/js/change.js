


var cube = document.getElementById("cube");
cube.addEventListener("click",addChangeClass);
cube.addEventListener("transitionend",sayDone);



function addChangeClass(){

    cube.className += " " + "change";
}


function sayDone(event){
 alert('Transition DONE!');

}