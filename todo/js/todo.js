


var add = document.getElementById('addbtn');
add.addEventListener('click',addNewTask);


function addNewTask(){

    var list = document.getElementById('list-element');
    var newLi = document.createElement('li');
    var tasktxt = document.getElementById('addtxt').value;
    newLi.className += 'list__item';
    newLi.innerHTML = tasktxt;
    list.appendChild(newLi);
    setTimeout(function(){

        newLi.className = newLi.className + ' list__item--show';

    },50);
}