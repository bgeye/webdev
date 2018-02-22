var Tools = (function(){

    var removeElement = function(element,taskList){

        taskList.splice(element,1);
    }

    var delegate = function(target,callback){         //target(NOT e.target) = li .list__removeicon

        return function check(e){
            if(e.target && e.target.matches(target)){ //target(NOT e.target) = li .list__removeicon
                callback(e);
            }
        }
    }

    var saveLocal = function(key,content){
        var json = JSON.stringify(content);
        localStorage.setItem(key,json);
    }

    var pullLocal = function(key){
        return JSON.parse(localStorage.getItem(key));
    }

    var checkLocalStorage = function(key){
        if(localStorage.getItem(key)){
            return true;
        }else{
            return false;
        }
    }

    return{
        delegate: delegate,
        removeElement: removeElement,
        saveLocal: saveLocal,
        pullLocal: pullLocal,
        checkLocalStorage: checkLocalStorage
    };
})()