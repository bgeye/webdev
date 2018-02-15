var Tools = (function(){

    console.log('inbound Tools');

    var removeElement = function(element,taskList){
        console.log('delete');
        taskList.splice(element,1);
    }

    var delegate = function(target,callback){

        return function check(e){
            console.log(e.target);
            if(e.target && e.target.matches(target)){
                callback(e);
            }
        }
    }

    return{
        delegate: delegate,
        removeElement: removeElement
    };
})()