


var add = document.getElementById('add');
add.addEventListener('click',addNewTask);



function addNewTask(){

    var list = document.getElementById('list-el');
    var newLi = document.createElement('li');
    var tasktxt = document.getElementById('addtodo').value;
    newLi.className += 'list-item';
    newLi.innerHTML = tasktxt;
    list.appendChild(newLi);
    setTimeout(function(){

        newLi.className = newLi.className + ' show';

    },50);
}