var App = (function(t){

var init = function(){
    var taskJSON = [];/*'[{"tod":"Salat"},{"tod":"Milch"}]';*/ //only for testing

    var taskList;// = JSON.parse(taskJSON);

    if(localStorage.getItem('tasklist')){
        taskList = JSON.parse(localStorage.getItem('tasklist'));
    }else{
        if(!localStorage.getItem('tasklist')){
            taskList = taskJSON;
        }else{
            taskList = JSON.parse(taskJSON);
        }

    }



    console.log(taskList);

    var list = document.querySelector('.todo__list');
    console.log(list);

    //remove list item
       list.addEventListener('click',Tools.delegate('li .list__removeicon',function(e){
            //if(e.target && e.target.matches('li .list__removeicon')){
                Tools.removeElement(e.target.parentNode.parentNode.parentNode.id,taskList);
                //var removeId = e.target.parentNode.parentNode.parentNode.id;
                //taskList.splice(removeId,1);
                renderList();
            //}
        }));

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
        countTask();
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
        var json = JSON.stringify(taskList);
        localStorage.setItem('tasklist',json);
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