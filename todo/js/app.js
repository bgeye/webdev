var App = (function(t,s){

//var taskJSON = [];/*'[{"tod":"Salat"},{"tod":"Milch"}]';*/ //only for testing
var taskList = [];      // = JSON.parse(taskJSON);
var taskListAll;
var taskListTodo;
var taskListDone;
var list = document.querySelector('.todo__list');
var inputTxt = document.querySelector('#addtxt');
var taskFilter = document.querySelector('.todo__footer');
var btnSpeech = document.querySelector('#speech');
var listKey = 'tasklist'; //key for local storage
var url = 'http://localhost:3002/todos';
var localData = t.checkLocalStorage(listKey);

//init function
var init = function(){

    //bind eventListeners
    inputTxt.addEventListener('keydown',addNewItem);
    list.addEventListener('click',t.delegate('li .list__removeicon',removeItem));       //t.delegate is executend on load of file
    taskFilter.addEventListener('click',t.delegate('.todo__footer button',filterItems)); //""
    list.addEventListener('click',t.delegate('li .taskdone',statusItem));                //""
    btnSpeech.addEventListener('click',addNewItemSpeech);

    //load from local or external storage
    load();
};


    //functions
    var load = function(){
        if(localData){
            taskList = t.pullLocal(listKey);
            renderList();
        }else if(!localData){

            //this is a asynchron function so wait for status = 200 (this code will be executed even the response
            // from server is not already here)
            t.get(url,function(data){//wait for status 200 -> solved temporary with timeout function for renderList()

                    taskList = data;
                    renderList();

            },function(error){
                alert(error);
                taskList = [];
                renderList();
            });

        }else{
            taskList = [];
            renderList();
        }
    }

    var renderList = function(filterItems){
        var filterList;
        if(filterItems){
            filterList = filterItems;
        }else{
            filterList = taskList;
        }

        list.innerHTML = ''; //delete li elements
        filterList.forEach(function(element,index){
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


    var addNewItem = function(e){

        if(e.code === 'Enter'){
            var inputTxt = getInput();
            if(inputTxt){
                console.log(inputTxt);
                taskList.push({todo:inputTxt,done:false});
                defaultInput();
                renderList();
                save();

            }else{
                alert('Bitte erfasse ein neues Todo!');
            }
        }
    }



    var addNewItemSpeech = function(){
        s.listen(function(response){
            console.log(response);
            taskList.push({todo:response,done:false});
            renderList();
            save();
        });

    }


    var removeItem = function(e){
        t.removeElement(e.target.parentNode.parentNode.parentNode.id,taskList);
        renderList();
        save();
    }

    var filterItems = function(e){
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
                taskListDone = taskList.filter(function(item){
                    return item.done == true;
                })
                renderList(taskListDone);
                break;
        }
    }

    var statusItem = function(e){
        var taskId = e.target.parentNode.parentNode.id;
        if(taskList[taskId].done == false){

            taskList[taskId].done = true;
        }else{

            taskList[taskId].done = false;
        }

        renderList();
        save();
    }

    var getInput = function(){

        return document.querySelector('#addtxt')
            .value
    }

    var defaultInput = function(){
        return document.querySelector('#addtxt')
            .value = '';
    }

    var countTask = function(){
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
    var save = function (){
        t.saveLocal(listKey,taskList);
        t.post(url,taskList,function(response){
            //alert(response);
            console.log(response);
        },function(error){
            alert(error);
        });
    }


    return{
        init:init
    };

})(Tools,Speech);
App.init();