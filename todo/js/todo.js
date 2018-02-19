var App = (function(t){

var taskJSON = [];/*'[{"tod":"Salat"},{"tod":"Milch"}]';*/ //only for testing
var taskList;      // = JSON.parse(taskJSON);
var list = document.querySelector('.todo__list');
var inputTxt = document.querySelector('#addtxt');
var checkDone;
var listKey = 'tasklist'; //key for local storage

var init = function(){ //START init function
    console.log(taskList);
    //load from local storage if not empty
    if(t.checkLocalStorage(listKey)){
        console.log('local storage NOT empty');
        taskList = t.pullLocal(listKey);
    }else{
        if(!t.checkLocalStorage(listKey)){
            console.log('local storage EMPTY');
            taskList = taskJSON;
        }else{
            console.log('local storage NOT empty');
            taskList = JSON.parse(taskJSON);
        }
    }


    //eventListener to remove list item
    list.addEventListener('click',t.delegate('li .list__removeicon',function(e){

            t.removeElement(e.target.parentNode.parentNode.parentNode.id,taskList);
            renderList();
    }));


    //eventListener to add new item
    inputTxt.addEventListener('keydown',addNewItem);

    //eventListener to mark done task
    list.addEventListener('click',t.delegate('li .taskdone',function(e){
        //console.log(e.target.parentNode.parentNode.firstChild.nextSibling);
        var taskId = e.target.parentNode.parentNode.id;
        if(e.target){
            e.target.parentNode.parentNode.firstChild.nextSibling.classList.add('list__txt--done');
            taskList.splice(taskId,0,{done:true});
        }else{
            taskList.splice(taskId,0,{done:false});
        }
        renderList();

    }))

    renderList();
    function renderList(){
        console.log('renderList');
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
            inputCheck.setAttribute('id','taskdone_'+index);//CHANGE the id, remove _2!!!
            inputCheck.setAttribute('type','checkbox');
            inputCheck.classList.add('taskdone');
            var labelCheck = document.createElement('label');
            labelCheck.setAttribute('for','taskdone_'+index);
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
        //saveLocal
        t.saveLocal(listKey,taskList);
        //count remaining task
        countTask();
    }


    function addNewItem(e){

        if(e.code === 'Enter'){
            var inputTxt = getInput();
            taskList.push({todo:inputTxt},{done:false});
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

    function countTask(){
        var remain = taskList.length;
        document.querySelector('.footer__count')
            .innerText = remain;

    }
}; //END of init function
    return{
        init:init
    };
})(Tools);
App.init();