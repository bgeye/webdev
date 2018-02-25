var App = (function(t){

var taskJSON = [];/*'[{"tod":"Salat"},{"tod":"Milch"}]';*/ //only for testing
var taskList;      // = JSON.parse(taskJSON);
var taskListAll;
var taskListTodo;
var taskListDone;
var list = document.querySelector('.todo__list');
var inputTxt = document.querySelector('#addtxt');
var taskFilter = document.querySelector('.todo__footer');
var checkDone;
var listKey = 'tasklist'; //key for local storage
var url = 'http://localhost:3002/todos';
var localData = t.checkLocalStorage(listKey);

//var getRes;

var init = function(){ //START init function

    //load from local or external storage
    load();

    //render list 1st run --> timeout for reload in case async response will be late...
    //TODO: find better solution
    setTimeout(function(){
        renderList();
    },100);

    //eventListener to remove list item
    list.addEventListener('click',t.delegate('li .list__removeicon',function(e){

            t.removeElement(e.target.parentNode.parentNode.parentNode.id,taskList);
            renderList();
            save();
    }));


    //eventListener to add new item
    inputTxt.addEventListener('keydown',addNewItem);

    //eventListener for taskfilter
    taskFilter.addEventListener('click',t.delegate('.todo__footer button',function(e){
        //console.log(e.target.id);
         //taskListAll = taskList;
        switch(e.target.id){
            case 'all':
                taskListAll = taskList;
                renderList(taskListAll);
                break;
            case 'todo':
                taskListTodo = taskList.filter(function(item){
                    return item.done == false;
                })
                renderList(taskListTodo);
                break;
            case 'done':
                taskListDone = taskListTodo = taskList.filter(function(item){
                    return item.done == true;
                })
                renderList(taskListDone);
                break;
        }
    }));

    //eventListener to mark done task TODO: create done function
    list.addEventListener('click',t.delegate('li .taskdone',function(e){
        var taskId = e.target.parentNode.parentNode.id;
        console.log('before: '+taskList[taskId].done);
        if(taskList[taskId].done == false){

            taskList[taskId].done = true;
            console.log('after: '+taskList[taskId].done);
        }else{

            taskList[taskId].done = false;
            console.log('after: '+taskList[taskId].done);
        }

        renderList();
        save();

    }))




    function load(){
        if(localData){
            taskList = t.pullLocal(listKey);
        }else{

            //this is a asynchron function so wait for status = 200 (this code will be executed even the response
            // from server is not already here)
            t.get(url,function(data){//wait for status 200 -> solved temporary with timeout function for renderList()
                console.log(data);
                if(data){

                    taskList = data;
                }else{
                    taskList = taskJSON;
                }
            });

        }
    }

    function renderList(filterItems){
        console.log(taskList);
        console.log('renderList');
        var filterList;
        if(filterItems){
            filterList = filterItems;
        }else{
            filterList = taskList; //if
        }

        list.innerHTML = ''; //delete li elements(means the list content)
        filterList.forEach(function(element,index){
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
            if(element.done == true){
                inputCheck.checked = true;
            }else{
                inputCheck.checked = false;
            }
            inputCheck.classList.add('taskdone');
            var labelCheck = document.createElement('label');
            labelCheck.setAttribute('for','taskdone_'+index);
            var labelInner = document.createElement('span');

            //itemtext
            var txtInner = document.createElement('span');
            txtInner.classList.add('list__txt');
            if(element.done == true){
                txtInner.classList.add('list__txt--done');
            }else{
                txtInner.classList.remove('list__txt--done');
            }


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
            listItem.appendChild(boxDel);
            boxDel.appendChild(btnDel);
            btnDel.appendChild(imgDel);
        })

        //count remaining task
        countTask();
    }


    function addNewItem(e){

        if(e.code === 'Enter'){
            var inputTxt = getInput();
            if(inputTxt){
                taskList.push({todo:inputTxt,done:false});
                defaultInput();
                renderList();
                save();
            }else{
                alert('Bitte erfasse ein neues Todo!');
            }

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
        var empty =  0;
        var remain = taskList.length;
        var counter = document.querySelector('.footer__count');
        if(taskList.length){
            counter.innerText = remain;
        }else{
            counter.innerText = empty;
        }


    }

    //save local and on server
    function save(){
        t.saveLocal(listKey,taskList);
        t.post(url,taskList,function(res){
            console.log('saved!'+res);
        });
    }
}; //END of init function
    return{
        init:init
    };
})(Tools);
App.init();