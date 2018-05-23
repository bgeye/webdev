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

    var post = function(url,content,responseCallback,errorCallback){
        var request = new XMLHttpRequest();
        request.open('POST',url,true);
        request.setRequestHeader("Content-Type","application/json");
        var data = JSON.stringify(content);

        request.onload = function(){
            if(request.status >= 200 && request.status < 400){
                var res = JSON.parse(request.responseText);
                //console.log(res);
                responseCallback(res);
            }else{
            //console.log('server error');
            errorCallback('Server Error: Daten konnten nicht gespeichert werden!');
            }
        }

        request.onerror = function(){
            //console.log('Server ist nicht erreichbar!');
            errorCallback('POST: Server ist nicht erreichbar!');
        }
        request.send(data);
    }

    var get = function(url,responseCallback,errorCallback){
        var request = new XMLHttpRequest();
        request.open('GET',url,true);

        request.onload = function(){
            if(request.status >= 200 && request.status < 400){
                var data = JSON.parse(request.responseText);
                responseCallback(data);
            }else{
                //console.log('Server Error');
                errorCallback('Server Error: Daten konnten nicht geladen werden!');
            }
        };

        request.onerror = function(){
            //console.log('Server ist nicht erreichbar!');
            errorCallback('Server ist nicht erreichbar!');
        }
        request.send();

    }

    return{
        delegate: delegate,
        removeElement: removeElement,
        saveLocal: saveLocal,
        pullLocal: pullLocal,
        checkLocalStorage: checkLocalStorage,
        post: post,
        get: get
    };
})()