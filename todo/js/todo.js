


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


document.querySelector('#addtxt')
    .addEventListener('keydown',addNewItem);

function getInput(){
    return document.querySelector('#addtxt')
        .value
}

function defaultInput(){
    return document.querySelector('#addtxt')
        .value = '';
}

function addNewItem(e){

    if(e.code === 'Enter'){
        var inputTxt = getInput();

        var listItem = document.createElement('li');
        listItem.classList.add('list__item','list__item--show');
        //checkbox
        var boxCheck = document.createElement('div');
        boxCheck.classList.add('list__taskdone');
        var inputCheck = document.createElement('input');
        inputCheck.setAttribute('id','taskdone_2');//CHANGE the id, remove _2!!!
        inputCheck.setAttribute('type','checkbox');
        var labelCheck = document.createElement('label');
        labelCheck.setAttribute('for','taskdone_2');
        var labelInner = document.createElement('span');

        //itemtext
        var txtInner = document.createElement('span');
        txtInner.classList.add('list__txt');

        //delbox
        var boxDel = document.createElement('div');
        boxDel.classList.add('list__del');
        var btnDel = document.createElement('button');
        btnDel.classList.add('btn');
        var imgDel = document.createElement('img');
        imgDel.classList.add('img_base','list__removeicon');
        imgDel.setAttribute('src','img/close.svg')


        //create listElement
        document.querySelector('.todo__list')
            .appendChild(listItem)
            listItem.appendChild(boxCheck)
            boxCheck.appendChild(inputCheck)
            boxCheck.appendChild(labelCheck)
            labelCheck.appendChild(labelInner)
            listItem.appendChild(txtInner).innerText = inputTxt
            listItem.appendChild(boxDel)
            boxDel.appendChild(btnDel)
            btnDel.appendChild(imgDel);

        //delete value of inputfield
        defaultInput();
    }







}
