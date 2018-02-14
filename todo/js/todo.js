
var taskJSON = '[{"todo":"Salat"},{"todo":"Milch"}]';

var taskList;// = JSON.parse(taskJSON);

if(localStorage.getItem('taskList')){
    taskList = JSON.parse(localStorage.getItem('taskList'));
}else{
    taskList = JSON.parse(taskJSON);
}

console.log(taskList);
//showContent();
function showContent(){
    taskList.forEach(function(element,index){
        console.log(element.todo,index);
    })
}

var list = document.querySelector('.todo__list');
console.log(list);

//remove list item
   list.addEventListener('click',function(e){
        if(e.target && e.target.matches('li .list__removeicon')){

            var removeId = e.target.parentNode.parentNode.parentNode.id;
            console.log(removeId);
            taskList.splice(removeId,1);
            renderList();
            console.log(e.target.parentNode.parentNode.parentNode.id);
            //console.log(e.target.parentNode.parentNode.parentNode.parentNode
                //.removeChild(e.target.parentNode.parentNode.parentNode));
        }
    });

renderList();
function renderList(){
    //console.log(list);
    list.innerHTML = ''; //delete li elements(means the list content)
    taskList.forEach(function(element,index){
        console.log(element.todo,index);
        var listItem = document.createElement('li');
        listItem.classList.add('list__item','list__item--show');
        listItem.id = index;
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
        btnDel.classList.add('btn','btnremove');
        var imgDel = document.createElement('img');
        imgDel.classList.add('img_base','list__removeicon');
        imgDel.setAttribute('src','img/close.svg');

        list.appendChild(listItem);
        listItem.appendChild(boxCheck);
        boxCheck.appendChild(inputCheck);
        boxCheck.appendChild(labelCheck);
        labelCheck.appendChild(labelInner);
        listItem.appendChild(txtInner).innerHTML = element.todo;
        listItem.appendChild(boxDel)
        boxDel.appendChild(btnDel)
        btnDel.appendChild(imgDel);
    })
    saveLocal();
}

document.querySelector('#addtxt')
     .addEventListener('keydown',addNewItem);

function addNewItem(e){

    if(e.code === 'Enter'){
        var inputTxt = getInput();
        taskList.push({todo:inputTxt});
        defaultInput();
        renderList();
    }
}

function getInput(){
    return document.querySelector('#addtxt')
        .value
}

function defaultInput(){
    return document.querySelector('#addtxt')
        .value = '';
}


function saveLocal(){
    localStorage.setItem(JSON.stringify(taskList));
}
